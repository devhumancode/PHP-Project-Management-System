<?php
session_start();
session_destroy();

session_start();
$_SESSION['incurrect'] =0;
header('location: ../login.php');



?>