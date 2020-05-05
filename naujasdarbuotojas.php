<?php
include ('adminapsauga.php');      
include ('userdizainas.php');  
?>
<html>

<style>
.laikiklis{
    margin-top:2%;
    width:100%;
    display: flex;
    flex-wrap: wrap;

}


.registracija {
    width: 48%;
    text-align:left;
    display: inline-block;
    margin-left: 4%;
}


.registracijat {
    width: 48%;
    text-align:right;
    display: inline-block;
}

.randomas {
    padding-top: 2em;
}

</style>



<body class="body">

  

        <div class='info' style='height : 400px;'>         

              
              <div class='desinys' style='width:100%;'>
                  
                  
                  <form method=POST action='sukuria.php'>
                  <div class='laikiklis'>                  
 
                  <div class='registracijat'>
                  <b> Name</b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;''>
                  <input type='text' value='' name='vardas' style='width:200px; height:27px; color:white; background-color:black' required>
                  </div><br/><br/>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1; '> 
                  </div>    
                                  
                                  
                                  
                                  
                  <div class='registracijat'>
                  <b> Surname </b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='pavarde' style='width:200px; height:27px; color:white; background-color:black' required>
                  </div><br/><br/>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div>   
                  
                  
                  
                  
                  
                  <div class='registracijat'>
                  <b> Email </b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='pastas' style='width:200px; height:27px; color:white; background-color:black' required>
                  </div><br/><br/>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
                  
                  
                  
                  <div class='registracijat'>
                  <b> Temprorary password</b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='slapyvardis' style='width:200px; height:27px; color:white; background-color:black' required>
                  </div><br/><br/>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
                  
                  
                  
                  <div class='registracijat'>
                  <b> Repeat temprorary password</b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='slaptazodis' style='width:200px; height:27px; color:white; background-color:black' required>
                  </div><br/><br/>
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
                  
                  
                  <div class='registracijat'>
                  <b> Job Title </b>
                  </div> 
                                  
                  
                  <div class='registracija' style='margin-top:-7px;'>
                   
                   <select name="grupe" style='width:175px; width:200px; height:27px; color:white; background-color:black; height:27px;' >
                        <?php 
                        include('duom.php');
                        $sql=mysqli_query($connection,"SELECT * FROM Grupes");
                           while($row=mysqli_fetch_array($sql))
                        {
                        $grupe=$row['Pavadinimas']; 
                        $klase=$row['Grupe']
                        ?>
                        <option  style='width:200px; height:27px; color:white; background-color:black' value="<?php echo $klase; ?>"> 
                        <?php echo $grupe; ?> 
                        </option>
                        <?php 
                        }  
                        ?>
                        </select>
                        
                  </div>
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
              <div class='randomas' style='width: 100%; display:flex; justify-content: center; align-items: center; margin-top: 2em;'> 
                  <a href='darbuotojai.php'>
                      <img src="vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; position:center;">
                  </a>  
                         
                         <input type='image' src='vaizdai/sukurti.png' style="width:40px; height:40px;">
                         <input type='submit' id='trinti' value='' hidden> 
              </div> 
                          </form>               
                   
   </div>                 
                     
        <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
        
        </div>   
        
         </form>     
           </div>  
        </div>
<?php 
 include ('copy.php');
?>
</body>
</html>