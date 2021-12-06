<?php
$msgAlert = "";
$msgAlertErr = "";
$ada = false;
/* siswa */
if($this->session->userdata('level')=='4')
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
});

function reset(){
	$("#data").hide();
	$("#inputan").hide();
	$("#alerERR").hide();
	$("#alerSKS").hide();
}
</script>

					<h1 class="page-title"> Jadwal Pelajaran
                        <small> </small>
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
					                
<?php } ?>
