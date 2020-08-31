function tdclick(id) {
	if (document.getElementById("myTd" + id).style.visibility === 'hidden') {
		document.getElementById("myTd" + id).style.visibility = 'visible';
	} else {
		document.getElementById("myTd" + id).style.visibility = 'hidden';
	}
}