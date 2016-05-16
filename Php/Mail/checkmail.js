window.onload = function() {
	subject = document.getElementById("subject");
	email = document.getElementById("email");
	content = document.getElementById("content");

	errorSubject = document.getElementById("error_subject");
	errorEmail = document.getElementById("error_email");
	errorContent = document.getElementById("error_content");
}

function checkSubject() {
	var length = subject.value.length;

	if(length < 0) {
		errorSubject.innerHTML = "Must not be empty";
		return false;
	}
	else {
		errorSubject.innerHTML = "";
		return true;
	}
}

function checkEmail() {
	var regex = /^[0-9a-zA-Z]+\@[0-9a-zA-Z]+\.[a-z]+$/; // have a least 1 char + 1 @ -> a least 1 char + 1 . + end with a least 1 char (not number)
	var length = email.value.length;
	
	if(length == 0) {
		errorEmail.innerHTML = "Email must be filled";
		return false;
	}
	else if(email.value.match(regex) == null) {
		errorEmail.innerHTML = "Email wrong format";
		return false;
	}
	else {
		errorEmail.innerHTML = "";
		return true;
	}
}

function checkContent() {
	var length = content.value.length;

	if(length == 0) {
		errorContent.innerHTML = "Must not be empty";
		return false;
	}
	else {
		errorContent.innerHTML = "";
		return true;
	}
}

function checkSubmit() {
	if(checkSubject() & checkEmail() & checkContent()) {
		document.getElementById("form_email").submit();
		return true;
	}
	else {
		return false;
	}
}