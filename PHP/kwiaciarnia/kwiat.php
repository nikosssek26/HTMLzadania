<?php
$q = mysqli_connect("localhost", "root", "", "komis");
if (!$q) die("Błąd Połączenia do bazy dancyh");
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kwiaciarnia</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
	<header>
		<nav class="navbar navbar-expand-md bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="img/brand.png" alt="kwiaciarnia" width="30" height="24">
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="#">Strona główna</a>
				</li>

				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Nasze kwiaty
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">róże</a></li>
					<li><a class="dropdown-item" href="#">tulipany</a></li>
					<li><a class="dropdown-item" href="#">godziki</a></li>
				  </ul>
				</li>

				<li class="nav-item">
				  <a class="nav-link"  href="#">O kwiaciarni</a>
				</li>
			  </ul>
			 
			</div>
		  </div>
		</nav>
	</header>  
	<main>
	
		<div class="container text-center">
		  <?php 
		  echo('<div class="row">');
			$id = $_GET['id'];
			$p = "SELECT * FROM kwiaty WHERE id=\"$id\"";
			$wynik = mysqli_query($q, $p);
			$w= mysqli_fetch_assoc($wynik);
			$nazwa = $w['nazwa'];
			echo('<h1><p class="nazwa">'.$nazwa.'</p></h1>');
			echo('<p class="cena">Cena: '.$w['cena'].'zł</p>');
			echo('<p class="opis">Opis: '.$w['opis'].'</p>');
			echo('<img style="height:500px; width:800px;" class="img-fluid mx-auto d-block"" src="img/'.$w['foto'].'" 
					alt="'.$nazwa.'"><br>');
		  echo('</div>')
		  ?>
		  <a href="index.php"><button class="bg-light rounded">Back</button></a>
		</div>  
  
  
	</main>
  	
	<footer class="border">
		strona wykonana przez mm, 2022
	</footer>
	
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($q);
?>
