<?php
class daftarPrestasi extends CI_Controller{
    
    var $folder =   "backend/daftarPrestasi";
    var $title  =   "Data Calon Siswa";
    var $titleInputan  =   "Form Calon Siswa";
    
    function __construct() {
        parent::__construct();
		$this->load->model('daftar_reguler_model','daftarRegulerModel');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Calon Siswa Prerstasi - SIAKAD ONLINE";
        $data['menu'] = "daftarHadir";
        $data['subMenu'] = "daftarPrestasi";
        $data['subMenuB'] = "";
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->daftarRegulerModel->get_datatables('P');
		$data = array();
		$no = 0;
		$jalurDaftar = "";
		$status = "";
		$statusValidasi = "";
		
		foreach ($list as $regCalonSiswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $regCalonSiswa->reg_akun_no_reg;
			$row[] = $regCalonSiswa->reg_akun_nisn;
			$row[] = $regCalonSiswa->reg_akun_nama;
					   $int = (int)substr($regCalonSiswa->reg_akun_no_reg,0,4);
    	   $ruang = 0;
    	   if($int > 0 && $int <= 25) {
    		   $ruang = 1;
    	   } else if($int > 25 && $int <= 50) {
    		   $ruang = 2;
    	   } else if($int > 50 && $int <= 75) {
    		   $ruang = 3;
    	   } else if($int > 75 && $int <= 100) {
    		   $ruang = 4;
    	   } else if($int > 125 && $int <= 150) {
    		   $ruang = 5;
    	   } else if($int > 150 && $int <= 175) {
    		   $ruang = 6;
    	   } else if($int > 175 && $int <= 200) {
    		   $ruang = 7;
    	   } else if($int > 200 && $int <= 225) {
    		   $ruang = 8;
    	   } else if($int > 225 && $int <= 250) {
    		   $ruang = 9;
    	   } else if($int > 250 && $int <= 275) {
    		   $ruang = 10;
    	   } else if($int > 275 && $int <= 300) {
    		   $ruang = 11;
    	   } else if($int > 300 && $int <= 325) {
    		   $ruang = 12;
    	   } else if($int > 325 && $int <= 350) {
    		   $ruang = 13;
    	   } else if($int > 350 && $int <= 375) {
    		   $ruang = 14;
    	   } else if($int > 375 && $int <= 400) {
    		   $ruang = 15;
    	   } else if($int > 400 && $int <= 425) {
    		   $ruang = 16;
    	   } else if($int > 450 && $int <= 475) {
    		   $ruang = 17;
    	   } else if($int > 475 && $int <= 500) {
    		   $ruang = 18;
    	   }
			$row[] = $ruang;
					
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->daftarRegulerModel->count_all('P'),
						"recordsFiltered" => $this->daftarRegulerModel->count_filtered('P'),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	function getDataNew($id)
	{
        $dataAkun = $this->mcrud->getByID("tbl_reg_akun",  "reg_akun_id",$id)->row_array();
        $dataDiri = $this->mcrud->getByID("tbl_reg_data_diri 
											JOIN tbl_agama ON(tbl_reg_data_diri.reg_data_diri_agama_id = tbl_agama.agama_id)",
											"reg_data_diri_reg_akun_id",$id)->row_array();

        $dataOrtu = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'A'))->row_array();
        $dataOrtuI = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'I'))->row_array();
        $dataOrtuW = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'W'))->row_array();

        $dataNilai = $this->mcrud->getByID("tbl_reg_data_nilai",  "reg_data_nilai_reg_akun_id",$id)->row_array();
		
		$dataPrestasiSatu = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'1'))->row_array();
		$dataPrestasiDua = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'2'))->row_array();
		$dataPrestasiTiga = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'3'))->row_array();
		$dataPrestasiEmpat = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'4'))->row_array();
		
        $dataPrestasi = $this->mcrud->getByID("tbl_reg_data_prestasi",  "reg_data_prestasi_reg_akun_id",$id)->row_array();
        
		echo json_encode(array("status" => TRUE, "dataAkun" => $dataAkun, "dataDiri" => $dataDiri, "dataOrtu" => $dataOrtu,
								"dataOrtuI" => $dataOrtuI, "dataNilai" => $dataNilai, "dataPrestasi" => $dataPrestasi, "dataOrtuW" => $dataOrtuW,
								"dataPrestasiSatu" => $dataPrestasiSatu, "dataPrestasiDua" => $dataPrestasiDua, "dataPrestasiTiga" => $dataPrestasiTiga, "dataPrestasiEmpat" => $dataPrestasiEmpat));
		
	}
	
	function updateStatusDaftarUlang($id, $ind)
	{
		$data = array(
			'reg_akun_status' => $ind
			);
        $this->mcrud->update("tbl_reg_akun",$data, "reg_akun_id",$id);
		echo json_encode(array("status" => TRUE));		
	}
	
	function updateStatusValidasi($id, $ind)
	{
		$data = array(
			'reg_akun_status_validasi' => $ind
			);
        $this->mcrud->update("tbl_reg_akun",$data, "reg_akun_id",$id);
		echo json_encode(array("status" => TRUE));		
	}
	
	function save()
	{
		$hsl = $this->mcrud->cekNISN($this->input->post('inp_reg_akun_nisn'));
		if($hsl <= 0){
			$date = date("Y-m-d", time());
			$y = date("y");
			$noreg = (mysql_num_rows(mysql_query("SELECT * FROM tbl_reg_akun"))) + 1;
			if($noreg < 10)
				$noreg = "000".$noreg;
			elseif($noreg < 100)
				$noreg = "00".$noreg;
			elseif($noreg < 1000)
				$noreg = "0".$noreg;
			$noreg = $y.($y+1)."-SMA-".$noreg;
			
			$data = array(
				'reg_akun_no_reg' => $noreg,
				'reg_akun_nisn' => $this->input->post('inp_reg_akun_nisn'),
				'reg_akun_nama' => $this->input->post('inp_reg_akun_nama'),
				'reg_akun_password' => MD5($this->input->post('inp_reg_akun_nisn')),
				'reg_akun_jalur_daftar' => $this->input->post('inp_reg_akun_jalur_daftar')
			);
			$this->db->insert('tbl_reg_akun',$data);
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE, "msg" => "NISN Sudah Terdaftar"));
		}
	}

	function getNilaiTes($id)
    {
		$data = '';
		$sqlTblRegDataNilaiTes =  $this->db->get_where('tbl_reg_data_nilai_tes',array('reg_data_nilai_tes_reg_akun_id'=>$id));
		if($sqlTblRegDataNilaiTes->num_rows()>0) {
			$data = $this->mcrud->getByID('tbl_reg_data_nilai_tes',  'reg_data_nilai_tes_reg_akun_id',$id)->row_array();
			echo json_encode(array("status" => TRUE, "dataNilai" => $data));
		} else {
			echo json_encode(array("status" => FALSE, "dataNilai" => $data));
		}
    }
	
	function saveNilai()
	{
		$id = $this->input->post('id');
		$nilaiWawancara = $this->input->post('reg_data_nilai_wawancara');
		$nilaiSkhu = $this->input->post('reg_data_nilai_skhu');
		$nilaiTertulis = $this->input->post('reg_data_nilai_tertulis');
		
		$nilaiWawancaraTmp = $nilaiWawancara * 30 / 100;
		$nilaiSkhuTmp = $nilaiSkhu * 30 / 100;
		$nilaiTertulisTmp = $nilaiTertulis * 40 / 100;
		$totalNilai = $nilaiWawancaraTmp + $nilaiSkhuTmp + $nilaiTertulisTmp;
		$data = array(
			'reg_data_nilai_tes_reg_akun_id' => $id,
			'reg_data_nilai_wawancara' => round($nilaiWawancara,1),
			'reg_data_nilai_raport' => round($nilaiTertulis,1),
			'reg_data_nilai_prestasi' => round($nilaiSkhu,1),
			'reg_data_nilai_total' => round($totalNilai, 1)
		);			
		$this->mcrud->update('tbl_reg_data_nilai_tes', $data, 'reg_data_nilai_tes_reg_akun_id', $id);			
		echo json_encode(array("status" => TRUE));
	}
	
	
		
	public function upload(){
		  $fileName = $this->input->post('file', TRUE);

		  $config['upload_path'] = './assets/upload/'; 
		  $config['file_name'] = $fileName;
		  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
		  $config['max_size'] = 10000;

		  $this->load->library('upload', $config);
		  $this->upload->initialize($config); 
		  
		  if (!$this->upload->do_upload('file')) {
		   $error = array('error' => $this->upload->display_errors());
		   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
		   redirect('backend/nilaiPendaftaran'); 
		  } else {
		   $media = $this->upload->data();
		   $inputFileName = 'assets/upload/'.$media['file_name'];
		   
		   try {
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		   } catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		   }

		   $sheet = $objPHPExcel->getSheet(0);
		   $highestRow = $sheet->getHighestRow();
		   $highestColumn = $sheet->getHighestColumn();

		   for ($row = 2; $row <= $highestRow; $row++){  
			 $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			   NULL,
			   TRUE,
			   FALSE);
			   
				$dataSiswa = $this->db->query("SELECT * FROM tbl_reg_akun WHERE reg_akun_nisn = '" . $rowData[0][0] . "'")->result();
				foreach ($dataSiswa as $s)
				{
					$id = $s->reg_akun_id;
					$nilaiWawancara = $rowData[0][1];
					$nilaiTertulis = $rowData[0][2];
					$nilaiSkhu = 0;

					$nilaiWawancaraTmp = $nilaiWawancara * 30 / 100;
					$nilaiTertulisTmp = $nilaiTertulis * 40 / 100;
					$nilaiSkhuTmp = 0;
					$totalNilai;
					$sqlTblRegDataNilaiTes =  $this->db->get_where('tbl_reg_data_nilai_tes',array('reg_data_nilai_tes_reg_akun_id'=>$id));
					if($sqlTblRegDataNilaiTes->num_rows()>0) {
						$dataNilaiSkhu = $this->db->query("SELECT * FROM tbl_reg_data_nilai_tes WHERE reg_data_nilai_tes_reg_akun_id = '" . $id . "'")->result();
						foreach ($dataNilaiSkhu as $sk)
						{
							$nilaiSkhu = $sk->reg_data_nilai_raport;
							$nilaiSkhuTmp = $sk->reg_data_nilai_raport * 30 / 100;
						}
						$totalNilai = $nilaiWawancaraTmp + $nilaiTertulisTmp + $nilaiSkhuTmp;
						$data = array(
							'reg_data_nilai_tes_reg_akun_id' => $id,
							'reg_data_nilai_wawancara' => round($nilaiWawancara,1),
							'reg_data_nilai_raport' => round($nilaiSkhu,1),
							'reg_data_nilai_prestasi' => round($nilaiTertulis,1),
							'reg_data_nilai_total' => round($totalNilai, 1)
						);			
						$this->mcrud->update('tbl_reg_data_nilai_tes', $data, 'reg_data_nilai_tes_reg_akun_id', $id);			
					} else {
						$totalNilai = $nilaiWawancaraTmp + $nilaiTertulisTmp + $nilaiSkhuTmp;
						$data = array(
							'reg_data_nilai_tes_reg_akun_id' => $id,
							'reg_data_nilai_wawancara' => round($nilaiWawancara,1),
							'reg_data_nilai_raport' => round($nilaiSkhu,1),
							'reg_data_nilai_prestasi' => round($nilaiTertulis,1),
							'reg_data_nilai_total' => round($totalNilai, 1)
						);
						$this->db->insert('tbl_reg_data_nilai_tes', $data);
					}
				}
			} 
		    redirect('backend/nilaiPendaftaranReg'); 
		  }  
	} 
	
}