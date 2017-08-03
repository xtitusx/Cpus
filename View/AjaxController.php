<?php	

namespace View;

class AjaxController {	

	function __construct() {
	}
    
	//FONCTION QUI TRAITRE $_POST AJAX
    function sortIndex() {	
		//SOCKETS
		if (isSet($_POST['sort_sockets'])) {
			$sc = new \Controller\SocketsController();
			foreach($_POST['sort_sockets'] as $position => $id) {
				$sc->sortSockets($id,$position);
			}
			exit;
		}
		//INSTRUCTIONSETS
		if (isSet($_POST['sort_instructionsets'])) {
			$isc = new \Controller\InstructionSetsController();
			foreach($_POST['sort_instructionsets'] as $position => $id) {
				$isc->sortInstructionSets($id,$position);
			}
			exit;
		}
		//MICROARCHITECTURES
		if (isSet($_POST['sort_microarchitectures'])) {
			$mac = new \Controller\MicroArchitecturesController();
			foreach($_POST['sort_microarchitectures'] as $position => $id) {
				$mac->sortMicroArchitectures($id,$position);
			}
			exit;
		}				
		//FAMILIES
		if (isSet($_POST['sort_families'])) {
			$fmc = new \Controller\FamiliesController();
			foreach($_POST['sort_families'] as $position => $id) {
				$fmc->sortFamilies($id,$position);
			}
			exit;
		}
		//CORES
		if (isSet($_POST['sort_cores'])) {
			$cc = new \Controller\CoresController();
			foreach($_POST['sort_cores'] as $position => $id) {
				$cc->sortCores($id,$position);
			}
			exit;
		}
		//MICROPROCESSORS
		if (isSet($_POST['sort_microprocessors'])) {
			$mpc = new \Controller\MicroProcessorsController();
			foreach($_POST['sort_microprocessors'] as $position => $id) {
				$mpc->sortMicroProcessors($id,$position);
			}
			exit;
		}
		//SERIALNUMBERS
		if (isSet($_POST['sort_serialnumbers'])) {
			$snc = new \Controller\SerialNumbersController();
			foreach($_POST['sort_serialnumbers'] as $position => $id) {
				$snc->sortSerialNumbers($id,$position);
			}
			exit;
		}
	}
}