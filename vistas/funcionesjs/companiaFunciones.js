$(document).ready(function(){ 
	
	//formulariosmodales();
	//oculta div de nuevo proyeto
	
	$("#divnewcompania").hide();
	
	$("#ciudad-reg").keyup(function(e){
		e.preventDefault();
		
		var ciudad = $("#ciudad-reg").val();
		var barrio = $("#barrio-reg").val();
		$("#memo_compania").html("DSA " + ciudad +  " " + barrio);
	});
	$("#barrio-reg").keyup(function(e){
		e.preventDefault();
		
		var ciudad = $("#ciudad-reg").val();
		var barrio = $("#barrio-reg").val();
		$("#memo_compania").html("DSA " + ciudad +  " " + barrio);
	});
	//muestra div de nuevn proyecto
	$("#shownewcompania").click(function(e){
		e.preventDefault();
		cargarempresascompania();
				
	});
	$("#showListacompania").click(function(e){
		e.preventDefault();
		vercompaniascompania(0,"Activo");
	});
	//oculta div de nuevo proyecto
	$("#showcompaniaeliminadas").click(function(e){
		e.preventDefault();
		vercompaniascompania(0,"Desactivado");
	});
		
	//agregar movimientos de la pagina tareas
	$('.FormularioCompania').submit(function(e){
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
						if(formulario == "regnewcompania")
						{
							$('.FormularioCompania')[0].reset();
							vercompaniascompania(0,"Activo");
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
	
	vercompaniascompania(0,"Activo");
	
}); // final de ready

//cargar proyectos
function cargarempresascompania(){
	
	
	var action = 'crear_select';
	var tipo = 'Select';
	var codigo = 0;
	$.ajax({
		url: '../ajax/empresaAjax.php',
		type: 'POST',
		async: true,
		data: {action:action,tipo:tipo,codigo:codigo},

		success: function(response)
		{	
			if(response !== "error")
			{
				//console.log(response);
				
				$("#select_empresas").html(response);

				
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
function vercompaniascompania(pagina,estado){
	var action = 'vercompanias';
	
	$("#listaempresas").html('');

		$.ajax({
			url: '../ajax/companiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listacompanias").html(response);
					
					$(".list_compania .task-menu").hide();
					$(".list_compania").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_compania").mouseout(function(){
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
function generalescompania(url,tipo,tipoaccion,data,action,addmensaje){
       
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
						if(action == "desactivar_compania" ){
							if(tipo == "delete"){
							   vercompaniascompania(0,"Activo");
							}
							if(tipo == "update"){
							   vercompaniascompania(0,"Desactivado");
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