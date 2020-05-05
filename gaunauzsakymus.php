               
                    <div class='zinute' style='font-weight: bold; width:12%;'>
                      Sector
                    </div>

                     <div class='zinute' style='font-weight: bold; width:25%;'>
                      Additional Information
                    </div>
                    
                    <div class='zinute' style='font-weight: bold; width:15%;'>
                      Requested by
                    </div>

                    <div class='zinute' style='font-weight: bold; width:12%;'>
                      Phone Number
                    </div>
                    
                    <div class='zinute' style='font-weight: bold; width:12%;'>
                      Email
                    </div>
                       

                    
                    <div class='failas-2' style='font-weight: bold;'>
                        <img src="../vaizdai/trash.png" alt="grįžti" style="width:100%;">
                    </div>
                             
 
<?php
include('duom.php');
$mano=$_SESSION['id'];

$sql=mysqli_query($connection,"select * from Uzklausos");
while($row=mysqli_fetch_array($sql))
{
$vardas=$row['Vardas'];
$pavarde=$row['Pavarde'];
$telefonas=$row['Telefonas'];
$email=$row['Email'];
$sritis=$row['Sritis'];
$tekstas=$row['Tekstas'];
$id=$row['ID'];

?>
                      <hr>
                    <div class='zinute' style='width:12%;'>
                      <?= $sritis; ?>     
                    </div>
                       
                    <div class='zinute' style='width:25%;'>
                      <b><?= $tekstas; ?> </b>    
                    </div>
                                           
                    <div class='zinute' style='width:15%;'>
                      <?= "$vardas $pavarde"; ?>     
                    </div>
                    
                    <div class='zinute' style='width:12%;'>
                      <b><?= $telefonas; ?> </b>    
                    </div>
                    
                    <div class='zinute' style='width:12%;'>
                      <b><?= $email; ?> </b>    
                    </div>
                       
  
                    
                    <div class='failas-2'>
                      
                         <form action = "trinauzsakyma.php" method = "POST">
                         <input type='image' src='../vaizdai/trina.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
                         <input type='submit' id='trinti' value='' hidden>
                         </form> 
                    </div>
                     
                    <hr>
                    
<?php 
}

?>