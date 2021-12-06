<?php
class guru extends CI_Controller{
    
    var $folder =   "backend/guru";
    var $tables =   "tbl_guru";
    var $pk     =   "guru_id";
    var $title  =   "Daftar Guru";
    var $titleInputan  =   "Form Guru";
    
    function __construct() {
        parent::__construct();
		$this->load->model('guru_model','guruModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Guru - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "guru";
        $data['subMenuB'] = "guru";
		
		$sql = "SELECT * FROM tbl_jabatan";
        $data['jabatan'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_golongan";
        $data['golongan'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->guruModel->get_datatables();
		$data = array();
		$no = 0;
		$jenisKelamin = "";
		
		foreach ($list as $guru) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $guru->guru_nip;
			$row[] = $guru->guru_nama;
			if($guru->guru_jenis_kelamin == "L"){
				$jenisKelamin = "Laki-laki";
			}else if($guru->guru_jenis_kelamin == "P"){
				$jenisKelamin = "Perempuan";				
			}
			$row[] = $jenisKelamin;
			$row[] = $guru->jabatan_nama;
			$row[] = $guru->golongan_nama;
			$row[] = $guru->guru_alamat;
			$row[] = $guru->guru_telepon;
			$row[] = $guru->guru_no_hp;
			$row[] = $guru->guru_keterangan;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$guru->guru_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$guru->guru_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->guruModel->count_all(),
						"recordsFiltered" => $this->guruModel->count_filtered(),
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
		$nip = $this->input->post('guru_nip');
		$data = array(
			'guru_nip' => $nip,
			'guru_nama' => $this->input->post('guru_nama'),
			'guru_jenis_kelamin' => $this->input->post('guru_jenis_kelamin'),
			'guru_jabatan_id' => $this->input->post('guru_jabatan_id'),
			'guru_golongan_id' => $this->input->post('guru_golongan_id'),
			'guru_alamat' => $this->input->post('guru_alamat'),
			'guru_telepon' => $this->input->post('guru_telepon'),
			'guru_no_hp' => $this->input->post('guru_no_hp'),
			'guru_keterangan' => $this->input->post('guru_keterangan')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		$data = array(
			'user_username' => $nip,
			'user_password' => MD5($nip),
			'user_akun_id' => $id,
			'user_hak_akses' => "2",
		);
		$this->mcrud->update("tbl_user",$data, "user_akun_id",$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$nip = $this->input->post('guru_nip');
		$data = array(
			'guru_nip' => $nip,
			'guru_nama' => $this->input->post('guru_nama'),
			'guru_jenis_kelamin' => $this->input->post('guru_jenis_kelamin'),
			'guru_jabatan_id' => $this->input->post('guru_jabatan_id'),
			'guru_golongan_id' => $this->input->post('guru_golongan_id'),
			'guru_alamat' => $this->input->post('guru_alamat'),
			'guru_telepon' => $this->input->post('guru_telepon'),
			'guru_no_hp' => $this->input->post('guru_no_hp'),
			'guru_keterangan' => $this->input->post('guru_keterangan')
		);
		$this->db->insert($this->tables,$data);
		
		
		$idGuru = "";
		$dataIdGuru = $this->db->get_where('tbl_guru',array('guru_nip'=>$nip))->result();
		foreach ($dataIdGuru as $r)
		{
			$idGuru = $r->guru_id;
		}
		$data = array(
			'user_username' => $nip,
			'user_password' => MD5($nip),
			'user_akun_id' => $idGuru,
			'user_hak_akses' => "2",
		);
		$this->db->insert("tbl_user",$data);
		
		echo json_encode(array("status" => TRUE));
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