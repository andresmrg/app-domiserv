<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> MIS DATOS</small></h1>
	</div>
	<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
	<?php
		$datos=explode("/",$_GET['views']);
		
		//ADMINISTRADOR
		if($datos[1]=="admin"){
			if($_SESSION['tipo_dsa'] != "Administrador"){
				echo $lc->forzar_cierre_sesion_controlador();
			}		
			require_once "./controladores/administradorControlador.php";
			
			$classAdmin= new administradroControlador();
			$filesA=$classAdmin->datos_administrador_controlador("Unico",$datos[2]);
			
			if($filesA->rowCount()==1){
				
				$campos=$filesA->fetch();
				
				if($campos['CuentaCodigo'] != $_SESSION['codigo_cuenta_dsa']){
					if($_SESSION['privilegio_dsa'] <1 || $_SESSION['privilegio_dsa']>3){
						echo $lc->forzar_cierre_sesion_controlador();
					}
				}
	?>
	<div class="panel panel-success">
		
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
				<li>
					<a href="<?php echo SERVERURL; ?>admin" class="btn btn-info">
						<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ADMINISTRADOR
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>adminlist" class="btn btn-success">
						<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ADMINISTRADORES
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>adminsearch" class="btn btn-primary">
						<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
					</a>
				</li>
			</ul>
		</div>		
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="cuenta-up" value="<?php echo $datos[2] ?>"
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-up" value="<?php echo $campos['AdminDNI'] ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-up" value="<?php echo $campos['AdminNombre'] ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-up" value="<?php echo $campos['AdminApellido'] ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Teléfono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-up" value="<?php echo $campos['AdminTelefono'] ?>" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<textarea name="direccion-up" class="form-control" rows="2" maxlength="100"><?php echo $campos['AdminDireccion'] ?></textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
			    </p>
			<div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
	<?php
			}else{
	?>
	<div class="alert alert-dismissible alert-warning text-center">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h4>Lo sentimos </h4>
		<p>No podemos mostrar la información del administrador.</p>
	</div>
			
	<?php	
	}
			
	//USUARIOS
	}elseif($datos[1]=="user"){
		require_once "./controladores/clienteControlador.php";



		$classClient= new clienteControlador();
		$filesC=$classClient->datos_cliente_controlador("Unico",$datos[2]);

		if($filesC->rowCount()==1){

			$campos=$filesC->fetch();

			if($campos['CuentaCodigo'] != $_SESSION['codigo_cuenta_dsa']){
				if($_SESSION['privilegio_dsa'] <1 || $_SESSION['privilegio_dsa']>2){
					echo $lc->forzar_cierre_sesion_controlador();
				}
			}
?>
<!-- Panel nuevo cliente -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
				<li>
					<a href="<?php echo SERVERURL; ?>client" class="btn btn-info">
						<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CLIENTE
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>clientlist" class="btn btn-success">
						<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CLIENTES
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>clientsearch" class="btn btn-primary">
						<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CLIENTE
					</a>
				</li>
			</ul>
		</div>
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; ACTUALIZAR CLIENTE</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/clienteAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="cuenta-up" value="<?php echo $datos[2]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-up" value="<?php echo $campos['ClienteDNI']; ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-up" value="<?php echo $campos['ClienteNombre']; ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-up" value="<?php echo $campos['ClienteApellido']; ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Teléfono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-up" value="<?php echo $campos['ClienteTelefono']; ?>" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Cargo/Ocupación *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ocupacion-up" value="<?php echo $campos['ClienteOcupacion']; ?>" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<textarea name="direccion-up" class="form-control" rows="2" maxlength="100"><?php echo $campos['ClienteDireccion']; ?></textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    				
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
			    </p>
				
				<div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>


<?php }else{ 
	?>
	<div class="alert alert-dismissible alert-warning text-center">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h4>Lo sentimos </h4>
		<p>No podemos mostrar la información del cliente.</p>
	</div>
	<?php
			}
		//ERROR
		}else{
	?>
	<div class="alert alert-dismissible alert-warning text-center">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h4>Lo sentimos </h4>
		<p>No podemos mostrar la información colicitada.</p>
	</div>
	<?php };	?>
	
</div>