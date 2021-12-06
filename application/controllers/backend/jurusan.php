<?php
class jurusan extends CI_Controller{
    
    var $folder =   "backend/jurusan";
    var $tables =   "tbl_jurusan";
    var $pk     =   "jurusan_id";
    var $title  =   "Daftar Jurusan";
    var $titleInputan  =   "Form Jurusan";
    
    function __construct() {
        parent::__construct();
		$this->load->model('jurusan_model','jurusanModel');
    }
    
    function index()
    {
        $sql = "SELECT * FROM tbl_jurusan";
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Jurusan - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "jurusan";
        $data['subMenuB'] = "";
		
        $data['record'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable(){
		
		$list = $this->jurusanModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$indJalurDaftar = '';
		foreach ($list as $jurusan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $jurusan->jurusan_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="'.base_url().'admin/viewCalonSiswa/'.$jurusan->jurusan_id.'" title="Edit"><i class="glyphicon glyphicon-search"></i></a>
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$jurusan->jurusan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$jurusan->jurusan_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jurusanModel->count_all(),
						"recordsFiltered" => $this->jurusanModel->count_filtered(),
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
    function update(){
		$id = $this->input->post('id');
		$data = array(
				'jurusan_nama' => $this->input->post('jurusan_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save(){
		$data = array(
			'jurusan_nama' => $this->input->post('jurusan_nama')
		);
		$this->db->insert($this->tables,$data);
		echo json_encode(array("status" => TRUE));
	}
	
    function delete($id)
    {
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $id);
        }
        redirect($this->uri->segment(1).'/jurusan');
    }
}