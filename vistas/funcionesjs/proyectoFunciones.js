$(document).ready(function(){ 
	
	//formulariosmodales();
	//oculta div de nuevo proyeto
	
	$("#divnewproject").hide();
	
	//muestra div de nuevn proyecto
	$("#shownewproject").click(function(){
		$("#divnewproject").show("fast");
		$("#myModal").toggle("Modal");
	});
	//oculta div de nuevo proyecto
	$("#closenewproject").click(function(){
		$("#divnewproject").hide("fast");
	});
	
	
	$("#divnewtask").hide();

	$("#shownewtask").click(function(e){
		e.preventDefault();
		$("#divnewtask").show("fast");
	});

	$("#closenewtask").click(function(){
		$("#divnewtask").hide("fast");
	});
	
	$("#q").keyup(function(){
		var id = $('#project_idsave').val();
		vertareas(id);
	});
		
	$("#showtasks").click(function(){
	
	var id = $('#project_idsave').val();
	vertareas(id);

	});
	$("#showarchive").click(function(){
		var id = $('#project_idsave').val();
		vertareasarchivadas(id);

	});
		

	//agregar movimientos de la pagina tareas
	$('.FormularioProyectos').submit(function(e){
        e.preventDefault();

        var form=$(this);
		var tipo=form.attr('data-form');
        var accion=form.attr('action');
        var metodo=form.attr('method');
		var respuesta=form.children('.RespuestaAjax');
		var formulario=form.attr('name');
		
		
        var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
        var formdata = new FormData(this);
 

        var textoAlerta;
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
        }else if(tipo==="delete"){
            textoAlerta="Los datos serán eliminados completamente del sistema";
        }else if(tipo==="update"){
			textoAlerta="Los datos del sistema serán actualizados";
        }else{
            textoAlerta="Quieres realizar la operación solicitada";
        }
		swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            $.ajax({
                type: metodo,
                url: accion,
				async: true,
                data: formdata ? formdata : form.serialize(),
                cache: false,
                contentType: false,
                processData: false,
				
                xhr: function(){
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        if(percentComplete<100){
							respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
						}else{
							respuesta.html('<p class="text-center"></p>');
						}
                      }
                    }, false);
                    return xhr;
                },
				
				
                success: function(data){
					respuesta.html(data);
					if(data !== "error")
					{
						//console.log(data);
						if(formulario == "registroProyectos")
						{
							$('.FormularioProyectos')[0].reset();
							serchproyectos();
							//$(".RespuestaAjax").html('');
						}
						
						if(formulario == "registrotareas")
						{
							$('.FormularioProyectos')[1].reset();
							var id = $('#project_idsave').val();
							vertareas(id);
						}
						
						if(formulario == "Actualizartarea")
						{
							$('.FormularioProyectos')[2].reset();
							var idd = $('#project_idsave').val();
							vertareas(idd);
						}
					}else
					{
						console.log('no data');
					}
					
                },
                error: function() {
                    respuesta.html(msjError);
                }
            });
            return false;
        });
    });
	
	serchproyectos();	
	
}); // final de ready

//cargar proyectos
function serchproyectos(){
	var action = 'serchproyectos';
		
	$.ajax({
		url: '../ajax/proyectoAjax.php',
		type: 'POST',
		async: true,
		data: {action:action},

		success: function(response)
		{	
			if(response !== "error")
			{
				//console.log(response);
				var info = JSON.parse(response);
				//var info = $.parseJSON(response);
				$("#project-list").html(info.grupo);

				$('#exampleInputEmail1').val("");
				
			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});
}

//cargar tareas
function vertareas(id){
	var action = 'vertareas';
	var Idproyecto = id;
	var busquedad  = $('#q').val();
	var Archivado = 0;
	$("#task-list").html('');
	
	if(Idproyecto != ""){
		$.ajax({
			url: '../ajax/proyectoAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,Idproyecto:Idproyecto,busquedad:busquedad,Archivado:Archivado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					var info = response;
					//var info = $.parseJSON(response);
					$("#task-list").html(info);
					
					$(".task .task-menu").hide();
					$(".task").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".task").mouseout(function(){
						$(this).find(".task-menu").hide();
					});
					//$('#exampleInputEmail1').val("");


				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
	}
}
//cargar tareas archivadas
function vertareasarchivadas(id){
	var action = 'vertareas';
	var Idproyecto = id;
	var busquedad  = $('#q').val();
	var Archivado = 1;
	$("#task-list").html('');
	
	if(Idproyecto != ""){
		$.ajax({
			url: '../ajax/proyectoAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,Idproyecto:Idproyecto,busquedad:busquedad,Archivado:Archivado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					var info = response;
					//var info = $.parseJSON(response);
					$("#task-list").html(info);
					$(".task .task-menu").hide();
					$(".task").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".task").mouseout(function(){
						$(this).find(".task-menu").hide();
					});
					//$('#exa
					//$('#exampleInputEmail1').val("");


				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
	}
}

//GENERAR ALERTAS ANTES DE EJECUTAR PROCEDIMIENTOS
function generalesproyectos(url,tipo,tipoaccion,data,action){
       
		var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
	
        var textoAlerta = "";
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
        }else if(tipo==="delete"){
            textoAlerta="Los datos serán eliminados completamente del sistema";
        }else if(tipo==="update"){
			textoAlerta="Los datos del sistema serán actualizados";
        }else{
            textoAlerta="Quieres realizar la operación solicitada";
        }
		swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            $.ajax({
                url: url,
				type: tipoaccion,
				async: true,
				data: data,	
				
				
                success: function(response){
					 $('.RespuestaAjaxgenerales').html(response);
					if(response !== "error")
					{
						//console.log(data);
						var tipovista = $("#tipovista").val();
						var idt = $("#project_idsave").val();
						
						if(action == "eliminar_tarea" || action == "finalizar_nofintarea" || action == "archivar_tarea" ){
							if(tipovista == "T0"){
								vertareas(idt);
						   	}
							if(tipovista == "T1"){
								vertareasarchivadas(idt);
							}
						}
					}else
					{
						console.log('no data');
					}
					
                },
                error: function() {
                    $('.RespuestaAjaxgenerales').html(msjError);
                }
            });
            //return false;
        });
    }