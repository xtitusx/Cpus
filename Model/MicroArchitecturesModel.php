<?php

namespace Model;

class MicroArchitecturesModel extends \Model\Connection {

	function indexMicroArchitectures() {
		$array = $this->query("SELECT id, name, architecture FROM microarchitecture ORDER BY position ASC");
		return $array;
	}	
	
	function createMicroArchitecture($name,$architecture) {
		$array = $this->query("SELECT MAX(position) as max FROM microarchitecture");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO microarchitecture (`name`, `architecture`, `position`) VALUES (?,?,?);';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(1, $name, \PDO::PARAM_STR);
		$prep->bindValue(2, $architecture, \PDO::PARAM_STR);
		$prep->bindValue(3, $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function deleteMicroArchitecture($id) {
		$query = 'DELETE FROM microarchitecture WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}

	function getMicroArchitecture($id) {
		$array = $this->query("SELECT * FROM microarchitecture WHERE id=$id");
		return $array;
	}		

	function updateMicroArchitecture($id,$name,$architecture) {
		$query = 'UPDATE microarchitecture SET name = :name, architecture = :architecture WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue('name', $name, \PDO::PARAM_STR);  
		$prep->bindValue('architecture', $architecture, \PDO::PARAM_STR);  
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}
	
	function sortMicroArchitectures($id,$position) {
		$query = 'UPDATE microarchitecture SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue('position', $position, \PDO::PARAM_INT); 
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute();
		$prep = NULL;
	}
}