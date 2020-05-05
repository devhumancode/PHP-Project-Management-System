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
<style>
 form {
   display: flex;
   flex-direction: column;
   width: 90%;
 }

 .desinys {
   width: 100% !important;
 }
</style>

  
<?php      
 include("duom.php"); 
 $projektoid=$_POST['projektoid'];
 
?>

  <div class='info' style='height:600px;'>
      <div class='desinys' style='text-align:left;'>
      
        <div class='informacija' style='margin-left:5%; margin-top:2%;'>
          <form method=POST action='naujauzduotisp.php' style='float:left;'>
          <b>Task assigned to:</b> <br/>
          <select name='darbuotojoid' style='background-color:black; color:white; width:172px; height:24px; border:2px solid black;'>
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
          </select> <br><br/>
          
          
          <b>Choose priority:</b><br/> <select name='svarba' style='background-color:black; color:white; width:172px; height:24px; border:2px solid black;' required>
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
          </select> <br/>
          
         
          <br><b>Category</b><br/> <input type='text' value='' name='kategorija'  style='background-color:black; color:white; width:172px; height:20px; border:2px solid black;' required><br>
          <br><b>Describe the task</b><br/> <textarea name='tekstas' rows='4' cols='40' style='background-color:black; color:white; width: 50%; border:2px solid black;' required></textarea><br>
          <br><b>Enter deadline </b>  <br/> <input type='date' name='data' min='<?php echo date("Y-m-d");?>' style='background-color:#009fda; border: 2px solid #002776; width:150px; color:white' required><br>
          <br>
          <input type='submit' id='trinti' value='SUBMIT NEW TASK' style='border:2px solid black; border-radius:5px; color:white; background-color:black;' >
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