<section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
	<div class="full-box dashboard-sideBar-ct">
		<!--SideBar Title -->
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			 <?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
		</div>
		<!-- SideBar User info -->
		<div class="full-box dashboard-sideBar-UserInfo">
			<figure class="full-box">
				<a href="<?php echo SERVERURL; ?>cut/" ><img src="<?php echo SERVERURL; ?>vistas/assets/avatars/<?php echo $_SESSION['foto_dsa']; ?>" alt="UserIcon" ></a>
				
				<figcaption class="text-center text-titles"><?php echo $_SESSION['nombre_dsa']; ?><br><?php echo $_SESSION['tipo_dsa']; ?></figcaption>
			</figure>
			<?php
			$usuActivo = $lc->encryption($_SESSION['codigo_cuenta_dsa']);
			if($_SESSION['tipo_dsa'] == "Administrador"){
				$tipo ="admin";
			}else{
				$tipo ="user";
				
			}
			?>
			<ul class="full-box list-unstyled text-center">
				<li>
					<!--<a href="<?php// echo SERVERURL; ?>mydata/<?php// echo $tipo."/".$lc->encryption($_SESSION['codigo_cuenta_dsa']); ?>/" title="Mis datos">
						<i class="zmdi zmdi-account-circle"></i>
					</a>-->
					<a id="datosusuario" title="Mis datos" data-toggle="modal" data-target="#divupdatedatos">
						<i class="zmdi zmdi-account-circle"></i>
					</a>
				</li>
				<li>
					<!--<a href="<?php //echo SERVERURL; ?>myaccount/<?php //echo $tipo."/".$lc->encryption($_SESSION['codigo_cuenta_dsa']); ?>/" title="Mi cuenta">
						<i class="zmdi zmdi-settings"></i>
					</a>-->
					<a id="cuentausuario" title="Mis cuenta" data-toggle="modal" data-target="#divupdatecuenta">
						<i class="zmdi zmdi-settings"></i>
					</a>
				</li>
				<?php 
							
				$tipo = $lc->encryption("Administrador");
				$fff = "";
				$fff.='<script>';
					if($_SESSION['tipo_dsa'] == "Administrador"){
					$tipo = $lc->encryption("Administrador");	
						
					$fff.='	$("#datosusuario").click(function(e){
							e.preventDefault();
							document.forms.updatedatosu.action= "'.SERVERURL.'ajax/administradorAjax.php";
							crearformularioactualizarUsuario("Unico","'.$usuActivo.'","'.SERVERURL.'ajax/administradorAjax.php","crearformularioactualizaradmin");

					});
					
						$("#cuentausuario").click(function(e){
							e.preventDefault();
							document.forms.updatecuentausu.action= "'.SERVERURL.'ajax/cuentaAjax.php";
							crearformularioactualizarCuenta("'.$tipo.'","'.$usuActivo.'","'.SERVERURL.'ajax/cuentaAjax.php","crearformularioactualizarCuenta","'.$_SESSION['codigo_cuenta_dsa'].'","'.$_SESSION['tipo_dsa'].'","'.$_SESSION['privilegio_dsa'].'","'.SERVERURL.'home","admin");

					});';
					}
					if($_SESSION['tipo_dsa'] == "Cliente"){
					$tipo = $lc->encryption("Cliente");
					$fff.='	$("#datosusuario").click(function(e){
							e.preventDefault();
							document.forms.updatedatosu.action= "'.SERVERURL.'ajax/clienteAjax.php";
							crearformularioactualizarUsuario("Unico","'.$usuActivo.'","'.SERVERURL.'ajax/clienteAjax.php","crearformularioactualizarcliente");

					});
					
						$("#cuentausuario").click(function(e){
							e.preventDefault();
							document.forms.updatecuentausu.action= "'.SERVERURL.'ajax/cuentaAjax.php";
							crearformularioactualizarCuenta("'.$tipo.'","'.$usuActivo.'","'.SERVERURL.'ajax/cuentaAjax.php","crearformularioactualizarCuenta","'.$_SESSION['codigo_cuenta_dsa'].'","'.$_SESSION['tipo_dsa'].'","'.$_SESSION['privilegio_dsa'].'","'.SERVERURL.'home","client");

					});';
					}
				$fff.='</script>';
				
				echo $fff;
				?>
				<li>
					<a href="<?php echo $lc->encryption($_SESSION['token_dsa']); ?>" title="Salir del sistema" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- SideBar Menu -->
		<ul class="list-unstyled full-box dashboard-sideBar-Menu">
			<?php //if($_SESSION['tipo_dsa'] == "Administrador"){ ?>
			<?php if($_SESSION['Pri_dashboard'] == 1){ ?>
			<li>
				<a href="<?php echo SERVERURL; ?>home/"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
				</a>
			</li>
			<?php } if($_SESSION['Pri_tareas'] == 1){ ?>
			
			<li>
				<a href="<?php echo SERVERURL; ?>tareas/"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Tareas
				</a>
			</li>
			<?php }  if($_SESSION['Pri_administracion'] == 1){ ?>
			
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<?php if($_SESSION['Pri_empresas'] == 1){ ?>
							<li>
								<a href="<?php echo SERVERURL; ?>companylist/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Empresa</a>
							</li>
						<?php }  if($_SESSION['Pri_companias'] == 1){ ?>
							<li>
								<a href="<?php echo SERVERURL; ?>companyslist/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i><i class="zmdi zmdi-home zmdi-hc-fw"></i> Compañias</a>
							</li>
						<?php }  if($_SESSION['Pri_cdr'] == 1){ ?>
							<li>
								<a href="<?php echo SERVERURL; ?>cdrlist/"><i class="zmdi zmdi-home zmdi-hc-fw"></i> CDR </a>
							</li>
						<?php }   ?>
					</ul>
				</li>
			<?php }  if($_SESSION['Pri_usuarios'] == 1){ ?>
			
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<?php if($_SESSION['Pri_empleados'] == 1){ ?>
					<li>
						<a href="<?php echo SERVERURL; ?>adminlist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Empleados / Contratistas</a>
					</li>
					<?php }  if($_SESSION['Pri_clientes'] == 1){ ?>
					<li>
						<a href="<?php echo SERVERURL; ?>clientlist/"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Clientes corporativos</a>
					</li>
					<?php }  if($_SESSION['Pri_adminCDR'] == 1){ ?>
					<li>
						<a href="<?php echo SERVERURL; ?>cdrlist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores CDR</a>
					</li>
					<?php }   ?>
				</ul>
			</li>
			<?php }  if($_SESSION['Pri_soluciones'] == 1){ ?>
			<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-codepen"></i> Soluciones <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<?php if($_SESSION['Pri_guias'] == 1){ ?>
							<li>
								<a href="<?php echo SERVERURL; ?>guialist/"><i class="zmdi zmdi-format-list-numbered zmdi-hc-fw"></i> Guias</a>
							</li>
						<?php }  if($_SESSION['Pri_planillas'] == 1){ ?>
							<li>
								<a href="<?php echo SERVERURL; ?>planillalist/"><i class="zmdi zmdi-assignment"></i> Planillas</a>
							</li>
						<?php }  if($_SESSION['Pri_recogidas'] == 1){ ?>
							<li>
								<a href="<?php echo SERVERURL; ?>rgdlist/"><i class="zmdi zmdi-truck"></i> Recogidas </a>
							</li>
						<?php }   ?>
					</ul>
				</li>
			
			<?php } ?>
			<?php //} ?>
			<!--<li>
				<a href="<?php //echo SERVERURL; ?>catalog/">
					<i class="zmdi zmdi-book-image zmdi-hc-fw"></i> Catalogo
				</a>
			</li>-->
		</ul>
	</div>
</section>