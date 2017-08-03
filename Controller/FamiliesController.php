<?php

namespace Controller;

class FamiliesController {
	private $fm;
	
	function __construct() {
		$this->fm = new \Model\FamiliesModel('cpus');
	}
	
	function indexFamilies() {
		$array = $this->fm->indexFamilies();
		return $array;
	}

	function createFamily($post) {
		$name = \App\Tools::getPost($post,'name');
		$this->fm->createFamily($name);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New Family "'.$name .'" has been created!\');';
		$content .= 'echo $msg->display(\'success\');';	
		return $content;
	}

	function deleteFamily($id,$family) {
		$this->fm->deleteFamily($id);	
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'Family "'.$family['name'].'" has been deleted!\');';
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function updateFamily($post) {
		$id = \App\Tools::getPost($post,'id');
		$name = \App\Tools::getPost($post,'name');
		$this->fm->updateFamily($id,$name);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'Family "'.$name .'" has been modified!\');';	
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function getFamily($id) {
		$array = $this->fm->getFamily($id);
		$family = $array[0];
		return $family;
	}
	
	function sortFamilies($id,$position) {
		$this->fm->sortFamilies($id,$position);
	}
}