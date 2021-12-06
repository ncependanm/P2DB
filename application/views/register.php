<?php
if($this->session->userdata('id_users')!='')
{
    redirect('backend/beranda');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Register</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?=base_url();?>asset/global/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>asset/global/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>asset/global/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>asset/global/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>asset/css/loading.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
		<link href="<?=base_url();?>asset/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url();?>asset/css/plugins.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url();?>asset/css/daftar.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
        <script src="<?=base_url();?>asset/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/js/var.js" type="text/javascript"></script>
		<script src="<?=base_url();?>asset/pages/js/form-validation-daftar.js" type="text/javascript"></script>

    <body class="">
	
	<script>
	function save()
	{
		showLoading();
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable 
		var url;

			url = "<?php echo site_url('daftar/registrasi')?>";
			$("#msgSKS").text("Registrasi Berhasil Dilakukan !!");
			$("#msgERR").text("Registrasi Gagal Dilakukan !!");

		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data)
			{
				if(data.status){
					$("#alerSKS").show();
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 
					window.location.href = '<?=base_url()?>backend/beranda';	
				}else{
					$("#alerERR").show();
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 	
					$("#msgERR").text(data.msg);
					$('[name="reg_apk_key_satu"]').val("");
					$('[name="reg_apk_key_dua"]').val("");
					$('[name="reg_apk_key_tiga"]').val("");
					$('[name="reg_apk_key_empat"]').val("");
					$('[name="reg_apk_key_satu"]').focus();
				}
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
	
		<div class="preload-spinner" id="loading" style="display: none">
		<div class="sk-folding-cube">
			<div class="sk-cube1 sk-cube"></div>
			<div class="sk-cube2 sk-cube"></div>
			<div class="sk-cube4 sk-cube"></div>
			<div class="sk-cube3 sk-cube"></div>
		</div>
		</div>
        <div class="container">
            <div class="row" style="margin-bottom:5px !important;">
                <div class="col-md-6 coming-soon-header">
                    <a class="brand" href="index.html">
                        <img src="<?=base_url();?>asset/img/logo-big.png" alt="logo" />
					</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 coming-soon-content">
                    <h1>Masa Percobaan Aplikasi Sudah Exp!</h1>
                    <p> Jika aplikasi akan dijalankan lagi, maka lakukan registrasi. </p>
                    <br>
					
            <div class="row">
                <div class="coming-soon-footer"> 2016 &copy; Encep Endan M</div>
            </div>
                </div>
                <div class="col-md-6 coming-soon-content">
                   
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase"><?=$judulForm;?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-title">
								
                                    <!-- BEGIN FORM-->
                                    <form id="form" class="form-horizontal" autocomplete="off">
									    <input type="text" name="id" hidden /> 
                                        <div class="form-body">
											<div id="alerSKS" class="custom-alerts alert alert-success fade in" style="display:none">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
												<p id="msgSKS"></p>
											</div>
											<div id="alerERR" class="custom-alerts alert alert-warning fade in" style="display:none">
												<button type="button" class="close" data-dismiss="alert" >x</button>
												<p id="msgERR"></p>
											</div>
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> Inputan masih belum sesuai. Mohon periksa kembali ! </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Sukses ! </div>
                                            <div class="form-group">
                                                <label class="col-md-12">KEY
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="text" maxlength="4" name="reg_apk_key_satu" data-required="1" class="form-control" /> 
												</div>
												<div class="col-md-3">
                                                    <input type="text" maxlength="4" name="reg_apk_key_dua" data-required="1" class="form-control" /> 
												</div>
												<div class="col-md-3">
                                                    <input type="text" maxlength="4" name="reg_apk_key_tiga" data-required="1" class="form-control" /> 
												</div>
												<div class="col-md-3">
                                                    <input type="text" maxlength="4" name="reg_apk_key_empat" data-required="1" class="form-control" /> 
												</div>
                                            </div>
                                        </div>
                                        <div class="form-actions" style="margin-bottom:15px">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
													<button type="submit" id="btnSave" class="btn btn-primary">Registrasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
								</div>
							</div>
                </div>
            </div>
            <!--/end row-->
        </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
		<script>
		$(document).ready(function() {	
			$('[name="reg_apk_key_satu"]').focus();
		});
		</script>
        <script src="<?=base_url();?>asset/global/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?=base_url();?>asset/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/js/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/global/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url();?>asset/global/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/global/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/global/countdown/jquery.countdown.js" type="text/javascript"></script>
        <script src="<?=base_url();?>asset/global/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url();?>asset/js/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url();?>asset/pages/js/daftar.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>