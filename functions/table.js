function questionClick(id) {
	if (document.getElementById("hiddenTd" + id).style.display === 'none') {
		document.getElementById("hiddenTd" + id).style.display = 'table-cell';
	} else {
		document.getElementById("hiddenTd" + id).style.display = 'none';
	}
}