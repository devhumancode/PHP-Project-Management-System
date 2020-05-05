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
@media screen and (min-width: 820px) {
.{}

.darbuotojusarasas {
background-color:black; 
color:white; 
margin-top:2%; 
width:40%; 
height:600px; 
overflow-y:scroll; 
text-align:center; 
float:right; 
margin-right:10px; 
margin-bottom:20px;
border-radius:20px;
}

}
@media screen and (max-width: 819px) {
.{}

.darbuotojusarasas {
background-color:black; 
color:white; 
margin-top:2%; 
width:80%; 
height:400px; 
overflow-y:scroll; 
text-align:center; 
float:right; 
margin-right:10%; 
margin-bottom:10px;
border-radius:20px;
}

}
</style>


<body class="body">


  
<?php      
 include("duom.php"); 
 $belekas=$_SESSION['projektas'];
 if($belekas==0)
 {
 $projektoid=$_POST['projektoid']; 
 }
 else
 {
 $projektoid=$_SESSION['projektas'];
 }
 include ('skirtukas.php');
?>

  <div class='info' style='height:600px;'>
      <div class='desinys' style='text-align:left; width:100%;'>
              
        <div class='informacija' style='margin-right:5%; margin-top:2%;'>

          <div class='darbuotojusarasas' >
             
             <br><b>Darbuotojai, priklausantys šiam projektui : </b><br><br>
            <?php
            
              $mano=$_SESSION['id']; 
              $sql2=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE ProjektoID='$projektoid'"); 
              while($row2=mysqli_fetch_array($sql2)) 
              { 
              $darbuotojoid=$row2['VartotojoID'];
              
              
              
              $sql3=mysqli_query($connection,"SELECT * FROM `Prisijungimas` WHERE id=$darbuotojoid AND id!=$mano"); 
              while($row3=mysqli_fetch_array($sql3)) 
              { 
              $klase=$row3['class'];
              $vardas=$row3['vardas'];
              $pavarde=$row3['pavarde'];   
              $dalyvis="$vardas $pavarde";
             
              $sql4=mysqli_query($connection,"SELECT * FROM `Grupes` WHERE Grupe=$klase"); 
              while($row4=mysqli_fetch_array($sql4)) 
              {
              $grupe=$row4['Pavadinimas'];
              }
                ?>
                
                <?php echo "<b>$grupe</b> $vardas $pavarde" ;?>
                     <form action = "ismetadarbuotoja.php" method = "POST" style='background-color:white; margin-top:-28px; height:40px; width:40px; margin-left:30px; border-radius:25px; text-align:center;'>
                         <input type='image' src='../vaizdai/kickout.png' style="width:30px; height:30px; margin-left:4px; margin-bottom:2px;">
                         <input type='hidden' value='<?php echo $projektoid; ?>' name='projektoid'>
                         <input type='hidden' value='<?php echo $darbuotojoid; ?>' name='darbuotojoid'>
                         <input type='submit' id='trinti' value='' hidden>
                     </form> 
                  <br>
                <?php
              }  
              }
            
                       
            ?>       
         </div>
         
          <div class='darbuotojusarasas' style='float:left; margin-left:5%;' >  
             
             <br><b>Darbuotojai, nepriklausantys šiam projektui : </b><br><br>
            <?php
            
              include("duom.php"); 
             $belekas=$_SESSION['projektas'];
             if($belekas==0)
             {
             $projektoid=$_POST['projektoid']; 
             }
             else
             {
             $projektoid=$_SESSION['projektas'];
             }
              
              $mano=$_SESSION['id']; 
              $sql5=mysqli_query($connection,"SELECT * FROM `Prisijungimas` WHERE id != $mano"); 
              while($row5=mysqli_fetch_array($sql5)) 
              { 
              $galimas=$row5['id'];
              
              $sql2=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE VartotojoID='$galimas' AND ProjektoID = '$projektoid'");
              $tikrinimas= mysqli_num_rows($sql2); 
              if($tikrinimas==0)
              {     
              $vardasa=$row5['vardas'];
              $pavardea=$row5['pavarde'];   
              $adminas="$vardasa $pavardea";
              $gerasid=$galimas;
              
              
              $sql3=mysqli_query($connection,"SELECT * FROM `Prisijungimas` WHERE id = $gerasid"); 
              while($row3=mysqli_fetch_array($sql3)) 
              { 
              $klase=$row3['class'];
              $vardas=$row3['vardas'];
              $pavarde=$row3['pavarde'];   
              $dalyvis="$vardas $pavarde";
             
              $sql4=mysqli_query($connection,"SELECT * FROM `Grupes` WHERE Grupe = $klase"); 
              while($row4=mysqli_fetch_array($sql4)) 
              {
              $grupe=$row4['Pavadinimas'];
              }
                ?>
                    <div class='eilute'>
                    <?php echo "<b>$grupe</b> $vardas $pavarde" ;?>
                   <form action = "pridedadarbuotoja.php" method = "POST" style='background-color:white; margin-top:-28px; height:40px; width:40px; margin-left:30px; border-radius:25px; text-align:center;'>
                         <input type='image' src='../vaizdai/pridetworker.png' value='<?php echo $gerasid; ?>' name='darbuotojoid' style="width:30px; height:30px; margin-left:4px; margin-bottom:2px;">
                         <input type='hidden' name='projektoid' value='<?php echo $projektoid; ?>'>
                         <input type='submit' id='trinti' value='' hidden>
                  </form>   
                   </div>
                                    <br>
                <?php
              }  
              }
              }
                       
            ?>       
         </div>
        </div>
        
      </div> 
      
      </div>
         <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '> 
      </div>
  </div>  
  
<?php 
 include ('copy.php');
?>
</body>
</html>