<?php
	if($peticionAjax){
		require_once "../core/configAPP.php";
	}else{
		require_once "./core/configAPP.php";
	}
	

	class mainModel{
		
		protected function conectar(){
			$enlace = new PDO(SGBD,USER,PASS);
			return $enlace;
		}
		
		protected function ejecutar_consulta_simple($consulta){
			$respuesta=mainModel::conectar()->prepare($consulta);
			$respuesta->execute();
			return $respuesta;
		}
		
		protected function agregar_cuenta($datos){
			$sql=self::conectar()->prepare("INSERT INTO cuenta(CuentaCodigo,CuentaPrivilegio,CuentaUsuario,CuentaClave,CuentaEmail,CuentaEstado,CuentaTipo,CuentaGenero,CuentaFoto,CompaniaCodigo,CuentaTablaVinculo) VALUES(:Codigo,:Privilegio,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto,:CompaniaCodigo,:TablaVinculo)");
		
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Privilegio",$datos['Privilegio']);
			$sql->bindParam(":Usuario",$datos['Usuario']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":Estado",$datos['Estado']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Genero",$datos['Genero']);
			$sql->bindParam(":Foto",$datos['Foto']);
			$sql->bindParam(":CompaniaCodigo",$datos['CompaniaCodigo']);
			$sql->bindParam(":TablaVinculo",$datos['TablaVinculo']);
			$sql->execute();
			
			return $sql;
			
		
		}
		
		protected function eliminar_cuenta($estado,$Codigo){
			$sql=self::conectar()->prepare("UPDATE cuenta SET CuentaEstado=:Estado WHERE CuentaCodigo=:Codigo");
			
			$sql->bindParam(":Estado",$estado);
			$sql->bindParam(":Codigo",$Codigo);
			$sql->execute();
			
			return $sql;
		}
		
		protected function datos_cuenta($codigo,$tipo){
			
			$sql=mainModel::conectar()->prepare("SELECT * FROM cuenta WHERE CuentaCodigo=:Codigo AND CuentaTipo=:Tipo");
			
			$sql->bindParam(":Codigo",$codigo);
			$sql->bindParam(":Tipo",$tipo);
			$sql->execute();
			
			return $sql;
		}
		
		protected function actualizar_cuenta($datos){
			$sql=mainModel::conectar()->prepare("UPDATE cuenta SET CuentaPrivilegio=:Privilegio, CuentaUsuario=:Usuario,CuentaClave=:Clave,CuentaEmail=:Email,CuentaEstado=:Estado,CuentaGenero=:Genero,CuentaFoto=:Foto WHERE CuentaCodigo=:Codigo");
			
			$sql->bindParam(":Privilegio",$datos['CuentaPrivilegio']);
			$sql->bindParam(":Usuario",$datos['CuentaUsuario']);
			$sql->bindParam(":Clave",$datos['CuentaClave']);
			$sql->bindParam(":Email",$datos['CuentaEmail']);
			$sql->bindParam(":Estado",$datos['CuentaEstado']);
			$sql->bindParam(":Genero",$datos['CuentaGenero']);
			$sql->bindParam(":Foto",$datos['CuentaFoto']);
			$sql->bindParam(":Codigo",$datos['CuentaCodigo']);
			$sql->execute();
			
			return $sql;
		}
		
		protected function guardar_privilegios($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO Privilegio(CuentaCodigo,PrivilegioPaginaInicio) VALUES(:Codigo,:Pagina)");
		
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Pagina",$datos['Pagina']);
			
			$sql->execute();
			
			return $sql;
			
		
		}
		
		protected function guardar_bitacora($datos){
			$sql=self::conectar()->prepare("INSERT INTO bitacora(BitacoraCodigo,BitacoraFecha,BitacoraHoraInicio,BitacoraHoraFinal,BitacoraTipo,BitacoraYear,CuentaCodigo) VALUES(:Codigo,:Fecha,:HoraInicio,:HoraFinal,:Tipo,:Year,:Cuenta)");
			
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->bindParam(":HoraInicio",$datos['HoraInicio']);
			$sql->bindParam(":HoraFinal",$datos['HoraFinal']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Year",$datos['Year']);
			$sql->bindParam(":Cuenta",$datos['Cuenta']);
			$sql->execute();
			
			return $sql;
		}
		
		protected function actualizar_bitacora($codigo,$hora){
			$sql=self::conectar()->prepare("UPDATE bitacora SET BitacoraHoraFinal=:Hora WHERE BitacoraCodigo=:Codigo");
			$sql->bindParam(":Hora",$hora);
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			
			return $sql;
		}
		
		protected function eliminar_bitacora($codigo){
			$sql=self::conectar()->prepare("DELETE FROM bitacora WHERE CuentaCodigo =:Codigo");
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			
			return $sql;
		}
		
		public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		
		public function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
		
		protected function generar_codigo_aleatorio($letra,$longitud,$num){
			for($i=1; $i<=$longitud;$i++){
				$numero = rand(0,9);
				$letra.=$numero;
				
			}
			return $letra.$num;
		}
		
		protected function limpiar_cadena($cadena){
			$cadena = trim($cadena); //quita espacios 
			$cadena = stripslashes($cadena); //quita backeslas
			$cadena = str_ireplace("<script>","",$cadena);
			$cadena = str_ireplace("</script>","",$cadena);
			$cadena = str_ireplace("<script src","",$cadena);
			$cadena = str_ireplace("<script type ","",$cadena);
			$cadena = str_ireplace("SELECT * FROM","",$cadena);
			$cadena = str_ireplace("DELETE * FROM","",$cadena);
			$cadena = str_ireplace("INSERT INTO","",$cadena);
			$cadena = str_ireplace("SELECT * FROM","",$cadena);
			$cadena = str_ireplace("--","",$cadena);
			$cadena = str_ireplace("^","",$cadena);
			$cadena = str_ireplace("[","",$cadena);
			$cadena = str_ireplace("]","",$cadena);
			$cadena = str_ireplace("==","",$cadena);
			$cadena = str_ireplace(";","",$cadena);
			
			return $cadena;
		}
		
		//sanear ortografia
		protected function Limpiar_acentos($string){
 
			$string = trim($string);

			$string = str_replace(
				array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
				array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
				$string
			);

			$string = str_replace(
				array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
				array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
				$string
			);

			$string = str_replace(
				array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
				array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
				$string
			);

			$string = str_replace(
				array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
				array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
				$string
			);

			$string = str_replace(
				array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
				array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
				$string
			);

			$string = str_replace(
				array('ñ', 'Ñ', 'ç', 'Ç'),
				array('ñ', 'Ñ', 'c', 'C',),
				$string
			);
			$string = str_replace(
				array('null', 'NULL','Null'),
				'',
				$string
			);

			//Esta parte se encarga de eliminar cualquier caracter extraño
			//$string = str_replace(
				//array("\", "¨", "º", "-", "~","#", "@", "|", "!", ""","·", "$", "%", "&", "/", "(", ")", "?", "'", "¡","¿", "[", "^", "<code>", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":",".", " "),
			//	'',
			//	$string
			//);


			return $string;
		}
		
		protected function sweet_alert($datos){
			if($datos['Alerta']=="simple"){
				$alerta="
					<script>
						swal(
							  '".$datos['Titulo']."',
							  '".$datos['Texto']."',
							  '".$datos['Tipo']."'
							)
					</script>
				";
			}elseif($datos['Alerta']=="recargar"){
				$alerta="
					<script>
						swal({
						  title: '".$datos['Titulo']."',
						  text: '".$datos['Texto']."',
						  type: '".$datos['Tipo']."',
						  confirmButtonText: 'Aceptar'
						}).then(function () {
						 	location.reload();
						});
					</script>
				";
			}elseif($datos['Alerta']=="limpiar"){
				$alerta="
					<script>
						swal({
						  title: '".$datos['Titulo']."',
						  text: '".$datos['Texto']."',
						  type: '".$datos['Tipo']."',
						  confirmButtonText: 'Aceptar'
						}).then(function(){
						 	$('.FormularioAjax')[0].reset();
						});
					</script>
				";
			}
			return $alerta;		
		}
		
		protected function sweet_alert1($datos){
			if($datos['Alerta']=="simple"){
				$alerta="
					<script>
						swal(
							  '".$datos['Titulo']."',
							  '".$datos['Texto']."',
							  '".$datos['Tipo']."'
							)
					</script>
				";
			}elseif($datos['Alerta']=="recargar"){
				$alerta="
					<script>
						swal({
						  title: '".$datos['Titulo']."',
						  text: '".$datos['Texto']."',
						  type: '".$datos['Tipo']."',
						  confirmButtonText: 'Aceptar'
						}).then(function () {
						 	location.reload();
						});
					</script>
				";
			}elseif($datos['Alerta']=="limpiar"){
				$alerta="
					<script>
						swal({
						  title: '".$datos['Titulo']."',
						  text: '".$datos['Texto']."',
						  type: '".$datos['Tipo']."',
						  confirmButtonText: 'Aceptar'
						}).then(function(){
						 	$('.FormularioAjax1')[0].reset();
						});
					</script>
				";
			}
			return $alerta;		
		}
	}