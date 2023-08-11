<?php
	if($peticionAjax){
		require_once "../modelos/empresaModelo.php";
	}else{
		require_once "./modelos/empresaModelo.php";
	}

class empresaControlador extends empresaModelo{
	// crear div modales
	public function obtener_modales_empresa_controlador(){
		$formularios= "";
		
		
		//div para crear nuevo empresa
		if($_SESSION['Pri_nuevaempresa'] == 1){
			$formularios.='

			<div class="modal fade" id="divnewempresa" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nueva Empresa</div>
						</div>
						<div class="modal-body">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE LA EMPRESA</h3>
								</div>
								<div class="panel-body">
									<form action="'.SERVERURL.'ajax/empresaAjax.php" method="POST" id="regnewempresa" name="regnewempresa" data-form="save" class="FormularioEmpresa" autocomplete="off" enctype="multipart/form-data">

									</form>
								</div>
							</div>
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
	
	public function crear_formulario_empresa_controlador(){
		$tipo = $_POST['tipo'];
		$Codigo = $_POST['codigo'];
	
		$cEm = empresaControlador::datos_empresa_controlador($tipo,$Codigo);
		$forma = "";
		if($cEm->rowCount()<2){
			if($_SESSION['Pri_nuevaempresa'] == 1){
				$forma.='

								<fieldset>
									<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">DNI/CÓDIGO/NÚMERO DE REGISTRO *</label>
													<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">Nombre de la empresa *</label>
													<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombre-reg" required="" maxlength="40">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">Teléfono</label>
													<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">E-mail</label>
													<input class="form-control" type="email" name="email-reg" maxlength="50">
												</div>
											</div>
											<div class="col-xs-12">
												<div class="form-group label-floating">
													<label class="control-label">Dirección</label>
													<input class="form-control" type="text" name="direccion-reg" maxlength="170">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<br>
								<fieldset>
									<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Otros datos</legend>
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">Id representante legal *</label>
													<input class="form-control" type="text" name="idrepresentante-reg" required="" maxlength="30">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group label-floating">
													<label class="control-label">Nombre representante legal *</label>
													<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="director-reg" required="" maxlength="50">
												</div>
											</div>

										</div>
									</div>
								</fieldset>
								<br>
								<p class="text-center" style="margin-top: 20px;">
									<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
								</p>
								<div class="RespuestaAjax"></div>


				';
			}
		}else{
			$forma.='
				<div class="alert alert-dismissible alert-primary text-center">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
					<h4>¡Lo sentimos!</h4>
					<p>ya existe una empresaregistrada por lo tanto ya no puede agregar mas</p>
				</div>
			';
		}
		return $forma;
	}
	
	
	public function agregar_empresa_controlador(){
		$codigo=mainModel::limpiar_cadena($_POST['dni-reg']);
		$nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
		$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
		$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
		$email=mainModel::limpiar_cadena($_POST['email-reg']);
		$idrepresentante=mainModel::limpiar_cadena($_POST['idrepresentante-reg']);
		$nombrerepresentante=mainModel::limpiar_cadena($_POST['director-reg']);
		
		$consulta1= mainModel::ejecutar_consulta_simple("SELECT EmpresaCodigo FROM empresa WHERE EmpresaCodigo='$codigo'");
		if($consulta1->rowCount()<= 0){
			$consulta2= mainModel::ejecutar_consulta_simple("SELECT EmpresaNombre FROM empresa WHERE EmpresaNombre='$nombre'");
			if($consulta2->rowCount()<= 0){
				$datosEmpresa=[
					"Codigo"=>$codigo,
					"Nombre"=>$nombre,
					"Direccion"=>$direccion,
					"Telefono"=>$telefono,
					"Email"=>$email,
					"IdRepresentante"=>$idrepresentante,
					"NombreRepresentante"=>$nombrerepresentante
					
				];
				$guardarempresa = empresaModelo::agregar_empresa_modelo($datosEmpresa);	
				
				if($guardarempresa->rowCount()>=1){
					$alerta=[
						"Alerta"=>"limpiar",
						"Titulo"=>"Empresa registrada ",
						"Texto"=>"Los datos de la empresa se registrarón con exíto.",
						"Tipo"=>"success"

					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido guardar los datos de la empresa, por favor intente nuevamente.",
						"Tipo"=>"error"

					];
				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El nombre de la empresa que acaba de ingresar ya se encuentra en el sistema.",
					"Tipo"=>"error"

				];
			}
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"El codigo de la empresa que acaba de ingresar ya se encuentra en el sistema.",
				"Tipo"=>"error"

			];
		}
		
		return mainModel::sweet_alert1($alerta);
	}
	
	public function datos_empresa_controlador($tipo,$codigo){
		$codigo=mainModel::decryption($codigo);
		
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		return empresaModelo::datos_empresa_modelo($tipo,$codigo);
	}
	
	//crea select de empresas
	public function datos_select_empresa_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectEmpresa = empresaModelo::datos_empresa_modelo($tipo,$codigo);
		$datos= $selectEmpresa->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['EmpresaCodigo'].'">'.$rows["EmpresaNombre"].'</option>';
									
		}
		
