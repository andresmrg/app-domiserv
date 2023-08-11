<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST['CodigoCuente-up']) || isset($_POST['action'])){
		
		require_once "../controladores/cuentaControlador.php";
		
		$cuenta= new cuentaControlador();
		if(isset($_POST['CodigoCuente-up']) && isset($_POST['tipoCuenta-up'])  && isset($_POST['userLog-up']) && isset($_POST['passwordLog-up'])){
			echo $cuenta->actualizar_cuenta_controlador();
		}
		
		if($_POST['action'] == "crearformularioactualizarCuenta"){
			echo $cuenta->crear_formulario_cuenta_controlador();
		}
			
	}else{
		
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}