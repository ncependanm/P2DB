<?php
class beranda extends CI_Controller{
    
    var $folder =   "backend/beranda";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
    
    $today = date('d-m-Y');
    $tglAwalReg;
    $tgl_awalreg;
    $tgl_today = strtotime($today);
    $sqlThnAjaran = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_reg_status = 'O'";
    $dataThn = $this->db->query($sqlThnAjaran)->result();

		foreach ($dataThn as $t)
		{
		    $tglAwalReg = $t->thn_ajaran_reg_awal_reguler;
	        $tgl_awalreg = strtotime($tglAwalReg);
		}
		$jenisDaftar = 'prestasi';
		if($tgl_today >= $tgl_awalreg) {
		$jenisDaftar = 'reguler';
		}
		$data['jenisDaftar'] = $jenisDaftar;
    
        $data['judulHalaman'] = "Beranda - SIAKAD ONLINE";
        $data['menu'] = "beranda";
        $data['subMenu'] = "";
        $data['subMenuB'] = "";
		$data['jadwalHariIni'] = "";
		
		$tgl = date('d-m-Y');
		$hari = date('D', strtotime($tgl));
		$hariList = array('Sun' => 0, 'Mon' => 1, 'Tue' => 2, 'Wed' => 3, 'Thu' => 4, 'Fri' => 5, 'Sat' =>6);
		$hariListTmp = array('Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' =>'Sabtu');
		$today = $hariList[$hari];
		$data['todayTmp'] = $hariListTmp[$hari];
			
		if($this->session->userdata('level') == 2){
			
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				JOIN tbl_ruangan ON(tbl_jadwal_pelajaran.jadwal_pelajaran_ruangan_id = tbl_ruangan.ruangan_id) 
				JOIN tbl_kelas ON(tbl_ruangan.ruangan_kelas_id = tbl_kelas.kelas_id) 
				JOIN tbl_jurusan ON(tbl_ruangan.ruangan_jurusan_id = tbl_jurusan.jurusan_id)
				WHERE jadwal_pelajaran_hari = ". $today ." AND jadwal_pelajaran_guru_id = ".$this->session->userdata('id_akun')." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
			$data['jadwalHariIni'] = $this->db->query($sql)->result();			
		} else if($this->session->userdata('level') == 4){	
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				JOIN tbl_ruangan ON(tbl_jadwal_pelajaran.jadwal_pelajaran_ruangan_id = tbl_ruangan.ruangan_id) 
				JOIN tbl_kelas ON(tbl_ruangan.ruangan_kelas_id = tbl_kelas.kelas_id) 
				JOIN tbl_jurusan ON(tbl_ruangan.ruangan_jurusan_id = tbl_jurusan.jurusan_id) 
				JOIN tbl_kelas_siswa_tmp ON(tbl_ruangan.ruangan_id = tbl_kelas_siswa_tmp.kelas_siswa_tmp_ruangan_id)  
				WHERE jadwal_pelajaran_hari = ". $today ." AND kelas_siswa_tmp_siswa_id = ".$this->session->userdata('id_akun')." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
			$data['jadwalHariIni'] = $this->db->query($sql)->result();			
		}
		
		$jmlCalonSiswa = 0;
		$jmlCalonSiswaValidasi = 0;
		$jmlCalonSiswaDaftarUlang = 0;
		$jmlCalonSiswaLulus = 0;
		$jmlCalonSiswaReg = 0;
		$jmlCalonSiswaValidasiReg = 0;
		$jmlCalonSiswaDaftarUlangReg = 0;
		$jmlCalonSiswaLulusReg = 0;
		$dataSiswaTmp = 0;
			$sql = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_reg_status = 'O'";
			$data['thnAjaranData'] = $this->db->query($sql)->result();
		
