<?php
require_once 'game.class.php';
require_once "deck.class.php";
require_once "player.class.php";

session_start();

if (!empty($_POST['button'])){
  $button = $_POST['button'];
}

if (isset($button)){
  switch($button) {
    case 'newgame':
        $game = new Game();
        $game->startGame();
        $game->deck->showDeckCards();
        $_SESSION['newgame'] = serialize($game);
        break;
    case 'hit':
        $game = unserialize($_SESSION['newgame']);
        $game->playButtonPressed();
        $_SESSION['newgame'] = serialize($game);
        $game->checkTheWinner();
        // print_r($_SESSION['newgame']);
        break;
    case 'stand':
        $game = unserialize($_SESSION['newgame']);
        $game->standGame();
        $_SESSION['newgame'] = serialize($game);
       
  }
} else{
  echo 'Press New Game To Start';
}

?>



<html>
	<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	</head>

	<body>
	
	<form name="form" method="post" action="">
		<button class ="btn btn-info" name="button" value="newgame" type="submit">New Game</button>
		<button class ="btn btn-success" name="button" value="hit" type="submit">Hit</button>
		<button class ="btn btn-success" name="button" value="stop" type="submit">Stand</button>
	</form >


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>