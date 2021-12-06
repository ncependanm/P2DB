<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
$ind = "";
/* admin */
if($this->session->userdata('level')=='2')
{
	$ada = true;
	$ind = "Guru";
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

<script src="<?=base_url();?>asset/pages/js/form-validation-nilai.js" type="text/javascript"></script>

<script>
var save_method;
var table;

$(document).ready(function() {
    //datatables
	reset();
    showLoading();
	$("#data").show();
	var idKelas = "";

	$("#nilai_ruangan_id").change(function(){
		idKelas=$('[name="nilai_ruangan_id"]').val();
		$('#tmpKelas').val(idKelas);
		loadMataPelajaran(idKelas,"#nilai_mata_pelajaran_id");
	});
	$("#nilai_mata_pelajaran_id").change(function(){
		idMataPelajaran=$('[name="nilai_mata_pelajaran_id"]').val();
		$('#tmpMataPelajaran').val(idMataPelajaran);
	});	
	
	hideLoading();
});

function loadTable(id, idMataPelajaran)
{
		table = $('#table').DataTable({ 
		"retrieve": true,
		"destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/nilai/loadTable')?>/"+id+"/"+<?=$this->session->userdata('id_thn_ajaran')?>+"/"+idMataPelajaran+"/"+<?=$this->session->userdata('id_akun')?>+"/L",
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
	table.ajax.url("<?php echo site_url('backend/nilai/loadTable')?>/"+id+"/"+<?=$this->session->userdata('id_thn_ajaran')?>+"/"+idMataPelajaran+"/"+<?=$this->session->userdata('id_akun')?>+"/B").load();
}

function loadMataPelajaran(idKelas, idIsi)
{
    $.ajax({
	url:"<?php echo base_url();?>backend/nilai/tampilkanMataPelajaran",
	data:"nilai_ruangan_id=" + idKelas,
	success: function(html)
	{
        $(idIsi).html(html);            
	}
	});
}

function reset() {
	$("#data").hide();
	$("#inputan").hide();
	$("#alerSKS").hide();
	$("#alerERR").hide();
    $('[name="nilai_tugas"]').val("");
    $('[name="nilai_kuis"]').val("");
    $('[name="nilai_uts"]').val("");
    $('[name="nilai_uas"]').val("");
    $('[name="nilai_praktek"]').val("");
};

function showInputan() {
	showLoading();
	reset();
	$("#inputan").show();
    $('[name="nilai_tugas"]').focus();
	hideLoading();
};

function showData() {
	showLoading();
	reset();
	$("#data").show();
	hideLoading();
};

function tampilTable(){
	showLoading();
	idKelas	= $('#tmpKelas').val();
	idMataPelajaran = $('#tmpMataPelajaran').val();
	ind = "baru";
	loadTable(idKelas, idMataPelajaran);	
	hideLoading();
};

function edit(id, idMatPel, idGuru)
{
	showLoading();
    save_method = 'update';
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('backend/nilai/prepareEdit')?>/" + id+"/"+idMatPel+"/"+ idGuru+"/"+<?=$this->session->userdata('id_semester')?>,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			showInputan();
            $('[name="id"]').val(id);
            $('[name="idMP"]').val($('#tmpMataPelajaran').val());
            $('[name="idGR"]').val(<?=$this->session->userdata('id_akun')?>);
            $('[name="idSMT"]').val(<?=$this->session->userdata('id_semester')?>);
            $('[name="nilai_tugas"]').val(data.nilai_tugas);
            $('[name="nilai_kuis"]').val(data.nilai_kuis);
            $('[name="nilai_uts"]').val(data.nilai_uts);
            $('[name="nilai_uas"]').val(data.nilai_uas);
            $('[name="nilai_praktek"]').val(data.nilai_praktek);

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
    var url;

        url = "<?php echo site_url('backend/nilai/save')?>";
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
				reset();
				$("#data").show();
				$('#table').DataTable().ajax.reload();
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
	hideLoading();
};
</script>
					<h1 class="page-title"> <?= $title; ?>
                        <small><?=$ind;?></small>
                    </h1>
                    <div class="row" id="data" style="display:none;">
                        <div class="col-md-4">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Filter</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <form id="form" class="form-horizontal" autocomplete="off">
									    <input type="text" name="id" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Kelas
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="nilai_ruangan_id" name="nilai_ruangan_id">
														<option value="">Pilih Kelas</option>
														<?php foreach ($kelas as $kls) { ?>
															<option value="<?=$kls->ruangan_id;?>"><?=$kls->kelas_nama;?> <?=$kls->jurusan_nama;?> <?=$kls->ruangan_nama;?></option>
														<?php } ?>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Mata Pelajaran
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="nilai_mata_pelajaran_id" name="nilai_mata_pelajaran_id">
														<option value="">Pilih Mata Pelajaran</option>
                                                    </select>
												</div>
                                            </div>
											<input id="tmpKelas" hidden />
											<input id="tmpMataPelajaran" hidden />
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
													<button type="button" id="btnSave" onclick="tampilTable()" class="btn btn-primary">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        <div class="col-md-8">
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
                                                <th class="all">NISN</th>
                                                <th class="all">Nama Siswa</th>
                                                <th class="none">Nilai Tugas</th>
                                                <th class="none">Nilai Kuis</th>
                                                <th class="none">Nilai UTS</th>
                                                <th class="none">Nilai UAS</th>
                                                <th class="none">Nilai Praktek</th>
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
									    <input type="text" name="idMP" hidden /> 
									    <input type="text" name="idGR" hidden /> 
									    <input type="text" name="idSMT" hidden /> 
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nilai Tugas
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="nilai_tugas" data-required="1" class="form-control" /> 
												</div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Nilai Kuis
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="nilai_kuis" data-required="1" class="form-control" /> 
												</div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Nilai UTS
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="nilai_uts" data-required="1" class="form-control" /> 
												</div>
                                            </div>											
											<div class="form-group">
                                                <label class="control-label col-md-3">Nilai UAS
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="nilai_uas" data-required="1" class="form-control" /> 
												</div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Nilai Praktek
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="nilai_praktek" data-required="1" class="form-control" /> 
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
