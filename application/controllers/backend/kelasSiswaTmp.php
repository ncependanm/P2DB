<?php
class kelasSiswaTmp extends CI_Controller{
    
    var $folder =   "backend/kelasSiswaTmp";
    var $tables =   "tbl_kelas_siswa_tmp";
    var $pk     =   "kelas_siswa_tmp_id";
    var $title  =   "Daftar Siswa Kelas";
    var $titleInputan  =   "Form";
    
    function __construct() {
        parent::__construct();
		$this->load->model('kelas_siswa_model','kelasSiswaModel');
    }
    
    function index($idRuangan, $idThnAjaran)
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Siswa Per Kelas - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "kelas";
        $data['subMenuB'] = "";
        $data['idRuangan'] = $idRuangan;
        $data['idThnAjaran'] = $idThnAjaran;
		
/*		$sql = "SELECT * FROM tbl_siswa WHERE siswa_kelas_ind = 'N'";
        $data['siswa'] = $this->db->query($sql)->result(); */
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	function loadTableSiswa($idRuangan, $idThnAjaran){
		
		$list = $this->kelasSiswaModel->get_datatables($idRuangan, $idThnAjaran);
		$data = array();
		$no = 0;
		
		foreach ($list as $kelasSiswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $kelasSiswa->thn_ajaran_nama;
			$row[] = $kelasSiswa->kelas_nama." ".$kelasSiswa->jurusan_nama." ".$kelasSiswa->ruangan_nama;
			$row[] = $kelasSiswa->siswa_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$kelasSiswa->kelas_siswa_tmp_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kelasSiswaModel->count_all(),
						"recordsFiltered" => $this->kelasSiswaModel->count_filtered($idRuangan, $idThnAjaran),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	function saveSiswa()
	{
		$idSiswa = $this->input->post('kelas_siswa_tmp_siswa_id');
		$data = array(
			'kelas_siswa_tmp_thn_ajaran_id' => $this->input->post('idThnAjaranTmp'),
			'kelas_siswa_tmp_ruangan_id' => $this->input->post('idRuanganTmp'),
			'kelas_siswa_tmp_siswa_id' => $idSiswa
		);
		$this->db->insert('tbl_kelas_siswa_tmp',$data);
		
		$data = array(
			'siswa_kelas_ind' => "Y"
			);
        $this->mcrud->update("tbl_siswa",$data, "siswa_id",$idSiswa);
		echo json_encode(array("status" => TRUE));
	}
	
    function delete($id)
    {
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id))->result();
		foreach ($chekid as $r)
		{
			$idSiswa = $r->kelas_siswa_tmp_siswa_id;
			$data = array(
				'siswa_kelas_ind' => 'N'
			);
			$this->mcrud->update('tbl_siswa',$data, 'siswa_id',$idSiswa);
			$this->mcrud->delete($this->tables,  $this->pk,  $id);
		}
        echo json_encode(array("status" => TRUE));
    }
	
	function tampilkanSiswa($idRuangan)
    {
		$chekid = $this->db->get_where("tbl_ruangan",array(ruangan_id=>$idRuangan))->result();
		foreach ($chekid as $r)
		{
			$idKelas = $r->ruangan_kelas_id;
		}
		$sql = "SELECT * FROM tbl_siswa WHERE siswa_kelas_id = '".$idKelas."' AND siswa_kelas_ind = 'N'";
        $data = $this->db->query($sql)->result();
		echo "<option value=''>Pilih Siswa</option>";
        foreach ($data as $r)
        {
            echo "<option value='$r->siswa_id'>".  strtoupper($r->siswa_nisn)." - ".strtoupper($r->siswa_nama)."</option>";
        }
    }	
}