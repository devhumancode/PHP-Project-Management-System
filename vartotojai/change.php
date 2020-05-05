<?php
include ('adminapsauga.php');      
session_start ();
include ('adizainas.php');
    
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="astyle.css">
</head>
<body class="body">
<?php
$id = $_POST[id];
include("duom.php");
$connection = mysqli_connect($host,$user,$password)
or die ("Negalima prisijungti prie serverio");
$db = mysqli_select_db($database,$connection)
or die ("Nera duomenu bazes");
$query = "SELECT * FROM  Prisijungimas WHERE id=\"$id\""; 
$result = mysqli_query($connection,$query)
or die ("Negalima ivykdyti u˛klausos");


echo "
<table cellspacing='5' border='1' cellpadding='0'
width='50%' 
style='color:black; text-align:left;'>
";   
           
echo "<td><h1> - Id yra : $id </h1> ";                                 
?><form method="POST" action="keicia.php">

<table style="width:98%; margin-left:2%; margin-top:2%;">
  <tr>
    <th>Vartotojo vardas</th>
    <th>Slaptažodis</th> 
    <th>Grupė</th>
    <th>Numeris</th>
    <th>Patvirtinti</th>
  </tr>
<?php
while ($row = mysqli_fetch_array($result,mysqli_ASSOC))
{

$Username = $row['username'];
$Password = $row['password'];
$Grupe = $row['class'];
$Id = $row['id'];

echo " 
<tr>
 <td> $Username </td>
 <td> $Password </td>
 <td> $Grupe </td>
 <td> $Id </td>
</tr>";
}

echo "<tr>
      <td><input type='text' name='username' value='$Username'></td>
      <td><input type='text' name='password' value='$Password'></td>
      <td><input type='text' name='group' value='$Grupe'></td>
      <td> $Id <input type='text' name='id' value='$Id' hidden></td>
      <td><input type='submit' name='redaguoja' value='Patvirtinti' style='color:black;'>
      <input type='text' name='id' value=$Id hidden></td>
      </tr>    "
?>    
    </form>

  </body>
</html>