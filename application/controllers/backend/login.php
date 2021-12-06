<?php
class login extends CI_Controller{
    
    var $folder =   "backend";
    var $tables =   "tbl_user";
    var $pk     =   "user_id";
    
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha','string');
    }
    
    function index()
    {
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Login Administrasi - P2DB";
		
		$sqlReg = "SELECT * FROM tbl_reg_apk";
        $dataReg = $this->db->query($sqlReg)->result();
			
		foreach ($dataReg as $t)
		{
			$tglAkhir = $t->reg_apk_tgl_akhir;
			$tglSekarang = date('d-m-Y');
			if($tglAkhir == 'unlimited'){
				$this->load->view('backend/login',$data);
			}else{
				if($tglAkhir >= $tglSekarang){
					$this->load->view('backend/login',$data);
				}else if($tglAkhir < $tglSekarang){
					$data['judulForm'] = 'Form Registrasi';
					$this->load->view('register',$data);
				}
			}
		}
    }
		
	function auth()
	{			
		$sql = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_status = 'A'";
		$data = $this->db->query($sql)->result();
		$idThnAjaran = "";
		$namaThnAjaran = "";
			
		foreach ($data as $t)
		{
			$idThnAjaran = $t->thn_ajaran_id;
			$namaThnAjaran = $t->thn_ajaran_nama;
		}
			
		$sql = "SELECT * FROM tbl_semester WHERE semester_status = 'Y'";
		$data = $this->db->query($sql)->result();
		$idSemester = "";
		$namaSemester = "";
		
		foreach ($data as $s)
		{
			$idSemester = $s->semester_id;
			$namaSemester = $s->semester_nama;
		}
			
		$username   =  $this->input->post('user_username');
        $password   =  $this->input->post('user_password');
        $login=  $this->db->get_where('tbl_user',array('user_username'=>$username,'user_password'=>  md5($password)));
        if($login->num_rows()>0)
        {
            $r=  $login->row_array();
			$idAkun = $r['user_akun_id'];
			$nama = "";
			$akun = "";
			$namaAkun = "";
			
			if($r['user_hak_akses'] == "1"){
				$nama = $r['user_name'];
			}else if($r['user_hak_akses'] == "2"){
				$nama = "Guru";
				$dataAkun=  $this->db->get_where('tbl_guru',array('guru_id'=>$idAkun));
				if($dataAkun->num_rows()>0)
				{
					$akun=  $dataAkun->row_array();
					$namaAkun = $akun['guru_nama'];
				}
			}else if($r['user_hak_akses'] == "4"){
				$nama = "Siswa";
				$dataAkun=  $this->db->get_where('tbl_siswa',array('siswa_id'=>$idAkun));
				if($dataAkun->num_rows()>0)
				{
					$akun=  $dataAkun->row_array();
					$namaAkun = $akun['siswa_nama'];
				}
			}			
            $data=array('id_users'=>$r['user_id'],
                            'level'=>$r['user_hak_akses'],
                            'username'=>$username,
							'nama'=>$nama,
							'id_akun'=>$idAkun,
							'nama_akun'=>$namaAkun,
							'noreg' => '',
							'id_thn_ajaran'=>$idThnAjaran,
							'nama_thn_ajaran'=>$namaThnAjaran,
							'id_semester'=>$idSemester,
							'nama_semester'=>$namaSemester);
            $this->session->set_userdata($data);
			echo json_encode(array("status" => TRUE, "msg" => "Sukses"));
        } else {
			$login=  $this->db->get_where('tbl_reg_akun',array('reg_akun_nisn'=>$username,'reg_akun_password'=>  md5($password)));
			if($login->num_rows()>0)
			{
				$r=  $login->row_array();
				$data=array('id_users'=>$r['reg_akun_id'],
                            'level'=> "3",
                            'username'=>$username,
							'nama' => $r['reg_akun_nama'],
							'id_akun'=>$r['reg_akun_id'],
							'nama_akun'=>$r['reg_akun_nama'],
							'noreg' => $r['reg_akun_no_reg'],
							'id_thn_ajaran'=>$idThnAjaran,
							'nama_thn_ajaran'=>$namaThnAjaran,
							'id_semester'=>$idSemester,
							'nama_semester'=>$namaSemester,
							'reg_akun_status'=>$r['reg_akun_status'],
							'reg_akun_status_validasi'=>$r['reg_akun_status_validasi'],
							'reg_akun_jalur_daftar'=>$r['reg_akun_jalur_daftar']);
				$this->session->set_userdata($data);
				echo json_encode(array("status" => TRUE, "msg" => "Sukses"));
			}else{
				echo json_encode(array("status" => FALSE, "msg" => "Username atau password salah"));							
			}
		}
		
	}
	
	function logout()
    {
        $this->session->sess_destroy();
        redirect('backend/login');
    }
	
	function send(){
		$nisn   =  $this->input->post('send_nisn');
		if($nisn == ''){
			echo json_encode(array("status" => FALSE, "msg" => "NISN Harus Disi"));				
		} else {
			$email   =  $this->input->post('send_email');
			if($email == ''){
				echo json_encode(array("status" => FALSE, "msg" => "Email Harus Disi"));								
			} else {
				$sql    =   "SELECT * FROM tbl_reg_akun WHERE reg_akun_nisn = '". $nisn ."'";
				if($this->db->query($sql)->num_rows() > 0)
				{
					$r=  $this->db->query($sql)->row_array();
					// Kirim Email
					$subject = 'Verifikasi Permintaan Lupa Password';
					$message = 'Kepada Peserta,<br /><br />
							Silahkan klik link di bawah untuk melakukan reset password untuk akun dengan NISN ' . $nisn . '.<br /><br /> 
							'. base_url() .'backend/login/resetPassword/' . md5($nisn) . '<br /><br /><br />
							Terima Kasih<br /><br />
							Admin P2DB';
							if ($this->mcrud->sendMail($email, $subject, $message))
							{
								echo json_encode(array("status" => TRUE, "msg" => "Cara Merubah Password Sudah dikirim, Cek Email Anda !!"));	
							}
				}else{
					echo json_encode(array("status" => FALSE, "msg" => "NISN Belum Terdaftar"));							
				}
			}
		}
	}
	
	function resetPassword($key)
	{
		$sql    =   "SELECT * FROM tbl_reg_akun WHERE md5(reg_akun_nisn) = '". $key ."'";
        if($this->db->query($sql)->num_rows() > 0)
        {
            $r=  $this->db->query($sql)->row_array();
			$data['desc'] = "";
			$data['info'] = "";
			$data['idUser'] = $r['reg_akun_id'];
			$data['judulHalaman'] = "Lupa Password - P2DB";

			$this->load->view('backend/forgot',$data);
		} else {			
			$data['desc'] = "";
			$data['info'] = "";
			$data['idUser'] = $sql;
			$data['judulHalaman'] = "haha - P2DB";

			$this->load->view('backend/forgot',$data);
		}
	}
	
	function resetSubmit(){
		$id = $this->input->post('user_id');
		$password = $this->input->post('user_password');
		if ($this->mcrud->resetPassword($id, MD5($password)))
        {
			echo json_encode(array("status" => TRUE));
		}
	}
}