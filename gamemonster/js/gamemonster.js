window.onload = function() {
	canvas = document.getElementById("canvas");
	context = canvas.getContext("2d");
	canvas_right = document.getElementById("canvas_right");
	context_right = canvas_right.getContext("2d");
	canvas.addEventListener("click", click);	
	canvas_right.addEventListener("click", clickRight);

	start();
	run();
}

//setting game
function start () {
	flag_start_check = 0;
	live = 3;
	bomb = 1;
	score = 0;
	flag_sroce = 0;
	if (sessionStorage.getItem("high_score") == null) {
		hight_score = 0;
		sessionStorage.setItem("high_score", 0);
	} else {
		hight_score = sessionStorage.getItem("high_score");
	}

	image_bacground = new Image();
	image_bacground.src = "images/bg.jpg";
	image_bonus = new Image();
	image_bonus.src = "images/money.png";
	image_start = new Image();
	image_start.src = "images/start.png";
	image_pause = new Image();
	image_pause.src = "images/pause.png";
	image_bomb = new Image();
	image_bomb.src = "images/bomb.png";
	image_score = new Image();
	image_score.src = "images/star.png";

	//setting monters
	monster_number = 9;

	image_src = [];
	image_src[0] = "images/apple.png";
	image_src[1] = "images/bananas.png";
	image_src[2] = "images/carrot.png";
	image_src[3] = "images/kiwi.png";
	image_src[4] = "images/orange.png";
	image_src[5] = "images/pineapple.png";
	image_src[6] = "images/strawberry.png";
	image_src[7] = "images/watermelon.png";
	image_src[8] = "images/pear.png";

	image = [];
	for (i = 0; i< monster_number; i++) {
		random = Math.floor(Math.random() * (monster_number) + 0);
		image[i] = new Image();
		image[i].src = image_src[random];
	}

	image_width = 64;
	image_height = 64;
	canvas_width_haft = canvas.width / 2;
	canvas_height_haft = canvas.height / 2;
	image_width_haft = image_width / 2;
	image_height_haft = image_height / 2;

	no_move = 0;
	move_left = 1;
	move_down = 1;
	random_move_x = Math.floor(Math.random() * 7) + -3;
	random_move_y = Math.floor(Math.random() * 7) + -3;
	if (random_move_x == 0 || random_move_y == 0) {
		random_move_x = Math.floor(Math.random() * 3) + 1;
		random_move_y = Math.floor(Math.random() * 3) + 1;
	}

	monster = [];
	monster_die = [];
	monster_die_count = 0;
	//left top
	monster[0] = new Monster(image[0], 0, 0,
		0, 100, 0, 0,
		move_left, no_move, image_width, image_height);
	//left mid
	monster[1] = new Monster(image[1], 0, canvas_height_haft - image_height_haft,
		0, 120, 0, 0,
		move_left, no_move, image_width, image_height);
	//left bot
	monster[2] = new Monster(image[2], 0, canvas.height - image_height,
		0, 120, 0, 0,
		move_left, no_move, image_width, image_height);
	//top mid
	monster[3] = new Monster(image[3], canvas_width_haft - image_width_haft, 0,
		0, 0, 0, 120,
		no_move, move_down, image_width, image_height);
	//top right
	monster[4] = new Monster(image[4], canvas.width - image_width, 0,
		canvas.width - 120 - image_width, canvas.width, 0, 0,
		move_left, no_move, image_width, image_height);
	//right mid
	monster[5] = new Monster(image[5],
		canvas.width - image_width, canvas_height_haft - image_height_haft,
		canvas.width - 120 - image_width, canvas.width, 0, 0,
		move_left, no_move, image_width, image_height);
	//right bot
	monster[6] = new Monster(image[6],
		canvas.width - image_width, canvas.height - image_height,
		canvas.width - 120 - image_width, canvas.width, 0, 0,
		move_left, no_move, image_width, image_height);
	//bot mid
	monster[7] = new Monster(image[7],
		canvas_width_haft - image_width_haft, canvas.height - image_height,
		0, 0, canvas.height - 120 - image_height, canvas.height,
		no_move, move_down, image_width, image_height);
	//center
	monster[8] = new Monster(image[8],
		canvas_width_haft - image_width_haft, canvas_height_haft - image_height_haft,
		0, canvas.width, 0, canvas.height,
		random_move_x, random_move_y, image_width, image_height);
}
//run game
function run () {
	flag_start = setInterval("update()", 10);
}

