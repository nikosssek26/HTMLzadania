<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'test';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn)
    die("Brak połączenia do bazy");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Zapis do bazy</h1>
    <form method="get" action="zapis1.php">
        <p>Tekst: <input type="text" name="tekst" required></p>
        <p>A<input type="checkbox" name="poleA"></p>
        <p>B<input type="checkbox" name="poleB"></p>
        <p>C<input type="checkbox" name="poleC"></p>
        <p><input type="submit" value="Wyślij"></p>
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>