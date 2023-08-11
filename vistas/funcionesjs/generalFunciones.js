$(document).ready(function(){ 
	
	$("#idsoporguia").hide();
	$("#idsoporguia1").hide();
	$("#idsoporguia2").hide();
	//cierra div soporte guia
	$("#cerrarsoporteguia").click(function(e){
		e.preventDefault();
		$("#idsoporguia").hide("slow");
		$("#idsoporguia1").hide("slow");
		$("#idsoporguia2").hide("slow");
	});
	
	//cierra div soporte guia
	$("#cerrarsoporteguia1").click(function(e){
		e.preventDefault();
		$("#idsoporguia").hide("slow");
		$("#idsoporguia1").hide("slow");
		$("#idsoporguia2").hide("slow");
	});
	
	//muestra div soporte guia
	$("#VersoporteCLI").click(function(e){
		e.preventDefault();
		
		var guia = $("#numeroguia").val();
		$("#visualizarimg").attr("src","");
		$("#detallesoporteCLI").html("");
		$("#detallesoporteCLI1").html("");
		$("#alerta").hide();
		$("#Alerta2").hide();
		$("#Alerta1").show();
		
		if(guia != ""){
			
			versoportedeguia(guia);

			$("#idsoporguia").show("fast");
			$("#idsoporguia1").show("fast");
			$("#idsoporguia2").show("fast");
		}else{
			$("#Alerta2").show();
			$("#Alerta1").hide();
		}
	});

	
	//agregar movimientos de la pagina tareas
	$('.Formulariogeneral').submit(function(e){
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
						if(formulario == "updatedatosu"){
							$('.Formulariogeneral')[0].reset();
							$("#divupdatedatos").hide("fast");
							
							var avisolistas = $("#avisolista").val();
							
							if(avisolistas == "Cclientes"){
								var CuentaCodigo = $("#ClienteCodigoC1").val();
								vercuentasC(0,"Activo",CuentaCodigo);
							}
							if(avisolistas == "Ccdr"){
								var cdrCodigo = $("#CdrCodigoC1").val();
								vercuentasCdr(0,"Activo",cdrCodigo);
							}
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
		
}); // final de ready



//GENERAR ALERTAS ANTES DE EJECUTAR PROCEDIMIENTOS
function generalesgeneral(url,tipo,tipoaccion,data,action,addmensaje){
       
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
function crearformularioactualizarUsuario(tipo,codigo,URl,accion){
	
	
	var action = accion;
	
	$.ajax({
		url: URl,
		type: 'POST',
		async: true,
		data: {action:action,tipo1:tipo,codigo1:codigo},

		success: function(response)
		{	
			if(response !== "error")
			{
				//console.log(response);
				
				$("#updatedatosu").html(response);
				
				
			
			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});
}
//cargar formulario para actualizar datos
function crearformularioactualizarCuenta(tipo,codigo,URl,accion,$_codcuenta,$_tipo,$_privilegio,direccion,tipoa){
	
	
	var action = accion;
	
	$.ajax({
		url: URl,
		type: 'POST',
		async: true,
		data: {action:action,tipo1:tipo,codigo1:codigo},

		success: function(response)
		{	
			if(response !== "error")
			{
				
				var data = $.parseJSON(response);
				
				if($_codcuenta != data.CuentaCodigo){
						if($_tipo != "Administrador" || $_privilegio < 1 || $_privilegio >2){
							location.href= direccion;
						}else{
							$("#controlprivi").html('<input type="hidden" name="privilegio-up" value="verdadero">');
						}
					}
				
				$("#CodigoCuente-up").val(codigo);
				$("#tipoCuenta-up").val(tipo);
				$("#usuario-up").val(data.CuentaUsuario);
				$("#email-up").val(data.CuentaEmail);
				
				var genero = data.CuentaGenero;
				var estado = data.CuentaEstado;
				var privilegio = data.CuentaPrivilegio;
					
				if(genero == "Masculino"){
				   $("#optionsGenero-M").attr("checked","checked");
				}else{
				   $("#optionsGenero-F").attr("checked","checked");
				}
				
				if($_tipo == "Administrador" && $_privilegio == 1 && data.id != 1){
				
					if(estado == "Activo"){
						$("#optionsEstado-A").attr("checked","checked");

					}else{
					   $("#optionsEstado-D").attr("checked","checked");
					}
				}else{
					$("#controlestado").html("");
				}
				
				if($_tipo == "Administrador" && $_privilegio == 1 &&  data.id != 1 && data.CuentaTipo == "Administrador" && tipoa == "admin"){
					
					if(privilegio == 1){
						$("#optionsPrivilegio-1").attr("checked","checked");
					}
					if(privilegio == 2){
						$("#optionsPrivilegio-2").attr("checked","checked");
					}
					if(privilegio == 3){
						$("#optionsPrivilegio-3").attr("checked","checked");
					}
				}else{
					$("#controprivilegios").html("");
				}
				
			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});
}

//buscar guia desde el administrador
function versoportedeguia(idguia){
	var action = 'versoportedeguia';
	
		$.ajax({
			url: './ajax/externosAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,idguia:idguia},

			success: function(response)
			{	
				var info = JSON.parse(response);
				var swich = info.swich;
				if(swich !== "SI")
				{	
					$("#Alerta1").hide();
					$("#Alerta2").hide();
					
					var guia = info.MovGuiaNumeroguia;
					var destinatario = info.MovGuiaDestinatario;
					var remitente = info.MovGuiaNombreremitente;
					var novedad = info.MovGuiaNovedad;
					var id =   info.id;
					var guianumero = info.MovGuiaGuia;
					var Urlimg = info.urlimagen;
					var imagen = info.imagen;
					var alerta = info.Tabla;

					if(guia == 0){
						$("#detallesoporteCLI").html("Guia: " + id + "<br>" + "Remitente: " + remitente);
					}else{
						$("#detallesoporteCLI").html("Guia: " + guianumero + "<br>" + "Remitente: " + remitente);
					}
					$("#detallesoporteCLI1").html("Destinatario: " + destinatario + "<br>" + "Novedad: " + novedad);

					if(imagen == "sin_imagen.jpg"){
					   $("#alerta").html(alerta);
						$("#alerta").show();
					}else{
						$("#visualizarimg").attr("src",Urlimg);
						$("#alerta").html("");
						$("#alerta").hide();
					}
											
				}
			},

			error: function(error){

			}
		});
}