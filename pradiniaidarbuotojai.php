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
    
    $("#vardas_input_"+ID).show();
    $("#pavarde_input_"+ID).show();
    $("#numeris_input_"+ID).show();

}).change(function()
{
    var ID=$(this).attr('id');
    var vardas=$("#vardas_input_"+ID).val();
    var pavarde=$("#pavarde_input_"+ID).val();
    var numeris=$("#numeris_input_"+ID).val();

var dataString = 'id='+ ID +'&vardas='+vardas+'&pavarde='+pavarde+'&numeris='+numeris;



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


</head>

<body>

       

<table width='100%' class='table' style='margin-left:2%; text-align:center;'>
<tr>  
  <th style="width:20%; text-align: center;">   
    Name
  </th>
  
  <th style="width:20%; text-align: center;">   
    Surname
  </th>
  
  <th style="width:20%; text-align: center;">   
    Phone no.
  </th>
   
  <th style="width:20%; text-align: center;">   
    Job title
  </th>
  
  <th style="width:20%; text-align: center;">   
    Total logins
  </th>
  
  <th style="width:20%">   
    More
  </th>
  
  <th style="width:20%">   
    Delete
  </th>
</tr>

<?php
include('duom.php');
$sql=mysqli_query($connection,"select * from Prisijungimas");
while($row=mysqli_fetch_array($sql))
{
$vardas=$row['vardas'];
$pavarde=$row['pavarde'];
$numeris=$row['tel_nr'];
$prisijungimas=$row['prisijungimu'];
$klase=$row['class'];
$id=$row['id'];

             $sql2=mysqli_query($connection,"SELECT * FROM Grupes WHERE Grupe=$klase ");  
             while($row2=mysqli_fetch_array($sql2))
             {
             $grupe=$row2['Pavadinimas']; 
                        
?>
<tr id="<?php echo $id; ?>" class="darbuotojas">



<td class="darbuotojas_td">
<span id="vardas_<?php echo $id; ?>" class="text"><?php echo $vardas; ?></span> 
<input type="text" value="<?php echo $vardas; ?>" class="editbox" id="vardas_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

<td class="darbuotojas_td">
<span id="pavarde_<?php echo $id; ?>" class="text"><?php echo $pavarde; ?></span> 
<input type="text" value="<?php echo $pavarde; ?>" class="editbox" id="pavarde_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

<td class="darbuotojas_td">
<span id="numeris_<?php echo $id; ?>" class="text"><?php echo $numeris; ?></span> 
<input type="number" value="<?php echo $numeris; ?>" class="editbox" id="numeris_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

<td class="darbuotojas_td">
<span id="ids_<?php echo $id; ?>" class="text"><?php echo $grupe; ?></span> 

</td>

 <td class="darbuotojas_td">
<span id="id_<?php echo $id; ?>" class="text"><?php echo $prisijungimas; ?></span> 
</td>


<td>
     <form action = "adarbuotojai.php" method = "POST">
     <input type='image' src='vaizdai/daugiau.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
     <input type='text' value='<?php echo $vardas; ?>' name='vardas' hidden>
     <input type='hidden' name='id' value='<?php echo $id;?>'>
     <input type='text' value='<?php echo $pavarde; ?>' name='pavarde' hidden>
     <input type='submit' id='trinti' value='' hidden>
     </form>
</td>


<td>
      <form action = "trina.php" method = "POST">
          <input type='image' src='vaizdai/trina.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
          <input type='text' value='<?php echo $vardas; ?>' name='vardas' hidden>
          <input type='hidden' name='id' value='<?php echo $id;?>'>
          <input type='text' value='<?php echo $pavarde; ?>' name='pavarde' hidden>
          <input type='submit' id='trinti' value='' hidden>
     </form>
</td>

</tr>
<?php
}
}
?>
</table>