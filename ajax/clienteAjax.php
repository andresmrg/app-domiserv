<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST['dni-reg']) || isset($_POST['dnireg']) || isset($_POST['Cdni-reg']) || isset($_POST['codigo-del']) || isset($_POST['cuenta-up']) || isset($_POST['Ccuenta-up']) || isset($_POST['action'])){
		
		require_once "../controladores/clienteControlador.php";
		$InsClient = new clienteControlador();
		
		//agregar nuevo cliente
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg'])){
			echo $InsClient->agregar_cliente_controlador();
		}
		//agregar nuevo cliente solo
		if(isset($_POST['dnireg']) && isset($_POST['nombrereg']) && isset($_POST['apellidoreg'])){
			echo $InsClient->agregar_solo_cliente_controlador();
		}
		
		//ver listado de clientes
		if($_POST['action'] == "verclientes"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			
			
			
			echo $InsClient->paginador_cliente_controlador($pagina,10,$_SESSION['privilegio_dsa'],"",$estado);
			
			
		}
		
		//buscar clientes
		if($_POST['action'] == "buscarclientes"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$busquedad = $_POST['busquedad'];
			
			echo $InsClient->paginador_cliente_controlador($pagina,10,$_SESSION['privilegio_dsa'],$busquedad,$estado);
			
			
		}
		
		//buscar cliente no corporativo para crear guia
		if($_POST['action'] == "buscarclientenocorporativo"){
			$tipo = $_POST['tipo'];
			$busquedad = $_POST['busquedad'];
			
			echo $InsClient->datos_nocorporativo_cliente_controlador($tipo,$busquedad);
		}
		//desactivar empresa (eliminar) 
		if($_POST['action'] == "desactivar_cliente"){
			echo $InsClient->desactivar_cliente_controlador();
		}
		
		//crea formulario para actualizar cliente
		if($_POST['action'] == "crearformularioactualizarcliente"){
			echo $InsClient->crear_formulario_cliente_controlador();
		}
		//actualiza cliente
		if(isset($_POST['cuenta-up']) && isset($_POST['dni-up'])){
			echo $InsClient->actualizar_cliente_controlador();
		}
		
		// ====== PROCEDIMIENTO PARA CREAR CUENTAS DE USUARIOS BAJO CADA CLIENTE ========
		//agregar nuevo cuenta de cliente
		if(isset($_POST['Cdni-reg']) && isset($_POST['Cnombre-reg']) && isset($_POST['Capellido-reg']) && isset($_POST['Cusuario-reg'])){
			echo $InsClient->agregar_C_cliente_controlador();
		}
		//ver listado de cuentas clientes
		if($_POST['action'] == "vercuentasC"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$cliente = $_POST['CodigoCliente'];
			
			echo $InsClient->paginador_C_cliente_controlador($pagina,10,$_SESSION['privilegio_dsa'],$cliente,"",$estado);
		
		}
		
		//buscar cuentas clientes
		if($_POST['action'] == "buscarcuentasC"){
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$busquedad = $_POST['busquedad'];
			$cliente = $_POST['CodigoCliente'];
			
			echo $InsClient->paginador_C_cliente_controlador($pagina,10,$_SESSION['privilegio_dsa'],$cliente,$busquedad,$estado);
			
			
		}
		
		//desactivar cuenta (eliminar) 
		if($_POST['action'] == "desactivar_cuentaC"){
			echo $InsClient->desactivar_C_cliente_controlador();
		}
		
		
		//crea formulario para actualizar cuenta cliente
		if($_POST['action'] == "crearformularioactualizarcuentaC"){
			echo $InsClient->crear_formulario_C_cliente_controlador();
		}
		
		//actualiza CUENTA cliente
		if(isset($_POST['Ccuenta-up']) && isset($_POST['Cdni-up'])){
			echo $InsClient->actualizar_C_cliente_controlador();
		}
		
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}