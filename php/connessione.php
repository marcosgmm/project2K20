<?php

class DBAccess {
	private const HOST_DB = "localhost"; 
	private const USERNAME = "imezini";
	private const PASSWORD = "iQuae6Phah2sae9d";
	private const DATABASE_NAME = "imezini";



	private $connection; /*variabile connessione*/

	/*apertura del database*/
	public function openDB() {
		$this->connection = mysqli_connect(DBaccess::HOST_DB, DBaccess::USERNAME, DBaccess::PASSWORD, DBaccess::DATABASE_NAME);
		if (!$this->connection){ return false; }
		else { return true; }
	}

	/*chiusura del database*/
	public function closeDB() {
		$close =  mysqli_close($this->connection);
		if (!$close) { return false; }
		else { return true; }
	}


	/*FUNZIONI*/

	/*lista istruttiri per categoria insegnamento*/
	public function getListaIstruttori($categoria) {
		$queryIstruttori = "SELECT idpersonale,nome, cognome, nomeimmagine, descrizione FROM istruttori WHERE disciplina = '$categoria'";
		$queryRisultato = mysqli_query($this->connection, $queryIstruttori);
		if ($queryRisultato == false) { return null; }
		else {
			
			$listaIstruttori = array();
			while( $riga = mysqli_fetch_assoc($queryRisultato) ){
			$istruttore = array(
				"idpersonale" => $riga['idpersonale'],
				"nome" => $riga['nome'],
				"cognome" => $riga['cognome'],
				"nomeimmagine" => $riga['nomeimmagine'],
				"descrizione" => $riga['descrizione']
			);
			array_push($listaIstruttori, $istruttore);
			}
			return $listaIstruttori;
		}
	}
	public function query($sql) {
		$query = mysqli_query($this->connection, $sql);
		return $query;
	}

	/*lista Candidati per categoria insegnamento*/
	public function getListaCandidati() {
		$queryIstruttori = "SELECT * FROM candidati";
		$queryRisultato = mysqli_query($this->connection, $queryIstruttori);
		if ($queryRisultato == false) { return null; }
		else {
			
			$listaIstruttori = array();
			while( $riga = mysqli_fetch_assoc($queryRisultato) ){
			$istruttore = array(
				"idcandidato" => $riga['idcandidato'], 
				"nome" => $riga['nome'],
				"cognome" => $riga['cognome'],
				"disciplina" => $riga['disciplina'],
				"mail" => $riga['mail'],
				"datanascita" => $riga['datanascita'],
			);
			array_push($listaIstruttori, $istruttore);
			}
			return $listaIstruttori;
		}
	}

	public function approveListaCandidati($idcandidato) {
		$queryIstruttori = "SELECT * FROM candidati WHERE idcandidato = '$idcandidato'";
		$queryRisultato = mysqli_query($this->connection, $queryIstruttori);
		if ($queryRisultato == false) { return null; }
		else {
			
			$listaIstruttori = array();
			while( $riga = mysqli_fetch_assoc($queryRisultato) ){
				$sql = "INSERT INTO `istruttori` (`idpersonale`, `nome`, `cognome`, `disciplina`, `nomeimmagine`, `mail`, `datanascita`, `descrizione`) VALUES 
				(NULL, '".$riga['nome']."', '".$riga['cognome']."', '".$riga['disciplina']."', '', '".$riga['mail']."', '".$riga['datanascita']."', '')";
				mysqli_query($this->connection, $sql);
				$sql2 = "DELETE FROM `candidati` WHERE `idcandidato` = '$idcandidato'";
				mysqli_query($this->connection, $sql2);
			}
		}
	}

	/*inserisci dati form lavora con noi nel database*/
	public function insertLavoraDB($nome, $cognome, $datanascita, $mail, $disciplina){
		$queryLavora = "INSERT INTO candidati(nome,cognome,disciplina,mail,datanascita) VALUES (\"$nome\", \"$cognome\", \"$disciplina\", \"$mail\", \"$datanascita\")";
		$queryRisultatoIns = mysqli_query($this->connection, $queryLavora); 
		if(mysqli_affected_rows($this->connection) > 0) {return true;}
		else {return false;}
	}



}

?>