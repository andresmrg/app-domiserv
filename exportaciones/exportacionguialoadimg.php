<?php

header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=Listado_de_guias.xls');

//session_start(['name'=>'DSA']);




?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento sin título</title>
	</head>

	<body id="expoguias">
		<?php
			
			$datos =[
				"Agente"=>$_POST['agenteimg-load'],
				"Fechadesde"=>$_POST['fechacarguedesde-load'],
				"Fechahasta"=>$_POST['fechacarguehasta-load'],
				"Guiadesde"=>$_POST['fguiadesde-load'],
				"Guiahasta"=>$_POST['guiahasta-load'],
				"Tipo"=>$_POST['checkidinicial-load']
			];
		
			$peticionAjax=true;
			require_once "../controladores/guiaControlador.php";
			$insGuia= new guiaControlador();
			$data = $insGuia->exportar_Upimg_guia_controlador($datos);
			
		?>
		
	</body>
</html>