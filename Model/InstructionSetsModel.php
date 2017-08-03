<?php

namespace Model;

class InstructionSetsModel extends \Model\Connection {

	function indexInstructionSets() {
		$array = $this->query("SELECT id, name, note FROM instructionset ORDER BY position ASC");
		return $array;
	}
	
	function createInstructionSet($name,$note) {
		$array = $this->query("SELECT MAX(position) as max FROM instructionset");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO instructionset (`name`, `note`, `position`) VALUES (?,?,?);';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(1, $name, \PDO::PARAM_STR);
		$prep->bindValue(2, $note, \PDO::PARAM_STR);
		$prep->bindValue(3, $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function deleteInstructionSet($id) {
		$query = 'DELETE FROM instructionset WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}

	function getInstructionSet($id) {
		$array = $this->query("SELECT * FROM instructionset WHERE id=$id");
		return $array;
	}		

	function updateInstructionSet($id,$name,$note) {
		$query = 'UPDATE instructionset SET name = :name, note = :note WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue('name', $name, \PDO::PARAM_STR);  
		$prep->bindValue('note', $note, \PDO::PARAM_STR);  
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}
	
	function deleteCoreInstructionSet($instructionset_id) {
		$query = 'DELETE FROM core_instructionset WHERE instructionset_id = :instructionset_id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':instructionset_id', $instructionset_id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function sortInstructionSets($id,$position) {
		$query = 'UPDATE instructionset SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query); 
		$prep->bindValue('position', $position, \PDO::PARAM_INT);  
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute(); 
		$prep = NULL;
	}
}