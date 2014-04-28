/* Да Мартин, јас го пишев :D */
function toCels(){
	var x;
	x = document.getElementById('faren').value;
	x = (x-32)*(5/9);
	x = Math.round(x*100)/100;
	document.getElementById('cels').value = x+"°";
}
function toFaren(){
	var x;
	x = document.getElementById('cels').value;
	x = x * (9/5) +32;
	x = Math.round(x*100)/100;
	document.getElementById('faren').value = x+"°";
}