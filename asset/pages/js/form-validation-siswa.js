var FormValidation=function(){var a=function(){var a=$("#form"),b=$(".alert-danger",a),c=$(".alert-success",a);a.validate({errorElement:"span",errorClass:"help-block help-block-error",focusInvalid:!1,ignore:"",rules:{siswa_nisn:{minlength:11,required:!0},siswa_nama:{minlength:2,required:!0},siswa_panggilan:{minlength:2,required:!0},siswa_jenis_kelamin:{required:!0},siswa_tempat_lahir:{required:!0},siswa_tgl_lahir:{required:!0},siswa_agama_id:{required:!0},siswa_alamat:{required:!0},siswa_alamat_propinsi_id:{required:!0},siswa_alamat_kota_id:{required:!0},siswa_no_telp:{number:!0,required:!0},siswa_kelas_id:{required:!0}},messages:{siswa_nisn:{required:"NISN Harus Diisi"},siswa_nama:{required:"Nama Harus Diisi"},siswa_panggilan:{required:"Nama Panggilan Harus Diisi"},siswa_jenis_kelamin:{required:"Jenis Kelamin Harus Dipilih"},siswa_tempat_lahir:{required:"Tempat Lahir Harus Diisi"},siswa_tgl_lahir:{required:"Tanggal Lahir Harus Diisi"},siswa_agama_id:{required:"Agama Harus Dipilih"},siswa_alamat:{required:"Alamat Harus Diisi"},siswa_alamat_propinsi_id:{required:"Propinsi Harus Dipilih"},siswa_alamat_kota_id:{required:"Kota Harus Dipilih"},siswa_no_telp:{required:"No Telp Harus Diisi"},siswa_kelas_id:{required:"Kelas Harus Dipilih"}},invalidHandler:function(a,d){c.hide(),b.show(),App.scrollTo(b,-200)},highlight:function(a){$(a).closest(".form-group").addClass("has-error")},unhighlight:function(a){$(a).closest(".form-group").removeClass("has-error")},success:function(a){a.closest(".form-group").removeClass("has-error")},submitHandler:function(){c.show(),b.hide(),save(),c.hide()}}),$(".date-picker").datepicker({rtl:App.isRTL(),autoclose:!0}),$(".date-picker .form-control").change(function(){a.validate().element($(this))})};return{init:function(){a()}}}();jQuery(document).ready(function(){FormValidation.init()});