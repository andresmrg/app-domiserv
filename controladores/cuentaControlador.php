<?php

if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class cuentaControlador extends mainModel{
		
		public function datos_cuenta_controlador($codigo,$tipo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);
			
			if($tipo == "admin"){
				$tipo="Administrador";
			}else{
				$tipo="Cliente";
			}
			
			return mainModel::datos_cuenta($codigo,$tipo);
		}
		
		public function actualizar_cuenta_controlador(){
			$CuentaCodigo = mainModel::decryption($_POST['CodigoCuente-up']);
			$CuentaTipo = mainModel::decryption($_POST['tipoCuenta-up']);
			
			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM cuenta WHERE CuentaCodigo = '$CuentaCodigo'");
			
			$DatosCuenta=$query1->fetch();
			
			$user=mainModel::limpiar_cadena($_POST['userLog-up']);
			$password=mainModel::limpiar_cadena($_POST['passwordLog-up']);
			$password=mainModel::encryption($password);
			
			if($user != "" && $password != "" ){
				if(isset($_POST['privilegio-up'])){
					$login=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta WHERE CuentaUsuario = '$user' AND CuentaClave = '$password'");
				}else{
					$login=mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta WHERE CuentaUsuario = '$user' AND CuentaClave = '$password' AND CuentaCodigo = '$CuentaCodigo'");
				}
				
				if($login->rowCount() == 0){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El nombre de usuario y contraseña que acaba de ingresar no coinciden con los datos de su cuenta.",
						"Tipo"=>"error"

					];
					return mainModel:: sweet_alert($alerta);
					exit();
				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Para actualizar los datos de la cuenta es necesario ingresar el usuario y la contraseña actual, por favor ingrese los datos e intente nuevamente.",
					"Tipo"=>"error"

				];
				return mainModel:: sweet_alert($alerta);
				exit();
			}
			
			//VERIFICAR SI EL USUARIO Y AEXISTE
			$CuentaUsuario = mainModel::limpiar_cadena($_POST['usuario-up']);
			if($CuentaUsuario!= $DatosCuenta['CuentaUsuario']){
				$query2=mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario = '$CuentaUsuario'");
				
				if($query2->rowCount()>= 1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El nombre de usuario que acaba de ingresar ya se encuentra registrado en el sistema.".$CuentaUsuario."usuario".$DatosCuenta['CuentaUsuario'],
						"Tipo"=>"error"

					];
					return mainModel:: sweet_alert($alerta);
					exit();
				}
			}
			//VERIFICAR SI EL EMAIL Y AEXISTE
			$CuentaEmail = mainModel::limpiar_cadena($_POST['email-up']);
			if($CuentaEmail!= $DatosCuenta['CuentaEmail']){
				$query3=mainModel::ejecutar_consulta_simple("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail = '$CuentaEmail'");
				
				if($query3->rowCount()>= 1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Email que acaba de ingresar ya se encuentra registrado en el sistema.",
						"Tipo"=>"error"

					];
					return mainModel:: sweet_alert($alerta);
					exit();
				}
			}
			
			$CuentaGenero = mainModel::limpiar_cadena($_POST['optionsGenero-up']);
			if(isset($_POST['optionsEstado-up'])){
				$CuentaEstado = mainModel::limpiar_cadena($_POST['optionsEstado-up']);
			}else{
				$CuentaEstado = $DatosCuenta['CuentaEstado'];
			}
			
			if($CuentaTipo == "Administrador"){
				
				//si es administrador entonces todo esto
				if(isset($_POST['optionsPrivilegio-up'])){
					$CuentaPrivilegio=mainModel::decryption($_POST['optionsPrivilegio-up']);
				}else{
					$CuentaPrivilegio = $DatosCuenta['CuentaPrivilegio'];
				}
				
				$CuentaFoto=$DatosCuenta['CuentaFoto'];
				/*if($CuentaGenero == "Masculino"){
					$CuentaFoto="Male3Avatar.png";
				}else{
					$CuentaFoto="Female3Avatar.png";
				}*/
			}else{
				//si es cliente
				$CuentaPrivilegio = $DatosCuenta['CuentaPrivilegio'];
				$CuentaFoto=$DatosCuenta['CuentaFoto'];
				/*if($CuentaGenero == "Masculino"){
					$CuentaFoto="Male2Avatar.png";
				}else{
					$CuentaFoto="Female2Avatar.png";
				}*/
			}
			
			//verificar cambio de clave
			$passwordN1= mainModel::limpiar_cadena($_POST['newPassword1-up']);
			$passwordN2= mainModel::limpiar_cadena($_POST['newPassword2-up']);
			
			if($passwordN1!="" || $passwordN2!=""){
				if($passwordN1 == $passwordN2){
					$CuentaClave=mainModel::encryption($passwordN1);
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Las nuevas contraseñas no coinciden, por favor verifique los datos e intente nuevamente.",
						"Tipo"=>"error"

					];
					return mainModel:: sweet_alert($alerta);
					exit();
				}
			}else{
				$CuentaClave = $DatosCuenta['CuentaClave'];
			}
			
			//enviando datos al modelo
			
			$DatosUpdate=[
				"CuentaPrivilegio"=>$CuentaPrivilegio,
				"CuentaCodigo"=>$CuentaCodigo,
				"CuentaUsuario"=>$CuentaUsuario,
				"CuentaClave"=>$CuentaClave,
				"CuentaEmail"=>$CuentaEmail,
				"CuentaEstado"=>$CuentaEstado,
				"CuentaGenero"=>$CuentaGenero,
				"CuentaFoto"=>$CuentaFoto
			];
			if(mainModel::actualizar_cuenta($DatosUpdate)){
				if(!isset($_POST['privilegio-up'])){
					session_start(['name'=>'DSA']);
					$_SESSION['usuario_dsa'] = $CuentaUsuario;
					$_SESSION['foto_dsa'] = $CuentaFoto;
				}
				$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Cuenta actualizada",
						"Texto"=>"Los datos de la cuenta se actualizaron con exíto.",
						"Tipo"=>"success"

					];	
			}else{
				$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Lo sentimos no hemos podido actualizar los datos de la cuenta.",
						"Tipo"=>"error"

					];	
			}
			return mainModel:: sweet_alert($alerta);
			
		}
		
		public function crear_formulario_cuenta_controlador(){
		$tipo = $_POST['tipo1'];
		$Codigo = $_POST['codigo1'];
			
		$Codigo=mainModel::decryption($Codigo);	
		$tipo=mainModel::decryption($tipo);	
			
		$tipo=mainModel::limpiar_cadena($tipo);
		$Codigo=mainModel::limpiar_cadena($Codigo);
			
		$cdata = mainModel::datos_cuenta($Codigo,$tipo);
		$campos = $cdata->fetch();
			
		if($cdata->rowCount()>= 1){
			
		}else{
			//echo 
			$campos = 0;
		}
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
		
			
			
			
		/*$forma = "";
		if($cdata->rowCount()>= 1){
			$forma.='
				
				<input type="hidden" name="CodigoCuente-up" value="'.$_POST['codigo1'].'">
				<input type="hidden" name="tipoCuenta-up" value="'.$_POST['tipo1'].'">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
					    		<div class="form-group label-floating">
								  	<label class="control-label">Nombre de usuario</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-up" value="'.$campos['CuentaUsuario'].'" required="" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">E-mail</label>
								  	<input class="form-control" type="email" name="email-up" value="'.$campos['CuentaEmail'].'" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsGenero-up"';
											if($campos['CuentaGenero'] == "Masculino"){
												$forma.='checked=""' ;
											}
												$forma.=' value="Masculino" >
												
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsGenero-up"';
											if($campos['CuentaGenero'] == "Femenino"){
												$forma.= 'checked=""' ;
											}
											$forma.='value="Femenino" >
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
		    				</div>';
							
							if($_SESSION['tipo_dsa'] == "Administrador" && $_SESSION['privilegio_dsa'] == 1 && $campos['id'] != 1){
								$forma.='<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label class="control-label">Estado de la cuenta</label>
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="optionsEstado-up"';
													if($campos['CuentaEstado'] == "Activo"){
														$forma.='checked=""' ;
													}
													$forma.='value="Activo" >
												<i class="zmdi zmdi-lock-open"></i> &nbsp; Activo
											</label>
										</div>
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="optionsEstado-up"';
													if($campos['CuentaEstado'] == "Deshabilitado"){
														$forma.='checked=""' ;
													}
												$forma.='value="Deshabilitado"  >
												<i class="zmdi zmdi-lock"></i> &nbsp; Deshabilitado
											</label>
										</div>
									</div>
								</div>';
							 }
							
		    			$forma.='</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-lock"></i> &nbsp; Actualizar Contraseña</legend>
		    		<p>
		    			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo minima cupiditate tempore nobis. Dolor, blanditiis, mollitia. Alias fuga fugiat molestias debitis odit, voluptatibus explicabo quia sequi doloremque numquam dignissimos quis.
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
				if($_SESSION['tipo_dsa'] == "Administrador" && $_SESSION['privilegio_dsa'] == 1 && $campos['id'] != 1 && $campos['CuantaTipo'] == "Administrador" && $datos[1] == "admin"){
		    	$forma.='<fieldset>
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
									<input type="radio" name="optionsPrivilegio-up" value="'.mainModel::encryption(1).'"';
										
										if($campos['CuentaPrivilegio'] == 1){ 
											$forma.='checked=""';
										}
					
										$forma.='<i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="optionsPrivilegio-up" value="'.mainModel::encryption(2).'"';
										if($campos['CuentaPrivilegio'] == 2){
											$forma.='checked=""';
										}
										$forma.='<i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="optionsPrivilegio-up" value="'.mainModel::encryption(3).'"';
										if($campos['CuentaPrivilegio'] == 3){
											$forma.='checked=""';
										}
										$forma.='<i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
									</label>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>';
					}
				$forma.='<br>
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
					
				
						
			
			';
		}else{
			/*$forma.='
				<div class="alert alert-dismissible alert-primary text-center">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
					<h4>¡Lo sentimos!</h4>
					<p>No pudimos encontrar ningun Empleado con la información brindada.</p>
				</div>
			';
		}*/
		//return $forma;
	}
	}