<?php	

namespace View;

class FrontController {	
/*	ATTRIBUTS     */	
    public $header;
    public $menu;
    public $content;
	public $footer;	
    public $template;
	public $msg;
	
/*===========================================================
METHODES
Ici sont regroupées	les fonctions du programme, qui récupère
les valeurs du header, du contenu, du pied de page, et enfin, la
fonction buildPage() exécute ces fonctions d'un coup.
On a aussi le constructeur de la classe ici, 
qui nous donne l'emplacement du template	
===============================================================*/	

	function __construct() {
		$this->template='View\template.html';
	}
	
    //FONCTION QUI CREE LE HEADER	
    function getHeader() {	
		include 'View\header.php';
	}	

    //FONCTION QUI CREE LE MENU	
    function getMenu() {	
        $this->menu = "include 'menu.php';";
    }

    //FONCTION QUI CREE LE CONTENU	
    function getContent() {	
		$this->content = '$msg = new \App\Messages();';
		//SOCKETS
		if ((isSet($_GET['sockets'])) || (isSet($_POST['sockets']))) {
			$sc = new \Controller\SocketsController();
			$this->content .= '$sc = new \Controller\SocketsController();';
			$this->content .= '$array = $sc->indexSockets();';
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'Socket Name is empty!\');';	
			$this->content .= 'echo $msg->display();';							

			if(isset($_POST['create_socket'])) {
				$this->content .= $sc->createSocket($_POST);	
			}
			else if(isset($_POST['delete_socket'])) {
				$id = \App\Tools::getPost($_POST,'delete_socket');
				$socket = $sc->getSocket($id);
				$this->content .=$sc->deleteSocket($id,$socket);		
			}
			else if(isset($_POST['update_socket'])) {
				$this->content .= $sc->updateSocket($_POST);
			}	
			$this->content .= "include 'sockets\create.php';";	
			$this->content .= "include 'sockets\update.php';"; 
			$this->content .= "include 'sockets\index.php';"; 		
		}
		//INSTRUCTIONSETS
		else if ((isSet($_GET['instructionsets'])) || (isSet($_POST['instructionsets']))) {
			$isc = new \Controller\InstructionSetsController();
			$this->content .= '$isc = new \Controller\InstructionsetsController();';
			$this->content .= '$array = $isc->indexInstructionSets();';
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'InstructionSet Name is empty!\');';	
			$this->content .= 'echo $msg->display();';
							
			if(isset($_POST['create_instructionset'])) {
				$this->content .= $isc->createInstructionSet($_POST);
			}
			else if(isset($_POST['delete_instructionset'])) {
				$id = \App\Tools::getPost($_POST,'delete_instructionset');
				$instructionset = $isc->getInstructionSet($id);
				$this->content .=$isc->deleteInstructionSet($id,$instructionset);		
			}
			else if(isset($_POST['update_instructionset'])) {
				$this->content .= $isc->updateInstructionSet($_POST);
			}
			$this->content .= "include 'instructionsets\create.php';";	
			$this->content .= "include 'instructionsets\update.php';"; 
			$this->content .= "include 'instructionsets\index.php';"; 	
		}
		//MICROARCHITECTURES
		else if ((isSet($_GET['microarchitectures'])) || (isSet($_POST['microarchitectures']))) {
			$mac = new \Controller\MicroArchitecturesController();
			$this->content .= '$mac = new \Controller\MicroArchitecturesController();';
			$this->content .= '$array = $mac->indexMicroArchitectures();';
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'MicroArchitecture Name is empty!\');';	
			$this->content .= 'echo $msg->display();';	
						
			if(isset($_POST['create_microarchitecture'])) {
				$this->content .= $mac->createMicroArchitecture($_POST);
			}
			else if(isset($_POST['delete_microarchitecture'])) {
				$id = \App\Tools::getPost($_POST,'delete_microarchitecture');
				$microarchitecture = $mac->getMicroArchitecture($id);
				$this->content .=$mac->deleteMicroArchitecture($id,$microarchitecture);		
			}
			else if(isset($_POST['update_microarchitecture'])) {
				$this->content .= $mac->updateMicroArchitecture($_POST);
			}
			$this->content .= "include 'microarchitectures\create.php';";	
			$this->content .= "include 'microarchitectures\update.php';"; 
			$this->content .= "include 'microarchitectures\index.php';"; 			
		}
		//FAMILIES
		else if ((isSet($_GET['families'])) || (isSet($_POST['families']))) {
			$fmc = new \Controller\FamiliesController();
			$this->content .= '$fmc = new \Controller\FamiliesController();';
			$this->content .= '$array_fm = $fmc->indexFamilies();';
			$this->content .= '$mac = new \Controller\MicroArchitecturesController();';
			$this->content .= '$array_ma = $mac->indexMicroArchitectures();';
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'Family Name is empty!\');';	
			$this->content .= 'echo $msg->display();';
							
			if(isset($_POST['create_family'])) {
				$this->content .= $fmc->createFamily($_POST);
			}
			else if(isset($_POST['delete_family'])) {
				$id = \App\Tools::getPost($_POST,'delete_family');
				$family = $fmc->getFamily($id);
				$this->content .=$fmc->deleteFamily($id,$family);		
			}
			else if(isset($_POST['update_family'])) {
				$this->content .= $fmc->updateFamily($_POST);
			}
			$this->content .= "include 'families\create.php';";	
			$this->content .= "include 'families\update.php';"; 
			$this->content .= "include 'families\index.php';"; 	
		}		
		//CORES
		else if ((isSet($_GET['cores'])) || (isSet($_POST['cores']))) {
			$cc = new \Controller\CoresController();
			$this->content .= '$cc = new \Controller\CoresController();';
			$this->content .= '$array_c = $cc->indexCores();';
			$this->content .= '$mac = new \Controller\MicroArchitecturesController();';
			$this->content .= '$array_ma = $mac->indexMicroArchitectures();';
			$this->content .= '$fmc = new \Controller\FamiliesController();';
			$this->content .= '$array_fm = $fmc->indexFamilies();';			
			$this->content .= '$isc = new \Controller\InstructionsetsController();';
			$this->content .= '$array_isc = $isc->indexInstructionSets();';			
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'ToEdit\');';	
			$this->content .= 'echo $msg->display();';
						
			if(isset($_POST['create_core'])) {
				$this->content .= $cc->createCore($_POST);
			}
			else if(isset($_POST['delete_core'])) {
				$id = \App\Tools::getPost($_POST,'delete_core');
				$core = $cc->getCore($id);
				$this->content .=$cc->deleteCore($id,$core);
			}
			else if(isset($_POST['update_core'])) {
				$this->content .= $cc->updateCore($_POST);
			}
			$this->content .= "include 'cores\create.php';";	
			$this->content .= "include 'cores\update.php';"; 
			$this->content .= "include 'cores\index.php';"; 	
		}		
		//MICROPROCESSORS
		else if ((isSet($_GET['microprocessors'])) || (isSet($_POST['microprocessors']))) {
			$mpc = new \Controller\MicroProcessorsController();
			$this->content .= '$mpc = new \Controller\MicroProcessorsController();';
			$this->content .= '$array_mp = $mpc->indexMicroProcessors();';
			$this->content .= '$cc = new \Controller\CoresController();';
			$this->content .= '$array_c = $cc->indexCores();';
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'MicroProcessor Model is empty!\');';	
			$this->content .= 'echo $msg->display();';						
			
			if(isset($_POST['create_microprocessor'])) {
				$this->content .= $mpc->createMicroprocessor($_POST);
			}	
			else if(isset($_POST['delete_microprocessor'])) {
				$id = \App\Tools::getPost($_POST,'delete_microprocessor');
				$microprocessor = $mpc->getMicroProcessor($id);
				$this->content .=$mpc->deleteMicroProcessor($id,$microprocessor);		
			}
			else if(isset($_POST['update_microprocessor'])) {
				$this->content .= $mpc->updateMicroprocessor($_POST);
			}			
			$this->content .= "include 'microprocessors\create.php';";	
			$this->content .= "include 'microprocessors\update.php';"; 
			$this->content .= "include 'microprocessors\index.php';"; 	
		}
		//SERIALNUMBERS
		else if ((isSet($_GET['serialnumbers'])) || (isSet($_POST['serialnumbers']))) {
			$snc = new \Controller\SerialNumbersController();
			$this->content .= '$snc = new \Controller\SerialNumbersController();';
			$this->content .= '$array_sn = $snc->indexSerialNumbers();';
			$this->content .= '$mpc = new \Controller\MicroProcessorsController();';
			$this->content .= '$array_mp = $mpc->indexMicroProcessors();';
			$this->content .= '$sc = new \Controller\SocketsController();';
			$this->content .= '$array_s = $sc->indexSockets();';		
			$this->content .= '$msg->add(\'i\', \'Fill in the form with new values!\');';
			$this->content .= '$msg->add(\'e\', \'ToEdit\');';	
			$this->content .= 'echo $msg->display();';
			
			if(isset($_POST['create_serialnumber'])) {
				$this->content .= $snc->createSerialNumber($_POST);
			}	
			else if(isset($_POST['delete_serialnumber'])) {
				$id = \App\Tools::getPost($_POST,'delete_serialnumber');
				$serialnumber = $snc->getSerialNumber($id);
				$this->content .=$snc->deleteSerialNumber($id,$serialnumber);
			}
			else if(isset($_POST['update_serialnumber'])) {
				$this->content .= $snc->updateSerialNumber($_POST);
			}			
			$this->content .= "include 'serialnumbers\create.php';";	
			$this->content .= "include 'serialnumbers\update.php';"; 
			$this->content .= "include 'serialnumbers\index.php';"; 	
		}
		//Pour l'instant, sans param, on fait afficher la page d'accueil des serialnumbers
		else {
			$this->content = 'header(\'Location: index.php?serialnumbers\');';
		}	
	}
	
    //FONCTION QUI CREE LE FOOTER
    function getFooter() {	
        $this->footer = '<div id="footer-text">cpu@Titus</div>';	
	}	
	
    /*FONCTION QUI APPELLE LES FONCTIONS DE 
    CREATION DES DIFFERENTES PARTIES DE LA PAGE*/	
    function buildPage() {	
		$this->getHeader();	
        $this->getMenu();	
        $this->getContent();	
		$this->getFooter();
	}
}