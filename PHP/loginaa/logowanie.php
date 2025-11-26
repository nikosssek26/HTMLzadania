<?php
session_start();

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
	    $_SESSION['komunikat'] = "błędny login lub hasło";
	    exit();	
	}
	$w = mysqli_fetch_assoc($wynik);
	if($haslo == $w['haslo'])
	{
	   	$_SESSION['czyZalogowany'] = $login;
		header('Location: glowny.php');
	}
	else
	{
	   header('Location: index.php');
	}
?>

