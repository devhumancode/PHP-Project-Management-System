<?php  
session_start ();
include ('userdizainas.php');
    
?>
<html>

<body class="body">

  
<?php 
 include ('skirtukas.php');
?>
        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:100%;'>    
                                               <br>
<h2>Pasirinkite jus dominantį projektą : </h2>
                        <form action='darbogrupe.php' method=POST style='text-align:center;'>
                        <select name="projektoid" style='text-align:center; height:40px; margin-top:20px; width:200px; background-color:black; color:white'>
                        <?php 
                        include('duom.php');
                          $sql=mysqli_query($connection,"SELECT * FROM Projektai");
                          
                          
                           while($row=mysqli_fetch_array($sql))
                        {
                        $pavadinimas=$row['Pavadinimas']; 
                        $projektoid=$row['ID'];
                        ?>
                        <option value="<?php echo $projektoid; ?>"> <?php echo $pavadinimas; ?></option>
                        <?php }
                        ?>
                        </select>
                        <br>
                        <input type='image' src='../vaizdai/rasti.png' value='<?php echo "te"; ?>' name='siuntejas' style="width:40px; height:40px; float:left; margin-left:48.5%; margin-top:20px; margin-bottom:20px">
                        <input type='submit' id='trinti' value='' hidden >
                        </form>

              </div> 
             

        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>