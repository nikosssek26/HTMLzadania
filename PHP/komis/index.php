<?php
$q = mysqli_connect("localhost", "root", "", "komis");
if (!$q) die("Błąd Połączenia do bazy dancyh");
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
	<header>
		<nav class="navbar navbar-expand-md bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="img/brand.png" alt="Komis" width="30" height="24">
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
					Typ auta
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">kupe</a></li>
					<li><a class="dropdown-item" href="#">sedes</a></li>
					<li><a class="dropdown-item" href="#">kombi</a></li>
				  </ul>
				</li>

				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Marki
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">Fiat</a></li>
					<li><a class="dropdown-item" href="#">Ford</a></li>
					<li><a class="dropdown-item" href="#">Folkswagen</a></li>
				  </ul>
				</li>
				<li class="nav-item">
				  <a class="nav-link"  href="#">O firmie</a>
				</li>
			  </ul>
			  <form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Szukaj</button>
			  </form>
			</div>
		  </div>
		</nav>
	</header>  
	<main>
	
		<div class="container text-center">

		  <div class="row">
		  
			<div class="col d-block mx-auto">
<?-- karuzela głónwa --?>
			  
				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
				  <div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
				  </div>
				  <div class="carousel-inner">
					<div class="carousel-item active">
					  <img src="img/kc.png" class="d-block w-100" alt="czerwona">
					  <div class="carousel-caption d-none d-md-block">
						<h5>Czerwone auto</h5>
						<p>to jest przepiękne i funkcjonalne czerwone auto!<br>Okazja!</p>
					  </div>
					</div>
					<div class="carousel-item">
					  <img src="img/kz.png" class="d-block w-100" alt="zielone">
					  <div class="carousel-caption d-none d-md-block">
						<h5>Zielone autko</h5>
						<p>super pro eko zielone autko<br>musisz go mieć</p>
					  </div>
					</div>
					<div class="carousel-item">
					  <img src="img/kn.png" class="d-block w-100" alt="niebieskie">
					  <div class="carousel-caption d-none d-md-block">
						<h5>TNiebieskie autko</h5>
						<p>poczujesz sie w nim bosko...<br>specjalnie dla Ciebie</p>
					  </div>
					</div>
				  </div>
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				  </button>
				</div>			  
			  
			  
			  
			</div>

		  </div>
<?-- obrazki na dole --?> 
			<div class="row">
				<div>
					<h1>Promowane oferty</h1>
				</div>
			</div>
			
		  <div class="row">
		  <?php 
			$p = "SELECT * FROM auta WHERE czyPromowane=1";
			$wynik = mysqli_query($q, $p);
			while($w = mysqli_fetch_assoc($wynik))
			{
			echo('<div class="col-sm-6 col-md-4">');
			  echo('<a href="auto.php?id='.$w['id'].'">');
			  $nazwa = $w['marka'].' '.$w['model'];
				echo('<img class="img-fluid" src="img/'.$w['foto'].'" 
					alt="'.$nazwa.'"><br>');
				echo('<p class="nazwa">'.$nazwa.'</p>');
			  echo('</a>');
			  echo('<p class="cena">'.$w['cena'].'</p>');
			echo('</div>');
			}
		  ?>

		  </div>
		</div>  
  
  
	</main>
  	
	<footer class="border">
		strona wykonana przez mm, 2022
	</footer>
	
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
<?php
mysqli_close($q);
?>
</html>

