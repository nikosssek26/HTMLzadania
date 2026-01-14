<?php
session_start();
require_once('config.php');

if (isset($_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmNewPassword'], $_POST['currentlogin'])) {
    
    $haslo = $_POST['currentPassword'];
    $haslo_new = $_POST['newPassword'];
    $haslo_confirm = $_POST['confirmNewPassword'];
    $login = $_POST['currentlogin'];
    $login_escaped = mysqli_real_escape_string($conn, $login);
    
    $e = "SELECT password FROM users WHERE login='$login_escaped'";
    $wynik = mysqli_query($conn, $e);

    if ($wynik && mysqli_num_rows($wynik) > 0) {
        $w = mysqli_fetch_assoc($wynik);

        if ($haslo === $w['password']) {
            if ($haslo_new === $haslo_confirm) {
                
                $haslo_new_escaped = mysqli_real_escape_string($conn, $haslo_new);
                $sql = "UPDATE users SET password='$haslo_new_escaped' WHERE login='$login_escaped'";
                
                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Hasło zostało pomyślnie zmienione.")</script>';
                } else {
                    echo '<script>alert("Błąd bazy danych podczas aktualizacji.")</script>';
                }
            } else {
                echo '<script>alert("Hasła nie są identyczne")</script>';
            }
        } else {
            echo '<script>alert("Obecne hasło jest nieprawidłowe")</script>';
        }
    } else {
        echo '<script>alert("Nie znaleziono użytkownika w bazie.")</script>';
    }
} else {
    echo '<script>alert("Formularz nie został poprawnie przesłany.")</script>';
}

mysqli_close($conn);

header("Location: glowny.php");
exit();
?>