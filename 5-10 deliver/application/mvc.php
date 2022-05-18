<?php
require 'view/load.php';
require 'model/model.php';
require 'controller/controller.php';
$pageURI =$_SERVER['REQUEST_URI'];
// echo $pageURI;
$pageURI =substr($pageURI,strrpos($pageURI,'index.php')+10);
	
	if (count(explode('?',$pageURI)) > 1){
		$pageURI = explode('?',$pageURI)[0];
	} 
	if (!$pageURI)
		new Controller('home');
	else
		new Controller($pageURI);
?>