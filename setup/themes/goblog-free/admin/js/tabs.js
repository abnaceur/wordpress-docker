function goblogOpen(pageName, element, bk, color) {
	let i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].style.backgroundColor = "";
		tablinks[i].style.color = "";
	}
	document.getElementById(pageName).style.display = "block";
	element.style.backgroundColor = bk;
	element.style.color = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
