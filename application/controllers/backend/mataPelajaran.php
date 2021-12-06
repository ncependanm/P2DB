<?php
class mataPelajaran extends CI_Controller{
    
    var $folder =   "backend/mataPelajaran";
    var $tables =   "tbl_mata_pelajaran";
    var $pk     =   "mata_pelajaran_id";
    var $title  =   "Daftar Mata Pelajaran";
    var $titleInputan  =   "Form Mata Pelajaran";
    
    function __construct() {
        parent::__construct();
		$this->load->model('mata_pelajaran_model','mataPelajaranModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Mata Pelajaran - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "mataPelajaran";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->mataPelajaranModel->get_datatables();
		$data = array();
		$no = 0;
		
		foreach ($list as $mataPelajaran) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $mataPelajaran->mata_pelajaran_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$mataPelajaran->mata_pelajaran_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$mataPelajaran->mata_pelajaran_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mataPelajaranModel->count_all(),
						"recordsFiltered" => $this->mataPelajaranModel->count_filtered(),
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
			'mata_pelajaran_nama' => $this->input->post('mata_pelajaran_nama')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'mata_pelajaran_nama' => $this->input->post('mata_pelajaran_nama')
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