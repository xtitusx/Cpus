<?php

namespace Model;

class Connection {
	
	private $dbname;
	private $pdo;
	private $array;
  
	public function __construct($dbname) {
	$this->dbname = $dbname;
	}	

	function connect() {
		$this->pdo = new \PDO('mysql:host=localhost;dbname='.$this->dbname, 'root', '');
		$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
		return $this->pdo;
	}

	function query($sql) {
		$statement = $this->connect()->query($sql);
		// PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats 
		$this->array = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $this->array;	 
	}
}