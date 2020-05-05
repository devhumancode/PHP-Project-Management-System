<?php
include ('duom.php');

$vardas=$_POST['vardas'];
$pavarde=$_POST['pavarde'];
$numeris=$_POST['telefonas'];
$email=$_POST['email'];
$sritis=$_POST['sritis'];
$tekstas=$_POST['tekstas'];

$sql=mysql_query("INSERT INTO `webman_baig`.`Uzklausos` (`ID`, `Vardas`, `Pavarde`, `Telefonas`, `Email`, `Sritis`, `Tekstas`) VALUES (NULL, '$vardas', '$pavarde', '$numeris', '$email', '$sritis', '$tekstas');");

header('location: index.php');

?>