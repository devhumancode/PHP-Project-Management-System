<?php
session_start();
include ('duom.php');
include ('userdizainas.php');
$ziurimoid=$_POST['ziurimoid'];




$sql10=mysqli_query($connection,"select * from ProjektuPrivilegijos WHERE VartotojoID=$ziurimoid");
$dalyvaujap = mysqli_num_rows($sql10);

$sql10=mysqli_query($connection,"select * from ProjektuPrivilegijos WHERE VartotojoID=$ziurimoid AND Teises=1");
$adminas = mysqli_num_rows($sql10);

$sql10=mysqli_query($connection,"select * from ProjektuUzduotys WHERE SukureID=$ziurimoid AND Busena=2");
$pabaige = mysqli_num_rows($sql10);


$sql=mysqli_query($connection,"select * from Prisijungimas WHERE id=$ziurimoid");
while($row=mysqli_fetch_array($sql))
{
$vardas=$row['vardas']; 
$pavarde=$row['pavarde'];
$numeris=$row['tel_nr'];
$prisijungimas=$row['prisijungimu'];
$klase=$row['class'];
$id=$row['id'];
$pastas=$row['email'];
$prisijunge=$row['prisijungimo_data'];

$sql20=mysqli_query($connection,"select * from Grupes WHERE Grupe=$klase");
while($row20=mysqli_fetch_array($sql20))
{
   $pareigos=$row20['Pavadinimas'];
 }

             $sql2=mysqli_query($connection,"SELECT * FROM ProfilioFoto WHERE user=$ziurimoid ");  
             while($row2=mysqli_fetch_array($sql2))
             {
             $foto=$row2['foto'];
             $_SESSION['sena']=$foto;
             $fotoid=$row2['id'];
             }
                        
?>
<html>
<style>
b {
    color: #002776;
}

.table {
min-width:321px;
width:30%;
margin-left:20px;
text-align:center; 
float:left;
margin-top:20px;
}

.statistika {
    font-size: 0.8em !important;
}

table, th, td {
width:321px;
height:45px;
background-color:white;
color:black;
}

input {
background-color:black;
color:white;
width:200px;
}

.text{
width:200px;
}

.statistika{
width:33%;
float:left;
text-align:center;
font-weight: bold;
}
.visas {
            padding-top: 2em;
      }

@media screen and (max-width: 1199px) {
      .desinys {
            display: block !important;
      }
      table {
            width: 100% !important;
            border-bottom: 1px solid #002776;
            margin-left: 0px !important;
      }

      .paveiksliukas {
            width: 100% !important;
            display: flex;
            justify-content: center;
            
      }

      .paveiksliukas img {
          width: 30% !important;
          height: unset !important;
          margin: auto !important;
          max-width: 100px !important;
      }

      table, td {
            background-color: unset !important;
      }

      .visas {
            padding-top: 4em;
      }
}
</style>
<body class="body">

        <div class='info' style='text-align:center; min-height:400px;'>         

              
              <div class='desinys' style='text-align:center; width:100%;'> 
<div class='paveiksliukas' style='width:30%; float:left; text-align:center;'>
     <img src='../profiliofoto/<?php echo $foto ; ?>' style='width:200px; height:200px;'> 
</div>                                                                        




<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Name</b>
</td>

<td class="darbuotojas_td">
<div id="vardas_<?php echo $id; ?>" class="text"><?php echo $vardas; ?></div> 
</td>
</tr>
</table>




<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Surname</b>
</td>

<td class="darbuotojas_td">
<div id="pavarde_<?php echo $id; ?>" class="text"><?php echo $pavarde; ?></div> 
</td>
</tr>
</table>


<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Phone no.</b>
</td>


<td class="darbuotojas_td">
<div id="numeris_<?php echo $id; ?>" class="text"><?php echo $numeris; ?></div> 
</td>
</tr>
</table>



<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">
<td><b>Email</b></td>
<td class="darbuotojas_td">
<div id="pastas_<?php echo $id; ?>" class="text"><?php echo $pastas; ?></div> 
</td>
</tr>
</table>

<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">
<td><b>Job title</b></td>
<td class="darbuotojas_td">
<div id="pastas_<?php echo $id; ?>" class="text"><?php echo $pareigos; ?></div> 
</td>
</tr>
</table>

<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">
<td><b>Last online</b></td>
<td class="darbuotojas_td">
<div id="pastas_<?php echo $id; ?>" class="text"><?php echo $prisijunge; ?></div> 
</td>
</tr>
</table>


   <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:150px; '> 
   </div>

  <div class='visas' style='text-align:center width:100%;'>
    <h3><b> Statistics of the employee   </b> </h3>
  </div>
   <hr style='border:2px solid black ;width:85%;'>
<div class='statistika'>
Number of tasks completed: <Br>
</div>

<div class='statistika'>
Number of projects with admin rights:  <br>
</div>

<div class='statistika'>
Number of projects participating in: <br>
</div>

<div class='statistika' style='color:#0B610B;'>
    <?php echo $pabaige ; ?>
</div>

<div class='statistika' style='color:#0B610B;'>
    <?php echo $adminas ; ?>
</div>

<div class='statistika' style='color:#0B610B;'>
    <?php echo $dalyvaujap ; ?>
</div>


   <br>
                                                      
              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:150px; '> 
    
              </div>
          </div>    
       <?php } ?>   
<div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '>    

 </div>
 </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>