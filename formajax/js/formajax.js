window.onload = function() {
	username = document.getElementById("username");
	password = document.getElementById("password");
	email = document.getElementById("email");
	birthday = document.getElementById("inputtext");

	errorUser = document.getElementById("error_user");
	errorPassword = document.getElementById("error_password");
	errorEmail = document.getElementById("error_email");
	errorBirthday = document.getElementById("error_birthday");
}

function checkUser() {
	var regex = /[^a-zA-Z0-9]/;
	var length = username.value.length;

	if(length < 8) {
		errorUser.innerHTML = "Username length min 8 letter";
		return false;
	}
	else if(username.value.match(regex) != null){
		errorUser.innerHTML = "Username have special characters";
		return false;
	}
	else if(checkUsernameServer()) {
		errorUser.innerHTML = "Username is unavailable";
		return false;
	}
	else {
		errorUser.innerHTML = "";
		return true;
	}
}

function checkPassword() {
	var regex = /[^a-zA-Z0-9]/;
	var length = password.value.length;

	if(length < 8) {
		errorPassword.innerHTML = "Password length min 8 letter";
		return false;
	}
	else if(password.value.match(regex) == null){
		errorPassword.innerHTML = "Password must have special characters";
		return false;
	}
	else {
		errorPassword.innerHTML = "";
		return true;
	}
}

function checkEmail() {
	var regex = /^[0-9a-zA-Z.]+\@[0-9a-zA-Z.]+\.[a-z]+$/;
	var length = email.value.length;
	
	if(length == 0) {
		errorEmail.innerHTML = "Email must be filled";
		return false;
	}
	else if(email.value.match(regex) == null){
		errorEmail.innerHTML = "Email wrong format";
		return false;
	}
	else {
		errorEmail.innerHTML = "";
		return true;
	}
}

function checkBirthday() {
	var length = birthday.value.length;
	
	if(length == 0) {
		errorBirthday.innerHTML = "Birthday must be chosen";
		return false;
	}
	else {
		errorBirthday.innerHTML = "";
		return true;
	}
}

function checkUsernameServer() {
	var xhttp = new XMLHttpRequest();
		var response;
		var check = username.value;
  		xhttp.onreadystatechange = function() {
   			if (xhttp.readyState == 4 && xhttp.status == 200) {
				response = xhttp.responseXML;
    			}
  		};
  		xhttp.open("GET", "http://meomeo.0fees.us/check.php", true);
  		xhttp.send(check);
		return response;
	if(response) {
		return true;
	}
	else return false;
}

function checkSubmit() {
	if(checkUser() & checkPassword() & checkEmail() & checkBirthday()) {
		alert("Good");
		return true;
	}
	else {
		return false;
	}
}