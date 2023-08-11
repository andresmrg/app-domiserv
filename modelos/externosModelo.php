<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class externosModelo extends mainModel{

		
		//buscar soporte de guia para consultas externas
		protected function soporteguia_externos_guia_modelo($idguia){
			$sql = mainModel::conectar()->prepare("SELECT * FROM Mov_guia WHERE id = '$idguia' OR MovGuiaGuia = '$idguia' ");
			$sql->execute();
			return $sql;
		}
		
		
	
	}