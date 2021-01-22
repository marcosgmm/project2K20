<?php

require_once "connessione.php";
$htmlpage = file_get_contents("../html/lavora.html");

$nome = '';
$cognome = '';
$datanascita = '';
$mail = '';
$disciplina = '';
$messaggioLavora = '';
/*recupero info da submit*/
if ( isset($_POST['submit']) ){
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$datanascita = $_POST['data'];
	$mail = $_POST['mail'];
	$disciplina = $_POST['disciplina'];
	/*controllo informazioni*/
	if ( strlen($nome)!=0 && 
		preg_match("/^[A-Za-z\s]+$/", $nome) && 
		strlen($cognome)!=0 && 
		preg_match("/^[A-Za-z\s]+$/", $cognome) && 
		strlen($datanascita)!=0 && 
		preg_match("/^(\d{4})(\-)(\d{1,2})(\-)(\d{1,2})$/", $datanascita) && 
		strlen($mail)!=0 && 
		preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $mail) && strlen($disciplina)!=0 ){
		/*inserisco info nel DB*/
		$accesso = new DBAccess();
		$connessioneOK = $accesso->openDB();
		if ($connessioneOK == false) { die("connessione al DB fallita"); }
		else {
			$inserimento = $accesso->insertLavoraDB($nome, $cognome, $datanascita, $mail, $disciplina);
			$chiuso = $accesso->closeDB();
			/*if($chiuso == true) {echo "____database chiuso con successo____";} /*da togliere solo per test*/
			if ($inserimento == true){
				/*dati inseriti nel db, conferma*/
				$messaggioLavora = '<div class="conferma"><p>Candidatura inserita correttamente</p></div>';
			} else {
				$messaggioLavora = '<div class="errore"><p>Errore nell\'inserimento<p></div>';
			}
		}

	} else {
		/*informazioni inserite non conformi stampo errori*/
		$messaggioLavora = '<div class="errore"><ul>';
		if(strlen($nome)==0 || !preg_match("/^[A-Za-z\s]+$/", $nome)) {$messaggioLavora.= '<li>Nome assente o in formato errato</li>';}
		if(strlen($cognome)==0 || !preg_match("/^[A-Za-z\s]+$/", $cognome)) {$messaggioLavora.='<li>Cognome assente o in formato errato</li>';}
		if(strlen($datanascita)==0 || !preg_match("/^(\d{4})(\-)(\d{1,2})(\-)(\d{1,2})$/", $datanascita)) {$messaggioLavora.='<li>Inserire data nel formato AAAA-MM-GG (anno-mese-giorno)</li>';}
		if(strlen($mail)==0 || !preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $mail)) {$messaggioLavora.='<li>Mail errata o assente</li>';}
		//if(strlen($disciplina)) {$messaggioLavora.='<li>Inserire una disciplina tra Tennis, Calcio, Paddle, Nuoto</li>';}
		$messaggioLavora.='</ul></div>';
	}

	/*aggiorno i link*/
	$htmlpage = str_replace('<a href="home.html">', '<a href="../html/home.html">', $htmlpage);
	$htmlpage = str_replace('<a href="campiCalcio.html">', '<a href="../html/campiCalcio.html">' , $htmlpage);
	$htmlpage = str_replace('<a href="piscine.html">', '<a href="../html/piscine.html">', $htmlpage);
	$htmlpage = str_replace('<a href="campiPaddle.html">', '<a href="../html/campiPaddle.html">', $htmlpage);
	$htmlpage = str_replace('<a href="campiTennis.html">', '<a href="../html/campiTennis.html">', $htmlpage);
	$htmlpage = str_replace('<a href="../php/istruttori.php">', '<a href="istruttori.php">', $htmlpage);
	$htmlpage = str_replace('<a href="contatti.html">', '<a href="../html/contatti.html">', $htmlpage);
	$htmlpage = str_replace('<a href="loginAdmin.html">', '<a href="../html/loginAdmin.html">', $htmlpage);


	$htmlpage = str_replace('<messaggi />', $messaggioLavora, $htmlpage);
	echo $htmlpage;
}

?>
