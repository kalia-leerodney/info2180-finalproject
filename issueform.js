window.onload = function () {
	var createissuebtn = document.getElementById("createnewissue");

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

		if (title.value == "") {
			title.style.borderColor = "red";
			console.log("Please Enter Title");
		}
		if (description.value == "") {
			description.style.borderColor = "red";
			console.log("Please Enter Description");
		}

		if (selectedUser == "none") {
			userList.style.borderColor = "red";
			console.log("Please Select a User");
		}

		if (prioritychosen == "none") {
			priority.style.borderColor = "red";
			console.log("Please Select a Priority");
		}

		if (typechosen == "none") {
			type.style.borderColor = "red";
			console.log("Please Select a User");
		} else {
			var hrequest = new XMLHttpRequest();
			var urlcode =
				"addissue.php?query=" +
				title.value +
				description.value +
				selectedUser +
				prioritychosen +
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
