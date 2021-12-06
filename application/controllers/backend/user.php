<?php
class user extends CI_Controller{
    
    var $folder =   "backend/user";
    var $tables =   "tbl_user";
    var $pk     =   "user_id";
    var $title  =   "Daftar User";
    var $titleInputan  =   "Form User";
    
    function __construct() {
        parent::__construct();
		$this->load->model('user_model','userModel');
		$this->load->library('PHPExcel/IOFactory');
		$this->load->helper('download');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data User - SIAKAD ONLINE";
        $data['menu'] = "master";
        $data['subMenu'] = "user";
        $data['subMenuB'] = "";
		$data['upload'] = array('name' => 'userfile',
									'style' => 'display: none',
									'onchange'  => "$('#upload-file-info').html($(this).val());"
		);
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->userModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $user->user_name;
			$row[] = $user->user_username;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$user->user_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$user->user_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->userModel->count_all(),
						"recordsFiltered" => $this->userModel->count_filtered(),
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
		$tmpUpd = $this->input->post('ubah_pass');
		$pss;
		if($tmpUpd == 'Y') {
			$pss = MD5($this->input->post('user_password'));
		} else {
			$pss = $this->input->post('user_password');
		}
		$data = array(
			'user_name' => $this->input->post('user_name'),
			'user_username' => $this->input->post('user_username'),			
			'user_hak_akses' => '1',
			'user_password' => $pss			
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save()
	{
		$data = array(
			'user_name' => $this->input->post('user_name'),
			'user_username' => $this->input->post('user_username'),
			'user_hak_akses' => '1',
			'user_password' => MD5($this->input->post('user_password'))
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
	
	public function uploadExcel()
	{
        $config['upload_path'] = '../../asset/upload/';
        $config['allowed_types'] = 'xlsx|xls';
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Mengambil detail data yang di upload
            $filename = $upload_data['file_name'];//Nama File
            
			ini_set('memory_limit', '-1');
			$inputFileName = '../../asset/upload/'.$filename;
			try {
				$objReader = new PHPExcel_Reader_Excel5();                        
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file :' . $e->getMessage());
			}

			$worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			$numRows = count($worksheet);
			$data = null;
			for ($i=1; $i < ($numRows+1) ; $i++) { 
				if($worksheet[$i]["A"] != 'agama_nama' ){
				$data = array(
						'agama_nama' => $worksheet[$i]["A"]
					   );				
				$this->db->insert($this->table, $data);
				}
			}	
			
            unlink('../../asset/upload/'.$filename);
            redirect('backend/agama','refresh');
        }
    }	
}