<?php
class nilai extends CI_Controller{
    
    var $folder =   "backend/nilai";
    var $tables =   "tbl_nilai";
    var $pk     =   "nilai_id";
    var $title  =   "Daftar Nilai";
    var $titleInputan  =   "Form Nilai";
    
    function __construct() {
        parent::__construct();
		$this->load->model('nilai_model','nilaiModel');
		$this->load->model('kelas_siswa_model','kelasSiswaModel');
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

		if($this->session->userdata('id_users')!='')
		{
		$sql = "select * FROM tbl_jadwal_pelajaran tjp 
			JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
			JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
			JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
 			JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
			WHERE guru_id = ". $this->session->userdata('id_akun') ." 
			GROUP BY ruangan_id 
			ORDER BY tr.ruangan_id ASC";
        $data['kelas'] = $this->db->query($sql)->result();
		}		
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
	
	public function loadTable($idRuangan, $idThnAjaran, $idMataPelajaran, $idGuru, $ind)
	{
	if($ind == 'B'){
				$idSemester = $this->session->userdata('id_semester');
		$sql = "SELECT * FROM tbl_kelas_siswa_tmp WHERE kelas_siswa_tmp_ruangan_id = ". $idRuangan ."";
		$dataSiswa = $this->db->query($sql)->result();
		$idSiswaIN = "";
		$koma = "";
		foreach ($dataSiswa as $s)
		{
			$idSiswaIN .= $koma . $s->kelas_siswa_tmp_id; 
			$koma = ",";
		}
		
		$sql = "SELECT * FROM tbl_nilai WHERE nilai_mata_pelajaran_id = ". $idMataPelajaran ." 
				AND nilai_guru_id = ". $idGuru ." 
				AND nilai_kelas_siswa_tmp_id IN(". $idSiswaIN .")";
		$dataNilai = $this->db->query($sql)->result();
		$ada = false;
		foreach ($dataSiswa as $s)
		{
			$dataInsertNilai = array(
				'nilai_mata_pelajaran_id' => $idMataPelajaran,
				'nilai_guru_id' => $idGuru,
				'nilai_kelas_siswa_tmp_id' => $s->kelas_siswa_tmp_id,
				'nilai_semester_id' => $idSemester
			);
			$ada = false;
			foreach ($dataNilai as $n)
			{
				if($s->kelas_siswa_tmp_id == $n->nilai_kelas_siswa_tmp_id){
					$ada = true;
					break;
				}
			}
			if($ada == false){
				$this->db->insert($this->tables,$dataInsertNilai);	
			}
		}	
	}

		
		
		$list = $this->nilaiModel->get_datatables($idRuangan, $idThnAjaran, $idMataPelajaran, $idGuru);
		$data = array();
		$no = 0;
		
		foreach ($list as $kelasSiswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $kelasSiswa->siswa_nisn;
			$row[] = $kelasSiswa->siswa_nama;
			$row[] = $kelasSiswa->nilai_tugas;
			$row[] = $kelasSiswa->nilai_kuis;
			$row[] = $kelasSiswa->nilai_uts;
			$row[] = $kelasSiswa->nilai_uas;
			$row[] = $kelasSiswa->nilai_praktek;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$kelasSiswa->kelas_siswa_tmp_id."', '".$idMataPelajaran."', '". $idGuru ."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->nilaiModel->count_all(),
						"recordsFiltered" => $this->nilaiModel->count_filtered($idRuangan, $idThnAjaran,$idMataPelajaran, $idGuru),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	function prepareEdit($id, $idMataPelajaran, $idGuru, $idSemester)
    {
		$sql = "SELECT * FROM tbl_nilai 
				WHERE nilai_mata_pelajaran_id = ". $idMataPelajaran ." 
				AND nilai_guru_id = ". $idGuru ." 
				AND nilai_kelas_siswa_tmp_id = ". $id ." 
				AND nilai_semester_id = ". $idSemester ."";
		$data = $this->db->query($sql)->row_array();
        echo json_encode($data);
    }
	
	function save()
	{
		$idKelasSiswaTmp = $this->input->post('id');
		$idMataPelajaran = $this->input->post('idMP');
		$idGuru = $this->input->post('idGR');
		$idSemester = $this->input->post('idSMT');

		$data = array(
			'nilai_mata_pelajaran_id' => $idMataPelajaran,
			'nilai_guru_id' => $idGuru,
			'nilai_kelas_siswa_tmp_id' => $idKelasSiswaTmp,
			'nilai_semester_id' => $idSemester,
			'nilai_tugas' => $this->input->post('nilai_tugas'),
			'nilai_kuis' => $this->input->post('nilai_kuis'),
			'nilai_uts' => $this->input->post('nilai_uts'),
			'nilai_uas' => $this->input->post('nilai_uas'),
			'nilai_praktek' => $this->input->post('nilai_praktek')
		);
		$sql = "SELECT * FROM tbl_nilai 
				WHERE nilai_mata_pelajaran_id = ". $idMataPelajaran ." 
				AND nilai_guru_id = ". $idGuru ." 
				AND nilai_kelas_siswa_tmp_id = ". $idKelasSiswaTmp ." 
				AND nilai_semester_id = ". $idSemester ."";
		$nilai = $this->db->query($sql)->result();
		$ada = false;
		$idNilai = "";
		foreach ($nilai as $s)
		{
			$ada = true;
			$idNilai = $s->nilai_id;
		}
		if($ada){
			$this->mcrud->update($this->tables,$data, $this->pk,$idNilai);
		}else{
			$this->db->insert($this->tables,$data);	
		}
		echo json_encode(array("status" => TRUE));			
	}
	
}