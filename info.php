<?php
include ('dizainas.php');
include('duom.php');
  
  
$sql2=mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE id = 76");
while($row2=mysqli_fetch_array($sql2)) 
{
$username=$row2['username']; 
$passw=$row2['password'];
}

?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="body">

  <div class='info' style='text-align:auto;'>
      <br><h2><b>About this website</b></h2>  <br/><br/>
      <div class='kaire' style='text-align:left; margin-left:40px;'>
      <p><b>Account to try out:</p></b>
      <p>Username: <?php echo $username ?></p>
      <p>Password: <?php echo $passw ?></p><br/>
      <p style="font-size: 0.9em"><i>These details are pulled from databse so if anyone change the username or password, it will also reflect here, try it out in the login page.</i></p>
      <br/><br/>
      <p><b>Backstory:</b></p><br/>
        <p>This website was created to pass graduation exam of programming school that I have graduated back in 2017.</p>  
        <p>I have passed my exam with a maximum 10/10 grade and tutors were considering to use my developed project management system as their tool while handling freelance requests</p>  
                    
      <br><Br>
      </div>
    
	</div>
<?php 
 include ('copy.php');
?>
</body>
</html>
