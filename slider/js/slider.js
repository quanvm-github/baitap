var currentPos = 0; // start with position = 0
var slider;
var imageWidth = 500; // image width 500px
var length; // image numbers
var maxWidth;
var circle;
var run;

window.onload = load;
window.onfocus = run;
window.onblur = stop;

// === auto run slider when page loaded ===
function load() {
	slider = document.getElementById('image_slider');
	length = slider.children.length;
	maxWidth = imageWidth * length;

	slider.style.width = maxWidth + 'px';
	circle = document.getElementById('index_circle').children;
	circle[0].style.background = "url('images/1462864014_Circle_Grey.png')";
	run();
}

function run() {
	run = setInterval("next(1)", 3000);
}

function stop() {
	clearInterval(run);
}

//=== event when next / pev arrow icon clicked ===
function next(value) {
	if(currentPos + value < 0) {
		goTo(length - 1); // go to last image
	}
	else if (currentPos + value == length) {
		goTo(0); // go to first image
	}
	else {
		nextTo(value); // run smoothly to next / pev image
	}
}

// === run smoothly to next / pev image ===
function nextTo(value) {
	var newPos = currentPos + value;
	var currWidth = currentPos * imageWidth;
	var newWidth = newPos * imageWidth;
	var i = 0;
	var run = setInterval(runSlider, 1);
	function runSlider() {
		if (i >= 500) {
			clearInterval(run);
		}
		else {
			i += 4;
			slider.style.right = (i * value) + currWidth + 'px';
		}
	}
	circle[currentPos].style.background = "url('images/1462863966_icon-ios7-circle-outline.png')";
	circle[newPos].style.background = "url('images/1462864014_Circle_Grey.png')";
	currentPos = newPos;
}

// === event when circle icon clicked -> go to new position immediately ===
function goTo(newPos) {
	if (newPos - currentPos == 1) {
		nextTo(1); // run smoothly to next image
	}
	else if (newPos - currentPos == -1) {
		nextTo(-1); // run smoothly to pev image
	}
	// else go to new position immediately
	else {
		var width = newPos * imageWidth;
		slider.style.right = width + 'px';
		circle[currentPos].style.background = "url('images/1462863966_icon-ios7-circle-outline.png')";
		circle[newPos].style.background = "url('images/1462864014_Circle_Grey.png')";
		currentPos = newPos;
	}
}