<?php
class pengajar extends CI_Controller{
    
    var $folder =   "backend/pengajar";
    var $tables =   "tbl_pengajar";
    var $pk     =   "pengajar_id";
    var $title  =   "Daftar Guru Mata Pelajaran";
    var $titleInputan  =   "Form Guru Mata Pelajaran";
    
    function __construct() {
        parent::__construct();
		$this->load->model('pengajar_model','pengajarModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Guru Mata Pelajaran - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "guru";
        $data['subMenuB'] = "pengajar";
		
		$sql = "SELECT * FROM tbl_guru";
        $data['guru'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_mata_pelajaran";
        $data['mataPelajaran'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->pengajarModel->get_datatables();
		$data = array();
		$no = 0;
		
		foreach ($list as $pengajar) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $pengajar->guru_nama;
			$row[] = $pengajar->mata_pelajaran_nama;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$pengajar->pengajar_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$pengajar->pengajar_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pengajarModel->count_all(),
						"recordsFiltered" => $this->pengajarModel->count_filtered(),
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
			'pengajar_guru_id' => $this->input->post('pengajar_guru_id'),
			'pengajar_mata_pelajaran_id' => $this->input->post('pengajar_mata_pelajaran_id')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'pengajar_guru_id' => $this->input->post('pengajar_guru_id'),
			'pengajar_mata_pelajaran_id' => $this->input->post('pengajar_mata_pelajaran_id')
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