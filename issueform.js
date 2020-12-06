window.onload = function () {
	var createissuebtn = document.getElementById("cissue");
	var result = document.getElementById("result");
	createissuebtn.addEventListener("click", function (e) {
		e.preventDefault();
		var title = document.getElementById("title");
		var description = document.getElementById("description");
		var userList = document.getElementById("assignedto");
		var selectedUser = userList.options[userList.selectedIndex].text;
		var priority = document.getElementById("priority");
		var prioritychosen = priority.options[priority.selectedIndex].text;
		var type = document.getElementById("type");
		var typechosen = type.options[type.selectedIndex].text;
		title.style.borderColor = "black";
		description.style.borderColor = "black";
		userList.style.borderColor = "black";
		if (title.value == "") {
			title.style.borderColor = "red";
			result.innerHTML = "Please Enter all Fields";
		}
		if (description.value == "") {
			description.style.borderColor = "red";
			result.innerHTML = "Please Enter all Fields";
		}

		if (selectedUser == "Please Select") {
			userList.style.borderColor = "red";
			result.innerHTML = "Please Enter all Fields";
		} else {
			var hrequest = new XMLHttpRequest();
			var urlcode =
				"addissue.php?title=" +
				title.value +
				"&description=" +
				description.value +
				"&assignedto=" +
				selectedUser +
				"&priority=" +
				prioritychosen +
				"&type=" +
				typechosen;

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
		}
	});
};
