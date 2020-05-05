<!DOCTYPE html>
<html lang="lt">

<head>
    <link rel="shortcut icon" href="../vaizdai/skirtukas.png" type="image/x-icon">
           <title>WebMan</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> 
    <link rel="stylesheet" type="text/css" href="userstyle.css">

         <script src="../js/jquery.js"></script>

        <script>
          function menu_toggle(){
              document.getElementById("hamburger").classList.toggle("active");
              document.getElementById("overlay").classList.toggle("active");
          }       
        </script>
</head>

 
            
<body class='body'>
<ul id="overlay" style="font-size: 0.8em !important;">

<li>
                      <a href="projektai.php">Projects</a>
                    </li> 
                      
                    <li>
                        <a href="darbogrupes.php">Work Groups</a>
                    </li>
                    <li>
                        <a href="uzduotys.php">Tasks</a>
                    </li>
                    <li>
                        <a href="showfile.php">Files</a>
                    </li>

                     <li>
                      <a href="profilis.php">Profile</a>
                    </li> 
                    
                     <li>
                      <a href="zinutes.php">Messages</a>
                    </li>

                    <li>
                      <a href="cy@.php"><img src="../vaizdai/iseiti.png" alt="" style="width:40px; height:40px;   margin-top:-10px;"></a>
                    </li>  
                  </ul>




    <nav class="navbar-inverse navbar-top" role="navigation" id='virsus' style=" color:black;">
        <div class="container">

            <div class="navbar-header">
                <a class="navbar-brand" href="user.php">
                <img src="../vaizdai/logo.png" alt="" style="width:40px; height:40px; margin-top:-10px; border-radius: 50%; background: #fff;">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  style="font-size: 0.8em !important;">
                <ul class="nav navbar-nav">
                     
                
                     <li>
                      <a href="projektai.php">Projects</a>
                    </li> 
                      
                    <li>
                        <a href="darbogrupes.php">Work Groups</a>
                    </li>
                    <li>
                        <a href="uzduotys.php">Tasks</a>
                    </li>
                    <li>
                        <a href="showfile.php">Files</a>
                    </li>

                     <li>
                      <a href="profilis.php">Profile</a>
                    </li> 
                    
                     <li>
                      <a href="zinutes.php">Messages</a>
                    </li>
                    <li>
                      <a href="cy@.php"><img src="../vaizdai/iseiti.png" alt="" style="width:25px; height:25px; margin-top: -5px;"></a>
                    </li> 
                    </ul>


                    <div class="hamburger" id="hamburger" onclick="menu_toggle()">
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                  </div> 
                    
            </div>  

        </div>

    </nav>


    
