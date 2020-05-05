<?php
include ('duom.php');
session_start ();

$vardas=mysqli_real_escape_string($connection,$_POST['vardas']);
$pavarde=mysqli_real_escape_string($connection,$_POST['pavarde']);
$slapyvardis=mysqli_real_escape_string($connection,$_POST['slapyvardis']);
$slaptazodis=mysqli_real_escape_string($connection,$_POST['slaptazodis']);
$pastas=mysqli_real_escape_string($connection,$_POST['pastas']);
$grupe=mysqli_real_escape_string($connection,$_POST['grupe']);


$result = mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE username = '$vardas' AND password = '$pavarde'")
or die (mysqli_error());


$count = (mysqli_num_rows($result));
$row = mysqli_fetch_array($result);


if ($count==0)
{
    $_SESSION['bad'] = 0;
    $sql=mysqli_query($connection,"INSERT INTO `webman_baig`.`Prisijungimas` (`vardas`, `pavarde`, `tel_nr`, `username`, `password`, `email`, `class`, `foto`, `id`, `prisijungimu`, `prisijungimo_data`) VALUES ('$vardas', '$pavarde', '888888888', '$slapyvardis', '$slaptazodis', '$pastas', '$grupe', './vaizdai/worker.png', NULL, '0', '0');");
    header('location: darbuotojai.php');
    exit();
}          
else
{
    $_SESSION['bad'] = 1;
    header('location: naujasdarbuotojas.php'); 
    exit();
}

?>