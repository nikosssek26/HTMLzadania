<?php
require_once('config.php');

if(!isset($_POST['login']	))
{
	header('location:index.php');
	exit();
}

$login = $_POST['login'];
$haslo = $_POST['haslo'];

$e = "SELECT * FROM formularz WHERE login='$login'";
$wynik = mysqli_query($conn, $e);
	mysqli_close($conn);

	if(mysqli_num_rows($wynik) == 0)
	{
	    header('Location: index.php');
	    //echo("brak loginu");
	    exit();	
	}
	$w = mysqli_fetch_assoc($wynik);
	if($haslo == $w['haslo'])
	{
	   header('Location: glowna.php');
	   // echo("hhasło ok");
	}
	else
	{
	   header('Location: index.php');
	   //echo("hhasło złe");
	}
?>

