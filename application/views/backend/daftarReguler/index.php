<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
/* calon siswa */
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

<script>
var save_method;
var table;

$(document).ready(function() {
    //datatables
	reset();
    showLoading();
	$("#data").show();
	table = $('#table').DataTable({ 
		"retrieve": true,
		"destroy": true,
		"dom": 'Bfrtip',
        "buttons": [
            'excel'
        ],
        "paging": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/daftarReguler/loadTable')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
$('input[name=reg_data_nilai_tes_baca_tulis_alquran]').bind('keyup blur', function () {
	var myValue = $('[name="reg_data_nilai_tes_baca_tulis_alquran"]').val();
	if (!/^[0-9]+$/.test(myValue)) {
		myValue = myValue.substring(0,myValue.length-1);
		$(this).val(myValue);
	}
});
	hideLoading();
});

function reset() {
	$("#data").hide();
	$("#inputan").hide();
	$("#dataView").hide();
	$("#alerSKS").hide();
	$("#alerERR").hide();
	$("#inputanNilai").hide();
	$("#importNilai").hide();
};

function showData(){
	showLoading();
	reset();
	$("#data").show();	
	hideLoading();
}

function showImport(){
	showLoading();
	reset();
	$("#importNilai").show();	
	hideLoading();
}

function load(){
    showLoading();
	reset();
	$("#data").show();
	$('#table').DataTable().ajax.reload();
	hideLoading();
}

function add(){
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="inp_reg_akun_nisn"]').focus();
	hideLoading();
}

$(document).on("click","#statusDaftarUlang",function(){
	var id=$(this).attr("data-id");
	var ind=$(this).attr("data-ind");
	swal({
		title:"Ubah Status Daftar Ulang",
		text:"Yakin akan mengganti status ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yakin",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/daftarReguler/updateStatusDaftarUlang');?>"+'/'+id+'/'+ind,
			data: id,
			success: function(data){
				load();
				$("#msgSKS").text("Status Registrasi Berhasil Diubah !!");
				$("#alerSKS").show();
			} ,
			error: function ()
			{
				$("#msgERR").text("Status Registrasi Gagal Diubah !!");
				$("#alerERR").show();
			}
		 });
	});
});


