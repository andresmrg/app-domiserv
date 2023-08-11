<?php
	if($peticionAjax){
		require_once "../modelos/cdrModelo.php";
	}else{
		require_once "./modelos/cdrModelo.php";
	}

class cdrControlador extends cdrModelo{
	// crear div modales
	public function obtener_modales_cdr_controlador(){
		$formularios= "";
		
		
		//formulario para nuevo CDR
		if($_SESSION['Pri_nuevaCdr'] == 1){
			$formularios.='
			<!--div para crear nuevo CDR-->
			<div class="modal fade" id="divnewcdr" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nuevo CDR</div>
						</div>
						<div class="modal-body">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL CDR</h3>
								</div>
								<div class="panel-body">
									<form action="'.SERVERURL.'ajax/cdrAjax.php" method="POST" id="regnewcdr" name="regnewcdr" data-form="save" class="FormularioCdr" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
											<legend  id="memo_cdr"> &nbsp; </legend>
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
															<label class="control-label">Nombre del CDR *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombre-reg" required="" maxlength="40">
														</div>
													</div>
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
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,15}" class="form-control" type="text" name="telefono-reg" required=""  maxlength="15">
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
															<select id="select_companias" name="compania-reg" required="" class="form-control">


															</select>
														</div>
													</div
												</div>
											</div>
										</fieldset>
										<br>
										<fieldset>
											<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Datos Del Administrador</legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12">
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
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Apellidos *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Teléfono</label>
															<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono1-reg" maxlength="15">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Dirección</label>
															<textarea name="direccion1-reg" class="form-control" rows="2" maxlength="100"></textarea>
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
			</div>';
		}
		
		//Formulario panel de nuevas cuentas CDR
		if($_SESSION['Pri_cuentasCdr'] == 1){
			$formularios.='

			<div class="modal fade" id="divnewcuentascdrs" tabindex="1001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" id="listasmodales">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
							<div class="page-header">
								  <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Usuarios <small> Cuenta de CDR</small></h1>
								</div>
						</div>
						<div class="modal-body">
							<div class="container-fluid">

								<p class="lead"> Registre las cuentas de usuarios que administraran los diferentes CDR desde la parte del CDR como tal.</p>
							</div>
							<div class="container-fluid">
								<input type="hidden" name="CdrCodigoC1" id="CdrCodigoC1" value="">
								<input type="hidden" name="CdrCompania1" id="CdrCompania1" value="">
								<ul class="breadcrumb breadcrumb-tabs">';
									if($_SESSION['Pri_nuevaCuentaCdr'] == 1){
									$formularios.='
									<li>
										<a id="shownewcdrC" class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewcdrC">
											<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CUENTA CDR
										</a>
									</li>';
									}
									if($_SESSION['Pri_listCuentaCdrsactivos'] == 1){
									$formularios.='
									<li>
										<a id="showListacdrC"  class="btn btn-success btn-xs">
											<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CUENTAS
										</a>
									</li>';
									}
									if($_SESSION['Pri_listCuentaCdrsdelete'] == 1){
									$formularios.='
									<li>
										<a id="showcdrCeliminadas" class="btn btn-danger btn-xs">
											<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;CUENTAS ELIMINADOS
										</a>

									</li>';
									}
									if($_SESSION['Pri_buscarcuentasCdr'] == 1){
									$formularios.='
									<li>
										<a id="showfiltrocdrC" class="btn btn-primary btn-xs">
											<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CUENTA
										</a>
									</li>';
									}
								$formularios.='
								</ul>
							</div>';

							if($_SESSION['Pri_buscarcuentasCdr'] == 1){
							$formularios.='
							<div id="filtrocdrC" class="container-fluid">
								<div>
									<button id="cerrardivcdrC" type="button" class="close" >&times;</button>
									<div class="panel-heading">filtros</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group label-floating">
										<label class="control-label">¿A quién estas buscando?</label>
										<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" id="busquedad_cdrC" maxlength="100">
									</div>
								</div>
							</div>';
							}
							$formularios.='
							<div class="container-fluid">
								<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CUENTAS CDR </h3>
									</div>
									<div id="listaCuentasCdr"  class="panel-body">


									</div>
									<div class="RespuestaAjaxgenerales">

									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>

				</div>
			</div>';
		}
		
