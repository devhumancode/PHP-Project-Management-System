<?php
include ('adminapsauga.php');      
session_start ();

$siuntejas= $_SESSION['id'];   
$gavejas= $_POST['adresatas'];   
$tekstas= $_POST['tekstas'];

include('duom.php');
$sql=mysqli_query($connection,"INSERT INTO Zinutes(`Grupe`, `Sgrupe`, `Zinute`, `ID`) VALUES ('$gavejas', '$siuntejas', '$tekstas', NULL)");   


header ('location: zinutes.php');


?>