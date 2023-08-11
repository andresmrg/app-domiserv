<?php

//header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
//header('Content-Disposition: attachment; filename=Listado_de_guias.xls');

//session_start(['name'=>'DSA']);




?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Imprimir planila <?php echo $_POST['numeroplanilla'] ?></title>
		
		<style type="text/css">
		.guia{
			height: 1440px;
			width: 1089px;
			float: left;
			font-size: 12px;
			
		}
			.guia1{
			height: 1260px;
			width: 1089px;
			float: left;
			font-size: 12px;
			
		}
			.guia2{
			height: 95px;
			width: 1089px;
			float: left;
			font-size: 14px;
			
		}
		.centrales{
			height: 1260px;
			width: 539px;
			font-size: 10px;
			float: left;
		}
		
		.titulos{
			height: 443px;
			width: 80px;
			float: left;
		}
		
		.bordel{
			border-left: 1px solid;
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
			.f9nt14{
			font-size: 14px;
		}
		}
		.f9nt10{
		font-size: 10px;
		}
			.centerTT{
				text-align:center;
			}
			
		.H22{
			height: 13px;
		}
			.H24{
			height: 16px;
		}
			.H44{
				height: 22px;
			}
		.H50{
			height: 50px;
		}
		.H75{
			height: 78px;
		}
			.H2{
				height: 2px;
			}
			.H1260{
				height: 1260px;
			}
			.W8{
				width: 8px;
			}
			.W30{
				width: 30px;
			}
			.W100{
				width: 120px;
			}
			.W39{
				width: 56px;
			}
			.W60{
				width: 45px;
			}
			.W242{
				width: 253px;
			}
			.W1089{
				width: 1089px;
			}
			.W50{
				width: 50px;
			}
			.W300{
				width: 300px;
			}
			.W90{
				width: 100px;
			}
			.W150{
				width: 250px;
			}
			.W200{
			width: 156px;
		}
			.W1000{
				width: 676px;
			}
			.W362{
				width: 362px;
			}
			.IZQ{
			float: left;
			overflow:hidden;
    		
			
		}
		.IZQ1{
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

	<body onload="imprimir();">
		<?php
			
			
			$peticionAjax=true;
			require_once "../controladores/guiaControlador.php";
			$insGuia= new guiaControlador();
			$data = $insGuia->exportar_planilla_guia_controlador($_POST['numeroplanilla'],"NO","NO");
			
		?>
		
	</body>
</html>