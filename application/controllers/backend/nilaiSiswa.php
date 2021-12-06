<?php
class nilaiSiswa extends CI_Controller{
    
    var $folder =   "backend/nilaiSiswa";
    var $tables =   "tbl_nilai";
    var $pk     =   "nilai_id";
    var $title  =   "Daftar Nilai";
    var $titleInputan  =   "Form Nilai";
    
    function __construct() {
        parent::__construct();
		$this->load->model('nilai_siswa_model','nilaiSiswaModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Nilai - SIAKAD ONLINE";
        $data['menu'] = "nilai";
        $data['subMenu'] = "";
        $data['subMenuB'] = "";

		$this->template->load('backend/template', $this->folder.'/index',$data);
    }

	function tampilkanMataPelajaran()
    {
		$nilai_ruangan_id = $_GET['nilai_ruangan_id'];
		$sql = "select * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE ruangan_id = ". $nilai_ruangan_id ." 
				AND guru_id = ". $this->session->userdata('id_akun') ." 
				AND tmp.mata_pelajaran_id NOT IN (0) 
				GROUP BY tmp.mata_pelajaran_id 
				ORDER BY tmp.mata_pelajaran_id ASC";

		$data = $this->db->query($sql)->result();
		echo "<option value=''>Pilih Mata Pelajaran</option>";
        foreach ($data as $r)
        {
            echo "<option value='$r->mata_pelajaran_id'>".  $r->mata_pelajaran_nama ."</option>";
        }
    }
	
	public function loadTable($idSiswa)
	{
		$list = $this->nilaiSiswaModel->get_datatables($idSiswa);
		$data = array();
		$no = 0;
		
		foreach ($list as $nilaiSiswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $nilaiSiswa->semester_nama;
			$row[] = $nilaiSiswa->mata_pelajaran_nama;
			$row[] = $nilaiSiswa->guru_nama;
			$row[] = $nilaiSiswa->nilai_tugas;
			$row[] = $nilaiSiswa->nilai_kuis;
			$row[] = $nilaiSiswa->nilai_uts;
			$row[] = $nilaiSiswa->nilai_uas;
			$row[] = $nilaiSiswa->nilai_praktek;
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->nilaiSiswaModel->count_all(),
						"recordsFiltered" => $this->nilaiSiswaModel->count_filtered($idSiswa),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}	
}