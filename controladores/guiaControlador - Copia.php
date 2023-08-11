	<?php
	if($peticionAjax){
		require_once "../modelos/guiaModelo.php";
	}else{
		require_once "./modelos/guiaModelo.php";
	}
	

class guiaControlador extends guiaModelo{
	// crear div modales
	public function obtener_modales_guia_controlador(){
		$remitente =  guiaControlador::cliente_select_guia_controlador("Select","");
		$servicios =  guiaControlador::servicios_select_guia_controlador("Select","GUIA");
		$agente = guiaControlador::mensajero_select_guia_controlador("Select","");
		$zonas = guiaControlador::zona_select_guia_controlador("Select","");												
		$tarifas = guiaControlador::tarifa_select_guia_controlador("Select","GUIA");
		$tarifasadmin = guiaControlador::tarifa_select_guia_controlador("Select","TODAS");
		$novedades = guiaControlador::novedad_select_guia_controlador("Select","ACTUALIZAR");
		$novedadesadmin = guiaControlador::novedad_select_guia_controlador("Select","TODANOVEDAD");
		$Ultimaimportacion = mainModel::ejecutar_consulta_simple("SELECT id FROM Importacion WHERE ImportacionCodigo LIKE '%IMP%' ORDER BY id DESC LIMIT 1");
		$Ultimaguias = mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia ORDER BY id DESC LIMIT 1");
		
		
		$ultimaimpo = $Ultimaimportacion->fetch();
		$ultimaguia = $Ultimaguias->fetch();
		
		
		$fechainferior = date("Y-m-d");
		
		$formularios= "";
		//formularioa para crear nueva guia	
		if($_SESSION['Pri_nuevaGuia'] == 1){
			$formularios.='
			  <!--<style>
				/*#mdialTamanio{
				  width: 80% !important;
				}*/
			  </style>-->
			<!--div para crear nuevo guia-->
			<div class="modal fade" id="divnewguia" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" id="mdialTamanio">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
							<div class="panel-heading">Nueva guia</div>

						</div>
						<div class="modal-body">';
							//crea formulario para crar cliente generico
							if($_SESSION['Pri_clientenocorporativo'] == 1 ){
							$formularios.='
							<ul class="breadcrumb breadcrumb-tabs">
								<li>
									<a id="shownocorporativo" class="btn btn-info btn-xs">
										<i class="zmdi zmdi-account"></i> &nbsp; No corporativo
									</a>
								</li>
							</ul>
							<div id="filtronocorporativo"  class="container-fluid panel panel-info">
								<div>
									<button id="cerrarnocorporativo" type="button" class="close" ><i class="zmdi zmdi-close-circle-o  zmdi-hc-2x"></i></button>
									<button id="editarcliente" type="button" class="close" ><i class="zmdi zmdi-edit zmdi-hc-2x"></i></button>
									<button id="noeditarcliente" type="button" class="close" ><i class="zmdi zmdi-refresh-sync-off zmdi-hc-2x"></i></button>
									<button id="vercliente" type="button" class="close" ><i class="zmdi zmdi-eye zmdi-hc-2x"></i></button>
									<button id="novercliente" type="button" class="close" ><i class="zmdi zmdi-eye-off zmdi-hc-2x"></i></button>
								</div>
								<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS REMITENTE</h3>
								</div>

								<div class="alert alert-success">
									<strong><i class="zmdi zmdi-mood zmdi-hc-2x"></i> Genial!</strong> Se encontro una coincidencia.
								</div>
								<div class="alert alert-danger">
									<strong><i class="zmdi zmdi-mood-bad zmdi-hc-2x"></i>  Sin exíto!</strong> No se encontraron coincidencias.
								</div>

								<form action="'.SERVERURL.'ajax/clienteAjax.php" method="POST" data-form="save" id="regnewnocorporativo" name="regnewnocorporativo" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label">NIT/CC *</label>
												<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dnireg" id="dnireg" required="" maxlength="30">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label">Nombre del remitente *</label>
												<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" name="nombrereg" id="nombre-reg" required="" maxlength="100" disabled="undisabled">
											</div>
										</div>
										<div id="masdatoscliente">
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label">Apellido del remitente *</label>
													<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" name="apellidoreg" id="apellido-reg" required="" maxlength="100" disabled="undisabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label">Ciudad *</label>
													<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" id="ciudad-reg" name="ciudadreg" required="" maxlength="30" disabled="undisabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label">Barrio *</label>
													<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="barrioreg" id="barrio-reg" required="" maxlength="50" disabled="undisabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label">Dirección *</label>
													<input class="form-control" type="text" name="direccionreg" id="direccion-reg" required=""  maxlength="170" disabled="undisabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label">Teléfono *</label>
													<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,15}" class="form-control" type="text" name="telefonoreg" id="telefono-reg" required=""  maxlength="15" disabled="undisabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<label class="control-label">E-mail *</label>
													<input class="form-control" type="email" name="emailreg" id="email-reg" required=""  maxlength="80" disabled="undisabled">
												</div>
											</div>
											<p class="text-center" style="margin-top: 20px;">
												<button id="savecliente" type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
											</p>
										</div>
									</div>
									<div class="RespuestaAjax"></div>
								</form>
							</div>';
							}
			// crea formulario para crear nueva guias
			$formularios.='<div class="panel panel-info">
									<div class="panel-heading">
									<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA GUIA</h3>
								</div>
								<div class="panel-body">

									<form action="'.SERVERURL.'ajax/guiaAjax.php" method="POST" data-form="save" id="regnewguia" name="regnewguia" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<div class="container-fluid">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group label-floating">
															<label class="control-label">Nombre Remitente * </label>
															<input type="hidden" name="idnocorporativo" id="idnocorporativo" value="">
															<select id="remitente-reg" name="remitente-reg" class="form-control" >
																'.$remitente.'
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group label-floating">
															<label class="control-label">Tipo de servicio *</label>
															<select id="tiposervicio-reg" name="tiposervicio-reg" class="form-control" required="" >
																'.$servicios.'
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group label-floating">
															<label class="control-label">Radicado </label>
															<input class="form-control" type="text" name="radicado-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group label-floating">
															<label class="control-label">Area</label>
															<input class="form-control" type="text" id="area-reg" name="area-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Destinatario *</label>
															<input class="form-control" type="text" id="destinatario-reg" name="destinatario-reg" maxlength="5000" required="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">E-mail</label>
															<input class="form-control" type="email" name="email-reg" maxlength="80">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Municipio *</label>
															<input class="form-control" type="text" id="municipio-reg" name="municipio-reg" maxlength="5000" required="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Dirección *</label>
															<input class="form-control" type="text" id="direccion-reg1" name="direccion-reg" maxlength="5000" required="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Referente</label>
															<input class="form-control" type="text" id="referente-reg" name="referente-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Teléfono</label>
															<input class="form-control" type="text" id="telefono-reg1" name="telefono-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group label-floating">
															<label class="control-label">Cataporte</label>
															<input class="form-control" type="number" id="cataporte-reg" name="cataporte-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group label-floating">
															<label class="control-label">Volumen</label>
															<input class="form-control" type="number" id="volumen-reg" name="volumen-reg" maxlength="5000" required="">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group label-floating">
															<label class="control-label">fecha recogida *</label>
															<input type="date" name="fecharecogida-reg" id="fecharecogida-reg" class="form-control" required=""  min="'.$fechainferior.'" max="2999-12-31">

														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group label-floating">
															<label class="control-label">fecha factura </label>
															<input type="date" name="fechafactura-reg" id="fechafactura-reg" class="form-control" min="'.$fechainferior.'" max="2999-12-31">

														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Agente *</label>
															<select id="agente-reg" name="agente-reg" class="form-control" required="">
																'.$agente.'
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">Zona *</label>
															<select id="zona-reg" name="zona-reg" class="form-control" required="">				
																'.$zonas.'	
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group label-floating">
															<label class="control-label">Tarifa </label>
															<select id="tarifa-reg" name="tarifa-reg" class="form-control" >				
																'.$tarifas.'	
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group label-floating">
															<label class="control-label">Nueva dirección </label>
															<input class="form-control" type="text" id="Ndireccion-reg" name="Ndireccion-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group label-floating">
															<label class="control-label">Observaciones </label>
															<input class="form-control" type="text" id="observaciones-reg" name="observaciones-reg" maxlength="5000">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group label-floating">
															<label class="control-label">fecha de Asignación </label>
															<input type="date" name="fechaasignado-reg" id="fechaasignado-reg" class="form-control" min="'.$fechainferior.'" max="2999-12-31">

														</div>
													</div>';
													if($_SESSION['Pri_bonificacion'] == 1){
														$formularios.='
														<div class="col-md-6">
															<div class="form-group label-floating">
																<label class="control-label">Bonificación</label>
																<input class="form-control" type="number" id="bonificacion-reg" name="bonificacion-reg" maxlength="5000">
															</div>
														</div>';
													}
												$formularios.='
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
		
		//formulario para actualizar guia desde el mensajero

		$formularios.='
				<style>
					#preview{
					
						width: 40% !important;
						transform:scaleX(1) !important;
						/*transform: scale(1.5) !important;*/
						border: 4px solid !important;
						
						height: 300px !important;
					}
					@media (max-width:1020px){
						#preview{
					
							width: 200px !important;
							height: 200px !important;
							transform:scaleX(1) !important;
							/*transform: scale(1.5) !important;*/
							border: 4px solid !important;
							
							
						}
					
					}
				
				</style>
				<div class="modal fade" id="divupdateguia" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Actualizar guia</div>
							</div>
							<div class="modal-body">
								
								<div id="divscaner" class="row">
									<div class="col-md-12">
										<center>
											<video id="preview" controls="controls">
												
											</video>
										</center>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">guia leida </label>
											<input class="form-control" type="text" id="readguia-up" name="readguia-up" maxlength="5000">
										</div>
									</div>
								</div>
								
								<div class="panel panel-info">
									<div>
										<button id="openscaner" type="button" class="close" title="Escanear" ><i class="zmdi zmdi-memory zmdi-hc-2x"></i></button>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ACTUALIZAR GUIA</h3>
									</div>
								</div>
								<div id="closepanelup" class="panel-body">
									<form action="'.SERVERURL.'ajax/guiaAjax.php" method="POST" data-form="update" id="updateguia" name="updateguia" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<input type="hidden" id="id-up" name="id-up" value="">
											<input type="hidden" id="fecharecogida-up" name="fecharecogida-up" value="">
											<input type="hidden" name="imgcanvas" id="imgcanvas" >
											<input type="hidden" name="imgcanvas1" id="imgcanvas1" >
											<input type="hidden" name="imgcanvas2" id="imgcanvas2" >
											
											
											<p id="guiaid">Guia: </p>
											<p id="guiadireccion">Dirección: </p>
											<p id="guiadestino">Destinatario: </p>
											<p id="guianovedad">Novedad actual: </p>
											<div class="row">
												<div class="col-md-6 col-xs-6">
													
														<label class="control-label">Novedad *</label>
														<select id="novedad-up" name="novedad-up" class="form-control" required="" placeholder="Novedad *" >
															'.$novedades.'
														</select>
													
													<label>
														<input type="checkbox" id="checknovedad-up" name="checknovedad-up" value="OK">
														Fijar Novedad
													</label>
												</div>
												<div class="col-md-6 col-xs-6">
													
														<label class="control-label">Fecha de movimiento </label>
														<input type="date" name="fechamovimiento-up" id="fechamovimiento-up" class="form-control" min="2019-01-01" max="2999-12-31" required="">
													
													<label>
														<input type="checkbox" id="checkfecha-up" name="checkfecha-up" value="OK">
														Fijar Fecha
													</label>
												</div>';
												if($_SESSION['PrivilegioCANM'] == 1){
								$formularios.='<div class="col-md-12">
													<div class="form-group ">
														<label class="control-label">Agente *</label>
														<select id="agente-up" name="agente-up" class="form-control" placeholder="Agente *">
															'.$agente.'
														</select>
													</div>
													<label>
														<input type="checkbox" id="checkagente-up" name="checkagente-up" value="">
														Fijar Agente
													</label>
												</div>';
												}
												
								$formularios.='	<div class="col-md-12 col-xs-12">
													
														<label class="control-label">Detalle novedad </label>
														<input class="form-control" type="text" id="detallenovedad-up" name="detallenovedad-up" maxlength="5000">
													
												</div>
												
												<div class="col-md-12 col-xs-12">
													
														<label class="control-label">Cambio de zona</label>
														<select id="zona-up" name="zona-up" class="form-control" >				
															'.$zonas.'	
														</select>
													
													<label>
														<input type="checkbox" id="checkzona-up" name="checkzona-up" value="SI">
														Actualizar guia con nueva dirección de entrega
													</label>
												</div>
											</div>
										</fieldset>
										<p class="text-center" style="margin-top: 20px;">
											<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Actualizar</button>
										</p>

										<div class="RespuestaAjax"></div>
									</form>
									<div class="col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<!--<span class="control-label">Imágen</span>-->
											<label class="control-label">Elija la imágen de la guia...</label>
											<input type="file" id="imagenguia-up" name="imagenguia-up" onChange="return cargarimagen()" accept="image/*" >
											<div class="input-group">
												<input type="text" id="imgalert" readonly="" class="form-control" placeholder="Elija la imagen" value="">
												<span class="input-group-btn input-group-sm">
													<button type="button" class="btn btn-fab btn-fab-mini">
														<i class="zmdi zmdi-attachment-alt"></i>
													</button>
												</span>
											</div>
											<!--<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>-->
										</div>
									</div>
									<div id="cargacataporte" class="col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<!--<span class="control-label">Imágen</span>-->
											<label class="control-label">Elija la imágen del cataporte...</label>
											<input type="file" id="imagencataporte-up" name="imagencataporte-up" onChange="return cargarimagen2()" accept="image/*" >
											<div class="input-group">
												<input type="text" id="cataportealert" readonly="" class="form-control" placeholder="Elija la imagen" value="">
												<span class="input-group-btn input-group-sm">
													<button type="button" class="btn btn-fab btn-fab-mini">
														<i class="zmdi zmdi-attachment-alt"></i>
													</button>
												</span>
											</div>
											<!--<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>-->
										</div>
									</div>
									<div class="col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<!--<span class="control-label">Imágen</span>-->
											<label class="control-label">Elija la imágen del Inmueble...</label>
											<input type="file" id="imagenlugar-up" name="imagenlugar-up" onChange="return cargarimagen1()" accept="image/*"  >
											<div class="input-group">
												<input type="text" id="lugarlert" readonly="" class="form-control" placeholder="Elija la imagen" value="">
												<span class="input-group-btn input-group-sm">
													<button type="button" class="btn btn-fab btn-fab-mini">
														<i class="zmdi zmdi-attachment-alt"></i>
													</button>
												</span>
											</div>
											<!--<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>-->
										</div>
									</div>
									<canvas id="lienzo" width="10" height="10"></canvas>
									
									<canvas id="lienzo2" width="10" height="10"></canvas>
									
									<canvas id="lienzo1" width="10" height="10"></canvas>
									
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>

					</div>
				</div>
						
						';
		//formulario para actualizar guia desde administradores
		$formularios.='
				<style>
					#preview1{
					
						width: 40% !important;
						transform:scaleX(1) !important;
						/*transform: scale(1.5) !important;*/
						border: 4px solid !important;
						
						height: 300px !important;
					}
					@media (max-width:1020px){
						#preview1{
					
							width: 200px !important;
							height: 200px !important;
							transform:scaleX(1) !important;
							/*transform: scale(1.5) !important;*/
							border: 4px solid !important;
							
							
						}
					
					}
				
				</style>
				<div class="modal fade" id="divupdateguiaadmin" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Actualizar guia</div>
							</div>
							<div class="modal-body">
								
								<div id="divscaneradmin" class="row">
									<div class="col-md-12">
										<center>
											<video id="preview1" controls="controls">
												
											</video>
										</center>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label  class="control-label">guia leida </label>
											<input class="form-control" type="text" id="readguiaadmin-up" name="readguiaadmin-up" maxlength="5000">
										</div>
									</div>
								</div>
								
								<div class="panel panel-info">
									<div>
										<button id="openscaneradmin" type="button" class="close" title="Escanear" ><i class="zmdi zmdi-memory zmdi-hc-2x"></i></button>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ACTUALIZAR GUIA</h3>
									</div>
								</div>
								<div id="closepaneladminup" class="panel-body">
									<form action="'.SERVERURL.'ajax/guiaAjax.php" method="POST" data-form="update" id="updateguiaadmin" name="updateguiaadmin" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
										<fieldset>
											<input type="hidden" id="idguiaadmin-up" name="idguiaadmin-up" value="">
											<input type="hidden" id="fecharecogidaadmin-up" name="fecharecogidaadmin-up" value="">
											<input type="hidden" name="imgcanvasadmin" id="imgcanvasadmin" >
											<input type="hidden" name="imgcanvas1admin" id="imgcanvas1admin" >
											<input type="hidden" name="imgcanvas2admin" id="imgcanvas2admin" >
											
											<div class="container-fluid">
												<div class="row">
													<div class="col-md-9 col-xs-8">
														
															<label class="control-label">Nombre Remitente * </label>
															<select id="remitenteadmin-up" name="remitenteadmin-up" class="form-control" >
																'.$remitente.'
															</select>
														
													</div>
													<div class="col-md-3 col-xs-4">
														
															<label class="control-label">Guia * </label>
															<input class="form-control" type="text" id="guiaadmin-up" name="guiaadmin-up" maxlength="5000" disabled="undisabled">
														
													</div>
													<div class="col-md-4 col-xs-5">
														
															<label class="control-label">Tipo de servicio *</label>
															<select id="tiposervicioadmin-up" name="tiposervicioadmin-up" class="form-control" required="" >
																'.$servicios.'
															</select>
														
													</div>
													<div class="col-md-4 col-xs-3">
														
															<label class="control-label">Radicado </label>
															<input class="form-control" type="text" id="radicadoadmin-up" name="radicadoadmin-up" maxlength="5000">
														
													</div>
													<div class="col-md-4 col-xs-4">
														
															<label class="control-label">Area</label>
															<input class="form-control" type="text" id="areaadmin-up" name="areaadmin-up" maxlength="5000">
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Destinatario *</label>
															<input class="form-control" type="text" id="destinatarioadmin-up" name="destinatarioadmin-up" maxlength="5000" required="">
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">E-mail</label>
															<input class="form-control" type="email" name="emailadmin-up" maxlength="80">
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Municipio *</label>
															<input class="form-control" type="text" id="municipioadmin-up" name="municipioadmin-up" maxlength="5000" required="">
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Dirección *</label>
															<input class="form-control" type="text" id="direccionadmin-up" name="direccionadmin-up" maxlength="5000" required="">
														
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Referente</label>
															<input class="form-control" type="text" id="referenteadmin-up" name="referenteadmin-up" maxlength="5000">
														
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Teléfono</label>
															<input class="form-control" type="text" id="telefonoadmin-up" name="telefonoadmin-up" maxlength="5000">
														
													</div>
													<div class="col-md-3 col-xs-2">
														
															<label class="control-label">Cataporte</label>
															<input class="form-control" type="number" id="cataporteadmin-up" name="cataporteadmin-up" maxlength="5000">
														
													</div>
													<div class="col-md-3 col-xs-2">
														
															<label class="control-label">Volumen</label>
															<input class="form-control" type="number" id="volumenadmin-up" name="volumenadmin-up" maxlength="5000" required="">
														
													</div>
													<div class="col-md-3 col-xs-4">
														
															<label class="control-label">fecha recogida *</label>
															<input type="date" name="fecharecogidaadminr-up" id="fecharecogidaadminr-up" class="form-control" required="" min="2019-01-01" max="2999-12-31">

														
													</div>
													<div class="col-md-3 col-xs-4">
														
															<label class="control-label">fecha factura </label>
															<input type="date" name="fechafacturaadmin-up" id="fechafacturaadmin-up" class="form-control" min="2019-01-01" max="2999-12-31">

														
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Novedad *</label>
															<select id="novedadadmin-up" name="novedadadmin-up" class="form-control" required="" placeholder="Novedad *" >
																'.$novedadesadmin.'
															</select>
														
														<label>
															<input type="checkbox" id="checknovedadadmin-up" name="checknovedadadmin-up" value="OK">
															Fijar Novedad
														</label>
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Fecha de movimiento </label>
															<input type="date" name="fechamovimientoadmin-up" id="fechamovimientoadmin-up" class="form-control" min="2019-01-01" max="2999-12-31" required="">
														
														<label>
															<input type="checkbox" id="checkfechaadmin-up" name="checkfechaadmin-up" value="OK">
															Fijar Fecha
														</label>
													</div>
													<div class="col-md-12 col-xs-12">
														
															<label class="control-label">Detalle novedad </label>
															<input class="form-control" type="text" id="detallenovedadadmin-up" name="detallenovedadadmin-up" maxlength="5000">
														
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Agente *</label>
															<select id="agenteadmin-up" name="agenteadmin-up" class="form-control" required="">
																'.$agente.'
															</select>
															<label>
																<input type="checkbox" id="checkagenteadmin-up" name="checkagenteadmin-up" value="OK">
																Fijar Agente
															</label>
														
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Zona *</label>
															<select id="zonaadmin-up" name="zonaadmin-up" class="form-control" required="">				
																'.$zonas.'	
															</select>
														
													</div>
													<div class="col-md-12 col-xs-12">
														
															<label class="control-label">Tarifa </label>
															<select id="tarifaadmin-up" name="tarifaadmin-up" class="form-control" >				
																'.$tarifasadmin.'	
															</select>
														
													</div>
													<div class="col-md-12 col-xs-12">
														
															<label class="control-label">Nueva dirección </label>
															<input class="form-control" type="text" id="Ndireccionadmin-up" name="Ndireccionadmin-up" maxlength="5000">
														
														<label>
															<input type="checkbox" id="checkzonaadmin-up" name="checkzonaadmin-up" value="SI">
															Actualizar guia con nueva dirección de entrega
														</label>
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">fecha de Asignación </label>
															<input type="date" name="fechaasignadoadmin-up" id="fechaasignadoadmin-up" class="form-control" min="2019-01-01" max="2999-12-31">

														
													</div>
													<div class="col-md-6 col-xs-6">
														
															<label class="control-label">Bonificación</label>
															<input class="form-control" type="number" id="bonificacionadmin-up" name="bonificacionadmin-up" maxlength="5000">
														
														<label>
															<input type="checkbox" id="checkdarbono-up" name="checkdarbono-up" value="SI">
															Dar bonificación
														</label>
													</div>
													
												</div>
											</div>
											
											
										</fieldset>
										<p class="text-center" style="margin-top: 20px;">
											<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Actualizar</button>
										</p>

										<div class="RespuestaAjax"></div>
										
									</form>
									<div class="col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<!--<span class="control-label">Imágen</span>-->
											<label class="control-label">Elija la imágen de la guia...</label>
											<input type="file" id="imagenguiaadmin-up" name="imagenguiaadmin-up" onChange="return cargarimagenadmin()" accept="image/*" >
											<div class="input-group">
												<input type="text" id="adminimgalert" readonly="" class="form-control" placeholder="Elija la imagen" value="">
												<span class="input-group-btn input-group-sm">
													<button type="button" class="btn btn-fab btn-fab-mini">
														<i class="zmdi zmdi-attachment-alt"></i>
													</button>
												</span>
											</div>
											<!--<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>-->
										</div>
									</div>
									<div id="cargacataporteadmin" class="col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<!--<span class="control-label">Imágen</span>-->
											<label class="control-label">Elija la imágen del cataporte...</label>
											<input type="file" id="imagencataporteadmin-up" name="imagencataporteadmin-up" onChange="return cargarimagen2admin()" accept="image/*" >
											<div class="input-group">
												<input type="text" id="admincataportealert" readonly="" class="form-control" placeholder="Elija la imagen" value="">
												<span class="input-group-btn input-group-sm">
													<button type="button" class="btn btn-fab btn-fab-mini">
														<i class="zmdi zmdi-attachment-alt"></i>
													</button>
												</span>
											</div>
											<!--<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>-->
										</div>
									</div>
									<div class="col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<!--<span class="control-label">Imágen</span>-->
											<label class="control-label">Elija la imágen del Inmueble...</label>
											<input type="file" id="imagenlugaradmin-up" name="imagenlugaradmin-up" onChange="return cargarimagen1admin()" accept="image/*"  >
											<div class="input-group">
												<input type="text" id="adminlugarlert" readonly="" class="form-control" placeholder="Elija la imagen" value="">
												<span class="input-group-btn input-group-sm">
													<button type="button" class="btn btn-fab btn-fab-mini">
														<i class="zmdi zmdi-attachment-alt"></i>
													</button>
												</span>
											</div>
											<!--<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>-->
										</div>
									</div>
									<canvas id="lienzoadmin" width="10" height="10"></canvas>
									
									<canvas id="lienzo2admin" width="10" height="10"></canvas>
									
									<canvas id="lienzo1admin" width="10" height="10"></canvas>
									
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>

					</div>
				</div>
						
						';
		
		//mas funciones
		$formularios.='
				
				<div class="modal fade" id="divfunctiones" tabindex="1000" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Más funciones</div>
							</div>
							<div class="modal-body">
								<div class="row panel-group">
								
									<div class="panel panel-primary col-md-4">
										<div class="panel-heading">
											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> IMPORTACION: <small> Guias e imagenes</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a data-toggle="modal" data-target="#divimponewsguia">
														Importar guias masivamente
													</a>
												</li>
												<li>
													<a data-toggle="modal" data-target="#divimpoupsguia" title="novedad, nueva direccion, agente, zona, tarifa de validación">
														Actualizar guias masivamente
													</a>
												</li>
												<li>
													<a data-toggle="modal" data-target="#divloadimg">
														Cargar imagen masivamente
													</a>
												</li>
												<li></li>
											</ol>
										</div>

									</div>
									<div class="panel panel-success col-md-4">
										<div class="panel-heading">
											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> ZONIFICAR: <small> Asignar a mensajeros</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a id="zonificarescaner" data-toggle="modal" data-target="#divreasignar">
														Zonificar y validar.
													</a>
												</li>
												
											</ol>
										</div>

									</div>
									<div class="panel panel-primary col-md-4">
										<div class="panel-heading">
											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> IMPRIMIR: <small> Guias</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a >
														
														<form action="'.SERVERURL.'exportaciones/printguia.php" method="POST" data-form="" id="printimpo'.$ultimaimpo['id'].'" name="printguias" class=""  autocomplete="off" enctype="multipart/form-data" target="_blank">


															<input type="hidden" id="impodesde'.$ultimaimpo['id'].'" name="impodesde" value="'.$ultimaimpo['id'].'">
															<input type="hidden" id="impohasta'.$ultimaimpo['id'].'" name="impohasta" value="'.$ultimaimpo['id'].'">
															<button type="submit" class="btn btn-info btn-raised btn-xs tip" title="Imprimir">Imprimir ultima importación   .<i class="zmdi zmdi-print"></i></button>

														</form>
															
													</a>
												</li>
												<li>
													<a data-toggle="modal" data-target="#divprintimpo">
														Imprimir varias importaciones
													</a>
												</li>
												<li>
													<a data-toggle="modal" data-target="#divprintguias">
														Imprimir varias guias
													</a>
												</li>
											</ol>
										</div>

									</div>
									<div class="panel panel-success col-md-4">
										<div class="panel-heading">



											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> IMPRIMIR: <small> Guias</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a >
														Imprimir guias
													</a>
												</li>
												
											</ol>
										</div>

									</div>
									<div class="panel panel-primary col-md-4">
										<div class="panel-heading">
											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> IMAGENES: <small> Guias totales o por mensjeros</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a >
														Ver soportes de guias
													</a>
												</li>
												
											</ol>
										</div>

									</div>
									<div class="panel panel-success col-md-4">
										<div class="panel-heading">
											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> FACTURAR: <small> Guias</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a >
														Importar guias masivamente
													</a>
												</li>
												
											</ol>
										</div>

									</div>
									<div class="panel panel-primary col-md-4">
										<div class="panel-heading">
											<i class="zmdi zmdi-settings zmdi-hc-spin zmdi-hc-fw"></i> PAGO: <small> Quincena mensajeros</small>
										</div>
										<div class="panel-body">
											<ol>
												<li>
													<a >
														Importar guias masivamente
													</a>
												</li>
												
											</ol>
										</div>

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
		//iniciar importaciones
		$formularios.='
				
				<div class="modal fade" id="divimponewsguia" tabindex="10001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Importar Base de datos para crear guias</div>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="alert alert-dismissible alert-primary text-center">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
										<h4>¡Alerta!</h4>
										<p>El archivo a importar debe tener maximo 2000 filas de lo contrario no se importaran los datos de la fila 2001 en adelante</p>
									</div>
									<div class="col-md-12">
										<ol>
											<li>
												<a href="../ZUI0aFRtaEdFT0xyNUZ4NUJSZU9kbU81ZElaRSttZnh4cVpxV05HWno1az0=?id=K0hTdHZWQk9ROXVlTXBRdVlHR1RETk5qQzFpVktFLzlpMFdjdjB2bXBCMD0=">
													Descargar archivo base de importación.
												</a>
											</li>
										</ol>
									</div>
									<div class="col-md-12">
										<form action="'.SERVERURL.'ajax/guiaAjax.php" method="POST" data-form="" id="regnewsguias" name="regnewsguias" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
											<fieldset>
												<div class="container-fluid">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group label-floating">
																<!--<span class="control-label">Archivo</span>-->
																<label class="control-label">Elija el archivo de excel con la base de datos...</label>
																<input type="file" id="fileexcel-reg" name="fileexcel-reg" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
																<div class="input-group">
																	<input type="text" readonly="" class="form-control" name="excelfile-reg" placeholder="">
																	<span class="input-group-btn input-group-sm">
																		<button type="button" class="btn btn-fab btn-fab-mini">
																			<i class="zmdi zmdi-attachment-alt"></i>
																		</button>
																	</span>
																</div>
																<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos excel: 2007 + (xlsx)</small></span>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<p class="text-center" style="margin-top: 20px;">
												<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> IMPORTAR</button>
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
		
		//iniciar actualizaciones masivamente novedad, nueva direccion, agente, zona, tarifa de validación
		$formularios.='
				
				<div class="modal fade" id="divimpoupsguia" tabindex="10001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Actualizar Base de datos de guias</div>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="alert alert-dismissible alert-primary text-center">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
										<h4>¡Alerta!</h4>
										<p>El archivo a importar debe tener maximo 2000 filas de lo contrario no se importaran los datos de la fila 2001 en adelante</p>
									</div>
									<div class="panel panel-primary col-md-12">
										<form action="'.SERVERURL.'exportaciones/exportacionguiaup.php" method="POST" data-form="" id="downloadguias" name="downloadguias" class=""  autocomplete="off" enctype="multipart/form-data" target="_blank">
											<fieldset>
												<div class="container-fluid">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Novedad a excluir *</label>
																<select id="novedad-load" name="novedad-load" class="form-control" placeholder="Novedad *" >
																	'.$novedades.'
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group ">
																<label class="control-label">fecha desde </label>
																<input type="date" name="fechadesde-load" id="fechadesde-load" class="form-control" min="2019-01-01" max="2999-12-31" required="">

															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group ">
																<label class="control-label">fecha hasta </label>
																<input type="date" name="fechahasta-load" id="fechahasta-load" class="form-control" min="2019-01-01" max="2999-12-31" required="">

															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<p class="text-center" style="margin-top: 20px;">
												<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-download"></i> DESCARGAR</button>
											</p>

											<div class="RespuestaAjax"></div>
										</form>
									</div>
									<div class="panel panel-primary col-md-12">
										<form action="'.SERVERURL.'ajax/guiaAjax.php" method="POST" data-form="update" id="regupsguias" name="regupsguias" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
											<fieldset>
												<div class="container-fluid">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group label-floating">
																<!--<span class="control-label">Archivo</span>-->
																<label class="control-label">Elija el archivo de excel con la base de datos para actualizar...</label>
																<input type="file" id="fileexcel-up" name="fileexcel-up" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
																<div class="input-group">
																	<input type="text" readonly="" class="form-control" name="excelfile-up" placeholder="">
																	<span class="input-group-btn input-group-sm">
																		<button type="button" class="btn btn-fab btn-fab-mini">
																			<i class="zmdi zmdi-attachment-alt"></i>
																		</button>
																	</span>
																</div>
																<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos excel: 2007 + (xlsx)</small></span>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<p class="text-center" style="margin-top: 20px;">
												<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> ACTUALIZAR</button>
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
		
		//iEXPORTAR CARGUE DE GUIAS Y CARGAR IMAGENES MASIVAMENTE
		$formularios.='
				
				<div class="modal fade" id="divloadimg" tabindex="10001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Cargar múltiples archivos</div>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="alert alert-dismissible alert-primary text-center">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
										<h4>¡Alerta!</h4>
										<p>Para tener un cargue de imagenes exitoso por favor no cargue mas de 200 imagenes al tiempo</p>
									</div>
									<div class="panel panel-primary col-md-12">
										<form action="'.SERVERURL.'exportaciones/exportacionguialoadimg.php" method="POST" data-form="" id="downloadguiaimg" name="downloadguiaimg" class=""  autocomplete="off" enctype="multipart/form-data" target="_blank">
											<fieldset>
												<div class="container-fluid">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group ">
																<label class="control-label">Agente </label>
																<select id="agenteimg-load" name="agenteimg-load" class="form-control">
																	'.$agente.'
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label class="control-label">fecha cargue desde </label>
																<input type="date" name="fechacarguedesde-load" id="fechacarguedesde-load" class="form-control" min="2019-01-01" max="2999-12-31" value="'.date("Y-m-d").'" required="">

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label class="control-label">fecha cargue hasta </label>
																<input type="date" name="fechacarguehasta-load" id="fechacarguehasta-load" class="form-control" min="2019-01-01" max="2999-12-31" value="'.date("Y-m-d").'" required="">

															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label class="control-label">Guia Desde</label>
																<input class="form-control" type="number" id="guiadesde-load" name="guiadesde-load" maxlength="5000" value="1" required="">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group ">
																<label class="control-label">Guia Hasta</label>
																<input class="form-control" type="number" id="guiahasta-load" name="guiahasta-load" maxlength="5000" value="10000000" required="">
															</div>
														</div>
														<div class="col-md-12">
															<label>
																<input type="checkbox" id="checkidinicial-load" name="checkidinicial-load" value="SI">
																Descargar con consecutivos iniciales
															</label>
														</div>
													</div>
												</div>
											</fieldset>
											<p class="text-center" style="margin-top: 20px;">
												<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-download"></i> DESCARGAR</button>
											</p>

											<div class="RespuestaAjax"></div>
										</form>
									</div>
									<div class="panel panel-primary col-md-12">
										<form action="'.SERVERURL.'ajax/guiaAjax.php" method="POST" data-form="update" id="Uploadimg" name="Uploadimg" class="FormularioGuia" autocomplete="off" enctype="multipart/form-data">
											<fieldset>
												<div class="container-fluid">
													<div class="row">
														<h4 class="text-center">Cargar Múltiple de guias</h4>
														<div class="col-md-12">
															<div class="form-group label-floating">
																<!--<span class="control-label">Archivo</span>-->
																<label class="control-label">Elija las imagenes de guias a cargar</label>
																<input type="file" id="miarchivo-up" name="miarchivo-up[]" multiple="" accept="image/*" >
																<label id="Totalload-up"></label>
																<div class="input-group">
																	<input type="text" readonly="" class="form-control" id="Uploadimg-up" name="Uploadimg-up" placeholder="">
																	<span class="input-group-btn input-group-sm">
																		<button type="button" class="btn btn-fab btn-fab-mini">
																			<i class="zmdi zmdi-attachment-alt"></i>
																		</button>
																	</span>
																</div>
																<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
											<p class="text-center" style="margin-top: 20px;">
												<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> SUBIR IMAGENES</button>
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
		
		//formulario para reasignar guias

		$formularios.='
				<style>
					#preview2{
					
						width: 40% !important;
						transform:scaleX(1) !important;
						/*transform: scale(1.5) !important;*/
						border: 4px solid !important;
						
						height: 300px !important;
					}
					@media (max-width:1020px){
						#preview2{
					
							width: 200px !important;
							height: 200px !important;
							transform:scaleX(1) !important;
							/*transform: scale(1.5) !important;*/
							border: 4px solid !important;
							
							
						}
					
					}
				
				</style>
				<div class="modal fade" id="divreasignar" tabindex="1001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Zonificar y validar</div>
							</div>
							<div class="modal-body">
								
								<div id="divscanerreasignar" class="row">
									<div class="col-md-12">
										<input type="hidden" id="Alertescanerreasignar" value="N">
										<center>
											<video id="preview2" controls="controls">
												
											</video>
										</center>
									</div>
									
									<div class="col-md-6 col-xs-6">
										
											<label class="control-label">guia leida </label>
											<input class="form-control" type="text" id="reasignarguia-up" name="reasignarguia-up" maxlength="5000">
										
									</div>
									<div class="col-md-6 col-xs-6">
										
											<p class="text-center" style="margin-top: 20px;">
												<button id="reasignarguia" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> REGISTRAR GUIA</button>
											</p>
										
									</div>
									
									<div class="RespuestaAjax"></div>
								</div>
								
								<div class="panel panel-info">
									<div>
										<button id="editardatareasignar" type="button" class="close" title="Datos reasignación" ><i class="zmdi zmdi-edit zmdi-hc-2x"></i></button>
										<button id="openscanerreasignar" type="button" class="close" title="Escanear" ><i class="zmdi zmdi-memory zmdi-hc-2x"></i></button>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS REASIGNACION</h3>
										<p id="detallesR"></p>
									</div>
								</div>
								<div id="closepanelreasignacion" class="panel-body row">
									<div id"planillas" class="panel panel-success panel-body">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="zmdi zmdi-view-list-alt"></i> &nbsp; PLANILLAS ABIERTAS</h3>
										</div>
										<div id="listaplanilla">
			
										</div>
									</div>
									<div id"newplanilla" class="panel panel-success panel-body">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="zmdi zmdi-view-list-alt"></i> &nbsp; NUEVA PLANILLA <input type="number" id="numeroplanilla" name="numeroplanilla" maxlength="5000"></h3>
										</div>
										<div class="col-md-6 col-xs-6">
											<label class="control-label">Agente *</label>
											<select id="agentereasignar-up" name="agente-up" class="form-control" >
												'.$agente.'
											</select>
										</div>
										<div class="col-md-6 col-xs-6">
											<label class="control-label">Zona *</label>
											<select id="zonareasignar-up" name="zona-up" class="form-control" >				
												'.$zonas.'	
											</select>
										</div>
										<div class="col-md-5 col-xs-5">
											<label class="control-label">F. Planilla </label>
											<input type="date" name="fechaplanilla" id="fechaplanilla" class="form-control" min="2019-01-01" max="2999-12-31" required="">
										</div>
										<div class="col-md-5 col-xs-5">
											<label class="control-label">F. max cierre </label>
											<input type="date" name="fechamaxcierre" id="fechamaxcierre" class="form-control" min="2019-01-01" max="2999-12-31" required="">
										</div>
										<div class="col-md-12 col-xs-12">
											<p class="text-center" style="margin-top: 20px;">
												<button id="crearplanilla" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> CREAR</button>
											</p>
										</div>
									</div>
										
										
										<div class="col-md-6 col-xs-6">
												<label class="control-label">Novedad *</label>
												<select id="novedadreasignar-up" name="novedad-up" class="form-control" placeholder="Novedad *" >
													'.$novedadesadmin.'
												</select>
											
										</div>
										<div class="col-md-6 col-xs-6">
												<label class="control-label">Nueva dirección </label>
												<input class="form-control" type="text" id="Ndireccionreasignar-up" name="Ndireccion-up" maxlength="5000">
											
										</div>
										<div class="col-md-12 col-xs-12">
												<p class="text-center" style="margin-top: 20px;">
													<button id="reasignarguia1" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> REGISTRAR GUIA</button>
												</p>
										</div>
									
								</div>
								<div id"resumentcargue" class="panel panel-success panel-body">
									<div class="panel-heading">
										<h3 id="titleresumen" class="panel-title"><i class="zmdi zmdi-view-list-alt"></i> &nbsp; </h3>
									</div>
									<div id="listaresumen">
			
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

		//imprimir importaciones
		$formularios.='
				
				<div class="modal fade" id="divprintimpo" tabindex="10001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lx" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Imprimir importaciones</div>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="panel panel-primary col-md-12">
										<form action="'.SERVERURL.'exportaciones/printguia.php" method="POST" data-form="" id="printimpo1'.$ultimaimpo['id'].'" name="printguias1" class=""  autocomplete="off" enctype="multipart/form-data" target="_blank">
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Imp Desde *</label>
													<input class="form-control" type="number" id="impodesde2" name="impodesde" value="1" min="1" required="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Imp Hasta *</label>
													<input class="form-control" type="number" id="impohasta2" name="impohasta" value="'.$ultimaimpo['id'].'" max="'.$ultimaimpo['id'].'" required="">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<p class="text-center" style="margin-top: 20px;">
														<button type="submit" class="btn btn-info btn-raised btn-xs tip" title="Imprimir">IMPRIMIR   .<i class="zmdi zmdi-print"></i></button>
													</p>
												</div>
											</div>
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
			
		//imprimir guias
		$formularios.='
				
				<div class="modal fade" id="divprintguias" tabindex="10001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lx" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">Imprimir importaciones</div>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="panel panel-primary col-md-12">
										<form action="'.SERVERURL.'exportaciones/printguia.php" method="POST" data-form="" id="printguia1'.$ultimaguia['id'].'" name="printgui1" class=""  autocomplete="off" enctype="multipart/form-data" target="_blank">
											<div class="col-md-12">
													<div class="form-group label-floating">
														<label class="control-label">Tipo de servicio *</label>
														<select id="codigo" name="codigo" class="form-control" >
															'.$servicios.'
														</select>
													</div>
												</div>
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Imp Desde *</label>
													<input class="form-control" type="number" id="guiadesde2" name="guiadesde" min="1" required="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Imp Hasta *</label>
													<input class="form-control" type="number" id="guiahasta2" name="guiahasta" value="'.$ultimaguia['id'].'" max="'.$ultimaguia['id'].'" required="">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<p class="text-center" style="margin-top: 20px;">
														<button type="submit" class="btn btn-info btn-raised btn-xs tip" title="Imprimir">IMPRIMIR   .<i class="zmdi zmdi-print"></i></button>
													</p>
												</div>
											</div>
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
		
		//imprimir guias
		$formularios.='
				
				<div class="modal fade" id="divversoporte" tabindex="10001" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" id="mdialTamanio">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" title="Cerrar" aria-hidden="true">&times;</button>
								<div class="panel-heading">soporte de guia</div>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="panel panel-primary col-md-12">
										<div class="col-md-12">
											<div id="detallesoporte" class="form-group">

											</div>
										</div>
										
										<div class="col-md-12 pre-scrollable">
											<div class="form-group">
												<img src="" id="visualizarimg" width="700" height="500" class="disable" alt=""/>
											</div>
										</div>
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
			
		echo  utf8_encode($formularios);
		
		}
					
	//controlador para agregar cliente
	public function agregar_guia_controlador(){
		$avisoError ="OK";
		$remitentenocorpo =mainModel::limpiar_cadena($_POST['idnocorporativo']); 
		$remitente=mainModel::limpiar_cadena($_POST['remitente-reg']);
		$tiposervicio=mainModel::limpiar_cadena($_POST['tiposervicio-reg']);
		$radicado=mainModel::limpiar_cadena($_POST['radicado-reg']);
		$area=mainModel::limpiar_cadena($_POST['area-reg']);
		$destinatario=mainModel::limpiar_cadena($_POST['destinatario-reg']);
		$email=mainModel::limpiar_cadena($_POST['email-reg']);
		$municipio=mainModel::limpiar_cadena($_POST['municipio-reg']);
		$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
		$referente=mainModel::limpiar_cadena($_POST['referente-reg']);
		$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
		$cataporte=mainModel::limpiar_cadena($_POST['cataporte-reg']);
		$volumen=mainModel::limpiar_cadena($_POST['volumen-reg']);
		$fecharecogida=mainModel::limpiar_cadena($_POST['fecharecogida-reg']);
		$fechafactura=mainModel::limpiar_cadena($_POST['fechafactura-reg']);
		$agente=mainModel::limpiar_cadena($_POST['agente-reg']);
		$zona=mainModel::limpiar_cadena($_POST['zona-reg']);
		$tarifa=mainModel::limpiar_cadena($_POST['tarifa-reg']);
		$Ndireccion=mainModel::limpiar_cadena($_POST['Ndireccion-reg']);
		$fechaasignado=mainModel::limpiar_cadena($_POST['fechaasignado-reg']);
		$observaciones = mainModel::limpiar_cadena($_POST['observaciones-reg']);
		$bonificacion=mainModel::limpiar_cadena($_POST['bonificacion-reg']);
		
		$novedad = "ASIGNADO A ZONA";
		if($bonificacion == ""){
			$bonificacion = 0;
		}
		
		if($remitentenocorpo != ""){
			$remitente = $remitentenocorpo;
		}
		
		if($remitente != ""){
				
			if($tiposervicio != ""){
				
				if($destinatario != ""){
					
					if($direccion != "" && $municipio != ""){
						$Fechaactual = date("Y-m-d");
						$adddias = 10;
						$fechamaxima = strtotime('+'.$adddias.' day',strtotime ($Fechaactual));
						$fechamaxima = date('Y-m-d',$fechamaxima);

						if($fecharecogida >= $Fechaactual && $fecharecogida <= $fechamaxima){
						
							//consulto los datos del cliente en cuestion
							$Datoscliente = mainModel::ejecutar_consulta_simple("SELECT ClienteDNI,ClienteNombre,ClienteDireccion,ClienteCiudad,ClienteTelefono,ClienteTarifa,ClienteValor FROM cliente WHERE id ='$remitente'");
							$Dcliente = $Datoscliente->fetch();
							if($Datoscliente->rowCount()>=1){

								$idcataporte = $Dcliente['ClienteValor'];
								//consulto los cataporte y volumen adicional 
								$Datoscataporte = mainModel::ejecutar_consulta_simple("SELECT ValorCataporte,ValorVAdicional FROM ValorCataVolumen WHERE ValorCliente ='$idcataporte'");
								$Dcataporte = $Datoscataporte->fetch();
								if($Datoscataporte->rowCount()>=1){

									$aviso = "NO";
									if($Ndireccion != ""){
										$Consultaexitosa = "NO";

										$Tarifacliente = $Dcliente['ClienteTarifa'];
										//consulto valor de la tarifa para el cliente 
										$DatosVtarifaV = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '2'");
										$DVtarifaV = $DatosVtarifaV->fetch();
										if($DatosVtarifaV->rowCount()>=1){
											$aviso = "OK";
											$Consultaexitosa = "OK";

											$validacion = "OK";
											$facturadovalidacion = "SIN FACTURAR";
											$estadovalidacion = "NO";
											$fechareasignacion = date("Y-m-d");
											$idtarifavalidacion = 2;
										}
									}
									if(($Ndireccion != "" && $Consultaexitosa == "OK") || $Ndireccion == ""){

										if($tarifa == ""){
											//consulto la tarifa a asignar segun el tipo de servicio 
											$Datostarifa = mainModel::ejecutar_consulta_simple("SELECT ServicioIdTarifa FROM servicios WHERE ServicioCodigo ='$tiposervicio'");
											$Dtarifa = $Datostarifa->fetch();
											if($Datostarifa->rowCount()>=1){	
												$tarifa = $Dtarifa['ServicioIdTarifa'];
											}
										}
										if($tarifa != ""){ 
											$Tarifacliente = $Dcliente['ClienteTarifa'];
											//consulto valor de la tarifa a aplicar
											$DatosVtarifa = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '$tarifa'");
											$DVtarifa = $DatosVtarifa->fetch();
											if($DatosVtarifa->rowCount()>=1){	

												if($volumen == "" || $volumen == 0){$volumen = 1;}
												//asino valores de cataportes, volumen adicional , valor tarifa, valor reasignacion
												$valorcataporte = $Dcataporte['ValorCataporte'];
												$valorVAdicional = $Dcataporte['ValorVAdicional'];
												$valortarifa = $DVtarifa['TarifaCValor'];
												$codigoTarifa = $DVtarifa['TarifaCCodFacturacion'];
												$valortarifaV = $DVtarifaV['TarifaCValor'];
												$codigoTarifaV = $DVtarifaV['TarifaCCodFacturacion'];

												//totaliza guia
												$volumenadd = $volumen - 1;
												if($volumenadd == ""){$volumenadd = 0;}
												$totalcataporte = $valorcataporte * $cataporte;
												$totalVadicional =  $valorVAdicional * $volumenadd;
												if($totalVadicional == ""){$totalVadicional = 0;}
												$valortotalguia = $totalcataporte + $totalVadicional + $valortarifa;
												$valortotalsincataporte = $totalVadicional + $valortarifa;

												// asigna a variables datos del remitente
												$nit = $Dcliente['ClienteDNI'];
												$Nombreremitente = $Dcliente['ClienteNombre'];
												$dremitente = $Dcliente['ClienteDireccion'];
												$telefonoremitente = $Dcliente['ClienteTelefono'];
												$ciudadremitente =  $Dcliente['ClienteCiudad'];

												//determino variables que pueden ser auntomaticas o manuales segun sea el caso
												if($fechafactura == ""){$fechafactura = $fecharecogida;}
												if($fechaasignado == ""){$fechaasignado = $fecharecogida;}
												$mesfactura  =substr($fechafactura,-10,4).substr($fechafactura,-5,2);
												$fechatrabajo = date("Ymd");
												$mestrabajo = date("Ym");
												$idusuario = 1;



												//CUANDO SE TENGAN LOS PRIVILEGIOS SE DEBE CAMBIAR ESTA PARTE Y ELIMINAR LA DE ABAJO
												if($_SESSION['Pri_bonificacion']  == 1)
												{
													if($bonificacion != "" && $bonificacion > 0)
													{
														$cargarbonificacion = "OK";
													}
													else
													{
														$cargarbonificacion = "NO";
														$bonificacion = 0;
													}

												}
												
												

												if($cataporte > 0)
												{
													$novedadcataporte = "SIN FACTURAR";
													$estadocataporte = "NO";
												}else{
													$novedadcataporte = "NA";
													$estadocataporte = "NA";
													$cataporte  = 0;
												}

												$consulta7=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia");
												$numero=($consulta7->rowCount())+1;

												$codigoMovGuia=mainModel::generar_codigo_aleatorio("MG",7,$numero);

												$DatoREG=[
													"Remitente"=>$remitente,
													"Nit"=>$nit,
													"Nombreremitente"=>$Nombreremitente,
													"Dremitente"=>$dremitente,
													"Telefonoremitente"=>$telefonoremitente,
													"CiudadRemitente"=>$ciudadremitente,
													"Tiposervicio"=>$tiposervicio,
													"Radicado"=>$radicado,
													"Area"=>$area,
													"Destinatario"=>$destinatario,
													"Email"=>$email,
													"Municipio"=>$municipio,
													"Direccion"=>$direccion,
													"Referente"=>$referente,
													"Telefono"=>$telefono,
													"Cataporte"=>$cataporte,
													"Volumen"=>$volumen,
													"Volumenadd"=>$valorVAdicional,
													"Fecharecogida"=>$fecharecogida,
													"Fechafactura"=>$fechafactura,
													"Novedad"=>$novedad,
													"Agente"=>$agente,
													"Zona"=>$zona,
													"Tarifa"=>$tarifa,
													"Ndireccion"=>$Ndireccion,
													"Fechaasignado"=>$fechaasignado,
													"Valorcataporte"=>$valorcataporte,
													"Totalcataporte"=>$totalcataporte,
													"TotalVadicional"=>$totalVadicional,
													"Valortarifa"=>$valortarifa,
													"CodigoTarifa"=>$codigoTarifa,
													"Valortotalsincataporte"=>$valortotalsincataporte,
													"Valortotalguia"=>$valortotalguia,
													"Bonificacion"=>$bonificacion,
													"Cargarbonificacion"=>$cargarbonificacion,
													"Fechatrabajo"=>$fechatrabajo,
													"Mestrabajo"=>$mestrabajo,
													"Mesfactura"=>$mesfactura,
													"Novedadcataporte"=>$novedadcataporte,
													"Estadocataporte"=>$estadocataporte,
													"Idusuario"=>$idusuario,
													"Validacion"=>$validacion,
													"Facturadovalidacion"=>$facturadovalidacion,
													"Estadovalidacion"=>$estadovalidacion,
													"Fechareasignacion"=>$fechareasignacion,
													"ValortarifaV"=>$valortarifaV,
													"CodigoTarifaV"=>$codigoTarifaV,
													"Idtarifavalidacion"=>$idtarifavalidacion,
													"Observaciones"=>$observaciones,
													"IdImpo"=>0,
													"CodigoMovGuia"=>$codigoMovGuia

												];
												
												$guardarguia = guiaModelo::agregar_guia_modelo($DatoREG,$aviso);
												if($guardarguia->rowCount()>=1){
													$idImprimir=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia WHERE MovCodigoGuia ='$codigoMovGuia'");
													$imprimir=$idImprimir->fetch();

													$guiaimpresion = $imprimir['id'];
													$avisoError ="NO";
													
													$alerta=[
														"Alerta"=>"simple",
														"Titulo"=>"Registro exitoso",
														"Texto"=>"La guia fue registrada correctamente en el sistema",
														"Tipo"=>"success"

													];
												}else{
													$alerta=[
														"Alerta"=>"simple",
														"Titulo"=>"Ocurrio un error inesperado",
														"Texto"=>"No se pudo registrar la guia en el sistema, por favor intente nuevamente.",
														"Tipo"=>"error"

													];
												}
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No fue posible saber el valor de la tarifa a aplicar en este servicio.",
													"Tipo"=>"error"

												];
											}

										}else{
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"No fue posible saber cual es la tarifa a aplicar en este servicio.",
												"Tipo"=>"error"

											];
										}
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No fue posible saber cual es el valor de la taria para reasignasion con nueva dirección.",
											"Tipo"=>"error"

										];
									}
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No fue posible obtener valor de cataporte y volumen adicional.",
										"Tipo"=>"error"

									];	
								}
							}else{
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No fue posible obtener los datos basicos del remitente.",
									"Tipo"=>"error"

								];	
							}
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"La fecha de recogida es inferior a la fecha actual o es superior a ".$adddias." dias de la fecha actual, por favor verifiquela he intente nuevamente",
								"Tipo"=>"error"

							];	
						}		
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No a selectionado la dirección de destino, por favor seleccionelo he intente nuevamente",
							"Tipo"=>"error"

						];	
					}		
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No a selectionado el destinatario, por favor seleccionelo he intente nuevamente",
						"Tipo"=>"error"

					];	
				}				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No a seleccionado el tipo de servicio, por favor seleccionelo he intente nuevamente",
					"Tipo"=>"error"

				];
			}
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No a seleccionado el remitente, por favor seleccionelo he intente nuevamente",
				"Tipo"=>"error"

			];
		}
		$campos['error'] =  $avisoError;
		$campos['idimprision'] =$guiaimpresion;
		$campos['alerta'] = mainModel::sweet_alert($alerta);
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
		
	}
	// CARGAR MENSAJEROS
	public function mensajero_select_guia_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectmensajero = guiaModelo::mensajero_select_guia_modelo($tipo,$codigo);
		$datos= $selectmensajero->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['id'].'">'.$rows["CuentaNombre"]." ".$rows["CuentaApellido"]. '</option>';
									
		}
		
		return $grupoP;
	}
	// CARGAR NOVEDADES
	public function novedad_select_guia_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectnovedad = guiaModelo::novedad_select_guia_modelo($tipo,$codigo);
		$datos= $selectnovedad->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['NovedadDetalle'].'">'.$rows["NovedadDetalle"].'</option>';
									
		}
		
		return $grupoP;
	}
	
	// CARGAR ZONA
	public function zona_select_guia_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectnovedad = guiaModelo::zona_select_guia_modelo($tipo,$codigo);
		$datos= $selectnovedad->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['ZonaNombre'].'">'.$rows["ZonaNombre"].'</option>';
									
		}
		
		return $grupoP;
	}
	
	// CARGAR SERVICOS
	public function servicios_select_guia_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectnovedad = guiaModelo::servicios_select_guia_modelo($tipo,$codigo);
		$datos= $selectnovedad->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['ServicioCodigo'].'">'.$rows["ServicioNombre"].'</option>';
									
		}
		
		return $grupoP;
	}
	
	// CARGAR CLIENTES
	public function cliente_select_guia_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectcliente = guiaModelo::cliente_select_guia_modelo($tipo,$codigo);
		$datos= $selectcliente->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['id'].'">'.$rows["ClienteNombre"].'</option>';
									
		}
		
		return $grupoP;
	}
	
	// CARGAR TARIFAS
	public function tarifa_select_guia_controlador($tipo,$codigo){
		$tipo=mainModel::limpiar_cadena($tipo);
		$codigo=mainModel::limpiar_cadena($codigo);
		
		
		$selectcliente = guiaModelo::tarifa_select_guia_modelo($tipo,$codigo);
		$datos= $selectcliente->fetchAll();
		
		$grupoP = '';
		$grupoP.= '<option value=""></option>';
		foreach($datos as $rows){
			$grupoP.= '<option value="'.$rows['id'].'">'.$rows["TarifaNombre"].'</option>';
									
		}
		
		return $grupoP;
	}
	
	//CONTROLADOR PAGINADOR LISTADO DE GUIAS
	public function paginador_guia_controlador($pagina,$registros,$privilegio,$datosfiltro,$busqueda,$estado){
		$pagina=mainModel::limpiar_cadena($pagina);
		$registros=mainModel::limpiar_cadena($registros);	
		$privilegio=mainModel::limpiar_cadena($privilegio);	
		$busqueda=mainModel::limpiar_cadena($busqueda);	
		$estado=mainModel::limpiar_cadena($estado);	
		
		$agente = mainModel::limpiar_cadena($datosfiltro['Agente']);
		$novedad = mainModel::limpiar_cadena($datosfiltro['Novedad']);
		$zona = mainModel::limpiar_cadena($datosfiltro['Zona']);
		$tipofilro = mainModel::limpiar_cadena($datosfiltro['Tipofiltro']);
		$servicio = mainModel::limpiar_cadena($datosfiltro['Servicio']);
		$Finicio = mainModel::limpiar_cadena($datosfiltro['Fechainicio']);
		$FFin = mainModel::limpiar_cadena($datosfiltro['Fechafin']);
		$busqueda1 = mainModel::limpiar_cadena($datosfiltro['Busquedad1']);
		
		$agente1 = "";
		$ordenar = "id";
		if($agente != ""){
			$agente1 = "MovGuiaAgente = '".$agente."' AND";
		}
		$tabla="";
		
		if($Finicio == ""){$Finicio = "1900-01-01"; }
		if($FFin == ""){$FFin = "2999-12-31"; }

		if($tipofilro == "FRecogida")
		{
			$cadenafechas = " MovGuiaFecha_recogida >= '$Finicio' AND MovGuiaFecha_recogida <= '$FFin' AND";
			$ordenar = "id";
		}
		if($tipofilro == "FAsignado")
		{
			$cadenafechas = " MovGuiaFasignacion >= '$Finicio' AND MovGuiaFasignacion <= '$FFin' AND";
			$ordenar = "MovGuiaFasignacion";
		}
		if($tipofilro == "FMovimiento")
		{
			$cadenafechas = " MovGuiaFentrega >= '$Finicio' AND MovGuiaFentrega <= '$FFin' AND";
			$ordenar = "MovGuiaFentrega";
		}
		
		
		$pagina= (isset($pagina) && $pagina > 0) ? (int) $pagina :1 ;
		$inicio=($pagina>0) ? (($pagina*$registros)-$registros) : 0;

		if(isset($busqueda) && $busqueda!=""){
			$consulta="
			SELECT SQL_CALC_FOUND_ROWS * FROM Mov_guia WHERE $agente1 MovGuiaNovedad LIKE '%$novedad%' AND MovGuiaZona LIKE '%$zona%' AND MovGuiaCodigo LIKE '%$servicio%' AND $cadenafechas (id LIKE '%$busqueda1%' OR MovGuiaGuia  LIKE '%$busqueda1%' OR MovGuiaRadicado  LIKE '%$busqueda1%' OR MovGuiaDestinatario  LIKE '%$busqueda1%' OR MovGuiaDireccion  LIKE '%$busqueda1%' OR MovGuiaMunicipio  LIKE '%$busqueda1%' OR MovGuiaTelefono  LIKE '%$busqueda1%' OR MovGuiaNdireccion  LIKE '%$busqueda1%')  ORDER BY $ordenar ASC LIMIT $inicio,$registros";

			$paginaurl="guialist";
		}else{
			$consulta="
			SELECT SQL_CALC_FOUND_ROWS * FROM Mov_guia WHERE MovGuiaEstatus = '$estado' ORDER BY id ASC LIMIT $inicio,$registros";

			$paginaurl="guialist";
		}

		$conexion =mainModel::conectar();



		$datos = $conexion->query($consulta);
		$datos= $datos->fetchAll();

		$total = $conexion->query("SELECT FOUND_ROWS()");
		$total = (int) $total->fetchColumn();

		$Npaginas = ceil($total/$registros);
		
		session_start(['name'=>'DSA']);
		$tabla.='<div class="table-responsive">
				<table class="table table-hover text-left">
				<thead>
					<tr>
						<th class="text-center">GUIA</th>
						<th class="text-center">AGENTE</th>
						<th class="text-center">ZONA</th>
						<th class="text-center">RADICADO</th>
						<th class="text-center">DESTINATARIO</th>
						<th class="text-center">NOVEDAD</th>';
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
				$Idguia= mainModel::encryption($rows['id']);
				$estado = $rows['MovGuiaEstatus'];
				if(strlen($rows['MovGuiaGuia']) > 1){
					$identidadguia = $rows['MovGuiaGuia'];
				}else{
					$identidadguia = $rows['MovGuiaGuia'].$rows['id'];
				}
				   
				$tabla.='
					
						
						<tr  class="list_guia">
						
							<td>'.$identidadguia.'</td>
							<td>'.$rows['MovGuiaAgente'].'</td>
							<td>'.$rows['MovGuiaZona'].'</td>
							<td>'.$rows['MovGuiaRadicado'].'</td>
							<td>'.$rows['MovGuiaDestinatario'].'
							
							<div class="task-menu">
							
									<form action="'.SERVERURL.'exportaciones/printguia.php" method="POST" data-form="" id="printguias'.$Idguia.'" name="printguias" class=""  autocomplete="off" enctype="multipart/form-data" target="_blank">';
									
									if($_SESSION['Pri_editarGuiaMensajero'] ==1){
										$tabla.='
										<a href="#" id="edit-'.$Idguia.'" class="btn btn-success btn-raised btn-xs tip" title="Editar" data-toggle="modal" data-target="#divupdateguia"><i class="glyphicon glyphicon-edit"></i></a>';	
									}
									if($_SESSION['Pri_editarGuiaAdmin'] ==1){
										$tabla.='
										<a href="#" id="editadmin-'.$Idguia.'" class="btn btn-success btn-raised btn-xs tip" title="Editar" data-toggle="modal" data-target="#divupdateguiaadmin"><i class="glyphicon glyphicon-edit"></i></a>';
									}
									if($estado == "Activo"){
										if($_SESSION['Pri_eliminarGuia'] ==1){
											$tabla.='
											<a href="javascript:void(0)" id="delete-'.$Idguia.'" class="btn btn-danger btn-raised btn-xs tip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>';
										}
									}else{
										if($_SESSION['Pri_activarGuia'] ==1){
											$tabla.='
											<a href="javascript:void(0)" id="active-'.$Idguia.'" class="btn btn-success btn-raised btn-xs tip" title="Re-Activar"><i class="zmdi zmdi-power"></i></a>';
										}
									}
				
									if($_SESSION['Pri_ImprimirGuia'] ==1){
										$tabla.='	
											<input type="hidden" id="guiadesde'.$rows['id'].'" name="guiadesde" value="'.$rows['id'].'">
											<input type="hidden" id="guiahasta'.$rows['id'].'" name="guiahasta" value="'.$rows['id'].'">
											<button type="submit" class="btn btn-info btn-raised btn-xs tip" title="Imprimir"><i class="zmdi zmdi-print"></i></button>';
									}
									$imagen = "sin_imagen.jpg";
									$carpeta = "";
									if($rows['MovGuiaImagen'] != "sin_imagen.jpg"){
										if($_SESSION['Pri_SoporteGuia'] ==1){
											$imagen = mainModel::decryption($rows['MovGuiaImagen']);
											$tabla.='	
											<a href="#" id="view-'.$Idguia.'" class="btn btn-warning btn-raised btn-xs tip" title="Ver soporte" data-toggle="modal" data-target="#divversoporte"><i class="zmdi zmdi-eye"></i></a>
												
											<a href="'.SERVERURL.'exportaciones/exportarsoportes.php?id='.$imagen.'" id="download-'.$Idguia.'" class="btn btn-success	 btn-raised btn-xs tip" title="descargar soporte"><i class="zmdi zmdi-download"></i></a>';
											
											
											
											$nombre_fichero = SERVERFILE."adjuntos/img/".$imagen;

											if (file_exists($nombre_fichero)) {
												$urlimagen = SERVERURL."adjuntos/img/".$imagen;
												$carpeta = "img";
											} else {
												$urlimagen = SERVERURL."adjuntos/imgold/".$imagen;
												$carpeta = "imgold";
											}
										}
									}
									$tabla.='
										
									</form>';
								


								
							$tabla.='
								</div>
							
							
							</td>
							<td>'.$rows['MovGuiaNovedad'].'</td>';
							if($busqueda != ""){
									$tabla.= '<td>'.$rows['MovGuiaEstatus'].'</td>';
								}


							$tipo = mainModel::encryption("Guia");
							$tabla.='

								
						</tr>
						
								
							
					<script>
							
							$("#edit-'.$Idguia.'").click(function(e){
								e.preventDefault();
								
								buscarguiaindividual("'.$Idguia.'","D");

							});
							
							$("#editadmin-'.$Idguia.'").click(function(e){
								e.preventDefault();
								
								
								buscarguiaindividualadmin("'.$Idguia.'","D");

							});
							
							$("#delete-'.$Idguia.'").click(function(e){
								e.preventDefault();
								
								var addmensaje = "Esta accion anulara esta guia";
								var estado = "Anulado";					
								var action = "desactivar_guia";
								var url = "'.SERVERURL.'ajax/guiaAjax.php";
								var tipo = "delete";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$Idguia.'",estado:estado};
								generalesguia(url,tipo,tipoaccion,data,action,addmensaje);
							});
							
							$("#active-'.$Idguia.'").click(function(e){
								e.preventDefault();
								
								var addmensaje = "Esta accion activara esta guia";
								var estado = "Activo";					
								var action = "desactivar_guia";
								var url = "'.SERVERURL.'ajax/guiaAjax.php";
								var tipo = "update";
								var tipoaccion = "POST";
								var data = {action:action,idupdate:"'.$Idguia.'",estado:estado};
								generalesguia(url,tipo,tipoaccion,data,action,addmensaje);

							});
							
							$("#view-'.$Idguia.'").click(function(e){
								e.preventDefault();
								
								$("#detallesoporte").html("Guia: "+"'.$rows['id'].'"+ "<br>"+" Destinatario: "+"'.$rows['MovGuiaDestinatario'].'"+ "<br>"+" Novedad: "+"'.$rows['MovGuiaNovedad'].'");
								$("#visualizarimg").attr("src","'.$urlimagen.'");
								
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
									verguias("1","'.$estado.'");';	
								}
								
					$tabla.='});
						$("#gopag").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.($pagina-1).'","'.$estado.'");';
								}else{
									$tabla.='
									verguias('.($pagina-1).',"'.$estado.'");';	
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

					<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'">'.$i.'</a></li>
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
									verguias("'.$i.'","'.$estado.'");';	
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
									verguias("'.$Npaginas.'","'.$estado.'");';	
								}
								
					$tabla.='});
						$("#nextpag").click(function(e){
								e.preventDefault();';
								if(isset($busqueda) && $busqueda!=""){
									$tabla.='
									buscarguias("'.($pagina+1).'","'.$estado.'");';
								}else{
									$tabla.='
									verguias('.($pagina+1).',"'.$estado.'");';	
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
		
		$arrayData['Tabla'] = utf8_encode($tabla);
		$arrayData['Total'] = $total;
					
		echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
		
		//return $tabla;
	}

	//BUSCA DATOS GUIA UNICA
	public function guiaunica_guia_controlador($idguia,$D){
		session_start(['name'=>'DSA']);
		if($D != ""){
		$idguia = mainModel::decryption($idguia);
		}
		$idguia = mainModel::limpiar_cadena($idguia);
		
		$DatosGuia = guiaModelo::guiaunica_guia_modelo($idguia);
		$campos = $DatosGuia->fetch();
			
		if($DatosGuia->rowCount()>= 1){				
			
			
			
			$fijarNovedad = $_SESSION["fijarnovedad"];
			$novedadfijada = $_SESSION["novedadfija"];
			$fijarfecha = $_SESSION["fijarfecha"];
			$fechafija = $_SESSION["fechafija"];
			$Agentefijo = $_SESSION["agentefijo"];
			$fijaragente = $_SESSION["fijaragente"];

			$caracteristica = [
				"Fijarnovedad"=>$fijarNovedad,
				"Novedafija"=>$novedadfijada,
				"Fijarfecha"=>$fijarfecha,
				"Fechafija"=>$fechafija,
				"Agentefijo"=>$Agentefijo,
				"fijaragente"=> $fijaragente
			];
			$campos= array_merge($campos,$caracteristica);
			
			
		}else{
			//echo 
			$campos = 0;
		}
		
		
				
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
		
		
	}
	
	//ACTUALIZAR POR PARTE DE LOS MENSAJEROS
	public function actualizar_imagen_guia_controlador(){
		session_start(['name'=>'DSA']);
		$aviso = "";
		
		$idguia = mainModel::limpiar_cadena($_POST['id-up']);
		$novedad = mainModel::limpiar_cadena($_POST['novedad-up']);
		$fijarnovedad = mainModel::limpiar_cadena($_POST['checknovedad-up']);
		$fechamovimiento = mainModel::limpiar_cadena($_POST['fechamovimiento-up']);
		$fijarfecha = mainModel::limpiar_cadena($_POST['checkfecha-up']);
		$agente = mainModel::limpiar_cadena($_POST['agente-up']);
		$checkagente = mainModel::limpiar_cadena($_POST['checkagente-up']);
		$detallenovedad = mainModel::limpiar_cadena($_POST['detallenovedad-up']);
		$zona = mainModel::limpiar_cadena($_POST['zona-up']);
		$nuevadireccion = mainModel::limpiar_cadena($_POST['checkzona-up']);
		/*$imagenguia = $_POST['imagenguia-up'];
		$imagenlugar = $_POST['imagenlugar-up'];
		$imagencataporte = $_POST['imagencataporte-up'];*/
		$datosimagguia = $_POST['imgcanvas'];
		$datosimaglugar = $_POST['imgcanvas1'];
		$datosimagcataporte = $_POST['imgcanvas2'];
		$hora = date("H:i:s");
		$fechacargue = date("Y-m-d");
		$pago = 0;
		
		
		if($fijarnovedad == "OK"){
			$_SESSION["fijarnovedad"] = $fijarnovedad;
			$_SESSION["novedadfija"] = $novedad;
		}else{
			$_SESSION["fijarnovedad"] = "";
			$_SESSION["novedadfija"] = "";
		}
		if($fijarfecha == "OK"){
			$_SESSION["fijarfecha"] = $fijarfecha;
			$_SESSION["fechafija"] = $fechamovimiento;
		}else{
			$_SESSION["fijarfecha"] = "";
			$_SESSION["fechafija"] = "";
		}
		
		
		
		if($idguia == ""){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No ha seleccionado la gua a actualizar.",
				"Tipo"=>"error"

			];
		}else{
		
			if($novedad == "ASIGNADO A ZONA"){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No podemos actulizar la guia en novedad ASIGNADO A ZONA, por favor cambiela y vuelvalo a intentar.",
					"Tipo"=>"error"

				];
			}else{
				if($novedad != "ASIGNADO A ZONA"  && $datosimagguia == "" && $datosimaglugar == ""){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No ha cargado ningun registro fotografico, por favor carge la imagen y vuelvalo a intentar.",
						"Tipo"=>"error"

					];
				}else{
					if($novedad == "ENTREGADO"  && $datosimagguia == ""){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"Novedad asignada como entregado pero no se ha cargado el registro fotografico de la guia, por favor carge la imagen y vuelvalo a intentar.",
							"Tipo"=>"error"

						];
					}else{
						if($fechamovimiento == ""){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No ha seleccionado la fecha del registro, seleccionela y vuelva a intentarlo.",
								"Tipo"=>"error"

							];
						}else{

							//consulto los datos del cliente en cuestion
							$Datoscataporte = mainModel::ejecutar_consulta_simple("SELECT * FROM Mov_guia WHERE id ='$idguia'");
							$Dcataporte = $Datoscataporte->fetch();
							if($Datoscataporte->rowCount()>=1){
								$cataporte = $Dcataporte['MovGuiaCataporte'];
							}
							if($novedad == "ENTREGADO" &&  $cataporte > 0 && $datosimagcataporte == ""){
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"Este documento cuenta con cataportes, por favor monte la imagen del cataporte y vuelvalo a intentar.",
									"Tipo"=>"error"

								];
							}else{

								//verifico si la guia es con codigo viejo o nuevo
								if(strlen($Dcataporte['MovGuiaGuia']) > 1){
									$guia = $Dcataporte['MovGuiaGuia'];
								}else{
									$guia = $idguia;
								}

								//cargo al servidor la imagen de la guia
								$Nombreimgguia = '';
								if($datosimagguia != ''){	

									$Nombreimgguia = "soporte_para_guia_".$guia.".jpg";

									$src = SERVERFILE."adjuntos/imgold/".$Nombreimgguia;
									
									$Nombreimgguia = mainModel::encryption($Nombreimgguia);	
									
									//tomo la informacion de la imagen de la guia y la subo al servidor
									/*$base_to_php = explode(',',$datosimagguia);
									$imagenguiafinal = base64_decode($base_to_php[1]);

									$imagenguia = file_put_contents($src,$imagenguiafinal);

									if($imagenguia){
										//si se carga la imagen entonces asigno el nombre en la BD
										$Nombreimgguia = mainModel::encryption($Nombreimgguia);	
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No fue posible cargar la imagen de la guia, por favor vualva a intentarlo.",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();
									}*/

								}else{
									//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
									$Nombreimgguia = $Dcataporte['MovGuiaImagen'];
								}

								//cargo al servidor la imagen del lugar
								$Nombreimglugar = '';
								if($datosimaglugar != ''){	

									$Nombreimglugar = "soporte_para_guia_".$guia."_2.jpg";

									$src = SERVERFILE."adjuntos/img/".$Nombreimglugar;
									
									$Nombreimglugar = mainModel::encryption($Nombreimglugar);	
									
									//tomo la informacion de la imagen del lugar y la subo al servidor
									/*$base_to_php = explode(',',$datosimaglugar);
									$imagenlugarfinal = base64_decode($base_to_php[1]);

									$imagenlugar = file_put_contents($src,$imagenlugarfinal);

									if($imagenlugar){
										//si se carga la imagen entonces asigno el nombre en la BD
										$Nombreimglugar = mainModel::encryption($Nombreimglugar);	
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No fue posible cargar la imagen del lugar, por favor vualva a intentarlo.",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();
									}*/

								}else{
									//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
									$Nombreimglugar = $Dcataporte['MovGuiaImagen2'];
								}

								//cargo al servidor la imagen de los cataportes
								$Nombreimgcataporte = '';
								if($datosimagcataporte != ''){	

									$Nombreimgcataporte = "soporte_cataporte_guia_".$guia.".jpg";

									$src = SERVERFILE."adjuntos/img/".$Nombreimgcataporte;
									
									$Nombreimgcataporte = mainModel::encryption($Nombreimgcataporte);
									
									//tomo la informacion de la imagen del cataporte y la subo al servidor
									/*$base_to_php = explode(',',$datosimagcataporte);
									$imagencataportefinal = base64_decode($base_to_php[1]);

									$imagencataporte = file_put_contents($src,$imagencataportefinal);

									if($imagencataporte){
										//si se carga la imagen entonces asigno el nombre en la BD
										$Nombreimgcataporte = mainModel::encryption($Nombreimgcataporte);	
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No fue posible cargar la imagen del cataporte, por favor vualva a intentarlo.",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();
									}*/

								}else{
									//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
									$Nombreimgcataporte = $Dcataporte['MovGuiaImagen3'];
								}

								//realizo consultas necesarias para liquidar guia en caso de entrega
								if($novedad == "ENTREGADO"){

									//realizo la verificacion de todo el tema de liquidacion a mensajeros
									if($Dcataporte['MovGuiaBonificacionOK'] == "OK"){
										$pago = $Dcataporte['MovGuiaPago'];
									}else{


										if($agente > 0){
											//consulto los datos del agente en cuestion

											$Datosagente = mainModel::ejecutar_consulta_simple("SELECT CuentaRol,CuentaTVinculo,CuentaJerarquia,CuentaTipoPago,CuentaPorcentaje FROM cuenta WHERE id ='$agente'");
											$Dagente = $Datosagente->fetch();
											if($Datosagente->rowCount()>=1){
												$Tvinculo = $Dagente['CuentaTVinculo'];
												$Jerarquia = $Dagente['CuentaJerarquia'];
												$Rolatual = $Dagente['CuentaRol'];
												$Porcentaje = $Dagente['CuentaPorcentaje'];
												$TipoPago = $Dagente['CuentaTipoPago'];
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No fue posible verificar datos para liquidar movimiento a agente seleccionado.",
													"Tipo"=>"error"

												];
												return mainModel::sweet_alert($alerta);
												exit();

											}

										}else{
											$agente = $_SESSION['CuentaId'];
											//consulto los datos del agente logueado

											$Datosagente = mainModel::ejecutar_consulta_simple("SELECT CuentaRol,CuentaTVinculo,CuentaJerarquia,CuentaTipoPago,CuentaPorcentaje FROM cuenta WHERE id ='$agente'");
											$Dagente = $Datosagente->fetch();
											if($Datosagente->rowCount()>=1){
												$Tvinculo = $Dagente['CuentaTVinculo'];
												$Jerarquia = $Dagente['CuentaJerarquia'];
												$Rolatual = $Dagente['CuentaRol'];
												$Porcentaje = $Dagente['CuentaPorcentaje'];
												$TipoPago = $Dagente['CuentaTipoPago'];
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No fue posible verificar datos para liquidar movimiento a agente logueado.",
													"Tipo"=>"error"

												];
												return mainModel::sweet_alert($alerta);
												exit();

											}
										}
										//consulto zona para liquidar pago a mensajero
										if($zona != "")
										{
											$zonapago = $zona;
										}else{
											$zonapago = $Dcataporte['MovGuiaZona'];
										}
										
										//consulto el valor base para costo variable del tipo de servicios
										$servicio = $Dcataporte['MovGuiaCodigo'];
										$Valorbaseservicio = mainModel::ejecutar_consulta_simple("SELECT * FROM servicios WHERE ServicioCodigo ='$servicio'");
										$Vbaseservicio = $Valorbaseservicio->fetch();
										if($Valorbaseservicio->rowCount()>=1){
											
											//defino bases y datos necesarios para liquidar guia al mensajero 
											$basepago = $Vbaseservicio['ServicioCv'];
											$basefija = $Vbaseservicio['ServicioPorcentajefijo'];
											$basevolumenadicional = $Vbaseservicio['ServicioCvAdicional'];
											$volumenadicional = $Dcataporte['MovGuiaVolumen'];
											$volumenadicional = $volumenadicional -1;
											
											//realizo consultas de porcentajes y zona de pago
											//VALOR ZONA
											$Valorzona = mainModel::ejecutar_consulta_simple("SELECT * FROM zona WHERE ZonaNombre ='$zonapago'");
											$Vzona = $Valorzona->fetch();
											if($Valorzona->rowCount()>=1){

												if($TipoPago == "Base"){
													if($basefija > 0){
														$pago = $basepago * ($basefija / 100);
														$pago = $pago  * ((100 + $Porcentaje) / 100);
														$pagoadicional = ($pago * ($basevolumenadicional / 100)) * $volumenadicional;
														$pago = $pago + $pagoadicional;
													}else{
														$pago = $basepago * ($Vzona['ZonaSemana'] / 100);
														$pago = $pago  * ((100 + $Porcentaje) / 100);
														$pagoadicional = ($pago * ($basevolumenadicional / 100)) * $volumenadicional;
														$pago = $pago + $pagoadicional;
													}
												}else{						
													//PORCENTAJE DE VINCULO
													$Porcentajevinculo = mainModel::ejecutar_consulta_simple("SELECT TVinculoPorcentaje FROM TVinculo WHERE id ='$Tvinculo'");
													$Pvinculo = $Porcentajevinculo->fetch();
													if($Porcentajevinculo->rowCount()>=1){
														$Porcentaje = $Porcentaje + $Pvinculo['TVinculoPorcentaje'];

														//PORCENTAJE DE JERARQUIA
														$Porcentajejerarquia = mainModel::ejecutar_consulta_simple("SELECT JerarquiaPorcentaje FROM jerarquia WHERE id ='$Jerarquia'");
														$Pjerarquia = $Porcentajejerarquia->fetch();
														if($Porcentajejerarquia->rowCount()>=1){
															$Porcentaje = $Porcentaje + $Pjerarquia['JerarquiaPorcentaje'];

															//PORCENTAJE DE ROL
															$Porcentajerol = mainModel::ejecutar_consulta_simple("SELECT RolPorcentaje FROM rol WHERE id ='$Rolatual'");
															$Prol = $Porcentajerol->fetch();
															if($Porcentajejerarquia->rowCount()>=1){
																$Porcentaje = $Porcentaje + $Prol['RolPorcentaje'];

																//$pago = $Vzona['ZonaSemana'] * ((100 + $Porcentaje) / 100);
																
																$pago = $basepago * ($Vzona['ZonaSemana'] / 100);
																$pago = $pago  * ((100 + $Porcentaje) / 100);
																$pagoadicional = ($pago * ($basevolumenadicional / 100)) * $volumenadicional;
																$pago = $pago + $pagoadicional;
																
																
															}else{
																$alerta=[
																	"Alerta"=>"simple",
																	"Titulo"=>"Ocurrio un error inesperado",
																	"Texto"=>"No fue posible verificar el porcetaje sobre el rol.",
																	"Tipo"=>"error"

																];
																return mainModel::sweet_alert($alerta);
																exit();

															}		
														}else{
															$alerta=[
																"Alerta"=>"simple",
																"Titulo"=>"Ocurrio un error inesperado",
																"Texto"=>"No fue posible verificar el porcetaje sobre jerarquia.",
																"Tipo"=>"error"

															];
															return mainModel::sweet_alert($alerta);
															exit();

														}		
													}else{
														$alerta=[
															"Alerta"=>"simple",
															"Titulo"=>"Ocurrio un error inesperado",
															"Texto"=>"No fue posible verificar el porcetaje sobre tipo de vinculo.",
															"Tipo"=>"error"

														];
														return mainModel::sweet_alert($alerta);
														exit();

													}	
												}
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No fue posible verificar el valor base de la zona del documento.",
													"Tipo"=>"error"

												];
												return mainModel::sweet_alert($alerta);
												exit();

											}
										}else{
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"No fue posible verificar el valor base del tipo de servicio.",
												"Tipo"=>"error"

											];
											return mainModel::sweet_alert($alerta);
											exit();

										}
									}



								}

								// realizo proceso de reasignacion si s eentrega en nueva direccion
								if($nuevadireccion == "SI"){
									$remitente = $Dcataporte['MovGuiaCodigocliente'];
									//consulto los datos del cliente en cuestion
									$Datoscliente = mainModel::ejecutar_consulta_simple("SELECT ClienteDNI,ClienteNombre,ClienteDireccion,ClienteTarifa,ClienteValor FROM cliente WHERE id ='$remitente'");
									$Dcliente = $Datoscliente->fetch();
									if($Datoscliente->rowCount()>=1){

										$Tarifacliente = $Dcliente['ClienteTarifa'];
										//consulto el valor de la tarifa para reasignar
										$DatosVtarifaV = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '2'");
										$DVtarifaV = $DatosVtarifaV->fetch();
										if($DatosVtarifaV->rowCount()>=1){
											$aviso = "OK";
											$Consultaexitosa = "OK";

											$validacion = "OK";
											$facturadovalidacion = "SIN FACTURAR";
											$estadovalidacion = "NO";
											$fechareasignacion = date("Y-m-d");
											$idtarifavalidacion = 2;

										}else{
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"No fue posible consultar datos de reasignacion relacionados con esta guia.",
												"Tipo"=>"error"

											];
											return mainModel::sweet_alert($alerta);
											exit();

										}
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No fue posible consultar el cliente relacionado con esta guia.",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();

									}
								}

								//almacene variables necesarias
								$valortarifaV = $DVtarifaV['TarifaCValor'];
								$codigoTarifaV = $DVtarifaV['TarifaCCodFacturacion'];


								//creo el array para actualizar guia
								$DatoREG=[
									"Novedad"=>$novedad,
									"DetalleNovedad"=>$detallenovedad,
									"Pago"=>$pago,
									"agente"=>$agente,
									"FechaMovimiento"=>$fechamovimiento,
									"Hora"=>$hora,
									"Validacion"=>$validacion,
									"Facturadovalidacion"=>$facturadovalidacion,
									"Estadovalidacion"=>$estadovalidacion,
									"Fechareasignacion"=>$fechareasignacion,
									"ValortarifaV"=>$valortarifaV,
									"CodigoTarifaV"=>$codigoTarifaV,
									"Idtarifavalidacion"=>$idtarifavalidacion,
									"Zona"=>$zonapago,
									"Fechacargue"=>$fechacargue,
									"Nombreguia"=>$Nombreimgguia,
									"Nombrelugar"=>$Nombreimglugar,
									"NombreCataporte"=>$Nombreimgcataporte,
									"Idguia"=>$idguia

								];

								$actualizarguia = guiaModelo::actualizar_guia_modelo($DatoREG,$aviso);
								if($actualizarguia->rowCount()>=1){

									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Registro exitoso",
										"Texto"=>"La guia ".$idguia." fue actualizada con exito",
										"Tipo"=>"success"

									];
									
									$avisoError ="NO";
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No se pudo actualizar la guia, por favor intente nuevamente.",
										"Tipo"=>"error"

									];
								}
							}
						}
					}
				}
			}
		}
		
		$campos['error'] =  $avisoError;
		$campos['alerta'] = mainModel::sweet_alert($alerta);
		
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
		//return mainModel::sweet_alert($alerta);

	}
	
	//ACTUALIZAR POR PARTE DE LOS ADMINISTRADORES
	public function actualizar_admin_guia_controlador(){
		session_start(['name'=>'DSA']);
		$aviso = "";
		$bonificacion = "NO";
		
		$idguia = mainModel::limpiar_cadena($_POST['idguiaadmin-up']);
		$remitente = mainModel::limpiar_cadena($_POST['remitenteadmin-up']);
		$tiposervicio = mainModel::limpiar_cadena($_POST['tiposervicioadmin-up']);
		$radicado = mainModel::limpiar_cadena($_POST['radicadoadmin-up']);
		$area = mainModel::limpiar_cadena($_POST['areaadmin-up']);
		$destinatario = mainModel::limpiar_cadena($_POST['destinatarioadmin-up']);
		$email = mainModel::limpiar_cadena($_POST['emailadmin-up']);
		$municipio = mainModel::limpiar_cadena($_POST['municipioadmin-up']);
		$direccion = mainModel::limpiar_cadena($_POST['direccionadmin-up']);
		$referente = mainModel::limpiar_cadena($_POST['referenteadmin-up']);
		$telefono = mainModel::limpiar_cadena($_POST['telefonoadmin-up']);
		$cataporte = mainModel::limpiar_cadena($_POST['cataporteadmin-up']);
		$volumen = mainModel::limpiar_cadena($_POST['volumenadmin-up']);
		$fecharecogida = mainModel::limpiar_cadena($_POST['fecharecogidaadminr-up']);
		$fechafactura = mainModel::limpiar_cadena($_POST['fechafacturaadmin-up']);
		$novedad = mainModel::limpiar_cadena($_POST['novedadadmin-up']);
		$fijarnovedad = mainModel::limpiar_cadena($_POST['checknovedadadmin-up']);
		$fechamovimiento = mainModel::limpiar_cadena($_POST['fechamovimientoadmin-up']);
		$fijarfecha = mainModel::limpiar_cadena($_POST['checkfechaadmin-up']);
		$detallenovedad = mainModel::limpiar_cadena($_POST['detallenovedadadmin-up']);
		$agente = mainModel::limpiar_cadena($_POST['agenteadmin-up']);
		$checkagente = mainModel::limpiar_cadena($_POST['checkagenteadmin-up']);
		$zona = mainModel::limpiar_cadena($_POST['zonaadmin-up']);
		$tarifa = mainModel::limpiar_cadena($_POST['tarifaadmin-up']);
		$Ndireccion = mainModel::limpiar_cadena($_POST['Ndireccionadmin-up']);
		$nuevadireccion = mainModel::limpiar_cadena($_POST['checkzonaadmin-up']);
		$fechaasignado = mainModel::limpiar_cadena($_POST['fechaasignadoadmin-up']);
		$pago = mainModel::limpiar_cadena($_POST['bonificacionadmin-up']);
		$darbonidicacion = mainModel::limpiar_cadena($_POST['checkdarbono-up']);
		/*$imagenguia = $_POST['imagenguiaadmin-up'];
		$imagenlugar = $_POST['imagenlugaradmin-up'];
		$imagencataporte = $_POST['imagencataporteadmin-up'];*/
		$datosimagguia = $_POST['imgcanvasadmin'];
		$datosimaglugar = $_POST['imgcanvas1admin'];
		$datosimagcataporte = $_POST['imgcanvas2admin'];
		$hora = date("H:i:s");
		$fechacargue = date("Y-m-d");
		
		
		if($fijarnovedad == "OK"){
			$_SESSION["fijarnovedad"] = $fijarnovedad;
			$_SESSION["novedadfija"] = $novedad;
		}else{
			$_SESSION["fijarnovedad"] = "";
			$_SESSION["novedadfija"] = "";
		}
		if($fijarfecha == "OK"){
			$_SESSION["fijarfecha"] = $fijarfecha;
			$_SESSION["fechafija"] = $fechamovimiento;
		}else{
			$_SESSION["fijarfecha"] = "";
			$_SESSION["fechafija"] = "";
		}
		if($checkagente == "OK"){
			$_SESSION["fijaragente"] = $checkagente;
			$_SESSION["agentefijo"] = $agente;
		}else{
			$_SESSION["fijaragente"] = "";
			$_SESSION["agentefijo"] = "";
		}
		
		
		if($idguia == ""){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No ha seleccionado la gua a actualizar.",
				"Tipo"=>"error"

			];
		
		}else{

			//consulto los datos del cliente en cuestion
			$Datosguia = mainModel::ejecutar_consulta_simple("SELECT * FROM Mov_guia WHERE id ='$idguia'");
			$Dguia = $Datosguia->fetch();
			if($Datosguia->rowCount()>=1){
					
				//verifico si la guia es con codigo viejo o nuevo
				$guianumero = $Dguia['MovGuiaGuia'];
				if(strlen($Dguia['MovGuiaGuia']) > 1){
					$guia = $Dguia['MovGuiaGuia'];
				}else{
					$guia = $idguia;
				}

				//cargo al servidor la imagen de la guia
				$Nombreimgguia = '';
				if($datosimagguia != ''){	

					$Nombreimgguia = "soporte_para_guia_".$guia.".jpg";

					$src = SERVERFILE."adjuntos/imgold/".$Nombreimgguia;
					
					$Nombreimgguia = mainModel::encryption($Nombreimgguia);	
					
					//tomo la informacion de la imagen de la guia y la subo al servidor
					/*$base_to_php = explode(',',$datosimagguia);
					$imagenguiafinal = base64_decode($base_to_php[1]);

					$imagenguia = file_put_contents($src,$imagenguiafinal);

					if($imagenguia){
						//si se carga la imagen entonces asigno el nombre en la BD
						$Nombreimgguia = mainModel::encryption($Nombreimgguia);	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No fue posible cargar la imagen de la guia, por favor vualva a intentarlo.",
							"Tipo"=>"error"

						];
						return mainModel::sweet_alert($alerta);
						exit();
					}*/

				}else{
					//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
					$Nombreimgguia = $Dguia['MovGuiaImagen'];
				}

				//cargo al servidor la imagen del lugar
				$Nombreimglugar = '';
				if($datosimaglugar != ''){	

					$Nombreimglugar = "soporte_para_guia_".$guia."_2.jpg";

					$src = SERVERFILE."adjuntos/img/".$Nombreimglugar;
					
					$Nombreimglugar = mainModel::encryption($Nombreimglugar);

					//tomo la informacion de la imagen del lugar y la subo al servidor
					/*$base_to_php = explode(',',$datosimaglugar);
					$imagenlugarfinal = base64_decode($base_to_php[1]);

					$imagenlugar = file_put_contents($src,$imagenlugarfinal);

					if($imagenlugar){
						//si se carga la imagen entonces asigno el nombre en la BD
						$Nombreimglugar = mainModel::encryption($Nombreimglugar);	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No fue posible cargar la imagen del lugar, por favor vualva a intentarlo.",
							"Tipo"=>"error"

						];
						return mainModel::sweet_alert($alerta);
						exit();
					}*/

				}else{
					//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
					$Nombreimglugar = $Dguia['MovGuiaImagen2'];
				}

				//cargo al servidor la imagen de los cataportes
				$Nombreimgcataporte = '';
				if($datosimagcataporte != ''){	

					$Nombreimgcataporte = "soporte_cataporte_guia_".$guia.".jpg";

					$src = SERVERFILE."adjuntos/img/".$Nombreimgcataporte;
					
					$Nombreimgcataporte = mainModel::encryption($Nombreimgcataporte);

					//tomo la informacion de la imagen del cataporte y la subo al servidor
					/*$base_to_php = explode(',',$datosimagcataporte);
					$imagencataportefinal = base64_decode($base_to_php[1]);

					$imagencataporte = file_put_contents($src,$imagencataportefinal);

					if($imagencataporte){
						//si se carga la imagen entonces asigno el nombre en la BD
						$Nombreimgcataporte = mainModel::encryption($Nombreimgcataporte);	
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No fue posible cargar la imagen del cataporte, por favor vualva a intentarlo.",
							"Tipo"=>"error"

						];
						return mainModel::sweet_alert($alerta);
						exit();
					}*/

				}else{
					//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
					$Nombreimgcataporte = $Dguia['MovGuiaImagen3'];
				}
				//consulto los datos del cliente en cuestion
				$Datoscliente = mainModel::ejecutar_consulta_simple("SELECT ClienteDNI,ClienteNombre,ClienteDireccion,ClienteTarifa,ClienteValor FROM cliente WHERE id ='$remitente'");
				$Dcliente = $Datoscliente->fetch();
				if($Datoscliente->rowCount()>=1){

					$idcataporte = $Dcliente['ClienteValor'];
					//consulto los cataporte y volumen adicional 
					$Datoscataporte = mainModel::ejecutar_consulta_simple("SELECT ValorCataporte,ValorVAdicional FROM ValorCataVolumen WHERE ValorCliente ='$idcataporte'");
					$Dcataporte = $Datoscataporte->fetch();
					if($Datoscataporte->rowCount()>=1){
						if($tarifa == ""){
							//consulto la tarifa a asignar segun el tipo de servicio 
							$Datostarifa = mainModel::ejecutar_consulta_simple("SELECT ServicioIdTarifa FROM servicios WHERE ServicioCodigo ='$tiposervicio'");
							$Dtarifa = $Datostarifa->fetch();
							if($Datostarifa->rowCount()>=1){	
								$tarifa = $Dtarifa['ServicioIdTarifa'];
							}
						}

						if($tarifa != ""){
							$Tarifacliente = $Dcliente['ClienteTarifa'];
							//consulto valor de la tarifa a aplicar
							$DatosVtarifa = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '$tarifa'");
							$DVtarifa = $DatosVtarifa->fetch();
							if($DatosVtarifa->rowCount()>=1){
								if($volumen == "" || $volumen == 0){$volumen = 1;}
								//asino valores de cataportes, volumen adicional , valor tarifa, valor reasignacion
								
								$valorVAdicional = $Dcataporte['ValorVAdicional'];
								

								//totaliza guia
								if($Dguia['MovGuiaNovedad1'] == "SIN FACTURAR"){
									$guiaup = $tiposervicio;
									$valortarifa = $DVtarifa['TarifaCValor'];
									$codigoTarifa = $DVtarifa['TarifaCCodFacturacion'];
									
									$volumenadd = $volumen - 1;
									if($volumenadd == ""){$volumenadd = 0;}
									$totalVadicional =  $valorVAdicional * $volumenadd;
									if($totalVadicional == ""){$totalVadicional = 0;}
									$valortotalguia = $totalcataporte + $totalVadicional + $valortarifa;
									$valortotalsincataporte = $totalVadicional + $valortarifa;
								}else{
									$guiaup = $Dguia['MovGuiaGuia'];
									$tiposervicio = $Dguia['MovGuiaCodigo'];
									$tarifa = $Dguia['MovGuiaIdtarifa'];
									$valortarifa = $Dguia['MovGuiaValortarifa'];
									$codigoTarifa = $Dguia['MovGuiaCodigofacturacion'];
									$totalVadicional =  $Dguia['MovGuiaTotaladicional'];
									$valortotalguia = $Dguia['MovGuiaValortotalguia'];
									$valortotalsincataporte = $Dguia['MovGuiaValortotalguiasincataporte'];
								}
								// asigna a variables datos del remitente
								$nit = $Dcliente['ClienteDNI'];
								$Nombreremitente = $Dcliente['ClienteNombre'];
								$dremitente = $Dcliente['ClienteDireccion'];

								//determino variables que pueden ser auntomaticas o manuales segun sea el caso
								if($fechafactura == ""){$fechafactura = $fecharecogida;}
								if($fechaasignado == ""){$fechaasignado = $fecharecogida;}
								$mesfactura  =substr($fechafactura,-10,4).substr($fechafactura,-5,2);

								if($cataporte > 0 && $Dguia['MovGuiaNovedadcataporte'] != "FACTURADO"){
									$valorcataporte = $Dcataporte['ValorCataporte'];
									$totalcataporte = $valorcataporte * $cataporte;
									$novedadcataporte = "SIN FACTURAR";
									$estadocataporte = "NO";
									
								}else{
									$valorcataporte = $Dguia['MovGuiaValor'];
									$totalcataporte = $Dguia['MovGuiaTotalcataporte'];
									$novedadcataporte = $Dguia['MovGuiaNovedadcataporte'];
									$estadocataporte = $Dguia['MovGuiaEstadocataporte'];
									$cataporte  = $Dguia['MovGuiaCataporte'];
									
								}
								//ASIGNO NUMERO DE QUINCENA A 0
								$quincenaentrega = 0;
								//asigno valor si quiero dar una bonificacion diferente a la que esta en el sistema
								if($darbonidicacion == "SI"){
									$bonificacion = "OK";
								}
								if($Dguia['MovGuiaEstadodepago'] == "OK"){
									$pago = $Dguia['MovGuiaPago'];
									$bonificacion = "SI";
									$quincenaentrega = $Dguia['MovGuiaQuincenaentrega'];
								}
								//realizo consultas necesarias para liquidar guia en caso de entrega
								if($novedad == "ENTREGADO"){
									$diacargue = date("d");
									if($diacargue <= 15){
										$quincenaentrega = 1;
									}else{
										$quincenaentrega = 2;
									}
									//realizo la verificacion de todo el tema de liquidacion a mensajeros
									if($darbonidicacion != "SI"){
									
										if($Dguia['MovGuiaBonificacionOK'] == "OK" || $Dguia['MovGuiaEstadodepago'] == "OK"){
											$pago = $Dguia['MovGuiaPago'];
											$bonificacion = "SI";
											$quincenaentrega = $Dguia['MovGuiaQuincenaentrega'];
										}else{
											$bonificacion = "NO";
											
											
												
											
											if($agente > 0){
												//consulto los datos del agente en cuestion

												$Datosagente = mainModel::ejecutar_consulta_simple("SELECT CuentaRol,CuentaTVinculo,CuentaJerarquia,CuentaTipoPago,CuentaPorcentaje FROM cuenta WHERE id ='$agente'");
												$Dagente = $Datosagente->fetch();
												if($Datosagente->rowCount()>=1){
													$Tvinculo = $Dagente['CuentaTVinculo'];
													$Jerarquia = $Dagente['CuentaJerarquia'];
													$Rolatual = $Dagente['CuentaRol'];
													$Porcentaje = $Dagente['CuentaPorcentaje'];
													$TipoPago = $Dagente['CuentaTipoPago'];
												}else{
													$alerta=[
														"Alerta"=>"simple",
														"Titulo"=>"Ocurrio un error inesperado",
														"Texto"=>"No fue posible verificar datos para liquidar movimiento a agente seleccionado.",
														"Tipo"=>"error"

													];
													return mainModel::sweet_alert($alerta);
													exit();

												}

											}else{
												$agente = $_SESSION['CuentaId'];
												//consulto los datos del agente logueado

												$Datosagente = mainModel::ejecutar_consulta_simple("SELECT CuentaRol,CuentaTVinculo,CuentaJerarquia,CuentaTipoPago,CuentaPorcentaje FROM cuenta WHERE id ='$agente'");
												$Dagente = $Datosagente->fetch();
												if($Datosagente->rowCount()>=1){
													$Tvinculo = $Dagente['CuentaTVinculo'];
													$Jerarquia = $Dagente['CuentaJerarquia'];
													$Rolatual = $Dagente['CuentaRol'];
													$Porcentaje = $Dagente['CuentaPorcentaje'];
													$TipoPago = $Dagente['CuentaTipoPago'];
												}else{
													$alerta=[
														"Alerta"=>"simple",
														"Titulo"=>"Ocurrio un error inesperado",
														"Texto"=>"No fue posible verificar datos para liquidar movimiento a agente logueado.",
														"Tipo"=>"error"

													];
													return mainModel::sweet_alert($alerta);
													exit();

												}
											}
											//consulto zona para liquidar pago a mensajero
											if($zona != ""){
												$zonapago = $zona;
											}else{
												$zonapago = $Dguia['MovGuiaZona'];
											}

											//realizo consultas de porcentajes y zona de pago
											//VALOR ZONA
											$Valorzona = mainModel::ejecutar_consulta_simple("SELECT * FROM zona WHERE ZonaNombre ='$zonapago'");
											$Vzona = $Valorzona->fetch();
											if($Valorzona->rowCount()>=1){
												if($TipoPago == "Base"){
													$pago = $Vzona['ZonaSemana'] * ((100 + $Porcentaje) / 100);
												}else{						
													//PORCENTAJE DE VINCULO
													$Porcentajevinculo = mainModel::ejecutar_consulta_simple("SELECT TVinculoPorcentaje FROM TVinculo WHERE id ='$Tvinculo'");
													$Pvinculo = $Porcentajevinculo->fetch();
													if($Porcentajevinculo->rowCount()>=1){
														$Porcentaje = $Porcentaje + $Pvinculo['TVinculoPorcentaje'];

														//PORCENTAJE DE JERARQUIA
														$Porcentajejerarquia = mainModel::ejecutar_consulta_simple("SELECT JerarquiaPorcentaje FROM jerarquia WHERE id ='$Jerarquia'");
														$Pjerarquia = $Porcentajejerarquia->fetch();
														if($Porcentajejerarquia->rowCount()>=1){
															$Porcentaje = $Porcentaje + $Pjerarquia['JerarquiaPorcentaje'];

															//PORCENTAJE DE ROL
															$Porcentajerol = mainModel::ejecutar_consulta_simple("SELECT RolPorcentaje FROM rol WHERE id ='$Rolatual'");
															$Prol = $Porcentajerol->fetch();
															if($Porcentajejerarquia->rowCount()>=1){
																$Porcentaje = $Porcentaje + $Prol['RolPorcentaje'];

																$pago = $Vzona['ZonaSemana'] * ((100 + $Porcentaje) / 100);
															}else{
																$alerta=[
																	"Alerta"=>"simple",
																	"Titulo"=>"Ocurrio un error inesperado",
																	"Texto"=>"No fue posible verificar el porcetaje sobre el rol.",
																	"Tipo"=>"error"

																];
																return mainModel::sweet_alert($alerta);
																exit();

															}		
														}else{
															$alerta=[
																"Alerta"=>"simple",
																"Titulo"=>"Ocurrio un error inesperado",
																"Texto"=>"No fue posible verificar el porcetaje sobre jerarquia.",
																"Tipo"=>"error"

															];
															return mainModel::sweet_alert($alerta);
															exit();

														}		
													}else{
														$alerta=[
															"Alerta"=>"simple",
															"Titulo"=>"Ocurrio un error inesperado",
															"Texto"=>"No fue posible verificar el porcetaje sobre tipo de vinculo.",
															"Tipo"=>"error"

														];
														return mainModel::sweet_alert($alerta);
														exit();

													}	
												}
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"No fue posible verificar el valor base de la zona del documento.",
													"Tipo"=>"error"

												];
												return mainModel::sweet_alert($alerta);
												exit();

											}
										}
									}
								}

								// realizo proceso de reasignacion si s eentrega en nueva direccion
								if(($novedad == "R - ASIGNADO" || $nuevadireccion == "SI") && $Dguia['MovGuiaFacturadovalidacion'] != "FACTURADO"){

									$Tarifacliente = $Dcliente['ClienteTarifa'];
									//consulto el valor de la tarifa para reasignar
									$DatosVtarifaV = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '2'");
									$DVtarifaV = $DatosVtarifaV->fetch();
									if($DatosVtarifaV->rowCount()>=1){
										$aviso = "OK";
										$Consultaexitosa = "OK";

										$validacion = "OK";
										$facturadovalidacion = "SIN FACTURAR";
										$estadovalidacion = "NO";
										$fechareasignacion = date("Y-m-d");
										$idtarifavalidacion = 2;
										//almacene variables necesarias
										$valortarifaV = $DVtarifaV['TarifaCValor'];
										$codigoTarifaV = $DVtarifaV['TarifaCCodFacturacion'];
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"No fue posible consultar datos de reasignacion relacionados con esta guia.",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();

									}

								}
								if($novedad == "ENTREGADO" || $novedad == "CERRADO" || $novedad == "DEVOLUCION" ){
									$avisonovedad= "OK";
								}
								
								$DatoREG=[
									"Remitente"=>$remitente,
									"Nit"=>$nit,
									"Nombreremitente"=>$Nombreremitente,
									"Dremitente"=>$dremitente,
									"Guianumero"=>$guianumero,
									"Tiposervicio"=>$tiposervicio,
									"Radicado"=>$radicado,
									"Area"=>$area,
									"Destinatario"=>$destinatario,
									"Email"=>$email,
									"Municipio"=>$municipio,
									"Direccion"=>$direccion,
									"Referente"=>$referente,
									"Telefono"=>$telefono,
									"Cataporte"=>$cataporte,
									"Volumen"=>$volumen,
									"Volumenadd"=>$volumenadd,
									"Fecharecogida"=>$fecharecogida,
									"Fechafactura"=>$fechafactura,
									"Novedad"=>$novedad,
									"DetalleNovedad"=>$detallenovedad,
									"Agente"=>$agente,
									"FechaMovimiento"=>$fechamovimiento,
									"Hora"=>$hora,
									"Zona"=>$zona,
									"Tarifa"=>$tarifa,
									"Ndireccion"=>$Ndireccion,
									"Fechaasignado"=>$fechaasignado,
									"Valorcataporte"=>$valorcataporte,
									"Totalcataporte"=>$totalcataporte,
									"ValorAdicional"=>$valorVAdicional,
									"TotalVadicional"=>$totalVadicional,
									"Valortarifa"=>$valortarifa,
									"CodigoTarifa"=>$codigoTarifa,
									"Valortotalsincataporte"=>$valortotalsincataporte,
									"Valortotalguia"=>$valortotalguia,
									"Bonificacion"=>$bonificacion,
									"Pago"=>$pago,
									"Mesfactura"=>$mesfactura,
									"Novedadcataporte"=>$novedadcataporte,
									"Estadocataporte"=>$estadocataporte,
									"Idusuario"=>$idusuario,
									"Validacion"=>$validacion,
									"Facturadovalidacion"=>$facturadovalidacion,
									"Estadovalidacion"=>$estadovalidacion,
									"Fechareasignacion"=>$fechareasignacion,
									"ValortarifaV"=>$valortarifaV,
									"CodigoTarifaV"=>$codigoTarifaV,
									"Idtarifavalidacion"=>$idtarifavalidacion,
									"Fechacargue"=>$fechacargue,
									"Quincena"=>$quincenaentrega,
									"Nombreguia"=>$Nombreimgguia,
									"Nombrelugar"=>$Nombreimglugar,
									"NombreCataporte"=>$Nombreimgcataporte,
									"Idguia"=>$idguia

								];

								$actualizarguiaadmin = guiaModelo::actualizar_admin_guia_modelo($DatoREG,$aviso,$avisonovedad);
								if($actualizarguiaadmin->rowCount()>=1){

									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Registro exitoso",
										"Texto"=>"La guia ".$idguia." fue actualizada con exito",
										"Tipo"=>"success"

									];
									
									$avisoError ="NO";
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No se pudo actualizar la guia, por favor intente nuevamente.",
										"Tipo"=>"error"

									];
								}
							}else{
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No fue posible saber el valor de la tarifa a aplicar en este servicio.",
									"Tipo"=>"error"

								];
							}
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No fue posible saber cual es la tarifa a aplicar en este servicio.",
								"Tipo"=>"error"

							];
						}
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No fue posible obtener valor de cataporte y volumen adicional.",
							"Tipo"=>"error"

						];	
					}
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No fue posible consultar el cliente relacionado con esta guia.",
						"Tipo"=>"error"

					];

				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No fue posible consultar los datos de la guia seleccionada.",
					"Tipo"=>"error"

				];
				
			}			
		}
		
		$campos['error'] =  $avisoError;
		$campos['alerta'] = mainModel::sweet_alert($alerta);
		
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
		
		
		
		//return mainModel::sweet_alert($alerta);

	}
	
	//CARGARIMAGENES DE GUIA
	public function cargarIMGr_guia_controlador($idguia,$datosimagguia,$Timagen){
		//consulto los datos de la guia
		$Datosguia = mainModel::ejecutar_consulta_simple("SELECT * FROM Mov_guia WHERE id ='$idguia'");
		$Dguia = $Datosguia->fetch();
		if($Datosguia->rowCount()>=1){

			//verifico si la guia es con codigo viejo o nuevo
			if(strlen($Dguia['MovGuiaGuia']) > 1){
				$guia = $Dguia['MovGuiaGuia'];
			}else{
				$guia = $idguia;
			}

			//cargo al servidor la imagen de la guia
			$Nombreimgguia = '';
			if($datosimagguia != ''){	
				
				if($Timagen == "Imagenguia"){
					$Nombreimgguia = "soporte_para_guia_".$guia.".jpg";
					$src = SERVERFILE."adjuntos/imgold/".$Nombreimgguia;
				}
				if($Timagen == "Imagenlugar"){
					$Nombreimglugar = "soporte_para_guia_".$guia."_2.jpg";
					$src = SERVERFILE."adjuntos/img/".$Nombreimglugar;
				}
				if($Timagen == "Imagencataporte"){
					$Nombreimgcataporte = "soporte_cataporte_guia_".$guia.".jpg";
					$src = SERVERFILE."adjuntos/img/".$Nombreimgcataporte;
				}
				
				//tomo la informacion de la imagen de la guia y la subo al servidor
				$base_to_php = explode(',',$datosimagguia);
				$imagenguiafinal = base64_decode($base_to_php[1]);

				$imagenguia = file_put_contents($src,$imagenguiafinal);

				if($imagenguia){
					//SI SE CARGA LA IMAGEN DOY UNA ALERTA DE CORRECTA
					$Nombreimgguia = "OK";
				}else{
					$Nombreimgguia = "NO";
					
				}

			}else{
				//sino HAY IMAGEN MUESTRO UN NO
				$Nombreimgguia = "NO";
			}
		}
		
		return $Nombreimgguia;
	}
	
	//ANULAR Y ACTIVAR GUIA
	public function desactivar_guia_controlador(){
			$codigo=mainModel::limpiar_cadena($_POST['idupdate']);
			$estado=mainModel::limpiar_cadena($_POST['estado']);

			$codigo=mainModel::decryption($codigo);


					$Upcliente=guiaModelo::desactivar_guia_modelo($estado,$codigo);

					if($Upcliente->rowCount()>=1){
						if($estado == "Anulado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Guia Anulada.",
								"Texto"=>"La guia fue anulada con exito.",
								"Tipo"=>"success"

							];
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Guia Reactivada.",
								"Texto"=>"La guia fue Reactivada con exito.",
								"Tipo"=>"success"

							];
						}	
					}else{
						if($estado == "Anulado"){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos anular esta guia en este momento.",
								"Tipo"=>"error"

							];	
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No podemos Reactivar esta guia en este momento.",
								"Tipo"=>"error"

							];	
						}
					}

			return mainModel::sweet_alert($alerta);
		}
	
	//IMPORTAR GUIAS NUEVAS
	public function importar_guias_guia_controlador(){
		$archivo = $_FILES['fileexcel-reg'];
		
			
		if($archivo != ""){
			
			$nombre = $archivo['name'];
			$type = $archivo['type'];
			$info = new SplFileInfo($nombre);
			$info = ($info->getExtension());
			$url_tem = $archivo['tmp_name'];
			
						
			$fecha = date("Ymd");
			$hora = date("His");
			$nombrearchivocarga = "Impo_guia_mas_".$fecha.$hora.".".$info;
			$src = SERVERFILE."adjuntos/excel/impoguias/".$nombrearchivocarga;
			
			// crea codigo unico para importacion
			$consulta=mainModel::ejecutar_consulta_simple("SELECT id FROM Importacion");
			$numero=($consulta->rowCount())+1;

			$codigo=mainModel::generar_codigo_aleatorio("IMP",7,$numero);
			
			
			$DatoREG=[
				"Archivosubido"=>$nombre,
				"Archivoguardado"=>$nombrearchivocarga,
				"Fecha"=>$fecha,
				"Hora"=>$hora,
				"Ruta"=>$src,
				"Codigo"=>$codigo
			];
			
			//registro la importacion con nombre y fecha
			$guardarimportacion = guiaModelo::importar_guias_guia_modelo($DatoREG);
			if($guardarimportacion->rowCount()>=1){
				//consulta consecutivo de importacion
				$idImportacion=mainModel::ejecutar_consulta_simple("SELECT id FROM Importacion WHERE ImportacionCodigo ='$codigo'");
				$Importacion=$idImportacion->fetch();

				$Consecutioimpo = $Importacion['id'];
				
				
				//subo archivo 
				$subido = move_uploaded_file($url_tem, $src);
				if($subido){
					require_once "../bibliotecas/Classes/PHPExcel/IOFactory.php";
					$objPHPExcel = PHPExcel_IOFactory::load($src);
					//Asigno la hoja de calculo activa
					$objPHPExcel->setActiveSheetIndex(0);
					//Obtengo el numero de filas del archivo
					$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

					$cantidad = ($numRows - 1);
					
					//inicia importacion de filas de guias
					for ($i = 2; $i <= $numRows; $i++){
						$remitente=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue());
						$tiposervicio=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue());
						$radicado=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue());
						$area=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue());
						$destinatario=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue());
						$email=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue());
						$municipio=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue());
						$direccion=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue());
						$referente=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue());
						$telefono=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue());
						$cataporte=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue());
						$volumen=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue());
						$fecharecogida=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),-2,2));
						$fechafactura=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue(),-2,2));
						$agente=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue());
						$zona=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue());
						$tarifa=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue());
						$Ndireccion=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue());
						$fechaasignado=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),-2,2));
						$observaciones=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue());
						$bonificacion=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue());
						$novedad = "ASIGNADO A ZONA";
						if($remitente != ""){

							if($tiposervicio != ""){

								if($destinatario != ""){

									if($direccion != "" && $municipio != ""){
										$Fechaactual = date("Y-m-d");
										$adddias = 10;
										$fechamaxima = strtotime('+'.$adddias.' day',strtotime ($Fechaactual));
										$fechamaxima = date('Y-m-d',$fechamaxima);

										if($fecharecogida >= $Fechaactual && $fecharecogida <= $fechamaxima){

											//consulto los datos del cliente en cuestion
											$Datoscliente = mainModel::ejecutar_consulta_simple("SELECT ClienteDNI,ClienteNombre,ClienteDireccion,ClienteCiudad,ClienteTelefono,ClienteTarifa,ClienteValor FROM cliente WHERE id ='$remitente'");
											$Dcliente = $Datoscliente->fetch();
											if($Datoscliente->rowCount()>=1){

												$idcataporte = $Dcliente['ClienteValor'];
												//consulto los cataporte y volumen adicional 
												$Datoscataporte = mainModel::ejecutar_consulta_simple("SELECT ValorCataporte,ValorVAdicional FROM ValorCataVolumen WHERE ValorCliente ='$idcataporte'");
												$Dcataporte = $Datoscataporte->fetch();
												if($Datoscataporte->rowCount()>=1){

													$aviso = "NO";
													if($Ndireccion != ""){
														$Consultaexitosa = "NO";

														$Tarifacliente = $Dcliente['ClienteTarifa'];
														//consulto valor de la tarifa para el cliente 
														$DatosVtarifaV = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '2'");
														$DVtarifaV = $DatosVtarifaV->fetch();
														if($DatosVtarifaV->rowCount()>=1){
															$aviso = "OK";
															$Consultaexitosa = "OK";

															$validacion = "OK";
															$facturadovalidacion = "SIN FACTURAR";
															$estadovalidacion = "NO";
															$fechareasignacion = date("Y-m-d");
															$idtarifavalidacion = 2;
														}
													}
													if(($Ndireccion != "" && $Consultaexitosa == "OK") || $Ndireccion == ""){

														if($tarifa == ""){
															//consulto la tarifa a asignar segun el tipo de servicio 
															$Datostarifa = mainModel::ejecutar_consulta_simple("SELECT ServicioIdTarifa FROM servicios WHERE ServicioCodigo ='$tiposervicio'");
															$Dtarifa = $Datostarifa->fetch();
															if($Datostarifa->rowCount()>=1){	
																$tarifa = $Dtarifa['ServicioIdTarifa'];
															}
														}
														if($tarifa != ""){ 
															$Tarifacliente = $Dcliente['ClienteTarifa'];
															//consulto valor de la tarifa a aplicar
															$DatosVtarifa = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '$tarifa'");
															$DVtarifa = $DatosVtarifa->fetch();
															if($DatosVtarifa->rowCount()>=1){	

																if($volumen == "" || $volumen == 0){$volumen = 1;}
																//asino valores de cataportes, volumen adicional , valor tarifa, valor reasignacion
																$valorcataporte = $Dcataporte['ValorCataporte'];
																$valorVAdicional = $Dcataporte['ValorVAdicional'];
																$valortarifa = $DVtarifa['TarifaCValor'];
																$codigoTarifa = $DVtarifa['TarifaCCodFacturacion'];
																$valortarifaV = $DVtarifaV['TarifaCValor'];
																$codigoTarifaV = $DVtarifaV['TarifaCCodFacturacion'];

																//totaliza guia
																$volumenadd = $volumen - 1;
																if($volumenadd == ""){$volumenadd = 0;}
																$totalcataporte = $valorcataporte * $cataporte;
																$totalVadicional =  $valorVAdicional * $volumenadd;
																if($totalVadicional == ""){$totalVadicional = 0;}
																$valortotalguia = $totalcataporte + $totalVadicional + $valortarifa;
																$valortotalsincataporte = $totalVadicional + $valortarifa;

																// asigna a variables datos del remitente
																$nit = $Dcliente['ClienteDNI'];
																$Nombreremitente = $Dcliente['ClienteNombre'];
																$dremitente = $Dcliente['ClienteDireccion'];
																$telefonoremitente = $Dcliente['ClienteTelefono'];
																$ciudadremitente =  $Dcliente['ClienteCiudad'];

																//determino variables que pueden ser auntomaticas o manuales segun sea el caso
																if($fechafactura == ""){$fechafactura = $fecharecogida;}
																if($fechaasignado == ""){$fechaasignado = $fecharecogida;}
																$mesfactura  =substr($fechafactura,-10,4).substr($fechafactura,-5,2);
																$fechatrabajo = date("Ymd");
																$mestrabajo = date("Ym");
																$idusuario = 1;



																//CUANDO SE TENGAN LOS PRIVILEGIOS SE DEBE CAMBIAR ESTA PARTE Y ELIMINAR LA DE ABAJO
																if($_SESSION['Perm_gui_bonificacion']  == "SI")
																{
																	if($bonificacion != "" && $bonificacion > 0)
																	{
																		$cargarbonificacion = "OK";
																	}
																	else
																	{
																		$cargarbonificacion = "NO";
																		$bonificacion = 0;
																	}

																}
																if($bonificacion != "" && $bonificacion > 0)
																{
																	$cargarbonificacion = "OK";
																}
																else
																{
																	$cargarbonificacion = "NO";
																	$bonificacion = 0;
																}

																if($cataporte > 0)
																{
																	$novedadcataporte = "SIN FACTURAR";
																	$estadocataporte = "NO";
																}else{
																	$novedadcataporte = "NA";
																	$estadocataporte = "NA";
																	$cataporte  = 0;
																}

																$consulta7=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia");
																$numero=($consulta7->rowCount())+1;

																$codigoMovGuia=mainModel::generar_codigo_aleatorio("MG",7,$numero);

																$DatoREG=[
																	"Remitente"=>$remitente,
																	"Nit"=>$nit,
																	"Nombreremitente"=>$Nombreremitente,
																	"Dremitente"=>$dremitente,
																	"Telefonoremitente"=>$telefonoremitente,
																	"CiudadRemitente"=>$ciudadremitente,
																	"Tiposervicio"=>$tiposervicio,
																	"Radicado"=>$radicado,
																	"Area"=>$area,
																	"Destinatario"=>$destinatario,
																	"Email"=>$email,
																	"Municipio"=>$municipio,
																	"Direccion"=>$direccion,
																	"Referente"=>$referente,
																	"Telefono"=>$telefono,
																	"Cataporte"=>$cataporte,
																	"Volumen"=>$volumen,
																	"Volumenadd"=>$valorVAdicional,
																	"Fecharecogida"=>$fecharecogida,
																	"Fechafactura"=>$fechafactura,
																	"Novedad"=>$novedad,
																	"Agente"=>$agente,
																	"Zona"=>$zona,
																	"Tarifa"=>$tarifa,
																	"Ndireccion"=>$Ndireccion,
																	"Fechaasignado"=>$fechaasignado,
																	"Valorcataporte"=>$valorcataporte,
																	"Totalcataporte"=>$totalcataporte,
																	"TotalVadicional"=>$totalVadicional,
																	"Valortarifa"=>$valortarifa,
																	"CodigoTarifa"=>$codigoTarifa,
																	"Valortotalsincataporte"=>$valortotalsincataporte,
																	"Valortotalguia"=>$valortotalguia,
																	"Bonificacion"=>$bonificacion,
																	"Cargarbonificacion"=>$cargarbonificacion,
																	"Fechatrabajo"=>$fechatrabajo,
																	"Mestrabajo"=>$mestrabajo,
																	"Mesfactura"=>$mesfactura,
																	"Novedadcataporte"=>$novedadcataporte,
																	"Estadocataporte"=>$estadocataporte,
																	"Idusuario"=>$idusuario,
																	"Validacion"=>$validacion,
																	"Facturadovalidacion"=>$facturadovalidacion,
																	"Estadovalidacion"=>$estadovalidacion,
																	"Fechareasignacion"=>$fechareasignacion,
																	"ValortarifaV"=>$valortarifaV,
																	"CodigoTarifaV"=>$codigoTarifaV,
																	"Idtarifavalidacion"=>$idtarifavalidacion,
																	"Observaciones"=>$observaciones,
																	"IdImpo"=>$Consecutioimpo,
																	"CodigoMovGuia"=>$codigoMovGuia

																];
																$guardarguia = guiaModelo::agregar_guia_modelo($DatoREG,$aviso);
																if($guardarguia->rowCount()>=1){
																	$idImprimir=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia WHERE MovCodigoGuia ='$codigoMovGuia'");
																	$imprimir=$idImprimir->fetch();

																	$guiaimpresion = $imprimir['id'];
																	if($i == $numRows){
																		$alerta=[
																			"Alerta"=>"simple",
																			"Titulo"=>"Registro exitoso",
																			"Texto"=>"La importación de guias fue registrada correctamente en el sistema con el número de importación (".$Consecutioimpo.")",
																			"Tipo"=>"success"

																		];
																	}
																}else{
																	$alerta=[
																		"Alerta"=>"simple",
																		"Titulo"=>"Ocurrio un error inesperado",
																		"Texto"=>"En la fila (".$i.") No se pudo registrar la guia en el sistema, reinicie la importacion desde la fila (".$i.")",
																		"Tipo"=>"error"

																	];
																	
																	return mainModel::sweet_alert($alerta);
																	
																	exit();
																}
															}else{
																$alerta=[
																	"Alerta"=>"simple",
																	"Titulo"=>"Ocurrio un error inesperado",
																	"Texto"=>"En la fila (".$i.") No fue posible saber el valor de la tarifa a aplicar en este servicio, reinicie la importacion desde la fila (".$i.")",

																	"Tipo"=>"error"

																];
																return mainModel::sweet_alert($alerta);
																exit();
															}

														}else{
															$alerta=[
																"Alerta"=>"simple",
																"Titulo"=>"Ocurrio un error inesperado",
																"Texto"=>"En la fila (".$i.") No fue posible saber cual es la tarifa a aplicar en este servicio, reinicie la importacion desde la fila (".$i.")",
																"Tipo"=>"error"

															];
															return mainModel::sweet_alert($alerta);
															exit();
														}
													}else{
														$alerta=[
															"Alerta"=>"simple",
															"Titulo"=>"Ocurrio un error inesperado",
															"Texto"=>"En la fila (".$i.") No fue posible saber cual es el valor de la taria para reasignasion con nueva dirección, reinicie la importacion desde la fila (".$i.")",
															"Tipo"=>"error"

														];
														return mainModel::sweet_alert($alerta);
														exit();
													}
												}else{
													$alerta=[
														"Alerta"=>"simple",
														"Titulo"=>"Ocurrio un error inesperado",
														"Texto"=>"En la fila (".$i.") No fue posible obtener valor de cataporte y volumen adicional, por favor verifiquelo y reinicie la importacion desde la fila (".$i.")",
														"Tipo"=>"error"

													];
													return mainModel::sweet_alert($alerta);
													exit();
												}
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"En la fila (".$i.") No fue posible obtener los datos basicos del remitente, por favor verifiquelo y reinicie la importacion desde la fila (".$i.")",
													"Tipo"=>"error"

												];
												return mainModel::sweet_alert($alerta);
												exit();
											}
										}else{
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"En la fila (".$i.") la fecha de recogida es inferior a la fecha actual o es superior a ".$adddias." dias de la fecha actual, por favor verifiquela y reinicie la importacion desde la fila (".$i.")",
												"Tipo"=>"error"

											];
											return mainModel::sweet_alert($alerta);
											exit();
										}	
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"En la fila (".$i.") no se ha indicado la dirección o municipio de destino, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();
									}		
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"En la fila (".$i.") no se ha indicado el destinatario, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
										"Tipo"=>"error"

									];
									return mainModel::sweet_alert($alerta);
									exit();
								}				
							}else{
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"En la fila (".$i.") no se ha indicado el tipo de servicio, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
									"Tipo"=>"error"

								];
								return mainModel::sweet_alert($alerta);
								exit();
							}
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"En la fila (".$i.") no se ha indicado el codigo del remitente, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
								"Tipo"=>"error"

							];
							return mainModel::sweet_alert($alerta);
							exit();
						}
					}
					//termina importacion de filas de guias
					
				}else{
					
					guiaModelo::eliminar_importacion_guia_modelo($codigo);
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Nofue posible subir el archivo, por favor vuelva a intentarlo.",
						"Tipo"=>"error"

					];	
				}
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No se pudo realizar el registro del archivo a importar.",
					"Tipo"=>"error"

				];
			}
			
			
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No ha seleccionado ningun archivo.",
				"Tipo"=>"error"

			];	
		}
		echo $Consecutioimpo ;
		return mainModel::sweet_alert($alerta);
		
	}
	
	//iniciar  exportacion para actualizaciones masivamente novedad, nueva direccion, agente, zona, tarifa de validación
	public function exportar_guias_guia_controlador($novedad,$Fdesde,$Fhasta){
		$app = SGBD;
		$general = SERVERURL;
		if($general == "SERVERURL"){
			require_once "../core/configGeneral.php";
		}
		if($app == "SGBD"){
			require_once "../core/configAPP.php";
		}

		
		$novedad = mainModel::limpiar_cadena($novedad);
		$fechadesde = mainModel::limpiar_cadena($Fdesde);
		$fechahahsta = mainModel::limpiar_cadena($Fhasta);
		
		if($fechadesde == ""){$fechadesde = "2019-01-01";}
		if($fechahahsta == ""){$fechahahsta = "2099-12-31";}
		
		$consutotaLguias=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia  WHERE MovGuiaFecha_recogida >= '$fechadesde' AND MovGuiaFecha_recogida <= '$fechahahsta' AND MovGuiaNovedad <> '$novedad'");
		$numerototal=($consutotaLguias->rowCount())+1;

		$registros = 5000;
		$totalciclo = $numerototal / $registros;
		$totalciclo = ceil($totalciclo);
		
		
		
		$tabla.='
				<table class="table" border="1" cellpadding="2" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center">DOCUMENTO</th>
							<th class="text-center">RADICADO</th>
							<th class="text-center">AREA</th>
							<th class="text-center">DESTINATARIO</th>
							<th class="text-center">CORREO DESTINO</th>
							<th class="text-center">MUNICIPIO</th>
							<th class="text-center">DIRECCION</th>
							<th class="text-center">REFERENTE</th>
							<th class="text-center">TELEFONOS</th>
							<th class="text-center">CATAPORTE</th>
							<th class="text-center">VOLUMEN</th>
							<th class="text-center">FECHA RECOGIDA</th>
							<th class="text-center">AGENTE</th>
							<th class="text-center">ZONA</th>
							<th class="text-center">TARIFA</th>
							<th class="text-center">N. DIRECCION</th>
							<th class="text-center">ID REMITENTE</th>
							<th class="text-center">FECHA ASIGNACION</th>
							<th class="text-center">VALOR</th>
							<th class="text-center">NOVEDAD</th>
							<th class="text-center">FECHA ENTREGA</th>
							<th class="text-center">OBSERVACIONES</th>
							<th class="text-center">PAGO</th>
							<th class="text-center">ESTADO DEL PAGO</th>
							<th class="text-center">COLILLA</th>
							<th class="text-center">TARIFA VALIDACION</th>
							<th class="text-center">ID</th>
							<th class="text-center">Tipo Servicio</th>
							
							<th class="text-center">FECHA FACTURA</th>
							<th class="text-center">DAR BONIFICACION</th>
							<th class="text-center">FECHA MOVIMIENTO</th>
							<th class="text-center">FECHA CARGUE</th>
						</tr>
					</thead>
				<tbody>
		';
		for($i=1; $i<=$totalciclo;$i++){
				
			$inicio = (($i * $registros) - $registros);
		
			$consulta="SELECT MovGuiaGuia,MovGuiaRadicado,MovGuiaArea,MovGuiaDestinatario,MovGuiaCorreodestino,MovGuiaMunicipio,MovGuiaDireccion,MovGuiaReferente,MovGuiaTelefono,MovGuiaCataporte,MovGuiaVolumen,MovGuiaFecha_recogida,MovGuiaAgente,MovGuiaZona,MovGuiaIdtarifa,MovGuiaNdireccion,MovGuiaCodigocliente,MovGuiaFasignacion,MovGuiaValortotalguia,MovGuiaNovedad,MovGuiaFentrega,MovGuiaDetallenovedad,MovGuiaPago,MovGuiaEstadodepago,MovGuiaColilla,MovGuiaTarifavalidacion,id,MovGuiaCodigo,MovGuiaFecha_factura,MovGuiaBonificacionOK,MovGuiaFentrega,MovGuiaFecha_cargue
			FROM  Mov_guia WHERE MovGuiaFecha_recogida >= '$fechadesde' AND MovGuiaFecha_recogida <= '$fechahahsta' AND MovGuiaNovedad <> '$novedad'   ORDER BY id ASC LIMIT $inicio,$registros";

			$conexion =mainModel::conectar();

			$datos = $conexion->query($consulta);
			$datos= $datos->fetchAll();

	
				foreach($datos as $rows){
					$tabla.='
						<tr>
							<td>'.$rows['MovGuiaGuia'].'</td>
							<td>'.$rows['MovGuiaRadicado'].'</td>
							<td>'.$rows['MovGuiaArea'].'</td>
							<td>'.$rows['MovGuiaDestinatario'].'</td>
							<td>'.$rows['MovGuiaCorreodestino'].'</td>
							<td>'.$rows['MovGuiaMunicipio'].'</td>
							<td>'.$rows['MovGuiaDireccion'].'</td>
							<td>'.$rows['MovGuiaReferente'].'</td>
							<td>'.$rows['MovGuiaTelefono'].'</td>
							<td>'.$rows['MovGuiaCataporte'].'</td>
							<td>'.$rows['MovGuiaVolumen'].'</td>
							<td>'.substr($rows['MovGuiaFecha_recogida'],-10,4).substr($rows['MovGuiaFecha_recogida'],-5,2).substr($rows['MovGuiaFecha_recogida'],-2,2).'</td>
							<td>'.$rows['MovGuiaAgente'].'</td>
							<td>'.$rows['MovGuiaZona'].'</td>
							<td>'.$rows['MovGuiaIdtarifa'].'</td>
							<td>'.$rows['MovGuiaNdireccion'].'</td>
							<td>'.$rows['MovGuiaCodigocliente'].'</td>
							<td>'.substr($rows['MovGuiaFasignacion'],-10,4).substr($rows['MovGuiaFasignacion'],-5,2).substr($rows['MovGuiaFasignacion'],-2,2).'</td>
							<td>'.$rows['MovGuiaValortotalguia'].'</td>
							<td>'.$rows['MovGuiaNovedad'].'</td>
							<td>'.substr($rows['MovGuiaFentrega'],-10,4).substr($rows['MovGuiaFentrega'],-5,2).substr($rows['MovGuiaFentrega'],-2,2).'</td>
							<td>'.$rows['MovGuiaDetallenovedad'].'</td>
							<td>'.$rows['MovGuiaPago'].'</td>
							<td>'.$rows['MovGuiaEstadodepago'].'</td>
							<td>'.$rows['MovGuiaColilla'].'</td>
							<td>'.$rows['MovGuiaTarifavalidacion'].'</td>
							<td>'.$rows['id'].'</td>
							<td>'.$rows['MovGuiaCodigo'].'</td>
							<td>'.substr($rows['MovGuiaFecha_factura'],-10,4).substr($rows['MovGuiaFecha_factura'],-5,2).substr($rows['MovGuiaFecha_factura'],-2,2).'</td>
							<td>'.$rows['MovGuiaBonificacionOK'].'</td>
							<td>'.substr($rows['MovGuiaFentrega'],-10,4).substr($rows['MovGuiaFentrega'],-5,2).substr($rows['MovGuiaFentrega'],-2,2).'</td>
							<td>'.substr($rows['MovGuiaFecha_cargue'],-10,4).substr($rows['MovGuiaFecha_cargue'],-5,2).substr($rows['MovGuiaFecha_cargue'],-2,2).'</td>
						</tr>';
				}

				
		}
		$tabla.='
					</tbody>
				</table>
				';
		echo $tabla;
		
	}
	
	//IMPORTAR PARA ACTUALIZAR GUIAS
	public function importar_actualizacion_guias_guia_controlador(){
		$archivo = $_FILES['fileexcel-up'];
		
			
		if($archivo != ""){
			
			$nombre = $archivo['name'];
			$type = $archivo['type'];
			$info = new SplFileInfo($nombre);
			$info = ($info->getExtension());
			$url_tem = $archivo['tmp_name'];
			
						
			$fecha = date("Ymd");
			$hora = date("His");
			$nombrearchivocarga = "Upimpo_guia_mas_".$fecha.$hora.".".$info;
			$src = SERVERFILE."adjuntos/excel/impoUpguias/".$nombrearchivocarga;
			
			// crea codigo unico para importacion
			$consulta=mainModel::ejecutar_consulta_simple("SELECT id FROM Importacion");
			$numero=($consulta->rowCount())+1;

			$codigo=mainModel::generar_codigo_aleatorio("UP",7,$numero);
			
			
			$DatoREG=[
				"Archivosubido"=>$nombre,
				"Archivoguardado"=>$nombrearchivocarga,
				"Fecha"=>$fecha,
				"Hora"=>$hora,
				"Ruta"=>$src,
				"Codigo"=>$codigo
			];
			
			//registro la importacion con nombre y fecha
			$guardarimportacion = guiaModelo::importar_guias_guia_modelo($DatoREG);
			if($guardarimportacion->rowCount()>=1){
				//consulta consecutivo de importacion
				$idImportacion=mainModel::ejecutar_consulta_simple("SELECT id FROM Importacion WHERE ImportacionCodigo ='$codigo'");
				$Importacion=$idImportacion->fetch();

				$Consecutioimpo = $Importacion['id'];
				
				
				//subo archivo 
				$subido = move_uploaded_file($url_tem, $src);
				if($subido){
					require_once "../bibliotecas/Classes/PHPExcel/IOFactory.php";
					$objPHPExcel = PHPExcel_IOFactory::load($src);
					//Asigno la hoja de calculo activa
					$objPHPExcel->setActiveSheetIndex(0);
					//Obtengo el numero de filas del archivo
					$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

					$cantidad = ($numRows - 1);

					
					//inicia importacion de filas de guias
					for ($i = 2; $i <= $numRows; $i++){
						$avisonovedad = "";
						$aviso = "";
						
						$remitente=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue());
						$tiposervicio=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue());
						$radicado=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue());
						$area=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue());
						$destinatario=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue());
						$email=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue());
						$municipio=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue());
						$direccion=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue());
						$referente=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue());
						$telefono=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue());
						$cataporte=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue());
						$volumen=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue());
						$fecharecogida=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),-2,2));
						$fechafactura=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue(),-2,2));
						$agente=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue());
						$zona=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue());
						$tarifa=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue());
						$Ndireccion=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue());
						$fechaasignado=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),-2,2));
						$novedad =$objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
						$fechaentrega=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue(),-2,2));
						$detallenovedad=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue());
						$pago=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue());
						$estadodelpago=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue());
						$colilla=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue());
						$esvalidacion=mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue());
						$idguia =mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue());
						$darbonidicacion =mainModel::limpiar_cadena($objPHPExcel->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue());
						$fechamovimiento=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue(),-2,2));
						$fechacargue=mainModel::limpiar_cadena(substr($objPHPExcel->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue(),-8,4).'-'.substr($objPHPExcel->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue(),-4,2).'-'.substr($objPHPExcel->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue(),-2,2));
						
						$hora = date("H:i:s");						
						if($remitente != ""){

							if($tiposervicio != ""){

								if($destinatario != ""){

									if($direccion != "" && $municipio != ""){
										
										//consulto los datos del cliente en cuestion
										$Datosguia = mainModel::ejecutar_consulta_simple("SELECT * FROM Mov_guia WHERE id ='$idguia'");
										$Dguia = $Datosguia->fetch();
										if($Datosguia->rowCount()>=1){

											//verifico si la guia es con codigo viejo o nuevo
											if(strlen($Dguia['MovGuiaGuia']) > 1){
												$guia = $Dguia['MovGuiaGuia'];
											}else{
												$guia = $idguia;
											}

											//cargo al servidor la imagen de la guia
											$Nombreimgguia = '';
											//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
											$Nombreimgguia = $Dguia['MovGuiaImagen'];
											

											//cargo al servidor la imagen del lugar
											$Nombreimglugar = '';
											//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
											$Nombreimglugar = $Dguia['MovGuiaImagen2'];
											

											//cargo al servidor la imagen de los cataportes
											$Nombreimgcataporte = '';
											//sino hay imagen entonces asigno el mismo nombre que actualmente reposa en la base de datos
											$Nombreimgcataporte = $Dguia['MovGuiaImagen3'];
											
											//consulto los datos del cliente en cuestion
											$Datoscliente = mainModel::ejecutar_consulta_simple("SELECT ClienteDNI,ClienteNombre,ClienteDireccion,ClienteTarifa,ClienteValor FROM cliente WHERE id ='$remitente'");
											$Dcliente = $Datoscliente->fetch();
											if($Datoscliente->rowCount()>=1){

												$idcataporte = $Dcliente['ClienteValor'];
												//consulto los cataporte y volumen adicional 
												$Datoscataporte = mainModel::ejecutar_consulta_simple("SELECT ValorCataporte,ValorVAdicional FROM ValorCataVolumen WHERE ValorCliente ='$idcataporte'");
												$Dcataporte = $Datoscataporte->fetch();
												if($Datoscataporte->rowCount()>=1){
													if($tarifa == ""){
														//consulto la tarifa a asignar segun el tipo de servicio 
														$Datostarifa = mainModel::ejecutar_consulta_simple("SELECT ServicioIdTarifa FROM servicios WHERE ServicioCodigo ='$tiposervicio'");
														$Dtarifa = $Datostarifa->fetch();
														if($Datostarifa->rowCount()>=1){	
															$tarifa = $Dtarifa['ServicioIdTarifa'];
														}
													}

													if($tarifa != ""){
														$Tarifacliente = $Dcliente['ClienteTarifa'];
														//consulto valor de la tarifa a aplicar
														$DatosVtarifa = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '$tarifa'");
														$DVtarifa = $DatosVtarifa->fetch();
														if($DatosVtarifa->rowCount()>=1){
															if($volumen == "" || $volumen == 0){$volumen = 1;}
															//asino valores de cataportes, volumen adicional , valor tarifa, valor reasignacion

															$valorVAdicional = $Dcataporte['ValorVAdicional'];


															//totaliza guia
															if($Dguia['MovGuiaNovedad1'] == "SIN FACTURAR"){
																$guiaup = $tiposervicio;
																$valortarifa = $DVtarifa['TarifaCValor'];
																$codigoTarifa = $DVtarifa['TarifaCCodFacturacion'];

																$volumenadd = $volumen - 1;
																if($volumenadd == ""){$volumenadd = 0;}
																$totalVadicional =  $valorVAdicional * $volumenadd;
																if($totalVadicional == ""){$totalVadicional = 0;}
																$valortotalguia = $totalcataporte + $totalVadicional + $valortarifa;
																$valortotalsincataporte = $totalVadicional + $valortarifa;
															}else{
																$guiaup = $Dguia['MovGuiaGuia'];
																$tiposervicio = $Dguia['MovGuiaCodigo'];
																$tarifa = $Dguia['MovGuiaIdtarifa'];
																$valortarifa = $Dguia['MovGuiaValortarifa'];
																$codigoTarifa = $Dguia['MovGuiaCodigofacturacion'];
																$totalVadicional =  $Dguia['MovGuiaTotaladicional'];
																$valortotalguia = $Dguia['MovGuiaValortotalguia'];
																$valortotalsincataporte = $Dguia['MovGuiaValortotalguiasincataporte'];
															}
															// asigna a variables datos del remitente
															$nit = $Dcliente['ClienteDNI'];
															$Nombreremitente = $Dcliente['ClienteNombre'];
															$dremitente = $Dcliente['ClienteDireccion'];


															//determino variables que pueden ser auntomaticas o manuales segun sea el caso
															if($fechafactura == ""){$fechafactura = $fecharecogida;}
															if($fechaasignado == ""){$fechaasignado = $fecharecogida;}
															$mesfactura  =substr($fechafactura,-10,4).substr($fechafactura,-5,2);

															if($cataporte > 0 && $Dguia['MovGuiaNovedadcataporte'] != "FACTURADO"){
																$valorcataporte = $Dcataporte['ValorCataporte'];
																$totalcataporte = $valorcataporte * $cataporte;
																$novedadcataporte = "SIN FACTURAR";
																$estadocataporte = "NO";

															}else{
																$valorcataporte = $Dguia['MovGuiaValor'];
																$totalcataporte = $Dguia['MovGuiaTotalcataporte'];
																$novedadcataporte = $Dguia['MovGuiaNovedadcataporte'];
																$estadocataporte = $Dguia['MovGuiaEstadocataporte'];
																$cataporte  = $Dguia['MovGuiaCataporte'];

															}
															
															//ASIGNO NUMERO DE QUINCENA A 0
															$quincenaentrega = 0;
															//asigno valor si quiero dar una bonificacion diferente a la que esta en el sistema
															if($darbonidicacion == "SI"){
																$bonificacion = "OK";
															}
															if($Dguia['MovGuiaEstadodepago'] == "OK"){
																$pago = $Dguia['MovGuiaPago'];
																$bonificacion = "SI";
																$quincenaentrega = $Dguia['MovGuiaQuincenaentrega'];
															}
															//realizo consultas necesarias para liquidar guia en caso de entrega
															if($novedad == "ENTREGADO"){
																$fechaComoEntero = explode("/",$fechamovimiento);
																$diacargue = $fechaComoEntero[0];
																if($diacargue <= 15){
																	$quincenaentrega = 1;
																}else{
																	$quincenaentrega = 2;
																}
																//realizo la verificacion de todo el tema de liquidacion a mensajeros
																if($darbonidicacion != "SI"){

																	if($Dguia['MovGuiaBonificacionOK'] == "OK" || $Dguia['MovGuiaEstadodepago'] == "OK"){
																		$pago = $Dguia['MovGuiaPago'];
																		$bonificacion = "SI";
																		$quincenaentrega = $Dguia['MovGuiaQuincenaentrega'];
																	}else{
																		$bonificacion = "NO";




																		if($agente > 0){
																			//consulto los datos del agente en cuestion

																			$Datosagente = mainModel::ejecutar_consulta_simple("SELECT CuentaRol,CuentaTVinculo,CuentaJerarquia,CuentaTipoPago,CuentaPorcentaje FROM cuenta WHERE id ='$agente'");
																			$Dagente = $Datosagente->fetch();
																			if($Datosagente->rowCount()>=1){
																				$Tvinculo = $Dagente['CuentaTVinculo'];
																				$Jerarquia = $Dagente['CuentaJerarquia'];
																				$Rolatual = $Dagente['CuentaRol'];
																				$Porcentaje = $Dagente['CuentaPorcentaje'];
																				$TipoPago = $Dagente['CuentaTipoPago'];
																			}else{
																				$alerta=[
																					"Alerta"=>"simple",
																					"Titulo"=>"Ocurrio un error inesperado",
																					"Texto"=>"En la fila (".$i.") no fue posible verificar datos para liquidar movimiento a agente, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																					"Tipo"=>"error"

																				];
																				return mainModel::sweet_alert($alerta);
																				exit();

																			}

																		}else{
																			$agente = $_SESSION['CuentaId'];
																			//consulto los datos del agente logueado

																			$Datosagente = mainModel::ejecutar_consulta_simple("SELECT CuentaRol,CuentaTVinculo,CuentaJerarquia,CuentaTipoPago,CuentaPorcentaje FROM cuenta WHERE id ='$agente'");
																			$Dagente = $Datosagente->fetch();
																			if($Datosagente->rowCount()>=1){
																				$Tvinculo = $Dagente['CuentaTVinculo'];
																				$Jerarquia = $Dagente['CuentaJerarquia'];
																				$Rolatual = $Dagente['CuentaRol'];
																				$Porcentaje = $Dagente['CuentaPorcentaje'];
																				$TipoPago = $Dagente['CuentaTipoPago'];
																			}else{
																				$alerta=[
																					"Alerta"=>"simple",
																					"Titulo"=>"Ocurrio un error inesperado",
																					"Texto"=>"En la fila (".$i.") no fue posible verificar datos para liquidar movimiento a agente logueado, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																					"Tipo"=>"error"

																				];
																				return mainModel::sweet_alert($alerta);
																				exit();

																			}
																		}
																		//consulto zona para liquidar pago a mensajero
																		if($zona != ""){
																			$zonapago = $zona;
																		}else{
																			$zonapago = $Dguia['MovGuiaZona'];
																		}

																		//realizo consultas de porcentajes y zona de pago
																		//VALOR ZONA
																		$Valorzona = mainModel::ejecutar_consulta_simple("SELECT * FROM zona WHERE ZonaNombre ='$zonapago'");
																		$Vzona = $Valorzona->fetch();
																		if($Valorzona->rowCount()>=1){
																			if($TipoPago == "Base"){
																				$pago = $Vzona['ZonaSemana'] * ((100 + $Porcentaje) / 100);
																			}else{						
																				//PORCENTAJE DE VINCULO
																				$Porcentajevinculo = mainModel::ejecutar_consulta_simple("SELECT TVinculoPorcentaje FROM TVinculo WHERE id ='$Tvinculo'");
																				$Pvinculo = $Porcentajevinculo->fetch();
																				if($Porcentajevinculo->rowCount()>=1){
																					$Porcentaje = $Porcentaje + $Pvinculo['TVinculoPorcentaje'];

																					//PORCENTAJE DE JERARQUIA
																					$Porcentajejerarquia = mainModel::ejecutar_consulta_simple("SELECT JerarquiaPorcentaje FROM jerarquia WHERE id ='$Jerarquia'");
																					$Pjerarquia = $Porcentajejerarquia->fetch();
																					if($Porcentajejerarquia->rowCount()>=1){
																						$Porcentaje = $Porcentaje + $Pjerarquia['JerarquiaPorcentaje'];

																						//PORCENTAJE DE ROL
																						$Porcentajerol = mainModel::ejecutar_consulta_simple("SELECT RolPorcentaje FROM rol WHERE id ='$Rolatual'");
																						$Prol = $Porcentajerol->fetch();
																						if($Porcentajejerarquia->rowCount()>=1){
																							$Porcentaje = $Porcentaje + $Prol['RolPorcentaje'];

																							$pago = $Vzona['ZonaSemana'] * ((100 + $Porcentaje) / 100);
																						}else{
																							$alerta=[
																								"Alerta"=>"simple",
																								"Titulo"=>"Ocurrio un error inesperado",
																								"Texto"=>"En la fila (".$i.") no fue posible verificar el porcetaje sobre el rol, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																								"Tipo"=>"error"

																							];
																							return mainModel::sweet_alert($alerta);
																							exit();

																						}		
																					}else{
																						$alerta=[
																							"Alerta"=>"simple",
																							"Titulo"=>"Ocurrio un error inesperado",
																							"Texto"=>"En la fila (".$i.") no fue posible verificar el porcetaje sobre jerarquia, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																							"Tipo"=>"error"

																						];
																						return mainModel::sweet_alert($alerta);
																						exit();

																					}		
																				}else{
																					$alerta=[
																						"Alerta"=>"simple",
																						"Titulo"=>"Ocurrio un error inesperado",
																						"Texto"=>"En la fila (".$i.") no fue posible verificar el porcetaje sobre tipo de vinculo, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																						"Tipo"=>"error"

																					];
																					return mainModel::sweet_alert($alerta);
																					exit();

																				}	
																			}
																		}else{
																			$alerta=[
																				"Alerta"=>"simple",
																				"Titulo"=>"Ocurrio un error inesperado",
																				"Texto"=>"En la fila (".$i.") no fue posible verificar el valor base de la zona del documento, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																				"Tipo"=>"error"

																			];
																			return mainModel::sweet_alert($alerta);
																			exit();

																		}
																	}
																}
															}

															// realizo proceso de reasignacion si s eentrega en nueva direccion
															if(($novedad == "R - ASIGNADO" || $esvalidacion != "") && $Dguia['MovGuiaFacturadovalidacion'] != "FACTURADO"){

																$Tarifacliente = $Dcliente['ClienteTarifa'];
																//consulto el valor de la tarifa para reasignar
																$DatosVtarifaV = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '2'");
																$DVtarifaV = $DatosVtarifaV->fetch();
																if($DatosVtarifaV->rowCount()>=1){
																	$aviso = "OK";
																	$Consultaexitosa = "OK";

																	$validacion = "OK";
																	$facturadovalidacion = "SIN FACTURAR";
																	$estadovalidacion = "NO";
																	$fechareasignacion = date("Y-m-d");
																	$idtarifavalidacion = 2;
																	//almacene variables necesarias
																	$valortarifaV = $DVtarifaV['TarifaCValor'];
																	$codigoTarifaV = $DVtarifaV['TarifaCCodFacturacion'];
																}else{
																	$alerta=[
																		"Alerta"=>"simple",
																		"Titulo"=>"Ocurrio un error inesperado",
																		"Texto"=>"En la fila (".$i.") no fue posible consultar datos de reasignacion relacionados con esta guia, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																		"Tipo"=>"error"

																	];
																	return mainModel::sweet_alert($alerta);
																	exit();

																}

															}
															if($novedad == "ENTREGADO" || $novedad == "CERRADO" || $novedad == "DEVOLUCION" ){
																$avisonovedad= "OK";
															}

															$DatoREG=[
																"Remitente"=>$remitente,
																"Nit"=>$nit,
																"Nombreremitente"=>$Nombreremitente,
																"Dremitente"=>$dremitente,
																"Tiposervicio"=>$tiposervicio,
																"Radicado"=>$radicado,
																"Area"=>$area,
																"Destinatario"=>$destinatario,
																"Email"=>$email,
																"Municipio"=>$municipio,
																"Direccion"=>$direccion,
																"Referente"=>$referente,
																"Telefono"=>$telefono,
																"Cataporte"=>$cataporte,
																"Volumen"=>$volumen,
																"Volumenadd"=>$volumenadd,
																"Fecharecogida"=>$fecharecogida,
																"Fechafactura"=>$fechafactura,
																"Novedad"=>$novedad,
																"DetalleNovedad"=>$detallenovedad,
																"Agente"=>$agente,
																"FechaMovimiento"=>$fechamovimiento,
																"Hora"=>$hora,
																"Zona"=>$zona,
																"Tarifa"=>$tarifa,
																"Ndireccion"=>$Ndireccion,
																"Fechaasignado"=>$fechaasignado,
																"Valorcataporte"=>$valorcataporte,
																"Totalcataporte"=>$totalcataporte,
																"ValorAdicional"=>$valorVAdicional,
																"TotalVadicional"=>$totalVadicional,
																"Valortarifa"=>$valortarifa,
																"CodigoTarifa"=>$codigoTarifa,
																"Valortotalsincataporte"=>$valortotalsincataporte,
																"Valortotalguia"=>$valortotalguia,
																"Bonificacion"=>$bonificacion,
																"Pago"=>$pago,
																"Mesfactura"=>$mesfactura,
																"Novedadcataporte"=>$novedadcataporte,
																"Estadocataporte"=>$estadocataporte,
																"Idusuario"=>$idusuario,
																"Validacion"=>$validacion,
																"Facturadovalidacion"=>$facturadovalidacion,
																"Estadovalidacion"=>$estadovalidacion,
																"Fechareasignacion"=>$fechareasignacion,
																"ValortarifaV"=>$valortarifaV,
																"CodigoTarifaV"=>$codigoTarifaV,
																"Idtarifavalidacion"=>$idtarifavalidacion,
																"Fechacargue"=>$fechacargue,
																"Quincena"=>$quincenaentrega,
																"Nombreguia"=>$Nombreimgguia,
																"Nombrelugar"=>$Nombreimglugar,
																"NombreCataporte"=>$Nombreimgcataporte,
																"Idguia"=>$idguia

															];

															$actualizarguiaadmin = guiaModelo::actualizar_admin_guia_modelo($DatoREG,$aviso,$avisonovedad);
															if($actualizarguiaadmin->rowCount()>=1){
																if($i == $numRows){
																	$alerta=[
																		"Alerta"=>"simple",
																		"Titulo"=>"Registro exitoso",
																		"Texto"=>"La guia fue actualizada con exito",
																		"Tipo"=>"success"

																	];
																}
															}else{
																echo print_r($actualizarguiaadmin);
																$alerta=[
																	"Alerta"=>"simple",
																	"Titulo"=>"Ocurrio un error inesperado",
																	"Texto"=>"En la fila (".$i.") no se pudo actualizar la guia, por favor intente nuevamente la importación desde la fila (".$i.")",
																	"Tipo"=>"error"

																];
																return mainModel::sweet_alert($alerta);
																exit();	
															}
														}else{
															$alerta=[
																"Alerta"=>"simple",
																"Titulo"=>"Ocurrio un error inesperado",
																"Texto"=>"En la fila (".$i.") no fue posible saber el valor de la tarifa a aplicar en este servicio, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
																"Tipo"=>"error"

															];
															return mainModel::sweet_alert($alerta);
															exit();
														}
													}else{
														$alerta=[
															"Alerta"=>"simple",
															"Titulo"=>"Ocurrio un error inesperado",
															"Texto"=>"En la fila (".$i.") no fue posible saber cual es la tarifa a aplicar en este servicio, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
															"Tipo"=>"error"

														];
														return mainModel::sweet_alert($alerta);
														exit();
													}
												}else{
													$alerta=[
														"Alerta"=>"simple",
														"Titulo"=>"Ocurrio un error inesperado",
														"Texto"=>"En la fila (".$i.") no fue posible obtener valor de cataporte y volumen adicional., por favor digitelo y reinicie la importacion desde la fila (".$i.")",
														"Tipo"=>"error"

													];
													return mainModel::sweet_alert($alerta);
													exit();
												}
											}else{
												$alerta=[
													"Alerta"=>"simple",
													"Titulo"=>"Ocurrio un error inesperado",
													"Texto"=>"En la fila (".$i.") no fue posible consultar el cliente relacionado con esta guia, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
													"Tipo"=>"error"

												];
												return mainModel::sweet_alert($alerta);
												exit();	
											}
										}else{
											$alerta=[
												"Alerta"=>"simple",
												"Titulo"=>"Ocurrio un error inesperado",
												"Texto"=>"En la fila (".$i.") no fue posible consultar los datos de la guia, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
												"Tipo"=>"error"

											];
											return mainModel::sweet_alert($alerta);
											exit();
										}			
		
										
									}else{
										$alerta=[
											"Alerta"=>"simple",
											"Titulo"=>"Ocurrio un error inesperado",
											"Texto"=>"En la fila (".$i.") no se ha indicado la dirección o municipio de destino, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
											"Tipo"=>"error"

										];
										return mainModel::sweet_alert($alerta);
										exit();
									}		
								}else{
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"En la fila (".$i.") no se ha indicado el destinatario, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
										"Tipo"=>"error"

									];
									return mainModel::sweet_alert($alerta);
									exit();
								}				
							}else{
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"En la fila (".$i.") no se ha indicado el tipo de servicio, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
									"Tipo"=>"error"

								];
								return mainModel::sweet_alert($alerta);
								exit();
							}
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"En la fila (".$i.") no se ha indicado el codigo del remitente, por favor digitelo y reinicie la importacion desde la fila (".$i.")",
								"Tipo"=>"error"

							];
							return mainModel::sweet_alert($alerta);
							exit();
						}
					}
					//termina importacion de filas de guias
					
				}else{
					
					guiaModelo::eliminar_importacion_guia_modelo($codigo);
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Nofue posible subir el archivo, por favor vuelva a intentarlo.",
						"Tipo"=>"error"

					];	
				}
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No se pudo realizar el registro del archivo a importar.",
					"Tipo"=>"error"

				];
			}
			
			
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No ha seleccionado ningun archivo.",
				"Tipo"=>"error"

			];	
		}
		echo $Consecutioimpo ;
		return mainModel::sweet_alert($alerta);
		
	}
	
	//iniciar  exportacion para cargar imagenes
	public function exportar_Upimg_guia_controlador($datos){
		$app = SGBD;
		$general = SERVERURL;
		if($general == "SERVERURL"){
			require_once "../core/configGeneral.php";
		}
		if($app == "SGBD"){
			require_once "../core/configAPP.php";
		}

					
		$agente = mainModel::limpiar_cadena($datos['Agente']);
		$fechadesde = mainModel::limpiar_cadena($datos['Fechadesde']);
		$fechahahsta = mainModel::limpiar_cadena($datos['Fechahasta']);
		$guiadesde = mainModel::limpiar_cadena($datos['Guiadesde']);
		$guiahasta = mainModel::limpiar_cadena($datos['Guiahasta']);
		$tipo = mainModel::limpiar_cadena($datos['Tipo']);
		
		if($fechadesde == ""){$fechadesde = "2019-01-01";}
		if($fechahahsta == ""){$fechahahsta = "2099-12-31";}
		if($guiadesde == ""){$guiadesde = 0;}
		if($guiahasta == ""){$guiahasta = 1000000;}
		
		if($tipo == "SI"){
			$filtroconsecutivo = "AND MovGuiNumeroguia >='$guiadesde' AND MovGuiNumeroguia<='$guiahasta'";
		}else{
			$filtroconsecutivo = "AND id >='$guiadesde' AND id <='$guiahasta'";
		}

		if($agente == ""){
			$filtroagente = "";
		}else{
			$filtroagente = "AND MovGuiaAgente = '$agente'";
		}
		
		$consutotaLguias=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia  WHERE MovGuiaFecha_cargue >= '$fechadesde' AND MovGuiaFecha_cargue <= '$fechahahsta' $filtroconsecutivo $filtroagente");
		$numerototal=($consutotaLguias->rowCount())+1;

		$registros = 5000;
		$totalciclo = $numerototal / $registros;
		$totalciclo = ceil($totalciclo);
		
		
		
		$tabla.='
				<table class="table" border="1" cellpadding="2" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center">DOCUMENTO</th>
							<th class="text-center">NOVEDAD</th>
							<th class="text-center">AGENTE</th>
							<th class="text-center">FECHA ENTREGA</th>
							<th class="text-center">ID GUIA</th>
							
						</tr>
					</thead>
				<tbody>
		';
		for($i=1; $i<=$totalciclo;$i++){
				
			$inicio = (($i * $registros) - $registros);
			
			$consulta="SELECT MovGuiaGuia,MovGuiaNovedad,MovGuiaAgente,MovGuiaFentrega,id	FROM  Mov_guia WHERE MovGuiaFecha_cargue >= '$fechadesde' AND MovGuiaFecha_cargue <= '$fechahahsta' $filtroconsecutivo $filtroagente ORDER BY id ASC LIMIT $inicio,$registros";

			$conexion =mainModel::conectar();

			$datos = $conexion->query($consulta);
			$datos= $datos->fetchAll();

	
				foreach($datos as $rows){
					$tabla.='
						<tr>
							<td>'.$rows['MovGuiaGuia'].'</td>
							<td>'.$rows['MovGuiaNovedad'].'</td>
							<td>'.$rows['MovGuiaAgente'].'</td>
							<td>'.$rows['MovGuiaFentrega'].'</td>
							<td>'.$rows['id'].'</td>
							
						</tr>';
				}

				
		}
		$tabla.='
					</tbody>
				</table>
				';
		echo $tabla;
		
	}
	
	
	
	public function importar_imagenes_guias_guia_controlador(){
		$totalarchivos = 0;
		$conteo = 0;
		$conteonoup = 0;
		$tabla.='
				<table class="table" border="1" cellpadding="2" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center">NUMERO</th>
							<th class="text-center">ARCHIVO</th>
							<th class="text-center">DETALLE</th>
							
							
						</tr>
					</thead>
				<tbody>
		';
		foreach($_FILES["miarchivo-up"]['tmp_name'] as $key => $tmp_name){
			//condicional si el fuchero existe
			$totalarchivos = $totalarchivos + 1;
			$archivonombre = "";
			if($_FILES["miarchivo-up"]["name"][$key]) {
				// Nombres de archivos de temporales
				$archivonombre = $_FILES["miarchivo-up"]["name"][$key]; 
				$fuente = $_FILES["miarchivo-up"]["tmp_name"][$key]; 

				//$carpeta = '../foto/'; //Declaramos el nombre de la carpeta que guardara los archivos
				$carpeta  = SERVERFILE."adjuntos/img";
				$src = SERVERFILE."adjuntos/img/".$archivonombre;
				

				//$carpeta = '../foto/'; //Declaramos el nombre de la carpeta que guardara los archivos

				if(!file_exists($carpeta)){
					mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
				}

				$dir=opendir($carpeta);
				$target_path = $src; //indicamos la ruta de destino de los archivos

				
				if(move_uploaded_file($fuente, $target_path)) {	
					$conteo = $conteo + 1;
					$tabla.='
						<tr>
							<td>'.$totalarchivos.'</td>
							<td>'.$archivonombre.'</td>
							<td>Subido exitosamente</td>
							
							
						</tr>';
					} else {
					$conteonoup = $conteonoup +1;
					$tabla.='
						<tr>
							<td>'.$totalarchivos.'</td>
							<td>'.$archivonombre.'</td>
							<td>Subido exitosamente</td>
							
							
						</tr>';
				}
				closedir($dir); //Cerramos la conexion con la carpeta destino
			}
		}
		
		if($conteo > 0 && $conteonoup > 0 ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Se realizo el cargue de imagenes pero no fueron subidas todas las seleccionada, revise el resumen de cargue.",
				"Tipo"=>"error"

			];	
		
		}
		if(($conteo == 0 && $conteonoup == 0) || ($conteo == 0 && $conteonoup > 0 ) ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No se ha cargado ningun archivo al sistema.",
				"Tipo"=>"error"

			];	
		
		}
		if($conteo > 0 && $conteonoup == 0 ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Cargue exitoso",
				"Texto"=>"Se cargaron los archivos exitosamente.",
				"Tipo"=>"success"

			];	
		
		}
		echo $tabla;
		
		return mainModel::sweet_alert($alerta);
		
	}
	
	
	
	public function reasignar_guia_controlador(){
		$aviso = "NO";
		$idguia=mainModel::limpiar_cadena($_POST['idguia']);
		$zona=mainModel::limpiar_cadena($_POST['zona']);
		$agente=mainModel::limpiar_cadena($_POST['agente']);
		$Ndireccion=mainModel::limpiar_cadena($_POST['Ndireccion']);
		$novedad =mainModel::limpiar_cadena($_POST['novedad']);
		$fecharQR = date("Y-m-d");
		
		if($idguia != ""){
			if($zona != "" || $agente != ""){
				//consulto los datos del cliente en cuestion
				$Datoscataporte = mainModel::ejecutar_consulta_simple("SELECT * FROM Mov_guia WHERE id ='$idguia'");
				$Dcataporte = $Datoscataporte->fetch();

				// realizo proceso de reasignacion si s eentrega en nueva direccion
				if($Ndireccion != ""){
					$remitente = $Dcataporte['MovGuiaCodigocliente'];
					//consulto los datos del cliente en cuestion
					$Datoscliente = mainModel::ejecutar_consulta_simple("SELECT ClienteDNI,ClienteNombre,ClienteDireccion,ClienteTarifa,ClienteValor FROM cliente WHERE id ='$remitente'");
					$Dcliente = $Datoscliente->fetch();
					if($Datoscliente->rowCount()>=1){

						$Tarifacliente = $Dcliente['ClienteTarifa'];
						//consulto el valor de la tarifa para reasignar
						$DatosVtarifaV = mainModel::ejecutar_consulta_simple("SELECT TarifaCValor,TarifaCCodFacturacion FROM tarifacliente WHERE TarifaCCliente ='$Tarifacliente' AND TarifaCid = '2'");
						$DVtarifaV = $DatosVtarifaV->fetch();
						if($DatosVtarifaV->rowCount()>=1){
							$aviso = "OK";
							$Consultaexitosa = "OK";

							$validacion = "OK";
							$facturadovalidacion = "SIN FACTURAR";
							$estadovalidacion = "NO";
							$fechareasignacion = date("Y-m-d");
							$idtarifavalidacion = 2;

						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No fue posible consultar datos de reasignacion relacionados con esta guia.",
								"Tipo"=>"error"

							];
							return mainModel::sweet_alert($alerta);
							exit();

						}
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No fue posible consultar el cliente relacionado con esta guia.",
							"Tipo"=>"error"

						];
						return mainModel::sweet_alert($alerta);
						exit();

					}
				}

				//almacene variables necesarias
				$valortarifaV = $DVtarifaV['TarifaCValor'];
				$codigoTarifaV = $DVtarifaV['TarifaCCodFacturacion'];
				
				//creo el array para actualizar guia
				$DatoREG=[
					"Zona"=>$zona,
					"agente"=>$agente,
					"Ndireccion"=>$Ndireccion,
					"Novedad"=>$novedad,
					"Validacion"=>$validacion,
					"Facturadovalidacion"=>$facturadovalidacion,
					"Estadovalidacion"=>$estadovalidacion,
					"Fechareasignacion"=>$fechareasignacion,
					"ValortarifaV"=>$valortarifaV,
					"CodigoTarifaV"=>$codigoTarifaV,
					"Idtarifavalidacion"=>$idtarifavalidacion,
					"FechaQR"=>$fecharQR,
					"Idguia"=>$idguia

				];

				$reasignarguia = guiaModelo::reasignar_guia_modelo($DatoREG,$aviso);
				if($reasignarguia->rowCount()>=1){

					
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No se pudo reasignar la guia, por favor intente nuevamente.",
						"Tipo"=>"error"

					];
				}


			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No ha seleccionado la zona ni el agente, seleccione almenos uno de los dos.",
					"Tipo"=>"error"

				];	



			}
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"No he indicado la guia a reasignar, digitelo y vuelva a intentar.",
				"Tipo"=>"error"

			];	

		}
		
		
		return mainModel::sweet_alert($alerta);
	}
	
	
	//imprimir guias 
	public function imprimir_guias_guia_controlador($codigo,$guiaDesde,$guiaHasta,$ImpoDesde,$ImpoHasta){
		$app = SGBD;
		$general = SERVERURL;
		if($general == "SERVERURL"){
			require_once "../core/configGeneral.php";
		}
		if($app == "SGBD"){
			require_once "../core/configAPP.php";
		}

		
		$codigo = mainModel::limpiar_cadena($codigo);
		$guiaDesde = mainModel::limpiar_cadena($guiaDesde);
		$guiaHasta = mainModel::limpiar_cadena($guiaHasta);
		$ImpoDesde = mainModel::limpiar_cadena($ImpoDesde);
		$ImpoHasta = mainModel::limpiar_cadena($ImpoHasta);
		
		
		if($ImpoDesde != ""){
			$consutotaLguias=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia  WHERE MovGuiaId_impo >= '$ImpoDesde' AND MovGuiaId_impo <= '$ImpoHasta'");
		}else{
			$consutotaLguias=mainModel::ejecutar_consulta_simple("SELECT id FROM Mov_guia  WHERE MovGuiaCodigo LIKE '%$codigo%' AND id >= '$guiaDesde' AND id <= '$guiaHasta'");
		}
		
		
		
		$numerototal=($consutotaLguias->rowCount())+1;

		$registros = 5000;
		$totalciclo = $numerototal / $registros;
		$totalciclo = ceil($totalciclo);


		for($i=1; $i<=$totalciclo;$i++){

			$inicio = (($i * $registros) - $registros);
			
			if($ImpoDesde != ""){
				$consulta="SELECT *	FROM  Mov_guia WHERE MovGuiaId_impo >= '$ImpoDesde' AND MovGuiaId_impo <= '$ImpoHasta' ORDER BY id ASC LIMIT $inicio,$registros";
			}else{
				$consulta="SELECT *	FROM  Mov_guia WHERE MovGuiaCodigo LIKE '%$codigo%' AND id >= '$guiaDesde' AND id <= '$guiaHasta' ORDER BY id ASC LIMIT $inicio,$registros";
			}
			
			$conexion =mainModel::conectar();

			$datos = $conexion->query($consulta);
			$datos= $datos->fetchAll();

				require_once  SERVERFILE.'codeQr/phpqrcode/qrlib.php';
			
				foreach($datos as $rows){
					
					

					$dir = SERVERFILE.'codeQr/temp/';
					$dir1 = SERVERURL.'codeQr/temp/';

					if(!file_exists($dir)){
						mkdir($dir);
					}

					$ImgQr = $dir.$rows['id'].'.png';
					$ImgQRdir = $dir1.$rows['id'].'.png';

					$tamano = 2.8;
					$level = 'M';
					$framesize = 1;
					$contenido = $rows['id'];

					QRcode::png($contenido,$ImgQr,$level,$tamano,$framesize);
					
					$tabla.='
						<div class="guia bordelrbt">
							<div class="desprendible border">
								<center>
									<div class="W200 H22 IZQ borde1 negrilla">
										A. Masiva No: '.$rows['id'].'
									</div>
								
									<div class="W200 H22 IZQ borde1 negrilla">
										Remitente:
									</div>
								</center>
								<div class="W200 H46 IZQ borde1">
									'.$rows['MovGuiaNombreremitente'].'
								</div>
								<center>
									<div class="W112 H22 IZQ borde1 border">
										TELEFONO
									</div>
									<div class="W112 H22 IZQ borde1">
										'.$rows['MovGuiaTelefonoRemitente'].'
									</div>
									<div class="W200 H22 IZQ borde1 negrilla">
										Destinatario:
									</div>
								</center>
								<div class="W200 H41 IZQ borde1">
									'.$rows['MovGuiaDestinatario'].'
								</div>
								<div class="W200 H41 IZQ borde1">
									'.$rows['MovGuiaDireccion'].'
								</div>
								<center>
									<div class="W200 H22 IZQ borde1 negrilla">
										Observación:
									</div>
								</center>
								<div class="W200 H46 IZQ borde1">
									'.$rows['MovGuiaDetallenovedad'].'
								</div>
								<center>
									<div class="W200 H75 IZQ borde1">
										<img width="160" height="66" src="'.SERVERURL.'vistas/assets/img/logo.jpg" />
									</div>
								
									<div class="W200 H40 IZQ borde1 negrilla">

											<small>
												domiserviciosaburra@hotmail.com <br>
												www.domiservicios.com
											</small>

									</div>
									<div class="W200 H40 IZQ negrilla">
										Teléfonos: 3007781283 - <br> 3147574431
									</div>
								</center>
							</div>
							<div class="separador "></div>
							<div class="separador bordedisc border"></div>
							<div class="desprendibleC ">

								<div class="titulos border">
									<div class="W100 H22 borde1">
										Remitente:
									</div>
									<div class="W100 H46 borde1">
										Direccion:
									</div>
									<div class="W100 H22 borde1">
										Radicado:
									</div>
									<div class="W100 H22 borde1">
										Destino:
									</div>
									<div class="W100 H22 borde1">
										Direccion:
									</div>
									<div class="W100 H22 borde1">
										Telefono:

									</div>
									<div class="W100 H70 borde1 negrilla letra">
										<div class="W100 H19 "></div>
										Recibe:
										<div class="W100 H19 "></div>
									</div>
									<div class="W100 H22 borde1">
										Fecha:
									</div>
									<div class="W100 H22 borde1">
										Cerrado 1:
									</div>
									<div class="W100 H22 borde1">
										Cerrado 2:
									</div>
									<div class="W100 H22 borde1">
										No Reside:
									</div>
									<div class="W100 H30 borde1">
										Dirección Mala:
									</div>
									<div class="W100 H40 borde1">
										Motivo de Devolucion:
									</div>

								</div>
								<div class="detallecentral border">
									<div class="W400 H22 IZQ borde1">
										'.$rows['MovGuiaNombreremitente'].'
								  </div>
									<div class="W400 H46 IZQ borde1">
										'.$rows['MovGuiaDireccionremitente'].'
								  </div>
									<div class="W264 H22 IZQ borde1 border">
										'.$rows['MovGuiaRadicado'].'
								  </div>
									<div class="W32 H22 IZQ borde1 border">
										Area
									</div>
									<div class="W98 H22 IZQ borde1">
										 '.$rows['MovGuiaArea'].'
								  </div>
									<div class="W400 H22 IZQ borde1">
										'.$rows['MovGuiaDestinatario'].'
								  </div>
									<div class="W400 H22 IZQ borde1">
										'.$rows['MovGuiaDireccion'].'
								  </div>
									<div class="W400 H22 IZQ borde1">
										'.$rows['MovGuiaTelefono'].'
								  </div>
								  
									<div class="W398 H70 IZQ1 borde1 ">
										
										  	<img width="400" height="81" src="'.SERVERURL.'vistas/assets/img/firma.png" />
										  
								  </div>
								  <center>
										<div class="W138 H22 IZQ borde1 border">
											<texto class="lightfont">DD/MM/AAAA</texto>
										</div>
										<div class="W138 H22 IZQ borde1 border">
											Hora:<texto class="lightfont"> HH:MM </texto>
										</div>
										<div class="W188 H22 IZQ borde1 border">
											Detalle
										</div>
										<div class="W35 H22 IZQ borde1 ">

										</div>
										<div class="W138 H22 IZQ borde1 border">
											<texto class="lightfont">DD/MM/AAAA</texto>
										</div>
										<div class="W138 H22 IZQ borde1 border">
											Hora:<texto class="lightfont"> HH:MM </texto>
										</div>
										<div class="W188 H22 IZQ borde1 border">

										</div>
										<div class="W35 H22 IZQ borde1 ">

										</div>
										<div class="W138 H22 IZQ borde1 border">
											<texto class="lightfont">DD/MM/AAAA</texto>
										</div>
										<div class="W138 H22 IZQ borde1 border">
											Hora:<texto class="lightfont"> HH:MM </texto>
										</div>
										<div class="W188 H22 IZQ borde1 border">

										</div>
										<div class="W35 H22 IZQ borde1 ">

										</div>
										<div class="W138 H22 IZQ borde1 border">
											<texto class="lightfont">DD/MM/AAAA</texto>
										</div>
										<div class="W138 H22 IZQ borde1 border">
											Hora:<texto class="lightfont"> HH:MM </texto>
										</div>
										<div class="W188 H22 IZQ borde1 border">

										</div>
										<div class="W35 H22 IZQ borde1 ">

										</div>
										<div class="W138 H30 IZQ borde1 border">
											<texto class="lightfont">DD/MM/AAAA</texto>
										</div>
										<div class="W138 H30 IZQ borde1 border">
											Hora:<texto class="lightfont"> HH:MM </texto>
										</div>
										<div class="W31 H30 IZQ borde1 border">
											<texto class="lightfont"> CL </texto>
										</div>
										<div class="W31 H30 IZQ borde1 border">
											<texto class="lightfont"> KR </texto>
										</div>
										<div class="W31 H30 IZQ borde1 border">
											<texto class="lightfont"> NN </texto>
										</div>
										<div class="W29 H30 IZQ borde1 border">
											<texto class="lightfont"> IN </texto>
										</div>
									</center>
									<div class="W35 H30 IZQ borde1">
										
									</div>
									<div class="W400 H40 IZQ borde1">

									</div>

								</div>
								<div class="detallefinal border">
									<center>
										<div class="W228 H52 IZQ borde1 border">
											<div class="W228 H22 IZQ borde1">
												A. Masiva No.
											</div>
											<div class="W228 H45 IZQ negrilla letra">
												'.$rows['id'].'
											</div>
										</div>
										<div class="W131 H52 IZQ borde1 negrilla">
											'.$rows['MovGuiaCodigo'].'<img src="'.$ImgQRdir.'" />'.$rows['MovGuiaCodigo'].'
										</div>
										<div class="W126 H22 IZQ borde1 border negrilla">
											Forma de pago
										</div>
										<div class="W216 H22 IZQ borde1 negrilla">
											Contado
										</div>
										<div class="W114 H22 IZQ border borde1">
											Cataporte 
										</div>

										<div class="W114 H22 IZQ border borde1">
											Volumen 
										</div>
										<div class="W116 H22 IZQ borde1">
											Referente 
										</div>
										<div class="W114 H22 IZQ borde1 border">
											'.$rows['MovGuiaVolumen'].'
										</div>
										<div class="W114 H22 IZQ borde1 border">
											'.$rows['MovGuiaCataporte'].'
										</div>
										<div class="W116 H22 IZQ borde1">
											'.$rows['MovGuiaReferente'].'
										</div>
										<div class="W114 H22 IZQ borde1 border">
											Origen 
										</div>
										<div class="W114 H22 IZQ borde1 border">
											Destino 
										</div>
										<div class="W116 H22 IZQ borde1">
											Valor 
										</div>
										<div class="W114 H22 IZQ borde1 border">
											'.$rows['MovGuiaCiudadRemitente'].'
										</div>
										<div class="W114 H22 IZQ borde1 border">
											'.$rows['MovGuiaMunicipio'].'
										</div>
										<div class="W116 H22 IZQ borde1">

										</div>
										
									</center>
									
									<div class="W320 H550 IZQ1 borde1">
										<div class="W320 H300 IZQ1 ">
											<img width="270" height="120" src="'.SERVERURL.'vistas/assets/img/logo.jpg" />
										</div>
										<div class="W320 H200 IZQ negrilla">
											<div class="W100 H61 IZQ negrilla">
												<br>
												&nbsp Nit: <br>
												&nbsp Ciudad: <br>
												&nbsp Teléfono: <br>
											</div>
											<div class="W180 H61 IZQ negrilla">	
												<br>
												 71745316-8 <br>
												 Sabaneta - Antioquia <br>
												 3007781283 - 3147574431 <br>
											</div>
											<center>
												domiserviciosaburra@hotmail.com <br>
												www.domiservicios.com
											</center>
												
											
										</div>
									</div>
								</div>
								<div class="W320 H49 IZQ border">

								</div>
								<div class="W320 H49 IZQ border">

								</div>
								<div class="W185 H49 IZQ border">

								</div>
							</div>
							
							<div class="separador "></div>
							<div class="separador bordedisc border"></div>
							<div class="desprendible">
								<center>
									<div class="W200 H22 IZQ borde1 negrilla">
										A. Masiva No: '.$rows['id'].'
									</div>
								
									<div class="W200 H22 IZQ borde1 negrilla">
										Remitente:
									</div>
								</center>
								<div class="W200 H46 IZQ borde1">
									'.$rows['MovGuiaNombreremitente'].'
								</div>
								<center>
									<div class="W112 H22 IZQ borde1 border">
										TELEFONO
									</div>
									<div class="W112 H22 IZQ borde1">
										'.$rows['MovGuiaTelefonoRemitente'].'
									</div>
									<div class="W200 H22 IZQ borde1 negrilla">
										Destinatario:
									</div>
								</center>
								<div class="W200 H41 IZQ borde1">
									'.$rows['MovGuiaDestinatario'].'
								</div>
								<div class="W200 H41 IZQ borde1">
									'.$rows['MovGuiaDireccion'].'
								</div>
								<center>
									<div class="W200 H22 IZQ borde1 border negrilla">
										Observación:
									</div>
								</center>
								<div class="W112 H22 IZQ borde1 border">
										Fecha Visita
								</div>
								<div class="W112 H22 IZQ borde1">
									<texto class="lightfont">DD/MM/AAAA</texto>
								</div>
								<div class="W112 H22 IZQ borde1 border">
									Novedad Visita
								</div>
								<div class="W112 H22 IZQ borde1">
									
								</div>
								<center>
									<div class="W200 H75 IZQ borde1">
										<img width="160" height="66" src="'.SERVERURL.'vistas/assets/img/logo.jpg" />
									</div>
								
									<div class="W200 H40 IZQ borde1 negrilla">

											<small>
												domiserviciosaburra@hotmail.com <br>
												www.domiservicios.com
											</small>

									</div>
									<div class="W200 H40 IZQ negrilla">
										Teléfonos: 3007781283 - <br> 3147574431
									</div>
								</center>
							</div>
						</div>
						<div class="saltopagina"> - </div>
						';
				}


		}
		
		echo utf8_encode($tabla);

	}
	
	
	//resumen de cargue de guas a mensajero individual
	public function resumencargumen_guia_controlador($Idagente,$fechacargue){
		
		$Idagente = mainModel::limpiar_cadena($Idagente);
		$fechacargue = mainModel::limpiar_cadena($fechacargue);
		
		
		
		if($Idagente != "" && $fechacargue != ""){
			
			
			$resumencargue = mainModel::ejecutar_consulta_simple("SELECT * FROM Mov_guia WHERE MovGuiaAgente ='$Idagente' AND MovGuiaFechaQrMensajero = '$fechacargue'");
			$Totalcargue = $resumencargue->fetch();
			
			$totalguias = $resumencargue->rowCount();
			
		}
		
		return $totalguias;
	}
	
	
	
	

}