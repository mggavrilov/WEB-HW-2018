function validate() {
	var user = document.getElementById('user').value;
	var pass = document.getElementById('password').value;
	var pass2 = document.getElementById('password2').value;
	
	if(!/^[a-zA-Z0-9_]{3,10}$/.test(user)) {
		var msg = 'Потребителското име трябва да е между 3 и 10 символа и да съдържа само малки и големи латински букви, цифри или долна черта "_".';
		showError(msg);
		return false;
	}
	
	if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(.*){6,}$/.test(pass)) {
		var msg = 'Паролата трябва да е поне 6 символа и да съдържа поне 1 главна, 1 малка буква и 1 цифра.';
		showError(msg);
		return false;
	}
	
	if(pass != pass2) {
		var msg = 'Паролите трябва да съвпадат.';
		showError(msg);
		return false;
	}
}

function showError(msg) {
	document.getElementById('error').innerHTML = msg;
	document.getElementById('error').classList.add('error');
	document.getElementById('error').classList.remove('noerror');
}