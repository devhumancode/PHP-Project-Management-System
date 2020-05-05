<?php
session_start();
include('duom.php');

$id=$_POST['darbuotojoid'];
$pid=$_POST['projektoid'];

$sql=mysqli_query($connection,"INSERT INTO `webman_baig`.`ProjektuPrivilegijos` (`ID`, `VartotojoID`, `ProjektoID`, `Teises`) VALUES (NULL, '$id', '$pid', '0');");

$_SESSION['projektas']=$pid;

// header('location: tvarkytidarb.php')

?>