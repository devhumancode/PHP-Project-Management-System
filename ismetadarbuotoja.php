<?php

session_start();
include('duom.php');

$id=$_POST['darbuotojoid'];
$pid=$_POST['projektoid'];

$sql=mysqli_query($connection,"DELETE FROM ProjektuPrivilegijos WHERE VartotojoID = $id;");

$_SESSION['projektas']=$pid;


header('location: tvarkytidarb.php')

?>