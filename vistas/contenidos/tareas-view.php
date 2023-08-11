

<div class="row">

	<div class="col-md-3">
		<ul type="none">
			<li><a id="showdesktopbtn">Escritorio</a> </li>
			<?php if($_SESSION['Pri_nuevoproyecto'] == 1){ ?>
			<button class="btn btn-info" data-toggle="modal" data-target="#divnewproject">Nuevo Proyecto</button>
			<?php } ?>
		</ul>
		<hr>
		
		<div id="project-list">
			
		</div>

		<ul type="none">

		</ul>

		
		
	</div>
	
	<div class="col-md-9">
		<div id="task-container">
			<!--loadproject.php-->
			<div class="row">
				<div class="col-md-7">

				<h2 class="name_proyecto"></h2>
				
				</div>
				<div class="col-md-5">
					<form id="search">
						   <br><div class="input-group">
						   <input type="hidden" name="project_id" id="project_id" value="">
						  <input type="text" name="q" id="q" class="form-control" placeholder="Buscar Tareas ...">
						  <span class="input-group-btn">
							<button class="btn btn-default" id="gosearch" type="button">&nbsp;<i class='glyphicon glyphicon-search'></i></button>
						  </span>
						</div>
					</form>
				</div>
			</div>


			<div class="btn-toolbar">
				<?php if($_SESSION['Pri_nuevatarea'] == 1){ ?>
					<div class="btn-group">
						<a href="#" class="btn btn-default btn-xs" id="shownewtask" data-toggle="modal" data-target="#divnewtask"><i class="glyphicon glyphicon-plus-sign"></i> Nueva Tarea</a>
					</div>
				<?php } ?>
				<div class="btn-group">
					<a href="javascript:void(0)" class="btn btn-default btn-xs" id="showtasks"><i class="glyphicon glyphicon-th-list"></i> Tareas</a>
				</div>
				<div class="btn-group">
					<a href="javascript:void(0)" class="btn btn-default btn-xs" id="showarchive"><i class="glyphicon glyphicon-folder-open"></i> Archivo</a>
				</div>
				<div class="btn-group">
					<a href="#" class="btn btn-default btn-xs" id="shownewtask"><i class="glyphicon glyphicon-tags"></i> Etiquetas</a>
				</div>

				<div class="btn-group">

					<div class="btn-group">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-align-justify"></i> Opciones <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" id="shownewtask"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
							<li><a href="#" id="shownewtask"><i class="glyphicon glyphicon-signal"></i> Analiticas</a></li>
							<li><a href="#" id="shownewtask"><i class="glyphicon glyphicon-cog"></i> Administrar</a></li>
						</ul>
					</div>

				</div>
			</div>
			<br><br>
			
			<div id="task-list">
				<!--loadtasks.php-->
			
			</div>
			<div class="RespuestaAjaxgenerales">
			
			</div>
			<script>
				/*

				function loadarchivedtasks(){
					$.post("loadtasks.php","project_id=<?php //echo $project->id; ?>&archive=1", function(data){
					//	console.log(data);
						$("div#task-list").html(data);
					//	document.getElementById("task-list").innerHTML=data;
					});	
				}


				function loadtasksq(q){
					$.post("loadtasks.php",q, function(data){
					//	console.log(data);
						$("div#task-list").html(data);
					//	document.getElementById("task-list").innerHTML=data;
					});	
				}


				$("#newtask").submit(function(e){
					e.preventDefault();
					var formInput = $(this).serialize();
					console.log(formInput);
					$.post("newtask.php",formInput, function(data){
						$('#divnewtasks').fadeOut("fast");
						$('#ntdata').html(data);
						loadtasks();
						$("input[type=text]").each(function(){ $(this).val(""); });
						$("#divnewtask").hide();
					});		
				});

				loadtasks();*/
			</script>
			<script type="text/javascript">
			 /* $(document).ready(
				function()
				{
				  $('.tip').tooltip();
				}
			  );*/
			</script>
			


			<!--continuar aca-->


		</div>
	</div>
</div>

