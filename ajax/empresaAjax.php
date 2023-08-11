<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST['dni-reg']) || isset($_POST['action'])){
		session_start(['name'=>'DSA']);
		require_once "../controladores/empresaControlador.php";
		
		$InsEm = new empresaControlador();
		
		//gerera las variables para crear nueva empresa
		if($_POST['action'] == "crearformularionuevaempresa"){
			
			echo $InsEm->crear_formulario_empresa_controlador();
		}
		
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg'])){
			echo $InsEm->agregar_empresa_controlador();
		}
		//ver listado de empresas
		if($_POST['action'] == "verempresas"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			
			echo $InsEm->paginador_empresa_controlador($pagina,10,$_SESSION['privilegio_dsa'],$estado);
		}
		//desactivar empresa (eliminar)
		if($_POST['action'] == "desactivar_empresa"){
			echo $InsEm->desactivar_empresa_proyecto();
		}
		//crea select de empresa
		if($_POST['action'] == "crear_select"){
			$tipo = $_POST['tipo'];
			$Codigo = $_POST['codigo'];
			
			echo $InsEm->datos_select_empresa_controlador($tipo,$codigo);
		}
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}