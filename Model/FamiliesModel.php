<?php

namespace Model;

class FamiliesModel extends \Model\Connection {

	function indexFamilies() {		
		$array = $this->query("SELECT id, name FROM family ORDER BY position ASC");
		return $array;
	}	

	function createFamily($name) {
		$array = $this->query("SELECT MAX(position) as max FROM family");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO family SET name = :name';
		$query = 'INSERT INTO family (`name`, `position`) VALUES (?,?);';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(1, $name, \PDO::PARAM_STR);
		$prep->bindValue(2, $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function deleteFamily($id) {
		$query = 'DELETE FROM family WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}

	function getFamily($id) {
		$array = $this->query("SELECT * FROM family WHERE id=$id");
		return $array;
	}		

	function updateFamily($id,$name) {
		$query = 'UPDATE family SET name = :name WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue('name', $name, \PDO::PARAM_STR);   
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}
	
	function sortFamilies($id,$position) {
		$query = 'UPDATE family SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query); 
		$prep->bindValue('position', $position, \PDO::PARAM_INT);  
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute(); 
		$prep = NULL;
	}
}