window.onload = function () {
	var idissue = document.getElementById("issue-#").getAttribute("value");
	var closebtn = document.getElementById("closed");
	var progressbtn = document.getElementById("inprogress");
	closebtn.addEventListener("click", function (e) {
		var hrequest = new XMLHttpRequest();
		var urlcode = "updateissues.php?id=" + idissue + "&update=Closed";
		console.log(urlcode);
		hrequest.onreadystatechange = function () {
			if (hrequest.readyState == XMLHttpRequest.DONE) {
				if (hrequest.status == 200) {
					if (hrequest.responseText == "Updated") {
						location.reload();
					}
				} else {
					alert("Error Detected");
				}
			}
		};

		hrequest.open("GET", urlcode, true);
		hrequest.send();
	});
	progressbtn.addEventListener("click", function (e) {
		var hrequest = new XMLHttpRequest();
		var urlcode = "updateissues.php?id=" + idissue + "&update=In-Progress";
		hrequest.onreadystatechange = function () {
			if (hrequest.readyState == XMLHttpRequest.DONE) {
				if (hrequest.status == 200) {
					if (hrequest.responseText == "Updated") {
						location.reload();
					}
				} else {
					alert("Error Detected");
				}
			}
		};

		hrequest.open("GET", urlcode, true);
		hrequest.send();
	});
};
