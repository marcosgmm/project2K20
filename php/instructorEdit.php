<?php

$idpersonale = $_GET['idpersonale'];
$nome = $_GET['nome'];
$cognome = $_GET['cognome'];
$descrizione = $_GET['descrizione'];

$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
    <title> Centro Sportivo Paolotti</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="title" content="Modifica Istruttori - Centro Sportivo Paolotti"/>
    <meta name="description"
          content="Centro Sportivo Paolotti. Se sei un istruttore compila la pagina per lavorare presso il nostro centro"/>
    <meta name="keywords"
          content="cento sportivo paolotti, centro sportivo, sport, calcio, tennis, paddle, piscina, istruttori"/>
    <meta name="author" content="Igli Mezini, Alfredo Graziano, Marco Seganfreddo, Gianluca Ferrari"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/styleMobile.css"
          media="handheld, screen and (max-width:640px), only screen and (max-device-width:640px)"/>
    <link rel="stylesheet" type="text/css" href="../css/stylePrint.css" media="print"/>
</head>
<body>
<div id="headerContainer">
    <a class="helpNav" href="#menu">Vai al menù</a>
    <a class="helpNav" href="#lavoraContent">Vai al form da compilare</a>
    <div class="headerChild title">
        <h1>Centro Sportivo Paolotti</h1>
    </div>
    <div class="headerChild topnav">
        <ul>
            <li><a href="../html/contatti.html">Contatti</a></li>
            <li><a href="../html/loginAdmin.html">Il tuo account</a></li>
        </ul>
    </div>
</div>

<div id="menu">
    <ul>
        <li xml:lang="en"><a href="home.html">Home</a></li>
        <li><a href="../html/campiCalcio.html">Calcio</a></li>
        <li><a href="../html/piscine.html">Nuoto</a></li>
        <li xml:lang="en"><a href="../html/campiPaddle.html">Paddle</a></li>
        <li xml:lang="en"><a href="../html/campiTennis.html">Tennis</a></li>
        <li  class="current"><a href="../php/istruttori.php">Istruttori</a></li>
        <li  class="current"><a href="../html/lavora.html">Lavora con noi</a></li>
    </ul>
</div>

<div id="breadcrumb">
    <p>Ti trovi in: <a href="../html/home.html"><span xml:lang="en">Home</span></a> / Modifica Istruttori</p>
</div>


<div class="pageContent">
    <h2 class="center">Modifica Istruttori</h2>
    <p id="visualizza">'.$nome.' '.$cognome.'</p>
    <form method="POST" action="../php/process.php" id="lavora_form" enctype="multipart/form-data">     
        <textarea name="descrizione" id="" cols="100" rows="10" >'.$descrizione.'</textarea><br>
        <input type="hidden" name="actiontype" value="editinstructor">
        <input type="submit" name="submit" value="Invia"/>
    </form>
</div>

<div id="footer">
    <img id="valHTML" src="../images/ValidXHTML.png" alt="XHTML valido"/>
    <img id="valCSS" src="../images/ValidCSS.png" alt="CSS valido"/>
    <div id="footerSocial">
        <p> Ci puoi trovare anche su: </p>
        <a href="https://www.instagram.com">
            <img id="instagram" src="../images/instagram.png"
                 alt="collegamento alla pagina instagram del centro sportivo italiano"/>
        </a>
        <a href="https://www.facebook.com">
            <img id="facebook" src="../images/facebook.png"
                 alt="collegamento alla pagina facebook del centro sportivo italiano"/>
        </a>
    </div>
    <p>Centro Sportivo Paolotti - Via Trieste 63 - 35121 Padova (PD)</p>
    <p>Sito di: Igli Mezini, Alfredo Graziano, Marco Seganfreddo, Gianluca Ferrari</p>
    <p> - All rights reserved - </p>
</div>

</body>
</html>';

echo $html;
?>