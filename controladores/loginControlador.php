<?php


if($peticionAjax){
		require_once "../modelos/loginModelo.php";
	}else{
		require_once "./modelos/loginModelo.php";
	}

	class loginControlador extends loginModelo{
		public function iniciar_sesion_controlador(){
			
			
			$usuario=mainModel::limpiar_cadena($_POST['usuario']);
			$clave=mainModel::limpiar_cadena($_POST['clave']);
			
			$clave=mainModel::encryption($clave);
				
			$datosLogin=[
				"Usuario"=>$usuario,
				"Clave"=>$clave,
			];
			$datosCuenta=loginModelo::iniciar_sesion_modelo($datosLogin);
			if($datosCuenta->rowCount()==1){
				$row=$datosCuenta->fetch();
				
				$fechaactual=date("Y-m-d");
				$yearActual=date("Y");
				$horaActual=date("H:i:s");
				
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT id FROM bitacora");
				$numero=($consulta1->rowCount())+1;
				
				$codigoB=mainModel::generar_codigo_aleatorio("CB",7,$numero);
				
				$datosBitacora=[
					"Codigo"=>$codigoB,
					"Fecha"=>$fechaactual,
					"HoraInicio"=>$horaActual,
					"HoraFinal"=>'Sin Registro',
					"Tipo"=>$row['CuentaTipo'],
					"Year"=>$yearActual,
					"Cuenta"=>$row['CuentaCodigo']
				];
				$insertarBitacora=mainModel::guardar_bitacora($datosBitacora);
				
				
				
				
				if($insertarBitacora->rowCount()>=1){
					$tablaconsultar = $row['CuentaTablaVinculo'];
					if($row['CuentaTipo'] == "Administrador"){
						$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM admin WHERE CuentaCodigo = '".$row['CuentaCodigo']."'");
					}else{
						$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM $tablaconsultar WHERE CuentaCodigo = '".$row['CuentaCodigo']."'");
					}
					
					
					$_SESSION['usuario_dsa']=$row['CuentaUsuario'];
					if($query1->rowCount()==1){
						session_start(['name'=>'DSA']);
						$UserData=$query1->fetch();
						
						if($tablaconsultar == "admin"){
							$_SESSION['nombre_dsa'] = $UserData['AdminNombre'];
							$_SESSION['apellido_dsa'] = $UserData['AdminApellido'];
						}
						if($tablaconsultar == "cliente"){
							$_SESSION['nombre_dsa'] = $UserData['ClienteNombre'];
							$_SESSION['apellido_dsa'] = $UserData['ClienteApellido'];
						}
						if($tablaconsultar == "clienteC"){
							$_SESSION['nombre_dsa'] = $UserData['ClienteCNombre'];
							$_SESSION['apellido_dsa'] = $UserData['ClienteCApellido'];
							
							$querycliente=mainModel::ejecutar_consulta_simple("SELECT * FROM cliente WHERE ClienteCodigo = '".$UserData['ClienteCodigo']."'");
							$UserDCliente=$querycliente->fetch();
							if($querycliente->rowCount()==1){
								$_SESSION['idcliente'] = $UserDCliente['id'];
							}
							
						}
						if($tablaconsultar == "adminCdr"){
							$_SESSION['nombre_dsa'] = $UserData['AdminCdrNombre'];
							$_SESSION['apellido_dsa'] = $UserData['AdminCdrApellido'];
						}
						
						$_SESSION['usuario_dsa']=$row['CuentaUsuario'];
						$_SESSION['tipo_dsa']=$row['CuentaTipo'];
						$_SESSION['privilegio_dsa']=$row['CuentaPrivilegio'];
						$_SESSION['foto_dsa']=$row['CuentaFoto'];
						$_SESSION['token_dsa']=md5(uniqid(mt_rand(),true));
						$_SESSION['codigo_cuenta_dsa']=$row['CuentaCodigo'];
						$_SESSION['compania_codigo']=$row['CompaniaCodigo'];
						$_SESSION['codigo_bitacora_dsa']=$codigoB;
						$_SESSION['CuentaId']=$row['id'];
						$_SESSION['sesionactiva'] = true;
						
						$queryPrivilegios = mainModel::ejecutar_consulta_simple("SELECT * FROM  Privilegio WHERE CuentaCodigo = '".$row['CuentaCodigo']."'");
						if($queryPrivilegios->rowCount()==1){
							$UserPrivilegios=$queryPrivilegios->fetch();
							
							$_SESSION['Pri_paginainicio'] = $UserPrivilegios['PrivilegioPaginaInicio'];//ver dashboard
							$_SESSION['Pri_dashboard'] = $UserPrivilegios['PrivilegioDashboard'];//ver dashboard
							$_SESSION['Pri_integrantes'] =  $UserPrivilegios['PrivilegioIntegrantes'];//ver integrandes en dashboard
							$_SESSION['Pri_Bitacora'] =  $UserPrivilegios['PrivilegioBitacora'];//ver bitacora en dashboard
							$_SESSION['Pri_tareas'] = $UserPrivilegios['PrivilegioTareas'];//ver tareas
							$_SESSION['Pri_nuevoproyecto'] = $UserPrivilegios['PrivilegioNewProyecto'];//crear nuevos proyectos
							$_SESSION['Pri_nuevatarea'] = $UserPrivilegios['PrivilegioNewTarea'];//crear nuevas tareas
							$_SESSION['Pri_editartarea'] = $UserPrivilegios['PrivilegioEditarTarea'];//editar tareas ya creadas
							$_SESSION['Pri_archivartarea'] = $UserPrivilegios['PrivilegioArchivartarea'];//archivar tareas
							$_SESSION['Pri_eliminartarea'] = $UserPrivilegios['PrivilegioEliminarTarea'];//eliminar tareas
							$_SESSION['Pri_administracion'] = $UserPrivilegios['PrivilegioAdministracion'];//modulo de administracion empresas, compañias y cdr
							$_SESSION['Pri_empresas'] = $UserPrivilegios['PrivilegioEmpresa'];//modulo de empresas
							$_SESSION['Pri_nuevaempresa'] = $UserPrivilegios['PrivilegioNewEmpresa'];//nueva empresa
							$_SESSION['Pri_listempresasactivas'] = $UserPrivilegios['PrivilegioListempresasOk'];//listado empresas activas
							$_SESSION['Pri_listempresasdelete'] = $UserPrivilegios['PrivilegioEmpresasDelete'];//listado empresas eliminadas
							$_SESSION['Pri_editarempresa'] = $UserPrivilegios['PrivilegioEditarEmpresa'];//editar empresas
							$_SESSION['Pri_eliminarempresa'] = $UserPrivilegios['PrivilegioEliminarEmpresa'];//eliminar empresas
							$_SESSION['Pri_activarempresa'] = $UserPrivilegios['PrivilegioActivarEmpresa'];//activar empresas
							$_SESSION['Pri_companias'] = $UserPrivilegios['PrivilegioCompania'];//Modulo compañias
							$_SESSION['Pri_nuevaCompania'] = $UserPrivilegios['PrivilegioNewCompania'];//nueva Compania
							$_SESSION['Pri_listcompaniasactivas'] = $UserPrivilegios['PrivilegioListCompaniasOk'];//listado Companias activas
							$_SESSION['Pri_listcompaniasdelete'] = $UserPrivilegios['PrivilegioCompaniasDelete'];//listado Companias eliminadas
							$_SESSION['Pri_editarcompania'] = $UserPrivilegios['PrivilegioEditarCompania'];//editar Companias
							$_SESSION['Pri_eliminarcompania'] = $UserPrivilegios['PrivilegioEliminarCompania'];//eliminar Companias
							$_SESSION['Pri_activarcompania'] = $UserPrivilegios['PrivilegioActivarCompania'];//activar Companias
							$_SESSION['Pri_cdr'] = $UserPrivilegios['PrivilegioDdr'];//modulo CDR
							$_SESSION['Pri_nuevaCdr'] = $UserPrivilegios['PrivilegioNewCdr'];//nueva Cdr
							$_SESSION['Pri_listCdrsactivos'] = $UserPrivilegios['PrivilegioListCdrsOk'];//listado Cdrs activas
							$_SESSION['Pri_listCdrsdelete'] = $UserPrivilegios['PrivilegioCdrsDelete'];//listado Cdrs eliminadas
							$_SESSION['Pri_editarCdr'] = $UserPrivilegios['PrivilegioEditarCdr'];//editar Cdrs
							$_SESSION['Pri_eliminarCdr'] = $UserPrivilegios['PrivilegioEliminarCdr'];//eliminar Cdrs
							$_SESSION['Pri_activarCdr'] = $UserPrivilegios['PrivilegioActivarCdr'];//activar Cdrs
							$_SESSION['Pri_usuarios'] = $UserPrivilegios['PrivilegioUsuario'];//modulo usuarios
							$_SESSION['Pri_empleados'] = $UserPrivilegios['PrivilegioEmpleados'];//modulo usuarios empleados y contratistas
							$_SESSION['Pri_nuevaCuentaEmpleados'] = $UserPrivilegios['PrivilegioNewCuentaEmpleados'];//nueva CuentaEmpleado
							$_SESSION['Pri_listCuentaEmpleadosactivos'] = $UserPrivilegios['PrivilegioListCuentaEmpleadosOk'];//listado CuentaEmpleados activas
							$_SESSION['Pri_listCuentaEmpleadosdelete'] = $UserPrivilegios['PrivilegioCuentaEmpleadosDelete'];//listado CuentaEmpleados eliminEmpleados
							$_SESSION['Pri_eliminarCuentaEmpleados'] = $UserPrivilegios['PrivilegioEliminarCuentaEmpleados'];//eliminar CuentaEmpleados
							$_SESSION['Pri_activarCuentaEmpleados'] = $UserPrivilegios['PrivilegioActivarCuentaEmpleados'];//activar CuentaEmpleados
							$_SESSION['Pri_buscarcuentasEmpleados'] = $UserPrivilegios['PrivilegiobuscarCuentaEmpleados'];//buscar cuentaempleado
							$_SESSION['Pri_clientes'] = $UserPrivilegios['PrivilegioClientes'];//modulo usuarios Clientes
							$_SESSION['Pri_nuevoClientes'] = $UserPrivilegios['PrivilegioNewClientes'];//nueva  Cliente
							$_SESSION['Pri_listClientesactivos'] = $UserPrivilegios['PrivilegioListClientesOk'];//listado Clientes activas
							$_SESSION['Pri_listClientesdelete'] = $UserPrivilegios['PrivilegioClientesDelete'];//listado Empleados eliminClientes
							$_SESSION['Pri_eliminarClientes'] = $UserPrivilegios['PrivilegioEliminarClientes'];//eliminar Clientes
							$_SESSION['Pri_activarClientes'] = $UserPrivilegios['PrivilegioActivarClientes'];//activar Clientes
							$_SESSION['Pri_buscarClientes'] = $UserPrivilegios['PrivilegiobuscarClientes'];//buscar  Cliente
							$_SESSION['Pri_cuentasClientes'] = $UserPrivilegios['PrivilegioCuentasClientes'];//cuentas del cdrr
							$_SESSION['Pri_nuevaCuentaClientes'] = $UserPrivilegios['PrivilegioNewCuentaClientes'];//nueva CuentaCliente
							$_SESSION['Pri_listCuentaClientesactivos'] = $UserPrivilegios['PrivilegioListCuentaClientesOk'];//listado CuentaClientes activas
							$_SESSION['Pri_listCuentaClientesdelete'] = $UserPrivilegios['PrivilegioCuentaClientesDelete'];//listado CuentaEmpleados eliminClientes
							$_SESSION['Pri_eliminarCuentaClientes'] = $UserPrivilegios['PrivilegioEliminarCuentaClientes'];//eliminar CuentaClientes
							$_SESSION['Pri_activarCuentaClientes'] = $UserPrivilegios['PrivilegioActivarCuentaClientes'];//activar CuentaClientes
							$_SESSION['Pri_buscarcuentasClientes'] = $UserPrivilegios['PrivilegiobuscarCuentaClientes'];//buscar cuenta Cliente
							$_SESSION['Pri_adminCDR'] = $UserPrivilegios['PrivilegioAdminCdr'];//modulo usuarios CDRS
							$_SESSION['Pri_cuentasCdr'] = $UserPrivilegios['PrivilegioCuentasCdr'];//cuentas del cdrr
							$_SESSION['Pri_nuevaCuentaCdr'] = $UserPrivilegios['PrivilegioNewCuentaCdr'];//nueva CuentaCdr
							$_SESSION['Pri_listCuentaCdrsactivos'] = $UserPrivilegios['PrivilegioListCuentaCdrsOk'];//listado CuentaCdrs activas
							$_SESSION['Pri_listCuentaCdrsdelete'] = $UserPrivilegios['PrivilegioCuentaCdrsDelete'];//listado CuentaCdrs eliminadas
							$_SESSION['Pri_eliminarCuentaCdr'] = $UserPrivilegios['PrivilegioEliminarCuentaCdr'];//eliminar CuentaCdrs
							$_SESSION['Pri_activarCuentaCdr'] = $UserPrivilegios['PrivilegioActivarCuentaCdr'];//activar CuentaCdrs
							$_SESSION['Pri_buscarcuentasCdr'] = $UserPrivilegios['PrivilegiobuscarCuentaCdr'];//buscar cuenta CDR
							
							$_SESSION['Pri_tipofiltro'] = $UserPrivilegios['PrivilegioTipoFiltro'];
							$_SESSION['Pri_guias'] = $UserPrivilegios['PrivilegioGuia'];//modulo guias
							$_SESSION['Pri_nuevaGuia'] = $UserPrivilegios['PrivilegioNewGuia'];//nueva Guia
							$_SESSION['Pri_clientenocorporativo'] = $UserPrivilegios['PrivilegioNocorporativo'];//nueva Guia
							$_SESSION['Pri_listGuiasactivos'] = $UserPrivilegios['PrivilegioListGuiasOk'];//listado Guias activas
							$_SESSION['Pri_listGuiasdelete'] = $UserPrivilegios['PrivilegioGuiasDelete'];//listado Guias eliminadas
							$_SESSION['Pri_editarGuiaMensajero'] = $UserPrivilegios['PrivilegioEditarGuiaMensajero'];//editar guias
							$_SESSION['Pri_editarGuiaAdmin'] = $UserPrivilegios['PrivilegioEditarGuiaAdmin'];//editar guias
							$_SESSION['Pri_eliminarGuia'] = $UserPrivilegios['PrivilegioEliminarGuia'];//eliminar guias
							$_SESSION['Pri_activarGuia'] = $UserPrivilegios['PrivilegioActivarGuia'];//activar guias
							$_SESSION['Pri_ImprimirGuia'] = $UserPrivilegios['PrivilegioImprimirGuia'];//eliminar guias
							$_SESSION['Pri_SoporteGuia'] = $UserPrivilegios['PrivilegioSoporteGuia'];//activar guias
							$_SESSION['Pri_buscarGuias'] = $UserPrivilegios['PrivilegiobuscarGuias'];//buscar guias
							$_SESSION['Pri_masFunionesGuias'] = $UserPrivilegios['PrivilegioMasFunionesGuias'];//mas funciones guias
							
							$_SESSION['Pri_servicios']  = $UserPrivilegios['PrivilegioTiposervicios'];//tipo de servicios
							$_SESSION['Pri_asignaragente']  = $UserPrivilegios['Privilegioasignaragente'];//asignar agente en nueva guia
							$_SESSION['Pri_asignarazona']  = $UserPrivilegios['Privilegioasignarazona'];//asignar zona en nueva guia
							$_SESSION['Pri_asignaratarifa']  = $UserPrivilegios['Privilegioasignaratarifa'];//asignar tarifa en nueva guia
							$_SESSION['Pri_asignarffactura']  = $UserPrivilegios['PrivilegioAsignarFfactura'];//asignar fecha de facturacion
							$_SESSION['Pri_asignarnuevadireccion']  = $UserPrivilegios['PrivilegioNewDireccion'];//asignar nueva direccion
							$_SESSION['Pri_bonificacion']  = $UserPrivilegios['PrivilegioDarBono'];//dar bonificacion sobre guia
							
							//permiso de filtros
							$_SESSION['Pri_filtromensajero']  = $UserPrivilegios['PrivilegioEliminarGuia'];
							$_SESSION['Pri_filtronovedad']  = $UserPrivilegios['PrivilegioGuia'];
							$_SESSION['Pri_filtrozona']  = $UserPrivilegios['PrivilegioEliminarGuia'];
							$_SESSION['Pri_filtrotipofecha']  = $UserPrivilegios['PrivilegioEliminarGuia'];
							$_SESSION['Pri_filtrotiposervicio']  = $UserPrivilegios['PrivilegioEliminarGuia'];
							$_SESSION['Pri_filtrofecha']  = $UserPrivilegios['PrivilegioGuia'];
							
							$_SESSION['Pri_planillas'] = $UserPrivilegios['PrivilegioPlanillas'];//modulo de planillas
							$_SESSION['Pri_recogidas'] = $UserPrivilegios['PrivilegioRecogidas'];//modulo de recogidas
							$_SESSION['Pri_soluciones'] = $UserPrivilegios['PrivilegioSoluciones'];//modulo de soluciones
							$_SESSION['Pri_Tableroalertas'] = $UserPrivilegios['PrivilegioTablaAlertas'];
							$_SESSION['Pri_VisorImgIndividual'] = $UserPrivilegios['PrivilegioVisorImagen'];
							$_SESSION['Pri_ResumenDiario'] = $UserPrivilegios['PrivilegioResumenDiario'];
							/*$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];
							$_SESSION['Pri_'] = $UserPrivilegios['Privilegio'];*/
							
							
							
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No hemos podido iniciar la sesión por problemas técnicos, por favor intente nuevamente.",
								"Tipo"=>"error"

							];
							return mainModel::sweet_alert($alerta);
							exit;
						}
							
						$url = SERVERURL.$_SESSION['Pri_paginainicio']."/";
						
						return $urllocation='<script> window.location="'.$url.'"</script>';
						
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No hemos podido iniciar la sesión por problemas técnicos, por favor intente nuevamente.",
							"Tipo"=>"error"

						];
						return mainModel::sweet_alert($alerta);
					}
					
					
					
				}else{
					$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido iniciar la sesión por problemas técnicos, por favor intente nuevamente.",
					"Tipo"=>"error"

				];
				return mainModel::sweet_alert($alerta);
					echo $usuario.'<br>'.$clave;
				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El nombre de usuario y contraseña no son correctos o su cuenta puede estar deshabilitada.",
					"Tipo"=>"error"

				];
				return mainModel::sweet_alert($alerta);
			}
		}
		
		public function cerrar_sesion_controlador(){
			session_start(['name'=>'DSA']);
			$token=mainModel::decryption($_GET['Token']);
			$hora=date("H:i:s");
			$datos=[
				"Usuario"=>$_SESSION['usuario_dsa'],
				"Token_S"=>$_SESSION['token_dsa'],
				"Token"=>$token,
				"Codigo"=>$_SESSION['codigo_bitacora_dsa'],
				"Hora"=>$hora
			];
			return loginModelo::cerrar_sesion_modelo($datos);
		}
		
		public function forzar_cierre_sesion_controlador(){
			session_unset();
			session_destroy();
			$redirect='<script>window.location.href="'.SERVERURL.'login/" </script>';
			return $redirect;		
		}
		
		public function redireccionar_usuario_controlador($tipo){
			if($tipo == "Administrador"){
				$redirect='<script>window.location.href="'.SERVERURL.'home/" </script>';
			}else{
				$redirect='<script>window.location.href="'.SERVERURL.'catalog/" </script>';
			}
			return $redirect;
		}
	}