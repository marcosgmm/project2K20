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



    header("Location: ../php/istruttori.php");
    exit;


}
if (isset($_POST['actiontype']) && $_POST['actiontype'] == 'editinstructor') {


    $target_file = $target_dir . basename($newfilename);


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


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


    header("Location: istruttori.php");
    exit;

}
$accesso->closeDB();

?>