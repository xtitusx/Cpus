<?php

namespace Controller;

class CoresController {
	private $cm;
	
	function __construct() {
		$this->cm = new \Model\CoresModel('cpus');
	}
	
	function indexCores() {
		$array = $this->cm->indexCores();
		return $array;
	}
	
	function createCore($post) {
		$model = \App\Tools::getPost($post,'model');
		$manufacturer = \App\Tools::getPost($post,'manufacturer');
		$core_number = \App\Tools::getPost($post,'core_number');
		$l1_cache = \App\Tools::getPost($post,'l1_cache');
		$l2_cache = \App\Tools::getPost($post,'l2_cache');
		$l3_cache = \App\Tools::getPost($post,'l3_cache');
		$transistors = \App\Tools::getPost($post,'transistors');
		if((!empty($_FILES['datasheet'])) and ($_FILES['datasheet']['tmp_name'] != '')) {
			$datasheet = \App\Tools::uploadFile($_FILES['datasheet'],'pdf', '15728640');
		}
		else {
			$datasheet = "";	
		}
		$microarchitecture = \App\Tools::getPost($post,'microarchitecture');
		$family = \App\Tools::getPost($post,'family');

		$id = $this->cm->createCore($model,$manufacturer,$core_number,$l1_cache,$l2_cache,$l3_cache,$transistors,$datasheet,$microarchitecture,$family);
		if (isset($post['instructionset'])) {
			$instructionset = $post['instructionset'];
			foreach ($instructionset as $instructionset_id) {
				$this->cm->createCoreInstructionSet($id,$instructionset_id);
			}
		}
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New Core "'.$model .'" has been created!\');';
		$content .= 'echo $msg->display(\'success\');';	
		return $content;
	}

	function deleteCore($id,$core) {
		// On supprime d'abord les clés étrangères du core dans core_instructionset
		$this->cm->deleteCoreInstructionSet($id);
		// On supprime le fichier pdf Datasheet
		$array = $this->cm->getDatasheet($id);
		$datasheet = $array[0]['datasheet'];	
		if ($datasheet != "") {
			$datasheet = \App\Tools::deleteFile($datasheet,'pdf');
		}
		// Puis la clé primaire dans core
		$this->cm->deleteCore($id);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'Core "'.$core['model'].'" has been deleted!\');';
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function updateCore($post) {
		$update_core = \App\Tools::getPost($post,'update_core');
		$id = \App\Tools::getPost($post,'id');
		$model = \App\Tools::getPost($post,'model');
		$manufacturer = \App\Tools::getPost($post,'manufacturer');
		$core_number = \App\Tools::getPost($post,'core_number');
		$l1_cache = \App\Tools::getPost($post,'l1_cache');
		$l2_cache = \App\Tools::getPost($post,'l2_cache');
		$l3_cache = \App\Tools::getPost($post,'l3_cache');
		$transistors = \App\Tools::getPost($post,'transistors');
		
		$array = $this->cm->getDatasheet($id);
		$datasheet = $array[0]['datasheet'];
		
		if((!empty($_FILES['datasheet'])) and ($_FILES['datasheet']['tmp_name'] != '')) {
			// On supprime l'ancien fichier pdf Datasheet
			if ($datasheet != "") {
				$datasheet = \App\Tools::deleteFile($datasheet,'pdf');
			}
			$datasheet = \App\Tools::uploadFile($_FILES['datasheet'],'pdf', '15728640');
		}
		else if ($update_core == "clean") {
			// On supprime l'ancien fichier pdf Datasheet
			if ($datasheet != "") {
				$datasheet = \App\Tools::deleteFile($datasheet,'pdf');
			}
		}
		
		$microarchitecture = \App\Tools::getPost($post,'microarchitecture');
		$family = \App\Tools::getPost($post,'family');
		$this->cm->updateCore($id,$model,$manufacturer,$core_number,$l1_cache,$l2_cache,$l3_cache,$transistors,$datasheet,$microarchitecture,$family);
		$this->cm->deleteCoreInstructionSet($id);
		if (isset($post['instructionset'])) {
			$instructionset = $post['instructionset'];
			foreach ($instructionset as $instructionset_id) {
				$this->cm->createCoreInstructionSet($id,$instructionset_id);
			}
		}
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'Core "'.$model .'" has been modified!\');';	
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}
	
	function getCore($id) {
		$array = $this->cm->getCore($id);
		$core = $array[0];
		return $core;
	}
	
	function sortCores($id,$position) {
		$this->cm->sortCores($id,$position);
	}
}