<?php
if($_SESSION['tipo_dsa'] != "Administrador"){
	echo $lc->forzar_cierre_sesion_controlador();
}

?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Clientes <small> USUARIO PRINCIPAL</small></h1>
	</div>
	<p class="lead"> Registre los clientes corporativos, sus datos basicos y la cuenta principal del cliente. Al igual registre las cuentas de usuario que el cliente considere necesarias para el ingreso a sus recursos.</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<?php if($_SESSION['Pri_nuevoClientes'] == 1){ ?>
	  	<li>
	  		<a id="shownewcliente" class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewcliente">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CLIENTE
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listClientesactivos'] == 1){ ?>
	  	<li>
	  		<a id="showListacliente"  class="btn btn-success btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CLIENTES
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listClientesdelete'] == 1){ ?>
		<li>
	  		<a id="showclienteeliminadas" class="btn btn-danger btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;CLIENTES ELIMINADOS
	  		</a>
			
	  	</li>
		<?php } if($_SESSION['Pri_buscarClientes'] == 1){ ?>
	  	<li>
	  		<a id="showfiltrocliente" class="btn btn-primary btn-xs">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CLIENTE
	  		</a>
	  	</li>
		<?php } ?>
	</ul>
</div>
<?php if($_SESSION['Pri_buscarClientes'] == 1){ ?>
<div id="filtro" class="container-fluid">
	<div>
		<button id="cerrardiv" type="button" class="close" >&times;</button>
		<div class="panel-heading">filtros</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group label-floating">
			<label class="control-label">¿A quién estas buscando?</label>
			<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="text" id="busquedad_cliente" maxlength="100">
		</div>
	</div>
</div>
<?php } ?>
<?php 
	/*require_once "./controladores/clienteControlador.php";
	$insClient= new clienteControlador();*/
?>
<!-- Panel listado de clientes -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CLIENTES </h3>
		</div>
		<div id="listaclientes"  class="panel-body">
			
			<?php
				/*$pagina = explode("/",$_GET['views']);
				
				echo $insClient->paginador_cliente_controlador($pagina[1],10,$_SESSION['privilegio_dsa'],"");*/
			?>
				
			
			
		</div>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>