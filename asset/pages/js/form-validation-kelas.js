var FormValidation=function(){var a=function(){var a=$("#form"),b=$(".alert-danger",a),c=$(".alert-success",a);a.validate({errorElement:"span",errorClass:"help-block help-block-error",focusInvalid:!1,ignore:"",rules:{kelas_nama:{minlength:1,required:!0}},messages:{kelas_nama:{required:"Nama Kelas Harus Diisi"}},invalidHandler:function(a,d){c.hide(),b.show(),App.scrollTo(b,-200)},highlight:function(a){$(a).closest(".form-group").addClass("has-error")},unhighlight:function(a){$(a).closest(".form-group").removeClass("has-error")},success:function(a){a.closest(".form-group").removeClass("has-error")},submitHandler:function(){c.show(),b.hide(),save(),c.hide()}}),$(".date-picker").datepicker({rtl:App.isRTL(),autoclose:!0}),$(".date-picker .form-control").change(function(){a.validate().element($(this))})};return{init:function(){a()}}}();jQuery(document).ready(function(){FormValidation.init()});