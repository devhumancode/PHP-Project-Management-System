<?php
session_start();
include ('userdizainas.php');

?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">


</head>
<style>

.patvirtintiuzduoti{
  width:300px;
  height:300px;
  text-align:center;
  margin:6.5%;
  background-color:white;
  float:left;
  border-radius:50px;
  border:2px solid black;
}

.redaguotidarbuotojus{
  width:300px;
  height:300px;
  text-align:center;
  margin:6.5%;
  background-color:white;
  float:left;
  border-radius:50px;
  border:2px solid black;
}


.ainfo {
  height:100px;
  margin-top:20px;
}

.uzduotys{
height:50px;
width:30%;
float:left;
margin-left:3%;
}

.zmoniu{
height:80px;

}
</style>

<body class="body">


  
<?php      
 include ('skirtukas.php');
?>

  <div class='info' style='height:600px;'>
      <?php 
        $projektas=$_POST['projektoid'];
        $privilegijos=$_POST['privilegijos'];
        $id = $_SESSION['id'];  
        
        include("duom.php");
        if($privilegijos==1)
        {
        
        $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas'");
        while($row=mysqli_fetch_array($sql))
        {
   
        }
        ?>
           <b>
        
          <div class='patvirtintiuzduoti'>
                  <div class='ainfo'>
                      Užduotys, laukiančios patvirtinimo
                  </div>
                  <hr style="border-top: 2px solid black;">
                  <div class='zmoniu'>
                      BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:green;'>
                     BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:orange;'>
                     BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:red;'>
                     BRUG
                  </div>
          </div>
          
          <div class='redaguotidarbuotojus'>
                  <div class='ainfo'>
                      Nauja užduotis
                  </div>
                  <hr style="border-top: 2px solid black;">
                  <div class='zmoniu'>
                      BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:green;'>
                     BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:orange;'>
                     BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:red;'>
                     BRUG
                  </div>
          </div>
          
          <div class='redaguotidarbuotojus'>
                  <div class='ainfo'>
                      Redaguoti projekto darbuotojus
                  </div>
                  <hr style="border-top: 2px solid black;">
                  <div class='zmoniu'>
                      BRUG
                  </div>
                   
                  <div class='uzduotys' style='color:green;'>
                     BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:orange;'>
                     BRUG
                  </div>
                  
                  <div class='uzduotys' style='color:red;'>
                     BRUG
                  </div>
          </div>
          </b>
        <?php
        
        }
        else{
        $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas'");
        while($row=mysqli_fetch_array($sql))
        {
        
        
        
        }
         echo $projektas; 
         
        }       
      ?>
  </div>  
  
<?php 
 include ('copy.php');
?>
</body>
</html>