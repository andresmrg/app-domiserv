<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_GET['Token'])){
		require_once "../controladores/loginControlador.php";
		$logout= new loginControlador($_GET['Token']);
		echo $logout->cerrar_sesion_controlador();
			
	}else{
		session_start(['name'=>'DSA']);
		session_destroy();
		echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}