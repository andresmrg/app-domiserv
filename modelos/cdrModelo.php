<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class cdrModelo extends mainModel{
		
		protected function agregar_cdr_modelo($datos){
			$sql = mainModel::conectar()->prepare("INSERT INTO Cdr (CdrDNI,CdrNombre,CdrCiudad,CdrBarrio,CdrDireccion,CdrTelefono,CdrEmail,CdrIdDirector,CdrDirector,CdrApellidoDirector,CdrMemotecnico,CdrCostos,CdrCodigo,CompaniaCodigo,CdrFechaCreacion) VALUES (:DNI,:Nombre,:Ciudad,:Barrio,:Direccion,:Telefono,:Email,:IdDirector,:Director,:Apellido,:Memotecnico,:Ccostos,:Codigo,:CompaniaCodigo,:Fecha)");
			
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Ciudad",$datos['Ciudad']);
			$sql->bindParam(":Barrio",$datos['Barrio']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":IdDirector",$datos['IdDirector']);
			$sql->bindParam(":Director",$datos['Director']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Memotecnico",$datos['Memotecnico']);
			$sql->bindParam(":Ccostos",$datos['Ccostos']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":CompaniaCodigo",$datos['CompaniaCodigo']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->execute();
			return $sql;
		}
		
		protected function eliminar_cdr_modelo($Codigo){
			$sql=self::conectar()->prepare("DELETE  FROM Cdr WHERE CdrCodigo=:Codigo");
			$sql->bindParam(":Codigo",$Codigo);
			$sql->execute();
			
			return $sql;
		}
		
		protected function datos_cdr_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Cdr WHERE id=:Codigo AND CdrEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Cdr WHERE CdrEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT CdrCodigo,CdrNombre FROM Cdr WHERE CdrEstado = 'Activo' ORDER BY CdrNombre ASC");
			}
			$sql->execute();
			return $sql;
			
		}
		
		protected function desactivar_cdr_modelo($estado,$codigo){
			$query=mainModel::conectar()->prepare("UPDATE Cdr SET CdrEstado=:Estado WHERE CdrCodigo=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		//agrega administrador de CDR
		protected function agregar_administrador_cdr_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO adminCdr (AdminCdrDNI,AdminCdrNombre,AdminCdrApellido,AdminCdrTelefono,AdminCdrDireccion,CuentaCodigo,CdrCodigo) VALUES(:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:Codigcc,:CodigoCdr)");
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Codigcc",$datos['Codigcc']);
			$sql->bindParam(":CodigoCdr",$datos['CodigoCdr']);
			$sql->execute();
			return $sql;
		}
		
		//DESCTIVAR CUENTAS DE CLIENTES
		protected function desactivar_C_cdr_modelo($estado,$codigo){
			$query=mainModel::conectar()->prepare("UPDATE adminCdr SET AdminCdrEstado=:Estado WHERE CuentaCodigo=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		//CONSULTA DATOS CUENTEAS CLIENTES
		protected function datos_C_cdr_modelo($tipo,$codigo){
			if($tipo =="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM adminCdr WHERE CuentaCodigo =:Codigo");
				$query->bindParam(":Codigo",$codigo);			
			}elseif($tipo =="Conteo"){
				$query=mainModel::conectar()->prepare("SELECT id FROM adminCdr");	
			}
			$query->execute();
			return $query;
		}
		
		protected function actualizar_C_cdr_modelo($datos){
			$query=mainModel::conectar()->prepare("UPDATE adminCdr SET AdminCdrDNI=:DNI, AdminCdrNombre=:Nombre, AdminCdrApellido=:Apellido, AdminCdrTelefono=:Telefono,  AdminCdrDireccion=:Direccion WHERE CuentaCodigo =:Codigo");
			
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombre",$datos['Nombre']);
			$query->bindParam(":Apellido",$datos['Apellido']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->execute();
			return $query;
		}
	}
	