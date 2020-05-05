<?php
include ('adminapsauga.php');      
session_start ();
include ('adizainas.php');  
?>
<html>

<style>
.laikiklis{
    margin-top:2%;
    width:100%;
    margin-left:30%;

}


.registracija {
    width: 20%;
    float:left;
    text-align:center;
    display: inline-block;
}


.registracijat {
    width: 20%;
    float:left;
    text-align:center;
    display: inline-block;
}

</style>



<body class="body">

  
<?php 
 include ('skirtukas.php');
?>

        <div class='info' style='height : 400px;'>         

              
              <div class='desinys' style='width:100%;'>
                  
                  
                  <form method=POST action='sukuria.php'>
                  <div class='laikiklis'>                  
 
                  <div class='registracijat'>
                  <b> Vardas</b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;''>
                  <input type='text' value='' name='vardas' required>
                  </div>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1; '> 
                  </div>    
                                  
                                  
                                  
                                  
                  <div class='registracijat'>
                  <b> Pavardė </b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='pavarde' required>
                  </div>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div>   
                  
                  
                  
                  
                  
                  <div class='registracijat'>
                  <b> Paštas </b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='pastas' required>
                  </div>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
                  
                  
                  
                  <div class='registracijat'>
                  <b> Laikinas slapyvardis </b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='slapyvardis' required>
                  </div>
                  
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
                  
                  
                  
                  <div class='registracijat'>
                  <b> Laikinas slaptažodis </b>
                  </div>                 
                  
                  <div class='registracija' style='margin-top:-7px;'>
                  <input type='text' value='' name='slaptazodis' required>
                  </div>
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
                  
                  
                  <div class='registracijat'>
                  <b> Grupė </b>
                  </div> 
                                  
                  
                  <div class='registracija' style='margin-top:-7px;'>
                   
                   <select name="grupe" style='width:175px; height:27px;' >
                        <?php 
                        include('duom.php');
                        $sql=mysqli_query($connection,"SELECT * FROM Grupes");
                           while($row=mysqli_fetch_array($sql))
                        {
                        $grupe=$row['Pavadinimas']; 
                        $klase=$row['Grupe']
                        ?>
                        <option value="<?php echo $klase; ?>"> 
                        <?php echo $grupe; ?> 
                        </option>
                        <?php 
                        }  
                        ?>
                        </select>
                        
                  </div>
                  <div class='randomas' style='position:relative; clear: left; opacity:1;'> 
                  </div> 
                  
              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; margin-left:-60%; '> 
                  <a href='darbuotojai.php'>
                      <img src="vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; position:center; margin-top:-40px;">
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