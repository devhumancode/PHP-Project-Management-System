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
b {
 color: #009fda;
}

@media screen and (min-width: 1200px) {
.projektas {
  width:400px;
  height:400px;
  text-align:center;
  margin:2.5%;
  background-color: #002776;
    float: left;
    border-radius: 50px;
    border: 2px solid #009fda;
  color:#E6E6E6;
  font-size:16.5px;
}

.virsus {
  margin-top:20px;
  height:100px;
}

.ainfo {
  height:150px;
}

.kaire{
float:left;
width:50%;
text-align:right;
}

.desine{
overflow-x:hidden;
overflow-y:hidden;
float:right;
width:50%;
margin-top:-30px;
height:30px;
margin-right:45px;
}

.uzduotys{
height:50px;
width:30%;
float:left;
margin-left:3%;
}

.fail{
width:20px;
}


.zmoniu{
height:82px;
background-color:#E6E6E6;
border-bottom-left-radius:50px ;
border-bottom-right-radius:50px ;
}
}
@media screen and (max-width: 1199px) {
.projektas {
  width:90%;
  height:400px;
  text-align:center;
  margin:5%;

  background-color:black;
  float:left;
  border-radius:50px;
  border:2px solid black;
  color:#E6E6E6;
  font-size:16.5px;
  overflow-x:hidden;
  overflow-y:hidden;
}

.kaire{
float:left;
width:50%;
text-align:right;
}

.desine{
overflow-x:hidden;
overflow-y:hidden;
float:right;
width:50%;
margin-top:-30px;
height:30px;
margin-right:45px;
}

.virsus {
  margin-top:20px;
  height:100px;
}

.ainfo {
  height:50px;
  margin-top:100px;
}

.uzduotys{
height:50px;
width:30%;
float:left;
margin-left:3%;
}

.zmoniu{
height:82px;
background-color:#E6E6E6;
border-bottom-left-radius:50px ;
border-bottom-right-radius:50px ;
}
}
</style>


