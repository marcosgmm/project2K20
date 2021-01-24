<?php
session_start();

require_once "connessione.php";
$htmlpage = file_get_contents("../html/istruttori.html");
$accesso = new DBAccess();
$connessioneOK = $accesso->openDB();

if(isset($_SESSION['admin_login'])){
    $htmlpage = str_replace('<a href="../html/loginAdmin.html">Accedi</a>', '<a href="../php/candidati.php">Logout</a>', $htmlpage);}

if ($connessioneOK == false) { die("connessione al DB fallita"); }

else {

    $tennisti = $accesso->getListaIstruttori('Tennis');
    $calciatori = $accesso->getListaIstruttori('Calcio');
    $paddari = $accesso->getListaIstruttori('Paddle');
    $nuotatori = $accesso->getListaIstruttori('Nuoto');
    $chiuso = $accesso->closeDB();
    $dlTennisti = "";
    if ($tennisti != null){
        $dlTennisti = '<dl class="sport_list">';

        foreach($tennisti as $tennista) {

            if(isset($_SESSION['admin_login']))
            {
                $dlTennisti .= '<dt>' . $tennista['nome'] . ' ' . $tennista['cognome'] . ' </dt>';
                $dlTennisti .= '<dd>';
                $dlTennisti .= '<img class="inst_face" src="../images/' . $tennista['nomeimmagine'] . '" alt=""/>';
                $dlTennisti .= '<p>' . $tennista['descrizione'] . '</p>';
                $dlTennisti .= '<p class="tornaSu"><a href="instructorEdit.php?idpersonale='.$tennista['idpersonale'].'&nome='.$tennista['nome'].'&cognome='.$tennista['cognome'].'&descrizione='.$tennista['descrizione'].'">Modifica</a></p>';
                $dlTennisti .= '<p class="tornaSu"><a href="process.php?actiontype=delete&idpersonale='.$tennista['idpersonale'].'&nome='.$tennista['nome'].'&cognome='.$tennista['cognome'].'&descrizione='.$tennista['descrizione'].'">Rimuovi</a></p>';
                $dlTennisti .= '<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlTennisti .= '</dd>';
            }
            else
            {
                $dlTennisti .= '<dt>' . $tennista['nome'] . ' ' . $tennista['cognome'] . ' </dt>';
                $dlTennisti .= '<dd>';
                $dlTennisti .= '<img class="inst_face" src="../images/' . $tennista['nomeimmagine'] . '" alt=""/>';
                $dlTennisti .= '<p>' . $tennista['descrizione'] . '</p>';
                $dlTennisti .= '<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlTennisti .= '</dd>';
            }
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

            if(isset($_SESSION['admin_login']))
            {
                $dlCalciatori.='<dt>'.$calciatore['nome'].' '.$calciatore['cognome'].'</dt>';
                $dlCalciatori.='<dd>';
                $dlCalciatori.='<img class="inst_face" src="../images/'.$calciatore['nomeimmagine'].'" alt=""/>';
                $dlCalciatori.='<p>'.$calciatore['descrizione'].'</p>';

                $dlCalciatori .= '<p class="tornaSu"><a href="instructorEdit.php?idpersonale='.$calciatore['idpersonale'].'&nome='.$calciatore['nome'].'&cognome='.$calciatore['cognome'].'&descrizione='.$calciatore['descrizione'].'">Modifica</a></p>';
                $dlCalciatori .= '<p class="tornaSu"><a href="process.php?actiontype=delete&idpersonale='.$calciatore['idpersonale'].'&nome='.$tennista['nome'].'&cognome='.$tennista['cognome'].'&descrizione='.$tennista['descrizione'].'">Rimuovi</a></p>';
                $dlCalciatori.='<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlCalciatori.='</dd>';
            }
            else
            {

                $dlCalciatori.='<dt>'.$calciatore['nome'].' '.$calciatore['cognome'].'</dt>';
                $dlCalciatori.='<dd>';
                $dlCalciatori.='<img class="inst_face" src="../images/'.$calciatore['nomeimmagine'].'" alt=""/>';
                $dlCalciatori.='<p>'.$calciatore['descrizione'].'</p>';
                $dlCalciatori.='<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlCalciatori.='</dd>';
            }
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

            if(isset($_SESSION['admin_login'])) {

                $dlPaddari .= '<dt>' . $paddaro['nome'] . ' ' . $paddaro['cognome'] . '</dt>';
                $dlPaddari .= '<dd>';
                $dlPaddari .= '<img class="inst_face" src="../images/' . $paddaro['nomeimmagine'] . '" alt=""/>';
                $dlPaddari .= '<p>' . $paddaro['descrizione'] . '</p>';

                $dlPaddari .= '<p class="tornaSu"><a href="instructorEdit.php?idpersonale='.$paddaro['idpersonale'].'&nome='.$paddaro['nome'].'&cognome='.$paddaro['cognome'].'&descrizione='.$paddaro['descrizione'].'">Modifica</a></p>';
                $dlPaddari .= '<p class="tornaSu"><a href="process.php?actiontype=delete&idpersonale='.$paddaro['idpersonale'].'&nome='.$tennista['nome'].'&cognome='.$tennista['cognome'].'&descrizione='.$tennista['descrizione'].'">Rimuovi</a></p>';
                $dlPaddari .= '<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlPaddari .= '</dd>';
            }
            else
            {
                $dlPaddari .= '<dt>' . $paddaro['nome'] . ' ' . $paddaro['cognome'] . '</dt>';
                $dlPaddari .= '<dd>';
                $dlPaddari .= '<img class="inst_face" src="../images/' . $paddaro['nomeimmagine'] . '" alt=""/>';
                $dlPaddari .= '<p>' . $paddaro['descrizione'] . '</p>';
                $dlPaddari .= '<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';

                $dlPaddari .= '</dd>';
            }
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

            if(isset($_SESSION['admin_login'])) {

                $dlNuotatori.='<dt>'.$nuotatore['nome'].' '.$nuotatore['cognome'].'</dt>';
                $dlNuotatori.='<dd>';
                $dlNuotatori.='<img class="inst_face" src="../images/'.$nuotatore['nomeimmagine'].'" alt=""/>';
                $dlNuotatori.='<p>'.$nuotatore['descrizione'].'</p>';
                $dlNuotatori .= '<p class="tornaSu"><a href="instructorEdit.php?idpersonale='.$nuotatore['idpersonale'].'&nome='.$nuotatore['nome'].'&cognome='.$nuotatore['cognome'].'&descrizione='.$nuotatore['descrizione'].'">Modifica</a></p>';
                $dlNuotatori .= '<p class="tornaSu"><a href="process.php?actiontype=delete&idpersonale='.$nuotatore['idpersonale'].'&nome='.$tennista['nome'].'&cognome='.$tennista['cognome'].'&descrizione='.$tennista['descrizione'].'">Rimuovi</a></p>';
                $dlNuotatori.='<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlNuotatori.='</dd>';
            }
            else
            {
                $dlNuotatori.='<dt>'.$nuotatore['nome'].' '.$nuotatore['cognome'].'</dt>';
                $dlNuotatori.='<dd>';
                $dlNuotatori.='<img class="inst_face" src="../images/'.$nuotatore['nomeimmagine'].'" alt=""/>';
                $dlNuotatori.='<p>'.$nuotatore['descrizione'].'</p>';
                $dlNuotatori.='<p class="tornaSu"><a href="#pageStart">Torna su</a></p>';
                $dlNuotatori.='</dd>';
            }

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