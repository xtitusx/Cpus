<?php

namespace Model;

class SerialNumbersModel extends \Model\Connection {
	
	function indexSerialNumbers() {		
		$query = 'SELECT sn.id, sn.fpo_number, sn.part_number, sn.top_picture, sn.other_picture, sn.package, mp.model, GROUP_CONCAT(s.name ORDER BY s.position SEPARATOR ", ") as s_name, sn.tested, sn.note
		FROM serialnumber as sn
		INNER JOIN microprocessor as mp ON sn.microprocessor_id = mp.id
		LEFT JOIN serialnumber_socket as ss ON sn.id = ss.serialnumber_id
		LEFT JOIN socket as s ON ss.socket_id = s.id
		GROUP BY sn.id
		ORDER BY mp.position ASC, sn.position ASC';
		$array = $this->query($query);
		return $array;
	}
	
	function createSerialNumber($fpo_number,$part_number,$top_picture,$other_picture,$package,$microprocessor_id,$tested,$note) {
		$array = $this->query("SELECT MAX(position) as max FROM serialnumber");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO serialnumber SET fpo_number = :fpo_number, part_number = :part_number, top_picture = :top_picture, other_picture = :other_picture, package = :package, microprocessor_id = :microprocessor_id, note = :note, tested = :tested, position = :position';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':fpo_number', $fpo_number, \PDO::PARAM_STR);
		$prep->bindValue(':part_number', $part_number, \PDO::PARAM_STR);
		$prep->bindValue(':top_picture', $top_picture, \PDO::PARAM_STR);
		$prep->bindValue(':other_picture', $other_picture, \PDO::PARAM_STR);
		$prep->bindValue(':package', $package, \PDO::PARAM_STR);
		$prep->bindValue(':microprocessor_id', $microprocessor_id, \PDO::PARAM_INT);
		$prep->bindValue(':tested', $tested, \PDO::PARAM_STR);
		$prep->bindValue(':note', $note, \PDO::PARAM_STR);
		$prep->bindValue('position', $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
		$query = 'SELECT id FROM serialnumber ORDER BY id DESC LIMIT 0, 1';
		$array = $this->query($query);
		// On retourne l'ID du dernier serialnumber enregistré
		return $array[0]['id'];
	}
	
	function deleteSerialNumber($id) {
		$query = 'DELETE FROM serialnumber WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function getSerialNumber($id) {
		$array = $this->query("SELECT * FROM serialnumber WHERE id=$id");
		return $array;
	}
	
	function updateSerialNumber($id,$fpo_number,$part_number,$top_picture,$other_picture,$package,$microprocessor_id,$tested,$note) {
		$query = 'UPDATE serialnumber SET fpo_number = :fpo_number, part_number = :part_number, top_picture = :top_picture, other_picture = :other_picture, package = :package, microprocessor_id = :microprocessor_id, tested = :tested, note = :note WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue(':fpo_number', $fpo_number, \PDO::PARAM_STR);
		$prep->bindValue(':part_number', $part_number, \PDO::PARAM_STR);
		$prep->bindValue(':top_picture', $top_picture, \PDO::PARAM_STR);
		$prep->bindValue(':other_picture', $other_picture, \PDO::PARAM_STR);
		$prep->bindValue(':package', $package, \PDO::PARAM_STR);
		$prep->bindValue(':microprocessor_id', $microprocessor_id, \PDO::PARAM_INT);
		$prep->bindValue(':tested', $tested, \PDO::PARAM_STR);
		$prep->bindValue(':note', $note, \PDO::PARAM_STR);
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}
	
	function getTopPicture($id) {		
		$array = $this->query("SELECT top_picture FROM serialnumber WHERE id=$id");
		return $array;
	}
	
	function getOtherPicture($id) {		
		$array = $this->query("SELECT other_picture FROM serialnumber WHERE id=$id");
		return $array;
	}
	
	function createSerialNumberSocket($serialnumber_id,$socket_id) {
		$query = 'INSERT INTO serialnumber_socket SET serialnumber_id = :serialnumber_id, socket_id = :socket_id';
		$prepF = $this->connect()->prepare($query);
		$prepF->bindValue(':serialnumber_id', $serialnumber_id, \PDO::PARAM_INT);
		$prepF->bindValue(':socket_id', $socket_id, \PDO::PARAM_INT);
		$prepF->execute();
		$prepF = NULL;
	}
	
	function deleteSerialNumberSocket($serialnumber_id) {
		$query = 'DELETE FROM serialnumber_socket WHERE serialnumber_id = :serialnumber_id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':serialnumber_id', $serialnumber_id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function sortSerialNumbers($id,$position) {
		$query = 'UPDATE serialnumber SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue('position', $position, \PDO::PARAM_INT); 
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute();
		$prep = NULL;
	}
}