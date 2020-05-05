
<?php
session_start();
include ('userdizainas.php');

?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<style>
@media screen and (min-width: 820px) {
.{}

.darbuotojusarasas {
background-color:black; 
color:white; 
margin-top:2%; 
width:350px; 
height:600px; 
overflow-y:scroll; 
text-align:center; 
float:right; 
margin-right:10px; 
margin-bottom:20px;
border-radius:20px;
}


.table {
min-width:353px;
width:40%;
margin-left:20px;
text-align:center; 
float:left;
margin-top:20px;
border-radius:20px;
}

table, th, td {
width:231px;
height:45px;
background-color:black;
color:white;
border-radius:20px;
}

input {
background-color:black;
color:white;
width:200px;
}

.text{
width:200px;
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

.table {
width:90%;
margin-left:5%;
margin-right:5%;
text-align:center; 
float:left;
margin-top:20px;
border-radius:20px;
}

table, th, td {
height:45px;
background-color:black;
color:white;
border-radius:20px;
}

input {
background-color:black;
color:white;
width:auto;
border-radius:20px;
}

.text{
min-width:50px;
}
}
</style>

<body class="body">


  
<?php      
 include("duom.php"); 
 $projektoid=$_POST['projektoid'];
 $teises=$_POST['teises'];
 include ('skirtukas.php');
?>

  <div class='info' style=''>
      <div class='desinys' style='text-align:left; width:100%;'>
      
        <div class='informacija' style='margin-left:5%;'>
             <div class='darbuotojusarasas' >
             <br><b>Darbuotojai, priklausantys šiam projektui : </b><br><br>
            <?php
            
              $sql=mysqli_query($connection,"SELECT * FROM  Projektai WHERE ID='$projektoid'");
               while($row=mysqli_fetch_array($sql)) 
              { 
              $adminasid=$row['SukureID'];
              $aprasymas=$row['Aprasymas'];
              $sukurta=$row['SukurimoData'];
              $pavadinimas=$row['Pavadinimas'];
              $id=$row['id'];
              $deadline=$row['PabaigimoData'];
               
              $sql2=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE ProjektoID='$projektoid'"); 
              while($row2=mysqli_fetch_array($sql2)) 
              { 
              $darbuotojoid=$row2['VartotojoID'];
              
              
              $sql5=mysqli_query($connection,"SELECT * FROM `Prisijungimas` WHERE id=$adminasid"); 
              while($row5=mysqli_fetch_array($sql5)) 
              { 
              $vardasa=$row5['vardas'];
              $pavardea=$row5['pavarde'];   
              $adminas="$vardasa $pavardea";
              }
              
              $sql3=mysqli_query($connection,"SELECT * FROM `Prisijungimas` WHERE id=$darbuotojoid"); 
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
                
                <?php echo "<b>$grupe</b> $vardas $pavarde <br>" ;?>
                
                <?php
              }  
              }
              }         
            ?>       
         </div>
<?php
        $sql10=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektoid' AND Busena!=2");
        $uzduociu = mysqli_num_rows($sql10);
        
        $sql11=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektoid' AND Busena=0 OR Busena=3");
        $laukia = mysqli_num_rows($sql11);
        
        $data=date("Y-m-d");
        $sql12=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektoid' AND BaigimoData='$data' AND Busena!=2");
        $baigiasi= mysqli_num_rows($sql12);
        
        $sql13=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektoid' AND Busena=2");
        $baigtos= mysqli_num_rows($sql13);
  
  if($teises==1)
  { 
  include('projektoduomenys.php'); 
  }
  else
  {
?> 

      <table class='table'>
      <tr><td><b>Pavadinimas</b></td><td>
      <div id="pavadinimas_<?php echo $id; ?>" class="text"><?php echo $pavadinimas; ?></div> 
      </td></tr></table>
      
         
      <table class='table' >
      <tr><td><b>Aprašymas</b></td><td>
      <div id="aprasymas_<?php echo $id; ?>" class="text"><?php echo $aprasymas; ?></div>
      </td></tr></table>
      
      
      <table class='table'>
      <tr><td><b>Atlikti iki</b></td><td>
      <div class="text"><?php echo $deadline; ?></div> 
      </td></tr></table>
  
<?php  }       ?>
        
 

    
      
      <table class='table' >
      <tr><td><b>Sukūrta </b></td><td>
      <div class="text"><?php echo $sukurta; ?></div> 
      </td></tr></table>
      
      <div class='randomas' style='position:relative; clear: left; opacity:0; '> 
      </div>
      
      <table class='table'>
      <tr><td><b>Sukūrta </b></td><td>
      <div class="text"><?php echo $sukurta; ?></div> 
      </td></tr></table>
      
      <div class='randomas' style='position:relative; clear: left; opacity:0; '> 
      </div>
      
      <table class='table' >
      <tr><td><b>Sukūrė </b></td><td>
      <div class="text"><?php echo $adminas; ?></div> 
      </td></tr></table>
      
      <div class='randomas' style='position:relative; clear: left; opacity:0; '> 
      </div>
      
      <table class='table' >
      <tr><td><b>Iš viso aktyvių užduočių </b></td><td>
      <div class="text"><?php echo $uzduociu; ?></div> 
      </td></tr></table>
      
      <div class='randomas' style='position:relative; clear: left; opacity:0; '> 
      </div>
      
      <table class='table' >
      <tr><td><b>Laukiančios patvirtinimo užduotys </b></td><td>
      <div class="text"><?php echo $laukia; ?></div> 
      </td></tr></table>
      
      <div class='randomas' style='position:relative; clear: left; opacity:0; '> 
      </div>
      
      <table class='table' >
      <tr><td><b>Užduotys, pasibaigiančios šiandien </b></td><td>
      <div class="text"><?php echo $baigiasi; ?></div> 
      </td></tr></table>
      
      <div class='randomas' style='position:relative; clear: left; opacity:0; '> 
      </div>
      
      <table class='table'>
      <tr><td><b>Pabaigtos ir patvirtintos užduotys </b></td><td>
      <div class="text"><?php echo $baigtos; ?></div> 
      </td></tr></table>
      
      
      
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