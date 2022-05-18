<?php


	$brandName = $_GET['comment'];
	echo $_GET["comment"];
	$this->model->dbAddInfor($brandName);
	echo json_encode("{add:'successful'}");

?>