<?php   
session_start ();

 $pavadinimas = $_POST['pavadinimas'];
 $aprasymas = $_POST['aprasymas'];
 $deadline = $_POST['deadline'];
 $Id = $_POST['id'];
 
 
 
include("duom.php");
$query = "SELECT * FROM Projektai WHERE id=\"$Id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");

$query2 = "UPDATE Projektai SET `Pavadinimas` = '$pavadinimas', `Aprasymas` = '$aprasymas', `PabaigimoData` = '$deadline' WHERE ID = $Id;"; 
$result2 = mysqli_query($connection,$query2)
or die ("Negalima ivykdyti u˛klausos");
  
    
?>