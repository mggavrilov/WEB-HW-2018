var x = '10006';
var o = '9898';

var firstPlayerMove;
var gameWon;
var moves;

function showMsg(msg) {
	document.getElementById("msg").innerHTML = msg;
}

function setup() {
	firstPlayerMove = true;
	gameWon = false;
	moves = 0;
	showMsg("It's X's turn.");
}

function restart() {
	Array.prototype.forEach.call(document.getElementsByClassName("tile"), function(element) {
		element.innerHTML = "";
	});
	
	setup();
}

function makeMove(tile) {
	if(gameWon) {
		return false;
	}
	
	if(isValidMove(tile)) {
		moves++;
		
		if(firstPlayerMove) {
			tile.innerHTML = '&#' + x + ';';
		}
		else {
			tile.innerHTML = '&#' + o + ';';
		}
		
		if(checkWin()) {
			return true;
		}
		
		if(moves == 9) {
			showMsg("Draw.");
			return true;
		}
		
		firstPlayerMove = !firstPlayerMove;
		
		if(firstPlayerMove) {
			showMsg("It's X's turn.");
		}
		else {
			showMsg("It's O's turn.");
		}
	}
}

function isValidMove(tile) {
	return tile.innerHTML === '';
}

function checkWin() {
	var tiles = document.getElementsByClassName("tile");
	var xTiles = new Array(9);
	var oTiles = new Array(9);
	
	for(var i = 0; i < tiles.length; i++) {
		if(tiles[i].innerHTML === String.fromCharCode(x)) {
			xTiles[i] = 1;
		}
		
		if(tiles[i].innerHTML === String.fromCharCode(o)) {
			oTiles[i] = 1;
		}
	}
	
	if(hasWinningPattern(xTiles)) {
		showMsg("Player 1 (X) has won the game.");
		return true;
	}
	
	if(hasWinningPattern(oTiles)) {
		showMsg("Player 2 (O) has won the game.");
		return true;
	}
	
	return false;
}

function hasWinningPattern(tiles) {
	var winningPatterns = [
		[0, 1, 2],
		[3, 4, 5],
		[6, 7, 8],
		[0, 3, 6],
		[1, 4, 7],
		[2, 5, 8],
		[0, 4, 8],
		[2, 4, 6]
	];
	
	for(var i = 0; i < winningPatterns.length; i++) {
		var pattern = winningPatterns[i];
		
		var win = true;
		for(var j = 0; j < pattern.length; j++) {
			if(tiles[pattern[j]] != 1) {
				win = false;
			}
		}
		
		if(win) {
			gameWon = true;
			return true;
		}
	}
	
	return false;
}