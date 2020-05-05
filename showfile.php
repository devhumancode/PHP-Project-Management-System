<?php     
session_start ();
$_SESSION['bad']=0;
include ('userdizainas.php');
    
?>


<body class="body">
          
        <div class='info' style='height:auto; text-align:center;'>         

              
              <div class='desinys' style='width:100%;'> 
              </br>   
                  <?php include ('failiukai.php'); ?>
              </div> 
             
  

              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
                  <a href='files.php'>
                      <img src="../vaizdai/prideti.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
                  </a>   
              </div>
        </div>


        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
