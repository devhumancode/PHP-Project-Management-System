<script type="text/javascript">
$(document).ready(function()
{
$(".editbox").hide();
$(".text").show();
$(".darbuotojas").click(function()
{
    var ID=$(this).attr('id');
    $("#username_"+ID).hide();
    $("#password_"+ID).hide();
    $("#email_"+ID).hide();
    $("#group_"+ID).hide();
    
    $("#username_input_"+ID).show();
    $("#password_input_"+ID).show();
    $("#email_input_"+ID).show();
    $("#group_input_"+ID).show();

}).change(function()
{
    var ID=$(this).attr('id');
    var username=$("#username_input_"+ID).val();
    var password=$("#password_input_"+ID).val();
    var email=$("#email_input_"+ID).val();
    var group=$("#group_input_"+ID).val();

var dataString = 'id='+ ID +'&username='+username+'&password='+password+'&email='+email+'&group='+group;


if(username.length<5)
{
alert('Pasirinkite ilgesnį slapyvardį');
}
else if(group.length<1)
{
alert('Priskirkite vartotoją grupei');
}
else if(password.length<6)
{
alert('Pasirinkite ilgesnį slaptažodį');
}
else if(email.length<6)
{
alert('Pasirinkite ilgesnį el. paštą');
}
else
{
$.ajax({
type: "POST",
url: "pakeicia.php",
data: dataString,
cache: false,
success: function(html)
{
$("#username_"+ID).html(username);
$("#password_"+ID).html(password);
$("#email_"+ID).html(email);
$("#group_"+ID).html(group);
$("#id_"+ID).html(ID);
}
});
}

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
  <th style="width:20%">   
    Vartotojo vardas
  </th>
  
  <th style="width:20%">   
    Slaptažodis
  </th>
  
  <th style="width:20%">   
    El. paštas
  </th>
   
  <th style="width:20%">   
    Grupė
  </th>
  
  <th style="width:20%">   
    Id
  </th>
  
  <th style="width:20%">   
    Trinti
  </th>
</tr>

<?php
include('duom.php');
$connection = mysqli_connect($host,$user,$password)
or die ("Negalima prisijungti prie serverio");
$db = mysqli_select_db($database,$connection)
or die ("Nera duomenu bazes");
$sql=mysqli_query($connection,"SELECT * FROM Prisijungimas WHERE vardas='$vardas' AND pavarde='$pavarde'");
while($row=mysqli_fetch_array($sql))
{
$id=$row['id'];
$username=$row['username'];
$password=$row['password'];
$email=$row['email'];
$group=$row['class'];

?>
<tr id="<?php echo $id; ?>" class="darbuotojas">



<td class="darbuotojas_td">
<span id="username_<?php echo $id; ?>" class="text"><?php echo $username; ?></span> 
<input type="text" value="<?php echo $username; ?>" class="editbox" id="username_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

<td class="darbuotojas_td">
<span id="password_<?php echo $id; ?>" class="text"><?php echo $password; ?></span> 
<input type="text" value="<?php echo $password; ?>" class="editbox" id="password_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

<td class="darbuotojas_td">
<span id="email_<?php echo $id; ?>" class="text"><?php echo $email; ?></span> 
<input type="text" value="<?php echo $email; ?>" class="editbox" id="email_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

<td class="darbuotojas_td">
<span id="group_<?php echo $id; ?>" class="text"><?php echo $group; ?></span> 
<input type="text" value="<?php echo $group; ?>" class="editbox" id="group_input_<?php echo $id; ?>" style='text-align:center;'/>
</td>

 <td class="darbuotojas_td">
<span id="id_<?php echo $id; ?>" class="text"><?php echo $id; ?></span> 
</td>

<td>
     <form action = "trina.php" method = "POST">
     <input type='image' src='vaizdai/trina.png' value='<?php echo $id; ?>' name='id' style="width:20px; height:20px;">
     <input type='submit' id='trinti' value='' hidden>
     </form>
</td>

</tr>
<?php
}
?>
</table>

