<head>
<script type="text/javascript">
$(document).ready(function()
{
$(".editbox").hide();
$(".text").show();
$(".darbuotojas").click(function()
{
    var ID=$(this).attr('id');
    $("#vardas_"+ID).hide();
    $("#pavarde_"+ID).hide();
    $("#numeris_"+ID).hide();
    $("#slapyvardis_"+ID).hide();
    $("#slaptazodis_"+ID).hide();
    $("#pastas_"+ID).hide();
    
    $("#vardas_input_"+ID).show();
    $("#pavarde_input_"+ID).show();
    $("#numeris_input_"+ID).show();
    $("#slapyvardis_input_"+ID).show();
    $("#slaptazodis_input_"+ID).show();
    $("#pastas_input_"+ID).show();

}).change(function()
{
    var ID=$(this).attr('id');
    var vardas=$("#vardas_input_"+ID).val();
    var pavarde=$("#pavarde_input_"+ID).val();
    var numeris=$("#numeris_input_"+ID).val();
    var slapyvardis=$("#slapyvardis_input_"+ID).val();
    var slaptazodis=$("#slaptazodis_input_"+ID).val();
    var pastas=$("#pastas_input_"+ID).val();

var dataString = 'id='+ ID +'&vardas='+vardas+'&pavarde='+pavarde+'&numeris='+numeris+'&slapyvardis='+slapyvardis+'&slaptazodis='+slaptazodis+'&pastas='+pastas;



$.ajax({
type: "POST",
url: "pakeicia1.php",
data: dataString,
cache: false,
success: function(html)
{
$("#vardas_"+ID).html(vardas);
$("#pavarde_"+ID).html(pavarde);
$("#numeris_"+ID).html(numeris);
$("#slapyvardis_"+ID).html(slapyvardis);
$("#slaptazodis_"+ID).html(slaptazodis);
$("#pastas_"+ID).html(pastas);
$("#id_"+ID).html(ID);
}
});

});

// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>

<style>
input[type="file"] {
    display: none;
}

.table {
min-width:321px;
width:30%;
margin-left:20px;
text-align:center; 
float:left;
margin-top:20px;
}

table, th, td {
width:321px;
height:45px;
background-color:white;
color:black;
}

input {
background-color:black;
color:white;
width:200px;
}

.text{
width:200px;
}
.statistika{
width:33%;
float:left;
text-align:center;
font-weight: bold;
}
.custom-file-upload{
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}    
</style>

</head>

<body>



<?php
include('duom.php');
$idy=$_SESSION['id'];

$failasssss=$_SESSION['blogasfailas'];
if ($failasssss==10)
{
?>
<script>
alert("Įkėlėte ne nuotrauką...");
</script>
<?php
}

$sql10=mysqli_query($connection,"select * from ProjektuPrivilegijos WHERE VartotojoID=$idy");
$dalyvaujap = mysqli_num_rows($sql10);

$sql10=mysqli_query($connection,"select * from ProjektuPrivilegijos WHERE VartotojoID=$idy AND Teises=1");
$adminas = mysqli_num_rows($sql10);

$sql10=mysqli_query($connection,"select * from ProjektuUzduotys WHERE SukureID=$idy AND Busena=2");
$pabaige = mysqli_num_rows($sql10);

$sql3=mysqli_query($connection,"SELECT * FROM `ProfilioFoto` WHERE user = $idy");
$tikrinimas = mysqli_num_rows($sql3);

if($tikrinimas==0)
{
 $sql3=mysqli_query($connection,"INSERT INTO ProfilioFoto (`foto`, `user`) VALUES ('$idy', '$idy');");
}



$sql=mysqli_query($connection,"select * from Prisijungimas WHERE id=$idy");
while($row=mysqli_fetch_array($sql))
{
$vardas=$row['vardas'];
$pavarde=$row['pavarde'];
$numeris=$row['tel_nr'];
$prisijungimas=$row['prisijungimu'];
$klase=$row['class'];
$id=$row['id'];
$slapyvardis=$row['username'];
$slaptazodis=$row['password'];
$pastas=$row['email'];
 $prisijunge=$row['prisijungimo_data'];

$sql20=mysqli_query($connection,"select * from Grupes WHERE Grupe=$klase");
while($row20=mysqli_fetch_array($sql20))
{
   $pareigos=$row20['Pavadinimas'];
 }

             $sql2=mysqli_query($connection,"SELECT * FROM ProfilioFoto WHERE user=$idy ");  
             while($row2=mysqli_fetch_array($sql2))
             {
             $foto=$row2['foto'];
             $_SESSION['sena']=$foto;
             $fotoid=$row2['id'];
             }
                        
?>
<div class='paveiksliukas' style='width:250px;;  min-height:400px;height:auto%; margin-top:20px; margin-left:20px; background-color:white; float:left; text-align:center;'>
     <img src='../profiliofoto/<?php echo $foto ; ?>' style='width:200px; height:200px; border-radius:50%; border:4px solid grey;'> 
</div>                                                                        




<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Name</b>
</td>

<td class="darbuotojas_td">
<div id="vardas_<?php echo $id; ?>" class="text"><?php echo $vardas; ?></div> 
<input type="text" value="<?php echo $vardas; ?>" class="editbox" id="vardas_input_<?php echo $id; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>




<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Surname</b>
</td>

<td class="darbuotojas_td">
<div id="pavarde_<?php echo $id; ?>" class="text"><?php echo $pavarde; ?></div> 
<input type="text" value="<?php echo $pavarde; ?>" class="editbox" id="pavarde_input_<?php echo $id; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>


<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Phone no.</b>
</td>


<td class="darbuotojas_td">
<div id="numeris_<?php echo $id; ?>" class="text"><?php echo $numeris; ?></div> 
<input type="number" value="<?php echo $numeris; ?>" class="editbox" id="numeris_input_<?php echo $id; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>



<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Email</b>
</td>


<td class="darbuotojas_td">
<div id="pastas_<?php echo $id; ?>" class="text"><?php echo $pastas; ?></div> 
<input type="text" value="<?php echo $pastas; ?>" class="editbox" id="pastas_input_<?php echo $id; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>



<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Username</b>
</td>


<td class="darbuotojas_td">
<div id="slapyvardis_<?php echo $id; ?>" class="text"><?php echo $slapyvardis; ?></div> 
<input type="text" value="<?php echo $slapyvardis; ?>" class="editbox" id="slapyvardis_input_<?php echo $id; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>


<table width='50%' class='table' style=''>
<tr id="<?php echo $id; ?>" class="darbuotojas">

<td>
   <b>Password</b>
</td>


<td class="darbuotojas_td">
<div id="slaptazodis_<?php echo $id; ?>" class="text"><?php echo $slaptazodis; ?></div> 
<input type="text" value="<?php echo $slaptazodis; ?>" class="editbox" id="slaptazodis_input_<?php echo $id; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>

<table width='50%' class='table' style=''>
<tr><td><b>Job Title</b></td><td>
<div class="text"><?php echo $pareigos; ?></div> </td></tr></table>


<table width='50%' class='table' style=''>
<tr><td><b>Last online</b></td><td>
<div class="text"><?php echo $prisijunge; ?>
</div></td></tr></table>

   <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:150px; '> 
   </div>

  <div class='visas' style='text-align:center width:100%;'>
    <h3><b>Statistics of the employee </b> </h3>
  </div>
   <hr style='border:2px solid black ;width:85%;'>
<div class='statistika'>
    Number of tasks completed:  <Br>
</div>

<div class='statistika'>
    Number of projects with admin rights:  <br>
</div>

<div class='statistika'>
    Number of projects participating in: <br>
</div>

<div class='statistika' style='color:#0B610B;'>
    <?php echo $pabaige ; ?>
</div>

<div class='statistika' style='color:#0B610B;'>
    <?php echo $adminas ; ?>
</div>

<div class='statistika' style='color:#0B610B;'>
    <?php echo $dalyvaujap ; ?>
</div>

   <br>
                                                      
              <div class='randomas' style='position:relative; clear: left; opacity:1; margin-top:150px; '> 
                  <form action="keiciafoto.php" method="post" enctype="multipart/form-data">
                         <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>Choose profile picture
                        </label>
                        <input id="file-upload" name="fileToUpload" type="file">
                            <div style='clear:left;'>
                            </div>
                      <input type='hidden' name='fotoid' value='<?php echo $fotoid; ?>'>
                      <input type="submit" value="UPLOAD" name="submit" style='width: 60%;  margin-top: 2em; height:30px;display:inline; color:white; background-color:black;'>
                  </form>
              </div>

<?php
}
?>
