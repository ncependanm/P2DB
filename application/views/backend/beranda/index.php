<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
$ind = "";
/* admin */
if($this->session->userdata('level')=='1')
{
	$ada = true;
	$ind = "Admin";
}
/* guru */
if($this->session->userdata('level')=='2')
{
	$ada = true;
	$ind = "Guru";
}
/* calon siswa */
if($this->session->userdata('level')=='3')
{
	$ada = true;
	$ind = "Calon Siswa";
}
/* siswa */
if($this->session->userdata('level')=='4')
{
	$ada = true;
	$ind = "Siswa";
}
if(!$ada){
	?>
					<div class="row">
                        <div class="col-md-12 page-404">
                            <div class="number font-green">  </div>
                            <div class="details">
                                <h3>Terjadi kesalahan</h3>
                                <p> Maaf, anda tidak dapat mengakses halaman ini.
                                    <br>
                                    <a href="index.html"> Kembali ke dashboard </a></p>
                            </div>
                        </div>
                    </div>
<?php }else{ ?>
<script src="<?=base_url();?>asset/pages/js/form-validation-agama.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    //datatables
	reset();
	$("#data").show();
	if(<?=$this->session->userdata('level')?> == '1'){
		$("#isiHome").html("<p>Admin</p>");	
		$("#siswaTerdaftar").text(<?=$jmlCalonSiswa?>);
		$("#siswaValidasi").text(<?=$jmlCalonSiswaValidasi?>);
		$("#siswaDaftarUlang").text(<?=$jmlCalonSiswaDaftarUlang?>);
		$("#siswaDiterima").text(<?=$jmlCalonSiswaLulus?>);
		
		$("#siswaTerdaftarReg").text(<?=$jmlCalonSiswaReg?>);
		$("#siswaValidasiReg").text(<?=$jmlCalonSiswaValidasiReg?>);
		$("#siswaDaftarUlangReg").text(<?=$jmlCalonSiswaDaftarUlangReg?>);
		$("#siswaDiterimaReg").text(<?=$jmlCalonSiswaLulusReg?>);
	}else if(<?=$this->session->userdata('level')?> == '2'){
		$("#isiHome").html("<p>Guru</p>");
	}else if(<?=$this->session->userdata('level')?> == '3'){
		<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'A'){ ?>
			$("#isiHome").html("<p><?=$this->session->userdata('nama')?>, anda sudah mengkonfirmasi untuk mengikuti seleksi jalur reguler, dengan no registrasi baru <b><?=$this->session->userdata('noreg');?></b>, segera lengkapi data persyaratan.<a href='<?=base_url();?>backend/regSiswa'>Klik disini</a> untuk menuju ke halaman lengkapi persyaratan, dan anda harus mengisi Nilai SKHUN.</p>");
		<?php } else { ?>
			$("#isiHome").html("<p><?=$this->session->userdata('nama')?>, anda sudah terdaftar menjadi calon siswa baru di SMA, dengan no registrasi <b><?=$this->session->userdata('noreg');?></b>, segera lengkapi data persyaratan.<a href='<?=base_url();?>backend/regSiswa'>Klik disini</a> untuk menuju ke halaman lengkapi persyaratan.</p>");
		<?php } ?>
	}else if(<?=$this->session->userdata('level')?> == '4'){
		$("#isiHome").html("<p>Siswa</p>");
	}
});

function reset() {
	$("#data").hide();
};
</script>
					<h1 class="page-title"> Beranda
                        <small><?=$ind;?></small>
                    </h1>
<?php 
$waktuPendaftaranTmp = '';
$waktuValidasiTmp = '';
$waktuTesTmp = '';
$waktuDaftarUlangTmp = '';
$waktuKelulusanTmp = '';

