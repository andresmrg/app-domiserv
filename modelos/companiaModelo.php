<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class companiaModelo extends mainModel{
		
		protected function agregar_compania_modelo($datos){
			$sql = mainModel::conectar()->prepare("INSERT INTO Compania (CompaniaCiudad,CompaniaBarrio,CompaniaDireccion,CompaniaTelefono,CompaniaEmail,CompaniaIdDirector,CompaniaDirector,CompaniaMemotecnico,CompaniaCodigo,EmpresaCodigo) VALUES (:Ciudad,:Barrio,:Direccion,:Telefono,:Email,:IdDirector,:Director,:Memotecnico,:Codigo,:EmpresaCodigo)");
			
			$sql->bindParam(":Ciudad",$datos['Ciudad']);
			$sql->bindParam(":Barrio",$datos['Barrio']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":IdDirector",$datos['IdDirector']);
			$sql->bindParam(":Director",$datos['Director']);
			$sql->bindParam(":Memotecnico",$datos['Memotecnico']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":EmpresaCodigo",$datos['EmpresaCodigo']);
			$sql->execute();
			return $sql;
		}
		
		protected function datos_compania_modelo($tipo,$codigo){
			if($tipo == "Unico"){
				$sql = mainModel::conectar()->prepare("SELECT * FROM Compania WHERE id=:Codigo AND CompaniaEstado = 'Activo'");
				
				$sql->bindParam(":Codigo",$codigo);
				
			}elseif($tipo == "Conteo"){
				$sql = mainModel::conectar()->prepare("SELECT id FROM Compania WHERE CompaniaEstado = 'Activo'");
			}elseif($tipo == "Select"){
				$sql = mainModel::conectar()->prepare("SELECT CompaniaCodigo,CompaniaMemotecnico FROM Compania WHERE CompaniaEstado = 'Activo' ORDER BY CompaniaMemotecnico ASC");
			}
			$sql->execute();
			return $sql;
			
		}
		
		protected function desactivar_compania_modelo($estado,$codigo){
			$query=mainModel::conectar()->prepare("UPDATE Compania SET CompaniaEstado=:Estado WHERE CompaniaCodigo=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
		}
		
	}
	