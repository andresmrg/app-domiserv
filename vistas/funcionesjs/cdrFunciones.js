$(document).ready(function(){ 
	
	//formulariosmodales();
	//oculta div de nuevo proyeto
	
	$("#divnewcdr").hide();
	
	$("#ciudad-reg").keyup(function(e){
		e.preventDefault();
		
		var ciudad = $("#ciudad-reg").val();
		var barrio = $("#barrio-reg").val();
		$("#memo_cdr").html("CDR " + ciudad +  " " + barrio);
	});
	$("#barrio-reg").keyup(function(e){
		e.preventDefault();
		
		var ciudad = $("#ciudad-reg").val();
		var barrio = $("#barrio-reg").val();
		$("#memo_cdr").html("CDR " + ciudad +  " " + barrio);
	});
	//muestra div de nuevn proyecto
	$("#shownewcdr").click(function(e){
		e.preventDefault();
		cargarcompaniasCdr();
				
	});
	$("#showListacdr").click(function(e){
		e.preventDefault();
		vercdrs(0,"Activo");
	});
	//oculta div de nuevo proyecto
	$("#showcdreliminadas").click(function(e){
		e.preventDefault();
		vercdrs(0,"Desactivado");
	});
	
	//oculta div filtros
	$("#filtrocdrC").hide();
	$("#cerrardivcdrC").click(function(e){
		e.preventDefault();
		$("#filtrocdrC").hide("slow");
		$("#busquedad_cdrC").val('');
				
	});
	
	//muestra div filtros
	$("#showfiltrocdrC").click(function(e){
		e.preventDefault();
		$("#filtrocdrC").show("fast");
				
	});
	//muestra div de nuevn cuenta cliente
	$("#shownewcdrC").click(function(e){
		e.preventDefault();
		
		var cdrCodigo = $("#CdrCodigoC1").val();
		var cdrcompania = $("#CdrCompania1").val();
		
		$("#CdrCodigoC").val(cdrCodigo);
		$("#CdrCompania").val(cdrcompania);
				
	});
	$("#showListacdrC").click(function(e){
		e.preventDefault();
		
		var cdrCodigo = $("#CdrCodigoC1").val();
		vercuentasCdr(0,"Activo",cdrCodigo);
	});
	//oculta div de nuevo proyecto
	$("#showcdrCeliminadas").click(function(e){
		e.preventDefault();
		var cdrCodigo = $("#CdrCodigoC1").val();
		vercuentasCdr(0,"Desactivado",cdrCodigo);
	});
	$("#busquedad_cdrC").keyup(function(e){
		e.preventDefault();
		
		var cdrCodigo = $("#CdrCodigoC1").val();
		buscarcuentasCdr(0,"Activo",cdrCodigo);
	});	
	//agregar movimientos de la pagina tareas
	$('.FormularioCdr').submit(function(e){
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
						if(formulario == "regnewcdr")
						{
							$('.FormularioCdr')[0].reset();
							vercdrs(0,"Activo");
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
	
	vercdrs(0,"Activo");
	
}); // final de ready

//cargar proyectos
function cargarcompaniasCdr(){
	
	
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
				
				$("#select_companias").html(response);

				
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
function vercdrs(pagina,estado){
	var action = 'vercdrs';
	
	$("#listcdrs").html('');

		$.ajax({
			url: '../ajax/cdrAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listacdrs").html(response);
					
					$(".list_cdr .task-menu").hide();
					$(".list_cdr").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cdr").mouseout(function(){
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
function generalesCdr(url,tipo,tipoaccion,data,action,addmensaje){
       
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
						if(action == "desactivar_cdr" ){
							if(tipo == "delete"){
							   vercdrs(0,"Activo");
							}
							if(tipo == "update"){
							   vercdrs(0,"Desactivado");
							}
						}
						if(action == "desactivar_cdrC" ){
							if(tipo == "delete"){
								var cdrCodigo = $("#CdrCodigoC1").val();
								vercuentasCdr(0,"Activo",cdrCodigo);
							}
							if(tipo == "update"){
								var cdrCodigo = $("#CdrCodigoC1").val();
								vercuentasCdr(0,"Desactivado",cdrCodigo);
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
//crear lista de cuentas clientes
function vercuentasCdr(pagina,estado,Codigocdr){
	var action = 'vercuentasCdr';
	
	$("#listaCuentasCdr").html('');

		$.ajax({
			url: '../ajax/cdrAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,Codigocdr:Codigocdr},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaCuentasCdr").html(response);
					
					$(".list_cdrC .task-menu").hide();
					$(".list_cdrC").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cdrC").mouseout(function(){
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
function buscarcuentasCdr(pagina,estado,Codigocdr){
	var action = 'buscarcuentasCdr';
	var busquedad = $("#busquedad_cdrC").val();
	
	$("#listaCuentasCdr").html('');

		$.ajax({
			url: '../ajax/cdrAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,busquedad:busquedad,Codigocdr:Codigocdr},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaCuentasCdr").html(response);
					
					$(".list_cdrC .task-menu").hide();
					$(".list_cdrC").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cdrC").mouseout(function(){
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
//cargar formulario para actualizar CUENTA DATOS CLIENTE
function crearformularioactualizarcuentaCdr(tipo,codigo){
	
	
	var action = 'crearformularioactualizarcuentaCdr';
	
	$.ajax({
		url: '../ajax/cdrAjax.php',
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