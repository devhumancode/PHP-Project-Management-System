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
@media screen and (max-width: 1199px) {
    form {
        width: 100% !important;
    }
}   
</style>
<body class="body">
     
        <div class='info' style='text-align:center;'>         
              
              

              
                
              <div class='desinys' style='font-size: 100%; width:90%; text-align:left; margin-left:10%;'>  
              <br>
              
                      <form action="upload.php" method="post" enctype="multipart/form-data">
              
                       <b>Message</b><br>
                       <textarea name='pavadinimas' rows='4' cols='40' style='background-color:black; color:white; border:2px solid black;' placeholder="write here" required></textarea>
                   
                      <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px;'>   
                      </div>
                   
                       <b>Attachment </b><br>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Choose file
                        </label>
                        <input id="file-upload" name="fileToUpload" type="file">
                            <div style='clear:left;'>
                            </div>
                      <input type='hidden' name='fotoid' value='<?php echo $fotoid; ?>'>
                  
                       <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px;'>   
                       </div>
                    
                       <b>Send to</b> <br>
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
                     <br>
                       <input type="submit" value="SEND" name="submit" style='width: 200px; background-color:black; color:white; display:inline;'>
                    
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
