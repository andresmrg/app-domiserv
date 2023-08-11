<?php
	if($peticionAjax){
		require_once "../modelos/generalModelo.php";
	}else{
		require_once "./modelos/generalModelo.php";
	}
	
	
	class generalControlador extends generalModelo{
		// crear div modales
		public function obtener_modales_general_controlador(){
		$formularios= "";
					
		$formularios.='
		  <!--<style>
			/*#mdialTamanio{
			  width: 80% !important;
			}*/
		  </style>-->
		<!--div para actualizar datos-->
		<div class="modal fade" id="divupdatedatos" tabindex="1020" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" id="mdialTamanio">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
						<div class="panel-heading">Actualizar datos</div>
					</div>
					<div class="modal-body">
						<div id="divupdatedata" class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
							</div>
							<div class="panel-body">
								<input type="hidden" id="avisolista" value="">
								<form action="#" method="POST" id="updatedatosu" name="updatedatosu" data-form="update" class="Formulariogeneral" autocomplete="off" enctype="multipart/form-data">
								
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
		
		<!--div para actualizar cuenta-->
		<div class="modal fade" id="divupdatecuenta" tabindex="1021" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" id="mdialTamanio">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
						<div class="panel-heading">Actualizar cuenta</div>
					</div>
					<div class="modal-body">
						<div id="divupdatedata" class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
							</div>
							<div class="panel-body">
								<form action="#" method="POST" id="updatecuentausu" name="updatecuentausu" data-form="update" class="Formulariogeneral" autocomplete="off" enctype="multipart/form-data">';
			
			
					$formularios.='<div id="controlprivi"></div>
									<input type="hidden" name="CodigoCuente-up" id="CodigoCuente-up" value="">
									<input type="hidden" name="tipoCuenta-up" id="tipoCuenta-up" value="">
									<fieldset>
										<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Nombre de usuario</label>
														<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-up" id="usuario-up" value="" required="" maxlength="15">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">E-mail</label>
														<input class="form-control" type="email" name="email-up" id="email-up" value="" maxlength="50">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group">
														<label class="control-label">Genero</label>
														<div class="radio radio-primary">
															<label>
																<input type="radio" name="optionsGenero-up" id="optionsGenero-M" value="Masculino" >

																<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
															</label>
														</div>
														<div class="radio radio-primary">
															<label>
																<input type="radio" name="optionsGenero-up" id="optionsGenero-F" value="Femenino" >
																<i class="zmdi zmdi-female"></i> &nbsp; Femenino
															</label>
														</div>
													</div>
												</div>';

												
													$formularios.='<div class="col-xs-12 col-sm-6">
														<div class="form-group" id="controlestado">
															<label class="control-label">Estado de la cuenta</label>
															<div class="radio radio-primary">
																<label>
																	<input type="radio" name="optionsEstado-up" id="optionsEstado-A" value="Activo" >
																	<i class="zmdi zmdi-lock-open"></i> &nbsp; Activo
																</label>
															</div>
															<div class="radio radio-primary">
																<label>
																	<input type="radio" name="optionsEstado-up" id="optionsEstado-D" value="Desactivado"  >
																	<i class="zmdi zmdi-lock"></i> &nbsp; Deshabilitado
																</label>
															</div>
														</div>
													</div>';
												 

											$formularios.='</div>
										</div>
									</fieldset>
									<br>
									<fieldset>
										<legend><i class="zmdi zmdi-lock"></i> &nbsp; Actualizar Contraseña</legend>
										<p>
											Si desea realiza rel cambio de su contraseña actual, por favor ingrese la nueva contraseña y confirmela.
										</p>
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Nueva contraseña *</label>
														<input class="form-control" type="password" name="newPassword1-up" maxlength="50">
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Repita la nueva contraseña *</label>
														<input class="form-control" type="password" name="newPassword2-up" maxlength="50">
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									<br>';
									
									$formularios.='<fieldset id="controprivilegios">
									
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
												<div class="col-xs-12 col-sm-6">
													<div class="radio radio-primary">
														<label>
														<input type="radio" name="optionsPrivilegio-up" id="optionsPrivilegio-1" value="'.mainModel::encryption(1).'">';
															$formularios.='<i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
														</label>
													</div>
													<div class="radio radio-primary">
														<label>
															<input type="radio" name="optionsPrivilegio-up" id="optionsPrivilegio-2" value="'.mainModel::encryption(2).'">';
															$formularios.='<i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
														</label>
													</div>
													<div class="radio radio-primary">
														<label>
															<input type="radio" name="optionsPrivilegio-up" id="optionsPrivilegio-3" value="'.mainModel::encryption(3).'">';
															$formularios.='<i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
														</label>
													</div>
												</div>
											</div>
										</div>
									</fieldset>';
										
									$formularios.='<br>
									<fieldset>
										<legend><i class="zmdi zmdi-account-circle"></i> &nbsp; Datos de la cuenta</legend>
										<p>
											Para poder actualizar los datos de la cuenta por favor ingrese su nombre de usuario y contraseña.
										</p>
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Nombre de usuario</label>
														<input class="form-control" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" type="text" name="userLog-up" maxlength="15" required="" >
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Contraseña</label>
														<input class="form-control" type="password" name="passwordLog-up" maxlength="50" required="">
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									<p class="text-center" style="margin-top: 20px;">
										<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
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

		
	}

	