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
			
			
			$peticionAjax=true;
			require_once "../controladores/guiaControlador.php";
			$insGuia= new guiaControlador();
			$data = $insGuia->exportar_guias_guia_controlador($_POST['novedad-load'],$_POST['fechadesde-load'],$_POST['fechahasta-load']);
			
		?>
		
	</body>
</html>