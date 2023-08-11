<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST['ciudad-reg']) || isset($_POST['action'])){
		session_start(['name'=>'DSA']);
		require_once "../controladores/companiaControlador.php";
		
		$Inscom = new companiaControlador();
		
		//gerera las variables para crear nueva empresa
		
		
		if(isset($_POST['ciudad-reg']) && isset($_POST['barrio-reg'])){
			echo $Inscom->agregar_compania_controlador();
			
		}
		//ver listado de companias
		if($_POST['action'] == "vercompanias"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			
			echo $Inscom->paginador_compania_controlador($pagina,10,$_SESSION['privilegio_dsa'],$estado);
		}
		//desactivar empresa (eliminar)
		if($_POST['action'] == "desactivar_compania"){
			echo $Inscom->desactivar_compania_controlador();
		}
		//crea select de empresa
		if($_POST['action'] == "crear_select"){
			$tipo = $_POST['tipo'];
			$Codigo = $_POST['codigo'];
			
			echo $Inscom->datos_select_compania_controlador($tipo,$codigo);
		}
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}