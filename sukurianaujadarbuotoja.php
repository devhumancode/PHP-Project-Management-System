<?php
session_start();
include ('adminapsauga.php'); 
include('duom.php');

$vardas=$_POST['vardas'];
$pavarde=$_POST['pavarde'];
$slapyvardis=$_POST['slapyvardis'];
$slaptazodis=$_POST['slaptazodis'];
$pastas=$_POST['pastas'];
$grupe=$_POST['grupe'];

$sql=mysqli_query($connection,"INSERT INTO `webman_baig`.`Prisijungimas` (`vardas`, `pavarde`, `tel_nr`, `username`, `password`, `email`, `class`, `id`, `prisijungimu`, `prisijungimo_data`) VALUES ('$vardas', '$pavarde', '888888888', '$slapyvardis', '$slaptazodis', '$pastas', '$grupe', NULL, '0', '0');");


header('location: darbuotojai.php');


?>