<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class proyectoModelo extends mainModel{
		
		protected function agregar_proyecto_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO Proyecto(ProyectoNombre,ProyectoFechaCreacion,ProyectoCodigo,CuentaCodigo) VALUES(:Nombre,:Fecha,:CodigoProyecto,:Codigo)");
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->bindParam(":CodigoProyecto",$datos['CodigoProyecto']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->execute();
			return $sql;
		}
		protected function agregar_tarea_proyecto_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO Proy_Tareas(TareaNombre,PrioridadId,ProyectoCodigo,TareaFechaIniciada,TareaCreada) VALUES(:Nombre,:Prioridad,:Codigo,:FechaInicio,:FechaTarea)");
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Prioridad",$datos['Prioridad']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":FechaInicio",$datos['FechaInicio']);
			$sql->bindParam(":FechaTarea",$datos['FechaTarea']);
			$sql->execute();
			return $sql;
		}
		protected function actualizar_tarea_proyecto_modelo($datos){
			$sql=mainModel::conectar()->prepare("UPDATE Proy_Tareas SET TareaNombre=:Nombre,TareaDescripcion=:Descripcion,TareaInicio=:FechaInicio,TareaFinal=:Fechafin,PrioridadId=:Prioridad WHERE id=:Codigo");
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Descripcion",$datos['Descripcion']);
			$sql->bindParam(":Prioridad",$datos['Prioridad']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":FechaInicio",$datos['FechaInicio']);
			$sql->bindParam(":Fechafin",$datos['Fechafin']);
			$sql->execute();
			return $sql;
			
		}
		protected function eliminar_tarea_proyecto_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM Proy_Tareas WHERE id=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
			
		}
		protected function finini_tarea_proyecto_modelo($codigo,$estado){
			
			if($estado == 0){
				$query=mainModel::conectar()->prepare("UPDATE Proy_Tareas SET TareaFinalizada=:Estado,TareaArchivada=:Estado WHERE id=:Codigo");
				$query->bindParam(":Codigo",$codigo);
				$query->bindParam(":Estado",$estado);
				$query->execute();
				return $query;
			}else{
				$query=mainModel::conectar()->prepare("UPDATE Proy_Tareas SET TareaFinalizada=:Estado WHERE id=:Codigo");
				$query->bindParam(":Codigo",$codigo);
				$query->bindParam(":Estado",$estado);
				$query->execute();
				return $query;
			}
		}
		
		protected function archivar_tarea_proyecto_modelo($codigo,$estado){
			$query=mainModel::conectar()->prepare("UPDATE Proy_Tareas SET TareaArchivada=:Estado WHERE id=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Estado",$estado);
			$query->execute();
			return $query;
			
		}	
	}