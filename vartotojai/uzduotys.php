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
  width:95%;
  height:auto;
  text-align:center;
  margin:2.5%;
  background-color:white;
  float:left;
  border-radius:50px;
  border:2px solid black;
}

.tekstinedalis{
width:100%;

}

.virsus {
  padding-top:10px;
  padding-bottom:10px;
  width:80%;
  border-radius:20px;
  margin-left:10%;
  margin-top:15px;
  height:85px;
  background-color:black;
  color:white;
}

.ainfo {
  height:150px;
}

.uzduotys{
height:auto;
width:100%;
float:left;
margin-left:0%;
}

.zmoniu{
height:100px;

}
</style>

<body class="body">
  <div class='info' style='min-height:600px;'>
      <?php 
        $_SESSION['projektas']=0;
        $id = $_SESSION['id'];   
        include("duom.php");
        $teises= 0;

        $sql=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE VartotojoID='$id'");

        if($row=mysqli_fetch_array($sql)== false){
          echo "Currently you do not have any tasks assigned to you!";
         }

         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE VartotojoID='$id'");
        while($row=mysqli_fetch_array($sql))
        {
        

         $zmoniu=0;
         $projektas=$row['ProjektoID'];
         
        
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
                <div class='virsus' style="background: #002776;">
                  <b> <div class='tekstinedalis' ><?php 
                   echo "<h4>$pavadinimas</h4>";
                   echo $aprasymas;
                   ?> </div>
                  
                </div>
                   <hr style="border-top: 2px solid black;">
                <div class='ainfo'>
                       <?php 
                       }
                       ?>
     
                  
                 <div class='uzduotys' style='color:red !important;'>       
                      <form method=POST action='rodouzduotis2.php'>
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='3' name='veiksmas'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' name='reikiamas' value='<?php echo "$baigiasi task(s) that has to be completed today!";?>' style='background-color:white !important; color: red !important; border:none;'>   
                  </form> 
                  
                  <div class='uzduotys' style='color:orange !important;'>
                      <form method=POST action='rodouzduotis2.php'>
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='2' name='veiksmas'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' name='reikiamas' value='<?php echo "$laukia task(s) waiting for aproval.";?>' style='background-color:white !important; color: orange !important; border:none;'> 
                      </form>
                  </div>
                  
                  <div class='uzduotys' style='color:green !important;'>
                      <form method=POST action='rodouzduotis2.php'>                   
                      <input type='hidden' value='<?php echo $projektas; ?>' name='projektoid'>
                      <input type='hidden' value='1' name='veiksmas'>
                      <input type='hidden' value='<?php echo $teises; ?>' name='teises'>
                      <input type='submit' id='trinti' name='reikiamas' value='<?php echo "$uzduociu task(s) pending.";?>' style='background-color:white !important; color: green !important; border:none;'> 
                      </form>
                  </div>
                  
                  
                         
                  </div>
                      </b>  
                </div>
           </div>
    
      <?php 
        }       
      ?>
      <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '> 
     </div>
      
  </div>  
  
<?php 
 include ('copy.php');
?>
</body>
</html>