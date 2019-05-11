
$(document).ready(function() {
	jQuery.validator.addMethod('validaIcon', function(value, element){
		if(value.indexOf('<i class="') && value.indexOf('"></i>')) {
			return false;
		} else {
			return true;
		}
	}, 'Icone inválido. Por favor, verifique as tags.');
	var validator = $('#cad_link').validate({
		rules: {
			title: {
				required: true
			},
			description: {
				required: true
			},
			url: {
				required: true,
				url: true
			},
			icon: {
				required: true,
				validaIcon: true
			},
			home_section: {
				required: true
			}
		}
	});
	validator.resetForm();
});
