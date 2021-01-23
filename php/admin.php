<?php
require_once "connessione.php";
/*connessione db*/
$accesso = new DBAccess();
$connessioneOK = $accesso->openDB();
if ($connessioneOK == false) { die("connessione al DB fallita"); }
$listaCandidati=$accesso->getListaCandidati();
$accesso->closeDB();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
	<title> Centro Sportivo Paolotti</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="title" content="Admin - Centro Sportivo Paolotti" />
    <meta name="description" content="Centro Sportivo Paolotti. Pagina di amministrazione" />
    <meta name="keywords" content="cento sportivo paolotti, centro sportivo, sport, calcio, tennis, paddle, piscina, istruttori" />
    <meta name="author" content="Igli Mezini, Alfredo Graziano, Marco Seganfreddo, Gianluca Ferrari" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="../css/styleMobile.css" media="handheld, screen and (max-width:640px), only screen and (max-device-width:640px)"/>
	<link rel="stylesheet" type="text/css" href="../css/stylePrint.css" media="print"/>
</head>

<body>

	<div id="headerContainer" >
		<a class="helpNav" href="#menu">Vai al menù</a>
		<a class="helpNav" href="#instructors">Vai al contenuto</a>
		<div class="headerChild title">
			<h1>Centro Sportivo Paolotti</h1>
		</div>
		<div class="headerChild topnav"></div>
	</div>

	<div id="menu">
		<ul>
			<li><a href="../html/loginAdmin.html"><span xml:lang="en">Logout</span></a></li>
		</ul>
	</div>

	<div id="breadcrumb">
		<p>Ti trovi in: Amministrazione</p>
	</div>

	<div class="pageContent">
		<h2>Candidati</h2>
		<table border="1">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Disciplina</th>
					<th>Mail</th>
					<th>Datanascita</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listaCandidati as $lc) {?>
					<tr>
						<td><?php echo $lc['nome'];?></td>
						<td><?php echo $lc['cognome'];?></td>
						<td><?php echo $lc['disciplina'];?></td>
						<td><?php echo $lc['mail'];?></td>
						<td><?php echo $lc['datanascita'];?></td>
						<td><a href="approved.php?id=<?php echo $lc['idcandidato'];?>">approve</a></td>
					</tr>
				<?php } ?>				
			</tbody>
		</table>		
	</div>

<div id="footer">
    <img id="valHTML" src="../images/ValidXHTML.png" alt="XHTML valido">
    <img id="valCSS" src="../images/ValidCSS.png" alt="CSS valido">
    <div id="footerSocial">
        <p> Ci puoi trovare anche su: </p>
            <a href="https://www.instagram.com">
                <img id="instagram" src="../images/instagram.png" alt="collegamento alla pagina instagram del centro sportivo italiano" />
            </a>
            <a href="https://www.facebook.com">
                <img id="facebook" src="../images/facebook.png" alt="collegamento alla pagina facebook del centro sportivo italiano" />
            </a>
    </div>
    <p>Centro Sportivo Paolotti - Via Trieste 63 - 35121 Padova (PD)</p>
    <p>Sito di: Igli Mezini, Alfredo Graziano, Marco Seganfreddo, Gianluca Ferrari</p>
    <p> - All rights reserved - </p>
</div>
</body>
</html>
