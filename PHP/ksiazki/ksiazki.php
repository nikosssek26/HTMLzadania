<?php
require_once('config.php');

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(! $conn)
{
      die("Bład Połączenia do bazy danych"+$dbname);
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ksiazka</title>
  </head>
<body>
  <?php 
  $q= 'SELECT * FROM ksiazki';
  $wynik = mysqli_query($conn, $q);
  echo('<pre>');
  print_r($wynik); 
  echo('<pre>');
  echo(mysqli_num_rows($wynik).'<br>');
  while($w = mysqli_fetch_array($wynik))
  {
    echo("Nr:$w[id], Autor: $w[autor], Tytuł: $w[tytul].<br>");
  }
  ?>
</body>
</html>
<?php mysqli_close($conn); ?> 


