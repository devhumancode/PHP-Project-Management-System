<? session_start ();
include 'duom.php';
$connection = mysqli_connect($host,$user,$password)
or die ("Negalima prisijungti prie serverio");
$db = mysqli_select_db($database,$connection)
or die ("Nera duomenu bazes");


$name = mysqli_real_escape_string($_POST['Username']);
$password =  mysqli_real_escape_string($_POST['Password']);


$result = mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE username = '$name' AND password = '$password'")
or die (mysqli_error());
$count = (mysqli_num_rows($result));
$row = mysqli_fetch_array($result);

$_SESSION['id']=$row['id'];

if ($count==0)
{

    $_SESSION['incurrect'] = $_SESSION['incurrect'] + 1;
    header('location: login.php');
    echo  $_SESSION['incurrect'];
    exit();
}          
else
{
  if ($row['class']==0)
  {
       $_SESSION['incurrect'] = 5;
        header('location: admin.php');
        exit();
  }
  else
  {
      $_SESSION['admin'] = $row[0];
      $_SESSION['incurrect'] = 0;
      header('location: index.php');
      exit();
  }
exit();
}              
?>