<body class="body">


  

  <div class='info' style='height:auto;'>
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
             <b>  Created by </b> <?php echo $siuntejas;?>   
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Creator job title </b> <?php echo $rangas;?>   
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Task </b> <?php echo $tekstas;?>   
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Priority </b> <?php echo $svarbumas;?>
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>   
             <b>  Category </b> <?php echo $kategorija;?> 
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>  
             <b>  Status </b> <?php echo $ebusena;?>  
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             
             
             
             <?php if($busena !=1) {?> 
             <b>  Comment </b> <?php echo "$skomentaras <br> "; }?> 
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div> 
             <?php if($busena ==0) {?> 
            <div class='kaire'> <b> Attached files   </b>  </div>
             <div class='desine'>
             <form action = "uzduotiesfailai.php" method = "POST" >
             <input type='submit' src='../vaizdai/siuncia.png' name='fail' value='<?php echo $filename?>' style="border:none; background-color:black; color:white">
             </form>  </div>  
             <?php ; }?> 
                    
       
       
       
             <b>  Created </b> <?php echo $sdata;?>   <br>  
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Complete by </b> <?php echo $bdata;?>   <br> 
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                </div>
                 
                <div class='ainfo'>
                
                </div>
                 <hr style="border-top: 2px solid black;">
                <div class='zmoniu'>
                     <form method=POST action='reaguoti.php' style='float:left; margin-left:31%;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/atlikta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/pabaigta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/sunaikinti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;"> 
                     <?php }?>
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='hidden' name='pasirinkimas' value='0' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                     <form method=POST action='reaguoti.php' style='float:left'> 
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/reject.png" alt="Atmesti" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/taisyti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/persiusti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;"> 
                     <?php }?> 
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='1' hidden>
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
             <b>  Created by </b> <?php echo $siuntejas;?>   
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Creator job title </b> <?php echo $rangas;?>   
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Task </b> <?php echo $tekstas;?>   
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Priority </b> <?php echo $svarbumas;?>
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>   
             <b>  Category </b> <?php echo $kategorija;?> 
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>  
             <b>  Status </b> <?php echo $ebusena;?>  
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             
             
             
             <?php if($busena !=1) {?> 
             <b>  Comment </b> <?php echo "$skomentaras <br> "; }?> 
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div> 
             <?php if($busena ==0) {?> 
            <div class='kaire'> <b> Attached files   </b>  </div>
             <div class='desine'>
             <form action = "uzduotiesfailai.php" method = "POST" >
             <input type='submit' src='../vaizdai/siuncia.png' name='fail' value='<?php echo $filename?>' style="border:none; background-color:black; color:white">
             </form>  </div>  
             <?php ; }?> 
                    
       
       
       
             <b>  Created </b> <?php echo $sdata;?>   <br>  
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
             <b>  Complete by </b> <?php echo $bdata;?>   <br> 
             <div class='randomas' style='position:relative; clear: left; opacity:1; '> </div>
                <div class='ainfo'>
                
                </div>
                 <hr style="border-top: 2px solid black;">
                <div class='zmoniu'>
                     <form method=POST action='reaguoti.php' style='float:left; margin-left:31%;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/atlikta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/pabaigta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/sunaikinti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;"> 
                     <?php }?>
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='0' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                     
                     <form method=POST action='reaguoti.php' style='float:left'> 
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/reject.png" alt="Atmesti" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/taisyti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/persiusti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;"> 
                     <?php }?> 
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='1' hidden>
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
        
        ?>
        
          
        <?php
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
             <b>  Created by </b> <?php echo $siuntejas;?>   <br>
             <b>  Creator job title</b> <?php echo $rangas;?>   <br> 
             <b>  Task </b> <?php echo $tekstas;?>   <br> 
             <b>  Priority </b> <?php echo $svarbumas;?>   <br> 
             <b>  Category </b> <?php echo $kategorija;?>   <br> 
             <b>  Status </b> <?php echo $ebusena;?>   <br> 
             <?php if($busena !=1) {?> 
             <b>  Comment </b> <?php echo "$skomentaras <br> "; }?>  
             <?php if($busena ==0) {?> 
             <b>  Attached files   </b> 
             <form action = "uzduotiesfailai.php" method = "POST" style='position:absolute; margin-left:260px; margin-top:-29px; '>
             <input type='submit' src='../vaizdai/siuncia.png' name='failas' value='<?php echo $filename?>' style="border:none; background-color:black; color:white">
             </form>  <br>  
             <?php ; }?> 
             <b>  Created </b> <?php echo $sdata;?>   <br> 
             
             <b>  Complete by </b> <?php echo $bdata;?>   <br> 
                </div>
                 
                <div class='ainfo'>
                
                </div>
                 <hr style="border-top: 2px solid black;">
                <div class='zmoniu'>
                     <form method=POST action='reaguoti.php' style='float:left; margin-left:31%;'>
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/atlikta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/pabaigta.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/sunaikinti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;"> 
                     <?php }?>
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='0' hidden>
                     <input type='hidden' name='veiksmas' value='<?php echo $veiksmas;?>' hidden>
                     <input type='hidden' name='uid' value='<?php echo $uid;?>' hidden>
                     <input type='submit' id='trinti' value='' hidden>
                     </form>
                     
                     <form method=POST action='reaguoti.php' style='float:left'> 
                     <?php if($busena==1){?>    
                     <input type='image' src="../vaizdai/reject.png" alt="Atmesti" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==0){?>
                     <input type='image' src="../vaizdai/taisyti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;">
                     <?php }elseif($busena==3){ ?>
                     <input type='image' src="../vaizdai/persiusti.png" alt="Atlikta" value='<?php echo $id; ?>' name='siuntejas' style="width:40px;height:40px; margin-left:20px;"> 
                     <?php }?> 
                     <input type='hidden' name='siuntejas' value='<?php echo $siuntejas;?>' hidden>
                     <input type='hidden' name='svarbumas' value='<?php echo $svarbumas;?>' hidden>
                     <input type='hidden' name='kategorija' value='<?php echo $kategorija;?>' hidden>
                     <input type='hidden' name='busena' value='<?php echo $busena;?>' hidden>
                     <input type='hidden' name='pasirinkimas' value='1' hidden>
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
                  <a href='projektai.php'>
                      <img src="../vaizdai/grizti.png" alt="pridėti" style="width:40px;height:40px; margin-top:30px; position:center; margin-bottom:20px;">
                  </a>   
              </div>
   </div>  
   
<?php 
 include ('copy.php');
?> 
   </body>
   </html>