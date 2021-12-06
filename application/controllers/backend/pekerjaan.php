<?php
class pekerjaan extends CI_Controller{
    
    var $folder =   "backend/pekerjaan";
    var $tables =   "tbl_pekerjaan";
    var $pk     =   "pekerjaan_id";
    var $title  =   "Daftar Pekerjaan";
    var $titleInputan  =   "Form Pekerjaan";
    
    function __construct() {
        parent::__construct();
		$this->load->model('pekerjaan_model','pekerjaanModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Pekerjaan - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "pekerjaan";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->pekerjaanModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $pekerjaan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $pekerjaan->pekerjaan_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$pekerjaan->pekerjaan_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$pekerjaan->pekerjaan_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pekerjaanModel->count_all(),
						"recordsFiltered" => $this->pekerjaanModel->count_filtered(),
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
			'pekerjaan_nama' => $this->input->post('pekerjaan_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'pekerjaan_nama' => $this->input->post('pekerjaan_nama')
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