<!doctype html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/ >
<meta http-equiv="Content-Type" content="text/html; charset="ISO-8859-1″ />
<title>Documento sin título</title>
	
	<style type="text/css">
		.guia{
			height: 475px;
			width: 1091px;
			float: left;
			font-size: 12px;
			
		}
		.desprendible{
			height: 475px;
			width: 156px;
			font-size: 12px;
			float: left;
		}
		.bodyc{
			
		}
		.desprendibleC{
			height: 412px;
			width: 764px;
			float: left;
		}
		.titulos{
			height: 435px;
			width: 80px;
			float: left;
		}
		.detallecentral{
			height: 435px;
			width: 401px;
			float: left;
		}
		.detallefinal{
			height: 435px;
			width: 280px;
			float: left;
		}
		.imgurl{
			background: url(../vistas/assets/img/firma.png)
		}
		.bordedisc{
			border-left: 2px dashed;
		}
		.borde1{
			border-bottom: 1px solid;
			
		}
		.bordelrbt{
			border: 1px solid;
			
		}
		.border{
			border-right: 1px solid;
			
		}
		.bordeT{
			border-top: 1px solid;
			
		}
		.negrilla{
			
			font-weight: bold;
		}
		.lightfont{
			color:#FCFCFC;
		}
		.f9nt14{
			font-size: 14px;
		}
		.letra{
			font-size: 25px;
		}
		.W100{
			width: 80px;
		}
		.W200{
			width: 156px;
		}
		.W112{
			width: 77.5px;
		}
		.W81{
			width: 81px;
		}
		.W400{
			width: 401px;
		}
		.W264{
			width: 224px;
		}
		.W32{
			width: 32px;
		}
		.W35{
			width: 41.5px;
		}
		.W298{
			width: 336px;
		}
		.W398{
			width: 400px;
		}
		
		.W98{
			width: 143px;
		}
		.W138{
			width: 82px;
		}
		.W188{
			width: 192px;
		}
		.W132{
			width: 132px;
		}
		.W131{
			width: 134px;
		}
		
		.W31{
			width: 47.3px;
		}
		.W29{
			width: 47.3px;
		}
		.W320{
			width: 280px;
		}
		.W130{
			width: 130px;
			
		}
		.W114{
			width: 93px;
		}
		.W116{
			width: 92px;
		}
		.W126{
			width: 125px;
		}
		.W228{
			width: 145px;
		}
		
		.W185{
			width: 201px;
		}
		.W180{
			width: 198px;
		}
		.W216{
			width: 153px;
		}
		.H22{
			height: 22px;
			max-height: 22px;
		}
		.H66{
			height: 70px;
			max-height: 70px;
		}
		.H30{
			height: 30px;
		}
		.H46{
			height: 46px;
		}
		.H49{
			height: 40px;
		}
		.H45{
			height: 45px;
		}
		.H70{
			height: 81px;
		}
		.H75{
			height: 78px;
		}
		.H40{
			height: 43px;
		}
		.H41{
			height: 50px;
		}
		.H52{
			height: 93px;
		}
		.H550{
			height: 225px;
		}
		.H300{
			height: 118px;
		}
		.H200{
			height: 1033px;
		}
		.H61{
			height: 60px;
		}
		.H19{
			height: 25px;
		}
		.IZQ{
			float: left;
			overflow:hidden;
    		
			
		}
		.IZQ1{
			float: left;
		}
		.separador{
			height: 475px;
			width: 2px;
			float: left;
		}
		
		@media all {
		   div.saltopagina{
			  display: none;
			   page-break-after: always;
		   }
		}

		@media print{
		   div.saltopagina{
			  display:block;
			  /*age-break-before:always;*/
			  page-break-after: always;
		   }
		}
		
		</style>
	
	
	
	<script>
	
	
	//window.onload = function(){ ellipsis ('.IZQ') }
	
	function ellipsis(selector){
		 var nodeList = document.querySelectorAll(selector);
		 arrNodes = [].slice.call(nodeList);
		 for (var i in arrNodes)
		 {
		   var n = arrNodes[i];
		   while(n.scrollHeight-n.offsetHeight>0)
		   {
			 var text = (n.innerText != undefined) ? n.innerText : n.textContent;
			 if(n.innerText != undefined)
			 {
				 n.innerText=text.replace(/\W*\s(\S)*$/, '...');
			 }
			 else
			 {
			   // Para Firefox
			   n.textContent = text.replace(/\W*\s(\S)*$/, '...');
			 }
		   }
		 }
		
		
	}
	
		function imprimir()
		{
			if ((navigator.appName == "Netscape")) 
			{ 
				window.print() ;
			}
			else
			{ 
				var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
				document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
			}
		}
	</script>
	
</head>

	
	
<body onload=" ellipsis('.IZQ'); imprimir();">
	
	<?php
			
		// 
		$peticionAjax=true;
		require_once "../controladores/guiaControlador.php";
		$insGuia= new guiaControlador();
		$data = $insGuia->imprimir_guias_guia_controlador($_POST['codigo'],$_POST['guiadesde'],$_POST['guiahasta'],$_POST['impodesde'],$_POST['impohasta']);

	?>
	
</body>
</html>
