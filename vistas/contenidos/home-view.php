<?php
/*if($_SESSION['tipo_dsa'] != "Administrador"){
	echo $lc->redireccionar_usuario_controlador($_SESSION['tipo_dsa']);
}*/
?>

	
<?php if($_SESSION['CuentaId'] == 1){ ?>
	<div class="container-fluid panel panel-info">
		<div>
			<button id="cerrarestadisticas" type="button" class="close" ><i class="zmdi zmdi-close "></i></button>
		</div>
		<div class="panel-heading">
			<h3 class="panel-title" id="Titlevisorimg"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; ESTADISTICAS </h3>
		</div>
		<div id="estadist" class="row">
			<div class="col-md-12 panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title" id="Titlevisorimg"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Entregas diarias por agente </h3>
				</div>
				<div id="chartentegasagente"  class="panel-body charthistorico">
					
				</div>
			</div>
			
			<div class="col-md-6 panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title" id="Titlevisorimg"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Recogida Vrs Entrega mensual </h3>
				</div>
				<div id="chartentegas"  class="panel-body charthistorico">
					
				</div>
			</div>
					
			<div class="col-md-6 panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title" id="Titlevisorimg"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Ingresos Vrs Costo Variable</h3>
				</div>
				<div id="charingrecost"  class="panel-body charthistorico">

				</div>
			</div>
			<div class="col-md-6 panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title" id="Titlevisorimg"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Recogida Vrs Entrega mensual </h3>
				</div>
				<div id="chartentegas"  class="panel-body charthistorico">
					
				</div>
			</div>
		
		
		</div>
	</div>
	
<?php } ?>
<?php if($_SESSION['Pri_integrantes'] == 1){ ?>
	<div class="container-fluid">
		<div class="page-header">
		  <h1 class="text-titles">Sistema <small>Integrantes</small></h1>
		</div>
	</div>
	<div class="full-box text-center" style="padding: 30px 10px;">

		<?php
			require "./controladores/administradorControlador.php";
			$IAdmin = new administradroControlador();
			$CAdmin= $IAdmin->datos_administrador_controlador("Conteo",0);
		?>
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				Administradores
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box"><?php echo $CAdmin->rowCount(); ?></p>
				<small>Registrados</small>
			</div>
		</article>

		<?php
			require "./controladores/clienteControlador.php";
			$ICliente = new clienteControlador();
			$CCliente = $ICliente->datos_cliente_controlador("Conteo",0);
		?>
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				Clientes
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-male-alt"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box"><?php echo $CCliente->rowCount(); ?></p>
				<small>Registros</small>
			</div>
		</article>
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				Mensajeros
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-face"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box">70</p>
				<small>Registros</small>
			</div>
		</article>

	</div>
<?php } ?>
<?php if($_SESSION['Pri_Bitacora'] == 1){ ?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Sistema <small>Tiempo en linea</small></h1>
	</div>
	<section id="cd-timeline" class="cd-container">
        <?php
			require_once "./controladores/bitacoraControlador.php";		
			$IBitacora= new bitacoraControlador();
		
			echo $IBitacora->listado_bitacora_controlador(10);
		?>
    </section>
</div>
<?php } ?>