<?php 
	include('config.php'); 
?>

<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/Main.css">
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
								<h1><a>Gamer</a></h1>
								<p>Games are our passion!</p>
							</div>

						</div>

					</div>

				</div>
					<div id="navbarCollapse" class="collapse navbar-collapse navbar-right">
                    </div>
				</div>
			</nav>

		</div>
	</div>

<?php
	if (@$_GET['msg']) {
		echo "Вы зарегистрированы";
	}
	if (isset($_SESSION['authentication'])) {
		header('Location: admin.php');
		exit();
	}
	if (!empty($_POST['player']) && !empty($_POST['pass'])) {
		$player = htmlspecialchars(trim($_POST['player']));
		$pass = htmlspecialchars(trim($_POST['pass']));
		$pass2 = htmlspecialchars(trim($_POST['pass2']));
		
		if (strlen($pass) < 6) {
			echo "Пароль должен быть не менее 6 символов";
		} else {
			if ($pass != $pass2) {
				echo "Пароли не совпадают";
			} else {
				$salt = 'taiestisuvalinetekst';
				$kryp = $pass;				
				$output = mysqli_query ($connection, "select * from gamelogin where player = '{$player}'");			
				if (mysqli_num_rows($output) > 0) {
					echo "такой логин уже есть";
				} else {
					$paring = "insert into gamelogin set player='$player', pass='$kryp'";
					$output = mysqli_query ($connection, $paring);
					if (mysqli_affected_rows($connection)==1) {
						header('Location: login.php?msg=ok');
					} else {
						echo "неправильный логин или пароль";
					}
				}
			}
		}
	}  
?>

	<section id="main">
		<header>Registration</header>
		<form method="post" id="login-form">
			<p>
				<input type="text" name="player" value placeholder="Nickname" >
				<input type="password" name="pass" value placeholder="Password" >
				<input type="password" name="pass2" value placeholder="Confirm Password" >
			</p>
			<p>
				<br>
				<button type="submit" name="submit">Registration</button>
				|
				<a href="login.php">Login</a>
			</p>
		</form>

	</section>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>