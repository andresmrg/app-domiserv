<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
	
	<style type="text/css">
		.guia{
			height: 459px;
			width: 1095px;
			float: left;
			
		}
		.desprendible{
			height: 459px;
			width: 225px;
			float: left;
		}
		.bodyc{
			
		}
		.desprendibleC{
			height: 414px;
			width: 860px;
			float: left;
		}
		.titulos{
			height: 414px;
			width: 100px;
			float: left;
		}
		.detallecentral{
			height: 414px;
			width: 440px;
			float: left;
		}
		.detallefinal{
			height: 414px;
			width: 320px;
			float: left;
		}
		.imgurl{
			background: url(../vistas/assets/img/firma.png)
		}
		.borde1{
			border: 1px solid;
			
		}
		.negrilla{
			
			font-weight: bold;
		}
		.lightfont{
			color:#FCFCFC;
		}
		.letra{
			font-size: 25px;
		}
		.W100{
			width: 100px;
		}
		.W200{
			width: 225px;
		}
		.W400{
			width: 440px;
		}
		.W264{
			width: 264px;
		}
		.W32{
			width: 32px;
		}
		.W35{
			width: 36px;
		}
		.W298{
			width: 336px;
		}
		.W398{
			width: 438px;
		}
		.W98{
			width: 138px;
		}
		.W138{
			width: 132px;
		}
		.W132{
			width: 132px;
		}
		.W131{
			width: 131px;
		}
		
		.W31{
			width: 31px;
		}
		.W320{
			width: 363px;
		}
		.W130{
			width: 130px;
			
		}
		.W114{
			width: 104px;
		}
		.W116{
			width: 106px;
		}
		.W228{
			width: 185px;
		}
		.W320{
			width: 320px;;
		}
		.W185{
			width: 215px;
		}
		.W216{
			width: 210px;
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
		.H45{
			height: 45px;
		}
		.H70{
			height: 70px;
		}
		.H75{
			height: 78px;
		}
		.H40{
			height: 43px;
		}
		.H52{
			height: 71px;
		}
		.H550{
			height: 221px;
		}
		.H300{
			height: 118px;
		}
		.H200{
			height: 1033px;
		}
		.IZQ{
			float: left;
			overflow:hidden;
    		
			
		}
		.IZQ1{
			float: left;
		}
		.separador{
			height: 459px;
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
			
		
		$peticionAjax=true;
		require_once "../controladores/guiaControlador.php";
		$insGuia= new guiaControlador();
		$data = $insGuia->imprimir_guias_guia_controlador($_POST['codigo'],$_POST['guiadesde'],$_POST['guiahasta'],$_POST['impodesde'],$_POST['impohasta']);

	?>
	
</body>
</html>
