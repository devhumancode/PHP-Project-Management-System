<?php  
session_start ();
include ('userdizainas.php');
    
?>
<html>

<body class="body">
        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:95%;'>    

                <?php include ('gaunazinutes.php'); ?>
              </div> 
             

              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
                  <a href='naujas.php'>
                      <img src="../vaizdai/naujaz.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
                  </a>   
              </div>
        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
