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

<script src="<?=base_url();?>asset/pages/js/form-validation-siswa.js" type="text/javascript"></script>

<script>
var save_method;
var table;

$(document).ready(function() {
    //datatables
	reset();
    showLoading();

	$("#siswa_alamat_propinsi_id").change(function(){
		var idPropinsi=$("#siswa_alamat_propinsi_id").val();
		loadKota(idPropinsi, "#siswa_alamat_kota_id");
	});

	$("#data").show();
	table = $('#table').DataTable({ 
		"retrieve": true,
		"destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/siswa/loadTable')?>",
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
	hideLoading();
});

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

function load(){
    showLoading();
	reset();
	$("#data").show();
	$('#table').DataTable().ajax.reload();
	hideLoading();
}

function reset() {
	$("#data").hide();
	$("#inputan").hide();
	$("#alerSKS").hide();
	$("#alerERR").hide();
	$("#alerERRInput").hide();
    $('[name="siswa_nisn"]').val("");
    $('[name="siswa_nama"]').val("");
    $('[name="siswa_panggilan"]').val("");
    $('[name="siswa_jenis_kelamin"]').val("");
    $('[name="siswa_tempat_lahir"]').val("");
    $('[name="siswa_tgl_lahir"]').val("");
    $('[name="siswa_agama_id"]').val("");
    $('[name="siswa_alamat"]').text("");
    $('[name="siswa_alamat_kota_id"]').val("");
    $('[name="siswa_alamat_propinsi_id"]').val("");
    $('[name="siswa_no_telp"]').val("");
};

function showInputan() {
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="siswa_nisn"]').focus();
	hideLoading();
};

function showData() {
	showLoading();
	reset();
	$("#data").show();
    $('[name="siswa_nisn"]').focus();
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
        url : "<?php echo site_url('backend/siswa/prepareEdit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			showInputan();
            $('[name="id"]').val(data.siswa_id);
			$('[name="siswa_nisn"]').val(data.siswa_nisn);
			$('[name="siswa_nama"]').val(data.siswa_nama);
			$('[name="siswa_panggilan"]').val(data.siswa_panggilan);
			$('[name="siswa_jenis_kelamin"]').val(data.siswa_jenis_kelamin);
			$('[name="siswa_tempat_lahir"]').val(data.siswa_tempat_lahir);
			$('[name="siswa_tgl_lahir"]').val(data.siswa_tgl_lahir);
			$('[name="siswa_agama_id"]').val(data.siswa_agama_id);
			$('[name="siswa_alamat"]').text(data.siswa_alamat);
			$('[name="siswa_alamat_propinsi_id"]').val(data.siswa_alamat_propinsi_id);
			loadKota(data.siswa_alamat_propinsi_id, "#siswa_alamat_kota_id");			
			$('[name="siswa_alamat_kota_id"]').val(data.siswa_alamat_kota_id);
			$('[name="siswa_no_telp"]').val(data.siswa_no_telp);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
};

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('backend/siswa/save')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");
    } else {
        url = "<?php echo site_url('backend/siswa/update')?>";
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
				load();
				$("#alerSKS").show();
            }else{
				$("#alerERRInput").show();
				$("#msgERRInput").text(data.msg);
				$('[name="siswa_nisn"]').focus();				
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

$(document).on("click","#hapusData",function(){
	var id=$(this).attr("data-id");
	swal({
		title:"Hapus Data",
		text:"Yakin akan menghapus data ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/siswa/delete');?>"+'/'+id,
			data: id,
			success: function(data){
				load();
				$("#msgSKS").text("Data Berhasil Dihapus !!");
				$("#alerSKS").show();
			} ,
			error: function ()
			{
				$("#msgERR").text("Data Gagal Dihapus !!");
				$("#alerERR").show();
			}
		 });
	});
});

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
								<div class="portlet-title" style="border-bottom: none !important;">
                                    <button type="button" class="btn btn-primary" onclick="add();">Tambah</button>
                                </div>
                                <div class="portlet-body">
                                    <table id="table" class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="all" width="2%">No</th>
                                                <th class="all">NISN</th>
                                                <th class="all">Nama</th>
                                                <th class="min-phone-l">Nama Panggilan</th>
                                                <th class="min-phone-l">Kelas</th>
                                                <th class="min-phone-l">Jenis Kelamin</th>
                                                <th class="min-tablet">Tempat Lahir</th>
                                                <th class="min-tablet">Tanggal Lahir</th>
                                                <th class="none">Agama</th>
                                                <th class="none">Alamat</th>
                                                <th class="none">Kota</th>
                                                <th class="none">Propinsi</th>
                                                <th class="none">No Telp</th>
                                                <th class="all" width="15%">Opsi</th>
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
                
					<div class="row" id="inputan" style="display:none;">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase"><?= $titleInputan; ?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								
									<div id="alerERRInput" class="custom-alerts alert alert-warning fade in">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
										<p id="msgERRInput"></p>
									</div>
                                    <!-- BEGIN FORM-->
                                    <form id="form" class="form-horizontal" autocomplete="off">
									    <input type="text" name="id" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">NISN
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="siswa_nisn" data-required="1" class="form-control" /> 
												</div>
                                                <label class="control-label col-md-2">Nama
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="siswa_nama" data-required="1" class="form-control" /> 
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Nama Panggilan
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="siswa_panggilan" data-required="1" class="form-control" /> 
												</div>
                                                <label class="control-label col-md-2">Jenis Kelamin
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="siswa_jenis_kelamin">
														<option value="">Pilih Jenis Kelamin</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
                                                    </select> 
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Tempat Lahir
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="siswa_tempat_lahir" data-required="1" class="form-control" /> 
												</div>
                                                <label class="control-label col-md-2">Tanggal Lahir
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
														<input type="text" class="form-control" readonly="" name="siswa_tgl_lahir">
														<span class="input-group-btn" style="vertical-align: top !important;">
															<button class="btn default" type="button">
																<i class="fa fa-calendar"></i>
															</button>
														</span>
													</div> 
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Agama
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">											
													<select class="form-control" name="siswa_agama_id">
														<option value="">Pilih Agama</option>
														<?php foreach ($agama as $a) { ?>
															<option value="<?=$a->agama_id;?>"><?=$a->agama_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <label class="control-label col-md-2">Alamat Lengkap
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
													<textarea class="form-control" name="siswa_alamat"></textarea>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Propinsi
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">											
													<select class="form-control" name="siswa_alamat_propinsi_id" id="siswa_alamat_propinsi_id">
														<option value="">Pilih Propinsi</option>
														<?php foreach ($propinsi as $p) { ?>
															<option value="<?=$p->propinsi_id;?>"><?=$p->propinsi_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                                <label class="control-label col-md-2">Kota
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
													<select class="form-control" name="siswa_alamat_kota_id" id="siswa_alamat_kota_id">

                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">No Telp
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="siswa_no_telp" data-required="1" class="form-control" /> 
												</div>
                                                <label class="control-label col-md-2">Kelas
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
													<select class="form-control" name="siswa_kelas_id" id="siswa_alamat_propinsi_id">
														<option value="">Pilih Kelas</option>
														<?php foreach ($kelas as $k) { ?>
															<option value="<?=$k->kelas_id;?>"><?=$k->kelas_nama;?></option>
														<?php } ?>
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