		//formulario para crear nueva cuenta de cliente
		if($_SESSION['Pri_nuevaCuentaCdr'] == 1){
			$formularios.='
			<div class="modal fade" id="divnewcdrC" tabindex="1002" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>

							<div class="panel-heading">Nueva cuenta de CDR</div>
						</div>
						<div class="modal-body">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE LA CUENTA PARA CDR</h3>
								</div>
								<div class="panel-body">
									<form action="'.SERVERURL.'ajax/cdrAjax.php" method="POST" id="regnewcdrC" name="regnewcdrC" data-form="save" class="FormularioCdr" autocomplete="off" enctype="multipart/form-data">
										<input type="hidden" name="CdrCodigoC" id="CdrCodigoC" value="">
										<input type="hidden" name="CdrCompania" id="CdrCompania" value="">
										<fieldset>
											<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Datos basicos de Administrador CDR</legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12">
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
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Apellidos *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Teléfono</label>
															<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono1-reg" maxlength="15">
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
															<label class="control-label">Dirección</label>
															<textarea name="direccion1-reg" class="form-control" rows="2" maxlength="100"></textarea>
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
	
	public function agregar_cdr_controlador(){
		//DATOS DEL CDR
		$DNI=mainModel::limpiar_cadena($_POST['dni-reg']);
		$Nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
		$ciudad=mainModel::limpiar_cadena($_POST['ciudad-reg']);
		$barrio=mainModel::limpiar_cadena($_POST['barrio-reg']);
		$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
		$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
		$email=mainModel::limpiar_cadena($_POST['email-reg']);
		$Ccostos=101001001;
		$CompaniaCodigo=mainModel::limpiar_cadena($_POST['compania-reg']);
		$Fecha = date("Y-m-d");
		$memotecnico = "CDR ".$ciudad." ".$barrio; 
		
		//DATOS DEL DIRECTOR
		$iddirector=mainModel::limpiar_cadena($_POST['iddirector-reg']);
		$nombredirector=mainModel::limpiar_cadena($_POST['director-reg']);
		$apellido=mainModel::limpiar_cadena($_POST['apellido-reg']);
		$telefono1=mainModel::limpiar_cadena($_POST['telefono1-reg']);
		$direccion1=mainModel::limpiar_cadena($_POST['direccion1-reg']);
		//DATOS DE LA CUENTA
		$usuario=mainModel::limpiar_cadena($_POST['usuario-reg']);
		$password1=mainModel::limpiar_cadena($_POST['password1-reg']);
		$password2=mainModel::limpiar_cadena($_POST['password2-reg']);
		$genero=mainModel::limpiar_cadena($_POST['optionsGenero']);
		$privilegio = 5;
		if($genero =="Masculino"){
			$foto="Male3Avatar.png";
		}else{
			$foto="Female3Avatar.png";
		}
		
		if($password1 != $password2){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Las contraseña que acabas de ingresar no coinciden, por favor intente nuevamente",
				"Tipo"=>"error"

			];
		}else{
			$consulta1=mainModel::ejecutar_consulta_simple("SELECT AdminCdrDNI FROM adminCdr WHERE AdminCdrDNI ='$iddirector'");
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
						$consulta4= mainModel::ejecutar_consulta_simple("SELECT CdrDNI FROM Cdr WHERE CdrDNI = '$DNI'");
						if($consulta4->rowCount()>= 1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El DNI del CDR que acaba de ingresar ya se encuentra en el sistema. Reactivelo!!!",
								"Tipo"=>"error"

							];
						}else{
							
							$consulta5= mainModel::ejecutar_consulta_simple("SELECT CdrNombre FROM Cdr WHERE CdrNombre = '$Nombre'");
							if($consulta5->rowCount()>= 1){
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"El nombre del CDR que acaba de ingresar ya se encuentra en el sistema.  Reactivelo!!!",
									"Tipo"=>"error"

								];
							}else{
								$consulta6=mainModel::ejecutar_consulta_simple("SELECT id FROM Cdr");
								$numero=($consulta6->rowCount())+1;

								$codigoCdr=mainModel::generar_codigo_aleatorio("CDR",7,$numero);

								$datoscdr=[

									"DNI"=>$DNI,
									"Nombre"=>$Nombre,
									"Ciudad"=>$ciudad,
									"Barrio"=>$barrio,
									"Direccion"=>$direccion,
									"Telefono"=>$telefono,
									"Email"=>$email,
									"IdDirector"=>$iddirector,
									"Director"=>$nombredirector,
									"Apellido"=>$apellido,
									"Memotecnico"=>$memotecnico,
									"Ccostos"=>$Ccostos,
									"Codigo"=>$codigoCdr,
									"CompaniaCodigo"=>$CompaniaCodigo,
									"Fecha"=>$Fecha

								];
								$guardarcdr = cdrModelo::agregar_cdr_modelo($datoscdr);
								if($guardarcdr->rowCount()>=1){
									$consulta7=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
									$numero=($consulta7->rowCount())+1;

									$codigoCC=mainModel::generar_codigo_aleatorio("AC",7,$numero);

									$clave=mainModel::encryption($password1);

									$dataAC=[
										"Codigo"=>$codigoCC,
										"Privilegio"=>$privilegio,
										"Usuario"=>$usuario,
										"Clave"=>$clave,
										"Email"=>$email,
										"Estado"=>"Activo",
										"Tipo"=>"Administrador",
										"Genero"=>$genero,
										"Foto"=>$foto,
										"CompaniaCodigo"=>$CompaniaCodigo,
										"TablaVinculo"=>"adminCdr"
									];
									$guardarCuenta=mainModel::agregar_cuenta($dataAC);
									if($guardarCuenta->rowCount()>=1){
										$dataPr=[
											"Codigo"=>$codigoCC,
											"Pagina"=>"home"
										];
										$guardarPrivilegios = mainModel::guardar_privilegios($dataPr);
										if($guardarPrivilegios->rowCount()>=1){
											$dataAD=[
											"DNI"=>$iddirector,
											"Nombre"=>$nombredirector,
											"Apellido"=>$apellido,
											"Telefono"=>$telefono1,
											"Direccion"=>$direccion1,
											"Codigcc"=>$codigoCC,
											"CodigoCdr"=>$codigoCdr
										];
										
										
										$guardarAdmin=cdrModelo::agregar_administrador_cdr_modelo($dataAD);
											if($guardarAdmin->rowCount()>=1){
												$alerta=[
													"Alerta"=>"limpiar",
													"Titulo"=>"Administrador registrado",
													"Texto"=>"El CDR, El administrador y la cuenta se registraron con exito en el sistema",
													"Tipo"=>"success"

												];
											}else{
												mainmodel::eliminar_cuenta($codigoCC);
												cdrModelo::eliminar_cdr_modelo($codigoCdr);
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No hemos podido registrar el administrador del CDR",
													"Tipo"=>"error"

												];
											}
										}else{
											mainmodel::eliminar_cuenta($codigoCC);
											cdrModelo::eliminar_cdr_modelo($codigoCdr);
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"No hemos podido registrar los privilegios del administrador del CDR",
												"Tipo"=>"error"

											];
										}
									}else{
										
										cdrModelo::eliminar_cdr_modelo($codigoCdr);
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No hemos podido registrar la cuenta del administrador del CDR",
											"Tipo"=>"error"

										];
									}
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No hemos podido guardar los datos del CDR, por favor intente nuevamente.",
										"Tipo"=>"error"

									];
								}
							}
						}
					}
				}
			}
		}
		
		return mainModel::sweet_alert1($alerta);
	}
	
	public function datos_cdr_controlador($tipo,$codigo){
		$codigo=mainModel::decryption($codigo);
		
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		return cdrModelo::datos_cdr_modelo($tipo,$codigo);
	}
	
	//Controlador para paginador administradores
	public function paginador_cdr_controlador($pagina,$registros,$privilegio,$estado){
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$estado=mainModel::limpiar_cadena($estado);	
		$tabla="";
		
		if($_SESSION['Pri_listCdrsactivos'] == 1){
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;


			$consulta="
			SELECT SQL_CALC_FOUND_ROWS * FROM Cdr WHERE CdrEstado = '$estado' ORDER BY id ASC LIMIT $inicio,$registros";

			$paginaurl="Cdrlist";


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
							<th class="text-center">UBICACION</th>
							<th class="text-center">NOMBRE</th>
							<th class="text-center">DIRECTOR</th>
							<th class="text-center">EMAIL</th>
							<th class="text-center">TELEFONO</th>';
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
					$codigocdr= mainModel::encryption($rows['CdrCodigo']);
					$tabla.='
						<tr class="list_cdr">
							<td>'.$contador.'</td>
							<td>'.$rows['CdrMemotecnico'].'</td>
							<td>'.$rows['CdrNombre'].'</td>
							<td>'.$rows['CdrDirector'].'


								<div class="task-menu">';
									
										if($_SESSION['Pri_cuentasCdr'] == 1){
											$tabla.='
											<a href="#" id="counts-'.$codigocdr.'" class="btn btn-success btn-raised btn-xs tip" title="Cuentas de Usuario" data-toggle="modal" data-target="#divnewcuentascdrs"><i class="zmdi zmdi-accounts""></i></a>';
										}
											if($_SESSION['Pri_editarCdr'] == 1){
												$tabla.='
												<a href="#" id="edit-'.$codigocdr.'" class="btn btn-success btn-raised btn-xs tip" title="Editar" data-toggle="modal" data-target="#actualizartarea"><i class="glyphicon glyphicon-edit"></i></a>';
											}
									

										if($estado == "Activo"){
											if($_SESSION['Pri_eliminarCdr'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="delete-'.$codigocdr.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
											}
										}else{
											if($_SESSION['Pri_activarCdr'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="active-'.$codigocdr.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
											}
										}

									
						$tabla.='</div>
							</td>
							<td>'.$rows['CdrEmail'].'</td>
							<td>'.$rows['CdrTelefono'].'</td>';
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
						$("#counts-'.$codigocdr.'").click(function(e){
							e.preventDefault();

							$("#CdrCompania1").val("'.mainModel::encryption($rows['CompaniaCodigo']).'");
							$("#CdrCodigoC1").val("'.$codigocdr.'");
							vercuentasCdr(0,"Activo","'.$codigocdr.'");

						});

						$("#delete-'.$codigocdr.'").click(function(e){
						e.preventDefault();
						var addmensaje = "Esta acción eliminara todo registro de este CDR";
						var estado = "Desactivado";					
						var action = "desactivar_cdr";
						var url = "'.SERVERURL.'ajax/cdrAjax.php";
						var tipo = "delete";
						var tipoaccion = "POST";
						var data = {action:action,idupdate:"'.$codigocdr.'",estado:estado};
						generalesCdr(url,tipo,tipoaccion,data,action,addmensaje);

					});
					$("#active-'.$codigocdr.'").click(function(e){
						e.preventDefault();
						var addmensaje = "Esta acción activa todo registro de este CDR";
						var estado = "Activo";					
						var action = "desactivar_cdr";
						var url = "'.SERVERURL.'ajax/cdrAjax.php";
						var tipo = "update";
						var tipoaccion = "POST";
						var data = {action:action,idupdate:"'.$codigocdr.'",estado:estado};
						generalesCdr(url,tipo,tipoaccion,data,action,addmensaje);

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
	public function desactivar_cdr_proyecto(){
		$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
		$estado=mainModel::limpiar_cadena($_POST['estado']);
		
		$codigo=mainModel::decryption($codigo);
		
		
				$Upcdr=cdrModelo::desactivar_cdr_modelo($estado,$codigo);
				
				if($Upcdr->rowCount()>=1){
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"CDR eliminado.",
							"Texto"=>"El CDR fue eliminado con exito.",
							"Tipo"=>"success"

						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"CDR Reactivado.",
							"Texto"=>"ElCDR fue Reactivado con exito.",
							"Tipo"=>"success"

						];
					}		
				}else{
					if($estado == "Desactivado"){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos eliminar este CDR en este momento.",
							"Tipo"=>"error"

						];	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos Reacitivar este CDR en este momento.",
							"Tipo"=>"error"

						];	
					}	
				}

		
		return mainModel::sweet_alert($alerta);
				
	}
	
	
	// ====== PROCEDIMIENTO PARA CREAR CUENTAS DE USUARIOS BAJO CADA CLIENTE ========
	//controlador para agregar cuenta de cdr
	public function agregar_C_cdr_controlador(){
		//DATOS DEL DIRECTOR
		$codigoCdr=mainModel::limpiar_cadena($_POST['CdrCodigoC']);
		$CompaniaCodigo = mainModel::limpiar_cadena($_POST['CdrCompania']);
		$iddirector=mainModel::limpiar_cadena($_POST['iddirector-reg']);
		$nombredirector=mainModel::limpiar_cadena($_POST['director-reg']);
		$apellido=mainModel::limpiar_cadena($_POST['apellido-reg']);
		$telefono1=mainModel::limpiar_cadena($_POST['telefono1-reg']);
		$email=mainModel::limpiar_cadena($_POST['email-reg']);
		$direccion1=mainModel::limpiar_cadena($_POST['direccion1-reg']);
		//DATOS DE LA CUENTA
		$usuario=mainModel::limpiar_cadena($_POST['usuario-reg']);
		$password1=mainModel::limpiar_cadena($_POST['password1-reg']);
		$password2=mainModel::limpiar_cadena($_POST['password2-reg']);
		$genero=mainModel::limpiar_cadena($_POST['optionsGenero']);
		
		$codigoCdr=mainModel::decryption($codigoCdr);
		$CompaniaCodigo=mainModel::decryption($CompaniaCodigo);
		
		$privilegio = 5;
		if($genero =="Masculino"){
			$foto="Male3Avatar.png";
		}else{
			$foto="Female3Avatar.png";
		}
		
		if($password1 != $password2){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Las contraseña que acabas de ingresar no coinciden, por favor intente nuevamente",
				"Tipo"=>"error"

			];
		}else{
			$consulta1=mainModel::ejecutar_consulta_simple("SELECT AdminCdrDNI FROM adminCdr WHERE AdminCdrDNI ='$iddirector'");
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
						$consulta7=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
						$numero=($consulta7->rowCount())+1;

						$codigoCC=mainModel::generar_codigo_aleatorio("AC",7,$numero);

						$clave=mainModel::encryption($password1);

						$dataAC=[
							"Codigo"=>$codigoCC,
							"Privilegio"=>$privilegio,
							"Usuario"=>$usuario,
							"Clave"=>$clave,
							"Email"=>$email,
							"Estado"=>"Activo",
							"Tipo"=>"Administrador CDR",
							"Genero"=>$genero,
							"Foto"=>$foto,
							"CompaniaCodigo"=>$CompaniaCodigo,
							"TablaVinculo"=>"adminCdr"
						];
						$guardarCuenta=mainModel::agregar_cuenta($dataAC);
						if($guardarCuenta->rowCount()>=1){
							$dataPr=[
								"Codigo"=>$codigoCC,
								"Pagina"=>"home"
							];
							$guardarPrivilegios = mainModel::guardar_privilegios($dataPr);
							if($guardarPrivilegios->rowCount()>=1){
								$dataAD=[
								"DNI"=>$iddirector,
								"Nombre"=>$nombredirector,
								"Apellido"=>$apellido,
								"Telefono"=>$telefono1,
								"Direccion"=>$direccion1,
								"Codigcc"=>$codigoCC,
								"CodigoCdr"=>$codigoCdr
							];


							$guardarAdmin=cdrModelo::agregar_administrador_cdr_modelo($dataAD);
								if($guardarAdmin->rowCount()>=1){
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Administrador registrado",
										"Texto"=>"El CDR, El administrador y la cuenta se registraron con exito en el sistema",
										"Tipo"=>"success"

									];
								}else{
									mainmodel::eliminar_cuenta($codigoCC);
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No hemos podido registrar el administrador del CDR",
										"Tipo"=>"error"

									];
								}
							}else{
								mainmodel::eliminar_cuenta($codigoCC);
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No hemos podido registrar los privilegios del administrador del CDR",
									"Tipo"=>"error"

								];
							}
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No hemos podido registrar la cuenta del administrador del CDR",
								"Tipo"=>"error"

							];
						}
					}
				}
			}
		}
		
		return mainModel::sweet_alert1($alerta);
	}
	
	//Controlador para paginador administradores
	public function paginador_C_cdr_controlador($pagina,$registros,$privilegio,$cdr,$busqueda,$estado){
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$cdr=mainModel::limpiar_cadena($cdr);	
		$busqueda=mainModel::limpiar_cadena($busqueda);	
		$estado=mainModel::limpiar_cadena($estado);	
		$cdr=mainModel::decryption($cdr);
		
		$tabla="";
		if($_SESSION['Pri_listCuentaCdrsactivos'] == 1){
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;

			if(isset($busqueda) && $busqueda!=""){
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM adminCdr WHERE (AdminCdrNombre LIKE '%$busqueda%' OR AdminCdrApellido  LIKE '%$busqueda%' OR AdminCdrDNI  LIKE '%$busqueda%' OR AdminCdrTelefono  LIKE '%$busqueda%') AND CdrCodigo = '$cdr' ORDER BY id ASC LIMIT $inicio,$registros";

				$paginaurl="clientlist";
			}else{
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM adminCdr WHERE AdminCdrEstado = '$estado' AND CdrCodigo = '$cdr' ORDER BY id ASC LIMIT $inicio,$registros";

				$paginaurl="clientlist";
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
					$codigoadmincdr= mainModel::encryption($rows['CuentaCodigo']);
					$estado = $rows['AdminCdrEstado'];
					$tabla.='
						<tr class="list_cdrC">
							<td>'.$contador.'</td>
							<td>'.$rows['AdminCdrDNI'].'</td>
							<td>'.$rows['AdminCdrNombre'].'
								<div class="task-menu">';

										$tabla.='


											<a href="#" id="edit-'.$codigoadmincdr.'" class="btn btn-success btn-raised btn-xs tip" title="Editar datos" data-toggle="modal" data-target="#divupdatedatos"><i class="zmdi zmdi-account-circle"></i></a>

											<a href="#" id="count-'.$codigoadmincdr.'" class="btn btn-success btn-raised btn-xs tip" title="Editar Cuenta" data-toggle="modal" data-target="#divupdatecuenta"><i class="zmdi zmdi-settings"></i></a>';



										if($estado == "Activo"){
											if($_SESSION['Pri_eliminarCuentaCdr'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="delete-'.$codigoadmincdr.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
											}
										}else{
											if($_SESSION['Pri_activarCuentaCdr'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="active-'.$codigoadmincdr.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
											}
										}


						$tabla.='
								</div>
								</td>
							<td>'.$rows['AdminCdrApellido'].'</td>
							<td>'.$rows['AdminCdrTelefono'].'</td>';
							if($busqueda != ""){
									$tabla.= '<td>'.$rows['AdminCdrEstado'].'</td>';
								}

							/*if($privilegio<=2){
								$tabla.='
									<td>
										<a href="'.SERVERURL.'myaccount/user/'.mainModel::encryption($rows['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh"></i>
										</a>
									</td>
									<td>
										<a href="'.SERVERURL.'mydata/user/'.mainModel::encryption($rows['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh"></i>
										</a>
									</td>
								';
							}
							if($privilegio<=1){
								$tabla.='
									<td>
										<form action="'.SERVERURL.'ajax/clienteAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
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
					$tipo = mainModel::encryption("Administrador CDR");
					$tabla.='
						</tr>
						<script>

								$("#edit-'.$codigoadmincdr.'").click(function(e){
									e.preventDefault();
									$("#avisolista").val("Ccdr");
									document.forms.updatedatosu.action= "'.SERVERURL.'ajax/cdrAjax.php";
									crearformularioactualizarcuentaCdr("Unico","'.$codigoadmincdr.'");

								});

								$("#count-'.$codigoadmincdr.'").click(function(e){
									e.preventDefault();
									document.forms.updatecuentausu.action= "'.SERVERURL.'ajax/cuentaAjax.php";
									crearformularioactualizarCuenta("'.$tipo.'","'.$codigoadmincdr.'","'.SERVERURL.'ajax/cuentaAjax.php","crearformularioactualizarCuenta","'.$_SESSION['codigo_cuenta_dsa'].'","'.$_SESSION['tipo_dsa'].'","'.$_SESSION['privilegio_dsa'].'","'.SERVERURL.'home","AdminCdr");

								});
								$("#delete-'.$codigoadmincdr.'").click(function(e){
								e.preventDefault();
								var addmensaje = "Esta acción eliminara todo registro de este cuenta del administrador de CDR";
								var estado = "Desactivado";					
								var action = "desactivar_cdrC";
								var url = "'.SERVERURL.'ajax/cdrAjax.php";
								var tipo = "delete";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$codigoadmincdr.'",estado:estado};
								generalesCdr(url,tipo,tipoaccion,data,action,addmensaje);

							});
							$("#active-'.$codigoadmincdr.'").click(function(e){
								e.preventDefault();
								var addmensaje = "Esta acción activa todo registro de esta cuenta del administrador de CDR";
								var estado = "Activo";					
								var action = "desactivar_cdrC";
								var url = "'.SERVERURL.'ajax/cdrAjax.php";
								var tipo = "update";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$codigoadmincdr.'",estado:estado};
								generalesCdr(url,tipo,tipoaccion,data,action,addmensaje);

							});
							</script>
					';
					$contador++;
				}
			}else{
				if($total>=1){
					$tabla.='
					<tr>
						<td colspan="8">
							<a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
								Haga clic aca para recargar el listado
							</a>
						</td>
					</tr>
				';
				}else{
				$tabla.='
					<tr>
						<td colspan="8">No hay registros en el sistema</td>
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
	
	//descativar cuenta de cliente (eliminar)
	public function desactivar_C_cdr_controlador(){
			$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
			$estado=mainModel::limpiar_cadena($_POST['estado']);

			$codigo=mainModel::decryption($codigo);


					$Upcdr=cdrModelo::desactivar_C_cdr_modelo($estado,$codigo);

					if($Upcdr->rowCount()>=1){
						if($estado == "Desactivado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Cuenta CDR Eliminado.",
								"Texto"=>"La cuenta del CDR fue eliminado con exito.",
								"Tipo"=>"success"

							];
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Cuenta de CDR Reactivado.",
								"Texto"=>"La cuenta del CDR fue Reactivado con exito.",
								"Tipo"=>"success"

							];
						}	
					}else{
						if($estado == "Desactivado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos eliminar esta cuenta de CDR en este momento.",
								"Tipo"=>"error"

							];	
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos Reactivar esta cuenta de CDR en este momento.",
								"Tipo"=>"error"

							];	
						}
					}

			return mainModel::sweet_alert($alerta);
		}
	
	//CREA FORMULARIO PARA ACTUALIZAR CUENTA CLIENTE
	public function crear_formulario_C_cdr_controlador(){
		$tipo = $_POST['tipo1'];
		$Codigo = $_POST['codigo1'];
			
		$Codigo=mainModel::decryption($Codigo);	
		$tipo=mainModel::limpiar_cadena($tipo);
		$Codigo=mainModel::limpiar_cadena($Codigo);
			
		$cdata = cdrModelo::datos_C_cdr_modelo($tipo,$Codigo);
		$campos = $cdata->fetch();
		$forma = "";
		if($cdata->rowCount()>= 1){
			$forma.='
				<input type="hidden" name="Ccuenta-up" value="'.mainModel::encryption($campos['CuentaCodigo']).'">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="Cdni-up" value="'.$campos['AdminCdrDNI'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Cnombre-up" value="'.$campos['AdminCdrNombre'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Capellido-up" value="'.$campos['AdminCdrApellido'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Teléfono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="Ctelefono-up" value="'.$campos['AdminCdrTelefono'].'" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<textarea name="Cdireccion-up" class="form-control" rows="2" maxlength="100">'.$campos['AdminCdrDireccion'].'</textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    				
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
					<p>No pudimos encontrar ningun cliente con la información brindada.</p>
				</div>
			';
		}
		return $forma;
	}
	
	//ACTUALIZA CLIENTE
	public function actualizar_C_cdr_controlador(){
			$cuenta=mainModel::decryption($_POST['Ccuenta-up']);
			$dni=mainModel::limpiar_cadena($_POST['Cdni-up']);
			$nombre=mainModel::limpiar_cadena($_POST['Cnombre-up']);
			$apellido=mainModel::limpiar_cadena($_POST['Capellido-up']);
			$telefono=mainModel::limpiar_cadena($_POST['Ctelefono-up']);
			$direccion=mainModel::limpiar_cadena($_POST['Cdireccion-up']);
			
			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM adminCdr WHERE CuentaCodigo='$cuenta'");
			$DatosCliente=$query1->fetch();
			
			if($dni != $DatosCliente['AdminCdrDNI']){
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT AdminCdrDNI FROM adminCdr WHERE AdminCdrDNI='$dni'");
				
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
			
			$dataClient=[
				"DNI"=>$dni,
				"Nombre"=>$nombre,
				"Apellido"=>$apellido,
				"Telefono"=>$telefono,
				"Direccion"=>$direccion,
				"Codigo"=>$cuenta
			];
			
			$actulizado= cdrModelo::actualizar_C_cdr_modelo($dataClient);
			if($actulizado->rowCount()>=1){
				$alerta=[
					"Alerta"=>"simple",
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
