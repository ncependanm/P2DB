<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
$ind = "";
/* admin */
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

<script src="<?=base_url();?>asset/pages/js/form-validation-nilai.js" type="text/javascript"></script>

<script>
var save_method;
var table;

$(document).ready(function() {
    //datatables
    showLoading();
	loadTable();
	$("#data").show();
	
	hideLoading();
});

function loadTable()
{
		table = $('#table').DataTable({ 
		"retrieve": true,
		"destroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('backend/nilaiSiswa/loadTable')?>/"+<?=$this->session->userdata('id_akun')?>,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
        },
        ],

    });
}

</script>
					<h1 class="page-title"> <?= $title; ?>
                        <small><?=$ind;?></small>
                    </h1>
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
                                <div class="portlet-body">
                                    <table id="table" class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="all" width="2%">No</th>
                                                <th class="all">Semester</th>
                                                <th class="all">Mata Pelajaran</th>
                                                <th class="all">Guru Pengajar</th>
                                                <th class="all">Nilai Tugas</th>
                                                <th class="all">Nilai Kuis</th>
                                                <th class="all">Nilai UTS</th>
                                                <th class="all">Nilai UAS</th>
                                                <th class="all">Nilai Praktek</th>
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
                <?php } ?>
