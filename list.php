<?php
include ('config.php');
?>

<?php
session_start();
if (!isset($_SESSION['authentication'])) {
	header('Location: login.php');
	print "You: ".$_SESSION['authentication']. "<br>";
}
?>

<?php
$checkSQL=mysqli_query($connection, "SELECT id, player, score FROM `gamelogin`");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['postdata'] = $_POST;
  unset($_POST);
  header("Location: ".$_SERVER['PHP_SELF']);
  exit;
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-acale=1">
	<title>Player List</title>
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
							<li> <a href="admin.php">Game list</a> </li>
							<li class="active"> <a href="logout.php">Logout</a> </li>
						</ul>


					</div>
				</div>
			</nav>

		</div>
	</div>


	<h2 style="font-size: 40px;">Player List</h2>
	<p style="font-size: 20px;">
		<?php
			print "You: ".$_SESSION['authentication']. "<br>";
		?>
	</p>
	<hr>
	<div class="container-fluid p-5">
		 <div class="row p-4">
			<div class="col-md-8 pt-2 pb-2">
				<table class="table">
				<thead>
					<tr>
					<th scope="col">Player</th>
					<th scope="col">Score</th>
					</tr>
				</thead>
				<?php
				while($str= mysqli_fetch_array($checkSQL))
				{	
				echo'<tbody>
					<tr>
					  <td>'.$str['player'].'</td>
					  <td>'.$str['score'].'</td>
					</tr>
				</tbody>';
				}
				?>
				</table>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>