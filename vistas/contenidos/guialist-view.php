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
<center>
	<div class="btn-group">
		<?php if($_SESSION['Pri_nuevaGuia'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="shownewguia"  data-toggle="modal" data-target="#divnewguia"><i class="zmdi zmdi-plus"></i> &nbsp;NUEVA GUIA</button>

		<?php } if($_SESSION['Pri_listGuiasactivos'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="showListaguia"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;LISTA GUIAS</button>

		<?php } if($_SESSION['Pri_listGuiasdelete'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="showguiaeliminadas"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;GUIAS CANCELADAS</button>

		<?php } if($_SESSION['Pri_editarGuiaMensajero'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="cargarescaner"  data-toggle="modal" data-target="#divupdateguia"><i class="zmdi zmdi-memory"></i> &nbsp;ESCANER QR</button>

		<?php } if($_SESSION['Pri_editarGuiaAdmin'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="cargarescaneradmin"  data-toggle="modal" data-target="#divupdateguiaadmin"><i class="zmdi zmdi-memory"></i> &nbsp;ESCANER QR</button>

		<?php } if($_SESSION['Pri_buscarGuias'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="showfiltroguia"><i class="zmdi zmdi-search"></i> &nbsp; BUSCAR GUIA</button>

		<?php } if($_SESSION['Pri_masFunionesGuias'] == 1){ ?>
			<button type="button" class="btn btn-primary btn-raised" id="showfuntions"  data-toggle="modal" data-target="#divfunctiones"><i class="zmdi zmdi-more"></i> &nbsp;MAS FUNCIONES</button>

		<?php } ?>
	</div>
</center>
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
					echo $insGuia->mensajero_select_guia_controlador("Select1","");
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
	<div class="col-md-3 col-xs-4">
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
	<div class="col-md-3 col-xs-4">
		<div class="form-group label-floating">
			<!--<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>-->
			<label class="control-label">fecha inicio </label>
			<input type="date" name="fechainicio" id="fechainicio" class="form-control">
			
		</div>
	</div>
	<div class="col-md-3 col-xs-4">
		<div class="form-group label-floating">
			<label class="control-label">fecha fin </label>
			<input type="date" name="fechafin" id="fechafin" class="form-control">
			
		</div>
	</div>
	<?php } ?>
	<div class="col-md-3 col-xs-12">
		<div class="form-group label-floating">
			<label class="control-label">¿Qué estas buscando?</label>
			<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" id="busquedad_guia" maxlength="100">
			<label>
				<select name="direc" id="direc"> 
				<option value="NO">NO</option>
				<option value="OK">OK</option>
				</select> 
				Direcciones de entregas
			</label>
		</div>
	</div>
</div>
<?php } ?>
<!-- Panel listado de clientes -->
<div class="container-fluid">
	<div class="panel panel-info">
		<?php if($_SESSION['Pri_Tableroalertas'] == 1){ ?>
		<div id="totalalertas" class="panel panel-info">
			<div>
				<button id="cerrartotalalertas" type="button" class="close" ><i class="zmdi zmdi-close-circle-o  zmdi-hc-2x"></i></button>
			</div>
			<div class="panel-heading">
				<h3 class="panel-title" id="Titlelistalert"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; TABLERO ALERTAS </h3>
			</div>
			<div id="listaalertas"  class="panel-body">

			</div>
		</div>
		<?php } 
		
		if($_SESSION['Pri_listGuiasactivos'] == 1){ ?>
		<div id="totalguias" class="panel panel-info">
			<div>
				<button id="cerrartotalguias" type="button" class="close" title="cerrar listado guias" ><i class="zmdi zmdi-close-circle-o  zmdi-hc-2x"></i></button>
				<button id="verlistaguias" type="button" class="close" title="Ver listado guias" ><i class="zmdi zmdi-format-list-bulleted zmdi-hc-2x"></i></button>
				<?php if($_SESSION['Pri_ResumenDiario'] == 1){ ?>
				<button id="vertotalresumen" type="button" class="close" title="Ver resumen de entregas" ><i class="zmdi zmdi-view-module zmdi-hc-2x"></i></button>
				<?php } if($_SESSION['Pri_VisorImgIndividual'] == 1){ ?>
				<button id="vertotalimg" type="button" class="close" title="Ver Imagen una a una" ><i class="zmdi zmdi-image-o zmdi-hc-2x"></i></button>
				<?php } if($_SESSION['Pri_Tableroalertas'] == 1){ ?>
				<button id="vertotalalertas" type="button" class="close " title="Ver listado de alertas" ><i class="zmdi zmdi-notifications-active zmdi-hc-2x"></i></button>
				<?php }?>
			</div>
			<div class="panel-heading">
				
				<h3 class="panel-title" id="Titlelistguia"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE GUIAS </h3>
			</div>
			<div id="listaguias"  class="panel-body">

			</div>
		</div>
		<?php }
		if($_SESSION['Pri_VisorImgIndividual'] == 1){ ?>
		<div id="totalimg" class="panel panel-info">
			<div>
				<button id="cerrartotalimg" type="button" class="close" ><i class="zmdi zmdi-close-circle-o  zmdi-hc-2x"></i></button>
			</div>
			<div class="panel-heading">
				
				<h3 class="panel-title" id="Titlevisorimg"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VISOR IMAGENES </h3>
			</div>
			<div class="row">
				
				<div class="col-md-3 col-xs-6">
					<div class="form-group label-floating">
						<label class="control-label">fecha movimiento desde *</label>
						<input type="date" name="fechadesdemovimiento" id="fechadesdemovimiento" class="form-control" required=""  min="2019-01-01" max="2999-12-31">
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="form-group label-floating">
						<label class="control-label">fecha movimiento hasta *</label>
						<input type="date" name="fechahastamovimiento" id="fechahastamovimiento" class="form-control" required=""  min="2019-01-01" max="2999-12-31">
					</div>
				</div>
				<div class="col-md-2 col-xs-5">
					<div class="form-group label-floating">
						<label class="control-label">Guia desde</label>
						<input class="form-control" type="number" name="verguiadesde" id="verguiadesde" maxlength="100">
					</div>
				</div>
				<div class="col-md-2 col-xs-5">
					<div class="form-group label-floating">
						<label class="control-label">Guia hasta</label>
						<input class="form-control" type="number" name="verguiahasta" id="verguiahasta" maxlength="100">
					</div>
				</div>
				<div class="col-md-2 col-xs-2">
					<p class="text-center">
						<select name="versionguias" id="versionguias"> 
							<option value="N">N</option>
							<option value="V">V</option>
						</select>
						<button id="playimg" type="button" class="btn btn-info"  ><i class="zmdi zmdi-play zmdi-hc-4x"></i></button>
					</p>
				</div>
				
				
			</div>
			<div id="visorimg"  class="panel-body">

			</div>
		</div>
		<?php }
		if($_SESSION['Pri_ResumenDiario'] == 1){ ?>
		<div id="totalresumen" class="panel panel-info">
			<div>
				<button id="cerrartotalresumen" type="button" class="close" ><i class="zmdi zmdi-close-circle-o  zmdi-hc-2x"></i></button>
			</div>
			<div class="panel-heading">
				
				<h3 class="panel-title" id="Titleresumenentregas"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; RESUMEN ENTREGAS </h3>
			</div>
			<div id="resumenentregas"  class="panel-body">

			</div>
		</div>
		<?php } ?>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>