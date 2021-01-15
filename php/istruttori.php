<?php
require_once "connessione.php";
/*carico pagina istruttori*/
$htmlpage = file_get_contents("../html/istruttori.html");
/*connessione db*/
$accesso = new DBAccess();
$connessioneOK = $accesso->openDB();
if ($connessioneOK == false) { die("connessione al DB fallita"); }
else {
	/*echo "connessione al DB riuscita---";/*da toglire, solo per test*/
	$tennisti = $accesso->getListaIstruttori('Tennis');
	$calciatori = $accesso->getListaIstruttori('Calcio');
	$paddari = $accesso->getListaIstruttori('Paddle');
	$nuotatori = $accesso->getListaIstruttori('Nuoto');
	/*print_r($tennisti);/*da togliere solo per test*/
	/*chiudo connessione*/
	$chiuso = $accesso->closeDB();
	/*if($chiuso == true) {echo "____database chiuso con successo____";} /*da togliere solo per test*/
	$dlTennisti = "";
	if ($tennisti != null){
		$dlTennisti = '<dl class="sport_list">';
		foreach($tennisti as $tennista) {
			$dlTennisti.='<dt>'.$tennista['nome'].' '.$tennista['cognome'].'</dt>';
			$dlTennisti.='<dd>';
			$dlTennisti.='<img class="inst_face" src="../images/'.$tennista['nomeimmagine'].'" alt=""/>';
			$dlTennisti.='<p>'.$tennista['descrizione'].'</p>';
			$dlTennisti.='<p class="tornaSu"><a href="#instructors">Torna su</a></p>';
			$dlTennisti.='</dd>';
		}
		$dlTennisti.='</dl>';
	}
	else {
		$dlTennisti.='<p>Al momento non abbiamo istruttori disponibili</p>';
	}

	$dlCalciatori = "";
	if ($calciatori != null){
		$dlCalciatori = '<dl class="sport_list">';
		foreach($calciatori as $calciatore) {
			$dlCalciatori.='<dt>'.$calciatore['nome'].' '.$calciatore['cognome'].'</dt>';
			$dlCalciatori.='<dd>';
			$dlCalciatori.='<img class="inst_face" src="../images/'.$calciatore['nomeimmagine'].'" alt=""/>';
			$dlCalciatori.='<p>'.$calciatore['descrizione'].'</p>';
			$dlCalciatori.='<p class="tornaSu"><a href="#instructors">Torna su</a></p>';
			$dlCalciatori.='</dd>';
		}
		$dlCalciatori.='</dl>';
	}
	else {
		$dlCalciatori.='<p>Al momento non abbiamo istruttori disponibili</p>';
	}

	$dlPaddari = "";
	if ($paddari != null){
		$dlPaddari = '<dl class="sport_list">';
		foreach($paddari as $paddaro) {
			$dlPaddari.='<dt>'.$paddaro['nome'].' '.$paddaro['cognome'].'</dt>';
			$dlPaddari.='<dd>';
			$dlPaddari.='<img class="inst_face" src="../images/'.$paddaro['nomeimmagine'].'" alt=""/>';
			$dlPaddari.='<p>'.$paddaro['descrizione'].'</p>';
			$dlPaddari.='<p class="tornaSu"><a href="#instructors">Torna su</a></p>';
			$dlPaddari.='</dd>';
		}
		$dlPaddari.='</dl>';
	}
	else {
		$dlPaddari.='<p>Al momento non abbiamo istruttori disponibili</p>';
	}

	$dlNuotatori = "";
	if ($nuotatori != null){
		$dlNuotatori = '<dl class="sport_list">';
		foreach($nuotatori as $nuotatore) {
			$dlNuotatori.='<dt>'.$nuotatore['nome'].' '.$nuotatore['cognome'].'</dt>';
			$dlNuotatori.='<dd>';
			$dlNuotatori.='<img class="inst_face" src="../images/'.$nuotatore['nomeimmagine'].'" alt=""/>';
			$dlNuotatori.='<p>'.$nuotatore['descrizione'].'</p>';
			$dlNuotatori.='<p class="tornaSu"><a href="#instructors">Torna su</a></p>';
			$dlNuotatori.='</dd>';
		}
		$dlNuotatori.='</dl>';
	}
	else {
		$dlNuotatori.='<p>Al momento non abbiamo istruttori disponibili</p>';
	}

	$htmlpage = str_replace("<segnapostoTennis />", $dlTennisti, $htmlpage);
	$htmlpage = str_replace("<segnapostCalcio />", $dlCalciatori, $htmlpage);
	$htmlpage = str_replace("<segnapostoPaddle />", $dlPaddari, $htmlpage);
	$htmlpage = str_replace("<segnapostoNuoto />", $dlNuotatori, $htmlpage);

	echo $htmlpage;
}
?>