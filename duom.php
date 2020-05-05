<?php
// $user = "webman_baig";
// $host = "localhost";
// $password = "Drugs4life";
// $database = "webman_baig";


// $connection = mysql_connect($host,$user,$password)
// or die ("Negalima prisijungti prie serverio");
// $db = mysql_select_db($database,$connection)
// or die ("Nera duomenu bazes");

//  mysql_set_charset ('utf8');

$host= 'localhost';
$user = 'root';
$password= '';
$database = 'webman_baig';


$connection = mysqli_connect('localhost',$user,$password)
or die ("Issue occured when attempting to connect to the server");

$db = mysqli_select_db($connection,$database)
or die ("Database is unreachable at the time");


//$db = new mysqli ('localhost', $user, $pass, $database) or die("wwazafack");

?>
