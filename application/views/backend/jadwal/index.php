<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
/* admin */
if($this->session->userdata('level')=='1')
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

<script src="<?=base_url();?>asset/pages/js/form-validation-jadwal.js" type="text/javascript"></script>

<script>
$(document).ready(function() {	
	reset();
	$("#data").show();
	var hari=$('[name="idHari"]').val();

	$("#mata_pelajaran_satu").change(function(){
		var idMatPel=$("#mata_pelajaran_satu").val();
		loadGuru(idMatPel,"#guru_satu", hari, '1', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_dua").change(function(){
		var idMatPel=$("#mata_pelajaran_dua").val();
		loadGuru(idMatPel,"#guru_dua", hari, '2', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_tiga").change(function(){
		var idMatPel=$("#mata_pelajaran_tiga").val();
		loadGuru(idMatPel,"#guru_tiga", hari, '3', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_empat").change(function(){
		var idMatPel=$("#mata_pelajaran_empat").val();
		loadGuru(idMatPel,"#guru_empat", hari, '4', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_lima").change(function(){
		var idMatPel=$("#mata_pelajaran_lima").val();
		loadGuru(idMatPel,"#guru_lima", hari, '5', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_enam").change(function(){
		var idMatPel=$("#mata_pelajaran_enam").val();
		loadGuru(idMatPel,"#guru_enam", hari, '6', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_tujuh").change(function(){
		var idMatPel=$("#mata_pelajaran_tujuh").val();
		loadGuru(idMatPel,"#guru_tujuh", hari, '7', <?=$idRuangan?>);
	});
	$("#mata_pelajaran_delapan").change(function(){
		var idMatPel=$("#mata_pelajaran_delapan").val();
		loadGuru(idMatPel,"#guru_delapan", hari, '8', <?=$idRuangan?>);
	});
    $('[name="idRuangan"]').val(<?=$idRuangan;?>);
    $('[name="idThnAjaran"]').val(<?=$idThnAjaran?>);
    $('[name="idSemester"]').val(<?=$idSemester?>);
});

function loadGuru(idMatPel, idIsi, hari, jamKe, ruangan)
{
    $.ajax({
	url:"<?php echo base_url();?>backend/jadwal/tampilkanGuru/"+hari+"/"+jamKe+"/"+ruangan,
	data:"mata_pelajaran=" + idMatPel,
	success: function(html)
	{
        $(idIsi).html(html);            
	}
	});
}

function reset(){
	$("#data").hide();
	$("#inputan").hide();
	$("#alerERR").hide();
	$("#alerSKS").hide();
}

function add()
{
	showInputan();
    save_method = 'add';
};

function edit(ruangan, thnAjaran, hari)
{
	showLoading();
    save_method = 'update';
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('backend/jadwal/prepareEdit')?>/" + ruangan+"/"+thnAjaran+"/"+hari+"/"+<?=$this->session->userdata('id_semester');?>,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			showInputan();
			
			$('[name="idRuangan"]').val(ruangan);
			$('[name="idThnAjaran"]').val(thnAjaran);
			$('[name="idHari"]').val(hari);
			$('[name="idSemester"]').val(<?=$this->session->userdata('id_semester')?>);
			
			var dt = data.senin.split("|");
			var dataTmp;
			for (var i = 0; i < dt.length; i++) {
				dataTmp = dt[i].split(",");
				if(dataTmp[0] == 1){
					document.getElementById('mata_pelajaran_satu').value= dataTmp[2];
					loadGuru(dataTmp[2], "#guru_satu", $('[name="idHari"]').val(), '1', ruangan);
				}else if(dataTmp[0] == 2){
					$('[name="mata_pelajaran_dua"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_dua", $('[name="idHari"]').val(), '2', ruangan);
				}else if(dataTmp[0] == 3){
					$('[name="mata_pelajaran_tiga"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_tiga", $('[name="idHari"]').val(), '3', ruangan);
				}else if(dataTmp[0] == 4){
					$('[name="mata_pelajaran_empat"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_empat", $('[name="idHari"]').val(), '4', ruangan);
				}else if(dataTmp[0] == 5){
					$('[name="mata_pelajaran_lima"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_lima", $('[name="idHari"]').val(), '5', ruangan);
				}else if(dataTmp[0] == 6){
					$('[name="mata_pelajaran_enam"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_enam", $('[name="idHari"]').val(), '6', ruangan);
				}else if(dataTmp[0] == 7){
					$('[name="mata_pelajaran_tujuh"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_tujuh", $('[name="idHari"]').val(), '7', ruangan);
				}else if(dataTmp[0] == 8){
					$('[name="mata_pelajaran_delapan"]').val(dataTmp[2]);
					loadGuru(dataTmp[2], "#guru_delapan", $('[name="idHari"]').val(), '8', ruangan);
				}
			}
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
};

function selectElement(isi, id){
	var element =  document.getElementById(id);
	element.value = isi;
}

function showData(){
	showLoading();
	reset();
	$("#data").show();
	hideLoading();
}

function showInputan(hari){
	showLoading();
	reset();
    save_method = 'add';
	var namaHari = "";
    $('[name="idHari"]').val(hari);
	if(hari=="1"){
		namaHari = "Senin";
	}else if(hari=="2"){
		namaHari = "Selasa";
	}else if(hari=="3"){
		namaHari = "Rabu";
	}else if(hari=="4"){
		namaHari = "Kamis";
	}else if(hari=="5"){
		namaHari = "Jum'at";
	}else if(hari=="6"){
		namaHari = "Sabtu";
	}
	$("#inputan").show();
	hideLoading();
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('backend/jadwal/save')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");
		$idRuangan = $('[name="idRuangan"]').val();
    } else {
        url = "<?php echo site_url('backend/agama/update')?>";
		$("#msgSKS").text("Data Berhasil Diubah !!");
		$("#msgERR").text("Data Gagal Diubah !!");
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
				reset();
				$("#data").show();
				$('#table').DataTable().ajax.reload();
				$("#alerSKS").show();
				window.location.href = '<?=base_url()?>backend/jadwal/data/'+$idRuangan+"/"+<?=$this->session->userdata('id_thn_ajaran')?>+"/"+<?=$this->session->userdata('id_semester')?>;
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
			$("#alerERR").show();
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
};
</script>

					<h1 class="page-title"> Jadwal Pelajaran
                        <small> <?=$ruanganKelas;?></small>
                    </h1>
					
                    <div class="row" id="data" style="display:none;">
					<div class="col-md-12">
						<div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Senin
										</span>
                                    </div>
                                    <div class="tools"> 
										<button class="btn btn-transparent red btn-outline btn-circle btn-sm active" onclick="edit(<?=$idRuangan;?>,<?=$idThnAjaran?>,'1');">Ubah</button>
									</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalSenin as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					<div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Selasa
										</span>
                                    </div>
                                    <div class="tools"> 
										<button class="btn btn-transparent red btn-outline btn-circle btn-sm active" onclick="edit(<?=$idRuangan;?>,<?=$idThnAjaran?>,'2');">Ubah</button>
									</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalSelasa as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					<div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Rabu
										</span>
                                    </div>
                                    <div class="tools"> 
										<button class="btn btn-transparent red btn-outline btn-circle btn-sm active" onclick="edit(<?=$idRuangan;?>,<?=$idThnAjaran?>,'3');">Ubah</button>
									</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalRabu as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					</div><div class="col-md-12"><div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Kamis
										</span>
                                    </div>
                                    <div class="tools"> 
										<button class="btn btn-transparent red btn-outline btn-circle btn-sm active" onclick="edit('1');">Ubah</button>
									</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalKamis as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					<div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Jum'at
										</span>
                                    </div>
                                    <div class="tools"> 
										<button class="btn btn-transparent red btn-outline btn-circle btn-sm active" onclick="edit('1');">Ubah</button>
									</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalJumat as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					<div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Sabtu
										</span>
                                    </div>
                                    <div class="tools"> 
										<button class="btn btn-transparent red btn-outline btn-circle btn-sm active" onclick="edit('1');">Ubah</button>
									</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-light">
										<tr>
											<td>Jam</td>
											<td>Mata Pelajaran</td>
											<td>Guru</td>
										</tr>
										<?php foreach ($jadwalSabtu as $j) { ?>
										<tr>
											<td><?=$j->jadwal_pelajaran_jam_ke?></td>
											<td><?=$j->mata_pelajaran_nama?></td>
											<td><?=$j->guru_nama?></td>
										</tr>
										<?php } ?>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					</div>
					</div>
					                
					<div class="row" id="inputan" style="display:none;">
                        <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Ubah Jadwal</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form id="form" class="form-horizontal" autocomplete="off">
									    <input type="text" name="idRuangan" hidden /> 
									    <input type="text" name="idThnAjaran" hidden /> 
									    <input type="text" name="idHari" hidden /> 
									    <input type="text" name="idSemester" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Pertama
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_satu" name="mata_pelajaran_satu">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_satu" name="guru_satu">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Kedua
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_dua" name="mata_pelajaran_dua">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_dua" name="guru_dua">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Ketiga
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_tiga" name="mata_pelajaran_tiga">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_tiga" name="guru_tiga">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Keempat
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_empat" name="mata_pelajaran_empat">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_empat" name="guru_empat">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Kelima
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_lima" name="mata_pelajaran_lima">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_lima" name="guru_lima">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Keenam
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_enam" name="mata_pelajaran_enam">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_enam" name="guru_enam">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Ketujuh
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_tujuh" name="mata_pelajaran_tujuh">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_tujuh" name="guru_tujuh">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">												
                                                <label class="control-label col-md-2">Kedelapan
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="mata_pelajaran_delapan" name="mata_pelajaran_delapan">
														<option value="">Pilih Mata Pelajaran</option>
														<?php foreach ($mataPelajaran as $mp) { ?>
															<option value="<?=$mp->mata_pelajaran_id;?>"><?=$mp->mata_pelajaran_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="guru_delapan" name="guru_delapan">
														<option value="">Pilih Guru Pengajar</option>
                                                    </select>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
													<button type="submit" id="btnSave" class="btn btn-primary">Save</button>
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
