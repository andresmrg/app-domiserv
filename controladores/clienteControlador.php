<?php
	if($peticionAjax){
		require_once "../modelos/clienteModelo.php";
	}else{
		require_once "./modelos/clienteModelo.php";
	}

class clienteControlador extends clienteModelo{
	// crear div modales
	public function obtener_modales_cliente_controlador(){
		$formularios= "";
		
		
		//vrear nuevo cliente
		if($_SESSION['Pri_nuevoClientes']  == 1){
			$formularios.='
			<div class="modal fade" id="divnewcliente" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" id="mdialTamanio">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
							<div class="panel-heading">Nuevo Cliente</div>
						</div>
						<div class="modal-body">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CLIENTE</h3>
								</div>
								<div class="panel-body">
									<form action="'.SERVERURL.'ajax/clienteAjax.php" method="POST" data-form="save" id="regnewcliente" name="regnewcliente" class="FormularioCliente" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
											<legend  id="memo_cdr"> &nbsp; </legend>
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">NIT/CÓDIGO/NÚMERO DE REGISTRO *</label>
															<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6">
														<div class="form-group label-floating">
															<label class="control-label">Nombre del cliente *</label>
															<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,200}" class="form-control" type="text" name="nombre-reg" required="" maxlength="200">
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
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Dirección *</label>
															<input class="form-control" type="text" name="direccion-reg" required=""  maxlength="170">
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
															<label class="control-label">Sector/ actividad economica *</label>
															<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ocupacion-reg" required="" maxlength="30">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Compañia *</label>
															<select id="select_compania" name="compania-reg" required="" class="form-control">


															</select>
														</div>
													</div
												</div>
											</div>
										</fieldset>
										<br>
										<fieldset>
											<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos del Director</legend>
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
													<div class="col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Cargo / Área *</label>
															<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="cargo-reg" required="" maxlength="30">
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
															<input class="form-control" type="email" name="email1-reg" maxlength="50">
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
		
		//panael para cuentas de clientes
		if($_SESSION['Pri_cuentasClientes'] == 1){
		$formularios.='
		<div class="modal fade" id="divnewcuentasclientes" tabindex="1001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" id="listasmodales">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
						<div class="page-header">
							  <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Usuarios <small> Cuenta de clientes</small></h1>
							</div>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							
							<p class="lead"> Registre las cuentas de usuarios que administraran los diferentes clientes desde la parte del cliente como tal.</p>
						</div>
						<div class="container-fluid">
							<input type="hidden" name="ClienteCompania1" id="ClienteCompania1" value="">
							<input type="hidden" name="ClienteCodigoC1" id="ClienteCodigoC1" value="">
																			
														
							<ul class="breadcrumb breadcrumb-tabs">';
								if($_SESSION['Pri_nuevaCuentaClientes'] == 1){
								$formularios.='
								<li>
									<a id="shownewcuentaC" class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewcuentaC">
										<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CUENTA CLIENTE
									</a>
								</li>';
								}
								if($_SESSION['Pri_listCuentaClientesactivos'] == 1){
								$formularios.='
								<li>
									<a id="showListacuentaC"  class="btn btn-success btn-xs">
										<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CUENTAS
									</a>
								</li>';
								}
								if($_SESSION['Pri_listCuentaClientesdelete'] == 1){
								$formularios.='
								<li>
									<a id="showcuentaCeliminadas" class="btn btn-danger btn-xs">
										<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;CUENTAS ELIMINADOS
									</a>

								</li>';
								}
								if($_SESSION['Pri_buscarcuentasClientes'] == 1){
								$formularios.='
								<li>
									<a id="showfiltrocuentaC" class="btn btn-primary btn-xs">
										<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CUENTA
									</a>
								</li>';
								}
																
								$formularios.='
							</ul>
						</div>';
			
						if($_SESSION['Pri_buscarcuentasClientes'] == 1){
						$formularios.='
						<div id="filtrocuenta" class="container-fluid">
							<div>
								<button id="cerrardivcuenta" type="button" class="close" >&times;</button>
								<div class="panel-heading">filtros</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">¿A quién estas buscando?</label>
									<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" id="busquedad_cuentaC" maxlength="100">
								</div>
							</div>
						</div>';
						}
						$formularios.='
						<div class="container-fluid">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CUENTAS CLIENTES </h3>
								</div>
								<div id="listaCuentasC"  class="panel-body">

									
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
		//formulario para crear nueva cuenta de clientes
		$formularios.='
		<div class="modal fade" id="divnewcuentaC" tabindex="1002" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" id="mdialTamanio">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
						<div class="panel-heading">Nueva cuenta de cliente</div>
					</div>
					<div class="modal-body">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CLIENTE</h3>
							</div>
							<div class="panel-body">
								<form action="'.SERVERURL.'ajax/clienteAjax.php" method="POST" data-form="save" id="regnewcuentaC" name="regnewcuentaC" class="FormularioCliente" autocomplete="off" enctype="multipart/form-data">
								
									<input type="hidden" name="ClienteCompania" id="ClienteCompania" value="">
									<input type="hidden" name="ClienteCodigoC" id="ClienteCodigoC" value="">
							
									<fieldset>
										<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12">
													<div class="form-group label-floating">
														<label class="control-label">DNI/CEDULA *</label>
														<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="Cdni-reg" required="" maxlength="30">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Nombres *</label>
														<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Cnombre-reg" required="" maxlength="30">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Apellidos *</label>
														<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Capellido-reg" required="" maxlength="30">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Teléfono</label>
														<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="Ctelefono-reg" maxlength="15">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Cargo/Ocupación *</label>
														<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Cocupacion-reg" required="" maxlength="30">
													</div>
												</div>
												<div class="col-xs-12">
													<div class="form-group label-floating">
														<label class="control-label">Dirección</label>
														<textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
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
														<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="Cusuario-reg" required="" maxlength="15">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Contraseña *</label>
														<input class="form-control" type="password" name="Cpassword1-reg" required="" maxlength="70">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Repita la contraseña *</label>
														<input class="form-control" type="password" name="Cpassword2-reg" required="" maxlength="70">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">E-mail</label>
														<input class="form-control" type="email" name="Cemail-reg" maxlength="50">
													</div>
												</div>
												<div class="col-xs-12">
													<div class="form-group">
														<label class="control-label">Genero</label>
														<div class="radio radio-primary">
															<label>
																<input type="radio" name="CoptionsGenero" id="CoptionsRadios1" value="Masculino" checked="">
																<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
															</label>
														</div>
														<div class="radio radio-primary">
															<label>
																<input type="radio" name="CoptionsGenero" id="CoptionsRadios2" value="Femenino">
																<i class="zmdi zmdi-female"></i> &nbsp; Femenino
															</label>
														</div>
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
					
	//controlador para agregar cliente
	public function agregar_cliente_controlador(){
		$DNI=mainModel::limpiar_cadena($_POST['dni-reg']);
		$Nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
		$ciudad=mainModel::limpiar_cadena($_POST['ciudad-reg']);
		$barrio=mainModel::limpiar_cadena($_POST['barrio-reg']);
		$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
		$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
		$email=mainModel::limpiar_cadena($_POST['email-reg']);
		$ocupacion=mainModel::limpiar_cadena($_POST['ocupacion-reg']);
		$CompaniaCodigo=mainModel::limpiar_cadena($_POST['compania-reg']);
		$Fecha = date("Y-m-d");
			
		//DATOS DEL DIRECTOR
		$iddirector=mainModel::limpiar_cadena($_POST['iddirector-reg']);
		$nombredirector=mainModel::limpiar_cadena($_POST['director-reg']);
		$apellido=mainModel::limpiar_cadena($_POST['apellido-reg']);
		$Cargo=mainModel::limpiar_cadena($_POST['cargo-reg']);
		
		//DATOS DE LA CUENTA
		$usuario=mainModel::limpiar_cadena($_POST['usuario-reg']);
		$password1=mainModel::limpiar_cadena($_POST['password1-reg']);
		$password2=mainModel::limpiar_cadena($_POST['password2-reg']);
		$email1=mainModel::limpiar_cadena($_POST['email1-reg']);
		$genero=mainModel::limpiar_cadena($_POST['optionsGenero']);
		$privilegio = 4;
		

		if($genero =="Masculino"){
			$foto="Male2Avatar.png";
		}else{
			$foto="Female2Avatar.png";
		}

		if($password1 != $password2){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Las contraseña que acabas de ingresar no coinciden, por favor intente nuevamente",
				"Tipo"=>"error"

			];
		}else{
			$consulta1=mainModel::ejecutar_consulta_simple("SELECT ClienteDNI FROM cliente WHERE ClienteDNI ='$dni'");
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
						$consulta4= mainModel::ejecutar_consulta_simple("SELECT ClienteDNI FROM cliente WHERE ClienteDNI = '$DNI'");
						if($consulta4->rowCount()>= 1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El DNI del cliente que acaba de ingresar ya se encuentra en el sistema. Reactivelo!!!",
								"Tipo"=>"error"

							];
						}else{
							$consulta5= mainModel::ejecutar_consulta_simple("SELECT ClienteNombre FROM cliente WHERE ClienteNombre = '$Nombre'");
							if($consulta5->rowCount()>= 1){
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"El nombre del cliente que acaba de ingresar ya se encuentra en el sistema.  Reactivelo!!!",
									"Tipo"=>"error"

								];
							}else{
								$consulta6=mainModel::ejecutar_consulta_simple("SELECT id FROM cliente");
								$numero=($consulta6->rowCount())+1;

								$codigoCliente=mainModel::generar_codigo_aleatorio("CLC",7,$numero);

								$datoscliente=[

									"DNI"=>$DNI,
									"Nombre"=>$Nombre,
									"Ciudad"=>$ciudad,
									"Barrio"=>$barrio,
									"Direccion"=>$direccion,
									"Telefono"=>$telefono,
									"Email"=>$email,
									"Ocupacion"=>$ocupacion,
									"IdDirector"=>$iddirector,
									"Director"=>$nombredirector,
									"Apellido"=>$apellido,
									"Codigo"=>$codigoCliente,
									"CompaniaCodigo"=>$CompaniaCodigo,
									"Fecha"=>$Fecha

								];
								$guardarcliente = clienteModelo::agregar_cliente_modelo($datoscliente);
								if($guardarcliente->rowCount()>=1){
									$consulta7=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
									$numero=($consulta7->rowCount())+1;

									$codigoCC=mainModel::generar_codigo_aleatorio("CC",7,$numero);

									$clave=mainModel::encryption($password1);

									$dataAC=[
										"Codigo"=>$codigoCC,
										"Privilegio"=>$privilegio,
										"Usuario"=>$usuario,
										"Clave"=>$clave,
										"Email"=>$email1,
										"Estado"=>"Activo",
										"Tipo"=>"Cliente",
										"Genero"=>$genero,
										"Foto"=>$foto,
										"CompaniaCodigo"=>$CompaniaCodigo,
										"TablaVinculo"=>"clienteC"
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
												"Telefono"=>$telefono,
												"Cargo"=>$Cargo,
												"Direccion"=>$direccion,
												"Codigo"=>$codigoCC,
												"Codigocliente"=>$codigoCliente
											];
											$guardarcliente=clienteModelo::agregar_C_cliente_modelo($dataAD);
											if($guardarcliente->rowCount()>=1){
													$alerta=[
													"Alerta"=>"limpiar",
													"Titulo"=>"Cliente registrado",
													"Texto"=>"El Cliente, El Usuario y la cuenta se registraron con exito en el sistema",
													"Tipo"=>"success"

												];
											}else{
												mainmodel::eliminar_cuenta($codigoCC);
												clienteModelo::eliminar_cliente_modelo($codigoCliente);
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No hemos podido registrar el Usuario para este cleinte",
													"Tipo"=>"error"

												];
											}
										}else{
											mainmodel::eliminar_cuenta($codigoCC);
											clienteModelo::eliminar_cliente_modelo($codigoCliente);
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"No hemos podido registrar los privilegios de la cuenta del cliente",
												"Tipo"=>"error"

											];
										}
									}else{
										
										clienteModelo::eliminar_cliente_modelo($codigoCliente);
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No hemos podido registrar la cuenta del cliente",
											"Tipo"=>"error"

										];
									}	
										
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No hemos podido guardar los datos del cuenta del cliente, por favor intente nuevamente.",
										"Tipo"=>"error"

									];
								}
							}
						}
					}
				}
			}
		}	
		return mainModel::sweet_alert($alerta);
	}
	
	//controlador para agregar solo el cliente sin cuenta
	public function agregar_solo_cliente_controlador(){
		session_start(['name'=>'DSA']);
		$DNI=mainModel::limpiar_cadena($_POST['dnireg']);
		$Nombre=mainModel::limpiar_cadena($_POST['nombrereg']);
		$ciudad=mainModel::limpiar_cadena($_POST['ciudadreg']);
		$barrio=mainModel::limpiar_cadena($_POST['barrioreg']);
		$direccion=mainModel::limpiar_cadena($_POST['direccionreg']);
		$telefono=mainModel::limpiar_cadena($_POST['telefonoreg']);
		$email=mainModel::limpiar_cadena($_POST['emailreg']);
		$ocupacion="No corporativo";
		$CompaniaCodigo=$_SESSION['compania_codigo'];
		$Fecha = date("Y-m-d");
			
		//DATOS DEL DIRECTOR
		$iddirector=mainModel::limpiar_cadena($_POST['dnireg']);
		$nombredirector=mainModel::limpiar_cadena($_POST['nombrereg']);
		$apellido=mainModel::limpiar_cadena($_POST['apellidoreg']);
		$Cargo="No corporativo";
		
			if($email != ""){
					$consulta2=mainModel::ejecutar_consulta_simple("SELECT ClienteEmail FROM cliente WHERE ClienteEmail ='$email'");

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
					
					$consulta4= mainModel::ejecutar_consulta_simple("SELECT ClienteDNI FROM cliente WHERE ClienteDNI = '$DNI'");
					if($consulta4->rowCount()>= 1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El DNI del cliente que acaba de ingresar ya se encuentra en el sistema. Reactivelo!!!",
							"Tipo"=>"error"

						];
					}else{
						$verificliente = $Nombre." ".$apellido;
						$consulta5= mainModel::ejecutar_consulta_simple("SELECT ClienteNombre FROM cliente WHERE ClienteNombre = '$verificliente'");
						if($consulta5->rowCount()>= 1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El nombre del cliente que acaba de ingresar ya se encuentra en el sistema.  Reactivelo!!!",
								"Tipo"=>"error"

							];
						}else{
							$consulta6=mainModel::ejecutar_consulta_simple("SELECT id FROM cliente");
							$numero=($consulta6->rowCount())+1;

							$codigoCliente=mainModel::generar_codigo_aleatorio("CLC",7,$numero);

							$datoscliente=[

								"DNI"=>$DNI,
								"Nombre"=>$Nombre." ".$apellido,
								"Ciudad"=>$ciudad,
								"Barrio"=>$barrio,
								"Direccion"=>$direccion,
								"Telefono"=>$telefono,
								"Email"=>$email,
								"Ocupacion"=>$ocupacion,
								"IdDirector"=>$iddirector,
								"Director"=>$nombredirector,
								"Apellido"=>$apellido,
								"Codigo"=>$codigoCliente,
								"CompaniaCodigo"=>$CompaniaCodigo,
								"Fecha"=>$Fecha

							];
							$guardarcliente = clienteModelo::agregar_cliente_modelo($datoscliente);
							if($guardarcliente->rowCount()>=1){
								$idCliente=mainModel::ejecutar_consulta_simple("SELECT id FROM cliente WHERE ClienteCodigo ='$codigoCliente'");
								$Cliente=$idCliente->fetch();

								$Idnewcliente = $Cliente['id'];

								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Cliente registrado",
									"Texto"=>"El Cliente fue registrado con exito en el sistema",
									"Tipo"=>"success"

								];

							}else{
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No hemos podido guardar los datos del cuenta del cliente, por favor intente nuevamente.",
									"Tipo"=>"error"

								];
							}
						}
					}
				}
		
		$campos['IdCliente'] =  $Idnewcliente;
		$campos['alerta'] = mainModel::sweet_alert($alerta);
		
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
	}
	//Controlador para paginador administradores
	public function paginador_cliente_controlador($pagina,$registros,$privilegio,$busqueda,$estado){
		session_start(['name'=>'DSA']);
		
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$busqueda=mainModel::limpiar_cadena($busqueda);	
		$estado=mainModel::limpiar_cadena($estado);	
		$tabla="";
		
		if($_SESSION['Pri_listClientesactivos'] == 1){
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;

			if(isset($busqueda) && $busqueda  !=""){
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM cliente WHERE (ClienteNombre LIKE '%$busqueda%'OR ClienteNombreDirector LIKE '%$busqueda%' OR ClienteApellidoDirector  LIKE '%$busqueda%' OR ClienteDNI  LIKE '%$busqueda%' OR ClienteTelefono  LIKE '%$busqueda%') ORDER BY id ASC LIMIT $inicio,$registros";

				$paginaurl="clientlist";
			}else{
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM cliente WHERE ClienteEstado = '$estado' ORDER BY id ASC LIMIT $inicio,$registros";

				$paginaurl="clientlist";
			}

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
							<th class="text-center">DNI</th>
							<th class="text-center">NOMBRES</th>
							<th class="text-center">EMAIL</th>
							<th class="text-center">TELÉFONO</th>';
							if($busqueda != ""){
									$tabla.='<th class="text-center">ESTADO</th>';
								}

			$tabla.='</tr>
					</thead>
					<tbody>
			';

			if($total>=1 && $pagina <=$Npaginas){
				$contador = $inicio+1;
				foreach($datos as $rows){
					$codigocliente= mainModel::encryption($rows['ClienteCodigo']);
					$estado = $rows['ClienteEstado'];
					$tabla.='
						<tr class="list_cliente">
							<td>'.$contador.'</td>
							<td>'.$rows['ClienteDNI'].'</td>
							<td>'.$rows['ClienteNombre'].'
								<div class="task-menu">';
									
										if($_SESSION['Pri_cuentasClientes'] ==1){
										$tabla.='

											<a href="#" id="counts-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Cuentas de Usuario"
											data-toggle="modal" data-target="#divnewcuentasclientes"><i class="zmdi zmdi-accounts""></i></a>';
										
										}
										$tabla.='
											<a href="#" id="edit-'.$codigocdr.'" class="btn btn-success btn-raised btn-xs tip" title="Editar"
											data-toggle="modal" data-target="#actualizartarea"><i class="glyphicon glyphicon-edit"></i></a>
											';

											/*<a href="#" id="edit-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Editar datos"
											data-toggle="modal" data-target="#divupdatedatos"><i class="zmdi zmdi-account-circle"></i></a>

											<a href="#" id="count-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Editar Cuenta" data-toggle="modal" data-target="#divupdatecuenta"><i class="zmdi zmdi-settings"></i></a>*/

									
									

										if($estado == "Activo"){
											if($_SESSION['Pri_eliminarClientes'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="delete-'.$codigocliente.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
											}
										}else{
											if($_SESSION['Pri_activarClientes'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="active-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
											}
										}

									
						$tabla.='
								</div>
								</td>
							<td>'.$rows['ClienteEmail'].'</td>
							<td>'.$rows['ClienteTelefono'].'</td>';
							if($busqueda != ""){
									$tabla.= '<td>'.$rows['ClienteEstado'].'</td>';
								}


					$tipo = mainModel::encryption("Cliente");
					$clienteDNI = mainModel::encryption($rows['ClienteDNI']);
					$tabla.='
						</tr>
						<script>
								$("#counts-'.$codigocliente.'").click(function(e){
									e.preventDefault();
									$("#ClienteCompania1").val("'.mainModel::encryption($rows['CompaniaCodigo']).'");
									$("#ClienteCodigoC1").val("'.$codigocliente.'");

									vercuentasC("0","Activo","'.$codigocliente.'");
								});';
								/*$("#edit-'.$codigocliente.'").click(function(e){
									e.preventDefault();
									document.forms.updatedatosu.action= "'.SERVERURL.'ajax/clienteAjax.php";
									crearformularioactualizarcliente("Unico","'.$codigocliente.'");

								});

								$("#count-'.$codigocliente.'").click(function(e){
									e.preventDefault();
									document.forms.updatecuentausu.action= "'.SERVERURL.'ajax/cuentaAjax.php";
									crearformularioactualizarCuenta("'.$tipo.'","'.$codigocliente.'","'.SERVERURL.'ajax/cuentaAjax.php","crearformularioactualizarCuenta","'.$_SESSION['codigo_cuenta_dsa'].'","'.$_SESSION['tipo_dsa'].'","'.$_SESSION['privilegio_dsa'].'","'.SERVERURL.'home","client");

								});*/
					$tabla.='$("#delete-'.$codigocliente.'").click(function(e){
								e.preventDefault();
								var addmensaje = "Esta acción eliminara todo registro de este cliente";
								var estado = "Desactivado";					
								var action = "desactivar_cliente";
								var url = "'.SERVERURL.'ajax/clienteAjax.php";
								var tipo = "delete";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$codigocliente.'",estado:estado};
								generalescliente(url,tipo,tipoaccion,data,action,addmensaje);

							});
							$("#active-'.$codigocliente.'").click(function(e){
								e.preventDefault();
								var addmensaje = "Esta acción activa todo registro de este cliente";
								var estado = "Activo";					
								var action = "desactivar_cliente";
								var url = "'.SERVERURL.'ajax/clienteAjax.php";
								var tipo = "update";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$codigocliente.'",estado:estado};
								generalescliente(url,tipo,tipoaccion,data,action,addmensaje);

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

	//descativar empresa (eliminar)
	public function desactivar_cliente_controlador(){
			$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
			$estado=mainModel::limpiar_cadena($_POST['estado']);

			$codigo=mainModel::decryption($codigo);


					$Upcliente=clienteModelo::desactivar_cliente_modelo($estado,$codigo);

					if($Upcliente->rowCount()>=1){
						if($estado == "Desactivado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Cliente Eliminado.",
								"Texto"=>"El cliente fue eliminado con exito.",
								"Tipo"=>"success"

							];
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Cliente Reactivado.",
								"Texto"=>"El cliente fue Reactivado con exito.",
								"Tipo"=>"success"

							];
						}	
					}else{
						if($estado == "Desactivado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos eliminar este cliente en este momento.",
								"Tipo"=>"error"

							];	
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos Reactivar este cliente en este momento.",
								"Tipo"=>"error"

							];	
						}
					}

			return mainModel::sweet_alert($alerta);
		}
	
	//BUSCA DATOS DEL CLIENTE
	public function datos_cliente_controlador($tipo,$codigo){
		$codigo=mainModel::decryption($codigo);
		$tipo=mainModel::limpiar_cadena($tipo);

		return clienteModelo::datos_cliente_modelo($tipo,$codigo);
	}
	//BUSCA DATOS DEL CLIENTE NO CORPORATIVO
	public function datos_nocorporativo_cliente_controlador($tipo,$busquedad){
		$busquedad=mainModel::limpiar_cadena($busquedad);
		$tipo=mainModel::limpiar_cadena($tipo);

		$cliente =  clienteModelo::datos_nocorporativo_cliente_modelo($tipo,$busquedad);
		$campos = $cliente->fetch();
			
		if($cliente->rowCount()>= 1){
			
		}else{
			//echo 
			$campos = 0;
		}
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
	}
	//CREA FORMULARIO PARA ACTUALIZAR CLIENTE
	public function crear_formulario_cliente_controlador(){
		$tipo = $_POST['tipo1'];
		$Codigo = $_POST['codigo1'];
			
		$Codigo=mainModel::decryption($Codigo);	
		$tipo=mainModel::limpiar_cadena($tipo);
		$Codigo=mainModel::limpiar_cadena($Codigo);
			
		$cdata = clienteModelo::datos_cliente_modelo($tipo,$Codigo);
		$campos = $cdata->fetch();
		$forma = "";
		if($cdata->rowCount()>= 1){
			$forma.='
				<input type="hidden" name="cuenta-up" value="'.mainModel::encryption($campos['CuentaCodigo']).'">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-up" value="'.$campos['ClienteDNI'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-up" value="'.$campos['ClienteNombre'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-up" value="'.$campos['ClienteApellido'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Teléfono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-up" value="'.$campos['ClienteTelefono'].'" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Cargo/Ocupación *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ocupacion-up" value="'.$campos['ClienteOcupacion'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<textarea name="direccion-up" class="form-control" rows="2" maxlength="100">'.$campos['ClienteDireccion'].'</textarea>
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
	public function actualizar_cliente_controlador(){
			$cuenta=mainModel::decryption($_POST['cuenta-up']);
			$dni=mainModel::limpiar_cadena($_POST['dni-up']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-up']);
			$apellido=mainModel::limpiar_cadena($_POST['apellido-up']);
			$telefono=mainModel::limpiar_cadena($_POST['telefono-up']);
			$ocupacion=mainModel::limpiar_cadena($_POST['ocupacion-up']);
			$direccion=mainModel::limpiar_cadena($_POST['direccion-up']);
			
			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM cliente WHERE CuentaCodigo='$cuenta'");
			$DatosCliente=$query1->fetch();
			
			if($dni != $DatosCliente['ClienteDNI']){
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT ClienteDNI FROM cliente WHERE ClienteDNI='$dni'");
				
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
				"Ocupacion"=>$ocupacion,
				"Direccion"=>$direccion,
				"Codigo"=>$cuenta
			];
			$actulizado=clienteModelo::actualizar_cliente_modelo($dataClient);
			if($actulizado->rowCount()>=1){
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
	
	
	// ====== PROCEDIMIENTO PARA CREAR CUENTAS DE USUARIOS BAJO CADA CLIENTE ========
	//controlador para agregar cuebta de cliente
	public function agregar_C_cliente_controlador(){
		$codigoCliente=mainModel::limpiar_cadena($_POST['ClienteCodigoC']);
		$CompaniaCodigo = mainModel::limpiar_cadena($_POST['ClienteCompania']);
		$dni=mainModel::limpiar_cadena($_POST['Cdni-reg']);
		$nombre=mainModel::limpiar_cadena($_POST['Cnombre-reg']);
		$apellido=mainModel::limpiar_cadena($_POST['Capellido-reg']);
		$telefono=mainModel::limpiar_cadena($_POST['Ctelefono-reg']);
		$ocupacion=mainModel::limpiar_cadena($_POST['Cocupacion-reg']);
		$direccion=mainModel::limpiar_cadena($_POST['Cdireccion-reg']);
		
		//DATOS DE LA CUENTA
		$usuario=mainModel::limpiar_cadena($_POST['Cusuario-reg']);
		$password1=mainModel::limpiar_cadena($_POST['Cpassword1-reg']);
		$password2=mainModel::limpiar_cadena($_POST['Cpassword2-reg']);
		$email=mainModel::limpiar_cadena($_POST['Cemail-reg']);
		$genero=mainModel::limpiar_cadena($_POST['CoptionsGenero']);
		
		$codigoCliente=mainModel::decryption($codigoCliente);
		$CompaniaCodigo=mainModel::decryption($CompaniaCodigo);
		
		$privilegio=4;

		if($genero =="Masculino"){
			$foto="Male2Avatar.png";
		}else{
			$foto="Female2Avatar.png";
		}

		if($password1 != $password2){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Las contraseña que acabas de ingresar no coinciden, por favor intente nuevamente",
				"Tipo"=>"error"

			];
		}else{
			$consulta1=mainModel::ejecutar_consulta_simple("SELECT ClienteCDNI FROM clienteC WHERE ClienteCDNI ='$dni'");
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
						$consulta5=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
						$numero=($consulta5->rowCount())+1;

						$codigo=mainModel::generar_codigo_aleatorio("CC",7,$numero);

						$clave=mainModel::encryption($password1);

						$dataAC=[
							"Codigo"=>$codigo,
							"Privilegio"=>$privilegio,
							"Usuario"=>$usuario,
							"Clave"=>$clave,
							"Email"=>$email,
							"Estado"=>"Activo",
							"Tipo"=>"Cliente",
							"Genero"=>$genero,
							"Foto"=>$foto,
							"CompaniaCodigo"=>$CompaniaCodigo,
							"TablaVinculo"=>"clienteC"
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
									"Cargo"=>$ocupacion,
									"Direccion"=>$direccion,
									"Codigo"=>$codigo,
									"Codigocliente"=>$codigoCliente

								];
								$guardarAdmin=clienteModelo::agregar_C_cliente_modelo($dataAD);
								if($guardarAdmin->rowCount()>=1){
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Cuenta Cliente registrado",
										"Texto"=>"El cliente se registro con exito en el sistema.",
										"Tipo"=>"success"

									];
								}else{
									mainmodel::eliminar_cuenta($codigo);
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No hemos podido registrar el cliente 2",
										"Tipo"=>"error"

									];
								}

							
							}else{
								mainmodel::eliminar_cuenta($codigo);
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
								"Texto"=>"No hemos podido registrar el cliente.",
								"Tipo"=>"error"

							];
						}
					}
				}
			}
		}	
		return mainModel::sweet_alert($alerta);
	}
	
	//Controlador para paginador administradores
	public function paginador_C_cliente_controlador($pagina,$registros,$privilegio,$cliente,$busqueda,$estado){
		
		session_start(['name'=>'DSA']);
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$cliente=mainModel::limpiar_cadena($cliente);	
		$busqueda=mainModel::limpiar_cadena($busqueda);	
		$estado=mainModel::limpiar_cadena($estado);	
		$cliente=mainModel::decryption($cliente);
		
		$tabla="";
		
		if($_SESSION['Pri_listCuentaClientesactivos'] == 1){
			$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;

			if(isset($busqueda) && $busqueda!=""){
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM clienteC WHERE (ClienteCNombre LIKE '%$busqueda%' OR ClienteCApellido  LIKE '%$busqueda%' OR ClienteCDNI  LIKE '%$busqueda%' OR ClienteCTelefono  LIKE '%$busqueda%') AND ClienteCodigo = '$cliente' ORDER BY id ASC LIMIT $inicio,$registros";

				$paginaurl="clientlist";
			}else{
				$consulta="
				SELECT SQL_CALC_FOUND_ROWS * FROM clienteC WHERE ClienteCEstado = '$estado' AND ClienteCodigo = '$cliente' ORDER BY id ASC LIMIT $inicio,$registros";

				$paginaurl="clientlist";
			}

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
					$codigocliente= mainModel::encryption($rows['CuentaCodigo']);
					$estado = $rows['ClienteCEstado'];
					$tabla.='
						<tr class="list_cuentaC">
							<td>'.$contador.'</td>
							<td>'.$rows['ClienteCDNI'].'</td>
							<td>'.$rows['ClienteCNombre'].'
								<div class="task-menu">';
									
										$tabla.='


											<a href="#" id="edit-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Editar datos" data-toggle="modal" data-target="#divupdatedatos"><i class="zmdi zmdi-account-circle"></i></a>

											<a href="#" id="count-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Editar Cuenta" data-toggle="modal" data-target="#divupdatecuenta"><i class="zmdi zmdi-settings"></i></a>';
									
									

										if($estado == "Activo"){
											if($_SESSION['Pri_eliminarCuentaClientes'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="delete-'.$codigocliente.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
											}
										}else{
											if($_SESSION['Pri_activarCuentaClientes'] == 1){
												$tabla.='
												<a href="javascript:void(0)" id="active-'.$codigocliente.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
											}
										}

									
						$tabla.='
								</div>
								</td>
							<td>'.$rows['ClienteCApellido'].'</td>
							<td>'.$rows['ClienteCTelefono'].'</td>';
							if($busqueda != ""){
									$tabla.= '<td>'.$rows['ClienteCEstado'].'</td>';
								}


					$tipo = mainModel::encryption("Cliente");
					$tabla.='
						</tr>
						<script>

								$("#edit-'.$codigocliente.'").click(function(e){
									e.preventDefault();
									$("#avisolista").val("Cclientes");
									document.forms.updatedatosu.action= "'.SERVERURL.'ajax/clienteAjax.php";
									crearformularioactualizarcuentaC("Unico","'.$codigocliente.'");

								});

								$("#count-'.$codigocliente.'").click(function(e){
									e.preventDefault();
									document.forms.updatecuentausu.action= "'.SERVERURL.'ajax/cuentaAjax.php";
									crearformularioactualizarCuenta("'.$tipo.'","'.$codigocliente.'","'.SERVERURL.'ajax/cuentaAjax.php","crearformularioactualizarCuenta","'.$_SESSION['codigo_cuenta_dsa'].'","'.$_SESSION['tipo_dsa'].'","'.$_SESSION['privilegio_dsa'].'","'.SERVERURL.'home","client");

								});
								$("#delete-'.$codigocliente.'").click(function(e){
								e.preventDefault();
								var addmensaje = "Esta acción eliminara todo registro de este cuenta de cliente";
								var estado = "Desactivado";					
								var action = "desactivar_cuentaC";
								var url = "'.SERVERURL.'ajax/clienteAjax.php";
								var tipo = "delete";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$codigocliente.'",estado:estado};
								generalescliente(url,tipo,tipoaccion,data,action,addmensaje);

							});
							$("#active-'.$codigocliente.'").click(function(e){
								e.preventDefault();
								var addmensaje = "Esta acción activa todo registro de esta cuenta de cliente";
								var estado = "Activo";					
								var action = "desactivar_cuentaC";
								var url = "'.SERVERURL.'ajax/clienteAjax.php";
								var tipo = "update";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$codigocliente.'",estado:estado};
								generalescliente(url,tipo,tipoaccion,data,action,addmensaje);

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
	public function desactivar_C_cliente_controlador(){
			$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
			$estado=mainModel::limpiar_cadena($_POST['estado']);

			$codigo=mainModel::decryption($codigo);


					$Upcliente=clienteModelo::desactivar_C_cliente_modelo($estado,$codigo);

					if($Upcliente->rowCount()>=1){
						if($estado == "Desactivado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Cliente Eliminado.",
								"Texto"=>"La cuenta del cliente fue eliminado con exito.",
								"Tipo"=>"success"

							];
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Cliente Reactivado.",
								"Texto"=>"La cuenta del cliente fue Reactivado con exito.",
								"Tipo"=>"success"

							];
						}	
					}else{
						if($estado == "Desactivado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos eliminar esta cuenta de cliente en este momento.",
								"Tipo"=>"error"

							];	
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos Reactivar esta cuenta de cliente en este momento.",
								"Tipo"=>"error"

							];	
						}
					}

			return mainModel::sweet_alert($alerta);
		}
	
	
	//CREA FORMULARIO PARA ACTUALIZAR CUENTA CLIENTE
	public function crear_formulario_C_cliente_controlador(){
		$tipo = $_POST['tipo1'];
		$Codigo = $_POST['codigo1'];
			
		$Codigo=mainModel::decryption($Codigo);	
		$tipo=mainModel::limpiar_cadena($tipo);
		$Codigo=mainModel::limpiar_cadena($Codigo);
			
		$cdata = clienteModelo::datos_C_cliente_modelo($tipo,$Codigo);
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
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="Cdni-up" value="'.$campos['ClienteCDNI'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Cnombre-up" value="'.$campos['ClienteCNombre'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Capellido-up" value="'.$campos['ClienteCApellido'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Teléfono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="Ctelefono-up" value="'.$campos['ClienteCTelefono'].'" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Cargo/Ocupación *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Cocupacion-up" value="'.$campos['ClienteCOcupacion'].'" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<textarea name="Cdireccion-up" class="form-control" rows="2" maxlength="100">'.$campos['ClienteCDireccion'].'</textarea>
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
	public function actualizar_C_cliente_controlador(){
			$cuenta=mainModel::decryption($_POST['Ccuenta-up']);
			$dni=mainModel::limpiar_cadena($_POST['Cdni-up']);
			$nombre=mainModel::limpiar_cadena($_POST['Cnombre-up']);
			$apellido=mainModel::limpiar_cadena($_POST['Capellido-up']);
			$telefono=mainModel::limpiar_cadena($_POST['Ctelefono-up']);
			$ocupacion=mainModel::limpiar_cadena($_POST['Cocupacion-up']);
			$direccion=mainModel::limpiar_cadena($_POST['Cdireccion-up']);
			
			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM clienteC WHERE CuentaCodigo='$cuenta'");
			$DatosCliente=$query1->fetch();
			
			if($dni != $DatosCliente['ClienteCDNI']){
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT ClienteCDNI FROM clienteC WHERE ClienteCDNI='$dni'");
				
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
				"Ocupacion"=>$ocupacion,
				"Direccion"=>$direccion,
				"Codigo"=>$cuenta
			];
		$datosactualizados=clienteModelo::actualizar_C_cliente_modelo($dataClient);
		

			if($datosactualizados->rowCount()>= 1){
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
		
		return  mainModel::sweet_alert($alerta);
		}
	
	
}