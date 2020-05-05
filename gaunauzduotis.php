                                                              
                     <div class='zinute' style='font-weight: bold;'>
                      Žinutė
                    </div>

                     <div class='zinute' style='font-weight: bold;'>
                      Siuntėjas
                    </div>
                    
                    <div class='zinute' style='font-weight: bold; width:10%;'>
                      ID
                    </div>

                       
                    <div class='failas-2' style='font-weight: bold; margin-top:2.5%;'>
                        <img src="../vaizdai/atsakyti.png" alt="grįžti" style="width:100%;">
                    </div>
                    
                    <div class='failas-2' style='font-weight: bold; margin-top:2.5%;'>
                        <img src="../vaizdai/trina.png" alt="grįžti" style="width:100%;">
                    </div>
                             
 
<?php
include('duom.php');


$sql=mysqli_query($connection,"select * from Uzduotys WHERE Gavejas=0");
while($row=mysqli_fetch_array($sql))
{
$id=$row['ID'];
$zinute=$row['Tekstas']; 
$grupe=$row['Grupe'];
$siuntejas=$row['Siuntejas'];

$sql2=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe=$siuntejas");
while($row2=mysqli_fetch_array($sql2))
{
$spavadinimas=$row2['Pavadinimas']; 
$siuntejoid=$row2['ID'] ;
 }


?>
                      <hr>
                    <div class='zinute'>
                      <?= $zinute; ?>     
                    </div>
                       
                    <div class='zinute'>
                      <b><?= $spavadinimas; ?> </b>    
                    </div>
                                           
                    <div class='zinute' style='width:10%;'>
                      <?= $id; ?>     
                    </div>
                       
                    <div class='failas-2'>
                      
                         <form action = "atsakozinute.php" method = "POST">
                         <input type='image' src='../vaizdai/atsakyti.png' value='<?php echo $siuntejoid; ?>' name='siuntejas' style="width:20px; height:20px;">
                         <input type='submit' id='trinti' value='' hidden>
                         </form> 
                         
                    </div>
                    
                    <div class='failas-2'>
                      
                         <form action = "trinauzduoti.php" method = "POST">
                         <input type='image' src='../vaizdai/trina.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
                         <input type='submit' id='trinti' value='' hidden>
                         </form> 
                    </div>
                     
                    <hr>
                    
<?php 
}

?>