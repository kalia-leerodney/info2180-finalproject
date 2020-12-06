window.onload = function () {
	var loginbtn = document.getElementById("loginbtn");
	var password = document.getElementById("password");
	var email = document.getElementById("email");
	console.log("1");
};
function Vali() {
	var check = true;
	password.style.borderColor = "black";
	email.style.borderColor = "black";
	if (email.value == "") {
		email.style.borderColor = "red";
		console.log("Please Enter First Name");
		check = false;
	}
	if (password.value == "") {
		password.style.borderColor = "red";
		console.log("Please Enter last Name");
		check = false;
	}
	if (check) {
		return true;
	} else {
		return false;
	}
}
