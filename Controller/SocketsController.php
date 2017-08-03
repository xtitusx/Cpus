<?php

namespace Controller;

class SocketsController {
	private $sm;
	
	function __construct() {
		$this->sm = new \Model\SocketsModel('cpus');
	}
	
	function indexSockets() {
		$array = $this->sm->indexSockets();
		return $array;
	}

	function createSocket($post) {
		$name = \App\Tools::getPost($post,'name');
		$intro_date = \App\Tools::getPost($post,'intro_date')."-01";
		$package = \App\Tools::getPost($post,'package');
		$pin_count = \App\Tools::getPost($post,'pin_count');
		$size = \App\Tools::getPost($post,'size');
		$note = \App\Tools::getPost($post,'note');
		$this->sm->createSocket($name,$intro_date,$package,$pin_count,$size,$note);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'New Socket "'.$name .'" has been created!\');';
		$content .= 'echo $msg->display(\'success\');';	
		return $content;
	}

	function deleteSocket($id,$socket) {
		$this->sm->deleteSocket($id);	
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'Socket "'.$socket['name'].'" has been deleted!\');';
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function updateSocket($post) {
		$id = \App\Tools::getPost($post,'id');
		$name = \App\Tools::getPost($post,'name');
		$intro_date = \App\Tools::getPost($post,'intro_date')."-01";
		$package = \App\Tools::getPost($post,'package');
		$pin_count = \App\Tools::getPost($post,'pin_count');
		$size = \App\Tools::getPost($post,'size');
		$note = \App\Tools::getPost($post,'note');			
		$this->sm->updateSocket($id,$name,$intro_date,$package,$pin_count,$size,$note);
		$content = '$msg = new \App\Messages();';
		$content .= '$msg->add(\'s\', \'Socket "'.$name .'" has been modified!\');';	
		$content .= 'echo $msg->display(\'success\');';
		return $content;
	}

	function getSocket($id) {
		$array = $this->sm->getSocket($id);
		$socket = $array[0];
		return $socket;
	}
	
	function sortSockets($id,$position) {
		$this->sm->sortSockets($id,$position);
	}
}