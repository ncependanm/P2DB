<?php
class jabatan extends CI_Controller{
    
    var $folder =   "backend/jabatan";
    var $tables =   "tbl_jabatan";
    var $pk     =   "jabatan_id";
    var $title  =   "Daftar Jabatan";
    var $titleInputan  =   "Form Jabatan";
    
    function __construct() {
        parent::__construct();
		$this->load->model('jabatan_model','jabatanModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Jabatan - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "jabatan";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->jabatanModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $jabatan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $jabatan->jabatan_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$jabatan->jabatan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$jabatan->jabatan_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jabatanModel->count_all(),
						"recordsFiltered" => $this->jabatanModel->count_filtered(),
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
			'jabatan_nama' => $this->input->post('jabatan_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'jabatan_nama' => $this->input->post('jabatan_nama')
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