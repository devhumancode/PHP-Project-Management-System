<?php
include('duom.php');
$pavadinimas=$_POST['pavadinimas'];

$sql2=mysqli_query($connection,"SELECT * FROM Grupes");
while($row2=mysqli_fetch_array($sql2))
{
  $grupe=$row2['Grupe'];
}

$grupe=$grupe+1;



$sql=mysqli_query($connection,"INSERT INTO `webman_baig`.`Grupes` (`Grupe`, `Pavadinimas`, `ID`) VALUES ('$grupe', '$pavadinimas', NULL);");

header('location: keiciapareigas.php');
?>