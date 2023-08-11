<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class empresaModelo extends mainModel{
		
		protected function agregar_empresa_modelo($datos){
			$sql = mainModel::conectar()->prepare("INSERT INTO empresa (EmpresaCodigo,EmpresaNombre,EmpresaDireccion,EmpresaTelefono,EmpresaEmail,EmpresaIdRepresentante,EmpresanomRepresentante) VALUES (:Codigo,:Nombre,:Direccion,:Telefono,:Email,:IdRepresentante,:NombreRepresentante)");
			
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":IdRepresentante",$datos['IdRepresentante']);
			$sql->bindParam(":NombreRepresentante",$datos['NombreRepresentante']);
			$sql->execute();
			return $sql;
		}
		
		protected function datos_empresa_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM empresa WHERE id=:Codigo AND EmpresaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM empresa WHERE EmpresaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT EmpresaCodigo,EmpresaNombre FROM empresa WHERE  EmpresaEstado = 'Activo' ORDER BY EmpresaNombre ASC");
			}
			$sql->execute();
			return $sql;
			
		}
		
		protected function desactivar_empresa_modelo($estado,$codigo){
			$query=mainModel::conectar()->prepare("UPDATE empresa SET EmpresaEstado=:Estado WHERE EmpresaCodigo=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		
	}
	