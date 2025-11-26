<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body> 
	<main>

		<div class="row">
		  	<form method="post" action="./logowanie.php">
			  	<div class="container bg-light rounded mx-auto text-center m-5 p-5">
    				<label for="uname"><b>Login:</b></label>
    				<input class="rounded" type="text" placeholder="Wprowadz Login" name="login" required>

    				<br><br><label for="psw"><b>Haslo:</b></label>
    				<input class="rounded" type="password" placeholder="Wprowadz Haslo" name="haslo" required>

    				<br><br><button class="rounded" type="submit">Login</button>
  				</div>
			</form>
		</div>

	</main>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

