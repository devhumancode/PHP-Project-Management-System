<?php
session_start ();
$reikiamas=$_SESSION['trinafaila'];
unlink('../uploads/'.$reikiamas);
include ('duom.php');
$id= $_POST[id];
$sql=mysqli_query($connection,"DELETE FROM `webman_baig`.`Failai` WHERE `Failai`.`id` = '$id'");

header('location: showfile.php');
?>