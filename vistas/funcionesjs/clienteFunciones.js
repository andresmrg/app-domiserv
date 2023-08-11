$(document).ready(function(){ 
	
	//formulariosmodales();
	//oculta div filtros
	$("#filtro").hide();
	$("#cerrardiv").click(function(e){
		e.preventDefault();
		$("#filtro").hide("slow");
		$("#busquedad_cliente").val('');
	});
	
	//muestra div filtros
	$("#showfiltrocliente").click(function(e){
		e.preventDefault();
		$("#filtro").show("fast");
				
	});
	
	//oculta div de nuevo administrador
	$("#divnewcliente").hide();
	
	
	//muestra div de nuevn proyecto
	$("#shownewcliente").click(function(e){
		e.preventDefault();
		cargarcompaniascliente();
				
	});
	
	$("#showListacliente").click(function(e){
		e.preventDefault();
		verclientes(0,"Activo");
	});
	//oculta div de nuevo proyecto
	$("#showclienteeliminadas").click(function(e){
		e.preventDefault();
		verclientes(0,"Desactivado");
	});
	$("#busquedad_cliente").keyup(function(e){
		e.preventDefault();
		buscarclientes(0,"Activo");
	});	
	
	
	
	//oculta div filtros
	$("#filtrocuenta").hide();
	$("#cerrardivcuenta").click(function(e){
		e.preventDefault();
		$("#filtrocuenta").hide("slow");
		$("#busquedad_cuentaC").val('');
				
	});
	
	//muestra div filtros
	$("#showfiltrocuentaC").click(function(e){
		e.preventDefault();
		$("#filtrocuenta").show("fast");
				
	});
	//muestra div de nuevn cuenta cliente
	$("#shownewcuentaC").click(function(e){
		e.preventDefault();
									
		var ConpaniaCodigo = $("#ClienteCompania1").val();
		var CuentaCodigo = $("#ClienteCodigoC1").val();
		$("#ClienteCompania").val(ConpaniaCodigo);
		$("#ClienteCodigoC").val(CuentaCodigo);
				
	});
	$("#showListacuentaC").click(function(e){
		e.preventDefault();
		
		var CuentaCodigo = $("#ClienteCodigoC1").val();
		vercuentasC(0,"Activo",CuentaCodigo);
	});
	//oculta div de nuevo proyecto
	$("#showcuentaCeliminadas").click(function(e){
		e.preventDefault();
		var CuentaCodigo = $("#ClienteCodigoC1").val();
		vercuentasC(0,"Desactivado",CuentaCodigo);
	});
	$("#busquedad_cuentaC").keyup(function(e){
		e.preventDefault();
		
		var CuentaCodigo = $("#ClienteCodigoC1").val();
		buscarcuentasC(0,"Activo",CuentaCodigo);
	});	
	//agregar movimientos de la pagina tareas
	$('.FormularioCliente').submit(function(e){
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
						if(formulario == "regnewcliente")
						{
							$('.FormularioCliente')[0].reset();
							verclientes(0,"Activo");
							//$(".RespuestaAjax").html('');
						}
						if(formulario == "regnewcuentaC")
						{
							$('.FormularioCliente')[1].reset();
							
							var ConpaniaCodigo = $("#ClienteCompania1").val();
							var CuentaCodigo = $("#ClienteCodigoC1").val();
							$("#ClienteCompania").val(ConpaniaCodigo);
							$("#ClienteCodigoC").val(CuentaCodigo);
							
							vercuentasC(0,"Activo",CuentaCodigo);
							//verclientes(0,"Activo");
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
	
	verclientes(0,"Activo");
	
}); // final de ready

//cargar proyectos
function cargarcompaniascliente(){
	
	
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
function verclientes(pagina,estado){
	var action = 'verclientes';
	
	$("#listaclientes").html('');

		$.ajax({
			url: '../ajax/clienteAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaclientes").html(response);
					
					$(".list_cliente .task-menu").hide();
					$(".list_cliente").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cliente").mouseout(function(){
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
function buscarclientes(pagina,estado){
	var action = 'buscarclientes';
	var busquedad = $("#busquedad_cliente").val();
	
	$("#listaclientes").html('');

		$.ajax({
			url: '../ajax/clienteAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,busquedad:busquedad},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaclientes").html(response);
					
					$(".list_cliente .task-menu").hide();
					$(".list_cliente").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cliente").mouseout(function(){
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
function generalescliente(url,tipo,tipoaccion,data,action,addmensaje){
       
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
						if(action == "desactivar_cliente" ){
							if(tipo == "delete"){
							   verclientes(0,"Activo");
							}
							if(tipo == "update"){
							   verclientes(0,"Desactivado");
							}
						}
						
						if(action == "desactivar_cuentaC" ){
							if(tipo == "delete"){
							   var CuentaCodigo = $("#ClienteCodigoC1").val();
								vercuentasC(0,"Activo",CuentaCodigo);
							}
							if(tipo == "update"){
							   var CuentaCodigo = $("#ClienteCodigoC1").val();
								vercuentasC(0,"Desactivado",CuentaCodigo);
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
function crearformularioactualizarcliente(tipo,codigo){
	
	
	var action = 'crearformularioactualizarcliente';
	
	$.ajax({
		url: '../ajax/clienteAjax.php',
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

//crear lista de cuentas clientes
function vercuentasC(pagina,estado,CodigoCliente){
	var action = 'vercuentasC';
	
	$("#listaCuentasC").html('');

		$.ajax({
			url: '../ajax/clienteAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,CodigoCliente:CodigoCliente},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaCuentasC").html(response);
					
					$(".list_cuentaC .task-menu").hide();
					$(".list_cuentaC").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cuentaC").mouseout(function(){
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
function buscarcuentasC(pagina,estado,CodigoCliente){
	var action = 'buscarcuentasC';
	var busquedad = $("#busquedad_cuentaC").val();
	
	$("#listaCuentasC").html('');

		$.ajax({
			url: '../ajax/clienteAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,busquedad:busquedad,CodigoCliente:CodigoCliente},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					$("#listaCuentasC").html(response);
					
					$(".list_cuentaC .task-menu").hide();
					$(".list_cuentaC").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_cuentaC").mouseout(function(){
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
function crearformularioactualizarcuentaC(tipo,codigo){
	
	
	var action = 'crearformularioactualizarcuentaC';
	
	$.ajax({
		url: '../ajax/clienteAjax.php',
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