$(document).ready(function(){ 
	
	//formulariosmodales();
	//oculta div de nuevo proyeto
	
	$("#divnewempresa").hide();
	
	//muestra div de nuevn proyecto
	$("#shownewempresa").click(function(e){
		e.preventDefault();
		crearformularionuevaempresa();
				
	});
	$("#showListaEmpresa").click(function(e){
		e.preventDefault();
		verempresasempresa(0,"Activo");
	});
	//oculta div de nuevo proyecto
	$("#showEmpresaeliminadas").click(function(e){
		e.preventDefault();
		verempresasempresa(0,"Desactivado");
	});
		
	//agregar movimientos de la pagina tareas
	$('.FormularioEmpresa').submit(function(e){
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
						if(formulario == "regnewempresa")
						{
							$('.FormularioEmpresa')[0].reset();
							verempresasempresa(0,"Activo");
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
	
	verempresasempresa(0,"Activo");
	
}); // final de ready

//cargar proyectos
function crearformularionuevaempresa(){
	
	
	var action = 'crearformularionuevaempresa';
	var tipo = 'Conteo';
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
				
				$("#regnewempresa").html(response);

				
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
function verempresasempresa(pagina,estado){
	var action = 'verempresas';
	
	$("#listaempresas").html('');

		$.ajax({
			url: '../ajax/empresaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaempresas").html(response);
					
					$(".list_empresa .task-menu").hide();
					$(".list_empresa").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_empresa").mouseout(function(){
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
function generalesempresa(url,tipo,tipoaccion,data,action,addmensaje){
       
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
						if(action == "desactivar_empresa" ){
							if(tipo == "delete"){
							   verempresasempresa(0,"Activo");
							}
							if(tipo == "update"){
							   verempresasempresa(0,"Desactivado");
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