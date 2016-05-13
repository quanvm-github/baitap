monster = [];
numMonster = 9;
dieMonster = false;
heart = 3;
score =  0;
highScore = 0;
gameOver = false;
gameWin = false;
imgBlood = new Image();
imgBlood.src = 'images/blood.png';

imgMonster = new Image();
imgMonster.src = 'images/monster.png';

imgBoss = new Image();
imgBoss.src = 'images/boss.png';

imgHeart = new Image();
imgHeart.src = 'images/heart.png';

imgBoom = new Image();
imgBoom.src = 'images/boom.png';

imgPause = new Image();
imgPause.src = 'images/pause.png';

imgBackground = new Image();
imgBackground.src = 'images/background.jpg';

imgBottom = new Image();
imgBottom.src = 'images/bottom.jpg';

imgReset = new Image();
imgReset.src = 'images/reset.png';

window.onload = function() {
	canvas = document.getElementById("canvas");
	context = canvas.getContext("2d");
	image = new Image();
	image.src = "images/carrot.png";
	monster = new Monster(image, 0, 0, 300, 300, 1, 1, 64, 64);
	setInterval("update()", 10);
}

function draw() {
	context.clearRect(0, 0, canvas.width, canvas.height);
	monster.draw();
}

function update() {
	monster.move();
	monster.checkCollision();
	draw();
}

function Monster (image, startX, startY, endX, endY, speedX, speedY, imgWidth, imgHeight) {
	this.image = image;

	this.startx = startX;
	this.starty = startY;

	this.endx = endX;
	this.endx = endY;

	this.speedx = speedX;
	this.speedy = speedY;

	this.width = imgWidth;
	this.height = imgHeight;
}

Monster.prototype.draw = function() {
	context.drawImage(this.image, this.startx, this.starty, this.width, this.height);
}

Monster.prototype.move = function() {
	this.startx += this.speedx;
	this.starty += this.speedy;
}
Monster.prototype.checkCollision = function() {
	if(this.startx <= 0 || this.startx >= canvas.width - this.width) this.speedx = -this.speedx;
	if(this.starty <= 0 || this.starty >= canvas.height - this.height) this.speedy = -this.speedy;
}

function drawBackground() {
	context.drawImage(imgBackground, 0, 0, canvas.width, canvas.height);
	reAnimation(drawBackground);
}
