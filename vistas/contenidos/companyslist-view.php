<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>Compañias</small></h1>
	</div>
	<p class="lead">Registre las compañias que requiera cada empresa para llevar a cabo su desempeño como razón social, cada empresa puede tener un numero infinito de compañias y las mismas seran regidas e identificadas a nivel global bajo el nombre de la empresa principal.</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<?php if($_SESSION['Pri_nuevaCompania'] == 1){ ?>
	  	<li>
	  		<a  id="shownewcompania"class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewcompania">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA COMPAÑIA
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listcompaniasactivas'] == 1){ ?>
	  	<li>
	  		<a id="showListacompania" class="btn btn-success btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;COMPAÑIAS
	  		</a>
			
	  	</li>
		<?php } if($_SESSION['Pri_listcompaniasdelete'] == 1){ ?>
		<li>
	  		<a id="showcompaniaeliminadas" class="btn btn-danger btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;COMPAÑIAS ELIMINADAS
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
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE COMPAÑIAS</h3>
		</div>
		<div id="listacompanias" class="panel-body">
			<?php
				//$pagina = explode("/",$_GET['views']);
				
				//echo $insEmpresa->paginador_empresa_controlador($pagina[1],10,$_SESSION['privilegio_dsa'],"");
			?>
				
		</div>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>