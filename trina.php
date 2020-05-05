<?php
include ('duom.php');
$id=$_POST['id'];
$sql=mysqli_query($connection,"DELETE FROM `webman_baig`.`Prisijungimas` WHERE `Prisijungimas`.`id` = '$id'");

header('location: darbuotojai.php');
?>