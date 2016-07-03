window.onload = function() {
	username = document.getElementById("Userusername");
	password = document.getElementById("Userpassword");
	flaguser = false; // check user is available ?

	errorUser = username.value;
	errorPassword = password.value;
}

function checkUser() {
	var regex = /[^a-zA-Z0-9]/;
	var length = username.value.length;

	if(length < 3) {
		errorUser.innerHTML = "Username length min 3 letter";
		return false;
	}
	else if(username.value.match(regex) != null) {
		errorUser.innerHTML = "Usernames must only contain letters and numbers";
		return false;
	} else
		return true;
	}
}

function checkPassword() {
	var regex = /[^a-zA-Z0-9]/;
	var length = password.value.length;

	if(length < 3) {
		errorPassword.innerHTML = "Password length min 3 letter";
		return false;
	}
	else if(password.value.match(regex) == null) {
		errorPassword.innerHTML = "Password must have special characters";
		return false;
	}
	else {
		errorPassword.innerHTML = "";
		return true;
	}
}

// === ajax function to check user availability ===
function checkUsernameServer() {
	var value = username.value; 
	$.ajax({
		url: "/test/Cake/Cakes/checkLogin",
		type: "post",
		data: {
			checklogin: value
		},
		success: function(result) {
    		if (result == true) {
    			errorUser.innerHTML = "Username unavailable";
				flaguser = false
    		} else {
				errorUser.innerHTML = "";
				flaguser = true;
			}
		}
	});
}

function checkSubmit() {
	if(checkUser() & checkPassword()) {
		document.getElementById("submit").submit();
		return true;
	}
	else {
		return false;
	}
}