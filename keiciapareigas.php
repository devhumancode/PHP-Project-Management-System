<?php
include ('adminapsauga.php');      
include ('userdizainas.php');  
?>
<html>

<style>
.laikiklis{
    width: 80%;
    margin: auto;
    display: flex;
    margin-top: 2em;
}


.registracija {
    flex: 1;
    text-align: left;
    margin-left: 0.5em;
}


.registracijat {
    flex: 1;
    text-align:right;
    margin-right: 0.5em;
}

break{
  flex-basis: 100%;
  width: 0px; 
  height: 0px; 
  overflow: hidden;
}


</style>



<body class="body">
        <div class='info' style='height : 400px;'>         

              
              <div class='desinys' style='width:100%; flex-direction: column;'>
              <br>
                          <h3>Add new job title</h3>     
                          
                                                              
                  <form method=POST action='sukuriapareiga.php'>     

                  <div class='laikiklis'>                  
 
                  <div class='registracijat'>
                  <b>Enter new job title</b>
                  </div>                 
                  
                  <div class='registracija' style=''>
                  <input type='text' value='' name='pavadinimas' placeholder="I.E. Junior dev" style='color:white; background-color:black; text-align: center;' required>
                  </div>
                           <br><Br>
                 
                 
</div>
                  <input type='image' alt="submit new job title" src='vaizdai/sukurti.png' style="width:40px; height:40px;">
                  <input type='submit' id='trinti' value='' hidden>   
                  </form>              
                  
                    <br><Br>  
                    
                  
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div>                   
         </div>                 
             <div class='registracija' style='margin-top:-7px; width:100%; text-align:center'>
                <p>Check if it is not yet created before creating a new one!</p>
                        <select name="grupe" style='width:175px; height:27px; color:white; background-color:black'>
                        <?php 
                        include('duom.php');
                        $sql=mysqli_query($connection,"SELECT * FROM Grupes");
                           while($row=mysqli_fetch_array($sql))
                        {
                        $grupe=$row['Pavadinimas']; 
                        $klase=$row['Grupe']
                        ?>
                        <option value="<?php echo $klase; ?>" selected> 
                        <?php echo $grupe; ?> 
                        </option>
                        <?php 
                        }  
                        ?>
                        </select>
                                  
                  </div>                 
         </form>     
           </div>  
        </div>
<?php 
 include ('copy.php');
?>
</body>
</html>