foreach ($thnAjaranData as $j) { 
	$waktuPendaftaranTmp = $j->thn_ajaran_reg_akhir;
	$waktuVerifikasiTesAwalTmp = $j->thn_ajaran_verifikasi_tes_awal;
	$waktuVerifikasiTesAkhirTmp = $j->thn_ajaran_verifikasi_tes_akhir;
	$waktuDaftarUlangAwalTmp = $j->thn_ajaran_daftar_ulang_awal;
	$waktuDaftarUlangAkhirTmp = $j->thn_ajaran_daftar_ulang_akhir;
	$waktuKelulusanTmp = $j->thn_ajaran_kelulusan;
	
	$waktuPendaftaranTmpReg = $j->thn_ajaran_reg_akhir_reguler;
	$waktuVerifikasiTesAwalTmpReg = $j->thn_ajaran_verifikasi_tes_awal_reguler;
	$waktuVerifikasiTesAkhirTmpReg = $j->thn_ajaran_verifikasi_tes_akhir_reguler;
	$waktuDaftarUlangAwalTmpReg = $j->thn_ajaran_daftar_ulang_awal_reguler;
	$waktuDaftarUlangAkhirTmpReg = $j->thn_ajaran_daftar_ulang_akhir_reguler;
	$waktuKelulusanTmpReg = $j->thn_ajaran_kelulusan_reguler;
} ?>
<?php if($this->session->userdata('level')=='1') {?>
					<h1 class="page-title"> Prestasi
                    </h1>
					<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span id="siswaTerdaftar"></span>
                                        </h3>
                                        <small>Calon Siswa Terdaftar</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Batas Waktu Pendaftaran</div>
                                        <div class="status-number"><?=$waktuPendaftaranTmp?></div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                            <span id="siswaValidasi"></span>
                                        </h3>
                                        <small>Sudah Validasi</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Batas Waktu</div>
                                        <div class="status-number"><?=$waktuValidasiTmp?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span id="siswaDaftarUlang"></span>
                                        </h3>
                                        <small>Sudah Daftar Ulang</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Batas Waktu</div>
                                        <div class="status-number"><?=$waktuDaftarUlangTmp?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span id="siswaDiterima"></span>
                                        </h3>
                                        <small>Diterima</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Pengumuman Kelulusan</div>
                                        <div class="status-number"><?=$waktuKelulusanTmp?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

					<h1 class="page-title"> Reguler</h1>
					
					<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span id="siswaTerdaftarReg"></span>
                                        </h3>
                                        <small>Calon Siswa Terdaftar</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Batas Waktu Pendaftaran</div>
                                        <div class="status-number"><?=$waktuDaftarUlangAkhirTmpReg?></div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                            <span id="siswaValidasiReg"></span>
                                        </h3>
                                        <small>Sudah Validasi</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Batas Waktu</div>
                                        <div class="status-number"><?=$waktuValidasiTmp?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span id="siswaDaftarUlangReg"></span>
                                        </h3>
                                        <small>Sudah Daftar Ulang</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Batas Waktu</div>
                                        <div class="status-number"><?=$waktuDaftarUlangTmp?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span id="siswaDiterimaReg"></span>
                                        </h3>
                                        <small>Diterima</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                                        </span>
                                    </div>
									<div class="status">
                                        <div class="status-title">Pengumuman Kelulusan</div>
                                        <div class="status-number"><?=$waktuKelulusanTmp?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
					<div class="row" id="data" style="display:none;">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Selamat Datang Di Sistem Informasi Akademik SMA</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
										<div class="portlet-body" id="isiHome">
										</div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div> 
<?php 
/* calon siswa */
if($this->session->userdata('level')=='3') {?>
<script>

$(document).on("click","#statusPindahJalur",function(){
	var id=$(this).attr("data-id");
	var ind=$(this).attr("data-ind");
	swal({
		title:"Ubah Jalur Pendaftaran",
		text:"Yakin akan mengganti jalur ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yakin",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/beranda/updateJalurDaftar');?>"+'/'+id+'/'+ind,
			data: id,
			success: function(data){
				window.location.href = "<?php echo site_url('backend/login/logout');?>";
			} ,
			error: function ()
			{
				$("#msgERR").text("Jalur Daftar Gagal Diubah !!");
				$("#alerERR").show();
			}
		 });
	});
});
</script>
                    <div class="row">
                        <div class="col-md-12"><div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Pengumuman</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
								<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P'){ ?>
                                <?php if(strtotime($waktuKelulusanTmp) < strtotime(date("d-m-Y"))){ ?>
								<div class="general-item-list">
                                    <div class="item">
										<div class="item-head">
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Terima kasih telah mendaftarkan diri ke sekolah kami, berikut adalah hasil dari seleksi yang telah kami lakukan, 
											</br>
											<b>
											<?php if($dataSiswaTmp > 0){ ?>
											Selamat anda LULUS
											</b>
											<?php } else {?>
											Mohon maaf anda BELUM DITERIMA, kami masih memberikan kesempatan anda untuk mengikuti seleksi masuk lewat jalur reguler.</br>
											</b>
											Jika anda masih bersedia untuk mengikuti seleksi masuk lewat jalur reguler, 
											<a class="btn btn-sm btn-danger circle" id="statusPindahJalur" href="javascript:void(0)" title="Status Daftar Ulang" data-ind="A" data-id="<?=$this->session->userdata('id_users')?>">Klik Disini</a>
											</br>
											<i>
											Notes : Jika sudah di klik akan langsung logout dan silahkan login dengan NISN dan password sebelumnya.
											</i>
											<?php } ?>
										</div>
                                    </div>
                                </div>
								
								<?php } else { ?>
								<div class="general-item-list">
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">1. Lengkapi Data Persyaratan</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Bagi yang baru mendaftar dan yang belum menyelesaikan melengkapi data persyaratan, kami mohon supaya menyelesaikannya 
											terlebih dahulu, kemudian nanti unduh formulir bukti pendaftaran, yang harus di bawa ketika melakukan Verifikasi Data ke sekolah.
										</div>
                                    </div>
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">2. Batas Waktu Verifikasi Data dan Tes Wawancara</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important"> 
											Bagi yang sudah melengkapi data lalu mengunduh formulir bukti pendaftaran, diharap melakukan Verifikasi data sekaligus Tes Wawancara oleh Calon Peserta Didik beserta ORANG TUA 
											Tanggal "<?=$waktuVerifikasiTesAwalTmp?> s.d <?=$waktuVerifikasiTesAkhirTmp?> pukul 08.00-12.00 WITA", jangan lupa membawa beberapa persyaratan, yaitu :
											<div style="margin-left: 20px">
												<table>
													<tr>
														<td valign="top" width="25px">
														a.
														</td>
														<td>
														Fotocopy raport semester 1-5 dengan peringkat 1-5 pada kelas 7,8 dan 9 dengan rata-rata akhir minimal 7.5 yang disahkan (Legalisir) oleh kepala sekolah (Masing-masing 1 Lembar)
														</td>
													</tr>
													<tr>
														<td valign="top">
														b.
														</td>
														<td>
														Fotocopy sertifikat, piagam penghargaan 3 (tiga) terbaik sebagai prestasi siswa dalam akademik dan Non akademik pada kelas 7,8 dan 9 (1 LEMBAR) yang disahkan oleh sekolah
														</td>
													</tr>
													<tr>
														<td valign="top">
														c.
														</td>
														<td>
														Surat kelakuan baik dan BEBAS Narkoba dari Sekolah (ASLI)
														</td>
													</tr>
													<tr>
														<td valign="top">
														d.
														</td>
														<td>
														Fotocopy ijazah SD non legalisir
														</td>
													</tr>
													<tr>
														<td valign="top">
														e.
														</td>
														<td>
														Pas Foto 3x4 (2 LEMBAR)
														</td>
													</tr>
													<tr>
														<td valign="top">
														f.
														</td>
														<td>
														Fotocopy kartu keluarga
														</td>
													</tr>
													<tr>
														<td valign="top">
														g.
														</td>
														<td>
														Fotocopy atau screenshoot (Cek di http://nisn.data.kemdikbud.go.id/page/data) NISN dilegalisir sekolah (1 LEMBAR)
														</td>
													</tr>
													<tr>
														<td valign="top">
														h.
														</td>
														<td>
														Menyerahkan Surat Keterangan, Bagi Siswa
														</td>
													</tr>
													<tr>
														<td valign="top">
														
														</td>
														<td>
															- &nbspKeluarga miskin
															<br/>-  &nbspYatim, piatu dan atau yatim piatu
															<br/>-  &nbspCacat fisik
															<br/>-  &nbspOrang tuanya yang di phk
															<br/>-  &nbspDaerah rawan bencana dan konflik
															<br/>-  &nbspPemilik / pemegang kartu kip, kms, kaspin dan jamkesmas (Fotocopy 1 Lembar)
														</td>
													</tr>

													<tr>
														<td valign="top">
														i.
														</td>
														<td>
														Formulir Bukti Pendaftaran (yang bisa diunduh ketika melengkapi persyaratan)
														</td>
													</tr>
													<tr>
														<td valign="top">
														j.
														</td>
														<td>
														Kartu Peserta (yang bisa diunduh ketika melengkapi persyaratan)
														</td>
													</tr>
													<tr>
														<td valign="top">
														k.
														</td>
														<td>
														Berkas dimasukan dalam 1 map 
														</td>
													</tr>
													<tr>
														<td valign="top">
														l.
														</td>
														<td>
														Warna Hijau untuk Laki-laki
														</td>
													</tr>
													<tr>
														<td valign="top">
														m.
														</td>
														<td>
														Warna Merah untuk Perempuan
														</td>
													</tr>
													<tr>
														<td valign="top">
														n.
														</td>
														<td>
														Pakaian Seragam Sekolah SMP / MTs, dengan didampingi orangtua / wali (Wawancara)
														</td>
													</tr>
												</table>
											</div>
										</div>
                                    </div>
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">3. Pengumuman Jalur Prestasi</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Pengumuman akan diinformasikan secara online dan melalui papan pengumuman SMAN 1 Simpang Empat pada tanggal "<?=$waktuKelulusanTmp?>"
										</div>
                                    </div>
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">4. Daftar Ulang Jalur Prestasi</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Dimulai pada tanggal <?=$waktuDaftarUlangAwalTmp?> s.d <?=$waktuDaftarUlangAkhirTmp?> Pada pukul 08.00 - 12.00 WITA kecuali 21-04-2017 pukul 08.00 - 11.00 WITA
										</div>
                                    </div>
                                </div>
                                <?php } ?>
								<?php } else {?>
								<div class="general-item-list">
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">1. Lengkapi Data Persyaratan</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Bagi yang baru mendaftar dan yang belum menyelesaikan melengkapi data persyaratan, kami mohon supaya menyelesaikannya 
											terlebih dahulu, kemudian nanti unduh formulir bukti pendaftaran, yang harus di bawa ketika melakukan Verifikasi Data ke sekolah.
										</div>
                                    </div>
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">2. Batas Waktu Verifikasi Data dan Tes Wawancara</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important"> 
											Bagi yang sudah melengkapi data lalu mengunduh formulir bukti pendaftaran, diharap melakukan Verifikasi data sekaligus Tes Wawancara oleh Calon Peserta Didik beserta ORANG TUA 
											Tanggal "<?=$waktuVerifikasiTesAwalTmpReg?> s.d <?=$waktuVerifikasiTesAkhirTmpReg?> pukul 08.00-12.00 WITA", jangan lupa membawa beberapa persyaratan, yaitu :
											<div style="margin-left: 20px">
												<table>
													<tr>
														<td valign="top" width="25px">
														a.
														</td>
														<td>
														Siswa SMP sederajat/Paket B yang telah mengikuti UN 2017 dengan membawa Daftar Nilai Hasil Ujian Sementara (ASLI)
														</td>
													</tr>
													<tr>
														<td valign="top">
														b.
														</td>
														<td>
														Siwa SMP sederajat/Paket B yang dinyatakan LULUS pada tahun 2015, 2016 dengan membawa ijazah dan SKHUN ASLI (Hanya diperlihatkan)
														</td>
													</tr>
													<tr>
														<td valign="top">
														c.
														</td>
														<td>
														Fotocopy Daftar Nilai Hasil Ujian sementara yang disahkan oleh kepala Sekolah Bagi Jalur Prestasi dan Reguler atau fotocopy Ijazah dan SKHUN bagi yang sudah memiliki (Masing-masing 1 LEMBAR)
														</td>
													</tr>
													<tr>
														<td valign="top">
														d.
														</td>
														<td>
														Fotocopy raport semester 1-5 yang disahkan oleh kepala sekolah (Masing-Masing 1 LEMBAR)
														</td>
													</tr>
													<tr>
														<td valign="top">
														e.
														</td>
														<td>
														Surat kelakuan baik dan BEBAS Narkoba dari Sekolah (ASLI)
														</td>
													</tr>
													<tr>
														<td valign="top">
														f.
														</td>
														<td>
														Fotocopy Ijazah SD non legalisir
														</td>
													</tr>
													<tr>
														<td valign="top">
														g.
														</td>
														<td>
														Past photo 3x4 (2 LEMBAR)
														</td>
													</tr>
													<tr>
														<td valign="top">
														h.
														</td>
														<td>
														Fotocopy Kartu Keluarga
														</td>
													</tr>
													<tr>
														<td valign="top">
														i.
														</td>
														<td>
														Usia Maksimal 17 TAHUN pada bulan JULI 2017
														</td>
													</tr>
													<tr>
														<td valign="top">
														j.
														</td>
														<td>
														Fotocopy atau screenshoot (Cek di http://nisn.data.kemdikbud.go.id/page/data) NISN dilegalisir sekolah (1 LEMBAR)
														</td>
													</tr>
													<tr>
														<td valign="top">
														k.
														</td>
														<td>
														Menyerahkan Surat Keterangan, Bagi Siswa
														</td>
													</tr>
													<tr>
														<td valign="top">
														
														</td>
														<td>
															- &nbspKeluarga miskin
															<br/>-  &nbspYatim, piatu dan atau yatim piatu
															<br/>-  &nbspCacat fisik
															<br/>-  &nbspOrang tuanya yang di phk
															<br/>-  &nbspDaerah rawan bencana dan konflik
															<br/>-  &nbspPemilik / pemegang kartu kip, kms, kaspin dan jamkesmas (Fotocopy 1 Lembar)
														</td>
													</tr>
													<tr>
														<td valign="top">
														l.
														</td>
														<td>
														Berkas dimasukan dalam 1 map
														</td>
													</tr>
													<tr>
														<td valign="top">
														m.
														</td>
														<td>
														Warna Hijau untuk Laki-laki
														</td>
													</tr>
													<tr>
														<td valign="top">
														n.
														</td>
														<td>
														Warna Merah untuk Perempuan
														</td>
													</tr>
													<tr>
														<td valign="top">
														o.
														</td>
														<td>
														Pakaian Seragam Sekolah SMP / MTs, dengan didampingi orangtua / wali (Wawancara)
														</td>
													</tr>
												</table>
											</div>
										</div>
                                    </div>
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">3. Pengumuman Jalur Reguler</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Pengumuman akan diinformasikan secara online dan melalui papan pengumuman SMAN 1 Simpang Empat pada tanggal "<?=$waktuKelulusanTmpReg?>"
										</div>
                                    </div>
                                    <div class="item">
										<div class="item-head">
											<div class="item-details">
												<span class="item-name primary-link" style="color: #2f353b!important">4. Daftar Ulang Jalur Reguler</span>
											</div>
										</div>
										<div class="item-body" style="color: #2f353b!important">
											Dimulai pada tanggal <?=$waktuDaftarUlangAwalTmpReg?> s.d <?=$waktuDaftarUlangAkhirTmpReg?> Pada pukul 08.00 - 12.00 WITA
										</div>
                                    </div>
                                </div>
								<?php } ?>
							</div>
                        </div>
                    </div>
<?php } else if($this->session->userdata('level')=='2') {?>
                    <div class="row">
                        <div class="col-md-4">
							<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Jadwal Hari Ini (<?=$todayTmp;?>)</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
								<div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Kelas</td>
										</tr>
										<?php foreach ($jadwalHariIni as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->kelas_nama?> <?=$j->jurusan_nama?> <?=$j->ruangan_nama?></td>
										</tr>
										<?php } ?>
									</table>                                    
                                </div>
                            </div>
                        </div>
                    </div>
<?php } else if($this->session->userdata('level')=='4') {?>
                    <div class="row">
                        <div class="col-md-4">
							<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Jadwal Hari Ini (<?=$todayTmp;?>)</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
								<div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalHariIni as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>                                    
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-8">
							<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Informasi</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
								<div class="portlet-body">

                                </div>
                            </div>
                        </div>
                    </div>
<?php } else { ?>

                    <div class="row" id="data" style="display:none;">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Judul</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
								<div class="portlet-body">
                                    
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>                
<?php } ?>
<?php } ?>
