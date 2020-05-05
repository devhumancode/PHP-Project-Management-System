<!DOCTYPE php>
<html lang="lt">

<head>
    <link rel="shortcut icon" href="vaizdai/skirtukas.png" type="image/x-icon">
           <title>WebMan</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="userstyle.css">
    <script>
          function menu_toggle(){
              document.getElementById("hamburger").classList.toggle("active");
              document.getElementById("overlay").classList.toggle("active");
          }       
        </script>

    <![endif]-->
    
</head>

 
            
<body lang="lt">

                    <ul id="overlay" style="font-size: 0.8em !important;">
                    <li>
                        <a href="info.php">How it works</a> 
                    </li>
                    <li>
                        <a href="komanda.php">About me</a>
                    </li>
                        
                     <li>
                      <a href="login.php">Login</a>
                    </li> 
                    
                    </ul>
                  </ul>


    <nav class="navbar-inverse navbar-top" role="navigation" id='virsus' style="">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="./vaizdai/logo.png" alt="" style="width:40px; height:40px; margin-top:-10px; border-radius: 50%; background: #fff;">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="info.php">How it works</a> 
                    </li>
                    <li>
                        <a href="komanda.php">About me</a>
                    </li>
                        
                     <li>
                      <a href="login.php">Login</a>
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

