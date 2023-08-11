<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST)){
		
		//MODULO DE ADMINISTRADORES
		if(isset($_POST['busqueda_inicial_admin'])){
			$_SESSION['busqueda_admin'] = $_POST['busqueda_inicial_admin'];
		}
		
		
		if(isset($_POST['eliminar_busqueda_admin'])){
			unset($_SESSION['busqueda_admin']);
			$url = "adminsearch";
		}
				
		//MODULO DE CLIENTES
		if(isset($_POST['busqueda_inicial_cliente'])){
			$_SESSION['busqueda_cliente'] = $_POST['busqueda_inicial_cliente'];
		}
		if(isset($_POST['eliminar_busqueda_cliente'])){
			unset($_SESSION['busqueda_cliente']);
			$url = "clientsearch";
		}
		
		if(isset($url)){
			echo '<script>window.location.href="'.SERVERURL.$url.'/" </script>';
			
		}else{
			echo '<script>location.reload()</script>';
		}
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}