<?php
session_start();
include ('userdizainas.php');

?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">


</head>


<body class="body">


  
<?php      
 include("duom.php"); 
 $projektoid=$_POST['projektoid'];
 
 include ('skirtukas.php');
?>

  <div class='info' style='height:600px;'>
      <div class='desinys' style='text-align:left;'>
      
        <div class='informacija' style='margin-left:5%; margin-top:2%;'>
          <form method=POST action='naujauzduotisp.php' style='float:left;'>
          <b>Pasirinkite užduoties gavėją </b> 
          <select name='darbuotojoid' style='background-color:black; color:white; width:172px; height:24px; border:2px solid black; margin-left:10px;'>
            <?php
              $mano=$_SESSIOM['id'];
              $sql=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE ProjektoID='$projektoid'");
               while($row=mysqli_fetch_array($sql)) 
              { 
              $galimi=$row['VartotojoID'];   
              $sql2=mysqli_query($connection,"SELECT * FROM  Prisijungimas WHERE id='$galimi' AND id!='$mano'");
              
              while($row2=mysqli_fetch_array($sql2)) 
              { 
              $gavejoid=$row2['id'];
              $vardas=$row2['vardas'];
              $pavarde=$row2['pavarde'];   
              $gavejas="$vardas $pavarde";
                ?>
                <option value='<?php echo $gavejoid ?>'><?= $gavejas?> </option>
                <?php
              }  
              }         
            ?>       
          </select> <br>
          
          
          <b>Pasirinkite užduoties svarbą </b> <select name='svarba' style='background-color:black; color:white; width:172px; height:24px; border:2px solid black; margin-left:10px;' required>
            <?php
               $sql3=mysqli_query($connection,"SELECT * FROM  Svarba");
               while($row3=mysqli_fetch_array($sql3)) 
              { 
              $skaicius=$row3['Skaicius'];
              $reiksme=$row3['Reiksme'];
                ?>
                <option value='<?= $skaicius?>'> <?= $reiksme?> </option>
                <?php
              }  
                       
            ?>       
          </select> 
          
         
          <br><b>Įveskite užduoties kategoriją </b>  <input type='text' value='' name='kategorija' style='background-color:black; color:white; border:2px solid black; margin-left:7px;' required>
          <br><b>Įveskite užduotį </b> <br> <textarea name='tekstas' rows='4' cols='40' style='background-color:black; color:white; border:2px solid black;' required></textarea>
          <br><b>Įveskite vėliausią atlikimo datą </b>   <input type='date' name='data' min='<?php echo date("Y-m-d");?>' style='background-color:black; color:white' required>
          <br>
          <input type='submit' id='trinti' value='Sukurti užduotį' style='border:2px solid black; border-radius:5px; color:white; background-color:black;' >
          <input type='hidden' name='projektas' value='<?php echo $projektoid;?>'>
          
          </form>
        
      </div>
      
      </div>
  </div>  
  
<?php 
 include ('copy.php');
?>
</body>
</html>