var loginWrapper = document.getElementById('login_wrapper');
document.getElementById('exit').style.display = "inline";

function changeName() {
	changer = document.getElementById('changer');
	if (changer){} else {
			alert('You have not enough rights');
			return 0; 
		}	
	var login = document.getElementById('login');
	currentLogin = login.innerHTML;
	var loginInput = document.createElement('input');
	loginInput.setAttribute("type", 'text');
	loginInput.setAttribute('id', 'login_input');
	loginInput.setAttribute('oninput', 'changeLogin(this)');
	loginInput.setAttribute('placeholder', currentLogin);
	loginWrapper.removeChild(login);
	loginWrapper.appendChild(loginInput);
	changer.removeAttribute('onclick');
	changer.setAttribute('onclick', 'submitName()');
	changer.innerHTML = '&#10003;';
}


function submitName(e) {
	changer = document.getElementById('changer');
	if (changer){} else {
			alert('You have not enough rights');
			return 0; 
		}	
	var loginInput = document.getElementById('login_input');
	login = document.createElement('h2');
	login.id = 'login';
	loginWrapper.removeChild(loginInput);
	loginWrapper.appendChild(login);
	login.innerHTML = e;
	changer.innerHTML = '&#9998;';
	changer.removeAttribute('onclick');
	changer.setAttribute('onclick', 'changeName()');
	change_checker.innerHTML = '';
}

function changeLogin(e) {
	changer = document.getElementById('changer');
	if (changer){} else {
			alert('You have not enough rights');
			return 0; 
		}	
	var newLogin = e.value;
	var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				change_checker.innerHTML = this.responseText;
					if (this.responseText == "Correct login") {
						changer.setAttribute('onclick', "submitName('" + String(newLogin) + "')");
					}
 			}
		}
	xmlhttp.open("POST", "/application/ajax/login.change.php?login=" + newLogin, true);
	xmlhttp.send();
}