		return $grupoP;
	}
	
				//Controlador para paginador administradores
	public function paginador_empresa_controlador($pagina,$registros,$privilegio,$estado){
		
		
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$estado=mainModel::limpiar_cadena($estado);	
		$tabla="";
		
		if($_SESSION['Pri_listempresasactivas'] == 1){
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;


			$consulta="
			SELECT SQL_CALC_FOUND_ROWS * FROM empresa WHERE EmpresaEstado = '$estado' ORDER BY id ASC LIMIT $inicio,$registros";

			$paginaurl="companylist";


			$conexion =mainModel::conectar();



			$datos = $conexion->query($consulta);
			$datos= $datos->fetchAll();

			$total = $conexion->query("SELECT FOUND_ROWS()");
			$total = (int) $total->fetchColumn();

			$Npaginas = ceil($total/$registros);

			$tabla.='<div class="table-responsive">
					<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">CÓDIGO DE REGISTRO</th>
							<th class="text-center">NOMBRE</th>
							<th class="text-center">EMAIL</th>';
						/*if($privilegio<=2){
							$tabla.='
								<th class="text-center">ACTUALIZAR</th>';
						}
						if($privilegio<=1){	
							$tabla.='<th class="text-center">ELIMINAR</th>';
						}*/
			$tabla.='</tr>
					</thead>
					<tbody>
			';

			if($total>=1 && $pagina <=$Npaginas){
				$contador = $inicio+1;
				foreach($datos as $rows){
					$codigoempresa= mainModel::encryption($rows['EmpresaCodigo']);
					$tabla.='
						<tr class="list_empresa">
							<td>'.$contador.'</td>
							<td>'.$rows['EmpresaCodigo'].'</td>
							<td>'.$rows['EmpresaNombre'].'

								<div class="task-menu">';

										$tabla.='
											<a href="javascript:void(0)" id="activity-" class="btn btn-default btn-xs tip" title="Actividad"><i class="glyphicon glyphicon-comment"></i></a>
											<a href="#" id="edit-" class="btn btn-success btn-raised btn-xs tip" title="Editar"
											data-toggle="modal" data-target="#actualizartarea"><i class="glyphicon glyphicon-edit"></i></a>';



										if($estado == "Activo"){
											if($_SESSION['Pri_eliminarempresa'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="delete-'.$codigoempresa.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
											}
										}else{
											if($_SESSION['Pri_activarempresa'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="active-'.$codigoempresa.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
											}
										}


						$tabla.='</div>
							</td>
							<td>'.$rows['EmpresaEmail'].'</td>';
							/*if($privilegio<=2){
								$tabla.='
									<td>
										<a href="'.SERVERURL.'companyinfo/'.mainModel::encryption($rows['id']).'/" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh"></i>
										</a>
									</td>

								';
							}
							if($privilegio<=1){
								$tabla.='
									<td>
										<form action="'.SERVERURL.'ajax/empresaAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
										<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['EmpresaCodigo']).'">
										<input type="hidden" name="privilegio-admin" value="'.mainModel::encryption($privilegio).'">
											<button type="submit" class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete"></i>
											</button>
											<div class="RespuestaAjax"></div>
										</form>
									</td>
								';
							}*/
					$tabla.='
					</tr>
					<script>';
					if($_SESSION['Pri_eliminarempresa'] == 1){
					$tabla.='
						$("#delete-'.$codigoempresa.'").click(function(e){
						e.preventDefault();
						var addmensaje = "Esta acción eliminara todo registro de esta empresa";
						var estado = "Desactivado";					
						var action = "desactivar_empresa";
						var url = "'.SERVERURL.'ajax/empresaAjax.php";
						var tipo = "delete";
						var tipoaccion = "POST";
						var data = {action:action,idupdate:"'.$codigoempresa.'",estado:estado};
						generalesempresa(url,tipo,tipoaccion,data,action,addmensaje);

					});';
					}
					if($_SESSION['Pri_activarempresa'] == 1){
					$tabla.='
					$("#active-'.$codigoempresa.'").click(function(e){
						e.preventDefault();
						var addmensaje = "Esta acción activa todo registro de esta empresa";
						var estado = "Activo";					
						var action = "desactivar_empresa";
						var url = "'.SERVERURL.'ajax/empresaAjax.php";
						var tipo = "update";
						var tipoaccion = "POST";
						var data = {action:action,idupdate:"'.$codigoempresa.'",estado:estado};
						generalesempresa(url,tipo,tipoaccion,data,action,addmensaje);

					});';
					}
					$tabla.='
					</script>


					';
					$contador++;
				}
			}else{
				if($total>=1){
					$tabla.='
					<tr>
						<td colspan="6">
							<a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
								Haga clic aca para recargar el listado
							</a>
						</td>
					</tr>
				';
				}else{
				$tabla.='
					<tr>
						<td colspan="6">No hay registros en el sistema</td>
					</tr>
				';
				}
			}

			$tabla.='</tbody></table></div>';

			if($total>=1 && $pagina <=$Npaginas){
				$tabla.='
					<nav class="text-center">
					<ul class="pagination pagination-sm">
				';
				if($pagina==1){
					$tabla.='
						<li class="disabled"><a><i class="zmdi zmdi-caret-left-circle"></i></a></li>
						<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>
					';
				}else{
					$tabla.='
						<li><a href="'.SERVERURL.$paginaurl.'/1"><i class="zmdi zmdi-caret-left-circle"></i></a></li>
						<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'"><i class="zmdi zmdi-arrow-left"></i></a></li>
					';
				}

				for($i=1; $i<=$Npaginas;$i++){
					if($pagina==$i){
						$tabla.='

						<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'">'.$i.'</a></li>
					';
					}else{
						$tabla.='
						<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'">'.$i.'</a></li>
					';
					}
				}


				if($pagina==$Npaginas){
					$tabla.='

						<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>
						<li class="disabled"><a><i class="zmdi zmdi-caret-right-circle"></i></a></li>
					';
				}else{
					$tabla.='
						<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'"><i class="zmdi zmdi-arrow-right"></i></a></li>
						<li><a href="'.SERVERURL.$paginaurl.'/'.($Npaginas).'"><i class="zmdi zmdi-caret-right-circle"></i></a></li>
					';
				}
				$tabla.='
					</ul>
					</nav>
				';
			}
		}
		return $tabla;
	}
	
	//descativar empresa (eliminar)
	public function desactivar_empresa_proyecto(){
		$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
		$estado=mainModel::limpiar_cadena($_POST['estado']);
		
		$codigo=mainModel::decryption($codigo);
		
		
				$Upempresa=empresaModelo::desactivar_empresa_modelo($estado,$codigo);
				
				if($Upempresa->rowCount()>=1){
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Empresa eliminada.",
							"Texto"=>"La empresa fue eliminada con exito.",
							"Tipo"=>"success"

						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Empresa Reactivada.",
							"Texto"=>"La empresa fue Reactivada con exito.",
							"Tipo"=>"success"

						];
					}
				}else{
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos eliminar esta empresa en este momento.",
							"Tipo"=>"error"

						];	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos Reacitivar esta empresa en este momento.",
							"Tipo"=>"error"

						];	
					}
						
				}

		
		return mainModel::sweet_alert($alerta);
				
	}
}
