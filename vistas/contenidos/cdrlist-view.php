<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>CDR</small></h1>
	</div>
	<p class="lead">Registre los centros de recepcion documental (CDR) que requiera para cada compañia, cada compañia puede tener un numero infinito de (CDR) y las mismas seran regidas e identificadas a nivel global bajo el nombre de la compañia bajo la cual fue registrado y a la vez bajo la empresa principal.</p>
</div>


<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<?php if($_SESSION['Pri_nuevaCdr'] == 1){ ?>
	  	<li>
	  		<a  id="shownewcdr"class="btn btn-info btn-xs" data-toggle="modal" data-target="#divnewcdr">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CDR
	  		</a>
	  	</li>
		<?php } if($_SESSION['Pri_listCdrsactivos'] == 1){ ?>
	  	<li>
	  		<a id="showListacdr" class="btn btn-success btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;DCR'S
	  		</a>
			
	  	</li>
		<?php } if($_SESSION['Pri_listCdrsdelete'] == 1){ ?>
		<li>
	  		<a id="showcdreliminadas" class="btn btn-danger btn-xs">
	  			<i class="zmdi zmdi-format-list-bulleted "></i> &nbsp;CDR'S ELIMINADOS
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
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CDR'S</h3>
		</div>
		<div id="listacdrs" class="panel-body">
			<?php
				//$pagina = explode("/",$_GET['views']);
				
				//echo $insEmpresa->paginador_empresa_controlador($pagina[1],10,$_SESSION['privilegio_dsa'],"");
			?>
				
		</div>
		<div class="RespuestaAjaxgenerales">
			
		</div>
	</div>
</div>