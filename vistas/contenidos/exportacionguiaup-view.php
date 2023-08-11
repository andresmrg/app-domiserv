<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento sin título</title>
		
	</head>

	<body>
		<?php 
	require_once "./controladores/guiaControlador.php";
	$insGuia= new guiaControlador();
	$data = $insGuia->exportar_guias_guia_controlador();
	?>
		
	</body>
	<!--<script src="<?php //echo SERVERURL; ?>vistas/js/expoexcel/jquery-1.12.4.min.js"></script>
	<script src="<?php //echo SERVERURL; ?>vistas/js/expoexcel/FileSaver.min.js"></script>
	<script src="<?php //echo SERVERURL; ?>vistas/js/expoexcel/Blob.min.js"></script>
	<script src="<?php //echo SERVERURL; ?>vistas/js/expoexcel/xls.core.min.js"></script>
	<script src="<?php //echo SERVERURL; ?>vistas/js/expoexcel/tableexport.js"></script>
	<script>
	$("table").tableExport({
		formats: ["xlsx","txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
		position: 'button',  // Posicion que se muestran los botones puedes ser: (top, bottom)
		bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
		fileName: "ListadoPaises",    //Nombre del archivo 
	});
</script>-->
</html>