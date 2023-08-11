 <?php
	if($peticionAjax){
		require_once "../modelos/proyectoModelo.php";
	}else{
		require_once "./modelos/proyectoModelo.php";
	}

class proyectoControlador extends proyectoModelo{
	// crear div modales
	public function obtener_modales_proyecto_controlador(){
		$formularios= "";
		$grupoP = proyectoControlador::prioridad_proyecto_controlador();
		
		
		//<!--div para crear nuevo proyecto-->
		if($_SESSION['Pri_nuevoproyecto'] == 1){
			$formularios.='

			<div class="modal fade" id="divnewproject" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nuevo Proyecto</div>
						</div>
						<div class="modal-body">
							<form role="form" id="newproject" name="registroProyectos" action="'.SERVERURL.'ajax/proyectoAjax.php " method="POST" data-form="save" class="FormularioProyectos" autocomplete="off" enctype="multipart/form-data">


								<div class="form-group">
									<input type="hidden" id="idrespuesta" class="tiporespuesta" value="JSON">
									<input type="text" class="form-control" name="nombre-reg" id="nombre-reg" placeholder="Nombre del Proyecto" required>
								</div>

								<div class="row">
								<div class="col-md-6">
									<button type="submit" id="nuevoproyecto" class="btn btn-primary btn-block">Guardar</button>
								</div>
								<div class="col-md-6">
									<button type="button" id="closenewproject" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
								</div>
								</div>
								<div class="RespuestaAjax"></div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>

				</div>
			</div>';
		}
		
		//div para crear nueva tarea
		if($_SESSION['Pri_nuevatarea'] == 1){
			$formularios.='
			<div class="modal fade" id="divnewtask" tabindex="1001" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nueva Tarea</div>
						</div>
						<div class="modal-body">
							<form role="form" id="newtask" name="registrotareas" action="'.SERVERURL.'ajax/proyectoAjax.php " method="POST" data-form="save" class="FormularioProyectos" autocomplete="off" enctype="multipart/form-data">


								<div class="form-group">
									<input type="hidden" name="project_idsave" id="project_idsave" value="">
									<!--<input type="text" class="form-control" required name="name-tarea" id="Nombre_tarea" placeholder="Tarea">-->
									<textarea name="name-tarea" class="form-control" id="Nombre_tarea" placeholder="Tarea" required></textarea>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
												<input type="text" name="tags" class="form-control" placeholder="Etiquetas (separadas por comas)">
											</div>
										</div>
										<div class="col-md-2">
											<select name="priority_id" class="form-control">
											"'.$grupoP.'"

											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary btn-block">Guardar</button>
										<input type="hidden" name="project_id1" id="project_id1" value="">
									</div>
									<div class="col-md-6">
										<button type="button" id="closenewtask" class="btn btn-danger btn-block"  data-dismiss="modal">Cancelar</button>
									</div>
								</div>
								<div class="RespuestaAjax"></div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>';
		}
		//div para editar y modificar tarea-->
		if($_SESSION['Pri_editartarea'] == 1){
			$formularios.='
			<div class="modal fade" id="actualizartarea" tabindex="1002" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nuevo Proyecto</div>
						</div>
						<div class="modal-body">
							<form role="form" id="edittask" name="Actualizartarea" action="'.SERVERURL.'ajax/proyectoAjax.php " method="POST" data-form="update" class="FormularioProyectos" autocomplete="off" enctype="multipart/form-data">

								<div class="form-group">
									<textarea name="nameputask" class="form-control" id="nameputask" placeholder="Tarea" required></textarea>
								</div>
								<div class="form-group">
									<textarea name="descriptiontask" class="form-control" id="descriptiontask" placeholder="Descripcion"></textarea>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
												<input type="date" name="start_at" id="start_at" class="form-control" placeholder="Fecha inicio" value="">
											</div>
										</div>

										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
												<input type="date" name="finish_at" id="finish_at" class="form-control" placeholder="Fecha terminacion" value="">
											</div>
										</div>

									</div>
								</div>
								<!-- - - - - -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
												<input type="text" name="tags" class="form-control" placeholder="Etiquetas (separadas por comas)">
											</div>
										</div>
										<div class="col-md-2">
											<select name="priority_id" id="priority_id" class="form-control">
												"'.$grupoP.'"
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
										<input type="hidden" name="taskup_id"  id="taskup_id" value="">
									</div>
									<div class="col-md-6"><button type="button" id="closeedittask" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
									</div>
								</div>
								<div class="RespuestaAjax"></div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>

				</div>
			</div>
			';
		}
				
			
		echo $formularios;
		
		}
	//controlador para agregar proyecto
	public function agregar_proyecto_controlador(){
		$nombre=mainModel::limpiar_cadena($_POST["nombre-reg"]);
		
		if($nombre == ""){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No ha ingresado el nombre del proyecto",
				"Tipo"=>"error"

			];
		}else{
			$consulta=mainModel::ejecutar_consulta_simple("SELECT id FROM Proyecto");
			$numero=($consulta->rowCount())+1;

			$codigo=mainModel::generar_codigo_aleatorio("PY",8,$numero);
			$fecha = date("Y-m-d");
			$CuentaCodigo = $_SESSION['codigo_cuenta_dsa'];

			$dataPY=[
				"Nombre"=>$nombre,
				"Fecha"=>$fecha,
				"CodigoProyecto"=>$codigo,
				"Codigo"=>$CuentaCodigo
			];
			
			$guardarproyecto=proyectoModelo::agregar_proyecto_modelo($dataPY);
			if($guardarproyecto->rowCount()>=1){
					
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"Proyecto registrado",
					"Texto"=>"El proyecto se registro con exito en el sistema.",
					"Tipo"=>"success"

				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido registrar el proyecto",
					"Tipo"=>"error"

				];
			}	
		}
		return mainModel::sweet_alert1($alerta);	
		
	}
	//carga todos los proyectos
	public function ver_proyecto_controlador(){
		$Proyectos=mainModel::ejecutar_consulta_simple("SELECT * FROM Proyecto ORDER BY id ASC");
		$datos= $Proyectos->fetchAll();
		
		$grupo = '<div class="list-group">';
		$proyectoN = 0;
		foreach($datos as $rows){
			$proyectoN++;
			$codeproyect = mainModel::encryption($rows['ProyectoCodigo']);
			$grupo.= '<a  id="proyecto'.$proyectoN.'" class="list-group-item" ><span class="badge">'.$proyectoN.'</span>'.$rows["ProyectoNombre"].'</a>';
			
			$grupo.='
				<script>
					$("#proyecto'.$proyectoN.'").click(function(e){
						e.preventDefault();


						var proyectoCodigo = "'.$codeproyect.'"
						var action = "cargar_proyecto";

						$.ajax({
						url: "../ajax/proyectoAjax.php",
						type: "POST",
						async: true,
						data: {action:action,proyectoCodigo:proyectoCodigo},

							success: function(response)
							{	
								//console.log(response);
								if(response != "error")

								{
									
									$(".name_proyecto").html(response);	
									$("#project_id").val("'.$codeproyect.'");
									$("#project_id1").val("'.$codeproyect.'");
									$("#project_idsave").val("'.$codeproyect.'");
								}else
								{
									
									$(".name_proyecto").html("");
									$("#project_id").val("");
									$("#project_id1").val("");
									$("#project_idsave").val("");
								}

							},

							error: function(error){

							}
						});
						vertareas("'.$codeproyect.'");
					});
				</script>
			';
						
		}
		$grupo.= '</div>';
				
		$Arraygrupo['grupo'] = $grupo;
		
		echo json_encode($Arraygrupo,JSON_UNESCAPED_UNICODE);
		
		//return $grupo;
	}
	
	//carga prioridades
	public function prioridad_proyecto_controlador(){
		$Prioridad=mainModel::ejecutar_consulta_simple("SELECT id,PrioridadNombre FROM Proy_prioridad ORDER BY PrioridadNombre ASC");
		$datos= $Prioridad->fetchAll();
		
		$grupoP = '';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['id'].'">'.$rows["PrioridadNombre"].'</option>';
									
		}
		
		return $grupoP;
	}
	
	// ver proyecto individual
	public function ver_proyecto_individual_controlador($codigo){
		$codigo=mainModel::limpiar_cadena($codigo);
		$codigo=mainModel::decryption($codigo);
		
		$Proyecto=mainModel::ejecutar_consulta_simple("SELECT * FROM Proyecto WHERE ProyectoCodigo = '$codigo'");
		$datos= $Proyecto->fetchAll();
		
		foreach($datos as $row){
			$ProyectoNombre = $row['ProyectoNombre'];
		}
			return $ProyectoNombre;
	}
	
	//controlador para agregar tareas
	public function agregar_tarea_proyecto_controlador(){
		$nombre=mainModel::limpiar_cadena($_POST['name-tarea']);
		$CodigoProyecto=mainModel::limpiar_cadena($_POST['project_idsave']);
		$prioridad=mainModel::limpiar_cadena($_POST['priority_id']);
		
		if($CodigoProyecto == ""){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No ha Seleccionado el proyecto a asignar tareas, Por favor seleccionelo y vuelva a intentar.",
				"Tipo"=>"error"

			];
		}else{
			if($nombre == ""){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No ha ingresado el nombre de la tarea.",
					"Tipo"=>"error"

				];
			}else{
				
				$CodigoProyecto = mainModel::decryption($CodigoProyecto);
				$fecha = date("Y-m-d");

				$dataPY=[
					"Nombre"=>$nombre,
					"Prioridad"=>$prioridad,
					"Codigo"=>$CodigoProyecto,
					"FechaInicio"=>$fecha,
					"FechaTarea"=>$fecha
				];


				$guardartarea=proyectoModelo::agregar_tarea_proyecto_modelo($dataPY);
				if($guardartarea->rowCount()>=1){
					$alerta=[
						"Alerta"=>"limpiar",
						"Titulo"=>"Tarea registrada",
						"Texto"=>"La tarea se registro con exito en el sistema.",
						"Tipo"=>"success"

					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido registrar la Tarea modelo no agrego ".$dataPY["Nombre"]." ".$dataPY["Prioridad"]." ".$dataPY["Codigo"]." ".$dataPY["FechaInicio"]." ".$dataPY["FechaTarea"],
						"Tipo"=>"error"

					];
				}	
			}
		}
		return mainModel::sweet_alert1($alerta);	
		
	}
	
	//ver tareas
	public function ver_tareas_proyecto_controlador($proyectoCodigo,$busqueda,$archivado){
		$proyectoCodigo=mainModel::limpiar_cadena($proyectoCodigo);
		$busqueda=mainModel::limpiar_cadena($busqueda);
		$archivado=mainModel::limpiar_cadena($archivado);
		
		$proyectoCodigo=mainModel::decryption($proyectoCodigo);
		
		$contadorbusquedad = "";
		if(isset($busqueda) && $busqueda!=""){
			$consulta="
			SELECT SQL_CALC_FOUND_ROWS * FROM Proy_Tareas WHERE ProyectoCodigo = '$proyectoCodigo' AND TareaNombre  LIKE '%$busqueda%'  ORDER BY PrioridadId DESC,TareaCreada ASC ";
			
			
		}else{
			if(isset($archivado) && $archivado == 0){
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM Proy_Tareas WHERE ProyectoCodigo = '$proyectoCodigo' AND TareaArchivada = '$archivado' ORDER BY PrioridadId DESC,TareaCreada ASC ";
			}elseif($archivado == 1){
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM Proy_Tareas WHERE ProyectoCodigo = '$proyectoCodigo' AND TareaArchivada = '$archivado' ORDER BY PrioridadId DESC,TareaCreada ASC ";
			}

		}
				
		
		
		
		$conexion =mainModel::conectar();
			
			
			
		$datos = $conexion->query($consulta);
		$datos= $datos->fetchAll();

		$total = $conexion->query("SELECT FOUND_ROWS()");
		$total = (int) $total->fetchColumn();
		
		if(isset($busqueda) && $busqueda!=""){
			$contadorbusquedad = '<li class="active">'.$total.' Tareas de busquedad</a></li>';
		}
		//cuenta tareas finalizadas
		$finalizadas=mainModel::ejecutar_consulta_simple("SELECT COUNT(id) as Total_finalizadas FROM Proy_Tareas WHERE ProyectoCodigo = '$proyectoCodigo' AND TareaFinalizada = 1");
		$finalizadas = $finalizadas->fetch();
		$Tareasterminadas = $finalizadas['Total_finalizadas'];
			
		//cuenta tareas archivadas
		$archivadas=mainModel::ejecutar_consulta_simple("SELECT COUNT(id) as Total_archivadas FROM Proy_Tareas WHERE ProyectoCodigo = '$proyectoCodigo' AND TareaArchivada = 1");
		$archivadas = $archivadas->fetch();
		$Tareasarchivadas = $archivadas['Total_archivadas'];
		
		$contadorarchivadas = "";
		if($Tareasarchivadas > 0){
			$contadorarchivadas = '<li class="active">'.$Tareasarchivadas.' Archivadas</a></li>';
		}
		
		//cuenta total tareas 
		$totaltareas=mainModel::ejecutar_consulta_simple("SELECT COUNT(id) as Total_tareas FROM Proy_Tareas WHERE ProyectoCodigo = '$proyectoCodigo'");
		$totaltareas = $totaltareas->fetch();
		$TareasTotal = $totaltareas['Total_tareas'];
		
		$pendientes = $TareasTotal - $Tareasterminadas;
			
		$html="";
		
		
		$html.='<ol class="breadcrumb">
					<li class="active">'.$pendientes.' Pendientes</a></li>
					<li class="active">'.$Tareasterminadas.' Finalizadas</a></li>
					<li class="active">'.$TareasTotal.' Todas</a></li>'.$contadorarchivadas.$contadorbusquedad.'
					


				</ol>';
				
		if($total>0){
			//echo 
			$html.='<input id="tipovista" type="hidden" value="T'.$archivado.'"';
			$html.='<ul type="none">';
			foreach ($datos as $rows) {
				$priori = $rows['PrioridadId'];
				$idtarea = $rows['id'];
				$NombreTarea = $rows['TareaNombre'];
				
				$Prioridad=mainModel::ejecutar_consulta_simple("SELECT * FROM Proy_prioridad WHERE id = $priori");
				$prioridadtarea = $Prioridad->fetch();
				$NombrePrioridad = $prioridadtarea['PrioridadNombre'];
				$checked = "";
				if($rows['TareaFinalizada'] == 1){
					$checked = "checked";
				}
				
				$tags_str = "";
				$tag_tareas=mainModel::ejecutar_consulta_simple("SELECT * FROM Proy_Tareas_tag WHERE TareaId = '$idtarea'");
				$datostag= $tag_tareas->fetchAll();
				
				foreach($datostag as $ids){
					$idtad = $ids['TagId'];
					$TagNombre =mainModel::ejecutar_consulta_simple("SELECT * FROM Proy_tag WHERE id = $idtad");	
					$TagNombre = $TagNombre->fetch();
					$tags_str.= '<span class="label label-default"><i class="fa fa-tag"></i> '.$TagNombre["TagNombre"].'</span>';
				}
				
				
				$idtarea=mainModel::encryption($idtarea);
				
				$archive = "";
				if($rows['TareaFinalizada']== 1){
					if($_SESSION['Pri_archivartarea'] == 1){//privilegio para archivar tarea
						$archive.= '<a href="javascript:void(0)" id="archive-'.$idtarea.'" class="btn btn-default btn-xs tip" title="Archivar"><i class="glyphicon glyphicon-folder-close"></i></a>';
					}
				}
				
				
				// echo 
				 $html.='<li class="task" id="task-'.$idtarea.'">

				<span class="pull-right">'.$NombrePrioridad.'   </span>
				
				
					<input type="checkbox" '.$checked.' id="check-'.$idtarea.'"><label>
						'.$NombreTarea.'
					
					</label>';
								
				$html.= $tags_str;
				
				 $html.='
				 <div class="task-menu">
				 <a href="javascript:void(0)" id="activity-'.$idtarea.'" class="btn btn-default btn-xs tip" title="Actividad"><i class="glyphicon glyphicon-comment"></i></a>';
				 if($_SESSION['Pri_editartarea'] == 1){//privilegio para editar tarea
					$html.='
				 	<a href="#" id="edit-'.$idtarea.'" class="btn btn-default btn-xs tip" title="Editar"
				 	data-toggle="modal" data-target="#actualizartarea"><i class="glyphicon glyphicon-edit"></i></a>';
				 }

									
				$html.=$archive;
				if($_SESSION['Pri_eliminartarea'] == 1){//privilegio para eliminar tarea
					
					$html.='<a href="javascript:void(0)" id="delete-'.$idtarea.'" class="btn btn-default btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
				 }
				$html.='	
				</div>
				<div id="edittaskform-'.$idtarea.'"></div>
				</li>';
				
				//echo <<<SSS
				$html.='<script>';
				 if($_SESSION['Pri_editartarea'] == 1){//privilegio para editar tarea
					$html.='
					$("#edit-'.$idtarea.'").click(function(e){
							e.preventDefault();


							var idtarea = "'.$idtarea.'"
							var action = "Editar_tarea";

							$.ajax({
							url: "../ajax/proyectoAjax.php",
							type: "POST",
							async: true,
							data: {action:action,idtarea:idtarea},

								success: function(response)
								{	

									if(response != "")
									{
									var data = $.parseJSON(response);

									console.log(data);
									//var data = $.parseJSON(response);
									$("#nameputask").val(data.TareaNombre);
									$("#descriptiontask").val(data.TareaDescripcion);
									$("#start_at").val(data.TareaInicio);
									$("#finish_at").val(data.TareaFinal);
									$("#priority_id").val(data.PrioridadId);
									$("#taskup_id").val("'.$idtarea.'");

									}else
									{
									$("#nameputask").val("");
									$("#descriptiontask").val("");
									$("#start_at").val("");
									$("#finish_at").val("");
									$("#priority_id").val("4");
									$("#taskup_id").val("");	
									}

								},

								error: function(error){

								}
							});
							$("#myModal").show("fast");

						});';
					 }

				$html.='
				$("#check-'.$idtarea.'").change(function(e){
					e.preventDefault();
					
					var r = $(this).get(0).checked;
					var estado = 0;			
					if(r==true){estado=1;}
					
					var action = "finalizar_nofintarea";
					var url = "'.SERVERURL.'ajax/proyectoAjax.php";
					var tipo = "update";
					var tipoaccion = "POST";
					var data = {action:action,idupdate:"'.$idtarea.'",estado:estado};
					generalesproyectos(url,tipo,tipoaccion,data,action);

				});';
				
				if($_SESSION['Pri_eliminartarea'] == 1){//privilegio para eliminar tarea
					$html.='
					$("#delete-'.$idtarea.'").click(function(e){
						e.preventDefault();
						var action = "eliminar_tarea";
						var url = "'.SERVERURL.'ajax/proyectoAjax.php";
						var tipo = "delete";
						var tipoaccion = "POST";
						var data = {action:action,iddelete:"'.$idtarea.'"};
						generalesproyectos(url,tipo,tipoaccion,data,action);


					});';
				}
				
				if($_SESSION['Pri_archivartarea'] == 1){//privilegio para archivar tarea
					$html.='
					$("#archive-'.$idtarea.'").click(function(e){
						e.preventDefault();

						var r = $("#check-'.$idtarea.'").get(0).checked;

						if(r==true){
							var action = "archivar_tarea";
							var url = "'.SERVERURL.'ajax/proyectoAjax.php";
							var tipo = "update";
							var tipoaccion = "POST";
							var data = {action:action,idupdate:"'.$idtarea.'",estado:"1"};
							generalesproyectos(url,tipo,tipoaccion,data,action);						

						}


					});';
				}
				$html.='
				</script>';

				//SSS;
			}
			
			//echo
			$html.='</ul>';
				
			}else{
				//echo 
			$html.='<p class="alert alert-info">No hay tareas</p>';
			}
		
			return $html;
	}
	//CARGA TAREA PARA SER EDITADA
	public function vereditar_tarea_proyecto_controlador($idtarea){
		$idtarea=mainModel::limpiar_cadena($idtarea);
				
		$idtarea=mainModel::decryption($idtarea);
		
		$Tarea=mainModel::ejecutar_consulta_simple("SELECT * FROM Proy_Tareas WHERE id = $idtarea");
		$datos= $Tarea->fetch();
		
		
			
		if($Tarea->rowCount()>= 1){
			
		}else{
			//echo 
			$datos = 0;
		}
		echo json_encode($datos,JSON_UNESCAPED_UNICODE);
		
	}
	//controlador para ACTUALIZAR tareas
	public function actualizar_tarea_proyecto_controlador(){
		$nombre=mainModel::limpiar_cadena($_POST['nameputask']);
		$descripcion=mainModel::limpiar_cadena($_POST['descriptiontask']);
		$CodigoProyecto=mainModel::limpiar_cadena($_POST['taskup_id']);
		$prioridad=mainModel::limpiar_cadena($_POST['priority_id']);
		$fechaInicio= $_POST['start_at'];
		$fechaFin = $_POST['finish_at'];
		
		if($fechaInicio == ""){
			$fechaInicio = NULL;
		}
		
		if($fechaFin == ""){
			$fechaFin = NULL;
		}
			
		if($CodigoProyecto == ""){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado 1",
				"Texto"=>"No ha Seleccionado el proyecto a asignar tareas, Por favor seleccionelo y vuelva a intentar.",
				"Tipo"=>"error"

			];
		}else{
			if($nombre == ""){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado 2",
					"Texto"=>"No ha ingresado el nombre de la tarea.",
					"Tipo"=>"error"

				];
			}else{
				
				$CodigoProyecto = mainModel::decryption($CodigoProyecto);
				
				$dataPY=[
					"Nombre"=>$nombre,
					"Descripcion"=>$descripcion,
					"Prioridad"=>$prioridad,
					"Codigo"=>$CodigoProyecto,
					"FechaInicio"=>$fechaInicio,
					"Fechafin"=>$fechaFin
				];


				$guardartarea=proyectoModelo::actualizar_tarea_proyecto_modelo($dataPY);
				if($guardartarea->rowCount()>=1){
					$alerta=[
						"Alerta"=>"limpiar",
						"Titulo"=>"Tarea registrada",
						"Texto"=>"La tarea se actualizo con exito en el sistema.",
						"Tipo"=>"success"

					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado 3",
						"Texto"=>"No hemos podido actualizar la Tarea",
						"Tipo"=>"error"

					];
				}	
			}
		}
		return mainModel::sweet_alert1($alerta);	
		
	}
	
	//eliminar tarea
	public function eliminar_tarea_proyecto_controlador(){
		$codigo=mainModel::limpiar_cadena($_POST['iddelete']);
		$codigo=mainModel::decryption($codigo);
		

				$Deltarea=proyectoModelo::eliminar_tarea_proyecto_modelo($codigo);
				
				if($Deltarea->rowCount()>=1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Tarea eliminada.",
							"Texto"=>"la tarea fue eliminada con exito del sistema.",
							"Tipo"=>"success"

						];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos eliminar esta tarea en este momento.",
						"Tipo"=>"error"

					];	
				}

		
		return mainModel::sweet_alert($alerta);
	}
	
	//finalizar o devorler a inicio la tarea
	public function finini_tarea_proyecto_controlador(){
		$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
		$estado=mainModel::limpiar_cadena($_POST['estado']);
		
		$codigo=mainModel::decryption($codigo);
		
		
				$Uptarea=proyectoModelo::finini_tarea_proyecto_modelo($codigo,$estado);
				
				if($Uptarea->rowCount()>=1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Tarea actualizada.",
							"Texto"=>"El estado de la tarea fue actualizado con exito.",
							"Tipo"=>"success"

						];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos actualizar el estado de la tarea en este momento.",
						"Tipo"=>"error"

					];	
				}

		
		return mainModel::sweet_alert($alerta);
	}
	
	
	//archivar tarea
	public function archivar_tarea_proyecto_controlador(){
		$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
		$estado=mainModel::limpiar_cadena($_POST['estado']);
		
		$codigo=mainModel::decryption($codigo);
		
		
				$Uptarea=proyectoModelo::archivar_tarea_proyecto_modelo($codigo,$estado);
				
				if($Uptarea->rowCount()>=1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Tarea actualizada.",
							"Texto"=>"la tarea fue archivada con exito.",
							"Tipo"=>"success"

						];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos archivar la tarea en este momento.",
						"Tipo"=>"error"

					];	
				}

		
		return mainModel::sweet_alert($alerta);
	}	
}