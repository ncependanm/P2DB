<?php
class infoPendaftaranReg extends CI_Controller{
    
    var $folder =   "backend/infoPendaftaranReg";
    var $title  =   "Data Calon Siswa (Reguler)";
    var $titleInputan  =   "Form Calon Siswa (Reguler)";
    
    function __construct() {
        parent::__construct();
		$this->load->model('reg_calon_siswa_model','regCalonSiswaModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Calon Siswa (Reguler) - SIAKAD ONLINE";
        $data['menu'] = "infoPendaftaran";
        $data['subMenu'] = "infoPendaftaranReg";
        $data['subMenuB'] = "";
		
		$sql = "SELECT * FROM tbl_agama";
        $data['agama'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_propinsi";
        $data['propinsi'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_pendidikan";
        $data['pendidikan'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_pekerjaan";
        $data['pekerjaan'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_sekolah";
        $data['sekolah'] = $this->db->query($sql)->result();
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->regCalonSiswaModel->get_datatables('R');
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
			if($regCalonSiswa->reg_akun_jalur_daftar == 'P'){
				$jalurDaftar = "Prestasi";
			}else if($regCalonSiswa->reg_akun_jalur_daftar == 'R'){
				$jalurDaftar = "Reguler";
			}
			$row[] = $jalurDaftar;
			if($regCalonSiswa->reg_akun_status_validasi == 'N'){
				$statusValidasi = '<center><a class="btn btn-sm btn-danger circle" id="statusValidasi" href="javascript:void(0)" title="Status Daftar Ulang" data-ind="Y" data-id="'.$regCalonSiswa->reg_akun_id.'">Belum Validasi</a></center>';
			}else if($regCalonSiswa->reg_akun_status_validasi == 'Y'){
				$statusValidasi = '<center><a class="btn btn-sm btn-info circle" id="statusValidasi" href="javascript:void(0)" title="Status Daftar Ulang" data-ind="N" data-id="'.$regCalonSiswa->reg_akun_id.'">Sudah Validasi</a></center>';
			}
			$row[] = $statusValidasi;
			if($regCalonSiswa->reg_akun_status == 'N'){
				$status = '<center><a class="btn btn-sm btn-danger circle" id="statusDaftarUlang" href="javascript:void(0)" title="Status Daftar Ulang" data-ind="Y" data-id="'.$regCalonSiswa->reg_akun_id.'">Belum Daftar Ulang</a></center>';				
			}else if($regCalonSiswa->reg_akun_status == 'Y'){
				$status = '<center><a class="btn btn-sm btn-info circle" id="statusDaftarUlang" href="javascript:void(0)" title="Status Daftar Ulang" data-ind="N" data-id="'.$regCalonSiswa->reg_akun_id.'">Sudah Daftar Ulang</a></center>';
			}
			$row[] = $status;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Lihat" onclick="lihat('."'".$regCalonSiswa->reg_akun_id."'".')"><i class="icon-magnifier"></i> Lihat</a>
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Lihat" onclick="showInputan2('."'".$regCalonSiswa->reg_akun_id."'".')">Ubah</a>
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Lihat" onclick="showUploadFoto('."'".$regCalonSiswa->reg_akun_id."','".$regCalonSiswa->reg_akun_nisn."'".')">Upload Foto</a>
					<a href="'.base_url().'printing/buktiPendaftaran/'.$regCalonSiswa->reg_akun_id.'" class="btn btn-primary" target="_blank">Cetak Bukti Pendaftaran</a>
					<a href="'.base_url().'printing/kartuUjian/'.$regCalonSiswa->reg_akun_id.'" class="btn btn-primary" target="_blank">Cetak Kartu Peserta</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->regCalonSiswaModel->count_all('R'),
						"recordsFiltered" => $this->regCalonSiswaModel->count_filtered('R'),
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
        
		$dataSkhu = $this->mcrud->getByID("tbl_reg_data_nilai_skhu",  "reg_data_nilai_skhu_reg_akun_id",$id)->row_array();
        
		echo json_encode(array("status" => TRUE, "dataAkun" => $dataAkun, "dataDiri" => $dataDiri, "dataOrtu" => $dataOrtu,
								"dataOrtuI" => $dataOrtuI, "dataNilai" => $dataNilai, "dataPrestasi" => $dataPrestasi, "dataOrtuW" => $dataOrtuW,
								"dataPrestasiSatu" => $dataPrestasiSatu, "dataPrestasiDua" => $dataPrestasiDua, "dataPrestasiTiga" => $dataPrestasiTiga, "dataPrestasiEmpat" => $dataPrestasiEmpat,
								"dataSkhu" => $dataSkhu));
		
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
		$nilaiQuran = $this->input->post('reg_data_nilai_tes_baca_tulis_alquran');
		$nilaiAhlaq = $this->input->post('reg_data_nilai_tes_ahlaq');
		$nilaiMinat = $this->input->post('reg_data_nilai_tes_minat_bakat');
		$nilaiInggris = $this->input->post('reg_data_nilai_tes_bhs_inggris');
		$nilaiWawancara = (($nilaiQuran + $nilaiAhlaq + $nilaiInggris + $nilaiMinat) / 130) * 100;
		$data = array(
			'reg_data_nilai_tes_reg_akun_id' => $id,
			'reg_data_nilai_tes_baca_tulis_alquran' => $nilaiQuran,
			'reg_data_nilai_tes_ahlaq' => $nilaiAhlaq,
			'reg_data_nilai_tes_minat_bakat' => $nilaiMinat,
			'reg_data_nilai_tes_bhs_inggris' => $nilaiInggris,
			'reg_data_nilai_wawancara' => round($nilaiWawancara, 1)
		);
		$sqlTblRegDataNilaiTes =  $this->db->get_where('tbl_reg_data_nilai_tes',array('reg_data_nilai_tes_reg_akun_id'=>$id));
		if($sqlTblRegDataNilaiTes->num_rows()>0) {
			$this->mcrud->update('tbl_reg_data_nilai_tes', $data, 'reg_data_nilai_tes_reg_akun_id', $id);			
		} else {
			$this->db->insert('tbl_reg_data_nilai_tes', $data);
		}
		echo json_encode(array("status" => TRUE));
	}
	
	public function uploadFoto(){
		$fileName = $this->input->post('file', TRUE);
		$id = $this->input->post('idN');
		$nisn = $this->input->post('nisn');

		$config['upload_path'] = './assets/upload/peserta/'; 
		$config['file_name'] = $nisn.time();
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;
		$config['max_width'] = 240;
		$config['max_height'] = 300;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
			  
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msgUpload',$this->upload->display_errors()); 
			redirect('backend/infoPendaftaran'); 
		} else {
			$media = $this->upload->data();
			$inputFileName = 'assets/upload/peserta/'.$media['file_name'];
			
			$data = array(
				'reg_data_diri_img' => $inputFileName
			);			
			$this->mcrud->update('tbl_reg_data_diri', $data, 'reg_data_diri_reg_akun_id', $id);			
			$this->session->set_flashdata('msgUpload','Sukses Upload Foto'); 
			redirect('backend/infoPendaftaran'); 
		}  
	} 
}