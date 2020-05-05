<?php    
session_start ();

 $Vardas = $_POST['vardas'];
 $Pavarde = $_POST['pavarde'];
 $Numeris = $_POST['numeris'];
 $slapyvardis = $_POST['slapyvardis'];
 $slaptazodis = $_POST['slaptazodis'];
 $pastas = $_POST['pastas'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");
$query = "SELECT * FROM  Prisijungimas WHERE id=\"$Id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE Prisijungimas SET `vardas` = '$Vardas', `pavarde` = '$Pavarde', `username` = '$slapyvardis', `password` = '$slaptazodis', `email` = '$pastas', `tel_nr` = '$Numeris'  WHERE id = $Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");

  
  
    
?>