<?php
session_start ();
include ('duom.php');
$busena=$_POST['busena'];
$pavadinimas = $_POST['pavadinimas'];
$uid=$_POST['uid'];
$tekstas = $_POST['tekstas'];
$sid= $_SESSION['id'];
$pasirinkimas=$_POST['pasirinkimas'];

 $sql2=mysqli_query($connection,"SELECT * FROM ProjektuUzduotys WHERE ID=$uid;");
 while($row2=mysqli_fetch_array($sql2))
 {
   $siuntejas=$row2['SukureID'];
   $gavejas=$row2['DarbuotojoID'];
 }

if($pasirinkimas==0 && $busena==1)  //Nauja uzduotis, ir ji priimta
{
$target_dir = "../UzduociuFailai/";
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


        $sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET `SukureID` = '$gavejas', `DarbuotojoID` = '$siuntejas', `AtsakymoTekstas` = '$tekstas', `Failas` = '$reikiamas', `Busena` = '0' WHERE `ProjektuUzduotys`.`ID` = $uid;");
    
        header('location: projektai.php');
    } 
    else
     {
        alert ("Iškilo nesklandumų.");
        header('location: projektai.php');
    }
}
}
elseif($pasirinkimas==1 && $busena==1)
{
   $sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET `SukureID` = '$gavejas',  `DarbuotojoID` = '$siuntejas', `AtsakymoTekstas` = '$tekstas', `Busena` = '3' WHERE `ProjektuUzduotys`.`ID` = $uid;");
   header('location: projektai.php');
}
elseif($pasirinkimas==0 && $busena==0)
{
$data=date("Y-m-d");
   $sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET  `AtsakymoTekstas` = '$tekstas', `BaigimoData` = '$data',  `Busena` = '2' WHERE `ProjektuUzduotys`.`ID` = $uid;");
   header('location: projektai.php');
}
elseif($pasirinkimas==1 && $busena==0)
{
$sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET  `AtsakymoTekstas` = '$tekstas',  `SukureID` = '$gavejas', `DarbuotojoID` = '$siuntejas', `Busena` = '1' WHERE `ProjektuUzduotys`.`ID` = $uid;");
header('location: projektai.php');
}
elseif($pasirinkimas==0 && $busena==3)
{
$data=date("Y-m-d");
   $sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET  `AtsakymoTekstas` = 'Užduotį atsisakė atlikti, būsena : niekada neatlikta. $tekstas', `BaigimoData` = '$data',  `Busena` = '2' WHERE `ProjektuUzduotys`.`ID` = $uid;");
   header('location: projektai.php');
}
elseif($pasirinkimas==1 && $busena==3)
{
$sql=mysqli_query($connection,"UPDATE `webman_baig`.`ProjektuUzduotys` SET  `AtsakymoTekstas` = '$tekstas',  `SukureID` = '$gavejas', `DarbuotojoID` = '$siuntejas', `Busena` = '1' WHERE `ProjektuUzduotys`.`ID` = $uid;");
header('location: projektai.php');
}





?>
