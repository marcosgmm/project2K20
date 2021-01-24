<?php
// Start the session
session_start();
require_once "connessione.php";
/*connessione db*/
$accesso = new DBAccess();
$connessioneOK = $accesso->openDB();
if ($connessioneOK == false) { die("connessione al DB fallita"); }

$idcandidato = $_GET['id'];
$accesso->approveListaCandidati($idcandidato);
header("Location: candidati.php");
exit;