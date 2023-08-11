<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/material.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/ripples.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/main.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/cssrefresh.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/generalFunciones.js"></script>

<?php
	if(isset($_GET['views'])){
		$ruta=explode("/", $_GET['views']);
		//muestra modales de proyectos y tareas

		if($ruta[0] == "tareas"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/proyectoFunciones.js"></script>
<?php
		}
		if($ruta[0] == "companylist"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/empresaFunciones.js"></script>
<?php
		}
		if($ruta[0] == "companyslist"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/companiaFunciones.js"></script>
<?php
		}
		if($ruta[0] == "cdrlist"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/cdrFunciones.js"></script>
<?php
		}
if($ruta[0] == "adminlist"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/administradorFunciones.js"></script>
<?php
		}
if($ruta[0] == "clientlist"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/clienteFunciones.js"></script>
<?php
		}
if($ruta[0] == "guialist"){
?>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/guiaFunciones.js"></script>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/guiaImagenFunciones.js"></script>
		<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/instascan.min.js"></script>

<?php
		}

if($ruta[0] == "codebarr"){
?>


	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/barcode.js"></script>
	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/codebarr.js"></script>
<?php
		}
if($ruta[0] == "home"){

?>

	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/core.js"></script>
	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/charts.js"></script>
	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/animated.js"></script>
	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/funcionesjs/graficaFunciones.js"></script>
<?php

		}
	}
?>




