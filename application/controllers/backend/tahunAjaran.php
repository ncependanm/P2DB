<?php
class tahunAjaran extends CI_Controller{
    
    var $folder =   "backend/tahunAjaran";
    var $tables =   "tbl_thn_ajaran";
    var $pk     =   "thn_ajaran_id";
    var $title  =   "Daftar Tahun Ajaran";
    var $titleInputan  =   "Form Ajaran";
    
    function __construct() {
        parent::__construct();
		$this->load->model('tahun_ajaran_model','tahunAjaranModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Tahun Ajaran - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "tahunAjaran";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable(){
		
		$list = $this->tahunAjaranModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $tahunAjaran) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $tahunAjaran->thn_ajaran_nama;
			if($tahunAjaran->thn_ajaran_status == 'A'){
				$thn_ajaran_status = '<center><a class="btn btn-sm btn-info circle" id="statusThnAngkatan" href="javascript:void(0)" title="Status Tahun Ajaran" data-ind="L" data-id="'.$tahunAjaran->thn_ajaran_id.'">Masih Aktif</a></center>';
			}else{
				$thn_ajaran_status = '<center><a class="btn btn-sm btn-danger circle" id="statusThnAngkatan" href="javascript:void(0)" title="Status Tahun Ajaran" data-ind="A" data-id="'.$tahunAjaran->thn_ajaran_id.'">Sudah Lulus</a></center>';
			}
			$row[] = $thn_ajaran_status;
			if($tahunAjaran->thn_ajaran_reg_status == 'O'){
				$thn_ajaran_reg_status = '<center><a class="btn btn-sm btn-info circle" id="statusRegistrasi" href="javascript:void(0)" title="Status Registrasi" data-ind="C" data-id="'.$tahunAjaran->thn_ajaran_id.'">Dibuka</a></center>';
			}else{
				$thn_ajaran_reg_status = '<center><a class="btn btn-sm btn-danger circle" id="statusRegistrasi" href="javascript:void(0)" title="Status Registrasi" data-ind="O" data-id="'.$tahunAjaran->thn_ajaran_id.'">Ditutup</a></center>';
			}
			$row[] = $thn_ajaran_reg_status;
			$row[] = $tahunAjaran->thn_ajaran_reg_awal;
			$row[] = $tahunAjaran->thn_ajaran_reg_akhir;
			$row[] = $tahunAjaran->thn_ajaran_verifikasi_tes_awal;
			$row[] = $tahunAjaran->thn_ajaran_verifikasi_tes_akhir;
			$row[] = $tahunAjaran->thn_ajaran_daftar_ulang_awal;
			$row[] = $tahunAjaran->thn_ajaran_daftar_ulang_akhir;
			$row[] = $tahunAjaran->thn_ajaran_kelulusan;
			
			$row[] = $tahunAjaran->thn_ajaran_reg_awal_reguler;
			$row[] = $tahunAjaran->thn_ajaran_reg_akhir_reguler;
			$row[] = $tahunAjaran->thn_ajaran_verifikasi_tes_awal_reguler;
			$row[] = $tahunAjaran->thn_ajaran_verifikasi_tes_akhir_reguler;
			$row[] = $tahunAjaran->thn_ajaran_daftar_ulang_awal_reguler;
			$row[] = $tahunAjaran->thn_ajaran_daftar_ulang_akhir_reguler;
			$row[] = $tahunAjaran->thn_ajaran_kelulusan_reguler;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$tahunAjaran->thn_ajaran_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$tahunAjaran->thn_ajaran_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tahunAjaranModel->count_all(),
						"recordsFiltered" => $this->tahunAjaranModel->count_filtered(),
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
			'thn_ajaran_nama' => $this->input->post('thn_ajaran_nama'),
			'thn_ajaran_status' => $this->input->post('thn_ajaran_status'),
			'thn_ajaran_reg_awal' => $this->input->post('thn_ajaran_reg_awal'),
			'thn_ajaran_reg_akhir' => $this->input->post('thn_ajaran_reg_akhir'),
			'thn_ajaran_reg_status' => $this->input->post('thn_ajaran_reg_status'),
			'thn_ajaran_verifikasi_tes_awal' => $this->input->post('thn_ajaran_verifikasi_tes_awal'),
			'thn_ajaran_verifikasi_tes_akhir' => $this->input->post('thn_ajaran_verifikasi_tes_akhir'),
			'thn_ajaran_daftar_ulang_awal' => $this->input->post('thn_ajaran_daftar_ulang_awal'),
			'thn_ajaran_daftar_ulang_akhir' => $this->input->post('thn_ajaran_daftar_ulang_akhir'),
			'thn_ajaran_kelulusan' => $this->input->post('thn_ajaran_kelulusan'),

			'thn_ajaran_reg_awal_reguler' => $this->input->post('thn_ajaran_reg_awal_reguler'),
			'thn_ajaran_reg_akhir_reguler' => $this->input->post('thn_ajaran_reg_akhir_reguler'),
			'thn_ajaran_verifikasi_tes_awal_reguler' => $this->input->post('thn_ajaran_verifikasi_tes_awal_reguler'),
			'thn_ajaran_verifikasi_tes_akhir_reguler' => $this->input->post('thn_ajaran_verifikasi_tes_akhir_reguler'),
			'thn_ajaran_daftar_ulang_awal_reguler' => $this->input->post('thn_ajaran_daftar_ulang_awal_reguler'),
			'thn_ajaran_daftar_ulang_akhir_reguler' => $this->input->post('thn_ajaran_daftar_ulang_akhir_reguler'),
			'thn_ajaran_kelulusan_reguler' => $this->input->post('thn_ajaran_kelulusan_reguler')
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));
	}
	
	function save(){
		$data = array(
			'thn_ajaran_nama' => $this->input->post('thn_ajaran_nama'),
			'thn_ajaran_status' => $this->input->post('thn_ajaran_status'),
			'thn_ajaran_reg_awal' => $this->input->post('thn_ajaran_reg_awal'),
			'thn_ajaran_reg_akhir' => $this->input->post('thn_ajaran_reg_akhir'),
			'thn_ajaran_reg_status' => $this->input->post('thn_ajaran_reg_status'),
			'thn_ajaran_verifikasi_tes_awal' => $this->input->post('thn_ajaran_verifikasi_tes_awal'),
			'thn_ajaran_verifikasi_tes_akhir' => $this->input->post('thn_ajaran_verifikasi_tes_akhir'),
			'thn_ajaran_daftar_ulang_awal' => $this->input->post('thn_ajaran_daftar_ulang_awal'),
			'thn_ajaran_daftar_ulang_akhir' => $this->input->post('thn_ajaran_daftar_ulang_akhir'),
			'thn_ajaran_kelulusan' => $this->input->post('thn_ajaran_kelulusan'),

			'thn_ajaran_reg_awal_reguler' => $this->input->post('thn_ajaran_reg_awal_reguler'),
			'thn_ajaran_reg_akhir_reguler' => $this->input->post('thn_ajaran_reg_akhir_reguler'),
			'thn_ajaran_verifikasi_tes_awal_reguler' => $this->input->post('thn_ajaran_verifikasi_tes_awal_reguler'),
			'thn_ajaran_verifikasi_tes_akhir_reguler' => $this->input->post('thn_ajaran_verifikasi_tes_akhir_reguler'),
			'thn_ajaran_daftar_ulang_awal_reguler' => $this->input->post('thn_ajaran_daftar_ulang_awal_reguler'),
			'thn_ajaran_daftar_ulang_akhir_reguler' => $this->input->post('thn_ajaran_daftar_ulang_akhir_reguler'),
			'thn_ajaran_kelulusan_reguler' => $this->input->post('thn_ajaran_kelulusan_reguler')
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
	
	function updateStatusRegistrasi($id, $ind)
	{
		$data = array(
			'thn_ajaran_reg_status' => $ind
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));		
	}
	
	function updateStatusTahunAngkatan($id, $ind)
	{
		$data = array(
			'thn_ajaran_status' => $ind
			);
        $this->mcrud->update($this->tables,$data, $this->pk,$id);
		echo json_encode(array("status" => TRUE));		
	}
}
