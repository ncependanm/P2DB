<?php
class propinsi extends CI_Controller{
    
    var $folder =   "backend/propinsi";
    var $tables =   "tbl_propinsi";
    var $pk     =   "propinsi_id";
    var $title  =   "Daftar Propinsi";
    var $titleInputan  =   "Form Propinsi";
    
    function __construct() {
        parent::__construct();
		$this->load->model('propinsi_model','propinsiModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Propinsi - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "propinsi";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->propinsiModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $propinsi) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $propinsi->propinsi_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$propinsi->propinsi_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$propinsi->propinsi_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->propinsiModel->count_all(),
						"recordsFiltered" => $this->propinsiModel->count_filtered(),
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
			'propinsi_nama' => $this->input->post('propinsi_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'propinsi_nama' => $this->input->post('propinsi_nama')
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