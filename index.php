<?php	

require 'App/Autoload.php';

$ac = new \View\AjaxController;
$ac->sortIndex();

if( !session_id() ) @session_start();

$fc = new \View\FrontController;

//On contruit la page	
$fc->buildPage();	

//On inclut le template qui appelle les différents éléments de la page
include($fc->template);