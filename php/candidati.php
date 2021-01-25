<?php
require_once "connessione.php";
/*connessione db*/
$htmlpage = file_get_contents("../html/candidati.html");
$accesso = new DBAccess();
$connessioneOK = $accesso->openDB();
if ($connessioneOK == false) { die("connessione al DB fallita"); }
else {
    $candidati = $accesso->getListaCandidati();
    

$accesso->closeDB();

if($candidati != null) {
    $tableCandidati = 
    '<table id="tableResumeApplications" summary="In questa tabella vegono riportate le candidature effettuate tramite il form Lavora con noi">
    <caption>Candidati</caption>
    <thead>
    <tr>
        <th id="nome">Nome</th>
        <th id="cognome">Cognome</th>
        <th id="disciplina">Disciplina</th>
        <th id="mail">Mail</th>
        <th id="datanascita">Data di nascita</th>
    </tr>
    </thead>
    <tbody>'
    ;
    foreach ($candidati as $candidato) {
        $tableCandidati.='<tr>';
        $tableCandidati.='<td headers="candidato nome">'.$candidato['nome'].'</td>';
        $tableCandidati.='<td headers="candidato cognome">'.$candidato['cognome'].'</td>';
        $tableCandidati.='<td headers="candidato disciplina">'.$candidato['disciplina'].'</td>';
        $tableCandidati.='<td headers="candidato mail">'.$candidato['mail'].'</td>';
        $tableCandidati.='<td headers="candidato data di nascita">'.$candidato['datanascita'].'</td>';
        $tableCandidati.='</tr>';
    }
    $tableCandidati.='</tbody>';
    $tableCandidati.='</table>';
} else {
    $tableCandidati ='<p>Al momento non ci sono candidati</p>';
}

$htmlpage = str_replace("<tabellaCandidati />", $tableCandidati, $htmlpage);

echo $htmlpage;
}

?>

