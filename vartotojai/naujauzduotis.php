<?php 
session_start ();

  
?>
<html>

<body class="body">

        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:95%;'>    
                  <form action='suzduoti.php' method=POST>
                       
                       <textarea   name='tekstas' style='text-align:top; width:60%; height:200px; margin-top:20px; margin-left:20px; float:left;' required></textarea>
                  
                       <select name="username" style='text-align:center; width:20%; height:40px; margin-top:20px; margin-left:10px;'>
                        <?php 
                        include('duom.php');
                          $sql=mysqli_query($connection,"SELECT * FROM Grupes");
                          
                          
                           while($row=mysqli_fetch_array($sql))
                        {
                        $grupe=$row['Pavadinimas']; 
                        ?>
                        <option value="<?php echo $row[Pavadinimas]; ?>"> <?php echo $row[Pavadinimas] ?></option>
                        <?php }
                        ?>
                        </select>
                        
                         
                         <input type='image' src='vaizdai/uzduociuoti.png' value='<?php echo $siuntejas; ?>' name='siuntejas' style="width:40px; height:40px; float:left; margin-top:50px; margin-left:20px;">
                         <input type='submit' id='trinti' value='' hidden>
                  
                  </form>
              </div> 
             

              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
                  <a href='uzduotys.php'>
                      <img src="vaizdai/grizti.png" alt="grįžti" style="width:40px;height:40px; margin-top:30px; margin-bottom:30px;">
                  </a>   
              </div>
        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
