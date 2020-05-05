<?php    
session_start ();
include ('userdizainas.php');
include('duom.php');
$busena=$_POST['busena'];
$veiksmas=$_POST['veiksmas'];    
$eid=$_SESSION['id'];
$pasirinkimas=$_POST['pasirinkimas'];
$uid=$_POST['uid'];
$siuntejas=$_POST['siuntejas'];
$svarbumas= $_POST['svarbumas'];
$kategorija=$_POST['kategorija'];
$vietela=$_POST['bybs'];
$sql2=mysqli_query($connection,"SELECT * FROM `ProjektuUzduotys` WHERE ID = $uid");
while($row2=mysqli_fetch_array($sql2))
{
  $veikia=$row2['Tekstas'];
  
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="astyle.css">
</head>
<style>
input[type="submit"] {
    background-color:black   ;
    color:white;
    padding: 6px 12px;
}

input[type="text"] {
    background-color:black   ;
    color:white;
    padding: 6px 12px;
}

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
     <div class='desinys' style='font-size: 100%; width:90%; text-align:center;'>  
              <br>
              <?php if($busena==1){ ?>
            <div class='informacija' style='margin-left:50px; text-align:left;'>  
           <b> Užduotis : </b> <?php echo "$veikia."?> <br>
           <b> Siuntėjas : </b> <?php echo "$siuntejas."?> <br>
           <b> Svarbumas : </b> <?php echo "$svarbumas."?> <br>
           <b> Kategorija :</b> <?php echo "$kategorija."?> <br>
           <b> Veiksmas :</b> <?php if($pasirinkimas==0){ echo "Siųsti užduotį tikrinimui.";} else{ echo "Atmesti užduotį.";}?> <br>
             </div> 
              
            <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px;'> 
            </div>
                    <form action="patvirtinauzduoti.php" method="post" enctype="multipart/form-data">
              
                    <div class='lentele'>
                      Įveskite tekstinę žinutę<br> 
                       <input type='text' name='tekstas' value='' required style='width: 100%;  display:inline;'>
                    </div>
                      <input type='hidden' name='pasirinkimas' value='<?php echo $pasirinkimas; ?>' >
                      <input type='hidden' name='busena' value='<?php echo $busena; ?>' >
                      <input type='hidden' name='uid' value='<?php echo $uid; ?>' >
                    <div class='lentele'>
                       Prisekite atliktą užduotį <br>
                       <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>Užduotis
                        </label>
                        <input id="file-upload" name="fileToUpload" type="file">
                           
                    </div>
                        
                                   
                    <div class='lentele'>
                        <br>
                       <input type="submit" value="Patvirtinti" name="submit" style='width: 80%;  display:inline;'>
                    </div>
                   </form> 
                    
           
             
             
                
             <?php }
            elseif($busena==3){ ?>
            <div class='informacija' style='margin-left:50px; text-align:left;'>  
           <b> Užduotis : </b> <?php echo "$veikia."?> <br>
           <b> Siuntėjas : </b> <?php echo "$siuntejas."?> <br>
           <b> Svarbumas : </b> <?php echo "$svarbumas."?> <br>
           <b> Kategorija :</b> <?php echo "$kategorija."?> <br>
           <b> Veiksmas :</b> <?php if($pasirinkimas==0){ echo "Sunaikinti užduotį.";} else{ echo "Grąžinti užduotį darbuotojui.";}?> <br>
             </div> 
              
            <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px;'> 
            </div>
                    <form action="patvirtinauzduoti.php" method="post" enctype="multipart/form-data">
              
                    <div class='lentele'>
                      Įveskite tekstinę žinutę<br> 
                       <input type='text' name='tekstas' value='' required style='width: 100%;  display:inline;'>
                    </div>
                      <input type='hidden' name='pasirinkimas' value='<?php echo $pasirinkimas; ?>' >
                      <input type='hidden' name='busena' value='<?php echo $busena; ?>' >
                      <input type='hidden' name='uid' value='<?php echo $uid; ?>' >
                    <div class='lentele'>
                       Prisekite atliktą užduotį <br>
                       <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>Užduotis
                        </label>
                        <input id="file-upload" name="fileToUpload" type="file">
                    </div>
                        
                                   
                    <div class='lentele'>
                        <br>
                       <input type="submit" value="Patvirtinti" name="submit" style='width: 80%;  display:inline;'>
                    </div>
                   </form> 
                    
           
             
             
                
             <?php }
             else if($busena==0){ ?>
             
            <div class='informacija' style='margin-left:50px; text-align:left;'>  
           <b> Užduotis : </b> <?php echo "$veikia."?> <br>
           <b> Siuntėjas : </b> <?php echo "$siuntejas."?> <br>
           <b> Svarbumas : </b> <?php echo "$svarbumas."?> <br>
           <b> Kategorija :</b> <?php echo "$kategorija."?> <br>
           <b> Veiksmas :</b> <?php if($pasirinkimas==0){ echo "Patvirtinti užduoties baigimą.";} else{ echo "Grąžinti užduotį vykdymui.";}?> <br>
             </div> 
              
            <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px;'> 
            </div>
                    <form action="nusprendzia.php" method="post" enctype="multipart/form-data">
              
                    <div class='lentele'>
                      Įveskite tekstinę žinutę<br> 
                       <input type='text' name='tekstas' value='' required style='width: 100%;  display:inline;'>
                    </div>
                      <input type='hidden' name='pasirinkimas' value='<?php echo $pasirinkimas; ?>' >
                      <input type='hidden' name='busena' value='<?php echo $busena; ?>' >
                      <input type='hidden' name='uid' value='<?php echo $uid; ?>' >
                    <div class='lentele'>
                       Prisekite atliktą užduotį <br>
                       <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>Užduotis
                        </label>
                        <input id="file-upload" name="fileToUpload" type="file">
                    </div>
                        
                                   
                    <div class='lentele'>
                        <br>
                       <input type="submit" value="Patvirtinti" name="submit" style='width: 80%;  display:inline;'>
                    </div>
                   </form> 
                 <?php }?>    
             </div> 
             
             
           
                       
              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px;'> 
                  <?php if($vietela==69) { ?><a href='uzduotys.php'> <?php } else { ?> <a href='projektai.php'><?php } ?>
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
