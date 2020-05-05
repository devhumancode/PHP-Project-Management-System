<?php
session_start();
include('duom.php');

$gavejas=$_POST['darbuotojoid'];
$svarba=$_POST['svarba'];
$data=$_POST['data'];
$tekstas=$_POST['tekstas'];
$kategorija=$_POST['kategorija'];
$sdata=date("Y-m-d");
$id=$_SESSION['id'];
$projektas=$_POST['projektas'];

echo $gavejas; ?><br><?php
echo $svarba;?><br><?php
echo $data;?><br><?php
echo $tekstas;?><br><?php
echo $kategorija;?><br><?php
echo $sdata;?><br><?php
echo $id;?><br><?php
echo $projektas;?><br><?php

$sql=mysqli_query($connection,"INSERT INTO ProjektuUzduotys (`ID`, `SukureID`, `ProjektoID`, `DarbuotojoID`, `Kategorija`, `Tekstas`, `Svarba`, `Busena`, `SukurimoData`, `BaigimoData`) VALUES (NULL, '$id', '$projektas', '$gavejas', '$kategorija', '$tekstas', '$svarba', '1', '$sdata', '$data');");

header ('location: projektai.php');
?>