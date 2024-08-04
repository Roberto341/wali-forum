var curCall = '';
callSaved = function (text, type) {
	console.log(text);
	var s = 3000;
	if (type == 1) {
		s = 1000;
	}
	if (text == curCall && $('.error-message:visible').length) {
		return false;
	}
	else {
		if (type == 1) {
			$('.error-message').removeClass('saved_warn saved_error').addClass('saved_ok');
		}
		if (type == 2) {
			$('.error-message').removeClass('saved_ok saved_error').addClass('saved_warn');
		}
		if (type == 3) {
			$('.error-message').removeClass('saved_warn saved_ok').addClass('saved_error');
		}
		$('.error-message').text(text);
		$('.error-message').fadeIn(300).delay(s).fadeOut();
		curCall = text;
	}
}