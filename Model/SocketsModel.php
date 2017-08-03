<?php

namespace Model;

class SocketsModel extends \Model\Connection {

	function indexSockets() {
		$array = $this->query("SELECT id, name, SUBSTR(intro_date,1,7) as intro_date, package, pin_count, size, note FROM socket ORDER BY position ASC");
		return $array;
	}	

	function createSocket($name,$intro_date,$package,$pin_count,$size,$note) {
		$array = $this->query("SELECT MAX(position) as max FROM socket");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO socket (`name`, `intro_date`, `package`, `pin_count`, `size`, `note`, `position`) VALUES (?,?,?,?,?,?,?);';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(1, $name, \PDO::PARAM_STR);
		$prep->bindValue(2, $intro_date, \PDO::PARAM_STR);
		$prep->bindValue(3, $package, \PDO::PARAM_STR);
		$prep->bindValue(4, $pin_count, \PDO::PARAM_INT);
		$prep->bindValue(5, $size, \PDO::PARAM_STR);
		$prep->bindValue(6, $note, \PDO::PARAM_STR);
		$prep->bindValue(7, $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function deleteSocket($id) {
		$query = 'DELETE FROM socket WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}

	function getSocket($id) {
		$array = $this->query("SELECT * FROM socket WHERE id=$id");
		return $array;
	}		

	function updateSocket($id,$name,$intro_date,$package,$pin_count,$size,$note) {
		$query = 'UPDATE socket SET name = :name, intro_date = :intro_date, package = :package, pin_count = :pin_count, size = :size, note = :note WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue('name', $name, \PDO::PARAM_STR);  
		$prep->bindValue('intro_date', $intro_date, \PDO::PARAM_STR);  
		$prep->bindValue('package', $package, \PDO::PARAM_STR);  
		$prep->bindValue('pin_count', $pin_count, \PDO::PARAM_INT);  
		$prep->bindValue('size', $size, \PDO::PARAM_STR);  
		$prep->bindValue('note', $note, \PDO::PARAM_STR);  
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}

	function sortSockets($id,$position) {
		$query = 'UPDATE socket SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue('position', $position, \PDO::PARAM_INT); 
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute();
		$prep = NULL;
	}
}