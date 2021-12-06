<?php
class golongan extends CI_Controller{
    
    var $folder =   "backend/golongan";
    var $tables =   "tbl_golongan";
    var $pk     =   "golongan_id";
    var $title  =   "Daftar Golongan";
    var $titleInputan  =   "Form Golongan";
    
    function __construct() {
        parent::__construct();
		$this->load->model('golongan_model','golonganModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Golongan - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "golongan";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->golonganModel->get_datatables();
		$data = array();
		$no = 0;
		
		foreach ($list as $golongan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $golongan->golongan_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$golongan->golongan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$golongan->golongan_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->golonganModel->count_all(),
						"recordsFiltered" => $this->golonganModel->count_filtered(),
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
			'golongan_nama' => $this->input->post('golongan_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'golongan_nama' => $this->input->post('golongan_nama')
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
        echo json_encode(array("status" => TRUE));
    }
}