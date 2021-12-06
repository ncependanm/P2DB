$(document).ready(function() {



	$('input[name=reg_data_nilai_ind_satu]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ind_dua]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ind_tiga]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ind_empat]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ind_lima]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	
	
	$('input[name=reg_data_nilai_ing_satu]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ing_dua]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ing_tiga]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ing_empat]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ing_lima]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	
	$('input[name=reg_data_nilai_mtk_satu]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_mtk_dua]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_mtk_tiga]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_mtk_empat]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_mtk_lima]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	
	$('input[name=reg_data_nilai_ipa_satu]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ipa_dua]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ipa_tiga]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ipa_empat]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
	$('input[name=reg_data_nilai_ipa_lima]').bind('keyup blur', function () {
		var myValue = $(this).val();
			if(myValue.substring(myValue.length-1, myValue.length) == '.'){
				$(this).val(myValue.replace('.', ','));
			} else if(myValue.substring(myValue.length-1, myValue.length) == ','){
				$(this).val(myValue.replace(',', ','));
			} else {
				if (!/^[0-9]+$/.test(myValue.substring(myValue.indexOf(',')+1))) {
					myValue = myValue.substring(0,myValue.length-1);
					$(this).val(myValue);
				} else {
					$(this).val(myValue);
				}
			}
	});
});
