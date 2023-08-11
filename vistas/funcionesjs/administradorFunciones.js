$(document).ready(function(){ 
	
	//formulariosmodales();
	//oculta div filtros
	$("#filtro").hide();
	$("#cerrardiv").click(function(e){
		e.preventDefault();
		$("#filtro").hide("slow");
				
	});
	
	//muestra div filtros
	$("#showfiltroadministrador").click(function(e){
		e.preventDefault();
		$("#filtro").show("fast");
				
	});
	//oculta div de nuevo administrador
	$("#divnewadministrador").hide();
	
	
	//muestra div de nuevn proyecto
	$("#shownewadministrador").click(function(e){
		e.preventDefault();
		cargarcompaniasadmin();
				
	});
	$("#showListaadministrador").click(function(e){
		e.preventDefault();
		veradministradores(0,"Activo");
	});
	//oculta div de nuevo proyecto
	$("#showadministradoreliminadas").click(function(e){
		e.preventDefault();
		veradministradores(0,"Desactivado");
	});
	$("#busquedad_empleado").keyup(function(e){
		e.preventDefault();
		buscaradministradores(0,"Activo");
	});	
	//agregar movimientos de la pagina tareas
	$('.FormularioAdministrador').submit(function(e){
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
						if(formulario == "regnewadministrador")
						{
							$('.FormularioAdministrador')[0].reset();
							veradministradores(0,"Activo");
							//$(".RespuestaAjax").html('');
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
	
	veradministradores(0,"Activo");
	
}); // final de ready

//cargar proyectos
function cargarcompaniasadmin(){
	
	
	var action = 'crear_select';
	var tipo = 'Select';
	var codigo = 0;
	$.ajax({
		url: '../ajax/companiaAjax.php',
		type: 'POST',
		async: true,
		data: {action:action,tipo:tipo,codigo:codigo},

		success: function(response)
		{	
			if(response !== "error")
			{
				//console.log(response);
				
				$("#select_compania").html(response);
				
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
function veradministradores(pagina,estado){
	var action = 'veradministradores';
	
	$("#listaadministradores").html('');

		$.ajax({
			url: '../ajax/administradorAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaadministradores").html(response);
					
					$(".list_administrador .task-menu").hide();
					$(".list_administrador").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_administrador").mouseout(function(){
						$(this).find(".task-menu").hide();
					});
					
				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
}
function buscaradministradores(pagina,estado){
	var action = 'buscaradministradores';
	var busquedad = $("#busquedad_empleado").val();
	
	$("#listaadministradores").html('');

		$.ajax({
			url: '../ajax/administradorAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,busquedad:busquedad},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaadministradores").html(response);
					
					$(".list_administrador .task-menu").hide();
					$(".list_administrador").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_administrador").mouseout(function(){
						$(this).find(".task-menu").hide();
					});
					
				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
}
//GENERAR ALERTAS ANTES DE EJECUTAR PROCEDIMIENTOS
function generalesadmin(url,tipo,tipoaccion,data,action,addmensaje){
       
		var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
	
        var textoAlerta = "";
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema.";
        }else if(tipo==="delete"){
            textoAlerta="Los datos serán eliminados completamente del sistema.";
        }else if(tipo==="update"){
			textoAlerta="Los datos del sistema serán actualizados.";
        }else{
            textoAlerta="Quieres realizar la operación solicitada.";
        }
		textoAlerta = textoAlerta + addmensaje;
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
						if(action == "desactivar_administrador" ){
							if(tipo == "delete"){
							   veradministradores(0,"Activo");
							}
							if(tipo == "update"){
							   veradministradores(0,"Desactivado");
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
//cargar formulario para actualizar datos
function crearformularioactualizaradmin(tipo,codigo){
	
	
	var action = 'crearformularioactualizaradmin';
	
	$.ajax({
		url: '../ajax/administradorAjax.php',
		type: 'POST',
		async: true,
		data: {action:action,tipo1:tipo,codigo1:codigo},

		success: function(response)
		{	
			if(response !== "error")
			{
				//console.log(response);
				
				$("#updatedatosu").html(response);
				
				//$("#updatedatosu").setAttribute("action","https://www.cargsolutions.com/DSAor/ajax/administradorAjax.php");
			
			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});
}
