<script type="text/javascript">
$(document).ready(function()
{
$(".editbox").hide();
$(".text").show();
$(".darbuotojas").click(function()
{
    var ID=$(this).attr('id');
    $("#pavadinimas_"+ID).hide();
    $("#aprasymas_"+ID).hide();
    $("#deadline_"+ID).hide();

    
    $("#pavadinimas_input_"+ID).show();
    $("#aprasymas_input_"+ID).show();
    $("#deadline_input_"+ID).show();


}).change(function()
{
    var ID=$(this).attr('id');
    var pavadinimas=$("#pavadinimas_input_"+ID).val();
    var aprasymas=$("#aprasymas_input_"+ID).val();
    var deadline=$("#deadline_input_"+ID).val();

var dataString = 'id='+ ID +'&pavadinimas='+pavadinimas+'&aprasymas='+aprasymas+'&deadline='+deadline;



$.ajax({
type: "POST",
url: "pakeicia2.php",
data: dataString,
cache: false,
success: function(html)
{
$("#pavadinimas_"+ID).html(pavadinimas);
$("#aprasymas_"+ID).html(aprasymas);
$("#deadline_"+ID).html(deadline);
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


                                                                



<table class='table'>
<tr id="<?php echo $projektoid; ?>" class="darbuotojas">

<td>
   <b>Pavadinimas</b>
</td>

<td class="darbuotojas_td">
<div id="pavadinimas_<?php echo $projektoid; ?>" class="text"><?php echo $pavadinimas; ?></div> 
<input type="text" value="<?php echo $pavadinimas; ?>" class="editbox" id="pavadinimas_input_<?php echo $projektoid; ?>" style='text-align:center; margin:0px;'/>
</td>
</tr>
</table>




<table class='table' >
<tr id="<?php echo $projektoid; ?>" class="darbuotojas">

<td>
   <b>Aprašymas</b>
</td>

<td class="darbuotojas_td">
<div id="aprasymas_<?php echo $projektoid; ?>" class="text"><?php echo $aprasymas; ?></div>
<textarea style='background-color:black; color:white; width:300px;' class="editbox" id="aprasymas_input_<?php echo $projektoid; ?>" style='text-align:center; margin:0px;'/><?php echo $aprasymas ?></textarea>
</td>
</tr>
</table>


<table class='table'>
<tr id="<?php echo $projektoid; ?>" class="darbuotojas">

<td>
   <b>Atlikti iki</b>
</td>


<td class="darbuotojas_td">
<div id="deadline_<?php echo $projektoid; ?>" class="text"><?php echo $deadline; ?></div> 
<input type="text" value="<?php echo $deadline; ?>" class="editbox" id="deadline_input_<?php echo $projektoid; ?>" style='text-align:center; margin:0px;'/>

</td>
</tr>
</table>


