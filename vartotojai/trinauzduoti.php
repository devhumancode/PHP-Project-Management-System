<?php

include ('duom.php');
$id= $_POST[id];
$sql=mysqli_query($connection,"DELETE FROM `webman_baig`.`Uzduotys` WHERE `Uzduotys`.`ID` = '$id'");

header('location: uzduotys.php');
?>