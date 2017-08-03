<?php

namespace Controller;

class InstructionSetsController {
	private $ism;
	
	function __construct() {
		$this->ism = new \Model\InstructionSetsModel('cpus');
	}
	
	function indexInstructionSets() {
		$array = $this->ism->indexInstructionSets();
		return $array;
	}

	function createInstructionSet($post) {
		$name = \App\Tools::getPost($post,'name');
		$note = \App\Tools::getPost($post,'note');
		$this->ism->createInstructionSet($name,$note);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New InstructionSet "'.$name .'" has been created!\');';
		$content .= 'echo $msg->display();';
		return $content;
	}

	function deleteInstructionSet($id,$instructionset) {
		// On supprime d'abord les clés étrangères de l'instructionset dans core_instructionset
		$this->ism->deleteCoreInstructionSet($id);
		// Puis la clé primaire dans instructionset
		$this->ism->deleteInstructionSet($id);	
		$content = '$msg = new \App\Messages();';				
		$content .= '$msg->add(\'s\', \'InstructionSet "'.$instructionset['name'].'" has been deleted!\');';
		$content .= 'echo $msg->display();';
		return $content;
	}

	function updateInstructionSet($post) {
		$id = \App\Tools::getPost($post,'id');
		$name = \App\Tools::getPost($post,'name');
		$note = \App\Tools::getPost($post,'note');
		$this->ism->updateInstructionSet($id,$name,$note);	
		$content = '$msg = new \App\Messages();';	
		$content .= '$msg->add(\'s\', \'InstructionSet "'.$name .'" has been modified!\');';
		$content .= 'echo $msg->display();';
		return $content;
	}

	function getInstructionSet($id) {
		$array = $this->ism->getInstructionSet($id);
		$instructionset = $array[0];
		return $instructionset;
	}
	
	function sortInstructionSets($id,$position) {
		$this->ism->sortInstructionSets($id,$position);
	}
}