$(document).on("click","#statusValidasi",function(){
	var id=$(this).attr("data-id");
	var ind=$(this).attr("data-ind");
	swal({
		title:"Ubah Status Daftar Ulang",
		text:"Yakin akan mengganti status ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yakin",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/daftarReguler/updateStatusValidasi');?>"+'/'+id+'/'+ind,
			data: id,
			success: function(data){
				load();
				$("#msgSKS").text("Status Validasi Berhasil Diubah !!");
				$("#alerSKS").show();
			} ,
			error: function ()
			{
				$("#msgERR").text("Status Validasi Gagal Diubah !!");
				$("#alerERR").show();
			}
		 });
	});
});

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url = "<?php echo site_url('backend/daftarReguler/save')?>";
	$("#msgSKS").text("Data Berhasil Ditambah !!");
	$("#msgERR").text("Data Gagal Ditambah !!");

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
				load();
				$("#alerSKS").show();
            }else{
				$("#alerERRInput").show();
				$("#msgERRInput").text(data.msg);
				$('[name="inp_reg_akun_nisn"]').focus();
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

function inputNilai(idPendaftar){
	showLoading();
	reset();
	$("#inputanNilai").show();
	$('[name="reg_data_nilai_wawancara"]').focus();
	$('[name="id"]').val(idPendaftar);
	$.ajax({
        url : "<?php echo site_url('backend/daftarReguler/getNilaiTes')?>/" + idPendaftar,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			if(data.status){
				$('[name="reg_data_nilai_wawancara"]').val(data.dataNilai.reg_data_nilai_wawancara);
				$('[name="reg_data_nilai_skhu"]').val(data.dataNilai.reg_data_nilai_prestasi);
				$('[name="reg_data_nilai_tertulis"]').val(data.dataNilai.reg_data_nilai_raport);
			} else {
				$('[name="reg_data_nilai_wawancara"]').val('0');
				$('[name="reg_data_nilai_skhu"]').val('0');
				$('[name="reg_data_nilai_tertulis"]').val('0');
			}
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
	hideLoading();
}

function resetSimpanNilai(){
	$('#nullWawancara').hide();
	$('#nullSkhu').hide();
	$('#nullTertulis').hide();
	$('#makNilaiWawancara').hide();
	$('#makNilaiSkhu').hide();
	$('#makNilaiTertulis').hide();
	$('#formGroupWawancara').removeClass("has-error");
	$('#formGroupSkhu').removeClass("has-error");
	$('#formGroupTertulis').removeClass("has-error");
}

function simpanNilai(){
	var error = false;
	resetSimpanNilai();
	if($('[name="reg_data_nilai_wawancara"]').val() == ''){
		$('#formGroupWawancara').addClass("has-error");
		$('#nullWawancara').show();
		error = true;
	} else{
		if($('[name="reg_data_nilai_wawancara"]').val() > 100){
			$('#formGroupWawancara').addClass("has-error");
			$('#makNilaiWawancara').show();
			error = true;
		} 
	}
	if($('[name="reg_data_nilai_skhu"]').val() == ''){
		$('#formGroupSkhu').addClass("has-error");
		$('#nullSkhu').show();
		error = true;
	} else {
		if($('[name="reg_data_nilai_skhu"]').val() > 100){
			$('#formGroupSkhu').addClass("has-error");
			$('#makNilaiSkhu').show();
			error = true;
		}
	}
	if($('[name="reg_data_nilai_tertulis"]').val() == ''){
		$('#formGroupTertulis').addClass("has-error");
		$('#nullTertulis').show();
		error = true;
	} else {
		if($('[name="reg_data_nilai_tertulis"]').val() > 100){
			$('#formGroupTertulis').addClass("has-error");
			$('#makNilaiTertulis').show();
			error = true;
		}
	}
	
	
	if(error == false){
		var url = "<?php echo site_url('backend/daftarReguler/saveNilai')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");

		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#formNilaiInput').serialize(),
			dataType: "JSON",
			success: function(data)
			{

				if(data.status) //if success close modal and reload ajax table
				{
					load();
					$("#alerSKS").show();
				}else{
					$("#alerERRInput").show();
					$("#msgERRInput").text(data.msg);
					$('[name="inp_reg_akun_nisn"]').focus();
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
	}
}
</script>

<div class="row" id="data" style="display:none;">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase"><?= $title; ?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
								<div id="alerSKS" class="custom-alerts alert alert-success fade in">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
										<p id="msgSKS"></p>
									</div>
									<div id="alerERR" class="custom-alerts alert alert-warning fade in">
										<button type="button" class="close" data-dismiss="alert" >x</button>
										<p id="msgERR"></p>
									</div>
                                <div class="portlet-body">
                                    <table id="table" class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="all" width="2%">No</th>
                                                <th class="all">No Registrasi</th>
                                                <th class="all">NISN</th>
                                                <th class="all">Nama</th>
                                                <th class="all">Ruang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										</tbody>
									</table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                


              <div class="row" id="inputan" style="display: none;">
              <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase"><?= $titleInputan; ?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								
                                    <!-- BEGIN FORM-->
                                    <form id="form" class="form-horizontal" autocomplete="off">
									    <input type="text" name="id" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! 
											</div>
										<div id="alerERRInput" class="custom-alerts alert alert-warning fade in"  style="display: none">
											<button type="button" class="close" data-dismiss="alert" >x</button>
											<p id="msgERRInput"></p>
										</div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">NISN
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="inp_reg_akun_nisn" data-required="1" class="form-control" /> 
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Nama
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="inp_reg_akun_nama" data-required="1" class="form-control" /> 
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Jalur Pendaftaran
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="inp_reg_akun_jalur_daftar">
														<option value="">Pilih Jalur Pendaftaran</option>
															<option value="P">Jalur Prestasi</option>
															<option value="R">Jalur Reguler</option>
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
			<div class="row" id="inputanNilai" style="display: none;">
              <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Form Input Nilai Tes Wawancara</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								
                                    <!-- BEGIN FORM-->
                                    <form id="formNilaiInput" class="form-horizontal" autocomplete="off">
									    <input type="text" name="id" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! 
											</div>
										<div id="alerERRInput" class="custom-alerts alert alert-warning fade in"  style="display: none">
											<button type="button" class="close" data-dismiss="alert" >x</button>
											<p id="msgERRInput"></p>
										</div>
                                            <div class="form-group" id="formGroupWawancara">
                                                <label class="control-label col-md-5">Nilai Wawancara
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" maxlength="2" name="reg_data_nilai_wawancara" data-required="1" class="form-control" /> 
													<span class="help-block help-block-error" id="makNilaiWawancara" style="display: none">Nilai Tidak Boleh Lebih dari 100</span>
													<span class="help-block help-block-error" id="nullWawancara" style="display: none">Nilai Wawancara Tidak Boleh Kosong</span>
												</div>
                                            </div>
                                            <div class="form-group" id="formGroupSkhu">
                                                <label class="control-label col-md-5">Nilai SKHU
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" maxlength="2" name="reg_data_nilai_skhu" data-required="1" class="form-control" /> 
													<span class="help-block help-block-error" id="makNilaiSkhu" style="display: none">Nilai Tidak Boleh Lebih dari 100</span>
													<span class="help-block help-block-error" id="nullSkhu" style="display: none">Nilai SKHU Boleh Kosong</span>
												</div>
                                            </div>
                                            <div class="form-group" id="formGroupTertulis">
                                                <label class="control-label col-md-5">Nilai Tertulis
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
													<input type="text" maxlength="2" name="reg_data_nilai_tertulis" data-required="1" class="form-control" /> 
													<span class="help-block help-block-error" id="makNilaiTertulis" style="display: none">Nilai Tidak Boleh Lebih dari 100</span>
													<span class="help-block help-block-error" id="nullTertulis" style="display: none">Nilai Tes Tertulis Tidak Boleh Kosong</span>
												</div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
													<button type="button" onclick="simpanNilai();" class="btn btn-primary">Save</button>
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
      
	  <div class="row" id="importNilai" style="display: none;">
              <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Form Input Nilai Tes Wawancara</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								
                                    <!-- BEGIN FORM-->
                                    <form action="<?=base_url();?>backend/daftarReguler/upload" method="post" class="form-horizontal" enctype="multipart/form-data">		
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cara Import File
                                                </label>
                                                <div class="col-md-8">
												Untuk melakukan import data, system sudah menyediakan template file yang harus di import nantinya, dengan format yang sudah disesuaikan dengan system.
												<a href="<?=base_url()?>templateUpload/template-nilai-reg.xls">Download Template</a></br>
												Jangan merubah format template, karena nanti data tidak tersimpan.
												</div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-4">Cari File
                                                </label>
                                                <div class="col-md-8">
													<input type="file" class="form-control" name="file"/>
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
