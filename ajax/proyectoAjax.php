<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	if(isset($_POST["nombre-reg"]) || isset($_POST["action"]) || isset($_POST["name-tarea"]) || isset($_POST["nameputask"])){
		require_once "../controladores/proyectoControlador.php";
		$InsProyecto = new proyectoControlador();
		session_start(['name'=>'DSA']);
		
			
		//agrega nuevo proyecto
		if(isset($_POST["nombre-reg"])){
			
			echo $InsProyecto->agregar_proyecto_controlador();
		}
		//visualiza proyectos totales
		if($_POST["action"] == "serchproyectos" ){
			
			echo $InsProyecto->ver_proyecto_controlador();
		}
		//visualiza proyectos individuales
		if($_POST["action"] == "cargar_proyecto" ){
			$proyectoCodigo = $_POST["proyectoCodigo"];
			echo $InsProyecto->ver_proyecto_individual_controlador($proyectoCodigo);
		}
		//agrega nueva tarea
		if(isset($_POST["name-tarea"])){
			
			echo $InsProyecto->agregar_tarea_proyecto_controlador();
		}
		
		//ver tareas del proyecto cargado
		if($_POST["action"] == "vertareas" ){
			$proyectoCodigo = $_POST["Idproyecto"];
			$busquedad = $_POST["busquedad"];
			$archivado = $_POST["Archivado"];
			
			echo $InsProyecto->ver_tareas_proyecto_controlador($proyectoCodigo,$busquedad,$archivado);
			
		}
		
		//ver tarea para editar
		if($_POST["action"] == "Editar_tarea"){
			$idtarea = $_POST["idtarea"];
					
			echo $InsProyecto->vereditar_tarea_proyecto_controlador($idtarea);
			
		}
		//actualizar tarea
		if(isset($_POST["nameputask"])){
			echo $InsProyecto->actualizar_tarea_proyecto_controlador();
		}
		
		//ELIMINAR TAREAS
		if($_POST["action"] == "eliminar_tarea"){
			echo $InsProyecto->eliminar_tarea_proyecto_controlador();
		}
		//finalizar o devorler a inicio la tarea
		if($_POST["action"] == "finalizar_nofintarea"){
			echo $InsProyecto->finini_tarea_proyecto_controlador();
		}
		//farchivar tarea
		if($_POST["action"] == "archivar_tarea"){
			echo $InsProyecto->archivar_tarea_proyecto_controlador();
		}
		/*if(isset($_POST['cuenta-up']) && isset($_POST['dni-up'])){
			echo $InsClient->actualizar_cliente_controlador();
		}*/
		
	}else{
		echo '<script>window.location.href="'.SERVERURL.'home/" </script>';
	}
}else{
	session_start(['name'=>'DSA']);
	session_destroy();
	echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
}