<?php
include ('adminapsauga.php');      
session_start ();

 $Username = $_POST['username'];
 $Password = $_POST['password'];
 $Grupe = $_POST['group'];
 $Email = $_POST['email'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");

$query = "SELECT * FROM  Prisijungimas WHERE id=\"$Id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE `webman_baig`.`Prisijungimas` SET `username` = '$Username', `password` = '$Password', `class` = '$Grupe', `email` = '$Email' WHERE `Prisijungimas`.`id` = $Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");

header('location: adarbuotojai.php');
  
  
    
?>