<?php   
session_start ();
include ('userdizainas.php');  
?>
<html>
<body class="body">

  
<?php 
 include ('skirtukas.php');
?>
        <div class='info' style='min-height:800px;'>         
              <div class='kairys'>
                  <?php include('clock.php'); ?>
                  <br>
                        <?php 
                        echo date("Y-m-d");
                      
                        ?>
                        
                        <br><br>

              </div>

              <div class='desinys'>
              <br><Br>
              <font size="4">
                  <?php 
                  include('duom.php');
                   $sql=mysqli_query($connection,"SELECT * FROM Prisijungimas");
                     while($row=mysqli_fetch_array($sql))
                    {
                         $vardas=$row['vardas'];
                         $pavarde=$row['pavarde'];
                         $klase=$row['class'];
                    }
                   
                   $sql=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe=$klase");
                     while($row=mysqli_fetch_array($sql))
                    {
                         $grupe=$row['Pavadinimas'];
                    }
                     
                   $sql2=mysqli_query($connection,"SELECT * FROM ProjektuUzduotys WHERE Busena=2");
                     while($row2=mysqli_fetch_array($sql2))
                    {
                         $projektoid=$row2['ProjektoID'];
                         $kategorija=$row2['Kategorija'];
                         $tekstas=$row2['Tekstas'];
                         $sukurimo=$row2['SukurimoData'];
                         $baigimo=$row2['BaigimoData'];
                         $padare=$row2['DarbuotojoID'];
                    }
                    
                    $sql2=mysqli_query($connection,"SELECT * FROM Projektai WHERE ID=$projektoid");
                     while($row2=mysqli_fetch_array($sql2))
                    {
                         $pavadinimas=$row2['Pavadinimas'];
                         $sukurtas=$row2['SukurimoData'];
                  
                    }
                    
                    $sql3=mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE id = $padare");
                     while($row3=mysqli_fetch_array($sql3))
                    {
                         $pvardas=$row3['vardas'];
                         $ppavarde=$row3['pavarde'];
                    }
                    
                  
                  ?>
                  
                  <h1> <b>Įmonės naujienos </b></h1>  <br>
                  <hr style='border:2px solid black; width:80%;'>
                  <div class='naujienos' style='margin-left:10%; text-align:left;'>
                       <b><h2>Naujausias įmonės darbuotojas : </h2></b><br>
                       <?php echo "<b> $grupe </b> $vardas $pavarde";?>
                  </div>
                  <br>
                       <hr style='border:2px solid black; width:80%;'>
                  <div class='naujienos' style='margin-left:10%; text-align:left;'>    
                       <b><h2>Paskutinė atlikta užduotis : </h2></b><br>
                       <b>Projektas </b> <?php echo $pavadinimas;?> <br>
                       <b>Sukurtas </b> <?php echo $sukurtas;?> <br>
                       <b>Užduoties kategorija </b> <?php echo $kategorija;?> <br>
                       <b>Užduotis </b> <?php echo $tekstas;?> <br>
                       <b>Užduotis sukurta  </b> <?php echo $sukurimo;?> <br>
                       <b>Užduotis pabaigta </b> <?php echo $baigimo;?> <br>
                       <b>Atliko </b> <?php echo "$pvardas $ppavarde";?> <br> <br>   <Br>
                    
                  </div>     
                  
                  </font>
              </div>  
              <div class='randomas' style='position:relative; clear: left; opacity:1;  margin-left:-60%; '> 
              </div>
        </div>
<?php 
 include ('copy.php');
?>
</body>
</html>