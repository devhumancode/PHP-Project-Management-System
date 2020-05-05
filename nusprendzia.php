<?php
session_start();
include ('duom.php');

$pasirinkimas=$_POST['pasirinkimas'];
$uid=$_POST['uid'];
$tekstas=$_POST['tekstas'];
$data=date("Y-m-d");

$sql=mysqli_query($connection,"SELECT * FROM ProjektuUzduotys WHERE ID=$uid;");
while($row=mysqli_fetch_array($sql))
{
   $siuntejas=$_SESSION['id'];
   $gavejas=$row['SukureID'];
}


if($pasirinkimas==0)
{
$sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET  `AtsakymoTekstas` = '$tekstas', `BaigimoData` = '$data',  `Busena` = '2' WHERE `ProjektuUzduotys`.`ID` = $uid;");
header('location: projektai.php');
}
else
{
$sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET  `AtsakymoTekstas` = '$tekstas',  `SukureID` = '$siuntejas', `DarbuotojoID` = '$gavejas', `Busena` = '1' WHERE `ProjektuUzduotys`.`ID` = $uid;");
header('location: projektai.php');
}




?>