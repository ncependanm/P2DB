<?php
class kelas extends CI_Controller{
    
    var $folder =   "backend/ruangan";
    var $tables =   "tbl_ruangan";
    var $pk     =   "ruangan_id";
    var $title  =   "Daftar Kelas";
    var $titleInputan  =   "Form Kelas";
    
    function __construct() {
        parent::__construct();
		$this->load->model('ruangan_model','ruanganModel');
		$this->load->model('kelas_siswa_model','kelasSiswaModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Kelas - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "kelas";
        $data['subMenuB'] = "";
		
        $sql = "SELECT * FROM tbl_kelas";
        $data['kelas'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_jurusan";
        $data['jurusan'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_guru WHERE guru_ind_wk = 'N'";
        $data['guru'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->ruanganModel->get_datatables();
		$data = array();
		$no = 0;
		/*$this->db->select('*');
		$this->db->from('tbl_thn_ajaran');
		$this->db->order_by('thn_ajaran_nama','desc');
		$this->db->limit(1);
		$dataThnAjaran = $this->db->get()->result();
		foreach ($dataThnAjaran as $r)
		{
			$thnAjaranId = $r->thn_ajaran_id;
		}*/
		
		$thnAjaranId = $this->session->userdata('id_thn_ajaran');
		
		foreach ($list as $ruangan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ruangan->kelas_nama;
			$row[] = $ruangan->jurusan_nama;
			$row[] = $ruangan->ruangan_nama;
			$row[] = $ruangan->guru_nama;

			$kelasSiswa = '<center><a class="btn btn-sm btn-info circle" id="statusRegistrasi" href="'.base_url().'backend/kelasSiswaTmp/index/'.$ruangan->ruangan_id.'/'.$thnAjaranId.'" title="Lihat Siswa Per Kelas" >Lihat</a></center>';			
			$row[] = $kelasSiswa;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$ruangan->ruangan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$ruangan->ruangan_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ruanganModel->count_all(),
						"recordsFiltered" => $this->ruanganModel->count_filtered(),
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
		$data = array(
			'ruangan_kelas_id' => $this->input->post('ruangan_kelas_id'),
			'ruangan_jurusan_id' => $this->input->post('ruangan_jurusan_id'),
			'ruangan_nama' => $this->input->post('ruangan_nama'),
			'ruangan_guru_id' => $this->input->post('ruangan_guru_id')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$idGuru = $this->input->post('ruangan_guru_id');
		$data = array(
			'ruangan_kelas_id' => $this->input->post('ruangan_kelas_id'),
			'ruangan_jurusan_id' => $this->input->post('ruangan_jurusan_id'),
			'ruangan_nama' => $this->input->post('ruangan_nama'),
			'ruangan_guru_id' => $idGuru
		);
		$this->db->insert($this->tables,$data);
		$data = array(
			'guru_ind_wk' => "Y"
			);
        $this->mcrud->update('tbl_guru',$data, 'guru_id',$idGuru);
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
	
	function tampilkanGuru($ind)
    {
		if($ind == 'N'){
			$sql = "SELECT * FROM tbl_guru WHERE guru_ind_wk = 'N'";	
		}else{
			$sql = "SELECT * FROM tbl_guru";
		}	
        $data = $this->db->query($sql)->result();
		echo "<option value=''>Pilih Guru</option>";
        foreach ($data as $r)
        {
            echo "<option value='$r->guru_id'>".  strtoupper($r->guru_nip)." - ".strtoupper($r->guru_nama)."</option>";
        }
    }	
	
	
}