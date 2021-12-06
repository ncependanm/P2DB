<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
/* admin */
if($this->session->userdata('level')=='1')
{
	$ada = true;
}
/* guru */
if(!$ada){
	if($this->session->userdata('level')=='2')
	{
		$ada = true;
	}	
}
/* wali kelas */
if($ada){
	if($this->session->userdata('level')=='3')
	{
		$ada = true;
	}
}
/* siswa */
if($ada){
	if($this->session->userdata('level')=='4')
	{
		$ada = true;
	}
}
/* calon siswa */
if($ada){
	if($this->session->userdata('level')=='5')
	{
		$ada = true;
	}
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

<script src="<?=base_url();?>asset/pages/js/form-validation-tahun-ajaran.js" type="text/javascript"></script>

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
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/tahunAjaran/loadTable')?>",
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
    $('[name="thn_ajaran_nama"]').val("");
    $('[name="thn_ajaran_status"]').val("");
    $('[name="thn_ajaran_reg_awal"]').val("");
    $('[name="thn_ajaran_reg_akhir"]').val("");
    $('[name="thn_ajaran_reg_status"]').val("");			
    $('[name="thn_ajaran_verifikasi_tes_awal"]').val("");
    $('[name="thn_ajaran_verifikasi_tes_akhir"]').val("");
    $('[name="thn_ajaran_daftar_ulang_awal"]').val("");
    $('[name="thn_ajaran_daftar_ulang_akhir"]').val("");
    $('[name="thn_ajaran_kelulusan"]').val("");

    $('[name="thn_ajaran_reg_awal_reguler"]').val("");
    $('[name="thn_ajaran_reg_akhir_reguler"]').val("");
    $('[name="thn_ajaran_reg_status_reguler"]').val("");
    $('[name="thn_ajaran_verifikasi_tes_awal_reguler"]').val("");
    $('[name="thn_ajaran_verifikasi_tes_akhir_reguler"]').val("");
    $('[name="thn_ajaran_daftar_ulang_awal_reguler"]').val("");
    $('[name="thn_ajaran_daftar_ulang_akhir_reguler"]').val("");
    $('[name="thn_ajaran_kelulusan_reguler"]').val("");
};

function showInputan() {
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="thn_ajaran_nama"]').focus();
	hideLoading();
};

