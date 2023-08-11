<?php
/*if($_SESSION['tipo_dsa'] != "Administrador"){
	echo $lc->forzar_cierre_sesion_controlador();
}*/

?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> Guias <small> REGISTRO DE GUIAS Y PROCESOS</small></h1>
	</div>
	<p class="lead"></p>
</div>
<input type="hidden" id="recharge" value="">
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<?php if($_SESSION['Pri_nuevaGuia'] == 1){ ?>
		
	  	<li>
	  		<a id="shownewguia" class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewguia">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO GUIA
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listGuiasactivos'] == 1){ ?>
	  	<li>
	  		<a id="showListaguia"  class="btn btn-warning btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA GUIAS
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listGuiasdelete'] == 1){ ?>
		<li>
	  		<a id="showguiaeliminadas" class="btn btn-success btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp; GUIAS CANCELADAS
	  		</a>
			
	  	</li>
		<?php } if($_SESSION['Pri_editarGuiaMensajero'] == 1){ ?>
		<li>
	  		<a id="cargarescaner" class="btn btn-info btn-xs" data-toggle="modal" data-target="#divupdateguia">
	  			<i class="zmdi zmdi-memory"></i> &nbsp; ESCANER QR
	  		</a>
		</li>
		<?php } if($_SESSION['Pri_editarGuiaAdmin'] == 1){ ?>
	  	<li>
			<a id="cargarescaneradmin" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#divupdateguiaadmin">
	  			<i class="zmdi zmdi-memory"></i> &nbsp; ESCANER QR
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_buscarGuias'] == 1){ ?>
	  	<li>
	  		<a id="showfiltroguia" class="btn btn-success btn-xs">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR GUIA
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_masFunionesGuias'] == 1){ ?>
		<li>
			<a id="showfuntions" class="btn btn-info btn-xs" data-toggle="modal" data-target="#divfunctiones">
	  			<i class="zmdi zmdi-more"></i> &nbsp; MAS FUNCIONES
	  		</a>
	  	</li>
		<?php } ?>
	</ul>
</div>
<?php if($_SESSION['Pri_buscarGuias'] == 1){ ?>
	<div id="filtroguia" class="container-fluid">
	<div>
		<button id="cerrardivguia" type="button" class="close" >&times;</button>
		<div class="panel-heading">filtros</div>
	</div>
	<?php 
	require_once "./controladores/guiaControlador.php";
	$insGuia= new guiaControlador();
	?>
	<?php if($_SESSION['Pri_filtromensajero'] == 1){ ?>	
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">Agente </label>
			<select id="agente_filtro" name="agente_filtro" class="form-control" >
				<?php				
					echo $insGuia->mensajero_select_guia_controlador("Select","");
				?>

			</select>
		</div>
	</div>
	<?php } if($_SESSION['Pri_filtronovedad'] == 1){ ?>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">Novedad </label>
			<select id="novedad_filtro" name="novedad_filtro" class="form-control">
				<?php				
					echo $insGuia->novedad_select_guia_controlador("Select","RECLASIFICAR");
				?>

			</select>
		</div>
	</div>
	<?php } if($_SESSION['Pri_filtrozona'] == 1){ ?>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">Zona </label>
			<select id="zona_filtro" name="zona_filtro" class="form-control">
				<?php				
					echo $insGuia->zona_select_guia_controlador("Select","");
				?>

			</select>
		</div>
	</div>
	<?php } if($_SESSION['Pri_filtrotipofecha'] == 1){ ?>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">Fecha  </label>
			<select id="tipo_filtro" name="tipo_filtro" class="form-control">
				<option value="FRecogida">F. Recogida</option>
				<option value="FAsignado">F. Asignado</option>
				<option value="FMovimiento">F. Movimiento</option>

			</select>
		</div>
	</div>
	<?php } if($_SESSION['Pri_filtrotiposervicio'] == 1){ ?>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">Tipo servicio </label>
			<select id="servicio_filtro" name="servicio_filtro" class="form-control">
				
				<?php				
					echo $insGuia->servicios_select_guia_controlador("Select","LISTADO","");
				?>
			</select>
		</div>
	</div>
	<?php } if($_SESSION['Pri_filtrofecha'] == 1){ ?>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<!--<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>-->
			<label class="control-label">fecha inicio </label>
			<input type="date" name="fechainicio" id="fechainicio" class="form-control">
			
		</div>
	</div>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">fecha fin </label>
			<input type="date" name="fechafin" id="fechafin" class="form-control">
			
		</div>
	</div>
	<?php } ?>
	<div class="col-md-3 col-xs-3">
		<div class="form-group label-floating">
			<label class="control-label">¿Qué estas buscando?</label>
			<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" id="busquedad_guia" maxlength="100">
		</div>
	</div>
</div>
<?php } ?>
<!-- Panel listado de clientes -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title" id="Titlelistguia"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE GUIAS </h3>
		</div>
		<div id="listaguias"  class="panel-body">
			
		
			
			
		</div>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>