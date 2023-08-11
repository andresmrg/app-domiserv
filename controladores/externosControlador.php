	<?php
	if($peticionAjax){
		require_once "../modelos/externosModelo.php";
	}else{
		require_once "./modelos/externosModelo.php";
	}
	

class externosControlador extends externosModelo{
	
	
	//buscar soporte de guia para consultas externas
	public function soporteguia_externo_guia_controlador($idguia){
			
		$DatosGuia = externosModelo::soporteguia_externos_guia_modelo($idguia);
		$campos = $DatosGuia->fetch();
		
		$imagen = "sin_imagen.jpg";
		if($DatosGuia->rowCount()>= 1){				
			
			$imagen = "sin_imagen.jpg";
			$carpeta = "";
			if($campos['MovGuiaImagen'] != "sin_imagen.jpg"){
				$imagen = mainModel::decryption($campos['MovGuiaImagen']);


				$nombre_fichero = SERVERFILE."adjuntos/img/".$imagen;

				if (file_exists($nombre_fichero)) {
					$urlimagen = SERVERURL."adjuntos/img/".$imagen;
					$carpeta = "img";
				} else {
					$urlimagen = SERVERURL."adjuntos/imgold/".$imagen;
					$carpeta = "imgold";
				}
				$caracteristica = [
					"urlimagen"=>$urlimagen,
					"imagen"=>$imagen

				];
				$campos= array_merge($campos,$caracteristica);
			}else{
				$html = '<div class="alert alert-dismissible alert-primary text-center">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<i class="zmdi zmdi-alert-octagon zmdi-hc-5x"></i>
							<h4>¡Alerta!</h4>
							<p>La guia '.$idguia.' se encuentra en proceso logístico</p>
						</div>';
				
				$caracteristica = [
					"Tabla"=>$html,
					"imagen"=>$imagen

				];
				$campos= array_merge($campos,$caracteristica);
			}
				
			
	
			
			
			
		}else{
			//echo 
			$campos = 0;
			$html = '<div class="alert alert-dismissible alert-danger text-center">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
						<h4>¡Alerta!</h4>
						<p>La guia '.$idguia.' no existe, por favor verifique el número y vuelva a intentar</p>
					</div>';

			$caracteristica = [
				"Tabla"=>$html,
				"imagen"=>$imagen

			];
			$campos= array_merge($campos,$caracteristica);
		}
		
		
				
		echo json_encode($campos,JSON_UNESCAPED_UNICODE);
	}
	


}