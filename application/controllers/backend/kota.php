<?php
class kota extends CI_Controller{
    
    var $folder =   "backend/kota";
    var $tables =   "tbl_kota";
    var $pk     =   "kota_id";
    var $title  =   "Daftar Kota";
    var $titleInputan  =   "Form Kota";
    
    function __construct() {
        parent::__construct();
		$this->load->model('kota_model','kotaModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Kota - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "kota";
        $data['subMenuB'] = "";
		$sql = "SELECT * FROM tbl_propinsi";
        $data['propinsi'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->kotaModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $kota) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $kota->propinsi_nama;
			$row[] = $kota->kota_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$kota->kota_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$kota->kota_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kotaModel->count_all(),
						"recordsFiltered" => $this->kotaModel->count_filtered(),
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
			'kota_propinsi_id' => $this->input->post('kota_propinsi_id'),
			'kota_nama' => $this->input->post('kota_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'kota_propinsi_id' => $this->input->post('kota_propinsi_id'),
			'kota_nama' => $this->input->post('kota_nama')
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