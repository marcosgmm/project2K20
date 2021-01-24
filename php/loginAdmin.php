<?php
session_start();
require_once "connessione.php";
$loginAdmin = file_get_contents("../html/loginAdmin.html");
if(isset($_SESSION['logged_in'])){
    $accesso = new DBAccess();
    $connessioneOK = $accesso->openDB();
    if ($connessioneOK == false) {
        die("connessione al DB fallita");
    }

    $htmlpage = file_get_contents("../html/candidati.html");


    $listaCandidati = $accesso->getListaCandidati();


    if (!empty($listaCandidati)) {
        $html = "";
        foreach ($listaCandidati as $item) {

            $nome = $item['nome'];
            $cognome = $item['cognome'];
            $disciplina = $item['disciplina'];
            $mail = $item['mail'];
            $datanascita = $item['datanascita'];
            $idcandidato = $item['idcandidato'];

            $html .= "<tr>";
            $html .= "<td>$nome</td>";
            $html .= "<td>$cognome</td>";
            $html .= "<td>$disciplina</td>";
            $html .= "<td>$mail</td>";
            $html .= "<td>$datanascita</td>";
//        $html .= "<td>$idcandidato</td>";
            $html .= "<td><a href='approved.php?id=" . $idcandidato . "' onClick='return sure();'>approve</a></td>";
            $html .= "</tr>";
        }
    }
    $htmlpage = str_replace("<segnapostoNuoto />", $html, $htmlpage);

    echo $htmlpage;
}else{
    $html = '
        <fieldset id="fieldset_login">
        <legend>Area Admin</legend>
            <div class="input_line">
                <label for="username" xml:lang="en">Email:</label>
                <input id="username" class="general_input" name="email" maxlength="150"
                    aria-required="true" />
            </div>
            <div class="input_line">
                <label for="password" xml:lang="en">Password:</label>
                <input id="password" class="general_input" type="password" name="password" maxlength="15"
                    aria-required="true" />
            </div>
            <div class="login_buttons">
                <input id="submit_login_form" class="general_button" type="submit" value="Accedi" name="Login"
                    aria-label="Accedi" />
            </div>
        </fieldset>';
    $main_html = str_replace('<admin />', $html, $loginAdmin);
    echo $main_html;
}
?>