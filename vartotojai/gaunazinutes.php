               
                     <div class='zinute' style='font-weight: bold;'>
                      Message
                    </div>

                     <div class='zinute' style='font-weight: bold;'>
                      From
                    </div>
                    
                    <div class='zinute' style='font-weight: bold; width:10%;'>
                      ID
                    </div>

                       
                    <div class='failas-2' style='font-weight: bold;'>
                        <img src="../vaizdai/atsakyti.png" alt="grįžti" style="width:100%;">
                    </div>
                    
                    <div class='failas-2' style='font-weight: bold; '>
                        <img src="../vaizdai/trash.png" alt="grįžti" style="width:100%;">
                    </div>
                             
 
<?php
include('duom.php');
$mano=$_SESSION['id'];

$sql=mysqli_query($connection,"select * from Zinutes WHERE Grupe=$mano");
if($row=mysqli_fetch_array($sql) == false){
  echo "</div><div style='clear:both; width: 100%;'><br/><br/><br/><br/><p>Currently you do not have any messages!</p><br/><br/><br/></div>";
 }

 $sql=mysqli_query($connection,"select * from Zinutes WHERE Grupe=$mano");
while($row=mysqli_fetch_array($sql))
{
$id=$row['ID'];
$zinute=$row['Zinute']; 
$grupe=$row['Grupe'];
$siuntejas=$row['Sgrupe'];

$sql2=mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE id=$siuntejas");



while($row2=mysqli_fetch_array($sql2))
{
$svardas=$row2['vardas']; 
$spavarde=$row2['pavarde']; 
$siuntejoid=$row2['id'] ;
 }


?>
                      <hr>
                    <div class='zinute'>
                      <?= $zinute; ?>     
                    </div>
                       
                    <div class='zinute'>
                      <b><?= $svardas; ?> <?= $spavarde ;?> </b>    
                    </div>
                                           
                    <div class='zinute' style='width:10%;'>
                      <?= $id; ?>     
                    </div>
                       
                    <div class='failas-2'>
                      
                         <form action = "atsakozinute.php" method = "POST">
                         <input type='image' src='../vaizdai/reply.png' value='<?php echo $siuntejoid; ?>' name='siuntejas' style="width:20px; height:20px;">
                         <input type="hidden" value='<?php echo $siuntejoid; ?>' name='siuntejas'>
                         <input type='submit' id='trinti' value='' hidden>
                         </form> 
                         
                    </div>
                    
                    <div class='failas-2'>
                      
                         <form action = "trinazinute.php" method = "POST">
                         <input type='image' src='../vaizdai/trina.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
                         <input type="hidden" value='<?php echo $id; ?>' name='id'>
                         <input type='submit' id='trinti' value='' hidden>
                         </form> 
                    </div>
                     
                    <hr>
                    
<?php 
}


echo "</div><div style='clear:both; width: 100%;'></div>";
?>
