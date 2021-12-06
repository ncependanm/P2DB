<?php
class printing extends CI_Controller
{	
    function __construct() 
	{
        parent::__construct();
         $this->load->library('cfpdf');
    }
    
    function index()
    {
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);
		$teks = "Test Laporan PDF";
		$pdf->Cell(0,5, $teks, 1,1,'L');
		$pdf->Output();
    }
	
	function kartuUjian($id)
    {
		$sqlRegAkun = "SELECT * FROM tbl_reg_akun tra  
						JOIN tbl_reg_data_diri trd ON(tra.reg_akun_id = trd.reg_data_diri_reg_akun_id) 
						WHERE reg_akun_id=$id";
        $ra = $this->db->query($sqlRegAkun)->row_array();
		$sqlThnAjaran = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_reg_status='O'";
        $ta = $this->db->query($sqlThnAjaran)->row_array();
		$jalurDaftar = '';
		$jalurDaftarInd = '';
		if($ra['reg_akun_jalur_daftar'] == 'P'){
			$jalurDaftar = 'JALUR PRESTASI';
			$jalurDaftarInd = 'P';
		} else {
			$jalurDaftar = 'JALUR REGULER';
			$jalurDaftarInd = 'R';
		}
		
		if($jalurDaftarInd == 'P'){
	
        $pdf = new FPDF('p','mm',array(120,175));
        $pdf->AddPage();
       // head
       $pdf->SetFont('ARIAL','',12);
       $pdf->Cell(95, 5, 'KARTU TANDA PENDAFTARAN', 0, 1, 'C');
       $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(95, 5, 'PPDB SMAN 1 SIMPANG EMPAT', 0, 1, 'C');
       $pdf->Cell(95, 5, $jalurDaftar. ' ' .$ta['thn_ajaran_nama'], 0, 1, 'C');
       $pdf->Line(11, 25, 110, 25);
       
       $pdf->Image(base_url().'/assets/images/logoSMA.jpeg', 10, 10, 10);
       $pdf->Image(base_url().'/assets/images/logoP2DB.jpeg', 93, 12, 18);
	   
       
       $pdf->Image(base_url(). $ra['reg_data_diri_img'], 11, 28, 33);
       $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(45,2,'',0,0);
       $pdf->Cell(30,2,'',0,0);
       $pdf->Cell(20,2,'',0,1);
       $pdf->Cell(45,5,'',0,0);
       $pdf->Cell(30,5,'No Pendaftaran',0,1);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(50,5,'',0,0);
       $pdf->Cell(20,5,strtoupper($ra['reg_akun_no_reg']),0,1);
       $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'Nama Calon Siswa',0,1);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(50,5,'',0,0);
       $pdf->Cell(20,5,strtoupper($ra['reg_akun_nama']),0,1);
	   $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'NISN',0,1);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(50,5,'',0,0);
       $pdf->Cell(20,5,strtoupper($ra['reg_akun_nisn']),0,1);
	   $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'Kabupaten / Kota',0,1);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(50,5,'',0,0);
       $pdf->Cell(20,5,strtoupper($ra['reg_data_diri_alamat_kota']),0,1);
	   $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'Propinsi',0,1);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(50,5,'',0,0);
       $pdf->Cell(20,5,strtoupper($ra['reg_data_diri_alamat_propinsi']),0,1);
       $pdf->Line(11, 80, 110, 80);
	   
	   $pdf->SetFont('ARIAL','',10);
       // $pdf->Image(base_url().'/assets/images/logoP2DB.jpeg', 11, 83, 40);
       $pdf->Cell(95, 5, '', 0, 1);
       $pdf->Cell(50, 15, '', 0, 0);
       $pdf->Cell(25, 5, 'Simpang Empat,..........2017', 0, 1);
       $pdf->Cell(50, 15, '', 0, 0);
       $pdf->Cell(25, 5, 'Panitia', 0, 1);
       $pdf->Cell(95, 10, '', 0, 0);
       $pdf->Cell(25, 10, '', 0, 1);
       $pdf->Cell(50, 5, '', 0, 0);
       $pdf->Cell(25, 5, '.....................................', 0, 0);
       $pdf->Line(11, 110, 110, 110);
       
       $pdf->SetFont('ARIAL','',12);
       $pdf->Cell(1,5,'',0,1);
       $pdf->Cell(1,5,'',0,1);
       $pdf->Cell(130, 5, 'Perlengkapan   yang   harus  dibawa  saat  verifikasi', 0, 1);
       $pdf->Cell(130, 5, 'berkas:', 0, 1);
       $pdf->Cell(2, 2,'',0,1);
       $pdf->SetFont('ARIAL','',9);
       $pdf->Cell(5,5,'',0,0);
       $pdf->Cell(30,5,'- Printout formulir pendaftaran online yang terisi lengkap dan benar',0,1);
       $pdf->Cell(5,5,'',0,0);
       $pdf->Cell(30,5,'- Printout Screenshoot NISN dari web resmi : ',0,1);
       $pdf->Cell(7,5,'',0,0);
       $pdf->Cell(30,5,'http://nisn.data.kemdikbud.go.id',0,1);
       $pdf->Cell(5,5,'',0,0);
       $pdf->Cell(30,5,'- Fotocopy rapor sem 1-5 dilegalisir',0,1);
       $pdf->Cell(5,5,'',0,0);
       $pdf->Cell(30,5,'- Pas foto berwarna, uk. 4x6 = 2 lbr, 3x4 = 2 lbr',0,1);
       $pdf->Cell(5,5,'',0,0);
       $pdf->Cell(30,5,'- Surat Keterangan Berkelakuan baik dari Sekolah (Asli)',0,1);
       // buat tabel disini
		} else {
		$pdf = new FPDF('l','mm',array(175,120));
        $pdf->AddPage();
       // head
       $pdf->SetFont('ARIAL','',12);
       $pdf->Cell(12, 5, '', 0, 0);
       $pdf->Cell(95, 5, 'SMA NEGERI 1 SIMPANG EMPAT', 0, 1);
       $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(12, 5, '', 0, 0);
       $pdf->Cell(95, 5, 'PENERIMAAN SISWA BARU '. $jalurDaftar, 0, 0);
       $pdf->Cell(12, 5, 'No Peserta', 0, 1);
       $pdf->Cell(12, 5, '', 0, 0);
       $pdf->Cell(95, 5, 'TAHUN PELAJARAN ' .$ta['thn_ajaran_nama'], 0, 0);
       $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(12, 5, strtoupper($ra['reg_akun_no_reg']), 0, 1);
       $pdf->Line(11, 25, 165, 25);
       
       $pdf->Image(base_url().'/assets/images/logoSMA.jpeg', 10, 10, 10);
	   
       
       $pdf->Image(base_url(). $ra['reg_data_diri_img'], 11, 28, 33);
       $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(45,2,'',0,0);
       $pdf->Cell(30,2,'',0,0);
       $pdf->Cell(20,2,'',0,1);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(170,5,'KARTU PENERIMAAN SISWA BARU',0,1,'C');
       $pdf->Cell(20,2,'',0,1);
       $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'NAMA',0,0);
       $pdf->Cell(3,5,':',0,0);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(20,5,strtoupper($ra['reg_akun_nama']),0,1);
	   $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'NISN',0,0);
       $pdf->Cell(3,5,':',0,0);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(20,5,strtoupper($ra['reg_akun_nisn']),0,1);
	   $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'ASAL SEKOLAH',0,0);
       $pdf->Cell(3,5,':',0,0);
	   $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(20,5,strtoupper($ra['reg_data_diri_lulusan']),0,1);
	   $pdf->Cell(45,5,'',0,0);
	   $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(30,5,'RUANG TES',0,0);
       $pdf->Cell(3,5,':',0,0);
	   $pdf->SetFont('ARIAL','B',10);
	   $int = (int)substr($ra['reg_akun_no_reg'],0,4);
	   $ruang = 0;if($int > 0 && $int <= 25) {
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
	   }
       $pdf->Cell(20,5,$ruang,0,1);
       $pdf->Line(11, 80, 165, 80);
	   
	   $pdf->SetFont('ARIAL','',10);
       // $pdf->Image(base_url().'/assets/images/logoP2DB.jpeg', 11, 83, 40);
       $pdf->Cell(100, 15, '', 0, 0);
       $pdf->Cell(25, 5, 'Simpang Empat,..........2017', 0, 1);
       $pdf->Cell(100, 15, '', 0, 0);
       $pdf->Cell(25, 5, 'Panitia Pelaksana', 0, 1);
       $pdf->Cell(95, 10, '', 0, 0);
       $pdf->Cell(25, 10, '', 0, 1);
       $pdf->Cell(100, 5, '', 0, 0);
       $pdf->Cell(25, 5, '.....................................', 0, 1);
       $pdf->Cell(25, 5, '', 0, 1);
	   $pdf->SetFont('ARIAL','I',10);
       $pdf->Cell(25, 5, '* Kartu peserta ini sah apabila ada tanda tangan panitia dan stemple basah P2DB '.$ta['thn_ajaran_nama'], 0, 1);
       $pdf->Cell(25, 5, '** Kartu sangat wajib dibawa pada saat tes tertulis dan kesehatan serta penelusuran minat bakat ', 0, 1);
       $pdf->Line(11, 100, 165, 100);			
		}
       $pdf->Output();
    }
	
	function buktiPendaftaran($id)
    {
		$sqlRegAkun = "SELECT * FROM tbl_reg_akun tra 
						JOIN tbl_reg_data_diri trd ON(tra.reg_akun_id = trd.reg_data_diri_reg_akun_id) 
						JOIN tbl_agama ta ON(trd.reg_data_diri_agama_id = ta.agama_id)
						WHERE reg_akun_id = $id";
        $ra = $this->db->query($sqlRegAkun)->row_array();
		$sqlRegDataOrtu = "SELECT * FROM tbl_reg_data_ortu tor 
							LEFT JOIN tbl_pendidikan tpi ON(tor.reg_data_ortu_pendidikan_id = tpi.pendidikan_id) 
							LEFT JOIN tbl_pekerjaan tpj ON(tor.reg_data_ortu_pekerjaan_id = tpj.pekerjaan_id) 
							WHERE reg_data_ortu_reg_akun_id = $id";
        $dataOrtu = $this->db->query($sqlRegDataOrtu)->result();
		$sqlRegPrestasi = "SELECT * FROM tbl_reg_data_prestasi WHERE reg_data_prestasi_reg_akun_id = $id";
		$dataPrestasi = $this->db->query($sqlRegPrestasi)->result();
		$sqlThnAjaran = "SELECT * FROM tbl_thn_ajaran WHERE thn_ajaran_reg_status='O'";
        $ta = $this->db->query($sqlThnAjaran)->row_array();
  $dateNow = date('d-m-Y');
        $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
       // head
       $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(50, 5, '', 0, 0);
       $pdf->Cell(0, 5, 'FORMULIR CALON PESERTA DIDIK BARU', 0, 1);
       $pdf->Cell(35, 5, '', 0, 0);
	   if($ra['reg_akun_jalur_daftar'] == 'P'){
       $pdf->Cell(110, 5, 'SEKOLAH MENENGAH ATAS NEGERI 1 SIMPANG EMPAT', 0, 0);
       $pdf->SetFont('ARIAL','B',16);
	   } else {
       $pdf->Cell(105, 5, 'SEKOLAH MENENGAH ATAS NEGERI 1 SIMPANG EMPAT', 0, 0);
       $pdf->SetFont('ARIAL','B',12);		   
	   }
			$pdf->Cell(10, 5, $ra['reg_akun_no_reg'], 0, 1);
       $pdf->SetFont('ARIAL','B',10);
       $pdf->Cell(60, 5, '', 0, 0);
       $pdf->Cell(0, 5, 'TAHUN PELAJARAN '.$ta['thn_ajaran_nama'], 0, 1);
       $pdf->SetFont('ARIAL','',10);
       $pdf->Image(base_url().'/assets/images/logoSMA.jpeg', 10, 10, 10);
       $pdf->Line(10, 25, 200, 25);
       $pdf->SetFont('ARIAL','',10);
       $pdf->Cell(0, 5, 'IDENTITAS PESERTA DIDIK', 0, 1, 'C');
       $pdf->Line(10, 30, 200, 30);
       $pdf->Cell(60, 5, 'a. Nama Lengkap', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(55, 5, $ra['reg_data_diri_nama'], 0, 0);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(30, 5, 'Nama Panggilan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_panggilan'], 0, 1);
       $pdf->Cell(60, 5, 'b. Jenis Kelamin', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
	   $jenisKelamin = '';
	   if($ra['reg_data_diri_jenis_kelamin'] == 'L'){
		   $jenisKelamin = 'Laki-laki';
	   } else {
		   $jenisKelamin = 'Perempuan';
	   }
       $pdf->Cell(3, 5, $jenisKelamin, 0, 1);
       $pdf->Cell(60, 5, 'c. NISN', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(60, 5, $ra['reg_akun_nisn'], 0, 0);
       $pdf->Cell(8, 5, 'NIS :', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_nis'], 0, 1);
       $pdf->Cell(60, 5, 'd. No Ujian Nasional', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_no_un'], 0, 1);
       $pdf->Cell(60, 5, 'e. No Induk Kependudukan (NIK)', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_no_nik'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, 'NPSN Sekolah Asal', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_npsn'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, 'Nama Sekolah Asal', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_lulusan'], 0, 1);
       $pdf->Cell(60, 5, 'f. Tempat, Tanggal Lahir', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_tempat_lahir'].', '.$ra['reg_data_diri_tgl_lahir'], 0, 1);
       $pdf->Cell(60, 5, 'g. Agama', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['agama_nama'], 0, 1);
       $pdf->Cell(60, 5, 'h. Alamat Tempat Tinggal', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, '-', 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Dusun', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(60, 5, $ra['reg_data_diri_alamat_dusun'], 0, 0);
       $pdf->Cell(8, 5, 'RT : ', 0, 0);
       $pdf->Cell(10, 5, $ra['reg_data_diri_alamat_rt'], 0, 0);
       $pdf->Cell(9, 5, 'RW : ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_alamat_rw'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Kelurahan / Desa', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(60, 5, $ra['reg_data_diri_alamat_desa'], 0, 0);
       $pdf->Cell(19, 5, 'Kode Pos : ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_alamat_kodepos'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Kecamatan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_alamat_kecamatan'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Kabupaten / Kota', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(60, 5, $ra['reg_data_diri_alamat_kota'], 0, 0);
       $pdf->Cell(16, 5, 'Propinsi : ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_alamat_propinsi'], 0, 1);
       $pdf->Cell(60, 5, 'i. No Telepon Rumah', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(60, 5, $ra['reg_data_diri_no_telp_rumah'], 0, 0);
       $pdf->Cell(15, 5, 'No HP :', 0, 0);
       $pdf->Cell(5, 5, $ra['reg_data_diri_no_telp'], 0, 1);
       $pdf->Cell(60, 5, 'j. Email Pribadi', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_email'], 0, 1);
       $pdf->Cell(60, 5, 'k. No KKS', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, '-', 0, 1);
       $pdf->Cell(60, 5, 'l. Apakah Penerima KPS / PKH', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_no_kks'], 0, 1);
       $pdf->Cell(60, 5, 'm. Usulan dari sekolah layak PIP', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
	   $layak = '';
	   if($ra['reg_data_diri_usulan_layak_pip'] == 'Y'){
		   $layak = 'Ya';
	   } else {
		   $layak = 'Tidak';
	   }
       $pdf->Cell(15, 5, $layak, 0, 0);
       $pdf->Cell(25, 5, 'Alasan Layak ', 0, 0);
       $pdf->Cell(3, 5, ": ".$ra['reg_data_diri_alasan_layak'], 0, 1);
	   $kip = '';
	   if($ra['reg_data_diri_penerima_kip'] == 'Y'){
		   $kip = 'Ya';
	   } else {
		   $kip = 'Tidak';
	   }
       $pdf->Cell(60, 5, 'n. Penerima KIP', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(15, 5, $kip, 0, 0);
       $pdf->Cell(25, 5, 'No KIP ', 0, 0);
       $pdf->Cell(3, 5, ": ".$ra['reg_data_diri_no_kip'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, 'Nama Tertera di KIP', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_nama_kip'], 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, 'Alasan Menolah KIP', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_alasan_menolak_kip'], 0, 1);
       $pdf->Cell(60, 5, 'o. No Registrasi Akta Lahir', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $ra['reg_data_diri_no_reg_akta'], 0, 1);
	   
	   $namaA = '';
	   $tglLahirA = '';
	   $nikA = '';
	   $pekerjaanA = '';
	   $pendidikanA = '';
	   $penghasilanA = '';
	   $namaI = '';
	   $tglLahirI = '';
	   $nikI = '';
	   $pekerjaanI = '';
	   $pendidikanI = '';
	   $penghasilanI = '';
	   $namaW = '';
	   $tglLahirW = '';
	   $nikW = '';
	   $pekerjaanW = '';
	   $pendidikanW = '';
	   $penghasilanW = '';
	   foreach ($dataOrtu as $ro)
	   {
		   if($ro->reg_data_ortu_ind == 'A'){
			   $namaA = $ro->reg_data_ortu_nama;
			   $tglLahirA = $ro->reg_data_ortu_tgl_lahir;
			   $nikA = $ro->reg_data_ortu_no_nik;
			   $pekerjaanA = $ro->pekerjaan_nama;
			   $pendidikanA = $ro->pendidikan_nama;
			   $penghasilanA = $ro->reg_data_ortu_penghasilan;
		   } else if($ro->reg_data_ortu_ind == 'I'){
			   $namaI = $ro->reg_data_ortu_nama;
			   $tglLahirI = $ro->reg_data_ortu_tgl_lahir;
			   $nikI = $ro->reg_data_ortu_no_nik;
			   $pekerjaanI = $ro->pekerjaan_nama;
			   $pendidikanI = $ro->pendidikan_nama;
			   $penghasilanI = $ro->reg_data_ortu_penghasilan;
		   } else if($ro->reg_data_ortu_ind == 'W'){
			   $namaW = $ro->reg_data_ortu_nama;
			   $tglLahirW = $ro->reg_data_ortu_tgl_lahir;
			   $nikW = $ro->reg_data_ortu_no_nik;
			   $pekerjaanW = $ro->pekerjaan_nama;
			   $pendidikanW = $ro->pendidikan_nama;
			   $penghasilanW = $ro->reg_data_ortu_penghasilan;
		   }
	   }
       $pdf->Line(10, 150, 200, 150);
       $pdf->Cell(0, 5, 'DATA AYAH KANDUNG', 0, 1, 'C');
       $pdf->Line(10, 145, 200, 145);
       
       $pdf->Cell(60, 5, 'p. Nama Ayah', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(65, 5, $namaA, 0, 0);
       $pdf->Cell(25, 5, 'Tanggal Lahir :', 0, 0);
       $pdf->Cell(3, 5, $tglLahirA, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- NIK Ayah', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $nikA, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Pekerjaan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(65, 5, $pekerjaanA, 0, 0);
       $pdf->Cell(20, 5, 'Pendidikan : ', 0, 0);
       $pdf->Cell(3, 5, $pendidikanA, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Penghasilan Bulanan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $penghasilanA, 0, 1);
	   
       $pdf->Line(10, 175, 200, 175);
       $pdf->Cell(0, 5, 'DATA IBU KANDUNG', 0, 1, 'C');
       $pdf->Line(10, 170, 200, 170);
       
       $pdf->Cell(60, 5, 'q. Nama Ibu', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(65, 5, $namaI, 0, 0);
       $pdf->Cell(25, 5, 'Tanggal Lahir :', 0, 0);
       $pdf->Cell(3, 5, $tglLahirI, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- NIK Ibu', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $nikI, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Pekerjaan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(65, 5, $pekerjaanI, 0, 0);
       $pdf->Cell(20, 5, 'Pendidikan : ', 0, 0);
       $pdf->Cell(3, 5, $pendidikanI, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Penghasilan Bulanan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $penghasilanI, 0, 1);
	   
	   $pdf->Line(10, 200, 200, 200);
       $pdf->Cell(0, 5, 'DATA WALI', 0, 1, 'C');
       $pdf->Line(10, 195, 200, 195);
       
       $pdf->Cell(60, 5, 'r. Nama Wali', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(65, 5, $namaW, 0, 0);
       $pdf->Cell(25, 5, 'Tanggal Lahir :', 0, 0);
       $pdf->Cell(3, 5, $tglLahirW, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- NIK Wali', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $nikW, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Pekerjaan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(65, 5, $pekerjaanW, 0, 0);
       $pdf->Cell(20, 5, 'Pendidikan : ', 0, 0);
       $pdf->Cell(3, 5, $pendidikanW, 0, 1);
       $pdf->Cell(4, 5, '', 0, 0);
       $pdf->Cell(56, 5, '- Penghasilan Bulanan', 0, 0);
       $pdf->Cell(5, 5, ': ', 0, 0);
       $pdf->Cell(3, 5, $penghasilanW, 0, 1);
	   
	   if($ra['reg_akun_jalur_daftar'] == 'P'){
	   $prestasiJenis1 = '';
	   $prestasiJenis2 = '';
	   $prestasiJenis3 = '';
	   $prestasiJenis4 = '';
	   $prestasiTingkat1 = '';
	   $prestasiTingkat2 = '';
	   $prestasiTingkat3 = '';
	   $prestasiTingkat4 = '';
	   $prestasiNama1 = '';
	   $prestasiNama2 = '';
	   $prestasiNama3 = '';
	   $prestasiNama4 = '';
	   $prestasiTahun1 = '';
	   $prestasiTahun2 = '';
	   $prestasiTahun3 = '';
	   $prestasiTahun4 = '';
	   $prestasiPenyelenggara1 = '';
	   $prestasiPenyelenggara2 = '';
	   $prestasiPenyelenggara3 = '';
	   $prestasiPenyelenggara4 = '';
	   foreach ($dataPrestasi as $rpr)
	   {
		   if($rpr->reg_data_prestasi_indek == '1'){
			   $prestasiJenis1 = $rpr->reg_data_prestasi_jenis_prestasi;
			   $prestasiTingkat1 = $rpr->reg_data_prestasi_tingkat;
			   $prestasiNama1 = $rpr->reg_data_prestasi_nama;
			   $prestasiTahun1 = $rpr->reg_data_prestasi_thn;
			   $prestasiPenyelenggara1 = $rpr->reg_data_prestasi_penyelenggara;
		   } else if($rpr->reg_data_prestasi_indek == '2'){
			   $prestasiJenis2 = $rpr->reg_data_prestasi_jenis_prestasi;
			   $prestasiTingkat2 = $rpr->reg_data_prestasi_tingkat;
			   $prestasiNama2 = $rpr->reg_data_prestasi_nama;
			   $prestasiTahun2 = $rpr->reg_data_prestasi_thn;
			   $prestasiPenyelenggara2 = $rpr->reg_data_prestasi_penyelenggara;
		   } else if($rpr->reg_data_prestasi_indek == '3'){
			   $prestasiJenis3 = $rpr->reg_data_prestasi_jenis_prestasi;
			   $prestasiTingkat3 = $rpr->reg_data_prestasi_tingkat;
			   $prestasiNama3 = $rpr->reg_data_prestasi_nama;
			   $prestasiTahun3 = $rpr->reg_data_prestasi_thn;
			   $prestasiPenyelenggara3 = $rpr->reg_data_prestasi_penyelenggara;
		   }
	   }
       $pdf->Line(10, 225, 200, 225);
       $pdf->Cell(0, 5, 'CATATAN PRESTASI', 0, 1, 'C');
       $pdf->Line(10, 230, 200, 230);

       $pdf->Cell(10, 5, 'No', 0, 0);
       $pdf->Cell(30, 5, 'Jenis Prestasi', 0, 0);
       $pdf->Cell(20, 5, 'Tingkat', 0, 0);
       $pdf->Cell(70, 5, 'Nama Prestasi', 0, 0);
       $pdf->Cell(20, 5, 'Tahun', 0, 0);
       $pdf->Cell(20, 5, 'Penyelenggara', 0, 1);
       $pdf->Cell(10, 5, '1', 0, 0);
       $pdf->Cell(30, 5, $prestasiJenis1, 0, 0);
       $pdf->Cell(20, 5, $prestasiTingkat1, 0, 0);
       $pdf->Cell(70, 5, $prestasiNama1, 0, 0);
       $pdf->Cell(20, 5, $prestasiTahun1, 0, 0);
       $pdf->Cell(20, 5, $prestasiPenyelenggara1, 0, 1);
       $pdf->Cell(10, 5, '2', 0, 0);
       $pdf->Cell(30, 5, $prestasiJenis2, 0, 0);
       $pdf->Cell(20, 5, $prestasiTingkat2, 0, 0);
       $pdf->Cell(70, 5, $prestasiNama2, 0, 0);
       $pdf->Cell(20, 5, $prestasiTahun2, 0, 0);
       $pdf->Cell(20, 5, $prestasiPenyelenggara2, 0, 1);
       $pdf->Cell(10, 5, '3', 0, 0);
       $pdf->Cell(30, 5, $prestasiJenis3, 0, 0);
       $pdf->Cell(20, 5, $prestasiTingkat3, 0, 0);
       $pdf->Cell(70, 5, $prestasiNama3, 0, 0);
       $pdf->Cell(20, 5, $prestasiTahun3, 0, 0);
       $pdf->Cell(20, 5, $prestasiPenyelenggara3, 0, 1);	   
	   } else if($ra['reg_akun_jalur_daftar'] == 'R'){
       $pdf->Cell(10, 5, '', 0, 1);
	   }

       $pdf->Cell(10, 5, '', 0, 0);
       $pdf->Cell(20, 5, 'Mengetahui,', 0, 1);
       $pdf->Cell(10, 5, '', 0, 0);
       $pdf->Cell(130, 5, 'Orang Tua / Wali Peserta', 0, 0);
       $pdf->Cell(20, 5, 'Peserta', 0, 1);
       $pdf->Cell(20, 5, '', 0, 1);
       $pdf->Cell(20, 5, '', 0, 1);
       $pdf->Cell(10, 5, '', 0, 0);
       $pdf->Cell(20, 5, '(___________________)', 0, 0);
       $pdf->Cell(110, 5, '', 0, 0);
       $pdf->Cell(20, 5, '(___________________)', 0, 1);

       $pdf->Cell(0, 5, 'Panitia Pelaksana,', 0, 1, 'C');
       $pdf->Cell(0, 5, 'Verifikator P2DB '.$ta['thn_ajaran_nama'], 0, 1,'C');
       $pdf->Cell(20, 5, '', 0, 1);
       $pdf->Cell(20, 5, '', 0, 1);
       $pdf->Cell(0, 5, '(___________________)', 0, 0,'C');
	   
       $pdf->Output();
    }
}