		if($this->session->userdata('level') == 1){
			
			$sql = "SELECT * FROM tbl_reg_akun Where reg_akun_jalur_daftar = 'P'";
			$jmlCalonSiswa = $this->db->query($sql)->num_rows();

			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status_validasi = 'Y'  AND reg_akun_jalur_daftar = 'P'";
			$jmlCalonSiswaValidasi = $this->db->query($sql)->num_rows();
			
			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status = 'Y' AND reg_akun_jalur_daftar = 'P'";
			$jmlCalonSiswaDaftarUlang = $this->db->query($sql)->num_rows();

			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status_kelulusan = 'Y'  AND reg_akun_jalur_daftar = 'P'";
			$jmlCalonSiswaLulus = $this->db->query($sql)->num_rows();
			
			
			$sql = "SELECT * FROM tbl_reg_akun Where reg_akun_jalur_daftar IN ('R','A')";
			$jmlCalonSiswaReg = $this->db->query($sql)->num_rows();

			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status_validasi = 'Y'  AND reg_akun_jalur_daftar IN ('R','A')";
			$jmlCalonSiswaValidasiReg = $this->db->query($sql)->num_rows();
			
			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status = 'Y' AND reg_akun_jalur_daftar IN ('R','A')";
			$jmlCalonSiswaDaftarUlangReg = $this->db->query($sql)->num_rows();

			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status_kelulusan = 'Y'  AND reg_akun_jalur_daftar IN ('R','A')";
			$jmlCalonSiswaLulusReg = $this->db->query($sql)->num_rows();
			
		} else if ($this->session->userdata('level') == 1){
			$sql = "SELECT * FROM tbl_reg_akun WHERE reg_akun_status_kelulusan = 'Y' AND reg_akun_id = ".$this->session->userdata('id_akun');
			$dataSiswaTmp = $this->db->query($sql)->num_rows();
		}
		$data['dataSiswaTmp'] = $dataSiswaTmp;
		$data['jmlCalonSiswa'] = $jmlCalonSiswa;
		$data['jmlCalonSiswaValidasi'] = $jmlCalonSiswaValidasi;
		$data['jmlCalonSiswaDaftarUlang'] = $jmlCalonSiswaDaftarUlang;
		$data['jmlCalonSiswaLulus'] = $jmlCalonSiswaLulus;
		
		$data['jmlCalonSiswaReg'] = $jmlCalonSiswaReg;
		$data['jmlCalonSiswaValidasiReg'] = $jmlCalonSiswaValidasiReg;
		$data['jmlCalonSiswaDaftarUlangReg'] = $jmlCalonSiswaDaftarUlangReg;
		$data['jmlCalonSiswaLulusReg'] = $jmlCalonSiswaLulusReg;
		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	function guruGetJadwalToday($idGuru)
	{

	}
	
	function updateJalurDaftar($id, $ind)
	{
		$data =  $this->db->get_where('tbl_reg_akun',array('reg_akun_status_validasi'=>'Y'));
        if($data->num_rows()>0)
        {
				
		$sql = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_status = 'A'";
		$data = $this->db->query($sql)->result();
		$idThnAjaran = "";
		$namaThnAjaran = "";
		$namaThnAjaranTmp = "";
			
		foreach ($data as $t)
		{
			$idThnAjaran = $t->thn_ajaran_id;
			$namaThnAjaran = $t->thn_ajaran_nama;
			$namaThnAjaranTmp = substr($namaThnAjaran,0,4);
		}

		$noreg = (mysql_num_rows(mysql_query("SELECT * FROM tbl_reg_akun WHERE reg_akun_no_reg LIKE '%regular_%'"))) + 1;
		$ketReg = '/regular_ppdb'.$namaThnAjaranTmp;
		if($noreg < 10)
			$noreg = "000".$noreg;
		elseif($noreg < 100)
			$noreg = "00".$noreg;
		elseif($noreg < 1000)
			$noreg = "0".$noreg;
		$noreg = $noreg.$ketReg;
		
		$data = array(
				'reg_akun_no_reg' => $noreg,
				'reg_akun_jalur_daftar' => $ind,
				);
			$this->mcrud->update("tbl_reg_akun",$data, "reg_akun_id",$id);
			
			
			$dataRegDataNilaiTes = array(
				'reg_data_nilai_tes_reg_akun_id' => $id,
				'reg_data_nilai_tes_bhs_inggris' => 0,
				'reg_data_nilai_tes_minat_bakat' => 0,
				'reg_data_nilai_tes_ahlaq' => 0,
				'reg_data_nilai_tes_baca_tulis_alquran' => 0,
				'reg_data_nilai_prestasi' => 0,
				'reg_data_nilai_raport' => 0,
				'reg_data_nilai_total' => 0
			);
			$sqlTblRegDataNilaiTes =  $this->db->get_where('tbl_reg_data_nilai_tes',array('reg_data_nilai_tes_reg_akun_id'=>$id));
			if($sqlTblRegDataNilaiTes->num_rows()>0) {
				$this->mcrud->updateArray('tbl_reg_data_nilai_tes', $dataRegDataNilaiTes, array('reg_data_nilai_tes_reg_akun_id'=>$id));
			} else {
				$this->db->insert('tbl_reg_data_nilai_tes', $dataRegDataNilaiTes);
			}
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}
}
