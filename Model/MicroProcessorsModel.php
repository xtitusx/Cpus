<?php

namespace Model;

class MicroProcessorsModel extends \Model\Connection {
	
	function indexMicroProcessors() {		
		$query = 'SELECT mp.id, mp.model as mp_model, mp.intro_date, mp.smp_process, mp.core_speed, mp.bus_speed, mp.clock_multiplier, mp.core_voltage, mp.io_voltage, mp.tdp, mp.speedsys_benchmark, mp.doom_benchmark, c.model as c_model
		FROM microprocessor as mp
		INNER JOIN core as c ON mp.core_id = c.id
		ORDER BY c.position ASC, mp.position ASC';
		$array = $this->query($query);
		return $array;
	}
	
	function createMicroProcessor($model,$intro_date,$smp_process,$core_speed,$bus_speed,$clock_multiplier,$core_voltage,$io_voltage,$tdp,$speedsys_benchmark,$doom_benchmark,$core_id) {
		$array = $this->query("SELECT MAX(position) as max FROM microprocessor");
		$new_position = intval($array[0]['max'])+1;
		$query = 'INSERT INTO microprocessor SET model = :model, intro_date = :intro_date, smp_process = :smp_process, core_speed = :core_speed, bus_speed = :bus_speed, clock_multiplier = :clock_multiplier, core_voltage = :core_voltage, io_voltage = :io_voltage, tdp = :tdp, speedsys_benchmark = :speedsys_benchmark, doom_benchmark = :doom_benchmark, core_id = :core_id, position = :position';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':model', $model, \PDO::PARAM_STR);
		$prep->bindValue(':intro_date', $intro_date, \PDO::PARAM_STR);
		$prep->bindValue(':smp_process', $smp_process, \PDO::PARAM_INT);
		$prep->bindValue(':core_speed', $core_speed, \PDO::PARAM_INT);
		$prep->bindValue(':bus_speed', $bus_speed, \PDO::PARAM_INT);
		$prep->bindValue(':clock_multiplier', $clock_multiplier, \PDO::PARAM_STR);
		$prep->bindValue(':core_voltage', $core_voltage, \PDO::PARAM_STR);
		$prep->bindValue(':io_voltage', $io_voltage, \PDO::PARAM_STR);
		$prep->bindValue('tdp', $tdp, \PDO::PARAM_STR);
		$prep->bindValue('speedsys_benchmark', $speedsys_benchmark, \PDO::PARAM_STR);
		$prep->bindValue('doom_benchmark', $doom_benchmark, \PDO::PARAM_STR);
		$prep->bindValue('core_id', $core_id, \PDO::PARAM_INT);
		$prep->bindValue('position', $new_position, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function deleteMicroProcessor($id) {
		$query = 'DELETE FROM microprocessor WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue(':id', $id, \PDO::PARAM_INT);
		$prep->execute();
		$prep = NULL;
	}
	
	function getMicroProcessor($id) {
		$array = $this->query("SELECT * FROM microprocessor WHERE id=$id");
		return $array;
	}
	
	function updateMicroProcessor($id,$model,$intro_date,$smp_process,$core_speed,$bus_speed,$clock_multiplier,$core_voltage,$io_voltage,$tdp,$speedsys_benchmark,$doom_benchmark,$core_id) {
		$query = 'UPDATE microprocessor SET model = :model, intro_date = :intro_date, smp_process = :smp_process, core_speed = :core_speed, bus_speed = :bus_speed, clock_multiplier = :clock_multiplier, core_voltage = :core_voltage, io_voltage = :io_voltage, tdp = :tdp, speedsys_benchmark = :speedsys_benchmark, doom_benchmark = :doom_benchmark, core_id = :core_id WHERE id = :id';
		$prep = $this->connect()->prepare($query);                           
		$prep->bindValue(':model', $model, \PDO::PARAM_STR);
		$prep->bindValue(':intro_date', $intro_date, \PDO::PARAM_STR);
		$prep->bindValue(':smp_process', $smp_process, \PDO::PARAM_INT);
		$prep->bindValue(':core_speed', $core_speed, \PDO::PARAM_INT);
		$prep->bindValue(':bus_speed', $bus_speed, \PDO::PARAM_INT);
		$prep->bindValue(':clock_multiplier', $clock_multiplier, \PDO::PARAM_STR);
		$prep->bindValue(':core_voltage', $core_voltage, \PDO::PARAM_STR);
		$prep->bindValue(':io_voltage', $io_voltage, \PDO::PARAM_STR);
		$prep->bindValue('tdp', $tdp, \PDO::PARAM_STR);
		$prep->bindValue('speedsys_benchmark', $speedsys_benchmark, \PDO::PARAM_STR);
		$prep->bindValue('doom_benchmark', $doom_benchmark, \PDO::PARAM_STR);
		$prep->bindValue('core_id', $core_id, \PDO::PARAM_INT);
		$prep->bindValue('id', $id, \PDO::PARAM_INT); 
		$prep->execute(); 
		$prep = NULL;
	}
	
	function sortMicroProcessors($id,$position) {
		$query = 'UPDATE microprocessor SET position =:position WHERE id = :id';
		$prep = $this->connect()->prepare($query);
		$prep->bindValue('position', $position, \PDO::PARAM_INT); 
		$prep->bindValue('id', $id, \PDO::PARAM_INT);  
		$prep->execute();
		$prep = NULL;
	}
}