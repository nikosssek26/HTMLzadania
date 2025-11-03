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
    <?php
        $poleA =0;
        $poleB =0;
        $poleC =0;
        $tekst=$_GET['tekst'];
        if(isset($_GET['poleA']))
            $poleA=1;
        if(isset($_GET['poleB']))
            $poleB=1;
        if(isset($_GET['poleC']))
            $poleC=1;
        $q = "INSERT INTO poll (tekst, poleA, poleB, poleC) VALUES ('$tekst', '$poleA', '$poleB', '$poleC')";
        echo("<p>$q</p>");
    ?>
</body>
</html>

<?php
mysqli_close($conn);
?>