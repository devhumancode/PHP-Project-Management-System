<?php    
session_start ();
include ('userdizainas.php');
    
?>
<html>

<body class="body">

<style>
@media screen and (max-width: 1199px) {
      .desinys {
            display: block !important;
      }
      table {
            width: 100% !important;
            border-bottom: 1px solid #002776;
            margin-left: 0px !important;
      }

      .paveiksliukas {
            width: 100% !important;
            display: flex;
            justify-content: center;
      }

      table, td {
            background-color: unset !important;
      }

      .visas {
            padding-top: 4em;
      }
}
</style>
        <div class='info' style='overflow-x:scroll; text-align:center;'>         

              
              <div class='desinys' style='text-align:center; width:100%;'>    
            <?php include('profilioinfo.php') ?>
                     
             </div> 
             

              <div class='randomas' style='position:relative; clear: left; opacity:0; margin-top:30px; '> 
     
              </div>
        </div>
<?php 
 include ('copy.php');
?>              
</body>
</html>
