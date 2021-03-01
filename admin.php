<?php
session_start();
if (!isset($_SESSION['authentication'])) {
	header('Location: login.php');
	print "You: ".$_SESSION['authentication']. "<br>";
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-acale=1">
	<title>Game List</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>


	<div class="container-fluid">
		<div class="row">

			<nav role="navigation" class="navbar navbar-inverse">
				<div class="conteiner">
					
				<div class="navbar-header header">

					<div class="conteiner">

						<div class="row">

							<div class="col-lg-12">
								<h1><a href="admin.php">Gamer</a></h1>
								<p>Games are our passion!</p>
							</div>

						</div>

					</div>

				</div>
					<div id="navbarCollapse" class="collapse navbar-collapse navbar-right">

						<ul class="nav nav-pills">
							<li> <a href="list.php">List player</a> </li>
							<li class="active"> <a href="logout.php">Logout</a> </li>
						</ul>


					</div>
				</div>
			</nav>

		</div>
	</div>


	<h2 style="font-size: 40px;">Game List</h2>
	<hr>

	<div class="row">
		<div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<a href="Ark_Game.html"><img src="assets/img/Arkanoid.jpg" width="300" height="400" alt="Arkanoid"></a>
			<div class="film_label"><a href="Ark_Game.html" style="font-weight: 900; color: #dad7d5;">PLAY</a></div>
		</div>

		<div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<a href="Z_Game.html"><img src="assets/img/Snake.jpg" width="300" height="400" alt="Snake"></a>
			<div class="film_label"><a href="Z_Game.html" style="font-weight: 900; color: #dad7d5;">PLAY</a></div>
		</div>

		<div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<a href="XO_Game.html"><img src="assets/img/Tictactoe.jpg" width="300" height="400" alt="Tic tac toe"></a>
			<div class="film_label"><a href="XO_Game.html" style="font-weight: 900; color: #dad7d5;">PLAY</a></div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>