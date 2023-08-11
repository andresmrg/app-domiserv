<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST['dni-reg']) || isset($_POST['action']) || isset($_POST['CdrCodigoC']) || isset($_POST['Ccuenta-up'])){
		session_start(['name'=>'DSA']);
		require_once "../controladores/cdrControlador.php";
		
		$Inscom = new cdrControlador();
		
		//gerera las variables para crear nueva empresa
		
		
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg'])){
			echo $Inscom->agregar_cdr_controlador();
			
		}
		//ver listado de companias
		if($_POST['action'] == "vercdrs"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			
			echo $Inscom->paginador_cdr_controlador($pagina,10,$_SESSION['privilegio_dsa'],$estado);
		}
		//desactivar empresa (eliminar)
		if($_POST['action'] == "desactivar_cdr"){
			echo $Inscom->desactivar_cdr_proyecto();
		}
		
		// ====== PROCEDIMIENTO PARA CREAR CUENTAS DE USUARIOS BAJO CADA CLIENTE ========
		//agregar cuenta de para cdr
		if(isset($_POST['CdrCodigoC']) && isset($_POST['iddirector-reg'])){
			echo $Inscom->agregar_C_cdr_controlador();
			
		}
		
		//ver listado de cuentas cdr
		if($_POST['action'] == "vercuentasCdr"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$cdr = $_POST['Codigocdr'];
			
			echo $Inscom->paginador_C_cdr_controlador($pagina,10,$_SESSION['privilegio_dsa'],$cdr,"",$estado);
		
		}
		
		//buscar cuentas cdr
		if($_POST['action'] == "buscarcuentasCdr"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$busquedad = $_POST['busquedad'];
			$cdr = $_POST['Codigocdr'];
			
			echo $Inscom->paginador_C_cdr_controlador($pagina,10,$_SESSION['privilegio_dsa'],$cdr,$busquedad,$estado);
			
			
		}
		
		//desactivar cuenta (eliminar) 
		if($_POST['action'] == "desactivar_cdrC"){
			echo $Inscom->desactivar_C_cdr_controlador();
		}
		//crea formulario para actualizar cuenta cdr
		if($_POST['action'] == "crearformularioactualizarcuentaCdr"){
			echo $Inscom->crear_formulario_C_cdr_controlador();
		}
		
		//actualiza CUENTA cliente
		if(isset($_POST['Ccuenta-up']) && isset($_POST['Cdni-up'])){
			echo $Inscom->actualizar_C_cdr_controlador();
		}
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}