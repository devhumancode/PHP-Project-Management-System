<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

include ('userdizainas.php');
?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="UTF-8">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<style>
.projektas {
  width:95%;
  height:auto;
  text-align:center;
  margin:2.5%;
  background-color: #002776;
  float:left;
  border-radius:50px;
  border:2px solid #009fda;
  color:#E6E6E6;
  font-size:16.5px;
}

.kaire{
width:49%;
float:left;
text-align:right;
}

.desine{
height:23px;
text-align:left;
width:49%;
float:right;
overflow-x: hidden;
overflow-y: hidden;
}

.virsus {
  margin-top:20px;
  height:100px;
}

.ainfo {
  height:150px;
}

.uzduotys{
height:50px;
width:30%;
float:left;
margin-left:3%;
}

.zmoniu{
margin-left:20%;
width:60%;
height:50px;
background-color:#009fda;
border-bottom-left-radius:0;
border-bottom-right-radius:0;
}
</style>


<body class="body">


  
<?php      
 include ('skirtukas.php');
?>

  <div class='info' style='height:auto;'>
  <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:; '> 
                  <a href='uzduotys.php'>
                      <img src="../vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
                  </a>   
              </div>
      <?php 

        include("duom.php");
        $teises=$_POST['teises'];
        $veiksmas=$_POST['veiksmas'];
        $projektas=$_POST['projektoid'];
        $id = $_SESSION['id'];   
        
        
        if($veiksmas==1)
        {
        
        if($teises==1)
        {
         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND Busena!=2"); 
         }
         else
         {
         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND DarbuotojoID='$id' AND Busena!=2"); 
         } 
         while($row=mysqli_fetch_array($sql))
         {
         $sukure=$row['SukureID'];
         $tekstas=$row['Tekstas'];
         $svarba=$row['Svarba'];
         $sdata=$row['SukurimoData'];
         $bdata=$row['BaigimoData'];
         $busena=$row['Busena'];
         $kategorija=$row['Kategorija'];
         $uid=$row['ID'];
         $skomentaras=$row['AtsakymoTekstas'];
         $filename=$row['Failas'];
        
         $sql2=mysqli_query($connection,"SELECT * FROM  Prisijungimas WHERE id='$sukure'");
         while($row2=mysqli_fetch_array($sql2))
         {   
         $siuntejoid=$row2['id'];
         $vardas=$row2['vardas'];
         $pavarde=$row2['pavarde'];
         $klase=$row2['class'];
         $siuntejas="$vardas $pavarde";
         $foto=$row2['foto'];
         $sql4=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe='$klase'");
         while($row4=mysqli_fetch_array($sql4))
         { 
         $rangas=$row4['Pavadinimas'];
         }
         
         $sql3=mysqli_query($connection,"SELECT * FROM Svarba WHERE Skaicius='$svarba'");
         while($row3=mysqli_fetch_array($sql3))
         { 
         $svarbumas=$row3['Reiksme'];
         }
         
         $sql5=mysqli_query($connection,"SELECT * FROM Busenos WHERE Skaicius='$busena'");
         while($row5=mysqli_fetch_array($sql5))
         { 
         $ebusena=$row5['Reiksme'];
         }
                  
        ?>
         
           <div class='projektas'>
                <div class='virsus'>
             <div class='kaire'><b>  Author </b> </div><div class='desine'> <?php echo $siuntejas;?> </div>
             <div class='kaire'><b>  Author job title </b> </div> <div class='desine'> <?php echo $rangas;?></div>   
             <div class='kaire'><b>  Task </b> </div> <div class='desine'><?php echo $tekstas;?></div>
             <div class='kaire'><b>  Priority </b> </div> <div class='desine'><?php echo $svarbumas;?> </div>  
             <div class='kaire'><b>  Category </b> </div> <div class='desine'><?php echo $kategorija;?> </div> 
             <div class='kaire'><b>  Status </b> </div> <div class='desine'> <?php echo $ebusena;?> </div>  
             
             
             
             
             <div class='kaire'><b>  Author comment </b> </div><div class='desine'><?php echo "$skomentaras <br> "; }?>   </div>
             <div class='kaire'><b>  Attached file   </b> </div><div class='desine' style='height:23px;'>
             <form action = "uzduotiesfailai.php" method = "POST" style=' margin-left: -10px; margin-top: -7px; width:auto;};'>
             <input type='submit' src='../vaizdai/siuncia.png' name='failas' value='<?php echo $filename?>' style="border:none; background-color:black; color:white">
             </form>  <br>      </div>

             <div class='kaire'><b>  Created </b> </div> <div class='desine'> <?php echo $sdata;?> </div>    
             <div class='kaire'><b>  Complete by </b> </div> <div class='desine'> <?php echo $bdata;?>  </div>  
                
             </div>
                 
                <div class='ainfo'>
                
                </div>
                 <hr style="border-top: 2px solid black;">
                <div class='zmoniu'>
                
                     <form method=POST action='reaguoti.php' style='float:left; width:49%; text-align:right;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/atlikta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px;  ">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/pabaigta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; ">  
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/sunaikinti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; "> 
                     <?php }?>
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='0' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='bybs' value='69' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                     <form method=POST action='reaguoti.php' style='float:right; width:49%; text-align:left;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/reject.png" alt="Atmesti" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; ;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/taisyti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/persiusti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; "> 
                     <?php }?> 
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='1' hidden>
                     <input type='hidden' name='bybs' value='69' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                </div>
                
                <div class='uzduotys'>
                
                </div>
          </div>
              
         
         
         <?php 
        }
        }
        
        elseif($veiksmas==2)
         {
        if($teises==1)
        {
         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND Busena=0");  
         }
         else
         {
         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND DarbuotojoID='$id' AND Busena=0"); 
         } 
              
         while($row=mysqli_fetch_array($sql))
         {
         $sukure=$row['SukureID'];
         $tekstas=$row['Tekstas'];
         $svarba=$row['Svarba'];
         $sdata=$row['SukurimoData'];
         $bdata=$row['BaigimoData'];
         $busena=$row['Busena'];
         $kategorija=$row['Kategorija'];
         $filename=$row['Failas'];
         $uid=$row['ID'];
        
         $sql2=mysqli_query($connection,"SELECT * FROM  Prisijungimas WHERE id='$sukure'");
         while($row2=mysqli_fetch_array($sql2))
         { 
         $siuntejoid=$row2['id'];
         $vardas=$row2['vardas'];
         $pavarde=$row2['pavarde'];
         $klase=$row2['class'];
         $siuntejas="$vardas $pavarde"; 
         
         $sql4=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe='$klase'");
         while($row4=mysqli_fetch_array($sql4))
         { 
         $rangas=$row4['Pavadinimas'];
         }
         
         $sql3=mysqli_query($connection,"SELECT * FROM Svarba WHERE Skaicius='$svarba'");
         while($row3=mysqli_fetch_array($sql3))
         { 
         $svarbumas=$row3['Reiksme'];
         }
         
         $sql5=mysqli_query($connection,"SELECT * FROM Busenos WHERE Skaicius='$busena'");
         while($row5=mysqli_fetch_array($sql5))
         { 
         $ebusena=$row5['Reiksme'];
         }
                  
        ?>
         
          <div class='projektas'>
                <div class='virsus'>
             <div class='kaire'><b>  Author </b> </div><div class='desine'> <?php echo $siuntejas;?> </div>
             <div class='kaire'><b>  Author job title </b> </div> <div class='desine'> <?php echo $rangas;?></div>   
             <div class='kaire'><b>  Task </b> </div> <div class='desine'><?php echo $tekstas;?></div>
             <div class='kaire'><b>  Priority </b> </div> <div class='desine'><?php echo $svarbumas;?> </div>  
             <div class='kaire'><b>  Category </b> </div> <div class='desine'><?php echo $kategorija;?> </div> 
             <div class='kaire'><b>  Status </b> </div> <div class='desine'> <?php echo $ebusena;?> </div>  
             
             
             
             
             <div class='kaire'><b>  Author comment </b> </div><div class='desine'><?php echo "$skomentaras <br> "; }?>   </div>
             <div class='kaire'><b>  Attached file </b> </div><div class='desine' style='height:23px;'>
             <form action = "uzduotiesfailai.php" method = "POST" style=' margin-left: -10px; margin-top: -7px; width:auto;};'>
             <input type='submit' src='../vaizdai/siuncia.png' name='failas' value='<?php echo $filename?>' style="border:none; background-color:black; color:white">
             </form>  <br>      </div>

             <div class='kaire'><b>  Created </b> </div> <div class='desine'> <?php echo $sdata;?> </div>    
             <div class='kaire'><b>  Complete by </b> </div> <div class='desine'> <?php echo $bdata;?>  </div>  
                
             </div>
                 
                <div class='ainfo'>
                
                </div>
                 <hr style="border-top: 2px solid black;">
                <div class='zmoniu'>
                
                     <form method=POST action='reaguoti.php' style='float:left; width:49%; text-align:right;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/atlikta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px;  ">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/pabaigta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; ">  
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/sunaikinti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; "> 
                     <?php }?>
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='0' hidden>
                     <input type='hidden' name='bybs' value='69' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                     <form method=POST action='reaguoti.php' style='float:right; width:49%; text-align:left;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/reject.png" alt="Atmesti" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; ;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/taisyti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/persiusti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; "> 
                     <?php }?> 
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='1' hidden>
                     <input type='hidden' name='bybs' value='69' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                </div>
                
                <div class='uzduotys'>
                
                </div>
          </div>
              
         
         
         <?php 
        }
        }
        elseif($veiksmas==3)
        {
         $data=date("Y-m-d");
        if($teises==1)
        {
         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND BaigimoData='$data'");
         }
         else
         {
         $sql=mysqli_query($connection,"SELECT * FROM  ProjektuUzduotys WHERE ProjektoID='$projektas' AND DarbuotojoID='$id' AND BaigimoData='$data'");
         } 
       
        
         while($row=mysqli_fetch_array($sql))
         {
         $sukure=$row['SukureID'];
         $tekstas=$row['Tekstas'];
         $svarba=$row['Svarba'];
         $sdata=$row['SukurimoData'];
         $bdata=$row['BaigimoData'];
         $busena=$row['Busena'];
         $kategorija=$row['Kategorija'];
         $filename=$row['Failas'];
         $uid=$row['ID'];
        
         $sql2=mysqli_query($connection,"SELECT * FROM  Prisijungimas WHERE id='$sukure'");
         while($row2=mysqli_fetch_array($sql2))
         { 
         $siuntejoid=$row2['id'];
         $vardas=$row2['vardas'];
         $pavarde=$row2['pavarde'];
         $klase=$row2['class'];
         $siuntejas="$vardas $pavarde";  
         
         $sql4=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe='$klase'");
         while($row4=mysqli_fetch_array($sql4))
         { 
         $rangas=$row4['Pavadinimas'];
         }
         
         $sql3=mysqli_query($connection,"SELECT * FROM Svarba WHERE Skaicius='$svarba'");
         while($row3=mysqli_fetch_array($sql3))
         { 
         $svarbumas=$row3['Reiksme'];
         }
                  
        ?>
         
           <div class='projektas'>
                <div class='virsus'>
             <div class='kaire'><b>  Author </b> </div><div class='desine'> <?php echo $siuntejas;?> </div>
             <div class='kaire'><b>  Author comment </b> </div> <div class='desine'> <?php echo $rangas;?></div>   
             <div class='kaire'><b>  Task </b> </div> <div class='desine'><?php echo $tekstas;?></div>
             <div class='kaire'><b>  Priority </b> </div> <div class='desine'><?php echo $svarbumas;?> </div>  
             <div class='kaire'><b>  Category </b> </div> <div class='desine'><?php echo $kategorija;?> </div> 
             <div class='kaire'><b>  Status </b> </div> <div class='desine'> <?php echo $ebusena;?> </div>  
             
             
             
             
             <div class='kaire'><b>  Author comment </b> </div><div class='desine'><?php echo "$skomentaras <br> "; }?>   </div>
             <div class='kaire'><b>  Attached file </b> </div><div class='desine' style='height:23px;'>
             <form action = "uzduotiesfailai.php" method = "POST" style=' margin-left: -10px; margin-top: -7px; width:auto;};'>
             <input type='submit' src='../vaizdai/siuncia.png' name='failas' value='<?php echo $filename?>' style="border:none; background-color:black; color:white">
             </form>  <br>      </div>

             <div class='kaire'><b>  Created </b> </div> <div class='desine'> <?php echo $sdata;?> </div>    
             <div class='kaire'><b>  Complete by </b> </div> <div class='desine'> <?php echo $bdata;?>  </div>  
                
             </div>
                 
                <div class='ainfo'>
                
                </div>
                 <hr style="border-top: 2px solid black;">
                <div class='zmoniu'>
                
                     <form method=POST action='reaguoti.php' style='float:left; width:49%; text-align:right;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/atlikta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px;  ">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/pabaigta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; ">  
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/sunaikinti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; "> 
                     <?php }?>
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='0' hidden>
                     <input type='hidden' name='bybs' value='69' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                     <form method=POST action='reaguoti.php' style='float:right; width:49%; text-align:left;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/reject.png" alt="Atmesti" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; ;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/taisyti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/persiusti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; "> 
                     <?php }?> 
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='1' hidden>
                     <input type='hidden' name='bybs' value='69' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                </div>
                
                <div class='uzduotys'>
                
                </div>
          </div>
              
         
         
         <?php 
        }
        }
     
         

        $sql=mysqli_query($connection,"SELECT * FROM  ProjektuPrivilegijos WHERE VartotojoID='$id'");
        while($row=mysqli_fetch_array($sql))
        {
         $zmoniu=0;
         $projektas=$row['ProjektoID'];
         $teises=$row['Teises'];
         }
      
         ?> 
         <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:30px; '> 
                  <a href='uzduotys.php'>
                      <img src="../vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
                  </a>   
              </div>
   </div>  
   
<?php 
 include ('copy.php');
?> 
   </body>
   </html>