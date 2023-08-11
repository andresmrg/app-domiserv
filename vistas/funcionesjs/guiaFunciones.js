$(document).ready(function(){ 
	
	//FUNCIONES CLIENTE CORPORATIVO
	
	//formulariosmodales();
	//oculta div filtros
	
	$("#filtroguia").hide();
	$("#cerrardivguia").click(function(e){
		e.preventDefault();
		$("#filtroguia").hide("slow");
		$("#busquedad_guia").val('');
	});
	
	//muestra div filtros
	$("#showfiltroguia").click(function(e){
		e.preventDefault();
		$("#filtroguia").show("fast");
				
	});
	
	//oculta div de nuevo administrador
	$("#divnewguia").hide();
	
	
	//muestra div de nuevn proyecto
	$("#shownewguia").click(function(e){
		e.preventDefault();
				
	});
	
	$("#showListaguia").click(function(e){
		e.preventDefault();
		verguias(0,"Activo");
	});
	//oculta div de nuevo proyecto
	$("#showguiaeliminadas").click(function(e){
		e.preventDefault();
		verguias(0,"Anulado");
	});
	$("#busquedad_guia").keyup(function(e){
		e.preventDefault();
		buscarguias(0,"Activo");
	});	
	$("#agente_filtro").change(function(e){
		e.preventDefault();
		buscarguias(0,"Activo");
	});
	$("#novedad_filtro").change(function(e){
		e.preventDefault();
		buscarguias(0,"Activo");
	});
	$("#zona_filtro").change(function(e){
		e.preventDefault();
		buscarguias(0,"Activo");
	});
	$("#tipo_filtro").change(function(e){
		e.preventDefault();
		buscarguias(0,"Activo");
	});
	$("#servicio_filtro").change(function(e){
		e.preventDefault();
		buscarguias(0,"Activo");
	});
	$("#fechainicio").change(function(e){
		e.preventDefault();
		var Finicio = $("#fechainicio").val();
		
		var Q = Finicio.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#fechainicio").keyup(function(e){
		e.preventDefault();
		var Finicio = $("#fechainicio").val();
		
		var Q = Finicio.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#fechafin").change(function(e){
		e.preventDefault();
		var Finicio = $("#fechafin").val();
		
		var Q = Finicio.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#fechafin").keyup(function(e){
		e.preventDefault();
		var Ffin = $("#fechafin").val();
		
		var Q = Ffin.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#direc").change(function(e){
		e.preventDefault();
			

		buscarguias(0,"Activo");
				
	});	
	
	
	//FUNCIONES CLIENTE NO CORPORATIVO
		
	$("#filtronocorporativo").hide();
	$("#noeditarcliente").hide();
	$("#novercliente").hide();
	$("#masdatoscliente").hide();
	$(".alert-success").hide("fast");
	$(".alert-danger").hide("fast");
	$("#savecliente").hide("fast");
	
	$("#cerrarnocorporativo").click(function(e){
		e.preventDefault();
		$("#filtronocorporativo").hide("fast");
		$("#editarcliente").show("fast");
		$("#noeditarcliente").hide();
		$("#novercliente").hide();
		$("#vercliente").show("fast");
		ocultarverdatoscliente();
	});
	
	//muestra div filtros
	$("#shownocorporativo").click(function(e){
		e.preventDefault();
		$("#filtronocorporativo").show("fast");
				
	});
	//funciones de totalizadores
	$("#totalalertas").hide();
	$("#totalimg").hide();
	$("#totalresumen").hide();
	$("#verlistaguias").hide();
	
	$("#cerrartotalalertas").click(function(e){
		e.preventDefault();
		$("#totalalertas").hide();
	});
	$("#vertotalalertas").click(function(e){
		e.preventDefault();
		$("#totalalertas").show();
	});
	$("#cerrartotalguias").click(function(e){
		e.preventDefault();
		$("#listaguias").hide();
		$("#verlistaguias").show();
		$("#cerrartotalguias").hide();
	});
	$("#verlistaguias").click(function(e){
		e.preventDefault();
		$("#listaguias").show();
		$("#cerrartotalguias").show();
		$("#verlistaguias").hide();
	});
	$("#cerrartotalimg").click(function(e){
		e.preventDefault();
		$("#totalimg").hide();
	});
	$("#vertotalimg").click(function(e){
		e.preventDefault();
		$("#totalimg").show();
	});
	$("#cerrartotalresumen").click(function(e){
		e.preventDefault();
		$("#totalresumen").hide();
	});
	$("#vertotalresumen").click(function(e){
		e.preventDefault();
		$("#totalresumen").show();
	});
	
	//funcion para ver imagenes
	$("#playimg").click(function(e){
		e.preventDefault();
		verimagenidividual(0);
	});
	$("#fechadesdemovimiento").change(function(e){
		e.preventDefault();
		var Finicio = $("#fechadesdemovimiento").val();
		
		var Q = Finicio.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#fechadesdemovimiento").keyup(function(e){
		e.preventDefault();
		var Finicio = $("#fechadesdemovimiento").val();
		
		var Q = Finicio.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#fechahastamovimiento").change(function(e){
		e.preventDefault();
		var Finicio = $("#fechahastamovimiento").val();
		
		var Q = Finicio.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	$("#fechahastamovimiento").keyup(function(e){
		e.preventDefault();
		var Ffin = $("#fechahastamovimiento").val();
		
		var Q = Ffin.length;
		if(Q == 10){
			buscarguias(0,"Activo");
		}
	});
	
	$("#editarcliente").click(function(e){
		e.preventDefault();
		$("#noeditarcliente").show("fast");
		$("#editarcliente").hide("fast");
		verdatoscliente();	
		
	});
	$("#noeditarcliente").click(function(e){
		e.preventDefault();
		$("#editarcliente").show("fast");
		$("#noeditarcliente").hide("fast");
		ocultarverdatoscliente();
	});
	$("#vercliente").click(function(e){
		e.preventDefault();
		$("#novercliente").show("fast");
		$("#vercliente").hide("fast");
		$("#masdatoscliente").show("fast");	
	});
	$("#novercliente").click(function(e){
		e.preventDefault();
		$("#vercliente").show("fast");
		$("#novercliente").hide("fast");
		ocultarverdatoscliente();
	});
	
	$("#openscaner").click(function(e){
		e.preventDefault();
		escanear();
		$("#divscaner").show("fast");
		$("#closepanelup").hide("fast");
		$("#lecturaoka").val("");
		$('.FormularioGuia')[2].reset();
	});
	
	$("#cargarescaner").click(function(e){
		e.preventDefault();
		if($("#recharge").val() != "cargarescaner" && $("#recharge").val() != ""){
			location.reload();
		}
		var video = document.querySelector("#preview");
		video.play();
		
		escanear();
		$("#divscaner").show("fast");
		$("#closepanelup").hide("fast");
		$("#lecturaoka").val("");
	});
	
	$("#openscaneradmin").click(function(e){
		e.preventDefault();
				
		var video = document.querySelector("#preview1");
		video.play();
		
		escanearadmin();
		$("#divscaneradmin").show("fast");
		$("#closepaneladminup").hide("fast");
		$("#lecturaok").val("");
		$('.FormularioGuia')[3].reset();
		
		
	});
	
	$("#cargarescaneradmin").click(function(e){
		e.preventDefault();
		
		if($("#recharge").val() != "cargarescaneradmin" && $("#recharge").val() != ""){
			location.reload();
		}
		
		var video = document.querySelector("#preview1");
		video.play();
		
		escanearadmin();
		$("#divscaneradmin").show("fast");
		$("#closepaneladminup").hide("fast");
		$("#lecturaok").val("");
	});
	$("#zonificarescaner").click(function(e){
		e.preventDefault();
				
		escanearreasignar();
		$("#closepanelreasignacion").show("fast");
		$("#divscanerreasignar").hide("fast");
		$("#editardatareasignar").hide("fast");
		$("#openscanerreasignar").show("fast");
	});
	$("#openscanerreasignar").click(function(e){
		e.preventDefault();
		if($("#Alertescanerreasignar").val() == "N"){
			
		var video = document.querySelector("#preview2");
		video.play();
			
			escanearadmin();
		}
		$("#closepanelreasignacion").hide("fast");
		$("#divscanerreasignar").show("fast");
		$("#editardatareasignar").show("fast");
		$("#openscanerreasignar").hide("fast");
		
				
	});
	$("#editardatareasignar").click(function(e){
		e.preventDefault();
		$("#closepanelreasignacion").show("fast");
		$("#divscanerreasignar").hide("fast");
		$("#editardatareasignar").hide("fast");
		$("#openscanerreasignar").show("fast");
		
		
	});
	
	
	$("#dnireg").keyup(function(e){
		e.preventDefault();
		var busqueda = $("#dnireg").val();
		if(busqueda == ""){
			$(".alert-success").hide("fast");
			$(".alert-danger").hide("fast");
			$("#savecliente").hide("fast");
		}else{		
			buscarclientenocorporativo("Unico");
		}
	});	
	
	//BUSCAR GUIA INDIVIDUAL
	
	$("#readguia-up").keyup(function(e){
		e.preventDefault();
		var idguia = $("#readguia-up").val();
		buscarguiaindividual(idguia,"");
		
	});
	$("#readguiaadmin-up").keyup(function(e){
		e.preventDefault();
		var idguia = $("#readguiaadmin-up").val();
		buscarguiaindividualadmin(idguia,"");
		
	});
	
	//oculta div imagen cataporte
	$("#cargacataporte").hide("fast");
	$("#cargacataporteadmin").hide("fast");
	
	//funcion para contar total de archivos cargados
	$("#miarchivo-up").change(function(){
		var total = this.files.length + " archivos cargados";
		$("#Totalload-up").text( this.files.length + " archivos cargados");
	 });
	
	//funicon para reasignar guia manualmente
	$("#reasignarguia").click(function(e){
		e.preventDefault();
		
		var idguia = $("#reasignarguia-up").val();
		var zona = $("#zonareasignar-up").val();
		var agente = $("#agentereasignar-up").val();
		var Ndireccion = $("#Ndireccionreasignar-up").val();
		var novedad = $("#novedadreasignar-up").val();
		var idplanilla  = $("#numeroplanilla").val();
		var fechaplanilla = $("#fechaplanilla").val();
		var fechamax = $("#fechamaxcierre").val();
		
		resignarguias(idguia,zona,agente,Ndireccion,novedad,idplanilla,fechaplanilla,fechamax);
		
	});
	$("#reasignarguia1").click(function(e){
		e.preventDefault();
		
		var idguia = $("#reasignarguia-up").val();
		var zona = $("#zonareasignar-up").val();
		var agente = $("#agentereasignar-up").val();
		var Ndireccion = $("#Ndireccionreasignar-up").val();
		var novedad = $("#novedadreasignar-up").val();
		var idplanilla  = $("#numeroplanilla").val();
		var fechaplanilla = $("#fechaplanilla").val();
		var fechamax = $("#fechamaxcierre").val();

		
		resignarguias(idguia,zona,agente,Ndireccion,novedad,idplanilla,fechaplanilla,fechamax);
	});
	
	$("#agentereasignar-up").change(function(e){
		e.preventDefault();
		var agente = $("#agentereasignar-up").val();
		verplanillas(0,5,agente,"Activo",0);
		
		$("#idnewplanilla").html("NUEVA PLANILLA ");
		$("#numeroplanilla").val('');
		$("#crearplanilla").show("fast");
		
		resumenCargueguias();
	});
	
	$("#fechaplanilla").change(function(e){
		e.preventDefault();
		var Fplanilla = $("#fechaplanilla").val();
		
		var Q = Fplanilla.length;
		if(Q == 10){
			var fecha = new Date($('#fechaplanilla').val());
			var dias = 4 + 1; // Número de días a agregar
			fecha.setDate(fecha.getDate() + dias);
			
			 var ano = fecha.getFullYear();
			var mes = "0" + (fecha.getMonth() + 1);
			var dia = "0" +  fecha.getDate();
			var fechamax = ano + "-" + mes.slice(-2) + "-" + dia.slice(-2);
			$("#fechamaxcierre").val(fechamax);
			
			
			
		}
	});
		$("#fechaplanilla1").change(function(e){
		e.preventDefault();
		var Fplanilla = $("#fechaplanilla1").val();
		
		var Q = Fplanilla.length;
		if(Q == 10){
			var fecha = new Date($('#fechaplanilla1').val());
			var dias = 4 + 1; // Número de días a agregar
			fecha.setDate(fecha.getDate() + dias);
			
			 var ano = fecha.getFullYear();
			var mes = "0" + (fecha.getMonth() + 1);
			var dia = "0" +  fecha.getDate();
			var fechamax = ano + "-" + mes.slice(-2) + "-" + dia.slice(-2);
			$("#fechamaxcierre1").val(fechamax);
			
			
			
		}
	});
	
	//recargar pagina para desactivar camara 
	$("#showfuntions").click(function(e){
		e.preventDefault();
		if($("#recharge").val() != "morefuntions" && $("#recharge").val() != ""){
			location.reload();
		}
		
	});
	
	//crear nueva planilla
	$("#crearplanilla").click(function(e){
		e.preventDefault();
		
		var IdPlanilla = $("#numeroplanilla").val();
		if(IdPlanilla == ""){
		   
			var addmensaje = '<br>' + "  Esta accion creara una nueva planilla.";
			var action = "crearplanilla";
			var tipo = "save";

			var agente = $("#agentereasignar-up").val();
			var zona = $("#zonareasignar-up").val();
			var fechaplanilla = $("#fechaplanilla").val();
			var fechaMaxCierre = $("#fechamaxcierre").val();
			var estado = "";					
			var url = $("#126").val() + "ajax/guiaAjax.php";
			var tipoaccion = "POST";
			var data = {action:action,IdPlanilla:IdPlanilla,agente:agente,zona:zona,fechaplanilla:fechaplanilla,fechaMaxCierre:fechaMaxCierre,estado:estado};
			generalesguia(url,tipo,tipoaccion,data,action,addmensaje);
		}
		
	});
	//FUNCIONES GENERALES
	//agregar movimientos de la pagina tareas
	$('.FormularioGuia').submit(function(e){
        e.preventDefault();

        var form=$(this);
		var tipo=form.attr('data-form');
        var accion=form.attr('action');
        var metodo=form.attr('method');
		var respuesta=form.children('.RespuestaAjax');
		var formulario=form.attr('name');
		
		var tipoalert = "question";
		var mensadd = "Los datos del sistema serán actualizados";
		if(formulario == "updateguia" || formulario == "updateguiaadmin"){
			if(formulario == "updateguia"){
				var fecharecogida = moment($("#fecharecogida-up").val());
				var fechaup = moment($("#fechamovimiento-up").val());
				var guiaup = $("#fid-up").val();
				var novedadup = $("#novedad-up").val();
			}
			if(formulario == "updateguiaadmin"){
				var fecharecogida = moment($("#fecharecogidaadminr-up").val());
				var fechaup = moment($("#fechamovimientoadmin-up").val());
				var guiaup = $("#idguiaadmin-up").val();
				var novedadup = $("#novedadadmin-up").val();
				var pruebaentrega = $("#imgcanvasadmin").val();
			}
			
			var diferencia = fechaup.diff(fecharecogida, 'days');
			
			mensadd = "La guia " + guiaup + " se actualizara con la novedad " + novedadup + ".";
			
			if(pruebaentrega == "" && novedadup == "ENTREGADO" ){
			   mensadd = mensadd + "<br>" + "<br>" + "SIN IMAGEN";
			 }
			
			if(diferencia <= 4){
				var dias = 4 - diferencia;
			   	mensadd = mensadd + "<br>" + "<br>" + "Envio con " + dias + " días adicionales, ¿Desea continuar?";
		   }else{
			   
			   var tipoalert = "error";
			   var dias = diferencia - 4 ;
			   
			   mensadd = mensadd + "<br>" + "<br>" + "Envio con " + dias + " días vencidos, ¿Seguro que es la fecha de movimiento?";
		   }
			
		}
		
        var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
        var formdata = new FormData(this);
 

        var textoAlerta;
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
        }else if(tipo==="delete"){
            textoAlerta="Los datos serán eliminados completamente del sistema";
        }else if(tipo==="update"){
			textoAlerta= mensadd;
        }else{
            textoAlerta="Quieres realizar la operación solicitada";
        }
		swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: tipoalert,   
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
					if(formulario == "regnewnocorporativo" || formulario == "regnewguia" || formulario == "updateguia" || formulario == "updateguiaadmin"){
						var info = $.parseJSON(data);
						data = info.alerta;
						
					}	
					respuesta.html(data);
					
					
					if(data !== "error")
					{
						if(formulario == "regnewnocorporativo"){
							
							$("#idnocorporativo").val(info.IdCliente);
							
						}
						if(formulario == "regnewguia"){
							var error = info.error;
							var idimpresion = info.idimprision;
							
							
							if(error == "NO"){
								$('.FormularioGuia')[0].reset();
								$('.FormularioGuia')[1].reset();
							}
						}
						if(formulario == "updateguia"){
							var error = info.error;
							if(error == "NO"){
								$('.FormularioGuia')[2].reset();
								$("#divscaner").show("fast");
								$("#closepanelup").hide("fast");
								$("#imgcanvas").val("");
								$("#imgcanvas1").val("");
								$("#imgcanvas2").val("");
								$("#lecturaoka").val("");
								$("#checknovedad-up").attr("checked",false);
								$("#checkfecha-up").attr("checked",false);
								
								var cv = document.getElementById('lienzo');
								var ctx = cv.getContext('2d');
								ctx.clearRect(0, 0, cv.width, cv.height);
								document.getElementById('lienzo').width = 10;
								document.getElementById('lienzo').height = 10;
								
								var cv = document.getElementById('lienzo1');
								var ctx = cv.getContext('2d');
								ctx.clearRect(0, 0, cv.width, cv.height);
								document.getElementById('lienzo1').width = 10;
								document.getElementById('lienzo1').height = 10;
								
								var cv = document.getElementById('lienzo2');
								var ctx = cv.getContext('2d');
								ctx.clearRect(0, 0, cv.width, cv.height);
								document.getElementById('lienzo2').width = 10;
								document.getElementById('lienzo2').height = 10;
								var video = document.querySelector("#preview");
								video.play();
							}else{
								
							}
						}
						if(formulario == "updateguiaadmin"){
							var error = info.error;
							if(error == "NO"){
								$('.FormularioGuia')[3].reset();
								$("#divscaneradmin").show("fast");
								$("#closepaneladminup").hide("fast");
								$("#imgcanvasadmin").val("");
								$("#imgcanvas1admin").val("");
								$("#imgcanvas2admin").val("");
								$("#lecturaok").val("");
								$("#checkagenteadmin-up").attr("checked",false);
								$("#checkfechaadmin-up").attr("checked",false);
								$("#checknovedadadmin-up").attr("checked",false);
								
								var cv = document.getElementById('lienzoadmin');
								var ctx = cv.getContext('2d');
								ctx.clearRect(0, 0, cv.width, cv.height);
								document.getElementById('lienzoadmin').width = 10;
								document.getElementById('lienzoadmin').height = 10;
								
								var cv = document.getElementById('lienzo1admin');
								var ctx = cv.getContext('2d');
								ctx.clearRect(0, 0, cv.width, cv.height);
								document.getElementById('lienzo1admin').width = 10;
								document.getElementById('lienzo1admin').height = 10;
								
								var cv = document.getElementById('lienzo2admin');
								var ctx = cv.getContext('2d');
								ctx.clearRect(0, 0, cv.width, cv.height);
								document.getElementById('lienzo2admin').width = 10;
								document.getElementById('lienzo2admin').height = 10;
								
								var video = document.querySelector("#preview1");
								video.play();
								
							}else{
								
							}
						}
						if(formulario == "downloadguias"){
							respuesta.html('');
							//window.open('https://www.cargsolutions.com/DSAor/exportaciones/exportacionguiaup.php', '_blank');
							/*$.post(function(data){
								$('#expoguias').html(data);
							});*/
							
							window.location.href = 'https://www.cargsolutions.com/DSAor/exportacionguiaup';
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
	
	verguias(0,"Activo");
	
}); // final de ready

function verdatoscliente(){
	$("#nombre-reg").removeAttr("disabled");
	$("#apellido-reg").removeAttr("disabled");
	$("#ciudad-reg").removeAttr("disabled");
	$("#barrio-reg").removeAttr("disabled");
	$("#direccion-reg").removeAttr("disabled");
	$("#telefono-reg").removeAttr("disabled");
	$("#email-reg").removeAttr("disabled");
	$("#masdatoscliente").show("fast");
}

function ocultarverdatoscliente(){
	$("#nombre-reg").attr('disabled','disabled');
	$("#apellido-reg").attr('disabled','disabled');
	$("#ciudad-reg").attr('disabled','disabled');
	$("#barrio-reg").attr('disabled','disabled');
	$("#direccion-reg").attr('disabled','disabled');
	$("#telefono-reg").attr('disabled','disabled');
	$("#email-reg").attr('disabled','disabled');
	$("#masdatoscliente").hide("fast");
}

//ver guias
function verguias(pagina,estado){
	var action = 'verguias';
	
	//$("#listaguias").html('');

		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					
					var info = JSON.parse(response);
					$("#listaguias").html(info.Tabla);
					$("#Titlelistguia").html("LISTA DE GUIAS (TOTAL: " + info.Total + ")");
					
					$(".list_guia .task-menu").hide();
					$(".list_guia").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_guia").mouseout(function(){
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

function buscarguias(pagina,estado){
	var action = 'buscarguias';
	var agente = $("#agente_filtro").val();
	var novedad = $("#novedad_filtro").val();
	var zona = $("#zona_filtro").val();
	var tipofilro = $("#tipo_filtro").val();
	var servicio = $("#servicio_filtro").val();
	var Finicio = $("#fechainicio").val();
	var FFin = $("#fechafin").val();
	var busquedad = $("#busquedad_guia").val();
	var busqdir = $("#direc").val();
	
	
	
	
	//$("#listaguias").html('');

		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,estado:estado,agente:agente,novedad:novedad,zona:zona,tipofilro:tipofilro,servicio:servicio,Finicio:Finicio,FFin:FFin,busqdir:busqdir,busquedad:busquedad},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					var info = JSON.parse(response);
					$("#listaguias").html(info.Tabla);
					$("#Titlelistguia").html("LISTA DE GUIAS (TOTAL: " + info.Total + ")");
					
					$(".list_guia .task-menu").hide();
					$(".list_guia").mouseover(function(){
						$(this).find(".task-menu").show();
					});
					$(".list_guia").mouseout(function(){
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

function buscarclientenocorporativo(tipo){
	var action = 'buscarclientenocorporativo';
	var busquedad = $("#dnireg").val();
	
		$.ajax({
			url: '../ajax/clienteAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,busquedad:busquedad,tipo:tipo},

			success: function(response)
			{	
				if(response !== "error")
				{
					if(response != 0)
					{
						var info = JSON.parse(response);
						
						$(".alert-success").show("fast");
						$(".alert-danger").hide("fast");
						$("#nombre-reg").val(info.ClienteNombreDirector);
						$("#apellido-reg").val(info.ClienteApellidoDirector);
						$("#ciudad-reg").val(info.ClienteCiudad);
						$("#barrio-reg").val(info.ClienteBarrio);
						$("#direccion-reg").val(info.ClienteDireccion);
						$("#telefono-reg").val(info.ClienteTelefono);
						$("#email-reg").val(info.ClienteEmail);
						$("#idnocorporativo").val(info.id);
						$("#savecliente").hide("fast");
					}else{
						$(".alert-success").hide("fast");
						$(".alert-danger").show("fast");
						$("#nombre-reg").val("");
						$("#apellido-reg").val("");
						$("#ciudad-reg").val("");
						$("#barrio-reg").val("");
						$("#direccion-reg").val("");
						$("#telefono-reg").val("");
						$("#email-reg").val("");
						$("#idnocorporativo").val("");
						$("#savecliente").show("fast");
						
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

//REGISTRAR REASIGNACION
function resignarguias(idguia,zona,agente,Ndireccion,novedad,idplanilla,fechaplanilla,fechamax){
	var action = 'resignarguias';
	
	//$("#listaguias").html('');

		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,idguia:idguia,zona:zona,agente:agente,Ndireccion:Ndireccion,novedad:novedad,idplanilla:idplanilla,fechaplanilla:fechaplanilla,fechamax:fechamax},

			success: function(response)
			{	
				
				resumenreasignar(idguia);
				
				$('.RespuestaAjax').html(response);
				if(response !== "error")
				{
					//console.log(response);
					$("#reasignarguia-up").val('') ;
					$("#Ndireccionreasignar-up").val('');
					
					
				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
}

//ver planilla
function verplanillas(pagina,registros,agente,estado,idmasivo){
	var action = 'verplanillas';
	
	//$("#listaguias").html('');

		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,registros:registros,agente:agente,estado:estado,idmasivo:idmasivo},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					
					var info = JSON.parse(response);
					
					if(idmasivo == 0){
						$("#listaplanilla").html(info.Tabla);
						$("#titleplanillas").html("PLANILLAS ABIERTAS (TOTAL: " + info.Total + ")");

						$(".list_guia .task-menu").hide();
						$(".list_guia").mouseover(function(){
							$(this).find(".task-menu").show();
						});
						$(".list_guia").mouseout(function(){
							$(this).find(".task-menu").hide();
						});
					}
					
					if(idmasivo > 0){
						$("#listaplanilla1").html(info.Tabla);
						$("#titleplanillas1").html("PLANILLAS ABIERTAS (TOTAL: " + info.Total + ")");

						$(".list_guia .task-menu").hide();
						$(".list_guia").mouseover(function(){
							$(this).find(".task-menu").show();
						});
						$(".list_guia").mouseout(function(){
							$(this).find(".task-menu").hide();
						});
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

function resumenreasignar(idguia){
	var zonar = $("#zonareasignar-up").val();
	var agenter = $("#agentereasignar-up").val();
	var novedadr = $("#novedadreasignar-up").val();
	var Ndireccionr = $("#Ndireccionreasignar-up").val();
	
	
	$("#detallesR").html("Guia: "+idguia+ "<br>"+" Zona: "+zonar+" Agente: "+agenter+" Novedad: "+novedadr+" Nueva dirección: "+Ndireccionr);
	resumenCargueguias();
}

//GENERAR ALERTAS ANTES DE EJECUTAR PROCEDIMIENTOS
function generalesguia(url,tipo,tipoaccion,data,action,addmensaje){
       
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
					var info = $.parseJSON(response);
					response = info.alerta;
					if(action == "crearplanilla"){
						
						
					}	
					 $('.RespuestaAjaxgenerales').html(response);
					if(response !== "error")
					{
						//console.log(data);
						if(action == "desactivar_guia" ){
							if(tipo == "delete"){
								verguias(0,"Activo");
							}
							if(tipo == "update"){
								verguias(0,"Anulado");
							}
						}
						if(action == "crearplanilla"){
							if(info.idplanilla >= 1){
								$("#idnewplanilla").html("NUEVA PLANILLA CREADA CON NUMERO " + info.idplanilla);
								$("#numeroplanilla").val(info.idplanilla);
								var agente = $("#agentereasignar-up").val();
								$("#crearplanilla").hide("fast");
							}
							
								verplanillas(0,5,agente,"Activo",0);
						}
						
						if(action == "guias_masivas"){
							var masivo = info.idmasivo;
								verplanillas(0,10,agente,"Activo",masivo);
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


//escanear guia para editar
function escanear(){
	let scanner = new Instascan.Scanner(
		{
			video: document.getElementById("preview")
		}
	);
	scanner.addListener("scan", function(content){
		
		//window.open("editar_guia?id=" + content, "_self");
		
		if($("#lecturaoka").val() == ""){
			buscarguiaindividual(content,"");
			$("#lecturaoka").val("655");
			content = "";
		}
	});
	Instascan.Camera.getCameras().then(cameras => 
	{	
		if(cameras.length > 0)
		{
			var total = cameras.length;
			var x;

			if(total > 1)
			{
				for(var i = 0; i < total; i++)
				{
					var camaraSEL = "NO";
					var respuesta = cameras[i].name;
					if(respuesta.indexOf("back") > -1)
					{
						if(i>1){x = i-1;}
						$("#recharge").val('cargarescaner');
						scanner.start(cameras[x]);
						//document.getElementById("idcamara").value = x;

						break;
					}
				}

				if(camaraSEL == "NO"){
					$("#recharge").val('cargarescaner');
					scanner.start(cameras[total-1]);
					//document.getElementById("idcamara").value = total-1;
			   }
			}else{
				$("#recharge").val('cargarescaner');
				scanner.start(cameras[0]);
				//document.getElementById("idcamara").value = 0;
			}
		} 
		else 
		{
			console.error("No existen camaras en el dispositivo");
		}
	});
	
}
//escanear guia para editar desde administrador
function escanearadmin(){
	let scanner = new Instascan.Scanner(
		{
			video: document.getElementById("preview1")
			
		}
	);
	scanner.addListener("scan", function(content){
		
		//window.open("editar_guia?id=" + content, "_self");
		if($("#lecturaok").val() == ""){
			buscarguiaindividualadmin(content,"");
			$("#lecturaok").val("655");
			content = "";
		}
	});
	Instascan.Camera.getCameras().then(cameras => 
	{	
		if(cameras.length > 0)
		{
			var total = cameras.length;
			var x;

			if(total > 1)
			{
				for(var i = 0; i < total; i++)
				{
					var camaraSEL = "NO";
					var respuesta = cameras[i].name;
					if(respuesta.indexOf("back") > -1)
					{
						if(i>1){x = i-1;}
						$("#recharge").val('cargarescaneradmin');
						scanner.start(cameras[x]);
						//document.getElementById("idcamara").value = x;

						break;
					}
				}

				if(camaraSEL == "NO"){
					$("#recharge").val('cargarescaneradmin');
					scanner.start(cameras[total-1]);
					//document.getElementById("idcamara").value = total-1;
			   }
			}else{
				$("#recharge").val('cargarescaneradmin');
				scanner.start(cameras[0]);
				//document.getElementById("idcamara").value = 0;
			}
			
		} 
		else 
		{
			console.error("No existen camaras en el dispositivo");
		}
	});
	
}
//escanear guia para reasignar
function escanearreasignar(){
	
		let scanner = new Instascan.Scanner({
				video: document.getElementById("preview2")
			});
	
	
	scanner.addListener("scan", function(content){
		
		//window.open("editar_guia?id=" + content, "_self");
		
		
		
		var sound = new Audio("../vistas/assets/sound/barcode.wav")
		var zona = $("#zonareasignar-up").val();
		var agente = $("#agentereasignar-up").val();
		var Ndireccion = $("#Ndireccionreasignar-up").val();
		var novedad = $("#novedadreasignar-up").val();
		var idplanilla  = $("#numeroplanilla").val();
		var fechaplanilla = $("#fechaplanilla").val();
		var fechamax = $("#fechamaxcierre").val();
		
		sound.play();
		resignarguias(content,zona,agente,Ndireccion,novedad,idplanilla,fechaplanilla,fechamax);
		content = "";
	});
	
	
		Instascan.Camera.getCameras().then(cameras => 
		{	
			if(cameras.length > 0)
			{
				var total = cameras.length;
				var x;

				if(total > 1)
				{
					for(var i = 0; i < total; i++)
					{
						var camaraSEL = "NO";
						var respuesta = cameras[i].name;
						if(respuesta.indexOf("back") > -1)
						{
							if(i>1){x = i-1;}
							$("#recharge").val('morefuntions');
							scanner.start(cameras[x]);
							//document.getElementById("idcamara").value = x;
							$("#Alertescanerreasignar").val("S");
							break;
						}
					}

					if(camaraSEL == "NO"){
						$("#recharge").val('morefuntions');
						scanner.start(cameras[total-1]);
						
						$("#Alertescanerreasignar").val("S");
						//document.getElementById("idcamara").value = total-1;
				   }
				}else{
					$("#recharge").val('morefuntions');
					scanner.start(cameras[0]);
					$("#Alertescanerreasignar").val("S");
					//document.getElementById("idcamara").value = 0;
				}
			} 
			else 
			{
				console.error("No existen camaras en el dispositivo");
			}
		});
	
	
}
//buscar guia desde al mensajero
function buscarguiaindividual(idguia,D){
	var action = 'buscarguiaindividual';
	var video = document.querySelector("#preview");
	video.pause();
	
		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,idguia:idguia,D:D},

			success: function(response)
			{	
				if(response !== "error")
				{
					if(response != 0)
					{
						var info = JSON.parse(response);
						
						var guia = info.MovGuiaNumeroguia;
						var fijarnovedad = info.Fijarnovedad;
						var fijarfecha = info.Fijarfecha;
						var cataporte = info.MovGuiaCataporte
						
						if(guia == 0){
							$("#guiaid").html("Guia: " + info.MovGuiaGuia + info.id);
						}else{
							$("#guiaid").html("Guia: " + info.MovGuiaGuia);
						}
						$("#fecharecogida-up").val(info.MovGuiaFecha_recogida);
						$("#guiadireccion").html("Dirección: " + info.MovGuiaDireccion);
						$("#guiadestino").html("Destinatario: " + info.MovGuiaDestinatario);
						$("#guianovedad").html("Novedad actual: " + info.MovGuiaNovedad);
						
						
						$("#id-up").val(info.id);
						
						if(fijarnovedad == "OK"){
						   	$("#checknovedad-up").attr("checked",true);
							$("#novedad-up").val(info.Novedafija);
						}else{
							$("#checknovedad-up").attr("checked",false);
						}
						if(fijarfecha == "OK"){
							$("#checkfecha-up").attr("checked",true);
							$("#fechamovimiento-up").val(info.Fechafija);
						}else{
							$("#checkfecha-up").attr("checked",false);
						}
												
						$("#divscaner").hide("fast");
						$("#closepanelup").show("fast");
						if(cataporte >= 1){
						   $("#cargacataporte").show("fast");
						}else{
						   $("#cargacataporte").hide("fast");
						}
					}else{
						$('.FormularioGuia')[2].reset();
						$("#divscaner").show("fast");
						$("#closepanelup").hide("fast");
						
					}
					
					
						$("#imgcanvas").val("");
						$("#imagenguia-up").val("");
						$("#imgalert").val("");
						$("#imgcanvas1").val("");
						$("#imagenlugar-up").val("");
						$("#lugarlert").val("");
						$("#imgcanvas2").val("");
						$("#imagencataporte-up").val("");
						$("#cataportealert").val("");
						
						var cv = document.getElementById('lienzo');
						var ctx = cv.getContext('2d');
						ctx.clearRect(0, 0, cv.width, cv.height);
						document.getElementById('lienzo').width = 10;
						document.getElementById('lienzo').height = 10;

						var cv = document.getElementById('lienzo1');
						var ctx = cv.getContext('2d');
						ctx.clearRect(0, 0, cv.width, cv.height);
						document.getElementById('lienzo1').width = 10;
						document.getElementById('lienzo1').height = 10;

						var cv = document.getElementById('lienzo2');
						var ctx = cv.getContext('2d');
						ctx.clearRect(0, 0, cv.width, cv.height);
						document.getElementById('lienzo2').width = 10;
						document.getElementById('lienzo2').height = 10;
					
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
function buscarguiaindividualadmin(idguia,D){
	var action = 'buscarguiaindividual';
	
	var video = document.querySelector("#preview1");
	video.pause();
	
		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,idguia:idguia,D:D},

			success: function(response)
			{	
				if(response !== "error")
				{
					if(response != 0)
					{
						var info = JSON.parse(response);
						
						var guia = info.MovGuiaNumeroguia;
						var fijarnovedad = info.Fijarnovedad;
						var fijarfecha = info.Fijarfecha;
						var fijaragente = info.fijaragente;
						var cataporte = info.MovGuiaCataporte
						
						$("#idguiaadmin-up").val(info.id);
						$("#fecharecogidaadmin-up").val(info.MovGuiaFecha_recogida);
						$("#remitenteadmin-up").val(info.MovGuiaCodigocliente);
						if(guia == 0){
							$("#guiaadmin-up").val(info.MovGuiaGuia + info.id);
						}else{
							$("#guiaadmin-up").val(info.MovGuiaGuia);
						}
						$("#tiposervicioadmin-up").val(info.MovGuiaCodigo);
						$("#radicadoadmin-up").val(info.MovGuiaRadicado);
						$("#areaadmin-up").val(info.MovGuiaArea);
						$("#destinatarioadmin-up").val(info.MovGuiaDestinatario);
						$("#emailadmin-up").val(info.MovGuiaCorreodestino);
						$("#municipioadmin-up").val(info.MovGuiaMunicipio);
						$("#direccionadmin-up").val(info.MovGuiaDireccion);
						$("#referenteadmin-up").val(info.MovGuiaReferente);
						$("#telefonoadmin-up").val(info.MovGuiaTelefono);
						$("#cataporteadmin-up").val(info.MovGuiaCataporte);
						$("#volumenadmin-up").val(info.MovGuiaVolumen);
						$("#fecharecogidaadminr-up").val(info.MovGuiaFecha_recogida);
						$("#fechafacturaadmin-up").val(info.MovGuiaFecha_factura);
						
						if(fijarnovedad == "OK"){
						   	$("#checknovedadadmin-up").attr("checked",true);
							$("#novedadadmin-up").val(info.Novedafija);
						}else{
							$("#checknovedadadmin-up").attr("checked",false);
							$("#novedadadmin-up").val(info.MovGuiaNovedad);
						}
						
						
						if(fijarfecha == "OK"){
						   	$("#checkfechaadmin-up").attr("checked",true);
							$("#fechamovimientoadmin-up").val(info.Fechafija);
						}else{
							$("#checkfechaadmin-up").attr("checked",false);
							$("#fechamovimientoadmin-up").val(info.MovGuiaFentrega);
						}
						
						$("#detallenovedadadmin-up").val(info.MovGuiaDetallenovedad);
						
						if(fijaragente == "OK"){
						   	$("#checkagenteadmin-up").attr("checked",true);
							$("#agenteadmin-up").val(info.Agentefijo);
						}else{
							$("#checkagenteadmin-up").attr("checked",false);
							$("#agenteadmin-up").val(info.MovGuiaAgente);
						}
						
						$("#zonaadmin-up").val(info.MovGuiaZona);
						
						$("#tarifaadmin-up").val(info.MovGuiaIdtarifa);
						$("#Ndireccionadmin-up").val(info.MovGuiaNdireccion);
						$("#fechaasignadoadmin-up").val(info.MovGuiaFasignacion);
						$("#bonificacionadmin-up").val(info.MovGuiaPago);
						
						
						$("#divscaneradmin").hide("fast");
						$("#closepaneladminup").show("fast");
						if(cataporte >= 1){
						   $("#cargacataporteadmin").show("fast");
						}else{
						   $("#cargacataporteadmin").hide("fast");
						}
					}else{
						$('.FormularioGuia')[3].reset();
						$("#divscaneradmin").show("fast");
						$("#closepaneladminup").hide("fast");
						
					}
					
										
						$("#imgcanvasadmin").val("");
						$("#imagenguiaadmin-up").val("");
						$("#adminimgalert").val("");
						$("#imgcanvas1admin").val("");
						$("#imagenlugaradmin-up").val("");
						$("#adminlugarlert").val("");
						$("#imgcanvas2admin").val("");
						$("#imagencataporteadmin-up").val("");
						$("#admincataportealert").val("");
					
						var cv = document.getElementById('lienzoadmin');
						var ctx = cv.getContext('2d');
						ctx.clearRect(0, 0, cv.width, cv.height);
						document.getElementById('lienzoadmin').width = 10;
						document.getElementById('lienzoadmin').height = 10;

						var cv = document.getElementById('lienzo1admin');
						var ctx = cv.getContext('2d');
						ctx.clearRect(0, 0, cv.width, cv.height);
						document.getElementById('lienzo1admin').width = 10;
						document.getElementById('lienzo1admin').height = 10;

						var cv = document.getElementById('lienzo2admin');
						var ctx = cv.getContext('2d');
						ctx.clearRect(0, 0, cv.width, cv.height);
						document.getElementById('lienzo2admin').width = 10;
						document.getElementById('lienzo2admin').height = 10;
					
				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
}

//funcion para buscar resumen de asignacion
function resumenCargueguias(){
	
		var action = "resumenCargueguias";
	
		var agente = document.getElementById("agentereasignar-up");
		var nombreagente = agente.options[agente.selectedIndex].text;
		var codigoagente = $("#agentereasignar-up").val();
		var fechaplanilla = $("#fechaplanilla").val();
		var idplanilla = $("#numeroplanilla").val();
		
		$("#titleresumen").html("RESUMEN: " + nombreagente + "<br>" + "Fecha: " + fechaplanilla +  " Cantidad:" );
	
		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,fechaplanilla:fechaplanilla,codigoagente:codigoagente,idplanilla:idplanilla},

			success: function(response)
			{	
				if(response != "error")
				{
					var info = JSON.parse(response);
					
					
					$("#titleresumen").html("RESUMEN: " + nombreagente + "<br>" + "Fecha: " + fechaplanilla +  "<br>" + " Cargue del dia:" + info.totalguias + " Total Planilla: " + info.Totalplanilla + " Q Fecha del cargue: " + info.totalfechacargue);
					
					
				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});	
	

}
//ver imagene individual
function verimagenidividual(pagina){
	var action = 'verimagenidividual';
	
	var Finicio = $("#fechadesdemovimiento").val();
	var FFin = $("#fechahastamovimiento").val();
	var guiadesde = $("#verguiadesde").val();
	var guiahasta = $("#verguiahasta").val();
	var version = $("#versionguias").val();
	
	
	
	
	//$("#listaguias").html('');

		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,pagina:pagina,Finicio:Finicio,FFin:FFin,guiadesde:guiadesde,guiahasta:guiahasta,version:version},

			success: function(response)
			{	
				if(response !== "error")
				{
					//console.log(response);
					var info = JSON.parse(response);
					$("#visorimg").html(info.Tabla);
					$("#Titlevisorimg").html("VISOR IMAGEN (TOTAL: " + info.Total + ")");
									

					
				}else
				{
					console.log('no data');
				}
			},

			error: function(error){

			}
		});
	
	
}