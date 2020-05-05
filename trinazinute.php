<?php

include ('duom.php');
$id= $_POST[id];
$sql=mysqli_query($connection,"DELETE FROM `webman_baig`.`Zinutes` WHERE `Zinutes`.`ID` = '$id'");

header('location: zinutes.php');
?>