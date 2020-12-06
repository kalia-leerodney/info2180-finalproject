window.onload = function () {
	var firstname = document.getElementById("firstname");
	var lastname = document.getElementById("lastname");
	var password = document.getElementById("password");
	var email = document.getElementById("email");
	var result = document.getElementById("result");
	var myissuebtn = document.getElementById("form1btn");
	myissuebtn.addEventListener("click", function (e) {
		e.preventDefault();
		if (Validate() == true) {
			var hrequest = new XMLHttpRequest();
			var urlcode =
				"insertuser.php?firstname=" +
				firstname.value +
				"&lastname=" +
				lastname.value +
				"&password=" +
				password.value +
				"&email=" +
				email.value;
			hrequest.onreadystatechange = function () {
				if (hrequest.readyState == XMLHttpRequest.DONE) {
					if (hrequest.status == 200) {
						var issue = hrequest.responseText;
						result.innerHTML = issue;
					} else {
						alert("Error Detected");
					}
				}
			};

			hrequest.open("GET", urlcode, true);
			hrequest.send();
		}
	});
};
function Validate() {
	var firstname = document.getElementById("firstname");
	var lastname = document.getElementById("lastname");
	var password = document.getElementById("password");
	var email = document.getElementById("email");
	var result = document.getElementById("result");
	var check = true;
	lastname.style.borderColor = "black";
	password.style.borderColor = "black";
	firstname.style.borderColor = "black";
	email.style.borderColor = "black";
	if (!password.value.match(/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/)) {
		password.style.borderColor = "red";
		result.innerHTML =
			"Password must be at least 8 characters including 1 capital letter and 1 number";
		check = false;
	}
	if (
		!email.value.match(
			/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/
		)
	) {
		email.style.borderColor = "red";
		result.innerHTML = "Please enter an appropriate email address";
		check = false;
	}
	if (firstname.value == "") {
		firstname.style.borderColor = "red";
		result.innerHTML = "Please Enter all Fields";
		check = false;
	}
	if (lastname.value == "") {
		lastname.style.borderColor = "red";
		result.innerHTML = "Please Enter  all Fields";
		check = false;
	}

	if (check) {
		return true;
	} else {
		return false;
	}
}
