<style>

.zinute{
    min-width:102px;
    width:15%; 
    float:none;
    margin-left:3%;
    margin-top:3%;
    text-align:center;
    display: inline-block;
}



</style>
<html>
<body class="body">

<?php 
session_start ();
include ('userdizainas.php');
include ('duom.php'); 

  $mano=$_SESSION['id']; 
  $projektoid=$_POST['projektoid'];  

?>
    <div class='info' style='overflow-x:scroll; text-align:center;'>   
    <br>
    <h4>Choose desired project:</h4>
    <form method=POST action='konkretidarbogrupe.php' style='margin-top:20px;'>
    <select name='reikiama' style='color:white; background-color:black; height:35px;'>

<?php 

  $sql2=mysqli_query($connection,"SELECT * FROM Grupes"); 
    while($row2=mysqli_fetch_array($sql2)) 
   {
   $pavadinimas=$row2['Pavadinimas'];
   $skaicius=$row2['Grupe'];
   

?>

    <option value='<?php echo $skaicius ;?>'><?php echo $pavadinimas; ?></option>
  
<?php 
  }
  
  
 include ('skirtukas.php');
?>
              
         </select>
         <input type='submit' value='rasti' style='width:100px; height:35px; background-color:black; color:white;'>
         <input type='hidden' name='projektoid' value='<?php echo $projektoid ;?>'>
         </form>
        <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '> 
        </div>
              <div class='desinys' style='text-align:center; width:100%;'>    
                      <table class='table' style='width:98%; margin-left:2%; margin-top:2%; text-align:center;'>
                      <tr>
                     <td  style='font-weight: bold;' >
                      Name
                    </td>

                     <td style='font-weight: bold;'>
                      Surname
                    </td>
                    
                    <td style='font-weight: bold;'>
                      Job title
                    </td>
                    
                    <td style='font-weight: bold;'>
                      Phone no.
                    </td>

                    <td style='font-weight: bold;'>
                      Email
                    </td>
                    
                    <td style='font-weight: bold;'>
                      Profile
                    </td>
                    </tr>                       
                             
            <?php
            
              
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
              $telefonas=$row3['tel_nr'];
              $pastas=$row3['email'];
              $ziurimoid=$row3['id'];
              $sql4=mysqli_query($connection,"SELECT * FROM `Grupes` WHERE Grupe=$klase"); 
              while($row4=mysqli_fetch_array($sql4)) 
              {
              $grupe=$row4['Pavadinimas'];
              }
                ?>   <tr>
                    <td>
                      <?= $vardas; ?>     
                    </td>
                       
                    <td>
                      <?= $pavarde; ?>    
                    </td>
                    
                    <td>
                      <?= $grupe; ?>    
                    </td>
                                           
                    <td>
                      <?= $telefonas; ?>     
                    </td>
                    
                    <td>
                      <?= $pastas; ?>
                    </td>
                    
                    <td>
                      <form method=POST action='visuprofiliai.php'>
                      <input type='image' src='../vaizdai/rodoprofiliuka.png' style='height:20px; width:20px;'>
                      <input type='hidden' name='ziurimoid' value='<?= $ziurimoid; ?>'>
                      </form>
                    </td>
                    </tr>
                <?php
              }  
              }
                       
            ?>  
            </table>     
         </div>
         <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
            <a href='darbogrupes.php'>
                <img src="../vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
            </a>   
        </div>
 </div> 

<?php 
 include ('copy.php');
?>              
</body>
</html>
