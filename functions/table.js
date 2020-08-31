function tdclick(id) {
	if (document.getElementById("hiddenTd" + id).style.display === 'none') {
		document.getElementById("hiddenTd" + id).style.display = 'table-row';
	} else {
		document.getElementById("hiddenTd" + id).style.display = 'none';
	}
}