function tdclick(id) {
	if (document.getElementById("hiddenTd" + id).style.visibility === 'hidden') {
		document.getElementById("hiddenTd" + id).style.visibility = 'visible';
	} else {
		document.getElementById("hiddenTd" + id).style.visibility = 'hidden';
	}
}