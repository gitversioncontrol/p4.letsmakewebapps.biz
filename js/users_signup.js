$('input').keyup(function() {
	if (! /^[a-zA-Z]+$/.test($('input[name=first_name]').val()) ) {
		$('#first').html("First name should be made of letters only");
	}
	
	console.log ($('input[name=first_name]').val());
	//$('.msg').html("First name should be made of letters only");

});