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

php?>          


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
  <table width='100%'>
    <form action ="check.php" method="POST">
          <td></td>
          <td align='right' style='margin-right:30px;'>
             <label> Prisijungimo vardas : </label> 
          </td>   
          <td align='left'>
             <input style='color:black;' type="text" value="" name="Username" size='20%' required>
          </td></tr>
          <tr><td></td>  
          <td align='right'>
            <label> Slaptažodis : </label> 
          </td>
          <td align='left' margin-left='20px' margin-top='10px'>  
            <input style='color:black;' type="password" value="" name="Password" size='20%' color='black' required>
          </td></tr>
          </table>
          <input type="submit" id="submit" value="Prisijungti" style="margin-top:10px; width:17%;">
         </br> <label style='color:white; margin-top:10px;'>Liko bandymų : <?php echo 3-$_SESSION['incurrect']; ?> </label> 
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
<label style='color:red;'> NETEISINGAI </label>

  <table width='100%'>
    <form action ="check.php" method="POST">
          <td></td>
          <td align='right' style='margin-right:30px;'>
             <label> Prisijungimo vardas : </label> 
          </td>   
          <td align='left'>
             <input type="text" value="" name="Username" size='20%' margin="20px;" required>
          </td></tr><tr><td></td>  
          <td align='right'>
            <label> Slaptažodis : </label> 
          </td>
          <td align='left' margin-left='20px'>  
            <input type="password" value="" name="Password" size='20%' required>
          </td></tr>
          </table>
          <input type="submit" id="submit" value="LOGIN">
          </br> <label style='color:white;'>Liko bandymų : <?php echo 3-$_SESSION['incurrect']; ?> </label> 
    </form>
  
</div>

<?php
}

 if ($_SESSION['incurrect'] == 3 ) 
 {
 echo  $_SESSION['incurrect'];
?>
  
  
<div class='info'>
</br>
<label style='color:red;'> O dabar bus problemų ;) </label>
</br>
<img src="http://33.media.tumblr.com/tumblr_m6fu7f0oe31rwcc6bo1_500.gif" alt="užsirovei" style="width:304px;height:228px;">

        
  
</div>
  
<?php

}

include ('copy.php');
?>


</body>

</html>

