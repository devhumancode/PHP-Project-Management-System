<? session_start ();
  if ($_SESSION['incurrect'] != 5)
  {
        header('location: login.php');
  }

              
?>