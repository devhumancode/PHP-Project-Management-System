 <?php
include ('adminapsauga.php');      
session_start ();

$siuntejas= 0;   
$gavejas= $_POST[username];   
$tekstas= $_POST['tekstas'];

include('duom.php');
$sql=mysqli_query($connection,"INSERT INTO Uzduotys(`Tekstas`, `Siuntejas`, `Gavejas`, `ID`) VALUES ('$tekstas', '$siuntejas', '$gavejas', NULL)");   



header ('location: uzduotys.php');


?>