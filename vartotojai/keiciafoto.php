<?php
session_start ();   
$fotoid=$_POST['fotoid'];
$idy=$_SESSION['id'];
$senas=$_SESSION['sena'];
$target_dir = "../profiliofoto/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


include ('duom.php');    
  
$sql2=mysqli_query($connection,"SELECT * FROM ProfilioFoto WHERE user = 68");
$tikrinimas = mysqli_num_rows($sql2);
var_dump($tikrinimas);
if($tikrinimas<=0)
{
 $sql3=mysqli_query($connection,"INSERT INTO ProfilioFoto (`foto`, `user`, `id`) VALUES ('$user', $user, NULL);");
}







if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
} 
 
// Tikrina failo dydi.
if ($_FILES["fileToUpload"]["size"] > 5000000000000) {
    echo "Jūsų failas per didelis.";
    $uploadOk = 0;
 
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['blogasfailas']=10;
    echo "Iškilo nesklandumų.";
    header('location: profilis.php');
// if everything is ok, try to upload file
} 
else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { 
    unlink('../profiliofoto/'.$senas);   
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";  
        $reikiamas = basename( $_FILES['fileToUpload']['name']);
        $sql=mysqli_query($connection,"UPDATE ProfilioFoto SET foto = '$reikiamas' WHERE id = $fotoid;");  
        header('location: profilis.php');
        $_SESSION['blogasfailas']=0;
    } else 
    {
        alert ("Iškilo nesklandumų.");
        header('location: index.php'); 
    }    
}



?>