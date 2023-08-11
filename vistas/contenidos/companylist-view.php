<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>EMPRESA</small></h1>
	</div>
	<p class="lead">Registre una o varias empresas de acuerdo a las necesidades que tenga, al final de los procesos obtendrá los registros y estadisticos separados por cada empresa y disponibles en el momento que los requiera.</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<?php if($_SESSION['Pri_nuevaempresa'] == 1){ ?>
			<li>
				<a  id="shownewempresa"class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewempresa">
					<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA EMPRESA
				</a>
			</li>
		<?php } if($_SESSION['Pri_listempresasactivas'] == 1){ ?>
			<li>
				<a id="showListaEmpresa" class="btn btn-success btn-xs">
					<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;EMPRESAS
				</a>

			</li>
		<?php } if($_SESSION['Pri_listempresasdelete'] == 1){ ?>
			<li>
				<a id="showEmpresaeliminadas" class="btn btn-danger btn-xs">
					<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;EMPRESAS ELIMINADAS
				</a>

			</li>
		<?php } ?>
	</ul>
</div>
<?php 
	//require_once "./controladores/empresaControlador.php";
	//$insEmpresa= new empresaControlador();
?>
<!-- panel lista de empresas -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EMPRESAS</h3>
		</div>
		<div id="listaempresas" class="panel-body">
			<?php
				//$pagina = explode("/",$_GET['views']);
				
				//echo $insEmpresa->paginador_empresa_controlador($pagina[1],10,$_SESSION['privilegio_dsa'],"");
			?>
				
		</div>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>