<?php

namespace Model;

class CoresModel extends \Model\Connection {
	
	function indexCores() {		
		$query = 'SELECT c.id, c.model, c.manufacturer, c.core_number, c.l1_cache, c.l2_cache, c.l3_cache, c.transistors, c.datasheet, m.name as m_name, f.name as f_name, GROUP_CONCAT(i.name ORDER BY i.position SEPARATOR ", ") as i_name
		FROM core as c
		INNER JOIN microarchitecture as m ON c.microarchitecture_id = m.id
		INNER JOIN family as f ON c.family_id = f.id
		LEFT JOIN core_instructionset as ci ON c.id = ci.core_id
		LEFT JOIN instructionset as i ON ci.instructionset_id = i.id
		GROUP BY c.id
		ORDER BY f.position ASC, m.position ASC, c.position ASC';
		$array = $this->query($query);
		return $array;
	}
	
	function createCore($model,$manufacturer,$core_number,$l1_cache,$l2_cache,$l3_cache,$transistors,$datasheet,$microarchitecture_id,$family_id) {
		$array = $this->query("SELECT MAX(position) as max FROM core");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO core SET model = :model, manufacturer = :manufacturer, core_number = :core_number, l1_cache = :l1_cache, l2_cache = :l2_cache, l3_cache = :l3_cache, transistors = :transistors, datasheet = :datasheet, microarchitecture_id = :microarchitecture_id, family_id = :family_id, position = :position';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':model', $model, \PDO::PARAM_STR);
		$prep->bindValue(':manufacturer', $manufacturer, \PDO::PARAM_STR);
		$prep->bindValue(':core_number', $core_number, \PDO::PARAM_STR);
		$prep->bindValue(':l1_cache', $l1_cache, \PDO::PARAM_STR);
		$prep->bindValue(':l2_cache', $l2_cache, \PDO::PARAM_STR);
		$prep->bindValue(':l3_cache', $l3_cache, \PDO::PARAM_STR);
		$prep->bindValue(':transistors', $transistors, \PDO::PARAM_INT);
		$prep->bindValue(':datasheet', $datasheet, \PDO::PARAM_STR);
		$prep->bindValue('microarchitecture_id', $microarchitecture_id, \PDO::PARAM_INT);
		$prep->bindValue('family_id', $family_id, \PDO::PARAM_INT);
		$prep->bindValue('position', $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
		$query = 'SELECT id FROM core ORDER BY id DESC LIMIT 0, 1';
		$array = $this->query($query);
		// On retourne l'ID du dernier core enregistré
		return $array[0]['id'];
	}
	
	function deleteCore($id) {
		$query = 'DELETE FROM core WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}

	function getCore($id) {
		$array = $this->query("SELECT * FROM core WHERE id=$id");
		return $array;
	}		

	function updateCore($id,$model,$manufacturer,$core_number,$l1_cache,$l2_cache,$l3_cache,$transistors,$datasheet,$microarchitecture_id, $family_id) {
		$query = 'UPDATE core SET model = :model,  manufacturer = :manufacturer, core_number = :core_number, l1_cache = :l1_cache, l2_cache = :l2_cache, l3_cache = :l3_cache, transistors = :transistors, datasheet = :datasheet, microarchitecture_id = :microarchitecture_id, family_id = :family_id WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue('model', $model, \PDO::PARAM_STR);  
		$prep->bindValue(':manufacturer', $manufacturer, \PDO::PARAM_STR);
		$prep->bindValue(':core_number', $core_number, \PDO::PARAM_STR);
		$prep->bindValue(':l1_cache', $l1_cache, \PDO::PARAM_STR);
		$prep->bindValue(':l2_cache', $l2_cache, \PDO::PARAM_STR);
		$prep->bindValue(':l3_cache', $l3_cache, \PDO::PARAM_STR);
		$prep->bindValue(':transistors', $transistors, \PDO::PARAM_INT);
		$prep->bindValue(':datasheet', $datasheet, \PDO::PARAM_STR);
		$prep->bindValue('microarchitecture_id', $microarchitecture_id, \PDO::PARAM_INT);  
		$prep->bindValue('family_id', $family_id, \PDO::PARAM_INT); 
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}

	function getDatasheet($id) {		
		$array = $this->query("SELECT datasheet FROM core WHERE id=$id");
		return $array;
	}	

	function createCoreInstructionSet($core_id,$instructionset_id) {
		$query = 'INSERT INTO core_instructionset SET core_id = :core_id, instructionset_id = :instructionset_id';
		$prepF = $this->connect()->prepare($query);
		$prepF->bindValue(':core_id', $core_id, \PDO::PARAM_INT);
		$prepF->bindValue(':instructionset_id', $instructionset_id, \PDO::PARAM_INT);
		$prepF->execute();
		$prepF = NULL;
	}

	function deleteCoreInstructionSet($core_id) {
		$query = 'DELETE FROM core_instructionset WHERE core_id = :core_id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':core_id', $core_id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function sortCores($id,$position) {
		$query = 'UPDATE core SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query); 
		$prep->bindValue('position', $position, \PDO::PARAM_INT);  
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute(); 
		$prep = NULL;
	}
}