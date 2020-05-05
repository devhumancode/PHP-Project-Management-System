<?php
session_start ();

$pavadinimas = $_POST[pavadinimas];
$gavejas=$_POST['gavejas'];
$sid= $_SESSION['id'];
$data=date("Y-m-d");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "Atsiprašome, failas jau egzistuoja :)";
    $uploadOk = 0;
}


// Tikrina failo dydi.
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Jūsų failas per didelis.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Iškilo nesklandumų.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $reikiamas = basename( $_FILES['fileToUpload']['name']);
        include ('duom.php');
        $sql=mysqli_query($connection,"INSERT INTO `webman_baig`.`Failai` (`id`, `sid`, `gid`, `file`, `filename`, `date`) VALUES (NULL, '$sid', '$gavejas','$pavadinimas', '$reikiamas', '$data');");
        header('location: showfile.php');
    } else {
        alert ("Iškilo nesklandumų.");
        header('location: index.php');
    }
}



?>