//class monster
function Monster(image, startX, startY, endL, endR, endT, endB, speedX, speedY,
	imgWidth, imgHeight) {
	//image
	this.image = image;
	//monster start from this positon
	this.startx = startX;//left
	this.starty = startY;//top
	//and move to this postion
	this.endl = endL;
	this.endr = endR;
	this.endt = endT;
	this.endb = endB;
	//movement speed
	this.speedx = speedX;
	this.speedy = speedY;
	//width, height of monster
	this.width = imgWidth;
	this.height = imgHeight;
	//create monster
	this.draw = function() {
		context.drawImage(this.image, this.startx, this.starty,
			this.width, this.height);
	}
	//move monster
	this.move = function() {
		this.startx += this.speedx;
		this.starty += this.speedy;
	}
	//check movement limit
	this.checkCollision = function() {
		if(this.startx < 0 || this.startx > canvas.width - image_width ||
			this.startx < this.endl || this.startx > this.endr)
			this.speedx = -this.speedx;
		if(this.starty < 0 || this.starty > canvas.height - image_height ||
			this.starty < this.endt || this.starty > this.endb)
			this.speedy = -this.speedy;
	}
	//check click
	this.checkClick = function(mousex, mousey) {
		if (this.startx < mousex && mousex < this.startx + image_width  &&
		this.starty < mousey && mousey < this.starty + image_height) {
			return true;
		} else {
			return false;
		}
	}
}
//draw the game continuously
function update() {
	context.clearRect(0, 0, canvas.width, canvas.height);
	context_right.clearRect(0, 0, canvas_right.width, canvas_right.height);
	if (flag_start_check == 0) {
		drawBackground();
		drawContentRight();
		drawWelcome();
	}
	if (flag_start_check == 1) {
		drawBackground();
		drawContentRight();
		drawMonster();
		drawMoney();
	}
	if (flag_start_check == 3) {
		drawBackground();
		drawContentRight();
		drawWin();
	}
	if (flag_start_check == 4) {
		drawBackground();
		drawContentRight();
		drawLose();
	}
}
//event click
function click(e) {
	mouseClickX = e.pageX - canvas.offsetLeft;
	mouseClickY = e.pageY - canvas.offsetTop;
	flag_click = 0;
	if (live > 0 && flag_start_check == 1) {
		for (i = 0; i < monster_number; i++) {
			if (monster[i].checkClick(mouseClickX, mouseClickY)) {
				flag_click = 1;
				//update monster numbers
				monster.splice(i, 1);
				monster_number --;
				//score check
				if (flag_sroce == 0) {
					flag_sroce = 1;
					score += 10;
				} else {
					if (flag_sroce == 1) {
						score += 20;
					}
				}
				if (score > hight_score) {
					sessionStorage.setItem("high_score", score);
				}
				monster_die.push(mouseClickX, mouseClickY);
				monster_die_count += 2;
			}
		}
		//miss click
		if (flag_click == 0) {
			live --;
			flag_sroce = 0;
		}
		//win
		if(monster_number == 0) {
			flag_start_check = 3;
		}
	}
	//lose
	if (live == 0) {
		flag_start_check = 4;
	}
}

function clickRight(e) {
	mouseClickX = e.pageX - canvas_right.offsetLeft;
	mouseClickY = e.pageY - canvas_right.offsetTop;
	//start game
	if(
		mouseClickX >= 30 && 
		mouseClickX <= 74 && 
		mouseClickY >= 20 && 
		mouseClickY <= 64) {
		if (flag_start_check == 0) {	
			flag_start_check = 1;
		}
		if (flag_start_check == 3 || flag_start_check == 4) {
			start();
			flag_start_check = 1;
		}
	}
	//pause
	if(
		mouseClickX >= 99 && 
		mouseClickX <= 128 && 
		mouseClickY >= 20 && 
		mouseClickY <= 64) {
		if (flag_start_check == 1) {
			clearInterval(flag_start);
			flag_start_check = 2;
		}
		else {
			if (flag_start_check == 2) {
				run();
				flag_start_check = 1;
			}
		}
	}
	//bomb
	if (mouseClickX >= 20 && 
		mouseClickX <= 64 && 
		mouseClickY >= 84 && 
		mouseClickY <= 148) {
		if (bomb == 1 && flag_start_check == 1) {
			bomb = 0;
			score += monster_number * 10;
			flag_start_check = 3;
		}
	}
}

function drawBackground() {
	context.drawImage(image_bacground, 0, 0, canvas.width, canvas.height);
}

function drawContentRight() {
	context_right.drawImage(image_start, 20, 10, 64, 64);
	context_right.drawImage(image_pause, 84, 10, 64, 64);
	context_right.drawImage(image_bomb, 20, 80, 46, 64);
	//draw score
	context_right.font = "30px Arial";
	context_right.fillStyle = "red";
	context_right.fillText(live, 20, 200); 	
	context_right.drawImage(image_score, 50, 160, 48, 48);
	context_right.fillStyle = "black";
	context_right.fillText("score", 20, 240);
	context_right.fillStyle = "red";
	context_right.fillText(score, 20, 270);
	context_right.fillStyle = "black";
	context_right.fillText("H score", 20, 300);
	context_right.fillStyle = "red";
	context_right.fillText(hight_score, 20, 330);
}

function drawMonster() {
	for (i = 0; i < monster_number; i++) {
		monster[i].draw();
		monster[i].move();
		monster[i].checkCollision();
	}
}

function drawMoney() {
	for (i = 0; i < monster_die_count; i += 2) {
		context.drawImage(image_bonus,
			monster_die[i], monster_die[i+1],
			image_bonus.width, image_bonus.height);
	}
}

function drawWin() {
	context.font = "40px Arial";
	context.fillStyle = "red";
	context.fillText("Win !", canvas.width / 2 - 50, canvas.height / 2 - 40);
}

function drawLose() {
	context.font = "40px Arial";
	context.fillStyle = "red";
	context.fillText("Lose !", canvas.width / 2 - 50, canvas.height / 2 - 40);
}

function drawWelcome() {
	context.font = "40px Arial";
	context.fillStyle = "red";
	context.fillText("Welcome !", canvas.width / 2 - 80, canvas.height / 2 - 10);
}


