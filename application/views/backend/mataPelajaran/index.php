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

<script src="<?=base_url();?>asset/pages/js/form-validation-mata-pelajaran.js" type="text/javascript"></script>

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
            "url": "<?php echo site_url('backend/mataPelajaran/loadTable')?>",
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
    $('[name="mata_pelajaran_nama"]').val("");
};

function showInputan() {
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="mata_pelajaran_nama"]').focus();
	hideLoading();
};

function showData() {
	showLoading();
	reset();
	$("#data").show();
    $('[name="mata_pelajaran_nama"]').focus();
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
        url : "<?php echo site_url('backend/mataPelajaran/prepareEdit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			showInputan();
            $('[name="id"]').val(data.mata_pelajaran_id);
            $('[name="mata_pelajaran_nama"]').val(data.mata_pelajaran_nama);

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
        url = "<?php echo site_url('backend/mataPelajaran/save')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");
    } else {
        url = "<?php echo site_url('backend/mataPelajaran/update')?>";
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
		title:"Hapus Data",
		text:"Yakin akan menghapus data ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('backend/mataPelajaran/delete');?>"+'/'+id,
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
                                                <th class="all">Mata Pelajaran</th>
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
                                                <label class="control-label col-md-3">Mata Pelajaran
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mata_pelajaran_nama" data-required="1" class="form-control" /> 
												</div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
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
