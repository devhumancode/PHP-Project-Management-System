<?php
include ('adminapsauga.php');      
$_SESSION['bad']=0;
include ('userdizainas.php');
    
?>
<html>

<body class="body">
        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:95%;'>    
            <?php include('pradiniaidarbuotojai.php') ?>

             </div> 
             

              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
                  <a href='naujasdarbuotojas.php' alt="Add new staff">
                      <img src="vaizdai/naujasdarbuotojas.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
                  </a>   
              </div>
        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
