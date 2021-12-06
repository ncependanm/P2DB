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

<script src="<?=base_url();?>asset/pages/js/form-validation-kelas-siswa-tmp.js" type="text/javascript"></script>

<script>
var save_method;
var table;

$(document).ready(function() {
    //datatables
	reset();
    showLoading();
	$("#data").show();
	$('#btnTmbSiswa').html('<a href="<?=base_url();?>backend/kelas" class="btn btn-default">Kembali</a> <button type="button" class="btn btn-primary" onclick="addSiswa(<?=$idRuangan?>,<?=$idThnAjaran?>);">Tambah Siswa</button> <a href="<?=base_url();?>backend/jadwal/data/<?=$idRuangan?>/<?=$idThnAjaran?>/<?=$this->session->userdata('id_semester')?>" class="btn btn-primary">Lihat Jadwal</a>');
	$('#btnSubmitSiswa').html('<button type="submit" id="btnSave" class="btn btn-primary">Save</button> <button type="button" class="btn default" onclick="showDataSiswa(<?=$idRuangan?>,<?=$idThnAjaran?>);">Cancel</button>')
    showLoading();
	table = $('#tableSiswa').DataTable({ 
		"retrieve": true,
		"destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/kelasSiswaTmp/loadTableSiswa').'/'.$idRuangan.'/'.$idThnAjaran?>",
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

function loadDataSiswa(){
	$("#data").show();
	$('#btnTmbSiswa').html('<a href="<?=base_url();?>backend/kelas" class="btn btn-default">Kembali</a> <button type="button" class="btn btn-primary" onclick="addSiswa(<?=$idRuangan?>,<?=$idThnAjaran?>);">Tambah Siswa</button>  <a href="<?=base_url();?>backend/jadwal/data/<?=$idRuangan?>/<?=$idThnAjaran?>" class="btn btn-primary">Lihat Jadwal</a>');
	$('#btnSubmitSiswa').html('<button type="submit" id="btnSave" class="btn btn-primary">Save</button><button type="button" class="btn default" onclick="showDataSiswa(<?=$idRuangan?>,<?=$idThnAjaran?>);">Cancel</button>')
    showLoading();
	table = $('#tableSiswa').DataTable({ 
		"retrieve": true,
		"destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/kelasSiswaTmp/loadTableSiswa').'/'.$idRuangan.'/'.$idThnAjaran?>",
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
}

function reset() {
	$("#data").hide();
	$("#inputan").hide();
	$("#alerSKS").hide();
	$("#alerERR").hide();
    $('[name="kelas_siswa_tmp_siswa_id"]').val("");
};

function add()
{
	showLoading();
	showInputan();
    save_method = 'add';
	hideLoading();
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
			url:"<?php echo site_url('backend/kelasSiswaTmp/delete');?>"+'/'+id,
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

function load(){
    showLoading();
	reset();
	$("#data").show();
	$('#tableSiswa').DataTable().ajax.reload();
	hideLoading();
}

function showDataSiswa(idRuangan, idThnAjaran) {
	showLoading();
	reset();
	loadDataSiswa();
	$("#dataSiswa").show();
    $('[name="ruangan_kelas_id"]').focus();
	hideLoading();
};

function showInputanSiswa(idRuangan, idThnAjaran) {
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="idRuanganTmp"]').val(idRuangan);
    $('[name="idThnAjaranTmp"]').val(idThnAjaran);
    $('[name="kelas_siswa_tmp_siswa_id"]').focus();
	hideLoading();
};

function addSiswa(idRuangan, idThnAjaran)
{
	showLoading();
	showInputanSiswa(idRuangan, idThnAjaran);
	loadSiswaCmb();
    save_method = 'add';
	hideLoading();
};

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('backend/kelasSiswaTmp/saveSiswa')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");
    } else {
        url = "<?php echo site_url('backend/kelas/updateSiswa')?>";
		$("#msgSKS").text("Data Berhasil Diubah !!");
		$("#msgERR").text("Data Gagal Diubah !!");
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formSiswa').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
				$("#alerSKS").show();
				load();
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

function loadSiswaCmb(){
    $.ajax({
	url:"<?php echo base_url();?>backend/kelasSiswaTmp/tampilkanSiswa/<?=$idRuangan?>",
	success: function(html)
	{
        $("#kelas_siswa_tmp_siswa_id").html(html);
	}
	});
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
								<div class="portlet-title" style="border-bottom: none !important;" id="btnTmbSiswa">                                    
                                </div>
                                <div class="portlet-body">
                                    <table id="tableSiswa" class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="all" width="2%">No</th>
                                                <th class="all">Tahun Ajaran</th>
                                                <th class="all">Kelas</th>
                                                <th class="all">Nama Siswa</th>
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
                                    <form id="formSiswa" class="form-horizontal" autocomplete="off">
									    <input type="text" name="idRuanganTmp" hidden /> 
									    <input type="text" name="idThnAjaranTmp" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Kelas
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" id="kelas_siswa_tmp_siswa_id" name="kelas_siswa_tmp_siswa_id">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9" id="btnSubmitSiswa">

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
