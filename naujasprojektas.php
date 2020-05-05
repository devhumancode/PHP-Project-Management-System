<?php
include ('adminapsauga.php');      
include ('userdizainas.php');  
?>
<html>


<style>

.kaire{
width:49%;
float:left;
text-align:right;
}

.desine{
height:23px;
text-align:left;
width:49%;
float:right;
overflow-x: hidden;
overflow-y: hidden;
}

@media screen and (min-width: 820px) {
.{}

.darbuotojusarasas {
background-color:black; 
color:white; 
margin-top:2%; 
width:40%; 
height:400px; 
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

  
        <div class='info' style='min-height:800px; text-align:center;'> 
           <br><h2>Create a new project</h2>   <Br>
            
            <form action = "sukuriaprojekta.php" method = "POST" >
            
              <div class='kairesbarai'style='margin-left:18%; float:left; text-align:left;'>
                <h4><b>Enter project's name </b></h4><input type='text' name='pavadinimas' style='color:white; background-color:black; width:200px; height:40px;'  required>
                <h4><br><br><b>Create description of a project</b></h4> <textarea name='tekstas' rows='4' cols='40' style='background-color:black; color:white; border:2px solid black;' required></textarea>
              </div>
                                    
               <div class='darbuotojusarasas' style='float:right; margin-right:10%; margin-top:20px;' >  
             
             <br><h3 style="color:#002776 !important;"><b>Choose project manager: </b></h2><br><br>
              
            <?php
            
              include("duom.php"); 
               
               
              $projektoid=-1; 
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
                  
                         <input type='radio' src='../vaizdai/pridetworker.png' value='<?php echo $gerasid; ?>' name='adminoid' style="float:right margin-right:10px;">
                         <input type='hidden' name='projektoid' value='<?php echo $projektoid; ?>'>
                         <input type='submit' id='trinti' value='' hidden>
                   
                   </div>
                                    <br>
                <?php
              }  
              }
              }
                       
            ?> 
            
            </div>
         <div class='randomas' style='position:relative; clear: left; opacity:0;  '> 
          
         </div>
          <div style='width:100%; float:left;'>
        
          </div>
         <input type='submit' value='Create Project' style='background-color:black; color:white; width:40%; margin-top:40px;float:left; margin-left:30%; margin-bottom:20px;'>      
         </form> 
         <div class='randomas' style='position:relative; clear: left; opacity:0;  '> 
          
         </div>
        </div>
<?php 
 include ('copy.php');
?>
</body>
</html>