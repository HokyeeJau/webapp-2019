/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
	// loser = false;
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	var walls = $("boundary1");
	// walls.innerHTML = walls.next().className;
	while (walls.className=="boundary") {
		walls.addClassName('youlose');
		walls = walls.next();
	}
	loser = true;
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	loser = false;
	var walls = $("boundary1");
	// walls.innerHTML = walls.className;
	var judge = $('status');
	judge.innerHTML = "Game is on!";
	while (walls.className=='boundary youlose') {
		// walls.innerHTML = walls.className;
		walls.removeClassName('youlose');
		walls = walls.next();
	}
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	var judge = $("status");
	if (loser == false){
		judge.innerHTML = "You win!:)";
	} else if (loser == true) {
		judge.innerHTML = "You lose!:(";
	}
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	// if ($("status").innerHTML == "Game is on!"){
		var div = $("maze");
		// the height and width of div with id "maze"
    	var x = event.clientX;
    	var y = event.clientY;
    	var divLeftWidth = div.offsetLeft;
    	var divTopHeight = div.offsetTop;
    	var divRightWidth = div.offsetLeft + div.offsetWidth;
    	var divBottomHeight = div.offsetTop + div.offsetHeight;
		// wall.innerHTML = divLeftWidth;
    	if(x < divLeftWidth || x > divRightWidth || y < divTopHeight || y > divBottomHeight){
			loser = true;
			var wall = $("boundary1");
			wall.innerHTML = "give it a shit!";
		}
	// }
}
