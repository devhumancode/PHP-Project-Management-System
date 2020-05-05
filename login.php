<?php
include ('dizainas.php');
session_start ();
?>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 <body class="body">
<?php
include("duom.php");
?>          
<?php
if($_SESSION['incurrect'] ==5)
{
$_SESSION['incurrect'] =0;
}


  if ($_SESSION['incurrect'] ==0) 
 {
?>
<div class='info'>
</br>
  <table width='100%' class="login-form">
    <form action ="check.php" method="POST">
          <td align='right' style='margin-right:30px;'>
             <label> Username </label> 
          </td>   
          <td align='left'>
             <input style='color:black;' type="text" value="" name="Username" size='20%'  required>
          </td></tr>
          <tr>
          <td align='right'>
            <label> Password: </label> 
          </td>
          <td align='left' margin-left='20px' margin-top='10px'>  
            <input style='color:black;' type="password" value="" name="Password" size='20%' color='black' required>
          </td></tr>
          </table>
          <input type="submit" id="submit" value="LOG IN" style="margin-top:10px; width:17%;">
         </br> <label style='color:#002776; margin-top:10px;'>Attempts remaining: <?php echo 3-$_SESSION['incurrect']; ?> </label> 
    </form>
  
</div>
<?php
 }
?>


<?php
  if ($_SESSION['incurrect'] > 0 && $_SESSION['incurrect'] < 3) 
 {
?>

<div class='info'>
</br>
<label style='color:red;'> You have entered wrong details! </label>

  <table width='100%' class="login-form">
    <form action ="check.php" method="POST">
          <td align='right' style='margin-right:30px;'>
             <label> Username: </label> 
          </td>   
          <td align='left'>
             <input type="text" value="" name="Username" size='20%' margin="20px;" required>
          </td></tr><tr>
          <td align='right'>
            <label> Password: </label> 
          </td>
          <td align='left' margin-left='20px'>  
            <input type="password" value="" name="Password" size='20%' required>
          </td></tr>
          </table>
          <input type="submit" id="submit" value="LOG IN">
          </br> <label style='color:#002776;'>Attempts remaining: <?php echo 3-$_SESSION['incurrect']; ?> </label> 
    </form>
  
</div>

<?php
}

 if ($_SESSION['incurrect'] == 3 ) 
 {

?>
  
  
<div class='info'>
</br>
<label style='color:red;'>Sorry, not happening today :)</label>
</br>
<img src="https://media.giphy.com/media/COAg7vjpWW8Ja/giphy.gif" alt="cya" style="width:304px;height:228px;">

        
  
</div>
  
<?php

}

include ('copy.php');
?>


</body>

</html>

