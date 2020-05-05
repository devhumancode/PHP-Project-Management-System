<?php    
session_start ();
include ('userdizainas.php');
    
?>
<html>

<body class="body">

  
<?php 
 include ('skirtukas.php');
?>
        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:100%;'>    
            <?php include('profilioinfo.php') ?>
                     
             </div> 
             

              <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '> 
     
              </div>
        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
