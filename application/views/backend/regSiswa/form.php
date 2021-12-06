<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
/* calon siswa */
if($this->session->userdata('level')=='3')
{
	$ada = true;
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

<script src="<?=base_url();?>asset/pages/js/form-wizard-reg-siswa.js" type="text/javascript"></script>
<script src="<?=base_url();?>asset/pages/js/jsRegSiswa.js" type="text/javascript"></script>
<script>
var save_method;
var table;

function getComboKPS(selectObject) {
var value = selectObject.value;
    if(value == 'Y'){
    $('#noKPS').show();
    } else if(value == 'N') {
    $('#noKPS').hide();
    }
}

function getComboPIP(selectObject) {
var value = selectObject.value;
    if(value == 'Y'){
    $('#alasanLayak').show();
    } else if(value == 'N') {
    $('#alasanLayak').hide();
    }
}

function getComboKIP(selectObject) {
var value = selectObject.value;
    if(value == 'Y'){
    $('#yaKIP').show();
    $('#tidakKIP').hide();
    } else if(value == 'N') {
    $('#yaKIP').hide();
    $('#tidakKIP').show();
    }
}

$(document).ready(function() {
    //datatables
	reset();
	showData();
	
	$("#reg_data_ortu_alamat_propinsi_id_a").change(function(){
		var idPropinsi=$("#reg_data_ortu_alamat_propinsi_id_a").val();
		loadKota(idPropinsi,"#reg_data_ortu_alamat_kota_id_a");
	});
	
	$("#reg_data_ortu_alamat_propinsi_id_i").change(function(){
		var idPropinsi=$("#reg_data_ortu_alamat_propinsi_id_i").val();
		loadKota(idPropinsi,"#reg_data_ortu_alamat_kota_id_i");
	});
  
	hideLoading();
});

function reset() {
		$("#reg_data_diri_lulusan_tmp").hide();
	$("#data").hide();
	$("#uploadFoto").hide();
	$("#inputan").hide();
	$("#alerSKS").hide();
	$("#alerERR").hide();
};

function showUploadFoto(){
	reset();
	showLoading();
	$('#uploadFoto').show();
	hideLoading();
}

function showInputan() {
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="reg_data_diri_panggilan"]').focus();

    $.ajax({
        url : "<?php echo site_url('backend/regSiswa/getDataRegAkun')?>/" + "<?=$this->session->userdata('id_users')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.dataAkun.reg_akun_id);

			$('[name="reg_akun_no_reg"]').val(data.dataAkun.reg_akun_no_reg);
            $('[name="reg_akun_nisn"]').val(data.dataAkun.reg_akun_nisn);
            $('[name="reg_data_diri_nama"]').val(data.dataAkun.reg_akun_nama);
            $('[name="reg_data_diri_panggilan"]').val(data.dataDiri.reg_data_diri_panggilan);
            $('[name="reg_data_diri_jenis_kelamin"]').val(data.dataDiri.reg_data_diri_jenis_kelamin);
            $('[name="reg_data_diri_agama_id"]').val(data.dataDiri.reg_data_diri_agama_id);
            $('[name="reg_data_diri_tempat_lahir"]').val(data.dataDiri.reg_data_diri_tempat_lahir);
            $('[name="reg_data_diri_tgl_lahir"]').val(data.dataDiri.reg_data_diri_tgl_lahir);
            $('[name="reg_data_diri_no_telp"]').val(data.dataDiri.reg_data_diri_no_telp);
            $('[name="reg_data_diri_lulusan"]').val(data.dataDiri.reg_data_diri_lulusan);
            $('[name="reg_data_diri_alamat"]').text(data.dataDiri.reg_data_diri_alamat);
            $('[name="reg_data_diri_alamat_propinsi"]').val(data.dataDiri.reg_data_diri_alamat_propinsi);
            $('[name="reg_data_diri_alamat_kota"]').val(data.dataDiri.reg_data_diri_alamat_kota);
            $('[name="reg_data_diri_lulusan_akreditas"]').val(data.dataDiri.reg_data_diri_lulusan_akreditas);
			
			$('[name="reg_data_nilai_skhu_mtk"]').val(data.dataSkhu.reg_data_nilai_skhu_mtk);
			$('[name="reg_data_nilai_skhu_ind"]').val(data.dataSkhu.reg_data_nilai_skhu_ind);
			$('[name="reg_data_nilai_skhu_ing"]').val(data.dataSkhu.reg_data_nilai_skhu_ing);
			$('[name="reg_data_nilai_skhu_ipa"]').val(data.dataSkhu.reg_data_nilai_skhu_ipa);

            $('[name="reg_data_diri_nis"]').val(data.dataDiri.reg_data_diri_nis);
            $('[name="reg_data_diri_no_un"]').val(data.dataDiri.reg_data_diri_no_un);
            $('[name="reg_data_diri_no_nik"]').val(data.dataDiri.reg_data_diri_no_nik);
            $('[name="reg_data_diri_npsn"]').val(data.dataDiri.reg_data_diri_npsn);
            
			$('[name="reg_data_diri_alamat_dusun"]').val(data.dataDiri.reg_data_diri_alamat_dusun);
			$('[name="reg_data_diri_alamat_rt"]').val(data.dataDiri.reg_data_diri_alamat_rt);
			$('[name="reg_data_diri_alamat_rw"]').val(data.dataDiri.reg_data_diri_alamat_rw);
			$('[name="reg_data_diri_alamat_desa"]').val(data.dataDiri.reg_data_diri_alamat_desa);
			$('[name="reg_data_diri_alamat_kodepos"]').val(data.dataDiri.reg_data_diri_alamat_kodepos);
			$('[name="reg_data_diri_alamat_kecamatan"]').val(data.dataDiri.reg_data_diri_alamat_kecamatan);
			$('[name="reg_data_diri_alamat_kota"]').val(data.dataDiri.reg_data_diri_alamat_kota);
			$('[name="reg_data_diri_alamat_propinsi"]').val(data.dataDiri.reg_data_diri_alamat_propinsi);
			
			
            $('[name="reg_data_diri_no_telp_rumah"]').val(data.dataDiri.reg_data_diri_no_telp_rumah);
            $('[name="reg_data_diri_email"]').val(data.dataDiri.reg_data_diri_email);
            $('[name="reg_data_diri_no_kks"]').val(data.dataDiri.reg_data_diri_no_kks);
			$('[name="reg_data_diri_penerima_pkh_kps"]').val(data.dataDiri.reg_data_diri_penerima_pkh_kps);			
            $('[name="reg_data_diri_no_pkh_kps"]').val(data.dataDiri.reg_data_diri_no_pkh_kps);
			$('[name="reg_data_diri_usulan_layak_pip"]').val(data.dataDiri.reg_data_diri_usulan_layak_pip);
            $('[name="reg_data_diri_alasan_layak"]').val(data.dataDiri.reg_data_diri_alasan_layak);
			$('[name="reg_data_diri_penerima_kip"]').val(data.dataDiri.reg_data_diri_penerima_kip);
			$('[name="reg_data_diri_no_kip"]').val(data.dataDiri.reg_data_diri_no_kip);
            $('[name="reg_data_diri_nama_kip"]').val(data.dataDiri.reg_data_diri_nama_kip);
            $('[name="reg_data_diri_alasan_menolak_kip"]').val(data.dataDiri.reg_data_diri_alasan_menolak_kip);
            $('[name="reg_data_diri_no_reg_akta"]').val(data.dataDiri.reg_data_diri_no_reg_akta);

			
            $('[name="reg_data_ortu_nama_a"]').val(data.dataOrtu.reg_data_ortu_nama);
            $('[name="reg_data_ortu_tempat_lahir_a"]').val(data.dataOrtu.reg_data_ortu_tempat_lahir);
            $('[name="reg_data_ortu_tgl_lahir_a"]').val(data.dataOrtu.reg_data_ortu_tgl_lahir);
            $('[name="reg_data_ortu_alamat_a"]').val(data.dataOrtu.reg_data_ortu_alamat);
            $('[name="reg_data_ortu_alamat_kota_id_a"]').val(data.dataOrtu.reg_data_ortu_alamat_kota_id);
            $('[name="reg_data_ortu_alamat_propinsi_id_a"]').val(data.dataOrtu.reg_data_ortu_alamat_propinsi_id);
            $('[name="reg_data_ortu_no_telepon_a"]').val(data.dataOrtu.reg_data_ortu_no_telepon);
            $('[name="reg_data_ortu_agama_id_a"]').val(data.dataOrtu.reg_data_ortu_agama_id);
            $('[name="reg_data_ortu_pendidikan_id_a"]').val(data.dataOrtu.reg_data_ortu_pendidikan_id);
            $('[name="reg_data_ortu_pekerjaan_id_a"]').val(data.dataOrtu.reg_data_ortu_pekerjaan_id);
            $('[name="reg_data_ortu_penghasilan_a"]').val(data.dataOrtu.reg_data_ortu_penghasilan);
            $('[name="reg_data_ortu_no_nik_a"]').val(data.dataOrtu.reg_data_ortu_no_nik);
						
            $('[name="reg_data_ortu_nama_i"]').val(data.dataOrtuI.reg_data_ortu_nama);
            $('[name="reg_data_ortu_tempat_lahir_i"]').val(data.dataOrtuI.reg_data_ortu_tempat_lahir);
            $('[name="reg_data_ortu_tgl_lahir_i"]').val(data.dataOrtuI.reg_data_ortu_tgl_lahir);
            $('[name="reg_data_ortu_alamat_i"]').val(data.dataOrtuI.reg_data_ortu_alamat);
            $('[name="reg_data_ortu_alamat_kota_id_i"]').val(data.dataOrtuI.reg_data_ortu_alamat_kota_id);
            $('[name="reg_data_ortu_alamat_propinsi_id_i"]').val(data.dataOrtuI.reg_data_ortu_alamat_propinsi_id);
            $('[name="reg_data_ortu_no_telepon_i"]').val(data.dataOrtuI.reg_data_ortu_no_telepon);
            $('[name="reg_data_ortu_agama_id_i"]').val(data.dataOrtuI.reg_data_ortu_agama_id);
            $('[name="reg_data_ortu_pendidikan_id_i"]').val(data.dataOrtuI.reg_data_ortu_pendidikan_id);
            $('[name="reg_data_ortu_pekerjaan_id_i"]').val(data.dataOrtuI.reg_data_ortu_pekerjaan_id);
            $('[name="reg_data_ortu_penghasilan_i"]').val(data.dataOrtuI.reg_data_ortu_penghasilan);
            $('[name="reg_data_ortu_no_nik_i"]').val(data.dataOrtuI.reg_data_ortu_no_nik);
			
            $('[name="reg_data_ortu_nama_w"]').val(data.dataOrtuW.reg_data_ortu_nama);
            $('[name="reg_data_ortu_tempat_lahir_w"]').val(data.dataOrtuW.reg_data_ortu_tempat_lahir);
            $('[name="reg_data_ortu_tgl_lahir_w"]').val(data.dataOrtuW.reg_data_ortu_tgl_lahir);
            $('[name="reg_data_ortu_alamat_w"]').val(data.dataOrtuW.reg_data_ortu_alamat);
            $('[name="reg_data_ortu_alamat_kota_id_w"]').val(data.dataOrtuW.reg_data_ortu_alamat_kota_id);
            $('[name="reg_data_ortu_alamat_propinsi_id_w"]').val(data.dataOrtuW.reg_data_ortu_alamat_propinsi_id);
            $('[name="reg_data_ortu_no_telepon_w"]').val(data.dataOrtuW.reg_data_ortu_no_telepon);
            $('[name="reg_data_ortu_agama_id_w"]').val(data.dataOrtuW.reg_data_ortu_agama_id);
            $('[name="reg_data_ortu_pendidikan_id_w"]').val(data.dataOrtuW.reg_data_ortu_pendidikan_id);
            $('[name="reg_data_ortu_pekerjaan_id_w"]').val(data.dataOrtuW.reg_data_ortu_pekerjaan_id);
            $('[name="reg_data_ortu_penghasilan_w"]').val(data.dataOrtuW.reg_data_ortu_penghasilan);
            $('[name="reg_data_ortu_no_nik_w"]').val(data.dataOrtuW.reg_data_ortu_no_nik);
			
            $('[name="reg_data_peringkat_satu"]').val(data.dataNilai.reg_data_peringkat_satu);
            $('[name="reg_data_peringkat_dua"]').val(data.dataNilai.reg_data_peringkat_dua);
            $('[name="reg_data_peringkat_tiga"]').val(data.dataNilai.reg_data_peringkat_tiga);
            $('[name="reg_data_peringkat_empat"]').val(data.dataNilai.reg_data_peringkat_empat);
            $('[name="reg_data_peringkat_lima"]').val(data.dataNilai.reg_data_peringkat_lima);
			
            $('[name="reg_data_nilai_ind_satu"]').val(data.dataNilai.reg_data_nilai_ind_satu);
            $('[name="reg_data_nilai_ind_dua"]').val(data.dataNilai.reg_data_nilai_ind_dua);
            $('[name="reg_data_nilai_ind_tiga"]').val(data.dataNilai.reg_data_nilai_ind_tiga);
            $('[name="reg_data_nilai_ind_empat"]').val(data.dataNilai.reg_data_nilai_ind_empat);
            $('[name="reg_data_nilai_ind_lima"]').val(data.dataNilai.reg_data_nilai_ind_lima);

            $('[name="reg_data_nilai_ing_satu"]').val(data.dataNilai.reg_data_nilai_ing_satu);
            $('[name="reg_data_nilai_ing_dua"]').val(data.dataNilai.reg_data_nilai_ing_dua);
            $('[name="reg_data_nilai_ing_tiga"]').val(data.dataNilai.reg_data_nilai_ing_tiga);
            $('[name="reg_data_nilai_ing_empat"]').val(data.dataNilai.reg_data_nilai_ing_empat);
            $('[name="reg_data_nilai_ing_lima"]').val(data.dataNilai.reg_data_nilai_ing_lima);

            $('[name="reg_data_nilai_mtk_satu"]').val(data.dataNilai.reg_data_nilai_mtk_satu);
            $('[name="reg_data_nilai_mtk_dua"]').val(data.dataNilai.reg_data_nilai_mtk_dua);
            $('[name="reg_data_nilai_mtk_tiga"]').val(data.dataNilai.reg_data_nilai_mtk_tiga);
            $('[name="reg_data_nilai_mtk_empat"]').val(data.dataNilai.reg_data_nilai_mtk_empat);
            $('[name="reg_data_nilai_mtk_lima"]').val(data.dataNilai.reg_data_nilai_mtk_lima);

            $('[name="reg_data_nilai_ipa_satu"]').val(data.dataNilai.reg_data_nilai_ipa_satu);
            $('[name="reg_data_nilai_ipa_dua"]').val(data.dataNilai.reg_data_nilai_ipa_dua);
            $('[name="reg_data_nilai_ipa_tiga"]').val(data.dataNilai.reg_data_nilai_ipa_tiga);
            $('[name="reg_data_nilai_ipa_empat"]').val(data.dataNilai.reg_data_nilai_ipa_empat);
            $('[name="reg_data_nilai_ipa_lima"]').val(data.dataNilai.reg_data_nilai_ipa_lima);
			
			if(data.dataPrestasiSatu.reg_data_prestasi_indek == '1'){
					$('[name="reg_data_prestasi_nama_satu"]').val(data.dataPrestasiSatu.reg_data_prestasi_nama);
					$('[name="reg_data_prestasi_thn_satu"]').val(data.dataPrestasiSatu.reg_data_prestasi_thn);
					$('[name="reg_data_prestasi_jenis_prestasi_satu"]').val(data.dataPrestasiSatu.reg_data_prestasi_jenis_prestasi);
					$('[name="reg_data_prestasi_tingkat_satu"]').val(data.dataPrestasiSatu.reg_data_prestasi_tingkat);
					$('[name="reg_data_prestasi_juara_satu"]').val(data.dataPrestasiSatu.reg_data_prestasi_juara);
					$('[name="reg_data_prestasi_penyelenggara_satu"]').val(data.dataPrestasiSatu.reg_data_prestasi_penyelenggara);
			}
			if(data.dataPrestasiDua.reg_data_prestasi_indek == '2'){
					$('[name="reg_data_prestasi_nama_dua"]').val(data.dataPrestasiDua.reg_data_prestasi_nama);
					$('[name="reg_data_prestasi_thn_dua"]').val(data.dataPrestasiDua.reg_data_prestasi_thn);
					$('[name="reg_data_prestasi_jenis_prestasi_dua"]').val(data.dataPrestasiDua.reg_data_prestasi_jenis_prestasi);
					$('[name="reg_data_prestasi_tingkat_dua"]').val(data.dataPrestasiDua.reg_data_prestasi_tingkat);
					$('[name="reg_data_prestasi_juara_dua"]').val(data.dataPrestasiSatu.reg_data_prestasi_juara);
					$('[name="reg_data_prestasi_penyelenggara_dua"]').val(data.dataPrestasiDua.reg_data_prestasi_penyelenggara);
			}
			if(data.dataPrestasiTiga.reg_data_prestasi_indek == '3'){
					$('[name="reg_data_prestasi_nama_tiga"]').val(data.dataPrestasiTiga.reg_data_prestasi_nama);
					$('[name="reg_data_prestasi_thn_tiga"]').val(data.dataPrestasiTiga.reg_data_prestasi_thn);
					$('[name="reg_data_prestasi_jenis_prestasi_tiga"]').val(data.dataPrestasiTiga.reg_data_prestasi_jenis_prestasi);
					$('[name="reg_data_prestasi_tingkat_tiga"]').val(data.dataPrestasiTiga.reg_data_prestasi_tingkat);
					$('[name="reg_data_prestasi_juara_tiga"]').val(data.dataPrestasiSatu.reg_data_prestasi_juara);
					$('[name="reg_data_prestasi_penyelenggara_tiga"]').val(data.dataPrestasiTiga.reg_data_prestasi_penyelenggara);
			}			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
	
	$([name="id"]).val("<?=$this->session->userdata('id_users')?>");


	hideLoading();
};

function showData() {
	showLoading();
	reset();
	$("#data").show();
	    $.ajax({
        url : "<?php echo site_url('backend/regSiswa/getDataNew')?>/" + "<?=$this->session->userdata('id_users')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('#fotoPendaftar').html('<img src="<?=base_url();?>'+ data.dataDiri.reg_data_diri_img+'" width="150px">');
            $('[name="dataAkunNoRegistrasi"]').text(data.dataAkun.reg_akun_no_reg);
            $('[name="dataAkunNISN"]').text(data.dataAkun.reg_akun_nisn);
            $('[name="dataDiriNama"]').text(data.dataDiri.reg_data_diri_nama);
            $('[name="dataDiriNamaPanggilan"]').text(data.dataDiri.reg_data_diri_panggilan);
			$jk = "";
			if(data.dataDiri.reg_data_diri_jenis_kelamin == "P"){
				$jk = "Perempuan";
			}else if(data.dataDiri.reg_data_diri_jenis_kelamin == "L"){
				$jk = "Laki-laki";
			}
            $('[name="dataDiriJenisKelamin"]').text($jk);
            $('[name="dataDiriAgama"]').text(data.dataDiri.agama_nama);
            $('[name="dataDiriTempatLahir"]').text(data.dataDiri.reg_data_diri_tempat_lahir);
            $('[name="dataDiriTanggalLahir"]').text(data.dataDiri.reg_data_diri_tgl_lahir);
            $('[name="dataDiriNoTelpon"]').text(data.dataDiri.reg_data_diri_no_telp);
            $('[name="dataDiriLulusan"]').text(data.dataDiri.reg_data_diri_lulusan + ' (' + data.dataDiri.reg_data_diri_lulusan_akreditas + ')');
            $('[name="dataDiriAlamatPropinsi"]').text(data.dataDiri.reg_data_diri_alamat_propinsi);
            $('[name="dataDiriAlamatKota"]').text(data.dataDiri.reg_data_diri_alamat_kota);
            $('[name="dataDiriNPSN"]').text(data.dataDiri.reg_data_diri_npsn);
			
            $('[name="dataAkunNIS"]').text(data.dataDiri.reg_data_diri_nis);
            $('[name="dataAkunNoUN"]').text(data.dataDiri.reg_data_diri_no_un);
            $('[name="dataAkunNoNIK"]').text(data.dataDiri.reg_data_diri_no_nik);
			
            $('[name="dataDiriAlamatDusun"]').text(data.dataDiri.reg_data_diri_alamat_dusun);
            $('[name="dataDiriAlamatRtRw"]').text(data.dataDiri.reg_data_diri_alamat_rt+' / '+data.dataDiri.reg_data_diri_alamat_rw);
            $('[name="dataDiriAlamatDesa"]').text(data.dataDiri.reg_data_diri_alamat_desa);
            $('[name="dataDiriAlamatKodePos"]').text(data.dataDiri.reg_data_diri_alamat_kodepos);
            $('[name="dataDiriAlamatKecamatan"]').text(data.dataDiri.reg_data_diri_alamat_kecamatan);

            $('[name="dataDiriNoTelponRumah"]').text(data.dataDiri.reg_data_diri_no_telp_rumah);
            $('[name="dataDiriEmail"]').text(data.dataDiri.reg_data_diri_email);
            $('[name="dataDiriNoKKS"]').text(data.dataDiri.reg_data_diri_no_kks);
            
			$('[name="dataSKHUMtk"]').text(data.dataSkhu.reg_data_nilai_skhu_mtk);
			$('[name="dataSKHUInd"]').text(data.dataSkhu.reg_data_nilai_skhu_ind);
			$('[name="dataSKHUIng"]').text(data.dataSkhu.reg_data_nilai_skhu_ing);
			$('[name="dataSKHUIpa"]').text(data.dataSkhu.reg_data_nilai_skhu_ipa);
			
			
			if(data.dataDiri.reg_data_diri_penerima_pkh_kps == 'Y'){
				$('[name="dataDiriPenerimanKPSPKH"]').text("Ya");
				$('#noKPS').show();
			} else {
				$('[name="dataDiriPenerimanKPSPKH"]').text("Tidak");
				$('#noKPS').hide();
			}
            $('[name="dataDiriNoKPSPKH"]').text(data.dataDiri.reg_data_diri_no_pkh_kps);
			if(data.dataDiri.reg_data_diri_usulan_layak_pip == 'Y'){
				$('[name="dataDiriUsulanLayakPIP"]').text("Ya");
				$('#alasanLayak').show();
			} else {
				$('[name="dataDiriUsulanLayakPIP"]').text("Tidak");
				$('#alasanLayak').hide();
			}
            $('[name="dataDiriAlasanLayak"]').text(data.dataDiri.reg_data_diri_alasan_layak);
			if(data.dataDiri.reg_data_diri_penerima_kip == 'Y'){
				$('[name="dataDiriPenerimaKIP"]').text("Ya");
    $('#yaKIP').show();
    $('#tidakKIP').hide();
			} else {
				$('[name="dataDiriPenerimaKIP"]').text("Tidak");
    $('#yaKIP').hide();
    $('#tidakKIP').show();
			}
            $('[name="dataDiriNoKIP"]').text(data.dataDiri.reg_data_diri_no_kip);
            $('[name="dataDiriNamaKIP"]').text(data.dataDiri.reg_data_diri_nama_kip);
            $('[name="dataDiriAlasanMenolakKIP"]').text(data.dataDiri.reg_data_diri_alasan_menolak_kip);
            $('[name="dataDiriNoRegistrasiAkta"]').text(data.dataDiri.reg_data_diri_no_reg_akta);
			
            $('[name="dataOrtuNamaA"]').text(data.dataOrtu.reg_data_ortu_nama);
            $('[name="dataOrtuTempatLahirA"]').text(data.dataOrtu.reg_data_ortu_tempat_lahir);
            $('[name="dataOrtuTanggalLahirA"]').text(data.dataOrtu.reg_data_ortu_tgl_lahir);
            $('[name="dataOrtuAlamatA"]').text(data.dataOrtu.reg_data_ortu_alamat);
            $('[name="dataOrtuKotaA"]').text(data.dataOrtu.kota_nama);
            $('[name="dataOrtuPropinsiA"]').text(data.dataOrtu.propinsi_nama);
            $('[name="dataOrtuNoTelponA"]').text(data.dataOrtu.reg_data_ortu_no_telepon);
            $('[name="dataOrtuAgamaA"]').text(data.dataOrtu.agama_nama);
            $('[name="dataOrtuPendidikanA"]').text(data.dataOrtu.pendidikan_nama);
            $('[name="dataOrtuPekerjaanA"]').text(data.dataOrtu.pekerjaan_nama);
            $('[name="dataOrtuPenghasilanA"]').text(data.dataOrtu.reg_data_ortu_penghasilan);
            $('[name="dataOrtuNoNIKA"]').text(data.dataOrtu.reg_data_ortu_no_nik);
			
            $('[name="dataOrtuNamaI"]').text(data.dataOrtuI.reg_data_ortu_nama);
            $('[name="dataOrtuTempatLahirI"]').text(data.dataOrtuI.reg_data_ortu_tempat_lahir);
            $('[name="dataOrtuTanggalLahirI"]').text(data.dataOrtuI.reg_data_ortu_tgl_lahir);
            $('[name="dataOrtuAlamatI"]').text(data.dataOrtuI.reg_data_ortu_alamat);
            $('[name="dataOrtuKotaI"]').text(data.dataOrtuI.kota_nama);
            $('[name="dataOrtuPropinsiI"]').text(data.dataOrtuI.propinsi_nama);
            $('[name="dataOrtuNoTelponI"]').text(data.dataOrtuI.reg_data_ortu_no_telepon);
            $('[name="dataOrtuAgamaI"]').text(data.dataOrtuI.agama_nama);
            $('[name="dataOrtuPendidikanI"]').text(data.dataOrtuI.pendidikan_nama);
            $('[name="dataOrtuPekerjaanI"]').text(data.dataOrtuI.pekerjaan_nama);
            $('[name="dataOrtuPenghasilanI"]').text(data.dataOrtuI.reg_data_ortu_penghasilan);
            $('[name="dataOrtuNoNIKI"]').text(data.dataOrtuI.reg_data_ortu_no_nik);
			
            $('[name="dataOrtuNamaW"]').text(data.dataOrtuW.reg_data_ortu_nama);
            $('[name="dataOrtuTempatLahirW"]').text(data.dataOrtuW.reg_data_ortu_tempat_lahir);
            $('[name="dataOrtuTanggalLahirW"]').text(data.dataOrtuW.reg_data_ortu_tgl_lahir);
            $('[name="dataOrtuAlamatW"]').text(data.dataOrtuW.reg_data_ortu_alamat);
            $('[name="dataOrtuKotaW"]').text(data.dataOrtuW.kota_nama);
            $('[name="dataOrtuPropinsiW"]').text(data.dataOrtuW.propinsi_nama);
            $('[name="dataOrtuNoTelponW"]').text(data.dataOrtuW.reg_data_ortu_no_telepon);
            $('[name="dataOrtuAgamaW"]').text(data.dataOrtuW.agama_nama);
            $('[name="dataOrtuPendidikanW"]').text(data.dataOrtuW.pendidikan_nama);
            $('[name="dataOrtuPekerjaanW"]').text(data.dataOrtuW.pekerjaan_nama);
            $('[name="dataOrtuPenghasilanW"]').text(data.dataOrtuW.reg_data_ortu_penghasilan);
            $('[name="dataOrtuNoNIKW"]').text(data.dataOrtuW.reg_data_ortu_no_nik);
			
            $('[name="dataPeringkatSatu"]').text(data.dataNilai.reg_data_peringkat_satu);
            $('[name="dataPeringkatDua"]').text(data.dataNilai.reg_data_peringkat_dua);
            $('[name="dataPeringkatTiga"]').text(data.dataNilai.reg_data_peringkat_tiga);
            $('[name="dataPeringkatEmpat"]').text(data.dataNilai.reg_data_peringkat_empat);
            $('[name="dataPeringkatLima"]').text(data.dataNilai.reg_data_peringkat_lima);
			
            $('[name="dataNilaiIndSatu"]').text(data.dataNilai.reg_data_nilai_ind_satu);
            $('[name="dataNilaiIndDua"]').text(data.dataNilai.reg_data_nilai_ind_dua);
            $('[name="dataNilaiIndTiga"]').text(data.dataNilai.reg_data_nilai_ind_tiga);
            $('[name="dataNilaiIndEmpat"]').text(data.dataNilai.reg_data_nilai_ind_empat);
            $('[name="dataNilaiIndLima"]').text(data.dataNilai.reg_data_nilai_ind_lima);

            $('[name="dataNilaiIngSatu"]').text(data.dataNilai.reg_data_nilai_ing_satu);
            $('[name="dataNilaiIngDua"]').text(data.dataNilai.reg_data_nilai_ing_dua);
            $('[name="dataNilaiIngTiga"]').text(data.dataNilai.reg_data_nilai_ing_tiga);
            $('[name="dataNilaiIngEmpat"]').text(data.dataNilai.reg_data_nilai_ing_empat);
            $('[name="dataNilaiIngLima"]').text(data.dataNilai.reg_data_nilai_ing_lima);

            $('[name="dataNilaiMtkSatu"]').text(data.dataNilai.reg_data_nilai_mtk_satu);
            $('[name="dataNilaiMtkDua"]').text(data.dataNilai.reg_data_nilai_mtk_dua);
            $('[name="dataNilaiMtkTiga"]').text(data.dataNilai.reg_data_nilai_mtk_tiga);
            $('[name="dataNilaiMtkEmpat"]').text(data.dataNilai.reg_data_nilai_mtk_empat);
            $('[name="dataNilaiMtkLima"]').text(data.dataNilai.reg_data_nilai_mtk_lima);

            $('[name="dataNilaiIpaSatu"]').text(data.dataNilai.reg_data_nilai_ipa_satu);
            $('[name="dataNilaiIpaDua"]').text(data.dataNilai.reg_data_nilai_ipa_dua);
            $('[name="dataNilaiIpaTiga"]').text(data.dataNilai.reg_data_nilai_ipa_tiga);
            $('[name="dataNilaiIpaEmpat"]').text(data.dataNilai.reg_data_nilai_ipa_empat);
            $('[name="dataNilaiIpaLima"]').text(data.dataNilai.reg_data_nilai_ipa_lima);
            
			if(data.dataPrestasiSatu.reg_data_prestasi_indek == '1'){
					$('[name="dataPrestasiSatu"]').text(data.dataPrestasiSatu.reg_data_prestasi_nama);
					$('[name="dataPrestasiThnSatu"]').text(data.dataPrestasiSatu.reg_data_prestasi_thn);
					$('[name="dataPrestasiJenisPrestasiSatu"]').text(data.dataPrestasiSatu.reg_data_prestasi_jenis_prestasi);
					$('[name="dataPrestasiTingkatSatu"]').text(data.dataPrestasiSatu.reg_data_prestasi_tingkat);
					$('[name="dataPrestasiJuaraSatu"]').text(data.dataPrestasiSatu.reg_data_prestasi_juara);
					$('[name="dataPrestasiPenyelenggaraSatu"]').text(data.dataPrestasiSatu.reg_data_prestasi_penyelenggara);
			}
			if(data.dataPrestasiDua.reg_data_prestasi_indek == '2'){
					$('[name="dataPrestasiDua"]').text(data.dataPrestasiDua.reg_data_prestasi_nama);
					$('[name="dataPrestasiThnDua"]').text(data.dataPrestasiDua.reg_data_prestasi_thn);
					$('[name="dataPrestasiJenisPrestasiDua"]').text(data.dataPrestasiDua.reg_data_prestasi_jenis_prestasi);
					$('[name="dataPrestasiTingkatDua"]').text(data.dataPrestasiDua.reg_data_prestasi_tingkat);
					$('[name="dataPrestasiJuaraDua"]').text(data.dataPrestasiSatu.reg_data_prestasi_juara);
					$('[name="dataPrestasiPenyelenggaraDua"]').text(data.dataPrestasiDua.reg_data_prestasi_penyelenggara);
			}
			if(data.dataPrestasiTiga.reg_data_prestasi_indek == '3'){
					$('[name="dataPrestasiTiga"]').text(data.dataPrestasiTiga.reg_data_prestasi_nama);
					$('[name="dataPrestasiThnTiga"]').text(data.dataPrestasiTiga.reg_data_prestasi_thn);
					$('[name="dataPrestasiJenisPrestasiTiga"]').text(data.dataPrestasiTiga.reg_data_prestasi_jenis_prestasi);
					$('[name="dataPrestasiTingkatTiga"]').text(data.dataPrestasiTiga.reg_data_prestasi_tingkat);
					$('[name="dataPrestasiJuaraTiga"]').text(data.dataPrestasiSatu.reg_data_prestasi_juara);
					$('[name="dataPrestasiPenyelenggaraTiga"]').text(data.dataPrestasiTiga.reg_data_prestasi_penyelenggara);
			}			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
	hideLoading();
};

function add()
{
	showLoading();
	showInputan();
    save_method = 'add';
	hideLoading();
};

function edit(id)
{
	showLoading();
    save_method = 'update';
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('backend/agama/prepareEdit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			showInputan();
            $('[name="id"]').val(data.agama_id);
            $('[name="agama_nama"]').val(data.agama_nama);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
};

function save()
{
	showLoading();
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url = "<?php echo site_url('backend/regSiswa/update')?>";
	$("#msgSKS").text("Data Berhasil Dilengkapi !!");
	$("#msgERR").text("Data Gagal Dilengkapi !!");

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#submit_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
				$("#alerSKS").show();
				window.location.href = '<?=base_url()?>backend/regSiswa';
            }
            $('#btnSave').text('simpan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
			$("#alerERR").show();
            $('#btnSave').text('simpan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
};

function loadKota(idPropinsi, idIsi)
{
    $.ajax({
	url:"<?php echo base_url();?>backend/regSiswa/tampilkanKota",
	data:"reg_data_diri_alamat_propinsi_id=" + idPropinsi,
	success: function(html)
	{
        $(idIsi).html(html);            
	}
	});
}
function pilihSekolah(){
	var e = document.getElementById("reg_data_diri_lulusan");
	var lulusan = e.options[e.selectedIndex].value;
	if(lulusan == 'LAINNYA'){
		$("#reg_data_diri_lulusan_tmp").show();
		$("#reg_data_diri_lulusan_tmp").focus();
		$('[name="reg_data_diri_lulusan_tmp"]').val('');
	} else {
		$("#reg_data_diri_lulusan_tmp").hide();
		$('[name="reg_data_diri_lulusan_tmp"]').val('');
	}	
}

</script>
              <div class="row" id="data" style="display: none;">
				<div class="col-md-12">
                    <div class="portlet light">
						<div class="portlet-title">
							<?php if($this->session->flashdata('msgUpload') == 'Sukses Upload Foto'){?>
							<div id="alerERRInput" class="custom-alerts alert alert-info fade in">
								<button type="button" class="close" data-dismiss="alert" >x</button>
								<p id="msgERRInput">
									<?=$this->session->flashdata('msgUpload')?>
								</p>
							</div>
							<?php } else if($this->session->flashdata('msgUpload') != '') { ?>
							<div id="alerERRInput" class="custom-alerts alert alert-warning fade in">
								<button type="button" class="close" data-dismiss="alert" >x</button>
								<p id="msgERRInput">
									<?=$this->session->flashdata('msgUpload')?>
								</p>
							</div>
							<?php } ?>
							<div class="caption">
								<i class=" icon-layers font-red"></i>
								<span class="caption-subject font-red bold uppercase"> <?=$title;?>
                                </span>
                            </div>
							<div class="actions">
								<div class="btn-group btn-group-devided" data-toggle="buttons">
									<button type="button" class="btn btn-primary btn-circle" onclick="showInputan();">Lengkapi</button>
									<button type="button" class="btn btn-primary btn-circle" onclick="showUploadFoto();">Upload Foto</button>
								</div>
								<?php if($jmlData > 0) { ?>
		<a href="<?=base_url();?>printing/kartuUjian/<?=$this->session->userdata('id_akun')?>" class="btn btn-danger btn-circle" target="_blank">Cetak Kartu Ujian</a>
									<a href="<?=base_url();?>printing/buktiPendaftaran/<?=$this->session->userdata('id_akun')?>" class="btn btn-danger btn-circle" target="_blank">Cetak Bukti Pendaftaran</a>
                                <?php }  ?>

                            </div>
                        </div>
						<div class="portlet-body">
							<form class="form-horizontal" autocomplete="off">
								<div class="form-body">
									<div class="form-body col-md-12">
											<h3 class="block">Foto Anda</h3>
										</div>
										<div class="row static-info col-md-12">
											<label class="control-label col-md-2 name">Foto Anda :</label>
											<div class="col-md-4" id="fotoPendaftar">
											</div>
										</div>
									</div>
									<div class="form-body col-md-12">
										<h3 class="block">Data Diri Anda</h3>
									</div>
									<div class="row static-info col-md-12">
										<label class="control-label col-md-2 name">No Registrasi :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataAkunNoRegistrasi"></p>
										</div>
										<label class="control-label col-md-2 name">&nbsp;</label>
										<div class="col-md-4">
											<p class="form-control-static value" >&nbsp;</p>
										</div>
										<label class="control-label col-md-2 name">Nama :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNama"></p>
										</div>
										<label class="control-label col-md-2 name">Nama Panggilan :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNamaPanggilan"></p>
										</div>
										<label class="control-label col-md-2 name">Jenis Kelamin :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriJenisKelamin"></p>
										</div>
										<label class="control-label col-md-2 name">Agama :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAgama"></p>
										</div>
										<label class="control-label col-md-2 name">NISN :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataAkunNISN"></p>
										</div>
										<label class="control-label col-md-2 name">NIS :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataAkunNIS"></p>
										</div>
										
										
										<label class="control-label col-md-2 name">No Ujian Nasional :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataAkunNoUN"></p>
										</div>
										<label class="control-label col-md-2 name">NIK :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataAkunNoNIK"></p>
										</div>
										
										<label class="control-label col-md-2 name">NPSN Sekolah Asal :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNPSN"></p>
										</div>
										<label class="control-label col-md-2 name">Nama Sekolah Asal :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriLulusan"></p>
										</div>
										
										<label class="control-label col-md-2 name">Tempat Lahir :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriTempatLahir"></p>
										</div>
										<label class="control-label col-md-2 name">Tanggal Lahir :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriTanggalLahir"></p>
										</div>
										<label class="control-label col-md-2 name">No Telpon :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNoTelpon"></p>
										</div>
										<label class="control-label col-md-2 name">&nbsp;</label>
										<div class="col-md-4">
											<p class="form-control-static value" ></p>
										</div>
										<label class="col-md-12 name">Alamat Tempat Tinggal</label>

										<label class="control-label col-md-2 name">Dusun :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatDusun"></p>
										</div>
										<label class="control-label col-md-2 name">RT / RW :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatRtRw"></p>
										</div>
										<label class="control-label col-md-2 name">Kelurahan / Desa :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatDesa"></p>
										</div>
										<label class="control-label col-md-2 name">Kode Pos :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatKodePos"></p>
										</div>
										<label class="control-label col-md-2 name">Kecamatan :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatKecamatan"></p>
										</div>
										<label class="control-label col-md-2 name">Kota :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatKota"></p>
										</div>
										<label class="control-label col-md-2 name">Propinsi :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlamatPropinsi"></p>
										</div>
										
										
										<label class="control-label col-md-2 name">No Telepon Rumah :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNoTelponRumah"></p>
										</div>
										<label class="control-label col-md-2 name">Email Pribadi :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriEmail"></p>
										</div>
										<label class="control-label col-md-2 name">No KKS :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNoKKS"></p>
										</div>
										<div class="col-md-12">
										<label class="control-label col-md-2 name">Apakah Penerima KPS / PKH :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriPenerimanKPSPKH"></p>
										</div>
										<label class="control-label col-md-2 name">No KPS / PKH :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNoKPSPKH"></p>
										</div>
										</div>
										<div class="col-md-12">
										<label class="control-label col-md-2 name">Usulan dari Sekolah layak PIP :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriUsulanLayakPIP"></p>
										</div>
										<label class="control-label col-md-2 name">Alasan Layak :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlasanLayak"></p>
										</div>
										</div>
										<label class="control-label col-md-2 name">Penerima KIP :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriPenerimaKIP"></p>
										</div>
										<label class="control-label col-md-2 name">No KIP :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNoKIP"></p>
										</div>
										<label class="control-label col-md-2 name">Nama Tertera KIP :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNamaKIP"></p>
										</div>
										<label class="control-label col-md-2 name">Alasan Menolak KIP :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriAlasanMenolakKIP"></p>
										</div>
										<label class="control-label col-md-2 name">No Registrasi Akta Lahir :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataDiriNoRegistrasiAkta"></p>
										</div>
										
                                    </div>
									<div class="form-body col-md-12">
										<h3 class="block">Data Orang Tua</h3>
									</div>
									<div class="row static-info col-md-6">
										<h4 class="text-center">Data Ayah</h4>
										<label class="control-label col-md-4 name">Nama :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNamaA"></p>
										</div>
										<label class="control-label col-md-4 name">NIK :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNoNIKA"></p>
										</div>
										<label class="control-label col-md-4 name">Tempat Lahir :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuTempatLahirA"></p>
										</div>
										<label class="control-label col-md-4 name">Tanggal Lahir :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuTanggalLahirA"></p>
										</div>
										<label class="control-label col-md-4 name">No Telepon :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNoTelponA"></p>
										</div>
										<label class="control-label col-md-4 name">Agama :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuAgamaA"></p>
										</div>
										<label class="control-label col-md-4 name">Pendidikan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPendidikanA"></p>
										</div>
										<label class="control-label col-md-4 name">Pekerjaan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPekerjaanA"></p>
										</div>
										<label class="control-label col-md-4 name">Penghasilan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPenghasilanA"></p>
										</div>
									</div>
									<div class="row static-info col-md-6">
										<h4 class="text-center">Data Ibu</h4>
										<label class="control-label col-md-4 name">Nama :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNamaI"></p>
										</div>
										<label class="control-label col-md-4 name">NIK :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNoNIKI"></p>
										</div>
										<label class="control-label col-md-4 name">Tempat Lahir :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuTempatLahirI"></p>
										</div>
										<label class="control-label col-md-4 name">Tanggal Lahir :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuTanggalLahirI"></p>
										</div>
										<label class="control-label col-md-4 name">No Telepon :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNoTelponI"></p>
										</div>
										<label class="control-label col-md-4 name">Agama :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuAgamaI"></p>
										</div>
										<label class="control-label col-md-4 name">Pendidikan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPendidikanI"></p>
										</div>
										<label class="control-label col-md-4 name">Pekerjaan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPekerjaanI"></p>
										</div>
										<label class="control-label col-md-4 name">Penghasilan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPenghasilanI"></p>
										</div>
									</div>
									<div class="form-body col-md-12">
										<h3 class="block">Data Wali</h3>
									</div>
									<div class="row static-info col-md-6">
										<h4 class="text-center">Data Wali</h4>
										<label class="control-label col-md-4 name">Nama :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNamaW"></p>
										</div>
										<label class="control-label col-md-4 name">NIK :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNoNIKW"></p>
										</div>
										<label class="control-label col-md-4 name">Tempat Lahir :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuTempatLahirW"></p>
										</div>
										<label class="control-label col-md-4 name">Tanggal Lahir :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuTanggalLahirW"></p>
										</div>
										<label class="control-label col-md-4 name">No Telepon :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuNoTelponW"></p>
										</div>
										<label class="control-label col-md-4 name">Agama :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuAgamaW"></p>
										</div>
										<label class="control-label col-md-4 name">Pendidikan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPendidikanW"></p>
										</div>
										<label class="control-label col-md-4 name">Pekerjaan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPekerjaanW"></p>
										</div>
										<label class="control-label col-md-4 name">Penghasilan :</label>
										<div class="col-md-8">
											<p class="form-control-static value" name="dataOrtuPenghasilanW"></p>
										</div>
									</div>
									
									<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P'){?>
									<div class="form-body col-md-12">
										<h3 class="block">Data Peringkat (Ranking) di kelas</h3>
									</div>
									<div class="row static-info col-md-12">
										<label class="control-label col-md-2 name">Semester I :</label>
										<div class="col-md-2">
											<p class="form-control-static value" name="dataPeringkatSatu"></p>
										</div>
										<label class="control-label col-md-2 name">Semester II :</label>
										<div class="col-md-2">
											<p class="form-control-static value" name="dataPeringkatDua"></p>
										</div>
										<label class="control-label col-md-2 name">Semester III :</label>
										<div class="col-md-2">
											<p class="form-control-static value" name="dataPeringkatTiga"></p>
										</div>
										<label class="control-label col-md-2 name">Semester VI :</label>
										<div class="col-md-2">
											<p class="form-control-static value" name="dataPeringkatEmpat"></p>
										</div>
										<label class="control-label col-md-2 name">Semester V :</label>
										<div class="col-md-2">
											<p class="form-control-static value" name="dataPeringkatLima"></p>
										</div>
									</div>
									<?php } else { ?>
									<div class="form-body col-md-12">
										<h3 class="block">Data Nilai SKHUN</h3>
									</div>
									<div class="row static-info col-md-12">
										<label class="control-label col-md-2 name">Matematika :</label>
										<div class="col-md-10">
											<p class="form-control-static value" name="dataSKHUMtk"></p>
										</div>
										<label class="control-label col-md-2 name">Bahasa Indonesia :</label>
										<div class="col-md-10">
											<p class="form-control-static value" name="dataSKHUInd"></p>
										</div>
										<label class="control-label col-md-2 name">Bahasa Inggris :</label>
										<div class="col-md-10">
											<p class="form-control-static value" name="dataSKHUIng"></p>
										</div>
										<label class="control-label col-md-2 name">IPA :</label>
										<div class="col-md-10">
											<p class="form-control-static value" name="dataSKHUIpa"></p>
										</div>
									</div>
									<?php } ?>
									
									<div class="form-body col-md-12">
										<h3 class="block">Data Nilai</h3>
									</div>
									<div class="row static-info col-md-3">
										<h4 class="text-center">Bahasa Indonesia</h4>
										<label class="control-label col-md-8 name">Semester I :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIndSatu"></p>
										</div>
										<label class="control-label col-md-8 name">Semester II :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIndDua"></p>
										</div>
										<label class="control-label col-md-8 name">Semester III :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIndTiga"></p>
										</div>
										<label class="control-label col-md-8 name">Semester VI :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIndEmpat"></p>
										</div>
										<label class="control-label col-md-8 name">Semester V :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIndLima"></p>
										</div>
									</div>
									<div class="row static-info col-md-3">
										<h4 class="text-center">Bahasa Inggris</h4>
										<label class="control-label col-md-8 name">Semester I :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIngSatu"></p>
										</div>
										<label class="control-label col-md-8 name">Semester II :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIngDua"></p>
										</div>
										<label class="control-label col-md-8 name">Semester III :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIngTiga"></p>
										</div>
										<label class="control-label col-md-8 name">Semester VI :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIngEmpat"></p>
										</div>
										<label class="control-label col-md-8 name">Semester V :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIngLima"></p>
										</div>
									</div>
									<div class="row static-info col-md-3">
										<h4 class="text-center">Matematika</h4>
										<label class="control-label col-md-8 name">Semester I :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiMtkSatu"></p>
										</div>
										<label class="control-label col-md-8 name">Semester II :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiMtkDua"></p>
										</div>
										<label class="control-label col-md-8 name">Semester III :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiMtkTiga"></p>
										</div>
										<label class="control-label col-md-8 name">Semester VI :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiMtkEmpat"></p>
										</div>
										<label class="control-label col-md-8 name">Semester V :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiMtkLima"></p>
										</div>
									</div>
									<div class="row static-info col-md-3">
										<h4 class="text-center">IPA</h4>
										<label class="control-label col-md-8 name">Semester I :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIpaSatu"></p>
										</div>
										<label class="control-label col-md-8 name">Semester II :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIpaDua"></p>
										</div>
										<label class="control-label col-md-8 name">Semester III :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIpaTiga"></p>
										</div>
										<label class="control-label col-md-8 name">Semester VI :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIpaEmpat"></p>
										</div>
										<label class="control-label col-md-8 name">Semester V :</label>
										<div class="col-md-4">
											<p class="form-control-static value" name="dataNilaiIpaLima"></p>
										</div>
									</div>
									<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P') { ?>
									<div class="form-body col-md-12">
										<h3 class="block">Data Prestasi</h3>
									</div>
									<div class="row static-info col-md-12">
										<label class="control-label col-md-1 name">No</label>
										<div class="col-md-2">
											<p class="form-control-static value">Jenis Prestasi</p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static value" >Tingkat</p>
										</div>
										<div class="col-md-3">
											<p class="form-control-static value" >Nama Prestasi</p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static value" >Tahun</p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static value" >Juara</p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static value" >Penyelenggara</p>
										</div>
										
										<label class="control-label col-md-1 name">1</label>
										<div class="col-md-2">
											<p class="form-control-static" name="dataPrestasiJenisPrestasiSatu"></p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiTingkatSatu"></p>
										</div>
										<div class="col-md-3">
											<p class="form-control-static " name="dataPrestasiSatu"></p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static " name="dataPrestasiThnSatu"></p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static " name="dataPrestasiJuaraSatu"></p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiPenyelenggaraSatu"></p>
										</div>
										
										<label class="control-label col-md-1 name">2</label>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiJenisPrestasiDua"></p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiTingkatDua"></p>
										</div>
										<div class="col-md-3">
											<p class="form-control-static " name="dataPrestasiDua"></p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static " name="dataPrestasiThnDua"></p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static " name="dataPrestasiJuaraDua"></p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiPenyelenggaraDua"></p>
										</div>
										
										<label class="control-label col-md-1 name">3</label>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiJenisPrestasiTiga"></p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiTingkatTiga"></p>
										</div>
										<div class="col-md-3">
											<p class="form-control-static " name="dataPrestasiTiga"></p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static " name="dataPrestasiThnTiga"></p>
										</div>
										<div class="col-md-1">
											<p class="form-control-static " name="dataPrestasiJuaraTiga"></p>
										</div>
										<div class="col-md-2">
											<p class="form-control-static " name="dataPrestasiPenyelenggaraTiga"></p>
										</div>
									</div>
										<?php } else if($this->session->userdata('reg_akun_jalur_daftar') == 'R') { ?>
										<?php } ?>
								</div>
                                <div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-primary" onclick="showInputan();">Lengkapi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>        
						</div>
                    </div>
                </div>
              <div class="row" id="inputan" style="display: none;">
                        <div class="col-md-12">
                            <div class="portlet light " id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red bold uppercase"> <?=$titleInputan;?>
                                            <span class="step-title"> Step 1 of 4 </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" id="submit_form" method="POST">
										<input type="text" id="id" name="id" hidden />
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Data Diri </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Data Orang Tua & Wali </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
															<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P'){?>
                                                                <i class="fa fa-check"></i> Data Nilai & Prestasi </span>
															<?php } else {?>
                                                                <i class="fa fa-check"></i> Data Nilai Siswa </span>
															<?php }?>
															
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Konfirmasi </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Lengkapi Data Diri Anda</h3>
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">No Registrasi
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_akun_no_reg" readonly/>
                                                            </div>
                                                            
														</div>
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Nama
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_nama" />
                                                            </div>
                                                            <label class="control-label col-md-2">Nama Panggilan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_panggilan" />
                                                            </div>
														</div>
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Jenis Kelamin
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<select class="form-control" name="reg_data_diri_jenis_kelamin">
																	<option value="">Pilih Jenis Kelamin</option>
																	<option value="L">Laki-laki</option>
																	<option value="P">Perempuan</option>
																</select>
                                                            </div>
                                                            <label class="control-label col-md-2">Agama
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<select class="form-control" name="reg_data_diri_agama_id">
																	<option value="">Pilih Agama</option>
																	<?php foreach ($agama as $a) { ?>
																		<option value="<?=$a->agama_id;?>"><?=$a->agama_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group col-md-12">
															<label class="control-label col-md-2">NISN
                                                                <span class="required"> * </span>
															</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_akun_nisn" maxlength="11"/>
                                                            </div>
															<label class="control-label col-md-2">NIS
                                                                <span class="required"> * </span>
															</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_nis"  />
                                                            </div>
														</div>
														
																												<div class="form-group col-md-12">
															<label class="control-label col-md-2">No Ujian Nasional
                                                                <span class="required"> * </span>
															</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_un" />
                                                            </div>
															<label class="control-label col-md-2">No Induk Kependudukan (NIK)
                                                                <span class="required"> * </span>
															</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_nik" />
                                                            </div>
														</div>
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">NPSN Sekolah Asal
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_npsn" />
                                                            </div>
															<label class="control-label col-md-2">Nama Sekolah Asal
                                                                <span class="required"> * </span>
                                                            </label>
															<div class="col-md-3">
																<select class="form-control" name="reg_data_diri_lulusan" id="reg_data_diri_lulusan" onchange="pilihSekolah()">
																	<option value="">Pilih Sekolah</option>
																	<?php foreach ($sekolah as $a) { ?>
																		<option value="<?=$a->sekolah_nama;?>"><?=$a->sekolah_nama;?></option>
																	<?php } ?>
																</select>
                                                                <input type="text" class="form-control" placeholder="Isi Nama Sekolah Disini" name="reg_data_diri_lulusan_tmp" id="reg_data_diri_lulusan_tmp"/>
                                                            </div>
                                                            <div class="col-md-1">
																<select class="form-control" id="reg_data_diri_lulusan_akreditas" name="reg_data_diri_lulusan_akreditas">
					
																	<option value="A">A</option>
																	<option value="B">B</option>
																	<option value="C">C</option>
																	<option value="N">Tidak Terakreditas</option>
																</select>
                                                            </div>
                                                        </div>
														
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Tempat Lahir
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_tempat_lahir" />
                                                            </div>
                                                            <label class="control-label col-md-2">Tanggal Lahir
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
															<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
																<input type="text" class="form-control" readonly="" name="reg_data_diri_tgl_lahir">
																<span class="input-group-btn" style="vertical-align: top !important;">
																	<button class="btn default" type="button">
																		<i class="fa fa-calendar"></i>
																	</button>
																</span>
															</div>
                                                            </div>
														</div>
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">No Telp
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_telp" />
                                                            </div>
														</div>
														
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Dusun
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_dusun" />
                                                            </div>
                                                            <label class="control-label col-md-2">RT / RW
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
															   <input type="text" class="form-control" name="reg_data_diri_alamat_rt" />
															</div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_rw" />
                                                            </div>
														</div>

														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Kelurahan / Desa
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_desa" />
                                                            </div>
                                                            <label class="control-label col-md-2">Kode Pos
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_kodepos" />
                                                            </div>
														</div>														

														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Kecamatan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_kecamatan" />
                                                            </div>
                                                            <label class="control-label col-md-2">Kota
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_kota" />
                                                            </div>
														</div>														

														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Propinsi
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alamat_propinsi" />
                                                            </div>
														</div>															

															<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">No Telepon Rumah
                                                                
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_telp_rumah" />
                                                            </div>
														</div>		
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Email Pribadi
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_email" />
                                                            </div>
                                                            <label class="control-label col-md-2">No Kartu Keluarga Sejahtra
                                                                
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_kks" />
                                                            </div>
														</div>
														<div class="form-group col-md-12">
                                                            <i>KPS = Kartu Perlindungan Sosial</i>
														</div>
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Apakah Penerima KPS / PKH
                                                                
                                                            </label>
                                                            <div class="col-md-4">
																<select class="form-control" onchange="getComboKPS(this)" id="reg_data_diri_penerima_pkh_kps" name="reg_data_diri_penerima_pkh_kps">
																	<option value="Y">Ya</option>
																	<option value="N">Tidak</option>
																</select>
                                                            </div>
                                                            <div id="noKPS">
                                                            <label class="control-label col-md-2">No KPS / PKH
                                                                </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_pkh_kps" />
                                                            </div>
                                                            </div>
														</div>
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Usulan dari Sekolah layah PIP
                                                                </label>
                                                            <div class="col-md-4">
																<select class="form-control" onchange="getComboPIP(this)" name="reg_data_diri_usulan_layak_pip">
																	<option value="Y">Ya</option>
																	<option value="N">Tidak</option>
																</select>
                                                            </div>
                                                            <div id="alasanLayak">
                                                            <label class="control-label col-md-2">Alasan Layak
                                                                </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alasan_layak" />
                                                            </div>
                                                            </div>
														</div>
														<div class="form-group col-md-12">
                                                            <i>KIP = Kartu Indonesia Pintar</i>
														</div>
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">Penerima KIP
                                                                </label>
                                                            <div class="col-md-4">
																<select class="form-control" onchange="getComboKIP(this)" name="reg_data_diri_penerima_kip">
																	<option value="Y">Ya</option>
																	<option value="N">Tidak</option>
																</select>
                                                            </div>

														</div>
														<div class="form-group col-md-12" id="yaKIP">
                                                            <label class="control-label col-md-2">No KIP
                                                                </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_kip" />
                                                            </div>
                                                            <label class="control-label col-md-2">Nama Tertera KIP
                                                                </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_nama_kip" />
                                                            </div>
                                                            </div>
                                                            <div class="form-group col-md-12" id="tidakKIP">
                                                            <label class="control-label col-md-2">Alasan Menolah
                                                                </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_alasan_menolak_kip" />
                                                            </div>
														</div>
														<div class="form-group col-md-12">
                                                            <label class="control-label col-md-2">No Registrasi Akta Lahir
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="reg_data_diri_no_reg_akta" />
                                                            </div>
														</div>
														
                                                        <div class="form-group">
														</div>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">Lengkapi Data Orang Tua</h3>
                                                    <div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Data Ayah</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Nama
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_nama_a" />
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">NIK
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_no_nik_a" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Tempat Lahir
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_tempat_lahir_a" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Tanggal Lahir
                                                            </label>
                                                            <div class="col-md-8">
																<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
																<input type="text" class="form-control" readonly="" name="reg_data_ortu_tgl_lahir_a">
																<span class="input-group-btn" style="vertical-align: top !important;">
																	<button class="btn default" type="button">
																		<i class="fa fa-calendar"></i>
																	</button>
																</span>
																</div>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">No Telepon
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_no_telepon_a" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Agama
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_agama_id_a">
																	<option value="">Pilih Agama</option>
																	<?php foreach ($agama as $a) { ?>
																		<option value="<?=$a->agama_id;?>"><?=$a->agama_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Pendidikan
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_pendidikan_id_a">
																	<option value="">Pilih Pendidikan</option>
																	<?php foreach ($pendidikan as $p) { ?>
																		<option value="<?=$p->pendidikan_id;?>"><?=$p->pendidikan_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Pekerjaan
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_pekerjaan_id_a">
																	<option value="">Pilih Pekerjaan</option>
																	<?php foreach ($pekerjaan as $p) { ?>
																		<option value="<?=$p->pekerjaan_id;?>"><?=$p->pekerjaan_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Penghasilan
                                                            </label>
                                                            <div class="col-md-8">
<select class="form-control" name="reg_data_ortu_penghasilan_a">
																	<option value="">Pilih Penghasilan</option>																		<option value="KURANG DARI RP. 500.000">KURANG DARI RP. 500.000</option>																						<option value="RP. 500.000 - RP. 999.999">RP. 500.000 - RP. 999.999</option>																						<option value="RP. 1.000.000 - RP. 1.999.999">RP. 1.000.000 - RP. 1.999.999</option>																						<option value="RP. 2.000.000 - RP. 4.999.999">RP. 2.000.000 - RP. 4.999.999</option>																						<option value="RP. 5.000.000 - RP. 20.000.000">RP. 5.000.000 - RP. 20.000.000</option>																						<option value="LEBIH DARI RP. 20.000.000">LEBIH DARI RP. 20.000.000</option>																</select>
                                                            </div>
														</div>
                                                        </div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Data Ibu</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Nama
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_nama_i" />
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">NIK
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_no_nik_i" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Tempat Lahir
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_tempat_lahir_i" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Tanggal Lahir
                                                            </label>
                                                            <div class="col-md-8">
																<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
																<input type="text" class="form-control" readonly="" name="reg_data_ortu_tgl_lahir_i">
																<span class="input-group-btn" style="vertical-align: top !important;">
																	<button class="btn default" type="button">
																		<i class="fa fa-calendar"></i>
																	</button>
																</span>
																</div>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">No Telepon                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_no_telepon_i" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Agama
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_agama_id_i">
																	<option value="">Pilih Agama</option>
																	<?php foreach ($agama as $a) { ?>
																		<option value="<?=$a->agama_id;?>"><?=$a->agama_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Pendidikan
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_pendidikan_id_i">
																	<option value="">Pilih Pendidikan</option>
																	<?php foreach ($pendidikan as $p) { ?>
																		<option value="<?=$p->pendidikan_id;?>"><?=$p->pendidikan_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Pekerjaan
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_pekerjaan_id_i">
																	<option value="">Pilih Pekerjaan</option>
																	<?php foreach ($pekerjaan as $p) { ?>
																		<option value="<?=$p->pekerjaan_id;?>"><?=$p->pekerjaan_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Penghasilan
                                                            </label>
                                                            <div class="col-md-8">
<select class="form-control" name="reg_data_ortu_penghasilan_i">
																	<option value="">Pilih Penghasilan</option>																		<option value="KURANG DARI RP. 500.000">KURANG DARI RP. 500.000</option>																						<option value="RP. 500.000 - RP. 999.999">RP. 500.000 - RP. 999.999</option>																						<option value="RP. 1.000.000 - RP. 1.999.999">RP. 1.000.000 - RP. 1.999.999</option>																						<option value="RP. 2.000.000 - RP. 4.999.999">RP. 2.000.000 - RP. 4.999.999</option>																						<option value="RP. 5.000.000 - RP. 20.000.000">RP. 5.000.000 - RP. 20.000.000</option>																						<option value="LEBIH DARI RP. 20.000.000">LEBIH DARI RP. 20.000.000</option>																</select>
                                                            </div>
														</div>
                                                        </div>
														<h3 class="block">Lengkapi Data Wali</h3>
                                                    <div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Data Wali</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Nama
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_nama_w" />
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">NIK
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_no_nik_w" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Tempat Lahir
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_tempat_lahir_w" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Tanggal Lahir
                                                            </label>
                                                            <div class="col-md-8">
																<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
																<input type="text" class="form-control" readonly="" name="reg_data_ortu_tgl_lahir_w">
																<span class="input-group-btn" style="vertical-align: top !important;">
																	<button class="btn default" type="button">
																		<i class="fa fa-calendar"></i>
																	</button>
																</span>
																</div>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">No Telepon
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_ortu_no_telepon_w" />
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Agama
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_agama_id_w">
																	<option value="">Pilih Agama</option>
																	<?php foreach ($agama as $a) { ?>
																		<option value="<?=$a->agama_id;?>"><?=$a->agama_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Pendidikan
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_pendidikan_id_w">
																	<option value="">Pilih Pendidikan</option>
																	<?php foreach ($pendidikan as $p) { ?>
																		<option value="<?=$p->pendidikan_id;?>"><?=$p->pendidikan_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Pekerjaan
                                                            </label>
                                                            <div class="col-md-8">
																<select class="form-control" name="reg_data_ortu_pekerjaan_id_w">
																	<option value="">Pilih Pekerjaan</option>
																	<?php foreach ($pekerjaan as $p) { ?>
																		<option value="<?=$p->pekerjaan_id;?>"><?=$p->pekerjaan_nama;?></option>
																	<?php } ?>
																</select>
                                                            </div>
														</div>
														<div class="form-group">
                                                            <label class="control-label col-md-4">Penghasilan
                                                            </label>
                                                            <div class="col-md-8">
<select class="form-control" name="reg_data_ortu_penghasilan_w">
																	<option value="">Pilih Penghasilan</option>																		<option value="KURANG DARI RP. 500.000">KURANG DARI RP. 500.000</option>																						<option value="RP. 500.000 - RP. 999.999">RP. 500.000 - RP. 999.999</option>																						<option value="RP. 1.000.000 - RP. 1.999.999">RP. 1.000.000 - RP. 1.999.999</option>																						<option value="RP. 2.000.000 - RP. 4.999.999">RP. 2.000.000 - RP. 4.999.999</option>																						<option value="RP. 5.000.000 - RP. 20.000.000">RP. 5.000.000 - RP. 20.000.000</option>																						<option value="LEBIH DARI RP. 20.000.000">LEBIH DARI RP. 20.000.000</option>																</select>
                                                               
                                                            </div>
														</div>
                                                        </div>
														<div class="form-group">
                                                        </div>
														
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
														<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P'){?>
                                                        <h3 class="block">Lengkapi Data Peringkat (Ranking) di kelas</h3>
                                                        <div class="col-md-12">
															<div class="col-md-6">
																<div class="form-group">
																	<h3 class="col-md-12 text-center">Peringkat di kelas</h3>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Semester I
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<select class="form-control" name="reg_data_peringkat_satu">
																			<option value="">Pilih Salah Satu</option>
																			<?php for ($x = 0; $x <= 10; $x++) { ?>
																				<option value="<?=$x?>"><?=$x?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Semester II
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<select class="form-control" name="reg_data_peringkat_dua">
																			<option value="">Pilih Salah Satu</option>
																			<?php for ($x = 0; $x <= 10; $x++) { ?>
																				<option value="<?=$x?>"><?=$x?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Semester III
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<select class="form-control" name="reg_data_peringkat_tiga">
																			<option value="">Pilih Salah Satu</option>
																			<?php for ($x = 0; $x <= 10; $x++) { ?>
																				<option value="<?=$x?>"><?=$x?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Semester VI
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<select class="form-control" name="reg_data_peringkat_empat">
																			<option value="">Pilih Salah Satu</option>
																			<?php for ($x = 0; $x <= 10; $x++) { ?>
																				<option value="<?=$x?>"><?=$x?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Semester V
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<select class="form-control" name="reg_data_peringkat_lima">
																			<option value="">Pilih Salah Satu</option>
																			<?php for ($x = 0; $x <= 10; $x++) { ?>
																				<option value="<?=$x?>"><?=$x?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<?php } else { ?>
                                                        <h3 class="block">Lengkapi Nilai SKHUN</h3>
                                                        <div class="col-md-12">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label col-md-4">Matematika
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<input type="text" onkeyup="angka(this);" class="form-control" name="reg_data_nilai_skhu_mtk" maxlength="3" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Bahasa Indonesia
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<input type="text" onkeyup="angka(this);" class="form-control" name="reg_data_nilai_skhu_ind" maxlength="3" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">Bahasa Inggris
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<input type="text" onkeyup="angka(this);" class="form-control" name="reg_data_nilai_skhu_ing" maxlength="3" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-md-4">IPA
																		<span class="required"> * </span>
																	</label>
																	<div class="col-md-8">
																		<input type="text" onkeyup="angka(this);" class="form-control" name="reg_data_nilai_skhu_ipa" maxlength="3" />
																	</div>
																</div>
															</div>
														</div>
														<?php } ?>
														
														<h3 class="block">Lengkapi Data Nilai</h3>
														<div class="col-md-12">
															<div class="col-md-6">
															<div class="form-group">
																<h3 class="col-md-12 text-center">Nilai Bahasa Indonesia</h3>
															</div>
															<div class="form-group">
																<label class="control-label col-md-4">Semester I
																	<span class="required"> * </span>
																</label>
																<div class="col-md-8">
																	<input type="text" onkeyup="angka(this);" class="form-control" name="reg_data_nilai_ind_satu" maxlength="3" />
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-4">Semester II
																	<span class="required"> * </span>
																</label>
																<div class="col-md-8">
																	<input type="text"  class="form-control" name="reg_data_nilai_ind_dua" maxlength="3"/>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-4">Semester III
																	<span class="required"> * </span>
																</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" name="reg_data_nilai_ind_tiga" maxlength="3"/>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-4">Semester VI
																	<span class="required"> * </span>
																</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" name="reg_data_nilai_ind_empat" maxlength="3"/>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-4">Semester V
																	<span class="required"> * </span>
																</label>
																<div class="col-md-8">
																	<input type="text" class="form-control" name="reg_data_nilai_ind_lima" maxlength="3"/>
																</div>
															</div>
															</div>
                                                        <div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai Bahasa Inggris</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ing_satu" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ing_dua" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ing_tiga" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ing_empat" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ing_lima" maxlength="3"/>
                                                            </div>
														</div>
														</div>
														</div>
														<div class="col-md-12">
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai Matematika</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_mtk_satu" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_mtk_dua" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_mtk_tiga" maxlength="3" />
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_mtk_empat" maxlength="3" />
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_mtk_lima" maxlength="3"/>
                                                            </div>
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai IPA</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ipa_satu" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ipa_dua" maxlength="3" />
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ipa_tiga" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ipa_empat" maxlength="3"/>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="reg_data_nilai_ipa_lima" maxlength="3"/>
                                                            </div>
														</div>
														</div>
														</div>
														<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P') { ?>
														<div class="form-group">
															<h3 class="col-md-12">Lengkapi Data Prestasi (jika ada)</h3>
														</div>
                                                        <div class="form-group">
                                                            <div class="col-md-1">
                                                                No
                                                            </div>
                                                            <div class="col-md-2">
                                                                Jenis 
                                                            </div>
                                                            <div class="col-md-2">
                                                                Tingkat
                                                            </div>
                                                            <div class="col-md-3">
                                                                Nama Prestasi
                                                            </div>
                                                            <div class="col-md-1">
                                                                Tahun
                                                            </div>
                                                            <div class="col-md-1">
                                                                Juara
                                                            </div>
                                                            <div class="col-md-2">
                                                                Penyelenggara
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
															<label class="control-label col-md-1">1
                                                            </label>
                                                            <div class="col-md-2">
																<select class="form-control" name="reg_data_prestasi_jenis_prestasi_satu">
																	<option value="">Pilih Jenis Prestasi</option>
																	<option value="SAINS">Sains</option>
																	<option value="OLAH RAGA">Olah Raga</option>
																	<option value="SENI">Seni</option>
																</select>
                                                            </div>
                                                            <div class="col-md-2">
																<select class="form-control" name="reg_data_prestasi_tingkat_satu">
																	<option value="">Pilih Salah Satu</option>
																	<option value="Sekolah">Sekolah</option>
																	<option value="Kecamatan">Kecamatan</option>
																	<option value="Kabupaten">Kabupaten</option>
																	<option value="Provinsi">Provinsi</option>
																	<option value="Nasional">Nasional</option>
																	<option value="Internasional">Internasional</option>
																</select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_nama_satu" placeholder="Nama Prestasi" />
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_thn_satu" placeholder="Tahun"/>
                                                            </div>
                                                            <div class="col-md-1">
																<select class="form-control" name="reg_data_prestasi_juara_satu">
																	<option value="">Pilih Salah Satu</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																</select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_penyelenggara_satu" placeholder="Penyelenggara"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
															<label class="control-label col-md-1">2
                                                            </label>
                                                            <div class="col-md-2">
																<select class="form-control" name="reg_data_prestasi_jenis_prestasi_dua">
																	<option value="">Pilih Jenis Prestasi</option>
																	<option value="SAINS">Sains</option>
																	<option value="OLAH RAGA">Olah Raga</option>
																	<option value="SENI">Seni</option>
																</select>
                                                            </div>
                                                            <div class="col-md-2">
																<select class="form-control" name="reg_data_prestasi_tingkat_dua">
																	<option value="">Pilih Salah Satu</option>
																	<option value="Sekolah">Sekolah</option>
																	<option value="Kecamatan">Kecamatan</option>
																	<option value="Kabupaten">Kabupaten</option>
																	<option value="Provinsi">Provinsi</option>
																	<option value="Nasional">Nasional</option>
																	<option value="Internasional">Internasional</option>
																</select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_nama_dua" placeholder="Nama Prestasi" />
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_thn_dua" placeholder="Tahun"/>
                                                            </div>
                                                            <div class="col-md-1">
																<select class="form-control" name="reg_data_prestasi_juara_dua">
																	<option value="">Pilih Salah Satu</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																</select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_penyelenggara_dua" placeholder="Penyelenggara"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
															<label class="control-label col-md-1">3
                                                            </label>
                                                            <div class="col-md-2">
																<select class="form-control" name="reg_data_prestasi_jenis_prestasi_tiga">
																	<option value="">Pilih Jenis Prestasi</option>
																	<option value="SAINS">Sains</option>
																	<option value="OLAH RAGA">Olah Raga</option>
																	<option value="SENI">Seni</option>
																</select>
                                                            </div>
                                                            <div class="col-md-2">
																<select class="form-control" name="reg_data_prestasi_tingkat_tiga">
																	<option value="">Pilih Salah Satu</option>
																	<option value="Sekolah">Sekolah</option>
																	<option value="Kecamatan">Kecamatan</option>
																	<option value="Kabupaten">Kabupaten</option>
																	<option value="Provinsi">Provinsi</option>
																	<option value="Nasional">Nasional</option>
																	<option value="Internasional">Internasional</option>
																</select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_nama_tiga" placeholder="Nama Prestasi" />
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_thn_tiga" placeholder="Tahun"/>
                                                            </div>
                                                            <div class="col-md-1">
																<select class="form-control" name="reg_data_prestasi_juara_tiga">
																	<option value="">Pilih Salah Satu</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																</select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="reg_data_prestasi_penyelenggara_tiga" placeholder="Penyelenggara"/>
                                                            </div>
                                                        </div>
														<?php } ?>
														
                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Konfirmasi Data Persyaratan</h3>
                                                        <h4 class="form-section">Data Diri</h4>
														<div class="form-group">
                                                            <label class="control-label col-md-2">Nama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_nama"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Nama Panggilan :
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_panggilan"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Jenis Kelamin :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_jenis_kelamin"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Agama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_agama_id"> </p>
                                                            </div>
                                                        </div>
														
														
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">NISN :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_akun_nisn"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">NIS :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_nis"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">No Seri Ijazah :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_seri_ijazah"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">No Seri SKHUN :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_seri_skhun"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">No Ujian Nasional :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_un"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">No Induk Kependudukan (NIK) :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_nik"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">NPSN Sekolah Asal :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_npsn"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Nama Sekolah Asal :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_lulusan"> </p>
                                                            </div>
                                                        </div>
														<div class="form-group">
                                                            <label class="control-label col-md-2">Tempat Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_tempat_lahir"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Tanggal Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_tgl_lahir"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">No Telpon :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_telp"> </p>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Dusun :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_dusun"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">RT / RW :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_rt"> </p> / 
																<p class="form-control-static" data-display="reg_data_diri_alamat_rw"> </p>
                                                            </div>
                                                        </div>		
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Kelurahan / Desa :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_desa"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Kode Pos :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_kodepos"> </p>
                                                            </div>
                                                        </div>	
														
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Kecamatan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_kecamatan"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Kota :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_kota"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Propinsi :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alamat_propinsi"> </p>
                                                            </div>
                                                        </div>
														
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">No Telepon Rumah :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_telp_rumah"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Email Pribadi :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">No KKS :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_kks"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Apakah Penerima KPS / PKH :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_penerima_pkh_kps"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">No KPS / PKH :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_pkh_kps"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Usulan dari Sekolah layak PIP :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_usulan_layak_pip"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Alasan Layak :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alasan_layak"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Penerima KIP :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_penerima_kip"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">No KIP :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_kip"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Nama Tertera KIP :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_nama_kip"> </p>
                                                            </div>
                                                            <label class="control-label col-md-2">Alasan Menolah KIP :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_alasan_menolak_kip"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">No Registrasi Akta Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
																<p class="form-control-static" data-display="reg_data_diri_no_reg_akta"> </p>
                                                            </div>
                                                        </div>
														
														
														
														
														<h4 class="form-section">Data Orang Tua</h4>
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Data Ayah</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Nama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_nama_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">NIK :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_no_nik_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Tempat Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_tempat_lahir_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Tanggal Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_tgl_lahir_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">No Telp :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_no_telepon_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Agama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_agama_id_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Pendidikan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_pendidikan_id_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Pekerjaan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_pekerjaan_id_a"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Penghasilan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_penghasilan_a"> </p>
                                                            </div>
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Data Ibu</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Nama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_nama_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">NIK :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_no_nik_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Tempat Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_tempat_lahir_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Tanggal Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_tgl_lahir_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">No Telp :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_no_telepon_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Agama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_agama_id_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Pendidikan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_pendidikan_id_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Pekerjaan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_pekerjaan_id_i"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Penghasilan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_penghasilan_i"> </p>
                                                            </div>
														</div>
														</div>
														<h4 class="form-section">Data Wali</h4>
														<div class="col-md-12">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Data Wali</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Nama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_nama_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">NIK :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_no_nik_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Tempat Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_tempat_lahir_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Tanggal Lahir :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_tgl_lahir_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">No Telp :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_no_telepon_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Agama :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_agama_id_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Pendidikan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_pendidikan_id_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Pekerjaan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_pekerjaan_id_w"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Penghasilan :
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_ortu_penghasilan_w"> </p>
                                                            </div>
														</div>
														</div>
														<h4 class="form-section">Data Nilai</h4>
														<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P'){} else { ?>
														<div class="col-md-12">
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai SKHUN</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Matematika
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_skhu_mtk"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Bahasa Indonesia
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_skhu_ind"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Bahasa Inggris
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_skhu_ing"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">IPA
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_skhu_ipa"> </p>
                                                            </div>
														</div>
														</div>
														</div>
														<?php } ?>
														
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai Bahasa Indonesia</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ind_satu"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ind_dua"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ind_tiga"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ind_empat"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ind_lima"> </p>
                                                            </div>
														</div>
														</div>
                                                        <div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai Bahasa Inggris</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ing_satu"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ing_dua"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ing_tiga"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ing_empat"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ing_lima"> </p>
                                                            </div>
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai Matematika</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_mtk_satu"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_mtk_dua"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_mtk_tiga"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_mtk_empat"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_mtk_lima"> </p>
                                                            </div>
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group">
															<h3 class="col-md-12 text-center">Nilai IPA</h3>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester I
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ipa_satu"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester II
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ipa_dua"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester III
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ipa_tiga"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester VI
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ipa_empat"> </p>
                                                            </div>
														</div>
                                                        <div class="form-group">
															<label class="control-label col-md-4">Semester V
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
																<p class="form-control-static" data-display="reg_data_nilai_ipa_lima"> </p>
                                                            </div>
														</div>
														</div>
														<?php if($this->session->userdata('reg_akun_jalur_daftar') == 'P') { ?>
														<h4 class="form-section">Data Prestasi</h4>
														<div class="form-group">
															<label class="control-label col-md-1">No
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" >Jenis Prestasi </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" >Tingkat </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" >Nama Prestasi </p>
                                                            </div>
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" >Tahun </p>
                                                            </div>
                                                            <div class="col-md-1">
																<p class="form-control-static" >Juara </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" >Penyelenggara </p>
                                                            </div>
                                                        </div>
														<div class="form-group">
															<label class="control-label col-md-1">1
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_jenis_prestasi_satu"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_tingkat_satu"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_nama_satu"> </p>
                                                            </div>
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_thn_satu"> </p>
                                                            </div>
                                                            <div class="col-md-1">
																<p class="form-control-static" data-display="reg_data_prestasi_juara_satu"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_penyelenggara_satu"> </p>
                                                            </div>
                                                        </div>
														<div class="form-group">
															<label class="control-label col-md-1">2
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_jenis_prestasi_dua"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_tingkat_dua"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_nama_dua"> </p>
                                                            </div>
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_thn_dua"> </p>
                                                            </div>
                                                            <div class="col-md-1">
																<p class="form-control-static" data-display="reg_data_prestasi_juara_dua"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_penyelenggara_dua"> </p>
                                                            </div>
                                                        </div>
														<div class="form-group">
															<label class="control-label col-md-1">3
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_jenis_prestasi_tiga"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_tingkat_tiga"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_nama_tiga"> </p>
                                                            </div>
                                                            </label>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_thn_tiga"> </p>
                                                            </div>
                                                            <div class="col-md-1">
																<p class="form-control-static" data-display="reg_data_prestasi_juara_tiga"> </p>
                                                            </div>
                                                            <div class="col-md-2">
																<p class="form-control-static" data-display="reg_data_prestasi_penyelenggara_tiga"> </p>
                                                            </div>
                                                        </div>
														<?php } else if($this->session->userdata('reg_akun_jalur_daftar') == 'R') { ?>
														<?php } ?>
													</div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <a onclick="showData()" class="btn default">Batal </a>
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Kembali </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Selanjutnya
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
														<button type="submit" id="btnSave" class="btn green button-submit">Simpan <i class="fa fa-check"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
      
	  	  <div class="row" id="uploadFoto" style="display: none;">
              <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Upload Foto</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								
                                    <!-- BEGIN FORM-->
                                    <form action="<?=base_url();?>backend/regSiswa/uploadFoto" method="post" class="form-horizontal" enctype="multipart/form-data">		
                                        <div class="form-body">
											<div class="form-group">
                                                <label class="control-label col-md-4">Cari File
                                                </label>
                                                <div class="col-md-8">
													<input type="file" class="form-control" name="file"/>
													<p>Ukuran Foto Max(lebar : 240 pixel - Tinggi: 300 pixel)</p>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
													<button type="submit" class="btn btn-primary">Import</button>
                                                    <button type="button" class="btn default" onclick="showData();">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
								</div>
							</div>
						</div>
					</div>
<?php } ?>
