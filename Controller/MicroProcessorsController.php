<?php

namespace Controller;

class MicroProcessorsController {
	private $mpm;
	
	function __construct() {
		$this->mpm = new \Model\MicroProcessorsModel('cpu');
	}
	
	function indexMicroProcessors() {
		$array = $this->mpm->indexMicroProcessors();
		return $array;
	}
	
	function createMicroProcessor($post) {
		$model = \App\Tools::getPost($post,'model');
		$intro_date = \App\Tools::getPost($post,'intro_date');
		$smp_process = \App\Tools::getPost($post,'smp_process');
		$core_speed = \App\Tools::getPost($post,'core_speed');
		$bus_speed = \App\Tools::getPost($post,'bus_speed');
		$clock_multiplier = \App\Tools::getPost($post,'clock_multiplier');
		$core_voltage = \App\Tools::getPost($post,'core_voltage');
		$io_voltage = \App\Tools::getPost($post,'io_voltage');
		$tdp = \App\Tools::getPost($post,'tdp');
		$speedsys_benchmark = \App\Tools::getPost($post,'speedsys_benchmark');
		$doom_benchmark = \App\Tools::getPost($post,'doom_benchmark');
		$core = \App\Tools::getPost($post,'core');
		$this->mpm->createMicroProcessor($model,$intro_date,$smp_process,$core_speed,$bus_speed,$clock_multiplier,$core_voltage,$io_voltage,$tdp,$speedsys_benchmark,$doom_benchmark,$core);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New MicroProcessor "'.$model .'" has been created!\');';
		$content .= 'echo $msg->display(\'success\');';	
		return $content;
	}
	
	function deleteMicroProcessor($id,$microprocessor) {
		$this->mpm->deleteMicroProcessor($id);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'MicroProcessor "'.$microprocessor['model'].'" has been deleted!\');';
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function updateMicroProcessor($post) {
		$id = \App\Tools::getPost($post,'id');
		$model = \App\Tools::getPost($post,'model');
		$intro_date = \App\Tools::getPost($post,'intro_date');
		$smp_process = \App\Tools::getPost($post,'smp_process');
		$core_speed = \App\Tools::getPost($post,'core_speed');
		$bus_speed = \App\Tools::getPost($post,'bus_speed');
		$clock_multiplier = \App\Tools::getPost($post,'clock_multiplier');
		$core_voltage = \App\Tools::getPost($post,'core_voltage');
		$io_voltage = \App\Tools::getPost($post,'io_voltage');
		$tdp = \App\Tools::getPost($post,'tdp');
		$speedsys_benchmark = \App\Tools::getPost($post,'speedsys_benchmark');
		$doom_benchmark = \App\Tools::getPost($post,'doom_benchmark');
		$core = \App\Tools::getPost($post,'core');
		$this->mpm->updateMicroProcessor($id,$model,$intro_date,$smp_process,$core_speed,$bus_speed,$clock_multiplier,$core_voltage,$io_voltage,$tdp,$speedsys_benchmark,$doom_benchmark,$core);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'MicroProcessor "'.$model .'" has been modified!\');';	
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function getMicroProcessor($id) {
		$array = $this->mpm->getMicroProcessor($id);
		$microprocessor = $array[0];
		return $microprocessor;
	}
	
	function sortMicroProcessors($id,$position) {
		$this->mpm->sortMicroProcessors($id,$position);
	}
}