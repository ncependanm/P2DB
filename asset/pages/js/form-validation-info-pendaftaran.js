var FormValidation=function(){var a=function(){var a=$("#form"),b=$(".alert-danger",a),c=$(".alert-success",a);a.validate({errorElement:"span",errorClass:"help-block help-block-error",focusInvalid:!1,ignore:"",rules:{inp_reg_akun_nisn:{minlength:11,required:!0},inp_reg_akun_nama:{minlength:2,required:!0},inp_reg_akun_jalur_daftar:{required:!0}},messages:{inp_reg_akun_nisn:{required:"NISN Harus Diisi"},inp_reg_akun_nama:{required:"Nama Harus Diisi"},inp_reg_akun_jalur_daftar:{required:"Jalur Pendaftaran Harus Dipilih"}},invalidHandler:function(a,d){c.hide(),b.show(),App.scrollTo(b,-200)},highlight:function(a){$(a).closest(".form-group").addClass("has-error")},unhighlight:function(a){$(a).closest(".form-group").removeClass("has-error")},success:function(a){a.closest(".form-group").removeClass("has-error")},submitHandler:function(){c.show(),b.hide(),save(),c.hide()}}),$(".date-picker").datepicker({rtl:App.isRTL(),autoclose:!0}),$(".date-picker .form-control").change(function(){a.validate().element($(this))})};return{init:function(){a()}}}();jQuery(document).ready(function(){FormValidation.init()});