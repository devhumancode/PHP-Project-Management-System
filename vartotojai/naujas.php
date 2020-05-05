<?php   
session_start ();
include ('userdizainas.php');

  
?>
<html>

<body class="body">


        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              <h2>Send a new message</h2>
              <div class='desinys' style='text-align:center; width:95%;'>    
                  <form action='issiunciazinute.php' method=POST>
               <br/>
                       <textarea rows="14" cols="20"  name='tekstas' placeholder="enter your message" style='text-align:top; width:60%; height:200px; margin-top:20px; margin-left:20px; float:left;' required></textarea>
                        <b>Send to:</b>
                       <select name="adresatas" style='text-align:center; width:20%; height:40px; margin-top:20px; margin-left:10px;'>
                        <?php 
                        include('duom.php');
                          
                          
                        $sql2=mysqli_query($connection,"SELECT * FROM Prisijungimas");
                        while($row2=mysqli_fetch_array($sql2)) 
                        {
                        $vardas=$row2['vardas']; 
                        $pavarde=$row2['pavarde'];
                        $klase=$row2['class']; 
                        $id=$row2['id'];
                        
                        $sql=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe=$klase ");
                           while($row=mysqli_fetch_array($sql))
                        {
                        $grupe=$row['Pavadinimas']; 
                        ?>
                        <option value="<?php echo $id; ?>"> 
                        <?php echo " $grupe $vardas $pavarde" ?> 
                        </option>
                        <?php 
                        }  
                        }
                        ?>
                        </select>

    
                         

                  
                  
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
