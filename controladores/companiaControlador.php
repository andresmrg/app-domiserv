<?php
	if($peticionAjax){
		require_once "../modelos/companiaModelo.php";
	}else{
		require_once "./modelos/companiaModelo.php";
	}

class companiaControlador extends companiaModelo{
	// crear div modales
	public function obtener_modales_compania_controlador(){
		$formularios= "";
		
		//div para crear nuevo empresa
		if($_SESSION['Pri_nuevaCompania'] == 1){
			$formularios.='
			
			<div class="modal fade" id="divnewcompania" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nueva Empresa</div>
						</div>
						<div class="modal-body">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE LA COMPAÑIA</h3>
								</div>
								<div class="panel-body">
									<form action="'.SERVERURL.'ajax/companiaAjax.php" method="POST" id="regnewcompania" name="regnewcompania" data-form="save" class="FormularioCompania" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
											<legend  id="memo_compania"> &nbsp; </legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Ciudad *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" id="ciudad-reg" name="ciudad-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Barrio *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="barrio-reg" id="barrio-reg" required="" maxlength="50">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Teléfono *</label>
															<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" required=""  maxlength="15">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">E-mail *</label>
															<input class="form-control" type="email" name="email-reg" required=""  maxlength="80">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Dirección *</label>
															<input class="form-control" type="text" name="direccion-reg" required=""  maxlength="170">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Empresa *</label>
															<select id="select_empresas" name="empresa-reg" required="" class="form-control">


															</select>
														</div>
													</div
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
															<label class="control-label">Id director *</label>
															<input class="form-control" type="text" name="iddirector-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Nombre director *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,70}" class="form-control" type="text" name="director-reg" required="" maxlength="70">
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
	
	public function agregar_compania_controlador(){
		$ciudad=mainModel::limpiar_cadena($_POST['ciudad-reg']);
		$barrio=mainModel::limpiar_cadena($_POST['barrio-reg']);
		$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
		$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
		$email=mainModel::limpiar_cadena($_POST['email-reg']);
		$iddirector=mainModel::limpiar_cadena($_POST['iddirector-reg']);
		$nombredirector=mainModel::limpiar_cadena($_POST['director-reg']);
		$EmpresaCodigo=mainModel::limpiar_cadena($_POST['empresa-reg']);
		
		$memotecnico = "DSA ".$ciudad." ".$barrio; 
		
		$consulta1= mainModel::ejecutar_consulta_simple("SELECT CompaniaDireccion FROM Compania WHERE CompaniaCiudad = '$ciudad' AND CompaniaBarrio = '$barrio' AND CompaniaDireccion='$direccion'");
		if($consulta1->rowCount()<= 0){
				$consulta2=mainModel::ejecutar_consulta_simple("SELECT id FROM Compania");
				$numero=($consulta2->rowCount())+1;

				$codigo=mainModel::generar_codigo_aleatorio("CIA",7,$numero);
			
				$datosCompania=[
									
					"Ciudad"=>$ciudad,
					"Barrio"=>$barrio,
					"Direccion"=>$direccion,
					"Telefono"=>$telefono,
					"Email"=>$email,
					"IdDirector"=>$iddirector,
					"Director"=>$nombredirector,
					"Memotecnico"=>$memotecnico,
					"Codigo"=>$codigo,
					"EmpresaCodigo"=>$EmpresaCodigo
					
				];
			
				$guardarCompania = companiaModelo::agregar_compania_modelo($datosCompania);	
				
				if($guardarCompania->rowCount()>=1){
					$alerta=[
						"Alerta"=>"limpiar",
						"Titulo"=>"Compañia registrada ",
						"Texto"=>"Los datos de la compañia se registrarón con exíto.",
						"Tipo"=>"success"

					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido guardar los datos de la compañia, por favor intente nuevamente.",
						"Tipo"=>"error"

					];
				}
			
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"La direcion de la compañia que acaba de ingresar ya se encuentra en el sistema.",
				"Tipo"=>"error"

			];
		}
		
		return mainModel::sweet_alert1($alerta);
	}
	
	public function datos_compania_controlador($tipo,$codigo){
		$codigo=mainModel::decryption($codigo);
		
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		return companiaModelo::datos_compania_modelo($tipo,$codigo);
	}
	//crea select de compañias
	public function datos_select_compania_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectCompania = companiaModelo::datos_compania_modelo($tipo,$codigo);
		$datos= $selectCompania->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['CompaniaCodigo'].'">'.$rows["CompaniaMemotecnico"].'</option>';
									
		}
		
