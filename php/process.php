<?php
session_start();
require_once "connessione.php";
$accesso = new DBAccess();
$conn = $accesso->openDB();
if ($conn == false) { die("connessione al DB fallita"); }

if (isset($_GET['actiontype']) && $_GET['actiontype'] == 'delete') {

    $idpersonale = $_GET['idpersonale'];

    $Query = "DELETE FROM istruttori WHERE idpersonale = '$idpersonale'";

    $result = $accesso->query($Query);

//    echo $Query;exit;

    header("Location: ../php/istruttori.php");
    exit;


//    echo $idpersonale;
//    exit;

}
if (isset($_POST['actiontype']) && $_POST['actiontype'] == 'editinstructor') {
//    echo "<PRE>";
//    print_r($_REQUEST);

//    print_r($_FILES);


//    $target_dir = "uploads/";
//    $target_dir = "../images/";
//    $target_dir = "../images/newImages/";

//    $target_dir = "public_html/Projects/project2K20/images/newImages/";



//    echo $target_dir;
//    echo "<BR>";

//    $newfilename = rand(1,99999) . '.' . end(explode(".",$_FILES["image"]["name"]));

    $target_file = $target_dir . basename($newfilename);



//    echo $target_file;
//    echo "<BR>";

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//    $check = getimagesize($_FILES["image"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//        echo "<BR>";
//
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//        echo "<BR>";
//
//    }


//    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

//        echo htmlspecialchars( basename( $_FILES["image"]["name"]));
//        exit;

//    }
//    else {
//        echo "Not uploaded because of error #".$_FILES["image"]["error"];
//    }

//    exit;



//    echo '<pre>'; print_r($_FILES); echo '</pre>';
//    if (move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name'])) {
//        echo 'ok';
//    } else {
//        echo 'error!';
//    };
//    exit;

    $nome = $_POST['nome'];
    $idpersonale = $_POST['idpersonale'];
    $descrizione = $_POST['descrizione'];

    $Query = "UPDATE 
  `istruttori` 
SET
  `nome` = '$nome',
   `descrizione` = '".$descrizione."' 
WHERE `idpersonale` = '$idpersonale' ";


    $result = $accesso->query($Query);

//    echo $Query;exit;

    header("Location: istruttori.php");
    exit;

}
$accesso->closeDB();

?>