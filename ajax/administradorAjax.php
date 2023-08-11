<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST['dni-reg']) || isset($_POST['codigo-del']) || isset($_POST['cuenta-up']) || isset($_POST['action'])){
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradroControlador();
		
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg'])){
			echo $insAdmin->agregar_administrador_controlador();
			
		}
		//ver listado de administradores
		if($_POST['action'] == "veradministradores"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
		
			
			
			echo $insAdmin->paginador_administrador_controlador($pagina,10,$_SESSION['privilegio_dsa'],$_SESSION['codigo_cuenta_dsa'],"",$estado);
			
			
		}
		//buscar administradores
		if($_POST['action'] == "buscaradministradores"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$busquedad = $_POST['busquedad'];
			
			echo $insAdmin->paginador_administrador_controlador($pagina,10,$_SESSION['privilegio_dsa'],$_SESSION['codigo_cuenta_dsa'],$busquedad,$estado);
			
			
		}
		//desactivar empresa (eliminar) 
		if($_POST['action'] == "desactivar_administrador"){
			echo $insAdmin->desactivar_administrador_controlador();
		}
		
		/*if(isset($_POST['codigo-del']) && isset($_POST['privilegio-admin'])){
			echo $insAdmin->eliminar_administrador_controlador();
		}*/
		if($_POST['action'] == "crearformularioactualizaradmin"){
			echo $insAdmin->crear_formulario_administrador_controlador();
		}
		
		if(isset($_POST['cuenta-up']) && isset($_POST['dni-up'])){
			echo $insAdmin->actualizar_administrador_controlador();
		}
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}