window.onload = function () {
	var myissuebtn = document.getElementById("myissues");
	myissuebtn.addEventListener("click", function (e) {
		var hrequest = new XMLHttpRequest();
		var urlcode = "mytickets.php";
		hrequest.onreadystatechange = function () {
			if (hrequest.readyState == XMLHttpRequest.DONE) {
				if (hrequest.status == 200) {
					var issue = hrequest.responseText;
					var result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert("Error Detected");
				}
			}
		};

		hrequest.open("GET", urlcode, true);
		hrequest.send();
	});
	var openissuebtn = document.getElementById("openissues");
	openissuebtn.addEventListener("click", function (e) {
		var hrequest = new XMLHttpRequest();
		var urlcode = "openissuesonly.php";
		hrequest.onreadystatechange = function () {
			if (hrequest.readyState == XMLHttpRequest.DONE) {
				if (hrequest.status == 200) {
					var issue = hrequest.responseText;
					var result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert("Error Detected");
				}
			}
		};

		hrequest.open("GET", urlcode, true);
		hrequest.send();
	});
	var allissuebtn = document.getElementById("allissues");
	allissuebtn.addEventListener("click", function (e) {
		var hrequest = new XMLHttpRequest();
		var urlcode = "displayallissues.php";
		hrequest.onreadystatechange = function () {
			if (hrequest.readyState == XMLHttpRequest.DONE) {
				if (hrequest.status == 200) {
					var issue = hrequest.responseText;
					var result = document.getElementById("result");
					result.innerHTML = issue;
				} else {
					alert("Error Detected");
				}
			}
		};

		hrequest.open("GET", urlcode, true);
		hrequest.send();
	});
	var hrequest = new XMLHttpRequest();
	var urlcode = "displayallissues.php";
	hrequest.onreadystatechange = function () {
		if (hrequest.readyState == XMLHttpRequest.DONE) {
			if (hrequest.status == 200) {
				var issue = hrequest.responseText;
				var result = document.getElementById("result");
				result.innerHTML = issue;
			} else {
				alert("Error Detected");
			}
		}
	};
	hrequest.open("GET", urlcode, true);
	hrequest.send();
};

function displayFullIssue() {
	var hrequest = new XMLHttpRequest();
	var urlcode = "displayjobdetails.php";
	hrequest.onreadystatechange = function () {
		if (hrequest.readyState == XMLHttpRequest.DONE) {
			if (hrequest.status == 200) {
				var issue = hrequest.responseText;
				var result = document.getElementById("display");
				result.innerHTML = issue;
			} else {
				alert("Error Detected");
			}
		}
	};
	hrequest.open("GET", urlcode, true);
	hrequest.send();
}
