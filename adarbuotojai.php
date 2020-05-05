<?php
include ('adminapsauga.php');      
$_SESSION['bad']=0;
include ('userdizainas.php');
$id=$_POST['id'];
$vardas=$_POST['vardas'];
$pavarde=$_POST['pavarde'];    
?>
<html>

<body class="body">

        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:95%;'>    
                </br>           
                <?php include('random.php'); echo $id; ?>
                </br>

                  <a href='darbuotojai.php'>
                      <img src="vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; position:center; margin-top:20x; margin-bottom:20px; margin-left:5%;">
                  </a>   

             </div> 
             

        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
