<?php
			
		
		/*$peticionAjax=true;
		require_once "../controladores/guiaControlador.php";
		$insGuia= new guiaControlador();
		$data = $insGuia-> descargarsoporte_guia_controlador("Z25aTVIrY2EyazBVUnFod3hNcW1xRUJ0K2NUdjB2cXc4R0U5azI5a0M5Yz0","imgold");
		
		$carpeta = $data['Carpeta'];
		$nombre = $data['Archivo'];*/

		$carpeta = "/var/www/html/www.domiservicios.com/";
		$nombre = $_REQUEST['id'];

			$nombre_fichero = $carpeta."adjuntos/img/".$nombre;

			if (file_exists($nombre_fichero)) {
				$urlimagen = $carpeta."adjuntos/img/".$nombre;
				
			} else {
				$urlimagen = $carpeta."adjuntos/imgold/".$nombre;
				
			}
			
		

		
		
		$size = filesize($urlimagen);  
		header("Content-Transfer-Encoding: binary");  
		header("Content-type: application/force-download");  
		header("Content-Disposition: attachment; filename=$nombre");  
		header("Content-Length:$size");  
		readfile("$urlimagen");
		


	?>