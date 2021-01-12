<?php

class DBAccess {
	private const HOST_DB = "localhost"; 
	private const USERNAME = "root";
	private const PASSWORD = "";
	private const DATABASE_NAME = "centrosportivo";
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
		$queryIstruttori = "SELECT nome, cognome, nomeimmagine, descrizione FROM istruttori WHERE disciplina = '$categoria'";
		$queryRisultato = mysqli_query($this->connection, $queryIstruttori);
		if ($queryRisultato == false) { return null; }
		else {
			/*echo "query riuscita---"; da togliere solo per test*/
			$listaIstruttori = array();
			while( $riga = mysqli_fetch_assoc($queryRisultato) ){
			$istruttore = array(
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






}

?>