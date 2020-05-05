<?php
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
