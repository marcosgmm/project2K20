<?php

require_once "connessione.php";

if ( isset($_POST['Login']) ) {
	$email = $_POST['email'];
	$psw = $_POST['password'];
	//echo "hai premuto";
	//accedo al db
	$accesso = new DBAccess();
	$connessioneOK = $accesso->openDB();
	if ($connessioneOK == false) { die("connessione al DB fallita"); }
	else {
		$login = $accesso->valida($email, $psw);
		$accesso->closeDB();
		if ($login == true) { header("Location: admin.php"); }
		else { header("Location: ../html/loginAdmin.html"); }
	}
}

?>