<?php
session_start();
require_once('config.php');

if(!isset($_POST['login']) || !isset($_POST['haslo'])) {
    header('location:index.php');
    exit();
}

$login = $_POST['login'];
$haslo = $_POST['haslo'];

$login = mysqli_real_escape_string($conn, $login);

$e = "SELECT * FROM users WHERE login='$login'";
$wynik = mysqli_query($conn, $e);

if(mysqli_num_rows($wynik) == 0) {
    $_SESSION['komunikat'] = "Błędny login lub hasło";
    header('Location: index.php');
    exit();
}

$w = mysqli_fetch_assoc($wynik);

if($haslo == $w['password']) {
    $_SESSION['czyZalogowany'] = $login;
    header('Location: glowny.php');
} else {
    $_SESSION['komunikat'] = "Błędny login lub hasło";
    header('Location: index.php');
}

mysqli_close($conn);
?>