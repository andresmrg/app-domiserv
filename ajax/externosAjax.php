<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";

if(isset($_POST['action'])){
	
	require_once "../controladores/externosControlador.php";
	$InsExternos = new externosControlador();

	

	//buscar soporte de guia para consultas externas
	if($_POST['action'] == "versoportedeguia" ){

		$idguia = $_POST['idguia'];
		echo $InsExternos->soporteguia_externo_guia_controlador($idguia);
	}




}
