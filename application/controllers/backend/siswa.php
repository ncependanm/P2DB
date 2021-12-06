<?php
class siswa extends CI_Controller{
    
    var $folder =   "backend/siswa";
    var $tables =   "tbl_siswa";
    var $pk     =   "siswa_id";
    var $title  =   "Daftar Siswa";
    var $titleInputan  =   "Form Siswa";
    
    function __construct() {
        parent::__construct();
		$this->load->model('siswa_model','siswaModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Siswa - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "siswa";
        $data['subMenuB'] = "";
		
		$sql = "SELECT * FROM tbl_agama";
        $data['agama'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_kota";
        $data['kota'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_propinsi";
        $data['propinsi'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_kelas";
        $data['kelas'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->siswaModel->get_datatables();
		$data = array();
		$no = 0;
		$jenisKelamin = "";
		
		foreach ($list as $siswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $siswa->siswa_nisn;
			$row[] = $siswa->siswa_nama;
			$row[] = $siswa->siswa_panggilan;
			$row[] = $siswa->kelas_nama;
			if($siswa->siswa_jenis_kelamin == "P"){
				$jenisKelamin = "Perempuan";
			}else if($siswa->siswa_jenis_kelamin == "L"){
				$jenisKelamin = "Laki-laki";
			}
			$row[] = $jenisKelamin;
			$row[] = $siswa->siswa_tempat_lahir;
			$row[] = $siswa->siswa_tgl_lahir;
			$row[] = $siswa->agama_nama;
			$row[] = $siswa->siswa_alamat;
			$row[] = $siswa->kota_nama;
			$row[] = $siswa->propinsi_nama;
			$row[] = $siswa->siswa_no_telp;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$siswa->siswa_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$siswa->siswa_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->siswaModel->count_all(),
						"recordsFiltered" => $this->siswaModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	function prepareEdit($id)
    {
            $data = $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            echo json_encode($data);
    }
    function update()
	{
		$id = $this->input->post('id');
		$nisn = $this->input->post('siswa_nisn');
		
		$nisnLama = "";
		$dataNisnLama = $this->db->get_where('tbl_siswa',array('siswa_id'=>$id))->result();
		foreach ($dataNisnLama as $r)
		{
			$nisnLama = $r->siswa_nisn;
		}
		$hsl = 0;
		if($nisn == $nisnLama){
			$hsl = 0;
		}else{
			$hsl = $this->mcrud->cekNISNSiswa($nisn);	
		}
		if($hsl <= 0){
			$data = array(
				'siswa_nisn' => $nisn,
				'siswa_nama' => $this->input->post('siswa_nama'),
				'siswa_panggilan' => $this->input->post('siswa_panggilan'),
				'siswa_jenis_kelamin' => $this->input->post('siswa_jenis_kelamin'),
				'siswa_tempat_lahir' => $this->input->post('siswa_tempat_lahir'),
				'siswa_tgl_lahir' => $this->input->post('siswa_tgl_lahir'),
				'siswa_agama_id' => $this->input->post('siswa_agama_id'),
				'siswa_alamat' => $this->input->post('siswa_alamat'),
				'siswa_alamat_propinsi_id' => $this->input->post('siswa_alamat_propinsi_id'),
				'siswa_alamat_kota_id' => $this->input->post('siswa_alamat_kota_id'),
				'siswa_no_telp' => $this->input->post('siswa_no_telp'),
				'siswa_kelas_id' => $this->input->post('siswa_kelas_id')
			);
			$this->mcrud->update($this->tables,$data, $this->pk,$id);
		
			$data = array(
				'user_username' => $nisn,
				'user_password' => MD5($nisn),
				'user_akun_id' => $id,
				'user_hak_akses' => "4",
			);
			$this->mcrud->update("tbl_user",$data, "user_akun_id",$id);
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE, "msg" => "NISN Sudah Terdaftar"));			
		}
	}
	
	function save()
	{
		$nisn = $this->input->post('siswa_nisn');
		$hsl = $this->mcrud->cekNISNSiswa($nisn);
		if($hsl <= 0){
			$data = array(
				'siswa_nisn' => $nisn,
				'siswa_nama' => $this->input->post('siswa_nama'),
				'siswa_panggilan' => $this->input->post('siswa_panggilan'),
				'siswa_jenis_kelamin' => $this->input->post('siswa_jenis_kelamin'),
				'siswa_tempat_lahir' => $this->input->post('siswa_tempat_lahir'),
				'siswa_tgl_lahir' => $this->input->post('siswa_tgl_lahir'),
				'siswa_agama_id' => $this->input->post('siswa_agama_id'),
				'siswa_alamat' => $this->input->post('siswa_alamat'),
				'siswa_alamat_propinsi_id' => $this->input->post('siswa_alamat_propinsi_id'),
				'siswa_alamat_kota_id' => $this->input->post('siswa_alamat_kota_id'),
				'siswa_no_telp' => $this->input->post('siswa_no_telp'),
				'siswa_kelas_id' => $this->input->post('siswa_kelas_id')
			);
			$this->db->insert($this->tables,$data);
		
			$idSiswa = "";
		    $dataIdSiswa = $this->db->get_where('tbl_siswa',array('siswa_nisn'=>$this->input->post('siswa_nisn')))->result();
			foreach ($dataIdSiswa as $r)
			{
				$idSiswa = $r->siswa_id;
			}
			$data = array(
				'user_username' => $nisn,
				'user_password' => MD5($nisn),
				'user_akun_id' => $idSiswa,
				'user_hak_akses' => "4",
			);
			$this->db->insert("tbl_user",$data);
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE, "msg" => "NISN Sudah Terdaftar"));
		}
	}
	
    function delete($id)
    {
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $id);
        }
        echo json_encode(array("status" => TRUE));
    }
}