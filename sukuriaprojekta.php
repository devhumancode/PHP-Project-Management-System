<?php
session_start();
include ('duom.php');



$sql2=mysqli_query($connection,"SELECT * FROM Projektai");
while($row2=mysqli_fetch_array($sql2))
{
 $id=$row2['ID'];
}

$id=$id+1;

$pavadinimas=$_POST['pavadinimas'];
$tekstas=$_POST['tekstas'];
$adminoid=$_POST['adminoid'];
$data=date("Y-m-d");
$sql=mysqli_query($connection,"INSERT INTO `webman_baig`.`Projektai` (`ID`, `Pavadinimas`, `SukureID`, `Aprasymas`, `SukurimoData`, `PabaigimoData`) VALUES ($id, '$pavadinimas', '$adminoid', '$tekstas', '$data', '');");
  



 $sql3=mysqli_query($connection,"INSERT INTO ProjektuPrivilegijos (`ID`, `VartotojoID`, `ProjektoID`, `Teises`) VALUES (NULL, '$adminoid', '$id', '1');");


header('location: projektai.php');

?>