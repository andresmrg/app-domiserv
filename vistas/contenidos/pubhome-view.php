<div class="slider">
	<ul>
		<li><img src="<?php echo SERVERURL; ?>vistas/assets/img/img1.jpg" alt=""></li>
		<li><img src="<?php echo SERVERURL; ?>vistas/assets/img/img2.jpeg" alt=""></li>
		<li><img src="<?php echo SERVERURL; ?>vistas/assets/img/img3.jpg" alt=""></li>
		<li><img src="<?php echo SERVERURL; ?>vistas/assets/img/img4.jpg" alt=""></li>
	</ul>
</div>

<div id="idsoporguia" class=" modal-content ">
	<button id="cerrarsoporteguia" type="button" class="close" >&times;</button>
	<div >.... soporte de guia  ....</div>

	<div class="row">
		<div class=" col-md-6 col-xs-6">
			<div id="detallesoporteCLI" >

			</div>
		</div>
		<div class=" col-md-6 col-xs-6">
			<div id="detallesoporteCLI1" >

			</div>
		</div>
	</div>
</div>
<div id="idsoporguia1" class=" pre-scrollable " >

	<img src="" id="visualizarimg"  class="disable" alt=""/>
	<div id="alerta"></div>
	<div id="Alerta1">
		<div class="alert alert-dismissible alert-danger text-center">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
			<h4>¡Alerta!</h4>
			<p>La guia que esta ingresando no existe, por favor verifique el número y vuelva a intentar</p>
		</div>
	</div>
	<div id="Alerta2">
		<div class="alert alert-dismissible alert-warning text-center">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
			<h4>¡Alerta!</h4>
			<p>No ha ingresado un número de guia, por favor digite el número y vuelva a intentar</p>
		</div>
	</div>
</div >
<div id="idsoporguia2" class="">
	<div class="modal-footer">
		<button id="cerrarsoporteguia1" type="button" class="btn btn-primary" >Cerrar</button>
	</div>
</div>


<div class="envios">
	<form  class="consulta">

		<div class="denvios">
			Seguimiento
		</div>
		<div class="denvios">
			<select class="opciones" name="tipoconculta" id="tipoconculta">
			<option id="">Envios</option>
			<option id="">Solicitud de recolección</option></select>
		</div>
		<div class="denvios">
			<input class="opciones" type="text" name="numeroguia" id="numeroguia" placeholder="Su número de guia  ">
		</div>
		<div class="denvios">
			<button id="VersoporteCLI" class="opciones" title="Ver soporte" > <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg> Consultar</button>

		</div>

	</form>
</div>

