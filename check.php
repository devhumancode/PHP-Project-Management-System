<? session_start ();
include 'duom.php';


$name = mysqli_real_escape_string($connection, $_POST['Username']);
$password =  mysqli_real_escape_string($connection, $_POST['Password']);


$result = mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE username = '$name' AND password = '$password'")
or die (mysqli_error($connection));
$count = (mysqli_num_rows($result));
$row = mysqli_fetch_array($result);


if($count == 1)
{
$_SESSION['id']=$row['id'];
$_SESSION['esamagrupe']=$row['class'];
$prisijungimas=$row['prisijungimu'] +1;
$id=$row['id'];
$data=date('Y-m-d');
$result = mysqli_query($connection,"UPDATE `webman_baig`.`Prisijungimas` SET `prisijungimu` = '$prisijungimas', `prisijungimo_data` = '$data' WHERE `Prisijungimas`.`id` = $id;");


  if ($row['class']==0)
  {
       $_SESSION['incurrect'] = 5;
        header('location: user.php');
        exit();
  }
  else
  {
      $_SESSION['incurrect'] = 0;
      header('location: vartotojai/user.php');
      exit();
  }
}
else
{
    $_SESSION['incurrect'] = $_SESSION['incurrect'] + 1;
    header('location: login.php');
    echo  $_SESSION['incurrect'];
    exit();
}              
?>