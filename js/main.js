var passBlock = document.getElementById('pass');
var passIndicator = document.getElementById('pass-indicator');
var loginIndicator = document.getElementById('login-indicator');
var errorBlock = document.getElementById('error');


function emailClick() {
	var email = document.getElementById('email').value;
	if (~email.indexOf("@") && ~email.indexOf('.')) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText = "1") {
			 		createConfirmForm();
			 		document.getElementById('confirmEmail').style.display = 'none';
			 	} else {
			 		errorBlock.innerHTML('Something went wrong');
			 	}
 			}
		}
	xmlhttp.open("POST", "/application/ajax/email.send.php?email=" + email, true);
	xmlhttp.send();
	} else {
		errorBlock.innerHTML = "Invalid e-mail!";
	}
}

function passLengthCheck(e) {
	if (e.value.length < 4) {
		passIndicator.innerHTML = "Weak password";
		passIndicator.style.color = "red";
		passIndicator.style.borderBottom = "1px solid red";
	} else if (e.value.length >= 4 && e.value.length < 8) {
		passIndicator.innerHTML = "Normal password";
		passIndicator.style.color = "orange";
		passIndicator.style.borderBottom = "1px solid orange";
	} else if (e.value.length >= 8) {
		passIndicator.innerHTML = "Strong password";
		passIndicator.style.color = "green";
		passIndicator.style.borderBottom = "1px solid green";
	}
}

function loginCheck(e) {
	var login = e.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			 	loginIndicator.innerHTML = this.responseText;
 			}
		}
	xmlhttp.open("POST", "/application/ajax/login.check.php?login=" + login, true);
	xmlhttp.send();
}

function createConfirmForm() {
	var keyLabel = document.createElement('label');
	var keyBlock = document.createElement('input');
	var submit = document.createElement('input');
	keyLabel.setAttribute('for', 'key');
	keyLabel.innerHTML = "Verification key";
	keyBlock.setAttribute('type', 'text');
	keyBlock.setAttribute('name', 'key');
	keyBlock.setAttribute('placeholder', 'Examble: faskl5fjas');
	submit.value = 'Registration';
	submit.setAttribute('type', 'submit');
	regform.appendChild(keyLabel);
	regform.appendChild(keyBlock);
	regform.appendChild(submit);
}