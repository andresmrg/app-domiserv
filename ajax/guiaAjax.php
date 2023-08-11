<?php

$peticionAjax=true;
require_once "../core/configGeneral.php";
session_start(['name'=>'DSA']);
if ($_SESSION['sesionactiva'] == true){
	
	if(isset($_POST['action']) ||isset($_POST['remitente-reg']) ||isset($_POST['tiposervicio-reg']) || isset($_POST['id-up']) || isset($_POST['idguiaadmin-up']) || isset($_FILES['fileexcel-reg']) || isset($_POST['novedad-load']) || isset($_FILES['fileexcel-up']) || isset($_FILES['miarchivo-up'])){
		require_once "../controladores/guiaControlador.php";
		$InsGuia = new guiaControlador();
		
		//agregar nuevo cliente
		if(isset($_POST['remitente-reg']) && isset($_POST['tiposervicio-reg']) && isset($_POST['municipio-reg']) && isset($_POST['direccion-reg'])){
			echo $InsGuia->agregar_guia_controlador();
		}
		
		//MUESTRA LISTADO DE GUIAS
		if($_POST['action'] == "verguias"){			
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			
			
			
			echo $InsGuia->paginador_guia_controlador($pagina,30,$_SESSION['privilegio_dsa'],"","",$estado);
			
	
			
		}
		
		//buscar guias paginador
		if($_POST['action'] == "buscarguias"){
			
			$pagina = $_POST['pagina'];
			$estado = $_POST['estado'];
			$agente = $_POST['agente'];
			$novedad = $_POST['novedad'];
			$zona = $_POST['zona'];
			$tipofilro = $_POST['tipofilro'];
			$servicio = $_POST['servicio'];
			$Finicio = $_POST['Finicio'];
			$FFin = $_POST['FFin'];
			$busquedad1 = $_POST['busquedad'];
			$busquedadir = $_POST['busqdir'];
			
			if($Finicio != "" && $FFin != "" && $tipofilro == ""){$tipofilro = "FRecogida";}
			
			$busquedad = "OK";
			
			$filtros=[
				
				"Agente"=>$agente,
				"Novedad"=>$novedad,
				"Zona"=>$zona,
				"Tipofiltro"=>$tipofilro,
				"Servicio"=>$servicio,
				"Fechainicio"=>$Finicio,
				"Fechafin"=>$FFin,
				"Busquedad1"=>$busquedad1,
				"Busquedadir"=>$busquedadir
				
			];
			
			
			echo $InsGuia->paginador_guia_controlador($pagina,20,$_SESSION['privilegio_dsa'],$filtros,$busquedad,$estado);
			
			
		}
				
		//BUSCA DATOS GUIA UNICA
		if($_POST['action'] == "buscarguiaindividual"){
			$idguia = $_POST['idguia'];
			$D = $_POST['D'];
			echo $InsGuia->guiaunica_guia_controlador($idguia,$D);
		}
		
		//CARGAR IMAGEN DE GUIA, NOVEDAD, FECHA, Y LIQUIDAR
		if(isset($_POST['id-up']) && isset($_POST['novedad-up'])){
			echo $InsGuia->actualizar_imagen_guia_controlador();
		}
		
		//actualizar guia desde administrador
		if(isset($_POST['idguiaadmin-up']) && isset($_POST['remitenteadmin-up']) && isset($_POST['novedadadmin-up'])){
			echo $InsGuia->actualizar_admin_guia_controlador();
		}
		
		//ANULAR Y ACTIVAR GUIA
		if($_POST['action'] == "desactivar_guia"){
			
			echo $InsGuia->desactivar_guia_controlador();
		}
		
		
		//cargarexcel para importar guias masivamente
		if(isset($_FILES['fileexcel-reg'])){
			echo $InsGuia->importar_guias_guia_controlador();
		}
		
		//cargarexcel para actualizar guias masivamente
		if(isset($_FILES['fileexcel-up'])){
			echo $InsGuia->importar_actualizacion_guias_guia_controlador();
		}
		
		//cargar imagenes masivamente 
		if(isset($_FILES['miarchivo-up'])){
			echo $InsGuia->importar_imagenes_guias_guia_controlador();
		}
		
		//AREASIGNAR GUIA
		if($_POST['action'] == "resignarguias"){
			
			echo $InsGuia->reasignar_guia_controlador();
		}
		
		
		//cargar imagenes de guias 
		if($_POST['action'] == "cargarIMG"){
			
			$idguia = $_POST['idguia'];
			$imagen = $_POST['img'];
			$Timagen = $_POST['Timg'];
			
			echo $InsGuia->cargarIMGr_guia_controlador($idguia,$imagen,$Timagen);
		}
		
		
		//crear planilla
		if($_POST['action'] == "crearplanilla"){
			
			$agenteplanilla = $_POST['agente'];
			$zonaplanilla = $_POST['zona'];
			$fechaplanilla = $_POST['fechaplanilla'];
			$fechamaxplanilla = $_POST['fechaMaxCierre'];
			
			echo $InsGuia->crear_planilla_guia_controlador($agenteplanilla,$zonaplanilla,$fechaplanilla,$fechamaxplanilla);
			
		}
		
		//crear planillas masivamente 
		if($_POST['action'] == "guias_masivas"){

			$fechaplanilla = $_POST['fechaplanilla'];
			$fechamaxplanilla = $_POST['fechaMaxCierre'];
			$idimposdesde  = $_POST['impodesde'];
			$idimpohasta  = $_POST['impohasta'];
			
			echo $InsGuia->planilla_masiva_guia_controlador($fechaplanilla,$fechamaxplanilla,$idimposdesde,$idimpohasta);
		}
		//MUESTRA LISTADO DE planillas
		if($_POST['action'] == "verplanillas"){			
			$pagina = $_POST['pagina'];
			$registros = $_POST['registros'];
			$estado = $_POST['estado'];
			$agente = $_POST['agente'];
			$masivo = $_POST['idmasivo'];
			
			$filtros=[
				
				"Agente"=>$agente,
				"Novedad"=>$novedad,
				"Zona"=>$zona,
				"Tipofiltro"=>$tipofilro,
				"Servicio"=>$servicio,
				"Fechainicio"=>$Finicio,
				"Fechafin"=>$FFin,
				"Busquedad1"=>$busquedad1,
				"IdPlanilla"=>$idplanilla,
				"idmasivo"=>$masivo
			];
			
			
			echo $InsGuia->paginador_guia_planilla_controlador($pagina,$registros,$filtros,"",$estado);
			
	
			
		}
		
		//resumen del cargue
		if($_POST['action'] == "resumenCargueguias"){
			
			$Fechaplanilla = $_POST['fechaplanilla'];
			$Agenteplanilla = $_POST['codigoagente'];
			$idplanilla = $_POST['idplanilla'];
			
			echo $InsGuia->resumencargumen_guia_controlador($Agenteplanilla,$idplanilla,$Fechaplanilla);
		}
		
		//ver imagen individual
		if($_POST['action'] == "verimagenidividual"){
			
			$pagina = $_POST['pagina'];
			$Finicio = $_POST['Finicio'];
			$FFin = $_POST['FFin'];
			$guiadesde = $_POST['guiadesde'];
			$guiahasta = $_POST['guiahasta'];
			$version = $_POST['version'];
			
			
			$filtros=[
				"Fechainicio"=>$Finicio,
				"Fechafin"=>$FFin,
				"GuiaDesde"=>$guiadesde,
				"GuiaHasta"=>$guiahasta,
				"version"=>$version
			];
			
			
			echo $InsGuia->paginador_img_guia_controlador($pagina,1,$filtros);
			
			
		}
		
		//grafica recogidas
		if($_POST['action'] == "grafica"){
			
			$mesdes = $_POST['mesdesde'];
			$meshasta = $_POST['meshasta'];
			
			echo $InsGuia->grafica_recoentrega_guia_controlador($mesdes,$meshasta);
		} 
			
		//grafica recogidas
		if($_POST['action'] == "ingrecost"){
			
			$mesdes = $_POST['mesdesde'];
			$meshasta = $_POST['meshasta'];
			
			echo $InsGuia->grafica_ingrecost_guia_controlador($mesdes,$meshasta);
		}
		
		
		//grafica estregas agente
		if($_POST['action'] == "entregasagente"){
			
			$fechadesde = $_POST['fechadesde'];
			$fechahasta = $_POST['fechahasta'];
			
			echo $InsGuia->grafica_entregaagente_guia_controlador($fechadesde,$fechahasta);
		} 
		
		
	}else{
		
		echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
	}
}else{
	
		session_start(['name'=>'DSA']);
		session_destroy();
		echo '<script>window.location.href="'.SERVERURL.'login/" </script>';
	
}