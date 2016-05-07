function show(e)
{
	var x = document.getElementsByClassName("movies_trailer_infor");
	var y = document.getElementsByClassName("movies_img");
	var index = e.getAttribute("value");
	if(x[index].style.display == "block") {
		x[index].style.display = "none";
		y[index].src = "images/right.png";
	}
	else {
		x[index].style.display = "block";
		y[index].src = "images/down.png";
	}
}