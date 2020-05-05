<?php
session_start();
include ('userdizainas.php');

?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">


</head>
<style>
.projektas {
  width:300px;
  height:300px;
  text-align:center;
  margin:2.5%;
  background-color:white;
  float:left;
  border-radius:50px;
  border:2px solid black;
}

.virsus {
  margin-top:20px;
  height:80px;
}

.ainfo {
  height:150px;
}

.uzduotys{
height:50px;
width:30%;
float:left;
margin-left:3%;
}

.zmoniu{
height:100px;

}
</style>

<body class="body">


  
<?php      
  session_start();
 include ('skirtukas.php');
?>

  <div class='info' style='min-height:600px; height:auto;'>
      <?php 
        $_SESSION['projektas']=0;
        $id = $_SESSION['id'];   
        include("duom.php");
        $sql=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE VartotojoID='$id'");
        while($row=mysqli_fetch_array($sql))
        {
         $zmoniu=0;
         $projektas=$row['ProjektoID'];
         $teises=$row['Teises'];
        
        $sql2=mysqli_query($connection,"SELECT * FROM  Projektai WHERE ID='$projektas'");
        while($row2=mysqli_fetch_array($sql2))
        { 
        $aprasymas=$row2['Aprasymas'];
        $pavadinimas=$row2['Pavadinimas'];
        
        
        $sql3=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE ProjektoID='$projektas'");
        $zmoniu= mysqli_num_rows($sql3);
        
        if($teises==1)
        {
        $sql4=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND Busena!=2");
        $uzduociu = mysqli_num_rows($sql4);
        
        $sql5=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND Busena=0");
        $laukia = mysqli_num_rows($sql5);
        
        $data=date("Y-m-d");
        $sql6=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND BaigimoData='$data' AND Busena!=2");
        $baigiasi= mysqli_num_rows($sql6);
        }
        else
        { 
        $sql4=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND DarbuotojoID='$id' AND Busena!=2");
        $uzduociu = mysqli_num_rows($sql4);
        
        $sql5=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND DarbuotojoID='$id' AND Busena=0");
        $laukia = mysqli_num_rows($sql5);
        
        $data=date("Y-m-d");
        $sql6=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND DarbuotojoID='$id' AND BaigimoData='$data' AND Busena!=2");
        $baigiasi= mysqli_num_rows($sql6);
        }
         ?>
         
           <div class='projektas'>
                <div class='virsus'>
                  <b> <div class='tekstinedalis' style='width:200px; float:left;'><?php 
                   echo "<h4>$pavadinimas</h4>";
                   echo $aprasymas;
                   ?> </div>
                   <?php
                   if($teises==1)
                   {
                   ?><img src="../vaizdai/administrator.png" alt="grįžti" style="width:40px;height:40px; margin-right:10px; float:right; margin-top:30px;">  <?php
                   }
                   else
                   {
                   ?><img src="../vaizdai/worker.png" alt="grįžti" style="width:40px;height:40px; margin-right:10px; float:right; margin-top:30px;">  <?php
                   }
                   ?>
                  
                </div>
                   <hr style="border-top: 2px solid black;">
                <div class='ainfo'>
                  <div class='zmoniu'>
                      <?php echo "Projekte dalyvauja $zmoniu žmonės <br/>";
                      if($teises==1)
                      {
                      ?>
                      <form method=POST action='pnaujau.php' style='float:left; margin-left:40px;  margin-top:5px;'>
                      <input type='image' src='../vaizdai/newtask.png' value='<?php echo $projektas; ?>' name='projektas' style="width:40px; height:40px;">
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='submit' id='trinti' value='' hidden>
                       </form>
                       
                       
                      <form method=POST action='tvarkytidarb.php' style='float:left; margin-left:40px; margin-top:5px;'>
                      <input type='image' src='../vaizdai/adjustworkers.png' value='<?php echo $projektas; ?>' name='projektas' style="width:40px; height:40px;">
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='submit' id='trinti' value='' hidden>
                       </form>
                       
                       
                      <form method=POST action='projektoinfo.php' style='float:left; margin-left:40px; margin-top:5px;'>
                      <input type='image' src='../vaizdai/ieiti.png' value='<?php echo $projektas; ?>' name='projektas' style="width:40px; height:40px;">
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' value='' hidden>
                       </form>
                     <?php 
                      }
                      else
                      {
                      ?> 
                      <form method=POST action='pnaujau.php' style='float:left; margin-left:80px;  margin-top:5px;'>
                      <input type='image' src='../vaizdai/newtask.png' value='<?php echo $projektas; ?>' name='projektas' style="width:40px; height:40px;">
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='submit' id='trinti' value='' hidden>
                       </form>
                       
                       
                      <form method=POST action='projektoinfo.php' style='float:left; margin-left:40px; margin-top:5px;'>
                      <input type='image' src='../vaizdai/ieiti.png' value='<?php echo $projektas; ?>' name='projektas' style="width:40px; height:40px;">
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' value='' hidden>
                       </form>
                       <?php 
                       }
                       ?>
                    
                  </div>
                  
                  <div class='uzduotys' style='color:green;'>
                      <form method=POST action='rodouzduotis.php'>                   
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='1' name='veiksmas'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' name='reikiamas' value='<?php echo $uzduociu;?>' style='background-color:white; border:none;'> 
                      </form>
                  </div>
                  
                  <div class='uzduotys' style='color:orange;'>
                      <form method=POST action='rodouzduotis.php'>
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='2' name='veiksmas'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' name='reikiamas' value='<?php echo $laukia;?>' style='background-color:white; border:none;'> 
                      </form>
                  </div>
                  
                  <div class='uzduotys' style='color:red;'>       
                      <form method=POST action='rodouzduotis.php'>
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='3' name='veiksmas'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' name='reikiamas' value='<?php echo $baigiasi;?>' style='background-color:white; border:none;'>   
                      </form>
                      
                  </div>
                      </b>  
                </div>
           </div>
             
        <?php 
        }
        } 
                 
      ?>
      <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:150px; '> 
      </div>
  </div>  
  
<?php 
 include ('copy.php');
?>
</body>
</html>