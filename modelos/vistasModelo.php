<?php 

	class vistasModelo{
		protected function obtener_vistas_modelo($vistas){
			$listaBlanca=["adminsearch","admin","book","bookconfig","bookinfo","catalog","category","categorylist","client","clientsearch","company","companylist","home","myaccount","mydata","provider","providerlist","search","tareas","companyslist","cdrlist","cut","exportacionguiaup","printguia","pubhome","planillalist","rgdlist","guialist","clientlist","adminlist","mail"];
			
			//
			
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="login";
				}
			}elseif($vistas=="login"){
				$contenido="login";
			}elseif($vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}