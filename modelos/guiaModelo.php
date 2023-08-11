<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class guiaModelo extends mainModel{
		// CREAR GUIA 
		protected function agregar_guia_modelo($datos,$aviso){
			$Tiposervicio=$datos["Tiposervicio"];
			$Radicado=$datos["Radicado"];
			$Area=$datos["Area"];
			$Destinatario=$datos["Destinatario"];
			$Direccion=$datos["Direccion"];
			$Municipio=$datos["Municipio"];
			$Cataporte=$datos["Cataporte"];
			$Valorcataporte=$datos["Valorcataporte"];
			$Totalcataporte=$datos["Totalcataporte"];
			$Volumen=$datos["Volumen"];
			$Volumenadd=$datos["Volumenadd"];
			$TotalVadicional=$datos["TotalVadicional"];
			$Referente=$datos["Referente"];
			$Telefono=$datos["Telefono"];
			$Fecharecogida=$datos["Fecharecogida"];
			$novedad = $datos['Novedad'];
			$observaciones = $datos["Observaciones"];
			$Agente=$datos["Agente"];
			$Zona=$datos["Zona"];
			$Tarifa=$datos["Tarifa"];
			$Valortarifa=$datos["Valortarifa"];
			$Valortotalsincataporte=$datos["Valortotalsincataporte"];
			$Valortotalguia=$datos["Valortotalguia"];
			$Bonificacion=$datos["Bonificacion"];
			$Cargarbonificacion=$datos["Cargarbonificacion"];
			$Ndireccion=$datos["Ndireccion"];
			$Tiposervicio=$datos["Tiposervicio"];
			$Fechatrabajo=$datos["Fechatrabajo"];
			$Mestrabajo=$datos["Mestrabajo"];
			$Nit=$datos["Nit"];
			$Nombreremitente=$datos["Nombreremitente"];
			$Dremitente=$datos["Dremitente"];
			$ciudadremitente = $datos['CiudadRemitente'];
			$telefonoremitente = $datos['Telefonoremitente'];
			$Email=$datos["Email"];
			$Fechaasignado=$datos["Fechaasignado"];
			$Novedadcataporte=$datos["Novedadcataporte"];
			$Estadocataporte=$datos["Estadocataporte"];
			$Remitente=$datos["Remitente"];
			$CodigoTarifa=$datos["CodigoTarifa"];
			$Idusuario=$datos["Idusuario"];
			$Fechafactura=$datos["Fechafactura"];
			$Mesfactura=$datos["Mesfactura"];
			$Validacion=$datos["Validacion"];
			$Facturadovalidacion=$datos["Facturadovalidacion"];
			$Estadovalidacion=$datos["Estadovalidacion"];
			$Idtarifavalidacion=$datos["Idtarifavalidacion"];
			$ValortarifaV=$datos["ValortarifaV"];
			$ValortarifaV=$datos["ValortarifaV"];
			$Fechareasignacion=$datos["Fechareasignacion"];
			$CodigoTarifaV=$datos["CodigoTarifaV"];
			$CodigoMovGuia=$datos["CodigoMovGuia"];
			$idimpo = $datos["IdImpo"];

			if($aviso == "OK"){
				$sql=mainModel::conectar()->prepare("INSERT INTO Mov_guia(MovGuiaGuia,MovGuiaRadicado,MovGuiaArea,MovGuiaDestinatario,MovGuiaDireccion,MovGuiaMunicipio,MovGuiaCataporte,MovGuiaValor,MovGuiaTotalcataporte,MovGuiaVolumen,MovGuiaVvolumenadicional,MovGuiaTotaladicional,MovGuiaReferente,MovGuiaTelefono,MovGuiaFecha_recogida,MovGuiaNovedad,MovGuiaDetallenovedad,MovGuiaAgente,MovGuiaZona,MovGuiaIdtarifa,MovGuiaValortarifa,MovGuiaValortotalguiasincataporte,MovGuiaValortotalguia,MovGuiaPago,MovGuiaBonificacionOK,MovGuiaNdireccion,MovGuiaCodigo,MovGuiaFechatrabajo,MovGuiaMestrabajo,MovGuiaNit,MovGuiaNombreremitente,MovGuiaDireccionremitente,MovGuiaTelefonoRemitente,MovGuiaCiudadRemitente,MovGuiaCorreodestino,MovGuiaFasignacion,MovGuiaNovedadcataporte,MovGuiaEstadocataporte,MovGuiaCodigocliente,MovGuiaCodigofacturacion,MovGuiaId_usuario,MovGuiaFecha_factura,MovGuiaMes_factura,MovGuiaValidacion,MovGuiaFacturadovalidacion,MovGuiaEstadovalidacion,MovGuiaTarifavalidacion,MovGuiaTarifavalidar,MovGuiaValortotalvalidacion,MovGuiaFreasignacion,MovGuiaCodigofacturavalidacion,MovGuiaId_impo,MovCodigoGuia)VALUES(:Tiposervicio,:Radicado,:Area,:Destinatario,:Direccion,:Municipio,:Cataporte,:Valorcataporte,:Totalcataporte,:Volumen,:Volumenadd,:TotalVadicional,:Referente,:Telefono,:Fecharecogida,:Novedad,:Observaciones,:Agente,:Zona,:Tarifa,:Valortarifa,:Valortotalsincataporte,:Valortotalguia,:Bonificacion,:Cargarbonificacion,:Ndireccion,:Tiposervicio,:Fechatrabajo,:Mestrabajo,:Nit, :Nombreremitente,:Dremitente,:TelefonoRemitente,:CiudadRemitente,:Email,:Fechaasignado,:Novedadcataporte,:Estadocataporte,:Remitente,:CodigoTarifa,:Idusuario,:Fechafactura,:Mesfactura,:Validacion,:Facturadovalidacion,:Estadovalidacion,:Idtarifavalidacion,:ValortarifaV,:ValortarifaV,:Fechareasignacion,:CodigoTarifaV,:IdImpo,:CodigoMovGuia)" );
				
			
					
				$sql->bindParam(":Tiposervicio",$datos["Tiposervicio"]);
				$sql->bindParam(":Radicado",$datos["Radicado"]);
				$sql->bindParam(":Area",$datos["Area"]);
				$sql->bindParam(":Destinatario",$datos["Destinatario"]);
				$sql->bindParam(":Direccion",$datos["Direccion"]);
				$sql->bindParam(":Municipio",$datos["Municipio"]);
				$sql->bindParam(":Cataporte",$datos["Cataporte"]);
				$sql->bindParam(":Valorcataporte",$datos["Valorcataporte"]);
				$sql->bindParam(":Totalcataporte",$datos["Totalcataporte"]);
				$sql->bindParam(":Volumen",$datos["Volumen"]);
				$sql->bindParam(":Volumenadd",$datos["Volumenadd"]);
				$sql->bindParam(":TotalVadicional",$datos["TotalVadicional"]);
				$sql->bindParam(":Referente",$datos["Referente"]);
				$sql->bindParam(":Telefono",$datos["Telefono"]);
				$sql->bindParam(":Fecharecogida",$datos["Fecharecogida"]);
				$sql->bindParam(":Novedad",$datos['Novedad']);
				$sql->bindParam(":Observaciones",$datos["Observaciones"]);
				$sql->bindParam(":Agente",$datos["Agente"]);
				$sql->bindParam(":Zona",$datos["Zona"]);
				$sql->bindParam(":Tarifa",$datos["Tarifa"]);
				$sql->bindParam(":Valortarifa",$datos["Valortarifa"]);
				$sql->bindParam(":Valortotalsincataporte",$datos["Valortotalsincataporte"]);
				$sql->bindParam(":Valortotalguia",$datos["Valortotalguia"]);
				$sql->bindParam(":Bonificacion",$datos["Bonificacion"]);
				$sql->bindParam(":Cargarbonificacion",$datos["Cargarbonificacion"]);
				$sql->bindParam(":Ndireccion",$datos["Ndireccion"]);
				$sql->bindParam(":Tiposervicio",$datos["Tiposervicio"]);
				$sql->bindParam(":Fechatrabajo",$datos["Fechatrabajo"]);
				$sql->bindParam(":Mestrabajo",$datos["Mestrabajo"]);
				$sql->bindParam(":Nit",$datos["Nit"]);
				$sql->bindParam(":Nombreremitente",$datos["Nombreremitente"]);
				$sql->bindParam(":Dremitente",$datos["Dremitente"]);
				$sql->bindParam(":TelefonoRemitente",$datos["Telefonoremitente"]);
				$sql->bindParam(":CiudadRemitente",$datos["CiudadRemitente"]);
				$sql->bindParam(":Email",$datos["Email"]);
				$sql->bindParam(":Fechaasignado",$datos["Fechaasignado"]);
				$sql->bindParam(":Novedadcataporte",$datos["Novedadcataporte"]);
				$sql->bindParam(":Estadocataporte",$datos["Estadocataporte"]);
				$sql->bindParam(":Remitente",$datos["Remitente"]);
				$sql->bindParam(":CodigoTarifa",$datos["CodigoTarifa"]);
				$sql->bindParam(":Idusuario",$datos["Idusuario"]);
				$sql->bindParam(":Fechafactura",$datos["Fechafactura"]);
				$sql->bindParam(":Mesfactura",$datos["Mesfactura"]);
				$sql->bindParam(":Validacion",$datos["Validacion"]);
				$sql->bindParam(":Facturadovalidacion",$datos["Facturadovalidacion"]);
				$sql->bindParam(":Estadovalidacion",$datos["Estadovalidacion"]);
				$sql->bindParam(":Idtarifavalidacion",$datos["Idtarifavalidacion"]);
				$sql->bindParam(":ValortarifaV",$datos["ValortarifaV"]);
				$sql->bindParam(":ValortarifaV",$datos["ValortarifaV"]);
				$sql->bindParam(":Fechareasignacion",$datos["Fechareasignacion"]);
				$sql->bindParam(":CodigoTarifaV",$datos["CodigoTarifaV"]);
				$sql->bindParam(":IdImpo",$datos["IdImpo"]);
				$sql->bindParam(":CodigoMovGuia",$datos["CodigoMovGuia"]);	
			}else{
				//$sql=mainModel::conectar()->prepare("INSERT INTO Mov_guia(MovGuiaGuia,MovGuiaRadicado,MovGuiaArea,MovGuiaDestinatario,MovGuiaDireccion,MovGuiaMunicipio,MovGuiaCataporte,MovGuiaValor,MovGuiaTotalcataporte,MovGuiaVolumen,MovGuiaVvolumenadicional,MovGuiaTotaladicional,MovGuiaReferente,MovGuiaTelefono,MovGuiaFecha_recogida,MovGuiaNovedad,MovGuiaDetallenovedad,MovGuiaAgente,MovGuiaZona,MovGuiaIdtarifa,MovGuiaValortarifa,MovGuiaValortotalguiasincataporte,MovGuiaValortotalguia,MovGuiaPago,MovGuiaBonificacionOK,MovGuiaNdireccion,MovGuiaCodigo,MovGuiaFechatrabajo,MovGuiaMestrabajo,MovGuiaNit,MovGuiaNombreremitente,MovGuiaDireccionremitente,MovGuiaTelefonoRemitente,MovGuiaCiudadRemitente,MovGuiaCorreodestino,MovGuiaFasignacion,MovGuiaNovedadcataporte,MovGuiaEstadocataporte,MovGuiaCodigocliente,MovGuiaCodigofacturacion,MovGuiaId_usuario,MovGuiaFecha_factura,MovGuiaMes_factura,MovGuiaId_impo,MovCodigoGuia)VALUES(:Tiposervicio,:Radicado,:Area,:Destinatario,:Direccion,:Municipio,:Cataporte,:Valorcataporte,:Totalcataporte,:Volumen,:Volumenadd,:TotalVadicional,:Referente,:Telefono,:Fecharecogida,:Novedad,:Observaciones,:Agente,:Zona,:Tarifa,:Valortarifa,:Valortotalsincataporte,:Valortotalguia,:Bonificacion,:Cargarbonificacion,:Ndireccion,:Tiposervicio,:Fechatrabajo,:Mestrabajo,:Nit, :Nombreremitente,:Dremitente,:TelefonoRemitente,:CiudadRemitente,:Email,:Fechaasignado,:Novedadcataporte,:Estadocataporte,:Remitente,:CodigoTarifa,:Idusuario,:Fechafactura,:Mesfactura,:IdImpo,:CodigoMovGuia)" );
				
				$sql=mainModel::conectar()->prepare("INSERT INTO Mov_guia(MovGuiaGuia,MovGuiaRadicado,MovGuiaArea,MovGuiaDestinatario,MovGuiaDireccion,MovGuiaMunicipio,MovGuiaCataporte,MovGuiaValor,MovGuiaTotalcataporte,MovGuiaVolumen,MovGuiaVvolumenadicional,MovGuiaTotaladicional,MovGuiaReferente,MovGuiaTelefono,MovGuiaFecha_recogida,MovGuiaNovedad,MovGuiaDetallenovedad,MovGuiaAgente,MovGuiaZona,MovGuiaIdtarifa,MovGuiaValortarifa,MovGuiaValortotalguiasincataporte,MovGuiaValortotalguia,MovGuiaPago,MovGuiaBonificacionOK,MovGuiaNdireccion,MovGuiaCodigo,MovGuiaFechatrabajo,MovGuiaMestrabajo,MovGuiaNit,MovGuiaNombreremitente,MovGuiaDireccionremitente,MovGuiaTelefonoRemitente,MovGuiaCiudadRemitente,MovGuiaCorreodestino,MovGuiaFasignacion,MovGuiaNovedadcataporte,MovGuiaEstadocataporte,MovGuiaCodigocliente,MovGuiaCodigofacturacion,MovGuiaId_usuario,MovGuiaFecha_factura,MovGuiaMes_factura,MovGuiaId_impo,MovCodigoGuia)VALUES('$Tiposervicio','$Radicado','$Area','$Destinatario','$Direccion','$Municipio','$Cataporte','$Valorcataporte','$Totalcataporte','$Volumen','$Volumenadd','$TotalVadicional','$Referente','$Telefono','$Fecharecogida','$novedad','$observaciones','$Agente','$Zona','$Tarifa','$Valortarifa','$Valortotalsincataporte','$Valortotalguia','$Bonificacion','$Cargarbonificacion','$Ndireccion','$Tiposervicio','$Fechatrabajo','$Mestrabajo','$Nit','$Nombreremitente','$Dremitente','$telefonoremitente','$ciudadremitente','$Email','$Fechaasignado','$Novedadcataporte','$Estadocataporte','$Remitente','$CodigoTarifa','$Idusuario','$Fechafactura','$Mesfactura','$idimpo','$CodigoMovGuia')" );
					
				
				$sql->bindParam(":Tiposervicio",$datos["Tiposervicio"]);
				$sql->bindParam(":Radicado",$datos["Radicado"]);
				$sql->bindParam(":Area",$datos["Area"]);
				$sql->bindParam(":Destinatario",$datos["Destinatario"]);
				$sql->bindParam(":Direccion",$datos["Direccion"]);
				$sql->bindParam(":Municipio",$datos["Municipio"]);
				$sql->bindParam(":Cataporte",$datos["Cataporte"]);
				$sql->bindParam(":Valorcataporte",$datos["Valorcataporte"]);
				$sql->bindParam(":Totalcataporte",$datos["Totalcataporte"]);
				$sql->bindParam(":Volumen",$datos["Volumen"]);
				$sql->bindParam(":Volumenadd",$datos["Volumenadd"]);
				$sql->bindParam(":TotalVadicional",$datos["TotalVadicional"]);
				$sql->bindParam(":Referente",$datos["Referente"]);
				$sql->bindParam(":Telefono",$datos["Telefono"]);
				$sql->bindParam(":Fecharecogida",$datos["Fecharecogida"]);
				$sql->bindParam(":Novedad",$datos['Novedad']);
				$sql->bindParam(":Observaciones",$datos["Observaciones"]);
				$sql->bindParam(":Agente",$datos["Agente"]);
				$sql->bindParam(":Zona",$datos["Zona"]);
				$sql->bindParam(":Tarifa",$datos["Tarifa"]);
				$sql->bindParam(":Valortarifa",$datos["Valortarifa"]);
				$sql->bindParam(":Valortotalsincataporte",$datos["Valortotalsincataporte"]);
				$sql->bindParam(":Valortotalguia",$datos["Valortotalguia"]);
				$sql->bindParam(":Bonificacion",$datos["Bonificacion"]);
				$sql->bindParam(":Cargarbonificacion",$datos["Cargarbonificacion"]);
				$sql->bindParam(":Ndireccion",$datos["Ndireccion"]);
				$sql->bindParam(":Tiposervicio",$datos["Tiposervicio"]);
				$sql->bindParam(":Fechatrabajo",$datos["Fechatrabajo"]);
				$sql->bindParam(":Mestrabajo",$datos["Mestrabajo"]);
				$sql->bindParam(":Nit",$datos["Nit"]);
				$sql->bindParam(":Nombreremitente",$datos["Nombreremitente"]);
				$sql->bindParam(":Dremitente",$datos["Dremitente"]);
				$sql->bindParam(":TelefonoRemitente",$datos["Telefonoremitente"]);
				$sql->bindParam(":CiudadRemitente",$datos["CiudadRemitente"]);
				$sql->bindParam(":Email",$datos["Email"]);
				$sql->bindParam(":Fechaasignado",$datos["Fechaasignado"]);
				$sql->bindParam(":Novedadcataporte",$datos["Novedadcataporte"]);
				$sql->bindParam(":Estadocataporte",$datos["Estadocataporte"]);
				$sql->bindParam(":Remitente",$datos["Remitente"]);
				$sql->bindParam(":CodigoTarifa",$datos["CodigoTarifa"]);
				$sql->bindParam(":Idusuario",$datos["Idusuario"]);
				$sql->bindParam(":Fechafactura",$datos["Fechafactura"]);
				$sql->bindParam(":Mesfactura",$datos["Mesfactura"]);
				$sql->bindParam(":IdImpo",$datos["IdImpo"]);
				$sql->bindParam(":CodigoMovGuia",$datos["CodigoMovGuia"]);	
			}
				
			
			$sql->execute();
			return $sql;
			
			
			
			
		}
		
		// CARGAR MENSAJEROS
		protected function mensajero_select_guia_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT cuenta.id, (admin.AdminNombre) as CuentaNombre, (admin.AdminApellido) as CuentaApellido, cuenta.CuentaAgente, cuenta.CuentaEstado FROM admin LEFT JOIN cuenta ON cuenta.CuentaCodigo = admin.CuentaCodigo HAVING cuenta.CuentaAgente = 1 AND cuenta.CuentaEstado = 'Activo' AND cuenta.id > '1'  ");
			}elseif($tipo == "Select1"){
				$sql = mainModel::conectar()->prepare("SELECT (Mov_guia.MovGuiaAgente) as id, (admin.AdminNombre) as CuentaNombre, (admin.AdminApellido) as CuentaApellido  FROM Mov_guia LEFT JOIN cuenta ON Mov_guia.MovGuiaAgente = cuenta.id LEFT JOIN admin ON cuenta.CuentaCodigo = admin.CuentaCodigo GROUP BY Mov_guia.MovGuiaAgente, admin.AdminNombre,admin.AdminApellido");
			}
			$sql->execute();
			return $sql;
			
		}
		//CARGAS CLIENTES PARA GENERARLES PALNILLA
		protected function cliente1_select_guia_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				
			}elseif($tipo == "Conteo"){
			}elseif($tipo == "Select"){
				
				$sql = mainModel::conectar()->prepare("SELECT cuenta.id, (clienteC.ClienteCNombre) as CuentaNombre, (clienteC.ClienteCApellido) as CuentaApellido, cuenta.CuentaAgente, cuenta.CuentaEstado FROM  clienteC LEFT JOIN cuenta  ON cuenta.CuentaCodigo = clienteC.CuentaCodigo HAVING cuenta.CuentaAgente = 1 AND cuenta.CuentaEstado = 'Activo' AND cuenta.id > '1' ");
				
				
			}elseif($tipo == "Select1"){
			}
			$sql->execute();
			return $sql;
			
		}
		// CARGAR NOVEDAD
		protected function novedad_select_guia_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM novedad WHERE NovedadFormulario LIKE '%$codigo%' ");
				
			}
			$sql->execute();
			return $sql;
			
		}
		// CARGAR ZONA
		protected function zona_select_guia_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT ZonaNombre FROM zona");
				
			}
			$sql->execute();
			return $sql;
			
		}
		// CARGAR SERVICIOS
		protected function servicios_select_guia_modelo($tipo,$codigo,$tipos){
			session_start(['name'=>'DSA']);
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				if($tipos == "E"){
					$usuario = $_SESSION['CuentaId'];
					$sql = mainModel::conectar()->prepare("SELECT ServicioCodigo, ServicioNombre FROM servicios_usu WHERE ServicioFormulario LIKE '%$codigo%' AND ServicioUsuario = '$usuario'");
				}else{
					$sql = mainModel::conectar()->prepare("SELECT ServicioCodigo, ServicioNombre FROM servicios WHERE ServicioFormulario LIKE '%$codigo%'");
				}
			}
			$sql->execute();
			return $sql;
			
		}
		// CARGAR CLIENTE
		protected function cliente_select_guia_modelo($tipo,$codigo,$tipocliente){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				
				if($tipocliente != ""){
					$tipocliente = "AND ClienteGrupo = '$tipocliente'";	
				}
				
				if($codigo != ""){
					$cliente = "AND id = '$codigo'";
					
				}
				$sql = mainModel::conectar()->prepare("SELECT id, ClienteNombre FROM cliente WHERE ClienteEstado = 'Activo' $tipocliente $cliente");
				
			}
			$sql->execute();
			return $sql;
			
		}
		// CARGAR TARIFA
		protected function tarifa_select_guia_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT id, TarifaNombre FROM tarifa WHERE TarifaFormulario LIKE '%$codigo%' ");
				
			}
			$sql->execute();
			return $sql;
			
		}
		
		//BUSCA DATOS GUIA UNICA
		protected function guiaunica_guia_modelo($idguia){
			
			$sql = mainModel::conectar()->prepare("SELECT * FROM Mov_guia WHERE id = '$idguia'");
			$sql->execute();
			return $sql;
		}
		
		//actualizar desde mensajero
		protected function actualizar_guia_modelo($datos,$aviso){
			
			if($aviso == "OK"){
				$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET MovGuiaNovedad =:Novedad,MovGuiaDetallenovedad =:DetalleNovedad, MovGuiaPago =:Pago,MovGuiaAgente=:agente,MovGuiaFentrega=:FechaMovimiento, MovGuiaHora_entrega =:Hora,MovGuiaValidacion =:Validacion, MovGuiaFacturadovalidacion = :Facturadovalidacion, MovGuiaEstadovalidacion = :Estadovalidacion, MovGuiaTarifavalidacion =:Idtarifavalidacion, MovGuiaTarifavalidar = :ValortarifaV, MovGuiaValortotalvalidacion = :ValortarifaV, MovGuiaFreasignacion = :Fechareasignacion,MovGuiaCodigofacturavalidacion = :CodigoTarifaV, MovGuiaFecha_cargue = :Fechacargue, MovGuiaZona= :Zona, MovGuiaImagen = :Nombreguia, MovGuiaImagen2 = :Nombrelugar, MovGuiaImagen3 =:NombreCataporte WHERE id = :Idguia" );
				
				$sql->bindParam(":Idguia",$datos["Idguia"]);
				$sql->bindParam(":Novedad",$datos["Novedad"]);
				$sql->bindParam(":DetalleNovedad",$datos["DetalleNovedad"]);
				$sql->bindParam(":Pago",$datos["Pago"]);
				$sql->bindParam(":agente",$datos["agente"]);
				$sql->bindParam(":FechaMovimiento",$datos["FechaMovimiento"]);
				$sql->bindParam(":Hora",$datos["Hora"]);
				$sql->bindParam(":Validacion",$datos["Validacion"]);
				$sql->bindParam(":Facturadovalidacion",$datos["Facturadovalidacion"]);
				$sql->bindParam(":Estadovalidacion",$datos["Estadovalidacion"]);
				$sql->bindParam(":Fechareasignacion",$datos["Fechareasignacion"]);
				$sql->bindParam(":ValortarifaV",$datos["ValortarifaV"]);
				$sql->bindParam(":CodigoTarifaV",$datos["CodigoTarifaV"]);
				$sql->bindParam(":Idtarifavalidacion",$datos["Idtarifavalidacion"]);
				$sql->bindParam(":Zona",$datos["Zona"]);
				$sql->bindParam(":Fechacargue",$datos["Fechacargue"]);
				$sql->bindParam(":Nombreguia",$datos["Nombreguia"]);
				$sql->bindParam(":Nombrelugar",$datos["Nombrelugar"]);
				$sql->bindParam(":NombreCataporte",$datos["NombreCataporte"]);
			}else{
				$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET MovGuiaNovedad =:Novedad,MovGuiaDetallenovedad =:DetalleNovedad, MovGuiaPago =:Pago,MovGuiaAgente=:agente,MovGuiaFentrega=:FechaMovimiento, MovGuiaHora_entrega =:Hora, MovGuiaFecha_cargue = :Fechacargue, MovGuiaImagen = :Nombreguia, MovGuiaImagen2 = :Nombrelugar, MovGuiaImagen3 =:NombreCataporte WHERE id = :Idguia" );
				
				
				
				$sql->bindParam(":Idguia",$datos["Idguia"]);
				$sql->bindParam(":Novedad",$datos["Novedad"]);
				$sql->bindParam(":DetalleNovedad",$datos["DetalleNovedad"]);
				$sql->bindParam(":Pago",$datos["Pago"]);
				$sql->bindParam(":agente",$datos["agente"]);
				$sql->bindParam(":FechaMovimiento",$datos["FechaMovimiento"]);
				$sql->bindParam(":Hora",$datos["Hora"]);
				$sql->bindParam(":Fechacargue",$datos["Fechacargue"]);
				$sql->bindParam(":Nombreguia",$datos["Nombreguia"]);
				$sql->bindParam(":Nombrelugar",$datos["Nombrelugar"]);
				$sql->bindParam(":NombreCataporte",$datos["NombreCataporte"]);
			}
				
			
			$sql->execute();
			return $sql;
			
			
			
			
		}
		
		//actualizar guia desde admin
		protected function actualizar_admin_guia_modelo($datos,$avisoNdireccion,$avisoFecha){
			
			$guia = $datos["Guia"];
			$Tiposervicio  =   $datos["Tiposervicio"];
			$Radicado  =   $datos["Radicado"];
			$Area  =   $datos["Area"];
			$Destinatario  =   $datos["Destinatario"];
			$Direccion  =   $datos["Direccion"];
			$Municipio  =   $datos["Municipio"];
			$Cataporte  =   $datos["Cataporte"];
			$Valorcataporte  =   $datos["Valorcataporte"];
			$Totalcataporte  =   $datos["Totalcataporte"];
			$Volumen  =   $datos["Volumen"];
			$ValorAdicional  =   $datos["ValorAdicional"];
			$TotalVadicional  =   $datos["TotalVadicional"];
			$Referente  =   $datos["Referente"];
			$Telefono  =   $datos["Telefono"];
			$Fecharecogida  =   $datos["Fecharecogida"];
			$Novedad  =   $datos["Novedad"];
			$DetalleNovedad  =   $datos["DetalleNovedad"];
			$Agente  =   $datos["Agente"];
			$Zona  =   $datos["Zona"];
			$Tarifa  =   $datos["Tarifa"];
			$Valortarifa  =   $datos["Valortarifa"];
			$Valortotalsincataporte  =   $datos["Valortotalsincataporte"];
			$Valortotalguia  =   $datos["Valortotalguia"];
			$Pago  =   $datos["Pago"];
			$Bonificacion  =   $datos["Bonificacion"];
			$Ndireccion  =   $datos["Ndireccion"];
			$Nit  =   $datos["Nit"];
			$Nombreremitente  =   $datos["Nombreremitente"];
			$Dremitente  =   $datos["Dremitente"];
			$Email  =   $datos["Email"];
			$Validacion  =   $datos["Validacion"];
			$Facturadovalidacion  =   $datos["Facturadovalidacion"];
			$Estadovalidacion  =   $datos["Estadovalidacion"];
			$Idtarifavalidacion  =   $datos["Idtarifavalidacion"];
			$ValortarifaV  =   $datos["ValortarifaV"];
			$Fechareasignacion  =   $datos["Fechareasignacion"];
			$CodigoTarifaV  =   $datos["CodigoTarifaV"];
			$Remitente  =   $datos["Remitente"];
			$CodigoTarifa  =   $datos["CodigoTarifa"];
			$Fechafactura  =   $datos["Fechafactura"];
			$Mesfactura  =   $datos["Mesfactura"];
			$Nombreguia  =   $datos["Nombreguia"];
			$Nombrelugar  =   $datos["Nombrelugar"];
			$NombreCataporte  =   $datos["NombreCataporte"];
			$Fechaasignado  =   $datos["Fechaasignado"];
			$FechaMovimiento  =   $datos["FechaMovimiento"];
			$Hora  =   $datos["Hora"];
			$Quincena  =   $datos["Quincena"];
			$Fechacargue  =   $datos["Fechacargue"];
			$Idguia  =   $datos["Idguia"];

			
			
			
			
			if($avisoFecha == "OK"){
				//$cadenaentrega = ",MovGuiaFentrega=:FechaMovimiento,MovGuiaHora_entrega=:Hora,MovGuiaQuincenaentrega=:Quincena,MovGuiaFecha_cargue=:Fechacargue";
				$cadenaentrega = ",MovGuiaFentrega='$FechaMovimiento',MovGuiaHora_entrega='$Hora',MovGuiaQuincenaentrega=$Quincena,MovGuiaFecha_cargue='$Fechacargue'";

			}
			if($avisoNdireccion == "OK"){
				//$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET MovGuiaGuia=:Guianumero,MovGuiaRadicado=:Radicado,MovGuiaArea=:Area,MovGuiaDestinatario=:Destinatario,MovGuiaDireccion=:Direccion,MovGuiaMunicipio=:Municipio,MovGuiaCataporte=:Cataporte,MovGuiaValor=:Valorcataporte,MovGuiaTotalcataporte=:Totalcataporte,MovGuiaVolumen=:Volumen,MovGuiaVvolumenadicional=:ValorAdicional,MovGuiaTotaladicional=:TotalVadicional,MovGuiaReferente=:Referente,MovGuiaTelefono=:Telefono,MovGuiaFecha_recogida=:Fecharecogida,MovGuiaNovedad=:Novedad,MovGuiaDetallenovedad=:DetalleNovedad,MovGuiaAgente=:Agente,MovGuiaZona=:Zona,MovGuiaIdtarifa=:Tarifa,MovGuiaValortarifa=:Valortarifa,MovGuiaValortotalguiasincataporte=:Valortotalsincataporte,MovGuiaValortotalguia=:Valortotalguia,MovGuiaPago=:Pago,MovGuiaBonificacionOK=:Bonificacion,MovGuiaNdireccion=:Ndireccion,MovGuiaCodigo=:Tiposervicio,MovGuiaNit=:Nit,MovGuiaNombreremitente=:Nombreremitente,MovGuiaDireccionremitente=:Dremitente,MovGuiaCorreodestino=:Email,MovGuiaValidacion=:Validacion,MovGuiaFacturadovalidacion=:Facturadovalidacion,MovGuiaEstadovalidacion=:Estadovalidacion,MovGuiaTarifavalidacion=:Idtarifavalidacion,MovGuiaTarifavalidar=:ValortarifaV,MovGuiaValortotalvalidacion=:ValortarifaV,MovGuiaFreasignacion=:Fechareasignacion,MovGuiaCodigofacturavalidacion=:CodigoTarifaV,MovGuiaCodigocliente=:Remitente,MovGuiaCodigofacturacion=:CodigoTarifa,MovGuiaFecha_factura=:Fechafactura,MovGuiaMes_factura=:Mesfactura,MovGuiaImagen=:Nombreguia, MovGuiaImagen2=:Nombrelugar,MovGuiaImagen3=:NombreCataporte,MovGuiaFasignacion=:Fechaasignado".$cadenaentrega." WHERE id = :Idguia" );
				
				$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET  MovGuiaGuia = '$guia', MovGuiaRadicado='$Radicado', MovGuiaArea='$Area', MovGuiaDestinatario='$Destinatario', MovGuiaDireccion='$Direccion', MovGuiaMunicipio='$Municipio', MovGuiaCataporte=$Cataporte, MovGuiaValor=$Valorcataporte, MovGuiaTotalcataporte=$Totalcataporte, MovGuiaVolumen=$Volumen, MovGuiaVvolumenadicional=$ValorAdicional, MovGuiaTotaladicional=$TotalVadicional, MovGuiaReferente='$Referente', MovGuiaTelefono='$Telefono', MovGuiaFecha_recogida='$Fecharecogida', MovGuiaNovedad='$Novedad', MovGuiaDetallenovedad='$DetalleNovedad', MovGuiaAgente=$Agente, MovGuiaZona='$Zona', MovGuiaIdtarifa=$Tarifa, MovGuiaValortarifa=$Valortarifa, MovGuiaValortotalguiasincataporte=$Valortotalsincataporte, MovGuiaValortotalguia=$Valortotalguia, MovGuiaPago=$Pago, MovGuiaBonificacionOK='$Bonificacion', MovGuiaNdireccion='$Ndireccion', MovGuiaCodigo='$Tiposervicio' ,MovGuiaNit=$Nit ,MovGuiaNombreremitente='$Nombreremitente' ,MovGuiaDireccionremitente='$Dremitente', MovGuiaCorreodestino='$Email', MovGuiaValidacion='$Validacion', MovGuiaFacturadovalidacion='$Facturadovalidacion', MovGuiaEstadovalidacion='$Estadovalidacion', MovGuiaTarifavalidacion=$Idtarifavalidacion, MovGuiaTarifavalidar=$ValortarifaV, MovGuiaValortotalvalidacion=$ValortarifaV, MovGuiaFreasignacion='$Fechareasignacion', MovGuiaCodigofacturavalidacion='$CodigoTarifaV', MovGuiaCodigocliente=$Remitente, MovGuiaCodigofacturacion='$CodigoTarifa', MovGuiaFecha_factura='$Fechafactura', MovGuiaMes_factura=$Mesfactura, MovGuiaImagen='$Nombreguia', MovGuiaImagen2='$Nombrelugar', MovGuiaImagen3='$NombreCataporte', MovGuiaFasignacion='$Fechaasignado'$cadenaentrega WHERE id = $Idguia");

				
				
				$sql->bindParam(":Guia",$datos["Guia"]);	
				$sql->bindParam(":Guianumero",$datos["Guianumero"]);
				$sql->bindParam(":Tiposervicio",$datos["Tiposervicio"]);
				$sql->bindParam(":Radicado",$datos["Radicado"]);
				$sql->bindParam(":Area",$datos["Area"]);
				$sql->bindParam(":Destinatario",$datos["Destinatario"]);
				$sql->bindParam(":Direccion",$datos["Direccion"]);
				$sql->bindParam(":Municipio",$datos["Municipio"]);
				$sql->bindParam(":Cataporte",$datos["Cataporte"]);
				$sql->bindParam(":Valorcataporte",$datos["Valorcataporte"]);
				$sql->bindParam(":Totalcataporte",$datos["Totalcataporte"]);
				$sql->bindParam(":Volumen",$datos["Volumen"]);
				$sql->bindParam(":ValorAdicional",$datos["ValorAdicional"]);
				$sql->bindParam(":TotalVadicional",$datos["TotalVadicional"]);
				$sql->bindParam(":Referente",$datos["Referente"]);
				$sql->bindParam(":Telefono",$datos["Telefono"]);
				$sql->bindParam(":Fecharecogida",$datos["Fecharecogida"]);
				$sql->bindParam(":Novedad",$datos["Novedad"]);
				$sql->bindParam(":DetalleNovedad",$datos["DetalleNovedad"]);
				$sql->bindParam(":Agente",$datos["Agente"]);
				$sql->bindParam(":Zona",$datos["Zona"]);
				$sql->bindParam(":Tarifa",$datos["Tarifa"]);
				$sql->bindParam(":Valortarifa",$datos["Valortarifa"]);
				$sql->bindParam(":Valortotalsincataporte",$datos["Valortotalsincataporte"]);
				$sql->bindParam(":Valortotalguia",$datos["Valortotalguia"]);
				$sql->bindParam(":Pago",$datos["Pago"]);
				$sql->bindParam(":Bonificacion",$datos["Bonificacion"]);
				$sql->bindParam(":Ndireccion",$datos["Ndireccion"]);
				$sql->bindParam(":Nit",$datos["Nit"]);
				$sql->bindParam(":Nombreremitente",$datos["Nombreremitente"]);
				$sql->bindParam(":Dremitente",$datos["Dremitente"]);
				$sql->bindParam(":Email",$datos["Email"]);
				$sql->bindParam(":Validacion",$datos["Validacion"]);
				$sql->bindParam(":Facturadovalidacion",$datos["Facturadovalidacion"]);
				$sql->bindParam(":Estadovalidacion",$datos["Estadovalidacion"]);
				$sql->bindParam(":Idtarifavalidacion",$datos["Idtarifavalidacion"]);
				$sql->bindParam(":ValortarifaV",$datos["ValortarifaV"]);
				$sql->bindParam(":Fechareasignacion",$datos["Fechareasignacion"]);
				$sql->bindParam(":CodigoTarifaV",$datos["CodigoTarifaV"]);
				$sql->bindParam(":Remitente",$datos["Remitente"]);
				$sql->bindParam(":CodigoTarifa",$datos["CodigoTarifa"]);
				$sql->bindParam(":Fechafactura",$datos["Fechafactura"]);
				$sql->bindParam(":Mesfactura",$datos["Mesfactura"]);
				$sql->bindParam(":Nombreguia",$datos["Nombreguia"]);
				$sql->bindParam(":Nombrelugar",$datos["Nombrelugar"]);
				$sql->bindParam(":NombreCataporte",$datos["NombreCataporte"]);
				$sql->bindParam(":Fechaasignado",$datos["Fechaasignado"]);
				
				if($avisoFecha == "OK"){
					$sql->bindParam(":FechaMovimiento",$datos["FechaMovimiento"]);
					$sql->bindParam(":Hora",$datos["Hora"]);
					$sql->bindParam(":Quincena",$datos["Quincena"]);
					$sql->bindParam(":Fechacargue",$datos["Fechacargue"]);
				}
				
				$sql->bindParam(":Idguia",$datos["Idguia"]);
				
			}else{
				//$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET MovGuiaGuia=:Guianumero,MovGuiaRadicado=:Radicado,MovGuiaArea=:Area,MovGuiaDestinatario=:Destinatario,MovGuiaDireccion=:Direccion,MovGuiaMunicipio=:Municipio,MovGuiaCataporte=:Cataporte,MovGuiaValor=:Valorcataporte,MovGuiaTotalcataporte=:Totalcataporte,MovGuiaVolumen=:Volumen,MovGuiaVvolumenadicional=:ValorAdicional,MovGuiaTotaladicional=:TotalVadicional,MovGuiaReferente=:Referente,MovGuiaTelefono=:Telefono,MovGuiaFecha_recogida=:Fecharecogida,MovGuiaNovedad=:Novedad,MovGuiaDetallenovedad=:DetalleNovedad,MovGuiaAgente=:Agente,MovGuiaZona=:Zona,MovGuiaIdtarifa=:Tarifa,MovGuiaValortarifa=:Valortarifa,MovGuiaValortotalguiasincataporte=:Valortotalsincataporte,MovGuiaValortotalguia=:Valortotalguia,MovGuiaPago=:Pago,MovGuiaBonificacionOK=:Bonificacion,MovGuiaNdireccion=:Ndireccion,MovGuiaCodigo=:Tiposervicio,MovGuiaNit=:Nit,MovGuiaNombreremitente=:Nombreremitente,MovGuiaDireccionremitente=:Dremitente,MovGuiaCorreodestino=:Email,MovGuiaValidacion=Null,MovGuiaFacturadovalidacion=Null,MovGuiaEstadovalidacion=Null,MovGuiaTarifavalidacion=Null,MovGuiaTarifavalidar=Null,MovGuiaValortotalvalidacion=0,MovGuiaFreasignacion=Null,MovGuiaCodigofacturavalidacion=Null,MovGuiaCodigocliente=:Remitente,MovGuiaCodigofacturacion=:CodigoTarifa,MovGuiaFecha_factura=:Fechafactura,MovGuiaMes_factura=:Mesfactura,MovGuiaImagen=:Nombreguia, MovGuiaImagen2=:Nombrelugar,MovGuiaImagen3=:NombreCataporte,MovGuiaFasignacion=:Fechaasignado".$cadenaentrega." WHERE id = :Idguia" );
				
				$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET  MovGuiaGuia = '$guia', MovGuiaRadicado='$Radicado', MovGuiaArea='$Area', MovGuiaDestinatario='$Destinatario', MovGuiaDireccion='$Direccion', MovGuiaMunicipio='$Municipio', MovGuiaCataporte=$Cataporte, MovGuiaValor=$Valorcataporte, MovGuiaTotalcataporte=$Totalcataporte, MovGuiaVolumen=$Volumen, MovGuiaVvolumenadicional=$ValorAdicional, MovGuiaTotaladicional=$TotalVadicional, MovGuiaReferente='$Referente', MovGuiaTelefono='$Telefono', MovGuiaFecha_recogida='$Fecharecogida', MovGuiaNovedad='$Novedad', MovGuiaDetallenovedad='$DetalleNovedad', MovGuiaAgente=$Agente, MovGuiaZona='$Zona', MovGuiaIdtarifa=$Tarifa, MovGuiaValortarifa=$Valortarifa, MovGuiaValortotalguiasincataporte=$Valortotalsincataporte, MovGuiaValortotalguia=$Valortotalguia, MovGuiaPago=$Pago, MovGuiaBonificacionOK='$Bonificacion', MovGuiaNdireccion='$Ndireccion', MovGuiaCodigo='$Tiposervicio' ,MovGuiaNit=$Nit ,MovGuiaNombreremitente='$Nombreremitente' ,MovGuiaDireccionremitente='$Dremitente', MovGuiaCorreodestino='$Email', MovGuiaValidacion=NULL, MovGuiaCodigocliente=$Remitente, MovGuiaCodigofacturacion='$CodigoTarifa', MovGuiaFecha_factura='$Fechafactura', MovGuiaMes_factura=$Mesfactura, MovGuiaImagen='$Nombreguia', MovGuiaImagen2='$Nombrelugar', MovGuiaImagen3='$NombreCataporte', MovGuiaFasignacion='$Fechaasignado'$cadenaentrega WHERE id = $Idguia");
				
				$sql->bindParam(":Guia",$datos["Guia"]);	
				$sql->bindParam(":Guianumero",$datos["Guianumero"]);
				$sql->bindParam(":Tiposervicio",$datos["Tiposervicio"]);
				$sql->bindParam(":Radicado",$datos["Radicado"]);
				$sql->bindParam(":Area",$datos["Area"]);
				$sql->bindParam(":Destinatario",$datos["Destinatario"]);
				$sql->bindParam(":Direccion",$datos["Direccion"]);
				$sql->bindParam(":Municipio",$datos["Municipio"]);
				$sql->bindParam(":Cataporte",$datos["Cataporte"]);
				$sql->bindParam(":Valorcataporte",$datos["Valorcataporte"]);
				$sql->bindParam(":Totalcataporte",$datos["Totalcataporte"]);
				$sql->bindParam(":Volumen",$datos["Volumen"]);
				$sql->bindParam(":ValorAdicional",$datos["ValorAdicional"]);
				$sql->bindParam(":TotalVadicional",$datos["TotalVadicional"]);
				$sql->bindParam(":Referente",$datos["Referente"]);
				$sql->bindParam(":Telefono",$datos["Telefono"]);
				$sql->bindParam(":Fecharecogida",$datos["Fecharecogida"]);
				$sql->bindParam(":Novedad",$datos["Novedad"]);
				$sql->bindParam(":DetalleNovedad",$datos["DetalleNovedad"]);
				$sql->bindParam(":Agente",$datos["Agente"]);
				$sql->bindParam(":Zona",$datos["Zona"]);
				$sql->bindParam(":Tarifa",$datos["Tarifa"]);
				$sql->bindParam(":Valortarifa",$datos["Valortarifa"]);
				$sql->bindParam(":Valortotalsincataporte",$datos["Valortotalsincataporte"]);
				$sql->bindParam(":Valortotalguia",$datos["Valortotalguia"]);
				$sql->bindParam(":Pago",$datos["Pago"]);
				$sql->bindParam(":Bonificacion",$datos["Bonificacion"]);
				$sql->bindParam(":Ndireccion",$datos["Ndireccion"]);
				$sql->bindParam(":Nit",$datos["Nit"]);
				$sql->bindParam(":Nombreremitente",$datos["Nombreremitente"]);
				$sql->bindParam(":Dremitente",$datos["Dremitente"]);
				$sql->bindParam(":Email",$datos["Email"]);
				$sql->bindParam(":Remitente",$datos["Remitente"]);
				$sql->bindParam(":CodigoTarifa",$datos["CodigoTarifa"]);
				$sql->bindParam(":Fechafactura",$datos["Fechafactura"]);
				$sql->bindParam(":Mesfactura",$datos["Mesfactura"]);
				$sql->bindParam(":Nombreguia",$datos["Nombreguia"]);
				$sql->bindParam(":Nombrelugar",$datos["Nombrelugar"]);
				$sql->bindParam(":NombreCataporte",$datos["NombreCataporte"]);
				$sql->bindParam(":Fechaasignado",$datos["Fechaasignado"]);
				
				if($avisoFecha == "OK"){
					$sql->bindParam(":FechaMovimiento",$datos["FechaMovimiento"]);
					$sql->bindParam(":Hora",$datos["Hora"]);
					$sql->bindParam(":Quincena",$datos["Quincena"]);
					$sql->bindParam(":Fechacargue",$datos["Fechacargue"]);
				}
				
				$sql->bindParam(":Idguia",$datos["Idguia"]);
				
			}
				
			
			$sql->execute();
			return $sql;
			
			
			
			
		}
		
		
		//ANULAR Y ACTIVAR GUIA
		protected function desactivar_guia_modelo($estado,$codigo){
			$query=mainModel::conectar()->prepare("UPDATE Mov_guia SET MovGuiaEstatus=:Estado WHERE id=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		
		//AGREGAR IMPORTACION AL SISTEMA
		protected function importar_guias_guia_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO Importacion(ImportacionArcivosubido,ImportacionArchivoguardado,ImportacionFecha,ImportacionHora,ImportacionRuta,ImportacionCodigo) VALUES(:Archivosubido,:Archivoguardado,:Fecha,:Hora,:Ruta,:Codigo)");
			
			
			$sql->bindParam(":Archivosubido",$datos['Archivosubido']);
			$sql->bindParam(":Archivoguardado",$datos['Archivoguardado']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->bindParam(":Hora",$datos['Hora']);
			$sql->bindParam(":Ruta",$datos['Ruta']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->execute();
			return $sql;
			
		
		}
		
		//eliminar importacion de guias fallida
		protected function eliminar_importacion_guia_modelo($Codigo){
			$sql=self::conectar()->prepare("DELETE  FROM Importacion WHERE ImportacionCodigo=:Codigo");
			$sql->bindParam(":Codigo",$Codigo);
			$sql->execute();
			
			return $sql;
		}
		
		//reasignar guias
		protected function reasignar_guia_modelo($datos,$aviso){
				
			
			
			if($datos["Zona"] != ""){
				$zona = $datos["Zona"] ;
				$cadenazona = "MovGuiaZona= '$zona',";
			}
			
			if($datos["agente"] != ""){
				$agente = $datos["agente"];
				$cadenaagente = "MovGuiaAgente= '$agente' ,";
			}
			
			if($datos["Novedad"] != ""){
				$novedad = $datos["Novedad"];
				$cadenaNovedad = "MovGuiaNovedad ='$novedad',";
			}
			
			$ndireccion = $datos["Ndireccion"];
			$Validacion = $datos["Validacion"];
			$Facturadovalidacion = $datos["Facturadovalidacion"];
			$Estadovalidacion = $datos["Estadovalidacion"];
			$Fechareasignacion = $datos["Fechareasignacion"];
			$ValortarifaV = $datos["ValortarifaV"];
			$CodigoTarifaV = $datos["CodigoTarifaV"];
			$Idtarifavalidacion = $datos["Idtarifavalidacion"];
			$FechaQR = $datos["FechaQR"];
			$Idguia = $datos["Idguia"];
			
			 
			
			if($aviso == "OK"){
				$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET $cadenazona $cadenaagente $cadenaNovedad MovGuiaNdireccion= '$ndireccion', MovGuiaValidacion ='$Validacion', MovGuiaFacturadovalidacion = '$Facturadovalidacion', MovGuiaEstadovalidacion = '$Estadovalidacion', MovGuiaTarifavalidacion ='$Idtarifavalidacion', MovGuiaTarifavalidar = '$ValortarifaV', MovGuiaValortotalvalidacion = '$ValortarifaV', MovGuiaFreasignacion = '$Fechareasignacion',MovGuiaCodigofacturavalidacion = '$CodigoTarifaV', MovGuiaFechaQrMensajero = '$FechaQR'  WHERE id = $Idguia" );
				
				
				/*if($datos["Zona"] != ""){
					$sql->bindParam(":Zona",$datos["Zona"]);
				}
				if($datos["agente"] != ""){
					$sql->bindParam(":agente",$datos["agente"]);
				}
				
				if($datos["Novedad"] != ""){
					$sql->bindParam(":Novedad",$datos["Novedad"]);
				}
				$sql->bindParam(":Ndireccion",$datos["Ndireccion"]);
				$sql->bindParam(":Validacion",$datos["Validacion"]);
				$sql->bindParam(":Facturadovalidacion",$datos["Facturadovalidacion"]);
				$sql->bindParam(":Estadovalidacion",$datos["Estadovalidacion"]);
				$sql->bindParam(":Fechareasignacion",$datos["Fechareasignacion"]);
				$sql->bindParam(":ValortarifaV",$datos["ValortarifaV"]);
				$sql->bindParam(":CodigoTarifaV",$datos["CodigoTarifaV"]);
				$sql->bindParam(":Idtarifavalidacion",$datos["Idtarifavalidacion"]);
				$sql->bindParam(":FechaQR",$datos["FechaQR"]);
				$sql->bindParam(":Idguia",$datos["Idguia"]);*/
			
			}else{
				$sql=mainModel::conectar()->prepare("UPDATE Mov_guia SET $cadenazona $cadenaagente $cadenaNovedad MovGuiaNdireccion='null', MovGuiaValidacion ='null', MovGuiaFacturadovalidacion ='null', MovGuiaEstadovalidacion ='null', MovGuiaTarifavalidacion='0', MovGuiaTarifavalidar='0', MovGuiaValortotalvalidacion = '0', MovGuiaFreasignacion='2000-01-01',MovGuiaCodigofacturavalidacion='null', MovGuiaFechaQrMensajero = '$FechaQR'  WHERE id = $Idguia" );
				
				/*if($datos["Zona"] != ""){
					$sql->bindParam(":Zona",$datos["Zona"]);
				}
				if($datos["agente"] != ""){
					$sql->bindParam(":agente",$datos["agente"]);
				}
				
				if($datos["Novedad"] != ""){
					$sql->bindParam(":Novedad",$datos["Novedad"]);
				}
				
				$sql->bindParam(":FechaQR",$datos["FechaQR"]);
				$sql->bindParam(":Idguia",$datos["Idguia"]);*/
				
			}
				
			
			$sql->execute();
			return $sql;
			
			
			
				
		}
		
		
		//crear planilla
		protected function crear_planilla_guia_modelo($datos){
			
			
			$sql=mainModel::conectar()->prepare("INSERT INTO Planilla(PlanillaAgente,PlanillaZona,PlanillaFecha,PlanillaMaxCierre,PlanillaCodigo,PlanillaIdMasivo)VALUES(:Agente,:Zona,:Fecha,:FechaMax,:CodigoPlanilla,:numeromasivo)" );
					
				
			$sql->bindParam(":Agente",$datos["Agente"]);
			$sql->bindParam(":Zona",$datos["Zona"]);
			$sql->bindParam(":Fecha",$datos["Fecha"]);
			$sql->bindParam(":FechaMax",$datos["FechaMax"]);
			$sql->bindParam(":CodigoPlanilla",$datos["CodigoPlanilla"]);
			$sql->bindParam(":numeromasivo",$datos["numeromasivo"]);	
				
			
			$sql->execute();
			return $sql;
			
			
		}
		
		
		//registrar guia en planilla
		protected function registro_enplanilla_guia_modelo($datos){
			
			//$sql=mainModel::conectar()->prepare("INSERT INTO Pla_guia(PlaGuiaid,PlaGuiaTipo,PlaGuiaDireccion,PlaGuiaIdplanilla,PlaGuiaFecha,PlaGuiaMaxCierre,PlaGuiaFechaCargue)VALUES('".$datos["Idguia"]."','".$datos["Guiatipo"]."','".$datos["Direccion"]."','".$datos["IdPlanilla"]."','".$datos["PlanillaFecha"]."','".$datos["PlanillafechaMax"]."','".$datos["Planillafechacargue"]."')" );
			
			$sql=mainModel::conectar()->prepare("INSERT INTO Pla_guia(PlaGuiaid,PlaGuiaTipo,PlaGuiaZona,PlaGuiaDestino,PlaGuiaDireccion,PlaGuiaIdplanilla,PlaGuiaIdagente,PlaGuiaFecha,PlaGuiaMaxCierre,PlaGuiaFechaCargue)VALUES(:Idguia,:Guiatipo,:Zona,:Destino,:Direccion,:IdPlanilla,:Agente,:PlanillaFecha,:PlanillafechaMax,:Planillafechacargue)" );
					
				
			$sql->bindParam(":Idguia",$datos["Idguia"]);
			$sql->bindParam(":Guiatipo",$datos["Guiatipo"]);
			$sql->bindParam(":Zona",$datos["Zona"]);
			$sql->bindParam(":Destino",$datos["Destino"]);
			$sql->bindParam(":Direccion",$datos["Direccion"]);
			$sql->bindParam(":IdPlanilla",$datos["IdPlanilla"]);
			$sql->bindParam(":Agente",$datos["Agente"]);
			$sql->bindParam(":PlanillaFecha",$datos["PlanillaFecha"]);
			$sql->bindParam(":PlanillafechaMax",$datos["PlanillafechaMax"]);
			$sql->bindParam(":Planillafechacargue",$datos["Planillafechacargue"]);
						
			
			$sql->execute();
			return $sql;
		}
		
		protected function cerrar_enplanilla_guia_modelo($Idcerrar,$novedad,$detalle,$fecharQR){
			$query=mainModel::conectar()->prepare("UPDATE Pla_guia SET PlaGuiaNovedad = '$novedad', PlaGuiaActividad= 'Cerrada', PlaGuiaDetalle = '$detalle', PlaGuiaCierrereal ='$fecharQR' WHERE id = '$Idcerrar'");
			
			
			$query->execute();
			return $query;
		}
				
		//crear grafica recogida vrs entregas
		protected function grafica_recoentrega_guia_modelo($datos,$alerta){
			
			if($alerta == "uno"){
				$sql=mainModel::conectar()->prepare("INSERT INTO grafica(GraficaCampo1,GraficaCampo2,GraficaCodigo)VALUES(:Mes,:Totalguias,:codigo)" );


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":Totalguias",$datos["Totalguias"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			if($alerta == "dos"){
				$sql=mainModel::conectar()->prepare("UPDATE grafica SET  GraficaCampo3 = :Totalguias WHERE GraficaCampo1 = :Mes AND GraficaCodigo = :codigo");


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":Totalguias",$datos["Totalguias"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			if($alerta == "tres"){
				$sql=mainModel::conectar()->prepare("INSERT INTO grafica(GraficaCampo1,GraficaCampo2,GraficaCodigo)VALUES(:Mes,:Totalguias,:codigo)" );


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":Totalguias",$datos["Totalguias"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			
		}
		
		//crear grafica ingresos vrs costos
		protected function grafica_ingrecost_guia_modelo($datos,$alerta){
			
			if($alerta == "uno"){
				$sql=mainModel::conectar()->prepare("INSERT INTO grafica(GraficaCampo1,GraficaCampo2,GraficaCodigo)VALUES(:Mes,:totalingresos,:codigo)" );


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":totalingresos",$datos["totalingresos"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			if($alerta == "dos"){
				$sql=mainModel::conectar()->prepare("UPDATE grafica SET  GraficaCampo3 = :costos WHERE GraficaCampo1 = :Mes AND GraficaCodigo = :codigo");


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":costos",$datos["costos"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			if($alerta == "tres"){
				$sql=mainModel::conectar()->prepare("INSERT INTO grafica(GraficaCampo1,GraficaCampo2,GraficaCodigo)VALUES(:Mes,:Totalguias,:codigo)" );


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":Totalguias",$datos["Totalguias"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			
		}
		
			//crear grafica recogida vrs entregas
		protected function grafica_entregaagente_guia_modelo($datos,$alerta){
			
			if($alerta == "uno"){
				$sql=mainModel::conectar()->prepare("INSERT INTO grafica(GraficaCampo1,GraficaCodigo)VALUES(:Mes,:codigo)" );


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			if($alerta == "dos"){
				$sql=mainModel::conectar()->prepare("UPDATE grafica SET  GraficaCampo2 = :Totalguias WHERE GraficaCampo1 = :Mes AND GraficaCodigo = :codigo");


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":Totalguias",$datos["Totalguias"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			if($alerta == "tres"){
				$sql=mainModel::conectar()->prepare("INSERT INTO grafica(GraficaCampo1,GraficaCampo2,GraficaCodigo)VALUES(:Mes,:Totalguias,:codigo)" );


				$sql->bindParam(":Mes",$datos["Mes"]);
				$sql->bindParam(":Totalguias",$datos["Totalguias"]);
				$sql->bindParam(":codigo",$datos["codigo"]);

				$sql->execute();
				return $sql;
			}
			
		}
	
	}