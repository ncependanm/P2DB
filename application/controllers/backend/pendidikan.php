<?php
class pendidikan extends CI_Controller{
    
    var $folder =   "backend/pendidikan";
    var $tables =   "tbl_pendidikan";
    var $pk     =   "pendidikan_id";
    var $title  =   "Daftar Pendidikan";
    var $titleInputan  =   "Form Pendidika";
    
    function __construct() {
        parent::__construct();
		$this->load->model('pendidikan_model','pendidikanModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Pendidikan - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "pendidikan";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->pendidikanModel->get_datatables();
		$data = array();
		$no = 0;
		
		foreach ($list as $pendidikan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $pendidikan->pendidikan_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$pendidikan->pendidikan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$pendidikan->pendidikan_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pendidikanModel->count_all(),
						"recordsFiltered" => $this->pendidikanModel->count_filtered(),
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
			'pendidikan_nama' => $this->input->post('pendidikan_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'pendidikan_nama' => $this->input->post('pendidikan_nama')
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