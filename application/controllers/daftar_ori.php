<?php
class daftar extends CI_Controller
{
    var $tables =   "tbl_reg_akun";
	
    function __construct() 
	{
        parent::__construct();
    }
    
    function index()
    {
		$data['heading'] = 'Halaman tidak ditemukan';
		$data['keterangan'] = 'Kami tidak menemukan halaman yang anda minta';
		
        $sql = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_reg_status = 'O' ORDER BY thn_ajaran_nama DESC LIMIT 1";
        $data['tbl_thn_ajaran'] = $this->db->query($sql)->result();
		
		$sqlReg = "SELECT * FROM tbl_reg_apk";
        $dataReg = $this->db->query($sqlReg)->result();
			
		foreach ($dataReg as $t)
		{
			$tglAkhir = $t->reg_apk_tgl_akhir;
			$tglSekarang = date('Y-m-d');
			if($tglAkhir == 'unlimited'){
				$data['judulForm'] = 'Form Pendaftaran';
				$this->load->view('daftar',$data);
			}else{
				if($tglAkhir >= $tglSekarang){
					$data['judulForm'] = 'Form Pendaftaran';
					$this->load->view('daftar',$data);
				}else if($tglAkhir < $tglSekarang){
					$data['judulForm'] = 'Form Registrasi';
					$this->load->view('register',$data);
				}
			}
		}
    }
	
	function save()
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
		$hsl = $this->mcrud->cekNISN($this->input->post('reg_akun_nisn'));
		if($hsl <= 0){
			$date = date("Y-m-d", time());
			$y = date("y");
			$noreg = (mysql_num_rows(mysql_query("SELECT * FROM tbl_reg_akun"))) + 1;
			if($noreg < 10)
				$noreg = "000".$noreg;
			elseif($noreg < 100)
				$noreg = "00".$noreg;
			elseif($noreg < 1000)
				$noreg = "0".$noreg;
			$noreg = $noreg."/ppdb2017";
			
			$data = array(
				'reg_akun_no_reg' => $noreg,
				'reg_akun_nisn' => $this->input->post('reg_akun_nisn'),
				'reg_akun_nama' => strtoupper($this->input->post('reg_akun_nama')),
				'reg_akun_password' => MD5($this->input->post('reg_akun_password')),
				'reg_akun_jalur_daftar' => $this->input->post('reg_akun_jalur_daftar')
			);
			$this->db->insert($this->tables,$data);
			$login=  $this->db->get_where('tbl_reg_akun',array('reg_akun_nisn'=>$this->input->post('reg_akun_nisn'),'reg_akun_password'=>  md5($this->input->post('reg_akun_password'))));
			if($login->num_rows()>0)
			{
				$r=  $login->row_array();
				$data=array('id_users'=>$r['reg_akun_id'],
                            'level'=> "3",
                            'username'=>$this->input->post('reg_akun_nisn'),
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
				echo json_encode(array("status" => TRUE, "msg" => "sukses"));
			}else{
				echo json_encode(array("status" => FALSE, "msg" => "Username atau password salah"));							
			}
		}else{
			echo json_encode(array("status" => FALSE, "msg" => "NISN Sudah Terdaftar"));
		}
	}
	
	function registrasi()
	{
		$sql = "SELECT * FROM tbl_reg_apk";
		$data = $this->db->query($sql)->result();
			
		foreach ($data as $t)
		{
			
			$todayDate = $t->reg_apk_tgl_reg;// current date
			$now = strtotime($todayDate);
			
			$id = $t->reg_apk_id;
			$tglAkhir = "";
			$key = $this->input->post('reg_apk_key_satu')."-".$this->input->post('reg_apk_key_dua')."-".$this->input->post('reg_apk_key_tiga')."-".$this->input->post('reg_apk_key_empat');
			// Reg 1 bln
			if(strcasecmp($key, 'abcd-efgh-ijkl-mnop') == 0){
				$tglAkhir = date('Y-m-d', strtotime('+1 month', $now));
			}else if(strcasecmp($key, 'jhug-sadv-kopw-kudh') == 0){
				$tglAkhir = date('Y-m-d', strtotime('+6 month', $now));
			}else if(strcasecmp($key, 'klhv-ojda-cbnx-sajk') == 0){
				$tglAkhir = date('Y-m-d', strtotime('+1 year', $now));
			}else if(strcasecmp($key, 'ncjk-posa-opsj-wadv') == 0){
				$tglAkhir = "unlimited";
			}
			$data = array(
				'reg_apk_key' => $key,
				'reg_apk_tgl_akhir' => $tglAkhir
				);
			$this->mcrud->update("tbl_reg_apk",$data, "reg_apk_id",$id);
			echo json_encode(array("status" => TRUE, "msg" => "sukses"));
		}
	}
}