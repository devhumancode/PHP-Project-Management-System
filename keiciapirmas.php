<?php
include ('adminapsauga.php');      
session_start ();

 $vardas = $_POST['vardas'];
 $pavarde = $_POST['pavarde'];
 $numeris= $_POST['numeris'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");

$query = "SELECT * FROM  Prisijungimas WHERE id=\"$Id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE `webman_baig`.`Prisijungimas` SET `vardas` = '$vardas', `pavarde` = '$pavarde', `tel_nr` = '$numeris' WHERE `Prisijungimas`.`id` =$Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");

header('location: darbuotojai.php');
  
  
    
?>