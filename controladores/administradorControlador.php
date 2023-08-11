<?php
	if($peticionAjax){
		require_once "../modelos/administradorModelo.php";
	}else{
		require_once "./modelos/administradorModelo.php";
	}
	
	
	class administradroControlador extends administradorModelo{
	
		// crear div modales
		public function obtener_modales_administrador_controlador(){
		$formularios= "";
					
		$formularios.='
		  <!--<style>
			/*#mdialTamanio{
			  width: 80% !important;
			}*/
		  </style>-->
		<!--div para crear nuevo empresa-->
		<div class="modal fade" id="divnewadministrador" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" id="mdialTamanio">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
						<div class="panel-heading">Nueva Empresa</div>
					</div>
					<div class="modal-body">
						<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ADMINISTRADOR</h3>
								</div>
								<div class="panel-body">
									<form action="'.SERVERURL.'ajax/administradorAjax.php" method="POST" id="regnewadministrador" name="regnewadministrador" data-form="save" class="FormularioAdministrador" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">DNI/CEDULA *</label>
															<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Nombres *</label>
															<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Apellidos *</label>
															<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Teléfono</label>
															<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Dirección</label>
															<textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Compañia *</label>
															<select id="select_compania" name="compania-reg" required="" class="form-control">


															</select>
														</div>
													</div>
												</div>
											</div>
										</fieldset>
										<br>
										<fieldset>
											<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Nombre de usuario *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Contraseña *</label>
															<input class="form-control" type="password" name="password1-reg" required="" maxlength="70">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Repita la contraseña *</label>
															<input class="form-control" type="password" name="password2-reg" required="" maxlength="70">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">E-mail</label>
															<input class="form-control" type="email" name="email-reg" maxlength="50">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group">
															<label class="control-label">Genero</label>
															<div class="radio radio-primary">
																<label>
																	<input type="radio" name="optionsGenero" id="optionsRadios1" value="Masculino" checked="">
																	<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
																</label>
															</div>
															<div class="radio radio-primary">
																<label>
																	<input type="radio" name="optionsGenero" id="optionsRadios2" value="Femenino">
																	<i class="zmdi zmdi-female"></i> &nbsp; Femenino
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</fieldset>
										<br>
										<fieldset>
											<legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12 col-sm-6">
														<p class="text-left">
															<div class="label label-success">Nivel 1</div> Control total del sistema
														</p>
														<p class="text-left">
															<div class="label label-primary">Nivel 2</div> Permiso para registro y actualización
														</p>
														<p class="text-left">
															<div class="label label-info">Nivel 3</div> Permiso para registro
														</p>
													</div>
													<div class="col-xs-12 col-sm-6">';
														//if($_SESSION['privilegio_dsa'] ==1){
										$formularios.='<div class="radio radio-primary">
															<label>
																<input type="radio" name="optionsPrivilegio" id="optionsRadios1" value="'.mainModel::encryption(1).'">
																<i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
															</label>
														</div>';
														
														//}
														//if($_SESSION['privilegio_dsa'] <=2){
														
										$formularios.='<div class="radio radio-primary">
															<label>
																<input type="radio" name="optionsPrivilegio" id="optionsRadios2" value="'.mainModel::encryption(2).'">
																<i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
															</label>
														</div>';
														
														//}
														
										$formularios.='<div class="radio radio-primary">
															<label>
																<input type="radio" name="optionsPrivilegio" id="optionsRadios3" value="'.mainModel::encryption(3).'" checked="">
																<i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
															</label>
														</div>
													</div>
												</div>
											</div>
										</fieldset>
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
		
				
			
		echo $formularios;
		
		}
					
		//controlador para agregar administrador
		public function agregar_administrador_controlador(){
			$dni=mainModel::limpiar_cadena($_POST['dni-reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
			$apellido=mainModel::limpiar_cadena($_POST['apellido-reg']);
			$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
			$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
			$CompaniaCodigo = mainModel::limpiar_cadena($_POST['compania-reg']);
			
			$usuario=mainModel::limpiar_cadena($_POST['usuario-reg']);
			$password1=mainModel::limpiar_cadena($_POST['password1-reg']);
			$password2=mainModel::limpiar_cadena($_POST['password2-reg']);
			$email=mainModel::limpiar_cadena($_POST['email-reg']);
			$genero=mainModel::limpiar_cadena($_POST['optionsGenero']);
			
			$privilegio=mainModel::decryption($_POST['optionsPrivilegio']);
			$privilegio=mainModel::limpiar_cadena($privilegio);
			
			if($genero =="Masculino"){
				$foto="Male3Avatar.png";
			}else{
				$foto="Female3Avatar.png";
			}
			
			if($privilegio<1 || $privilegio>3){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El nivel de privilegio que intenta asignar es incorrecto.",
					"Tipo"=>"error"

				];
			}else{
				if($password1 != $password2){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Las contraseña que acabas de ingresar no coinciden, por favor intente nuevamente",
						"Tipo"=>"error"

					];
				}else{
					$consulta1=mainModel::ejecutar_consulta_simple("SELECT AdminDNI FROM admin WHERE AdminDNI ='$dni'");
					if($consulta1->rowCount()>=1){
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El DNI que acaba de ingresar ya se encuentra en el sistema.",
						"Tipo"=>"error"

					];
					}else{
					if($email != ""){
							$consulta2=mainModel::ejecutar_consulta_simple("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail ='$email'");

							$ec=$consulta2->rowCount();
						}else{
							$ec =0;
						}
						if($ec>=1){
							$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El EMAIL que acaba de ingresar ya se encuentra en el sistema.",
							"Tipo"=>"error"

						];
						}else{
							$consulta3=mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario ='$usuario'");

							if($consulta3->rowCount()>=1){
								$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El USUARIO que acaba de ingresar ya se encuentra en el sistema.",
								"Tipo"=>"error"

							];
							}else{
								$consulta4=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
								$numero=($consulta4->rowCount())+1;

								$codigo=mainModel::generar_codigo_aleatorio("AC",7,$numero);

								$clave=mainModel::encryption($password1);

								$dataAC=[
									"Codigo"=>$codigo,
									"Privilegio"=>$privilegio,
									"Usuario"=>$usuario,
									"Clave"=>$clave,
									"Email"=>$email,
									"Estado"=>"Activo",
									"Tipo"=>"Administrador",
									"Genero"=>$genero,
									"Foto"=>$foto,
									"CompaniaCodigo"=>$CompaniaCodigo,
									"TablaVinculo"=>"admin"
								];
								$guardarCuenta=mainModel::agregar_cuenta($dataAC);
								if($guardarCuenta->rowCount()>=1){
									$dataPr=[
										"Codigo"=>$codigo,
										"Pagina"=>"home"
									];
									$guardarPrivilegios = mainModel::guardar_privilegios($dataPr);
									if($guardarPrivilegios->rowCount()>=1){
										$dataAD=[
											"DNI"=>$dni,
											"Nombre"=>$nombre,
											"Apellido"=>$apellido,
											"Telefono"=>$telefono,
											"Direccion"=>$direccion,
											"Codigo"=>$codigo
										];
										$guardarAdmin=administradorModelo::agregar_administrador_modelo($dataAD);
										if($guardarAdmin->rowCount()>=1){
											$alerta=[
												"Alerta"=>"limpiar",
												"Titulo"=>"Administrador registrado",
												"Texto"=>"El administrador se registro con exito en el sistema",
												"Tipo"=>"success"

											];
										}else{
											mainmodel::eliminar_cuenta($codigo);
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"No hemos podido registrar el administrador",
												"Tipo"=>"error"

											];
										}
									}else{
										mainmodel::eliminar_cuenta($codigo);
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No hemos podido registrar los privilegios del administrador",
											"Tipo"=>"error"

										];
									}
											
								}else{

									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No hemos podido registrar el administrador",
										"Tipo"=>"error"

									];
								}
							}
						}
					}
				}	
			}
			
			
			return mainModel::sweet_alert($alerta);
		}
		
		//Controlador para paginador administradores
		public function paginador_administrador_controlador($pagina,$registros,$privilegio,$codigo,$busqueda,$estado){
			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);	
			$privilegio=mainModel::limpiar_cadena($privilegio);	
			$codigo=mainModel::limpiar_cadena($codigo);	
			$busqueda=mainModel::limpiar_cadena($busqueda);	
			$estado=mainModel::limpiar_cadena($estado);	
			
				
			$tabla="";
			
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;
			
			if(isset($busqueda) && $busqueda!=""){
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS cuenta.id,admin.AdminDNI,admin.AdminNombre,admin.AdminApellido,admin.AdminTelefono,admin.AdminDireccion,admin.AdminEstado,admin.CuentaCodigo FROM admin LEFT JOIN cuenta ON admin.CuentaCodigo = cuenta.CuentaCodigo WHERE (CuentaCodigo <> '$codigo' AND id <> '1') AND (AdminNombre LIKE '%$busqueda%' OR AdminApellido  LIKE '%$busqueda%' OR AdminDNI  LIKE '%$busqueda%' OR AdminTelefono  LIKE '%$busqueda%')  ORDER BY id ASC LIMIT $inicio,$registros";
				
				$paginaurl="adminlist";
			}else{
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS cuenta.id,admin.AdminDNI,admin.AdminNombre,admin.AdminApellido,admin.AdminTelefono,admin.AdminDireccion,admin.AdminEstado,admin.CuentaCodigo FROM admin LEFT JOIN cuenta ON admin.CuentaCodigo = cuenta.CuentaCodigo  WHERE admin.CuentaCodigo <> '$codigo' AND admin.id <> '1'  AND admin.AdminEstado = '$estado' ORDER BY admin.id ASC LIMIT $inicio,$registros";
				
				$paginaurl="adminlist";
			}
			
			$conexion =mainModel::conectar();
		
			
			$datos = $conexion->query($consulta);
			$datos= $datos->fetchAll();
			
			$total = $conexion->query("SELECT FOUND_ROWS()");
			$total = (int) $total->fetchColumn();
			
			$Npaginas = ceil($total/$registros);
			
			
			session_start(['name'=>'DSA']);
			$tabla.='<div class="table-responsive">
					<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">DNI</th>
							<th class="text-center">NOMBRES</th>
							<th class="text-center">APELLIDOS</th>
							<th class="text-center">TELÉFONO</th>';
							if($busqueda != ""){
								$tabla.='<th class="text-center">ESTADO</th>';
							}
						/*if($privilegio<=2){
							$tabla.='
								<th class="text-center">A. CUENTA</th>
								<th class="text-center">A. DATOS</th>
							';
						}
						if($privilegio<=1){	
							$tabla.='
								<th class="text-center">ELIMINAR</th>
							';
						}*/
			$tabla.='</tr>
					</thead>
					<tbody>
			';
			
			if($total>=1 && $pagina <=$Npaginas){
				$contador = $inicio+1;
				foreach($datos as $rows){
					$codigoadministrador= mainModel::encryption($rows['CuentaCodigo']);
					$estado = $rows['AdminEstado'];
					$tabla.='
						<tr class="list_administrador">
							<td>'.$contador.'</td>
							<td>'.$rows['AdminDNI'].'</td>
							<td class="text-left">('.$rows['id'].') '.$rows['AdminNombre'].'
							<div class="task-menu">';
								if($privilegio<=2){
									$tabla.='
									
										
										<a href="#" id="edit-'.$codigoadministrador.'" class="btn btn-success btn-raised btn-xs tip" title="Editar datos"
										data-toggle="modal" data-target="#divupdatedatos"><i class="zmdi zmdi-account-circle"></i></a>
										
										<a href="#" id="count-'.$codigoadministrador.'" class="btn btn-success btn-raised btn-xs tip" title="Editar Cuenta" data-toggle="modal" data-target="#divupdatecuenta"><i class="zmdi zmdi-settings"></i></a>';
								}
								if($privilegio<=1){
									
									if($estado == "Activo"){
										$tabla.='
										<a href="javascript:void(0)" id="delete-'.$codigoadministrador.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
									}else{
										$tabla.='
										<a href="javascript:void(0)" id="active-'.$codigoadministrador.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
									}
									
								}
					$tabla.='
							</div>
							</td>
							
							<td class="text-left">'.$rows['AdminApellido'].'</td>
							<td>'.$rows['AdminTelefono'].'</td>';
							if($busqueda != ""){
								$tabla.= '<td>'.$rows['AdminEstado'].'</td>';
							}
							/*if($privilegio<=2){
								$tabla.='
									<td>
										<a href="'.SERVERURL.'myaccount/admin/'.mainModel::encryption($rows['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh"></i>
										</a>
									</td>
									<td>
										<a href="'.SERVERURL.'mydata/admin/'.mainModel::encryption($rows['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh"></i>
										</a>
									</td>
								';
							}
							if($privilegio<=1){
								$tabla.='
									<td>
										<form action="'.SERVERURL.'ajax/administradorAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
										<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['CuentaCodigo']).'">
										<input type="hidden" name="privilegio-admin" value="'.mainModel::encryption($privilegio).'">
											<button type="submit" class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete"></i>
											</button>
											<div class="RespuestaAjax"></div>
										</form>
									</td>
								';
							}*/
					$tipo = mainModel::encryption("Administrador");
					$tabla.='
						</tr>
						<script>
							$("#edit-'.$codigoadministrador.'").click(function(e){
								e.preventDefault();
								document.forms.updatedatosu.action= "'.SERVERURL.'ajax/administradorAjax.php";
								crearformularioactualizaradmin("Unico","'.$codigoadministrador.'");

							});
							
							$("#count-'.$codigoadministrador.'").click(function(e){
								e.preventDefault();
								document.forms.updatecuentausu.action= "'.SERVERURL.'ajax/cuentaAjax.php";
								crearformularioactualizarCuenta("'.$tipo.'","'.$codigoadministrador.'","'.SERVERURL.'ajax/cuentaAjax.php","crearformularioactualizarCuenta","'.$_SESSION['codigo_cuenta_dsa'].'","'.$_SESSION['tipo_dsa'].'","'.$_SESSION['privilegio_dsa'].'","'.SERVERURL.'home","admin");

							});
							$("#delete-'.$codigoadministrador.'").click(function(e){
							e.preventDefault();
							var addmensaje = "Esta acción eliminara todo registro de esta administrador";
							var estado = "Desactivado";					
							var action = "desactivar_administrador";
							var url = "'.SERVERURL.'ajax/administradorAjax.php";
							var tipo = "delete";
							var tipoaccion = "POST";
							var data = {action:action,idupdate:"'.$codigoadministrador.'",estado:estado};
							generalesadmin(url,tipo,tipoaccion,data,action,addmensaje);

						});
						$("#active-'.$codigoadministrador.'").click(function(e){
							e.preventDefault();
							var addmensaje = "Esta acción activa todo registro de esta administrador";
							var estado = "Activo";					
							var action = "desactivar_administrador";
							var url = "'.SERVERURL.'ajax/administradorAjax.php";
							var tipo = "update";
							var tipoaccion = "POST";
							var data = {action:action,idupdate:"'.$codigoadministrador.'",estado:estado};
							generalesadmin(url,tipo,tipoaccion,data,action,addmensaje);

						});
						</script>
						
					
				
					';
					$contador++;
				}
			}else{
				if($total>=1){
					$tabla.='
					<tr>
						<td colspan="5">
							<a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
								Haga clic aca para recargar el listado
							</a>
						</td>
					</tr>
				';
				}else{
				$tabla.='
					<tr>
						<td colspan="5">No hay registros en el sistema</td>
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
					<li><a id="pag1" ><i class="zmdi zmdi-caret-left-circle"></i></a></li>
					<li><a id="gopag"><i class="zmdi zmdi-arrow-left"></i></a></li>
					
					<script>
							
							$("#pag1").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("1","'.$estado.'");';
								}else{
									$tabla.='
									veradministradores("1","'.$estado.'");';	
								}
								
					$tabla.='});
						$("#gopag").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.($pagina-1).'","'.$estado.'");';
								}else{
									$tabla.='
									veradministradores('.($pagina-1).',"'.$estado.'");';	
								}
								
						
				$tabla.='});
				</script>		
				';
			}
			
			if(($pagina - 5) > 0){
				$i = $pagina -5;
			}else{
				$i = 1;
			}
				
			if(($pagina + 5) < $Npaginas){
				$Npaginas1= $pagina + 5;
				
				if($i < 5 && $Npaginas > 11){
					$Npaginas1 = 11;
				}
				
			}else{
				
				$Npaginas1 = $Npaginas;
				
			}
			
			for($i; $i<=$Npaginas1;$i++){
				if($pagina==$i){
					$tabla.='

					<li class="active"><a  id="pagina'.$i.'" >'.$i.'</a></li>
					<script>
							
							$("#pagina'.$i.'").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.$i.'","'.$estado.'");';
								}else{
									$tabla.='
									veradministradores("'.$i.'","'.$estado.'");';	
								}
								
					$tabla.='});
				
					</script>	
				';
				}else{
					$tabla.='
					
					<li><a id="pagina'.$i.'">'.$i.'</a></li>
					<script>
							
							$("#pagina'.$i.'").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.$i.'","'.$estado.'");';
								}else{
									$tabla.='
									veradministradores("'.$i.'","'.$estado.'");';	
								}
								
					$tabla.='});
				
					</script>		
					
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
					<li><a id="nextpag"><i class="zmdi zmdi-arrow-right"></i></a></li>
					<li><a id="finpag"><i class="zmdi zmdi-caret-right-circle"></i></a></li>
					<script>
							
							$("#finpag").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.$Npaginas.'","'.$estado.'");';
								}else{
									$tabla.='
									veradministradores("'.$Npaginas.'","'.$estado.'");';	
								}
								
					$tabla.='});
						$("#nextpag").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.($pagina+1).'","'.$estado.'");';
								}else{
									$tabla.='
									veradministradores('.($pagina+1).',"'.$estado.'");';	
								}
								
						
				$tabla.='});
				</script>
				';
			}
			$tabla.='
				</ul>
				</nav>
			';
		}
			
			$tabla = utf8_encode($tabla);
			return mainModel::Limpiar_acentos($tabla);
	}
		
		//descativar empresa (eliminar)
		public function desactivar_administrador_controlador(){
			$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
			$estado=mainModel::limpiar_cadena($_POST['estado']);

			$codigo=mainModel::decryption($codigo);
		
			$Upcuenta = mainModel::eliminar_cuenta($estado,$codigo);
			
			if($Upcuenta->rowCount()>=1){
				$Upadministrador=administradorModelo::desactivar_administrador_modelo($estado,$codigo);

				if($Upadministrador->rowCount()>=1){
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Empleado o contratista eliminada.",
							"Texto"=>"El Empleado o contratista fue eliminada con exito.",
							"Tipo"=>"success"

						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Empleado o contratista Reactivado.",
							"Texto"=>"El Empleado o contratista fue Reactivado con exito.",
							"Tipo"=>"success"

						];
					}	
				}else{
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos eliminar este Empleado o contratista en este momento.",
							"Tipo"=>"error"

						];	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos Reacitivar este Empleado o contratista en este momento.",
							"Tipo"=>"error"

						];	
					}
				}
			}else{
				if($estado == "Desactivado"){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos eliminar esta cuenta de Empleado o contratista en este momento.",
						"Tipo"=>"error"

					];	
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos Reacitivar este cuenta de empleado o contratista en este momento.",
						"Tipo"=>"error"

					];	
				}
			}
			return mainModel::sweet_alert($alerta);
		}
		
		public function datos_administrador_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);
			
			return administradorModelo::datos_administrador_modelo($tipo,$codigo);
		}
		
		public function crear_formulario_administrador_controlador(){
		$tipo = $_POST['tipo1'];
		$Codigo = $_POST['codigo1'];
			
		$Codigo=mainModel::decryption($Codigo);	
		$tipo=mainModel::limpiar_cadena($tipo);
		$Codigo=mainModel::limpiar_cadena($Codigo);
			
		$cdata = administradorModelo::datos_administrador_modelo($tipo,$Codigo);
		$campos = $cdata->fetch();
		$forma = "";
		if($cdata->rowCount()>= 1){
			$forma.='
				
						<input type="hidden" name="cuenta-up" value="'.mainModel::encryption($campos['CuentaCodigo']).'"
						<fieldset>
							<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">DNI/CEDULA *</label>
											<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-up" value="'.$campos['AdminDNI'].'" required="" maxlength="30">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Nombres *</label>
											<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-up" value="'.$campos['AdminNombre'].'" required="" maxlength="30">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Apellidos *</label>
											<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-up" value="'.$campos['AdminApellido'].'" required="" maxlength="30">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Teléfono</label>
											<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-up" value="'.$campos['AdminTelefono'].'" maxlength="15">
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Dirección</label>
											<textarea name="direccion-up" class="form-control" rows="2" maxlength="100">'.$campos['AdminDireccion'].'</textarea>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<p class="text-center" style="margin-top: 20px;">
							<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
						</p>
					<div class="RespuestaAjax"></div>
					
				
						
			
			';
		}else{
			$forma.='
				<div class="alert alert-dismissible alert-primary text-center">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
					<h4>¡Lo sentimos!</h4>
					<p>No pudimos encontrar ningun Empleado con la información brindada.</p>
				</div>
			';
		}
		return $forma;
	}
		
		public function actualizar_administrador_controlador(){
			$cuenta=mainModel::decryption($_POST['cuenta-up']);
			$dni=mainModel::limpiar_cadena($_POST['dni-up']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-up']);
			$apellido=mainModel::limpiar_cadena($_POST['apellido-up']);
			$telefono=mainModel::limpiar_cadena($_POST['telefono-up']);
			$direccion=mainModel::limpiar_cadena($_POST['direccion-up']);
			
			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM admin WHERE CuentaCodigo='$cuenta'");
			$DatosAdmin=$query1->fetch();
			
			if($dni != $DatosAdmin['AdminDNI']){
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT AdminDNI FROM admin WHERE AdminDNI='$dni'");
				
				if($consulta1->rowCount()>=1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El DNI que acaba de ingresar ya se encuentra registrado.",
						"Tipo"=>"error"

					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}
			
			$dataAd=[
				"DNI"=>$dni,
				"Nombre"=>$nombre,
				"Apellido"=>$apellido,
				"Telefono"=>$telefono,
				"Direccion"=>$direccion,
				"Codigo"=>$cuenta
			];
			
			if(administradorModelo::actualizar_administrador_modelo($dataAd)){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Datos actualizados!",
					"Texto"=>"Tus datos han sido actualizados con exito.",
					"Tipo"=>"success"

				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido actualizar tus datos, por favor intente nuevamente.",
					"Tipo"=>"error"

				];
			}
			return mainModel::sweet_alert($alerta);
		}
		
	}

	