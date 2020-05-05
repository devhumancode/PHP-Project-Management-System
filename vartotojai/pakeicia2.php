<?php   
session_start ();

 $pavadinimas = $_POST['pavadinimas'];
 $aprasymas = $_POST['aprasymas'];
 $deadline = $_POST['deadline'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");
$connection = mysqli_connect($host,$user,$password)
or die ("Negalima prisijungti prie serverio");
$db = mysqli_select_db($database,$connection)
or die ("Nera duomenu bazes");
$query = "SELECT * FROM Projektai WHERE id=\"$Id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE Projektai SET `Pavadinimas` = '$pavadinimas', `Aprasymas` = '$aprasymas', `PabaigimoData` = '$deadline' WHERE ID = $Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");
  
    
?>