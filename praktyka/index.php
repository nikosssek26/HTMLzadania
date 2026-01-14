<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGOWANIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&family=Metal+Mania&family=Atkinson+Hyperlegible+Mono:wght@400;700&display=swap">
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="vignette"></div>
    
    <div id="beforelogin" class="login-container">
        <div id="loginform"></div>
        <div class="form-wrapper font3">
            <p class="text-center fs-3">Welcome User!</p>
            <form method="post" action="./logowanie.php">
                <div class="mb-3">
                    <label for="Login1" class="form-label">Login:</label>
                    <input type="text" class="form-control" id="Login1" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="pass1" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pass1" name="haslo" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-light mt-2">Submit</button>
                </div>
            </form>
            <?php
			if(isset($_SESSION['komunikat']))
			{
				echo("<h1>BŁĄD<h1>");
				echo("<h2>$_SESSION[komunikat]</h2>");
				unset($_SESSION['komunikat']);
			}
			?>
        </div>
    </div>
</body>
</html>