<?php

namespace Controller;

class MicroArchitecturesController {
	private $mam;
	
	function __construct() {
		$this->mam = new \Model\MicroArchitecturesModel('cpu');
	}
	
	function indexMicroArchitectures() {
		$array = $this->mam->indexMicroArchitectures();
		return $array;
	}

	function createMicroArchitecture($post) {
		$name = \App\Tools::getPost($post,'name');
		$architecture = \App\Tools::getPost($post,'architecture');
		$this->mam->createMicroArchitecture($name,$architecture);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New MicroArchitecture "'.$name .'" has been created!\');';
		$content .= 'echo $msg->display();';
		return $content;
	}

	function deleteMicroArchitecture($id,$microarchitecture) {
		$this->mam->deleteMicroArchitecture($id);	
		$content = '$msg = new \App\Messages();';				
		$content .= '$msg->add(\'s\', \'MicroArchitecture "'.$microarchitecture['name'].'" has been deleted!\');';
		$content .= 'echo $msg->display();';
		return $content;
	}

	function updateMicroArchitecture($post) {
		$id = \App\Tools::getPost($post,'id');
		$name = \App\Tools::getPost($post,'name');
		$architecture = \App\Tools::getPost($post,'architecture');
		$this->mam->updateMicroArchitecture($id,$name,$architecture);
		$content = '$msg = new \App\Messages();';	
		$content .= '$msg->add(\'s\', \'MicroArchitecture "'.$name .'" has been modified!\');';	
		$content .= 'echo $msg->display();';
		return $content;
	}

	function getMicroArchitecture($id) {
		$array = $this->mam->getMicroArchitecture($id);
		$microarchitecture = $array[0];
		return $microarchitecture;
	}
	
	function sortMicroArchitectures($id,$position) {
		$this->mam->sortMicroArchitectures($id,$position);
	}
}