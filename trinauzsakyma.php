<?php

include ('duom.php');
$id= $_POST[id];
$sql=mysqli_query($connection,"DELETE FROM `webman_baig`.`Uzklausos` WHERE `Uzklausos`.`ID` = '$id'");

header('location: uzsakymaiyra.php');
?>