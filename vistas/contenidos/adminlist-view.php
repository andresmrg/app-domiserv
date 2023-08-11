<?php
if($_SESSION['tipo_dsa'] != "Administrador"){
	echo $lc->forzar_cierre_sesion_controlador();
}

?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>EMPLEADOS / CONTRATISTAS</small></h1>
	</div>
	<p class="lead">Registro de datos generales y basicos de empleados y contratistas al igual la creacion de cuentas para ingreso al sistema.</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<?php if($_SESSION['Pri_nuevaCuentaEmpleados'] == 1){ ?>
	  	<li>
	  		<a id="shownewadministrador"class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewadministrador">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EMPLEADO / CONTRATISTA
	  		</a>
		</li>
		<?php } if($_SESSION['Pri_listCuentaEmpleadosactivos'] == 1){ ?>
	  	<li>
	  		<a id="showListaadministrador"  class="btn btn-success btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; EMPLEADOS / CONTRATISTAS
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listCuentaEmpleadosdelete'] == 1){ ?>
		<li>
	  		<a id="showadministradoreliminadas" class="btn btn-danger btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;EMPLEADOS / CONTRATISTAS ELIMINADOS
	  		</a>
			
	  	</li>
		<?php } if($_SESSION['Pri_buscarcuentasEmpleados'] == 1){ ?>
		<li>
	  		<a id="showfiltroadministrador" class="btn btn-primary btn-xs">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR EMPLEADOS / CONTRATISTAS
	  		</a>
	  	</li>
		<?php } ?>
	</ul>
</div>
<?php if($_SESSION['Pri_buscarcuentasEmpleados'] == 1){ ?>
<div id="filtro" class="container-fluid">
	<div>
		<button id="cerrardiv" type="button" class="close" >&times;</button>
		<div class="panel-heading">filtros</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group label-floating">
			<label class="control-label">¿A quién estas buscando?</label>
			<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" id="busquedad_empleado" maxlength="100">
		</div>
	</div>
</div>
<?php } ?>
<?php 
	//require_once "./controladores/administradorControlador.php";
	//$insAdmin= new administradroControlador();
?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ADMINISTRADORES</h3>
		</div>
		<div id="listaadministradores" class="panel-body">
			
			<?php
				//$pagina = explode("/",$_GET['views']);
				
				//echo $insAdmin->paginador_administrador_controlador($pagina[1],10,$_SESSION['privilegio_dsa'],$_SESSION['codigo_cuenta_dsa'],"");
			?>
				
		</div>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>