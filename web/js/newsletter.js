function almacena_email_i18n (button) {	
	// Vamos a detectar el input
	var input = $(button).parent().children('input');
	if ($(input).val() == undefined) {
		var input = $('#email_newsletter');
	}
	
	$.post("/es/newsletter_engine/add-email/", { email: $(input).val() }, function(data) {
		if (data.substring(0,1) == '@') {
			// Cancelación
			if (window.confirm(data.substring(1)) == false) {
				// Cancelación aceptada.
				$.post("/newsletter_engine/remove-email/", { email: $(input).val() }, function(data) {
					alert(data);
				});
			}
		} else {
			alert(data);
		}
		$(input).val('');
	});	
}

function almacena_email (button) {	
	// Vamos a detectar el input
	var input = $(button).parent().children('input');
	$.post("/newsletter_engine/add-email/", { email: $(input).val() }, function(data) {
		if (data.substring(0,1) == '@') {
			// Cancelación
			if (window.confirm(data.substring(1)) == false) {
				// Cancelación aceptada.
				$.post("/newsletter_engine/remove-email/", { email: $(input).val() }, function(data) {
					alert(data);
				});
			}
		} else {
			alert(data);
		}
		$(input).val('');
	});	
}