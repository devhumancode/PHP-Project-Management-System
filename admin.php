<?php
include ('adminapsauga.php');      
include ('userdizainas.php');  
header ('location: user.php');
?>
<html>
<body class="body">

  
<?php 
 include ('skirtukas.php');
?>
        <div class='info' style='height:800px;'>         
              <div class='kairys'>
                  <?php include('clock.php'); ?>
                  <br>
                        <?php 
                        echo date("Y/m/d");
                        echo $_SESSION['id'];
                        ?>
                        
                        <br><br>

              </div>
              
              <div class='desinys'>
                                         <?php 
            
                        echo $_SESSION['id'];
                        ?>
               
               
              </div>  
        </div>
<?php 
 include ('copy.php');
?>
</body>
</html>