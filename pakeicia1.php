<?php
include ('adminapsauga.php');      
session_start ();

 $Vardas = $_POST['vardas'];
 $Pavarde = $_POST['pavarde'];
 $Numeris = $_POST['numeris'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");
$query = "SELECT * FROM  Prisijungimas WHERE id=\"$Id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE `webman_baig`.`Prisijungimas` SET `vardas` = '$Vardas', `pavarde` = '$Pavarde', `tel_nr` = '$Numeris'  WHERE `Prisijungimas`.`id` = $Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");

header('location: adarbuotojai.php');
  
  
    
?>