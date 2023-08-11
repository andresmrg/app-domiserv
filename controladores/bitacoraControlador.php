<?php
	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	
	class bitacoraControlador extends mainModel{
		
		public function listado_bitacora_controlador($registros){
			$registros=mainModel::limpiar_cadena($registros);
			
			$datos=mainModel::ejecutar_consulta_simple("SELECT * FROM bitacora WHERE CuentaCodigo <> 'AC86682181'  ORDER BY id DESC LIMIT $registros");
			
			$conteo = 0;
			
			while($rows=$datos->fetch()){
				$conteo=$conteo+1;
				$datosC=mainModel::ejecutar_consulta_simple("SELECT * FROM cuenta WHERE CuentaCodigo='".$rows['CuentaCodigo']."'");
				$datosC=$datosC->fetch();
				
				if($rows['BitacoraTipo'] == "Administrador"){
					$datosU=mainModel::ejecutar_consulta_simple("SELECT AdminNombre, AdminApellido FROM admin WHERE CuentaCodigo='".$rows['CuentaCodigo']."'");
					$datosU=$datosU->fetch();
					$NombreCompleto = $datosU['AdminNombre']." ".$datosU['AdminApellido'];
				}else{
					$datosU=mainModel::ejecutar_consulta_simple("SELECT ClienteCNombre, ClienteCApellido FROM clienteC WHERE CuentaCodigo='".$rows['CuentaCodigo']."'");
					$datosU=$datosU->fetch();
					$NombreCompleto = $datosU['ClienteCNombre']." ".$datosU['ClienteCApellido'];
				}
				
				echo '
					<div class="cd-timeline-block">
						<div class="cd-timeline-img">
							<img src="'.SERVERURL.'vistas/assets/avatars/'.$datosC['CuentaFoto'].'" alt="user-picture">
						</div>
						<div class="cd-timeline-content">
							<h4 class="text-center text-titles">'.$conteo.' - '.$NombreCompleto.' ('.$datosC['CuentaUsuario'].')</h4>
							<h4 class="text-center text-titles">'.$rows['BitacoraTipo'].'</h4>
							<p class="text-center">
								<i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>'.$rows['BitacoraHoraInicio'].'</em> &nbsp;&nbsp;&nbsp; 
								<i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>'.$rows['BitacoraHoraFinal'].'</em>
							</p>
							<span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>'.date("d/m/Y",strtotime($rows['BitacoraFecha'])).'</span>
						</div>
					</div> 
				
				';
			}
		}
	
	}