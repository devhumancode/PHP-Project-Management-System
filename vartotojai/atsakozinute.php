<?php    
session_start ();
include ('userdizainas.php');

 include('duom.php');
$gavejo= $_POST['siuntejas'];   


$sql2=mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE id=$gavejo");
while($row2=mysqli_fetch_array($sql2))
{
$vardas=$row2['vardas'];
$pavarde=$row2['pavarde'] ;
$id=$row2['id'];
}
 
?>
<html>

<body class="body">

        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:95%;'>    
                  <form action='issiunciazinute.php' method=POST>
                       
                       <textarea rows="4" cols="50"  name='tekstas' style='text-align:top; width:70%; height:200px; margin-top:20px; margin-left:20px; float:left;'></textarea>
                  
                       <label style='text-align:center; width:200px; height:40px; margin-top:20px; margin-left:-10px;'><p style="color:#002776; font-size: 1em;">Reply to:</p><br/><?php echo $vardas; echo " $pavarde"; ?> </label>
                       <input type='hidden' value='<?php echo $id;?>' name='adresatas'>
                        
                       <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
                       </div>
                         
              </div> 
             

              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
              
                  <input type='image' src='../vaizdai/atsakyti.png' value='<?php echo $id; ?>' name='siuntejas' style="width:40px; height:40px; margin-top:30px;">
                  <input type='submit' id='trinti' value='' hidden>
              
                  <a href='zinutes.php'>
                      <img src="../vaizdai/grizti.png" alt="grįžti" style="width:40px;height:40px; margin-top: -10px; margin-left:20px;">
                  </a>   
              </div>
              </form>
        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
