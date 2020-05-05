<?php
include ('adminapsauga.php');      
session_start ();

 $Username = $_POST['username'];
 $Password = $_POST['password'];
 $Grupe = $_POST['group'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");
$connection = mysqli_connect($host,$user,$password)
or die ("Negalima prisijungti prie serverio");
$db = mysqli_select_db($database,$connection)
or die ("Nera duomenu bazes");
$query = "SELECT * FROM  Prisijungimas WHERE id=\"$id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE `webman_baig`.`Prisijungimas` SET `username` = '$Username', `password` = '$Password', `class` = '$Grupe' WHERE `Prisijungimas`.`id` = $Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");

header('location: adarbuotojai.php');
  
  
 echo $Id;     
?>