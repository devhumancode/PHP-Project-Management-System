<?php    
session_start ();
include ('userdizainas.php');
    
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="astyle.css">
</head>
<style>
input[type="file"] {
    display: none;
}
.custom-file-upload{
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    color:white;
    background-color:black;
}   

</style>
<body class="body">

  
<?php 
 include ('skirtukas.php');
?>
          
        <div class='info' style='text-align:center;'>         
              
              

              
                
              <div class='desinys' style='font-size: 100%; width:90%; text-align:left; margin-left:10%;'>  
              <br>
              
                      <form action="upload.php" method="post" enctype="multipart/form-data">
              
                       <b>Prisegamas tekstas</b><br>
                       <textarea name='pavadinimas' rows='4' cols='40' style='background-color:black; color:white; border:2px solid black;' required>Užduoties tekstas</textarea>
                   
                      <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px;'>   
                      </div>
                   
                       <b>Failas </b><br>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Pasirinkite failą
                        </label>
                        <input id="file-upload" name="fileToUpload" type="file">
                            <div style='clear:left;'>
                            </div>
                      <input type='hidden' name='fotoid' value='<?php echo $fotoid; ?>'>
                  
                       <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px;'>   
                       </div>
                    
                       <b>Gavėjas </b> <br>
                       <select name="gavejas" style='text-align:center; height:30px; margin-top:5px; background-color:black; color:white;'>
                       
                        <?php 
                        include('duom.php');
                        session_start();
                        
                        $mana=$_SESSION['id'];
                        $sql=mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE id != $mana;");
                        while($row=mysqli_fetch_array($sql))
                        {
                        $klase=$row['class'];
                        $vardas=$row['vardas'];
                        $gid=$row['id'];
                        $pavarde=$row['pavarde'];
                        
                        $sql2=mysqli_query($connection,"SELECT * FROM Grupes WHERE grupe =$klase;");
                        while($row2=mysqli_fetch_array($sql2))
                        {
                        $grupe=$row2['Pavadinimas']; 
                        $grupesk=$row2['Grupe']
                        ?>
                        <option value="<?php echo $gid; ?>"> <?php echo "$grupe $vardas $pavarde"; ?></option>
                        <?php 
                        
                        
                        }
                        }
                        ?>
                        </select>
                          <br><br>              
                    
                       <b>Patvirtinti</b> <br>
                       <input type="submit" value="Įkelkite failą" name="submit" style='width: 200px; background-color:black; color:white; display:inline;'>
                    
                    </form>
                    
                    


             </div> 
             

                       
              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px;'> 
                  <a href='showfile.php'>
                      <img src="../vaizdai/grizti.png" alt="grįžti" style="width:40px;height:40px; margin-top:30px;">
                  </a>   
              </div>
              <br>
              
        </div>


<?php 
 include ('copy.php');
?>  

</div>            
</body>
</html>
