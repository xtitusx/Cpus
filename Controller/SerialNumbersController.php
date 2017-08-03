<?php

namespace Controller;

class SerialNumbersController {
	private $snm;
	
	function __construct() {
		$this->snm = new \Model\SerialNumbersModel('cpus');
	}
	
	function indexSerialNumbers() {
		$array = $this->snm->indexSerialNumbers();
		return $array;
	}
	
	function createSerialNumber($post) {
		$fpo_number = \App\Tools::getPost($post,'fpo_number');
		$part_number = \App\Tools::getPost($post,'part_number');
		if((!empty($_FILES['top_picture'])) and ($_FILES['top_picture']['tmp_name'] != '')) {
			$top_picture = \App\Tools::uploadFile($_FILES['top_picture'],'jpeg', '1048576');
		}
		else {
			$top_picture = "";	
		}
		if((!empty($_FILES['other_picture'])) and ($_FILES['other_picture']['tmp_name'] != '')) {
			$other_picture = \App\Tools::uploadFile($_FILES['other_picture'],'jpeg', '1048576');
		}
		else {
			$other_picture = "";	
		}
		$package = \App\Tools::getPost($post,'package');
		$microprocessor = \App\Tools::getPost($post,'microprocessor');
		$tested = \App\Tools::getPost($post,'tested');
		$note = \App\Tools::getPost($post,'note');
		
		$id = $this->snm->createSerialNumber($fpo_number,$part_number,$top_picture,$other_picture,$package,$microprocessor,$tested,$note);
		if (isset($post['socket'])) {
			$socket = $post['socket'];
			foreach ($socket as $socket_id) {
				$this->snm->createSerialNumberSocket($id,$socket_id);
			}
		}
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New SerialNumber "'.$fpo_number .'" has been created!\');';
		$content .= 'echo $msg->display(\'success\');';	
		return $content;
	}
	
	function deleteSerialNumber($id,$serialnumber) {
		// On supprime d'abord les clés étrangères du serialnumber dans serialnumber_socket
		$this->snm->deleteSerialNumberSocket($id);
		// On supprime le fichier jpg Top Picture
		$array = $this->snm->getTopPicture($id);
		$top_picture = $array[0]['top_picture'];	
		if ($top_picture != "") {
			$top_picture = \App\Tools::deleteFile($top_picture,'jpeg');
		}
		// On supprime le fichier jpg Other Picture
		$array = $this->snm->getOtherPicture($id);
		$other_picture = $array[0]['other_picture'];	
		if ($other_picture != "") {
			$other_picture = \App\Tools::deleteFile($other_picture,'jpeg');
		}
		// Puis la clé primaire dans serialnumber
		$this->snm->deleteSerialNumber($id);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'SerialNumber "'.$serialnumber['fpo_number'].'" has been deleted!\');';
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}
	
	function updateSerialNumber($post) {
		$update_serialnumber = \App\Tools::getPost($post,'update_serialnumber');
		$id = \App\Tools::getPost($post,'id');
		$fpo_number = \App\Tools::getPost($post,'fpo_number');
		$part_number = \App\Tools::getPost($post,'part_number');
		$array = $this->snm->getTopPicture($id);
		$top_picture = $array[0]['top_picture'];	
		// On supprime l'ancien fichier jpg Top Picture
		if ((!empty($_FILES['top_picture'])) and ($_FILES['top_picture']['tmp_name'] != '')) {
			if ($top_picture != "") {
				$top_picture = \App\Tools::deleteFile($top_picture,'jpeg');
			}
			$top_picture = \App\Tools::uploadFile($_FILES['top_picture'],'jpeg', '1048576');
		}
		else if (($update_serialnumber == "top") or ($update_serialnumber == "all")) {
			if ($top_picture != "") {
				$top_picture = \App\Tools::deleteFile($top_picture,'jpeg');
			}
		}
		$array = $this->snm->getOtherPicture($id);
		$other_picture = $array[0]['other_picture'];
		// On supprime l'ancien fichier jpg Other Picture
		if ((!empty($_FILES['other_picture'])) and ($_FILES['other_picture']['tmp_name'] != '')) {
			if ($other_picture != "") {
				$other_picture = \App\Tools::deleteFile($other_picture,'jpeg');
			}
			$other_picture = \App\Tools::uploadFile($_FILES['other_picture'],'jpeg', '1048576');
		}
		else if (($update_serialnumber == "other") or ($update_serialnumber == "all")) {
			if ($other_picture != "") {
				$other_picture = \App\Tools::deleteFile($other_picture,'jpeg');
			}
		}
		//$other_picture = "";
		$package = \App\Tools::getPost($post,'package');
		$microprocessor = \App\Tools::getPost($post,'microprocessor');
		$tested = \App\Tools::getPost($post,'tested');
		$note = \App\Tools::getPost($post,'note');
		$this->snm->updateSerialNumber($id,$fpo_number,$part_number,$top_picture,$other_picture,$package,$microprocessor,$tested,$note);
		$this->snm->deleteSerialNumberSocket($id);
		if (isset($post['socket'])) {
			$socket = $post['socket'];
			foreach ($socket as $socket_id) {
				$this->snm->createSerialNumberSocket($id,$socket_id);
			}
		}
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'SerialNumber "'.$fpo_number .'" has been modified!\');';	
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}
	
	function getSerialNumber($id) {
		$array = $this->snm->getSerialNumber($id);
		$serialnumber = $array[0];
		return $serialnumber;
	}
	
	function sortSerialNumbers($id,$position) {
		$this->snm->sortSerialNumbers($id,$position);
	}
}