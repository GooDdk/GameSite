<?php
	include('config.php')
?>

<html>
<head>
	<title>Login</title>
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
	session_start();
	if (@$_GET['msg']) {
		echo "Вы зарегистрированы";
	}
	// session_start();
	if (isset($_SESSION['authentication'])) {
		header('Location: admin.php');
	exit();
	}
	if (!empty($_POST['player']) && !empty($_POST['pass'])) {
		$player = htmlspecialchars(trim( $_POST['player']));
		$pass = htmlspecialchars(trim( $_POST['pass']));

		$salt = 'taiestisuvalinetekst';
		$kryp = crypt ($pass, $salt);  

		$paring = "SELECT * FROM  gamelogin WHERE player = '$player' AND pass = '$pass'";
		$output = mysqli_query ($connection, $paring);

		if (mysqli_num_rows($output)==1) {
			$_SESSION['authentication'] = $_POST['player'];
			header ('Location: admin.php');
		}else{
			echo "<div>Неправильный логин или пароль.</div>";
		}
	}
?>

	<section id="main">
		<header>Login</header>
		<form method="post" id="login-form">
			<p>
				<input type="text" name="player" value placeholder="Nickname" >
				<input type="password" name="pass" value placeholder="Password" >
			</p>
			<p>
				<button type="submit" name="submit">Login</button>
				|
			    <a href="registration.php">Registration</a>
			</p>
		</form>

	</section>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>