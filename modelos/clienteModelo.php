<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class clienteModelo extends mainModel{
		
		protected function agregar_cliente_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO cliente(ClienteDNI,ClienteNombre,ClienteCiudad,ClienteBarrio,ClienteDireccion,ClienteTelefono,ClienteEmail,ClienteOcupacion,ClienteIdDirector,ClienteNombreDirector,ClienteApellidoDirector,ClienteCodigo,CompaniaCodigo,ClienteFechaCreacion) VALUES(:DNI,:Nombre,:Ciudad,:Barrio,:Direccion,:Telefono,:Email,:Ocupacion,:IdDirector,:Director,:Apellido,:Codigo,:CompaniaCodigo,:Fecha)");
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Ciudad",$datos['Ciudad']);
			$sql->bindParam(":Barrio",$datos['Barrio']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":Ocupacion",$datos['Ocupacion']);
			$sql->bindParam(":IdDirector",$datos['IdDirector']);
			$sql->bindParam(":Director",$datos['Director']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":CompaniaCodigo",$datos['CompaniaCodigo']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->execute();
			return $sql;
			
			
			
			
		}
		
		protected function eliminar_cliente_modelo($Codigo){
			$sql=self::conectar()->prepare("DELETE  FROM cliente WHERE ClienteCodigo=:Codigo");
			$sql->bindParam(":Codigo",$Codigo);
			$sql->execute();
			
			return $sql;
		}
		
		//buscar cliente
		protected function datos_cliente_modelo($tipo,$codigo){
			if($tipo =="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM cliente WHERE CuentaCodigo =:Codigo");
				$query->bindParam(":Codigo",$codigo);			
			}elseif($tipo =="Conteo"){
				$query=mainModel::conectar()->prepare("SELECT id FROM cliente");	
			}
			$query->execute();
			return $query;
		}
		//buscar datos cliente no corporativo
		protected function datos_nocorporativo_cliente_modelo($tipo,$busquedad){
			if($tipo =="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM cliente WHERE ClienteDNI =:DNI AND ClienteGrupo = 'NO Corporativo'");
				$query->bindParam(":DNI",$busquedad);			
			}elseif($tipo =="Conteo"){
				$query=mainModel::conectar()->prepare("SELECT id FROM cliente");	
			}
			$query->execute();
			return $query;
		}
		
		
		protected function desactivar_cliente_modelo($estado,$codigo){
			
			$query=mainModel::conectar()->prepare("UPDATE cliente SET ClienteEstado=:Estado WHERE ClienteCodigo=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		
		protected function actualizar_cliente_modelo($datos){
			$query=mainModel::conectar()->prepare("UPDATE cliente SET ClienteDNI=:DNI, ClienteNombre=:Nombre, ClienteApellido=:Apellido, ClienteTelefono=:Telefono, ClienteOcupacion=:Ocupacion, ClienteDireccion=:Direccion WHERE CuentaCodigo =:Codigo");
			
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombre",$datos['Nombre']);
			$query->bindParam(":Apellido",$datos['Apellido']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Ocupacion",$datos['Ocupacion']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->execute();
			return $query;
		}
		
		// ====== PROCEDIMIENTO PARA CREAR CUENTAS DE USUARIOS BAJO CADA CLIENTE ========
	//modelo para agregar cuebta de cliente
		protected function agregar_C_cliente_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO clienteC(ClienteCDNI,ClienteCNombre,ClienteCApellido,ClienteCTelefono,ClienteCOcupacion,ClienteCDireccion,CuentaCodigo,ClienteCodigo) VALUES(:DNI,:Nombre,:Apellido,:Telefono,:Cargo,:Direccion,:Codigo,:Codigocliente)");
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Cargo",$datos['Cargo']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Codigocliente",$datos['Codigocliente']);
			$sql->execute();
			return $sql;
			
		
		}
		
		//DESCTIVAR CUENTAS DE CLIENTES
		protected function desactivar_C_cliente_modelo($estado,$codigo){
			$query=mainModel::conectar()->prepare("UPDATE clienteC SET ClienteCEstado=:Estado WHERE CuentaCodigo=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		
		//CONSULTA DATOS CUENTEAS CLIENTES
		protected function datos_C_cliente_modelo($tipo,$codigo){
			if($tipo =="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM clienteC WHERE CuentaCodigo =:Codigo");
				$query->bindParam(":Codigo",$codigo);			
			}elseif($tipo =="Conteo"){
				$query=mainModel::conectar()->prepare("SELECT id FROM clienteC");	
			}
			$query->execute();
			return $query;
		}
		
		protected function actualizar_C_cliente_modelo($datos){
			
			
			/*$query=mainModel::conectar()->prepare("UPDATE clienteC SET ClienteCDNI='".$datos['DNI']."', ClienteCNombre='".$datos['Nombre']."', ClienteCApellido='".$datos['Apellido']."', ClienteCTelefono='".$datos['Telefono']."', ClienteCOcupacion='".$datos['Ocupacion']."', ClienteCDireccion='".$datos['Direccion']."' WHERE CuentaCodigo='".$datos['Codigo']."'");*/
			
			$query=mainModel::conectar()->prepare("UPDATE clienteC SET ClienteCDNI=:DNI, ClienteCNombre=:Nombre, ClienteCApellido=:Apellido, ClienteCTelefono=:Telefono, ClienteCOcupacion=:Ocupacion, ClienteCDireccion=:Direccion WHERE CuentaCodigo=:Codigo");
			
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombre",$datos['Nombre']);
			$query->bindParam(":Apellido",$datos['Apellido']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Ocupacion",$datos['Ocupacion']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->execute();
			
		
			return $query;
			
			
		}
	
	}