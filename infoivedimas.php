<?php
include ('dizainas.php');
include('duom.php');
?>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

  <div class='info' style='height:600px; text-align:center;'>
        <form method=POST action='uzsakymai.php' style='text-align:center'>
          <br><br><h4><b> Įveskite užklausos duomenis : </b></h4> <br>
          <b> Name: </b> <input type='text' value='' name='vardas' style='background-color:black; color:white;' required><br>
          <b> Surename: </b> <input type='text' value='' name='pavarde' style='background-color:black; color:white;' required><br>
          <b> Phone Number: </b> <input type='number' value='' name='telefonas' style='background-color:black; color:white;' required><br>
          <b> E-mail: </b> <input type='email' value='' name='email' style='background-color:black; color:white;' required><br>
          <b> Subject: </b> <input type='text' value='' name='sritis' style='background-color:black; color:white;' required><br>
          <br/>
          <b> Enquiry details: <br><textarea name='tekstas' rows='4' cols='40' style='background-color:black; color:white; border:2px solid black;' required></textarea>
           </br><br/>
          <input type='submit' id='trinti' value='Sukurti užklausą' style='border:2px solid black; border-radius:5px; color:white; background-color:black;' >
          
          </form>
          
         <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '> 
         </div>
    
  </div>
  

 
  
<?php 
 include ('copy.php');
?>
</body>
</html>