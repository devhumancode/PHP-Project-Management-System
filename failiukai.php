                    <div class='failass' style='font-weight: bold;'>
                      Message
                    </div>
                       
                    <div class='failass' style='font-weight: bold;'>
                      File name
                    </div>
                       
                    <div class='failass' style='font-weight: bold;'>
                      Created by
                    </div>
                       
                    <div class='failass' style='font-weight: bold;'>
                      Job title
                    </div>
                    
                    
                    <div class='failass' style='font-weight: bold;'>
                      Upload date 
                    </div>
                       
                    <div class='failas-2' style='font-weight: bold; margin-top:2.5%;'>
                        <img src="../vaizdai/siuncia.png" alt="grįžti" style="width:100%;">
                    </div>
                    
                    <div class='failas-2' style='font-weight: bold; margin-top:2.5%;'>
                        <img src="../vaizdai/trina.png" alt="grįžti" style="width:100%;">
                    </div>
                             
 
<?php
include('duom.php');

$galimi=$_SESSION['id'];
$sql2=mysqli_query($connection,"select * from Prisijungimas WHERE id = $galimi");



$sql=mysqli_query($connection,"select * from Failai WHERE gid=$galimi");
while($row=mysqli_fetch_array($sql))
{
$sid=$row['sid'];
$id=$row['id'];
$file=$row['file'];
$filename=$row['filename'];
$data=$row['data']; 

$_SESSION['trinafaila']=$filename;



$sql3=mysqli_query($connection,"select * from Prisijungimas WHERE id = $sid");
while($row3=mysqli_fetch_array($sql3))
{
  $grupes=$row3['class'];
  $vardas=$row3['vardas'];
  $pavarde=$row3['pavarde'];
  $siuntejas="$vardas $pavarde";
}


$sql4=mysqli_query($connection,"select * from Grupes WHERE Grupe = $grupes");
while($row4=mysqli_fetch_array($sql4))
{
  $grupe=$row4['Pavadinimas'];
}
?>
                      <hr>
                    <div class='failass'>
                      <?= $file; ?>     
                    </div>
                       
                    <div class='failass'>
                      <?= $filename; ?>   
                    </div>
                       
                    <div class='failass'>
                      <?= $siuntejas; ?>    
                    </div>
                    
                    <div class='failass'>
                      <?= $grupe; ?>    
                    </div>
                       
                    <div class='failass'>
                      <?= $data; ?>     
                    </div>
                       
                    <div class='failas-2'>
                      
                         <form action = "atsisiuntimas.php" method = "POST">
                         <input type='image' src='vaizdai/siuncia.png' value='<?php echo $filename; ?>' name='failas' style="width:20px; height:20px;">
                         <input type='submit' id='trinti' value='' hidden>
                         </form>
                    </div>
                    
                    <div class='failas-2'>
                      
                         <form action = "trinafaila.php" method = "POST">
                         <input type='image' src='vaizdai/trina.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
                         <input type='submit' id='trinti' value='' hidden>
                         </form> 
                    </div>
                     
                    <hr>
                    
<?php 
} 
?>