		return $grupoP;
	}
	//Controlador para paginador administradores
	public function paginador_compania_controlador($pagina,$registros,$privilegio,$estado){
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$estado=mainModel::limpiar_cadena($estado);	
		
		$tabla="";
		
		if($_SESSION['Pri_listcompaniasactivas'] == 1){
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;


			$consulta="
			SELECT SQL_CALC_FOUND_ROWS * FROM Compania WHERE CompaniaEstado = '$estado' ORDER BY id ASC LIMIT $inicio,$registros";

			$paginaurl="companyslist";


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
							<th class="text-center">COMPAÑIA</th>
							<th class="text-center">DIRECTOR</th>
							<th class="text-center">EMAIL</th>
							<th class="text-center">TELEFONO</th>
							<th class="text-center">DIRECCION</th>';
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
					$codigocompania= mainModel::encryption($rows['CompaniaCodigo']);
					$tabla.='
						<tr class="list_compania">
							<td>'.$contador.'</td>
							<td>'.$rows['CompaniaMemotecnico'].'</td>
							<td>'.$rows['CompaniaDirector'].'</td>
							<td>'.$rows['CompaniaEmail'].'


								<div class="task-menu">';
									
										if($_SESSION['Pri_editarcompania'] == 1){
											$tabla.='<a href="#" id="edit-" class="btn btn-success btn-raised btn-xs tip" title="Editar" data-toggle="modal" data-target="#actualizartarea"><i class="glyphicon glyphicon-edit"></i></a>';
										}
									

										if($estado == "Activo"){
											if($_SESSION['Pri_eliminarcompania'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="delete-'.$codigocompania.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
											}
										}else{
											if($_SESSION['Pri_activarcompania'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="active-'.$codigocompania.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
											}
										}

									
						$tabla.='</div>
							</td>
							<td>'.$rows['CompaniaTelefono'].'</td>
							<td>'.$rows['CompaniaDireccion'].'</td>';
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
					<script>
						$("#delete-'.$codigocompania.'").click(function(e){
						e.preventDefault();
						var addmensaje = "Esta acción eliminara todo registro de esta compañia";
						var estado = "Desactivado";					
						var action = "desactivar_compania";
						var url = "'.SERVERURL.'ajax/companiaAjax.php";
						var tipo = "delete";
						var tipoaccion = "POST";
						var data = {action:action,idupdate:"'.$codigocompania.'",estado:estado};
						generalescompania(url,tipo,tipoaccion,data,action,addmensaje);

					});
					$("#active-'.$codigocompania.'").click(function(e){
						e.preventDefault();
						var addmensaje = "Esta acción activa todo registro de esta compañia";
						var estado = "Activo";					
						var action = "desactivar_compania";
						var url = "'.SERVERURL.'ajax/companiaAjax.php";
						var tipo = "update";
						var tipoaccion = "POST";
						var data = {action:action,idupdate:"'.$codigocompania.'",estado:estado};
						generalescompania(url,tipo,tipoaccion,data,action,addmensaje);

					});
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
	public function desactivar_compania_controlador(){
		$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
		$estado=mainModel::limpiar_cadena($_POST['estado']);
		
		$codigo=mainModel::decryption($codigo);
		
		
				$Upempresa=companiaModelo::desactivar_compania_modelo($estado,$codigo);
				
				if($Upempresa->rowCount()>=1){
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Compañia eliminada.",
							"Texto"=>"La compañia fue eliminada con exito.",
							"Tipo"=>"success"

						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Compañia Reactivada.",
							"Texto"=>"La compañia fue Reactivada con exito.",
							"Tipo"=>"success"

						];
					}	
				}else{
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos eliminar esta compañia en este momento.",
							"Tipo"=>"error"

						];	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos Reacitivar esta compañia en este momento.",
							"Tipo"=>"error"

						];	
					}
				}
							
		return mainModel::sweet_alert($alerta);
	}
}