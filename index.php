<?php
include ('dizainas.php');
session_start();
$_SESSION['incurrect'] =0;
?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body class="body">

  <div class='info' style='height:auto;'>
    <?php
    $failas="tekstai/pagrindinis.txt"; 
     
    $duomenys = fopen($failas, "r"); 
    $informacija = fread($duomenys, filesize($failas)); 
    fclose($duomenys); 
     
    echo "$informacija  </br>"; 
?>

<br>

   
     </br>
    
  </div>
  
<?php 
 include ('skirtukas.php');
?>
<div class="info">
        <br><h2>Create a ticket to register it on the system:</h2><br>
  
    <form method="POST" class="form-contact" action="infoivedimas.php" style="margin-left:1%; float:left; margin-top:20px;">
	<div class="forma2" >
    <div class="nuotrauka" style="background-image: url(&quot;vaizdai/hosting.png&quot;)">
    
    </div>
		<div class="tekstas2">
        If you have any enquiries please <a href="mailto:info@humancode.dev">get in touch</a>.
		</div>			
    <a href="infoivedimas.php">	
    <div class="mygtukas">
         <b><span>Freelance</span></b>
    </div>
    </a>
	</div>
    <input type="hidden" value="Hosting" name="paslauga">
    </form>
  
    <form method="POST" class="form-contact" action="infoivedimas.php" style="margin-left:1%; float:left; margin-top:20px;">
	<div class="forma2">
    <div class="nuotrauka" style="background-image: url(&quot;vaizdai/webing.png&quot;)">
     
    </div>
		<div class="tekstas2">
        This is a demo showcase that registers your ticket on the actual database and is visable to system users.
		</div>
        <a href="infoivedimas.php">			
    <div class="mygtukas">
         <b><span>Job Offer</span></b>
    </div>
     </a>
	</div>
    <input type="hidden" value="Webing" name="paslauga">
    </form>
    
    



    
	<div class="randomas" style="position:relative; clear: left; opacity:0; margin-top:30px; "> 
     
    </div>
</div>
<?php 
 include ('copy.php');
?>
</body>
</html>