function showData() {
	showLoading();
	reset();
	$("#data").show();
    $('[name="thn_ajaran_nama"]').focus();
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
        url : "<?php echo site_url('backend/tahunAjaran/prepareEdit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			showInputan();
            $('[name="id"]').val(data.thn_ajaran_id);
            $('[name="thn_ajaran_nama"]').val(data.thn_ajaran_nama);
            $('[name="thn_ajaran_status"]').val(data.thn_ajaran_status);
            $('[name="thn_ajaran_reg_awal"]').val(data.thn_ajaran_reg_awal);
            $('[name="thn_ajaran_reg_akhir"]').val(data.thn_ajaran_reg_akhir);
            $('[name="thn_ajaran_verifikasi_tes_awal"]').val(data.thn_ajaran_verifikasi_tes_awal);
            $('[name="thn_ajaran_verifikasi_tes_akhir"]').val(data.thn_ajaran_verifikasi_tes_akhir);
            $('[name="thn_ajaran_daftar_ulang_awal"]').val(data.thn_ajaran_daftar_ulang_awal);
            $('[name="thn_ajaran_daftar_ulang_akhir"]').val(data.thn_ajaran_daftar_ulang_akhir);
            $('[name="thn_ajaran_kelulusan"]').val(data.thn_ajaran_kelulusan);

            $('[name="thn_ajaran_reg_awal_reguler"]').val(data.thn_ajaran_reg_awal_reguler);
            $('[name="thn_ajaran_reg_akhir_reguler"]').val(data.thn_ajaran_reg_akhir_reguler);
            $('[name="thn_ajaran_verifikasi_tes_awal_reguler"]').val(data.thn_ajaran_verifikasi_tes_awal_reguler);
            $('[name="thn_ajaran_verifikasi_tes_akhir_reguler"]').val(data.thn_ajaran_verifikasi_tes_akhir_reguler);
            $('[name="thn_ajaran_daftar_ulang_awal_reguler"]').val(data.thn_ajaran_daftar_ulang_awal_reguler);
            $('[name="thn_ajaran_daftar_ulang_akhir_reguler"]').val(data.thn_ajaran_daftar_ulang_akhir_reguler);
            $('[name="thn_ajaran_kelulusan_reguler"]').val(data.thn_ajaran_kelulusan_reguler);
            
            $('[name="thn_ajaran_reg_status"]').val(data.thn_ajaran_reg_status);

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
        url = "<?php echo site_url('backend/tahunAjaran/save')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");
    } else {
        url = "<?php echo site_url('backend/tahunAjaran/update')?>";
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
		title:"Hapus Member",
		text:"Yakin akan menghapus member ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/tahunAjaran/delete');?>"+'/'+id,
			data: id,
			success: function(data){
				load();
				$("#msgSKS").text("Data Gagal Dihapus !!");
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

$(document).on("click","#statusRegistrasi",function(){
	var id=$(this).attr("data-id");
	var ind=$(this).attr("data-ind");
	swal({
		title:"Ubah Status Registrasi",
		text:"Yakin akan mengganti status ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yakin",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/tahunAjaran/updateStatusRegistrasi');?>"+'/'+id+'/'+ind,
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

$(document).on("click","#statusThnAngkatan",function(){
	var id=$(this).attr("data-id");
	var ind=$(this).attr("data-ind");
	swal({
		title:"Ubah Status Tahun Angkatan",
		text:"Yakin akan mengganti status ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yakin",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/tahunAjaran/updateStatusTahunAngkatan');?>"+'/'+id+'/'+ind,
			data: id,
			success: function(data){
				load();
				$("#msgSKS").text("Status Tahun Angkatan Berhasil Diubah !!");
				$("#alerSKS").show();
			} ,
			error: function ()
			{
				$("#msgERR").text("Status Tahun Angkatan Gagal Diubah !!");
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
                                    <table id="table" class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all" width="2%">No</th>
                                                <th class="all">Tahun Ajaran</th>
                                                <th class="all">Status</th>
                                                <th class="all">Status Registrasi</th>
                                                <th class="none">Awal Registrasi (Prestasi)</th>
                                                <th class="none">Akhir Registrasi (Prestasi)</th>
                                                <th class="none">Awal Verifikasi dan Tes (Prestasi)</th>
                                                <th class="none">Akhir Verifikasi dan Tes (Prestasi)</th>
                                                <th class="none">Awal Daftar Ulang (Prestasi)</th>
                                                <th class="none">Akhir Daftar Ulang(Prestasi)</th>
                                                <th class="none">Waktu Kelulusan (Prestasi)</th>
                                                <th class="none">Awal Registrasi (Reguler)</th>
                                                <th class="none">Akhir Registrasi (Reguler)</th>
                                                <th class="none">Awal Verifikasi dan Tes (Reguler)</th>
                                                <th class="none">Akhir Verifikasi dan Tes (Reguler)</th>
                                                <th class="none">Awal Daftar Ulang (Reguler)</th>
                                                <th class="none">Akhir Daftar Ulang (Reguler)</th>
                                                <th class="none">Waktu Kelulusan (Reguler)</th>
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
                                    <!-- BEGIN FORM-->
                                    <form id="form" class="form-horizontal" autocomplete="off">
									    <input type="text" name="id" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Tahun Ajaran
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="thn_ajaran_nama" data-required="1" class="form-control" /> 
                                                    <span class="help-block"> contoh : 2016-2017 </span>
												</div>
                                                <label class="control-label col-md-2">Status Tahun Ajaran
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="thn_ajaran_status">
                                                        <option value="">Pilih...</option>
                                                        <option value="A">Aktif</option>
                                                        <option value="L">Lulus</option>
                                                    </select>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Status Registrasi
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="thn_ajaran_reg_status">
                                                        <option value="">Pilih...</option>
                                                        <option value="O">Buka</option>
                                                        <option value="C">Tutup</option>
                                                    </select>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Awal Registrasi (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_reg_awal">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Awal Registrasi (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_reg_awal_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Akhir Registrasi (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_reg_akhir">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Akhir Registrasi (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_reg_akhir_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Waktu Verifikasi dan Tes Awal (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_verifikasi_tes_awal">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Waktu Verifikasi dan Tes Awal (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_verifikasi_tes_awal_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Waktu Verifikasi dan Tes Akhir (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_verifikasi_tes_akhir">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Waktu Verifikasi dan Tes Akhir (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_verifikasi_tes_akhir_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Waktu Daftar Ulang Awal (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_daftar_ulang_awal">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Waktu Daftar Ulang Awal (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_daftar_ulang_awal_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Waktu Daftar Ulang Akhir (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_daftar_ulang_akhir">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Waktu Daftar Ulang Akhir (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_daftar_ulang_akhir_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-2">Waktu Kelulusan (Prestasi)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_kelulusan">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class="control-label col-md-2">Waktu Kelulusan (Reguler)</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly="" name="thn_ajaran_kelulusan_reguler">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
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
