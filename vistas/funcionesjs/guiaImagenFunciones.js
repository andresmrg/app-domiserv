// JavaScript Document
function cargarimagen()
	{
		var cv = document.getElementById('lienzo');
		var ctx = cv.getContext('2d');
		var image = new Image();
		//var input = document.querySelector('input');
		var input = document.getElementById('imagenguia-up');
		var foto = {x: 0, y: 0, w: 700, h: 390};
		var isUp = null;
		var fotos = input.files;
		image.src = window.URL.createObjectURL(fotos[0]);
		image.onload = function(){
			var ancho = image.width;
			var alto = image.height;
			if(ancho > alto)
				{
					var A = 700;
					var H = 390;
					document.getElementById('lienzo').width = A;
					document.getElementById('lienzo').height = H;
				}
			else
				{
					var A = 390;
					var H = 700;
					document.getElementById('lienzo').width = A;
					document.getElementById('lienzo').height = H;
				}
			
			drawImage(image, A, H);
			
			var datosimagen = ctx.getImageData(0,0,A,H);
			var datos = datosimagen.data;
			for(var i = 0; i<datos.length; i+=4)
				{
					//var auxiliar = 0.34 * datos[i] + 0.5 * datos[i+1] + 0.16 * datos[i+2];
					var auxiliar = 0.34 * datos[i] + 0.01 * datos[i+1] + 0.64 * datos[i+2];
					
					datos[i] = auxiliar;
					datos[i+1] = auxiliar;
					datos[i+2] = auxiliar;
				}
			
			ctx.putImageData(datosimagen,0,0);
			
			
			
			var datosimg = cv.toDataURL();
			//document.getElementById('imgcanvas').value = datosimg;
			
			var idguia = $("#id-up").val();
			
			cargarimagenserver(idguia,datosimg,"Imagenguia");
			
		}
		//var respuesta = confirm(fotos +=". ¿Está seguro que desea continuar?.");
		
		function drawImage(image, w, h) {
			ctx.drawImage(image, foto.x, foto.y, w, h);
			ctx.fillStyle = 'black';
			ctx.beginPath();
			ctx.arc(foto.x, foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h / 2 + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w / 2 + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
		}
		window.onmousedown = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			console.log(ax, ay);
			if (ax >= foto.w - 5 + foto.x
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h / 2 + foto.y - 5
				&& ay <= foto.h / 2 + foto.y + 5
			) {
				isUp = 'right';
			}
			else if (ax >= foto.w / 2 + foto.x - 5
				&& ax <= foto.w / 2 + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom';
			}
			else if (ax >= foto.w + foto.x - 5
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom-right';
			}
			else if (ax >= foto.x - 5 && ax <= foto.x + 5
				&& ay >= foto.y - 5 && ay <= foto.y + 5
			) {
				isUp = 'top-left';
			}
		}
		window.onmousemove = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			if (isUp === 'right') {
				foto.w = ax - foto.x;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom') {
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom-right') {
				foto.w = ax - foto.x;
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'top-left') {
				var dx = foto.x - ax;
				var dy = foto.y - ay;
				foto.x = ax;
				foto.y = ay;
				foto.w += dx;
				foto.h += dy;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
		}
		window.onmouseup = function(evt) {
			isUp = null;
		}
		
		
		//var datosimg = cv.toDataURL();
		//var respuesta = confirm(datosimg +="");
		//document.getElementById('imgcanvas').src = datosimg;
		
	}
	function cargarimagen1()
	{
		var cv = document.getElementById('lienzo1');
		var ctx = cv.getContext('2d');
		var image = new Image();
		//var input = document.querySelector('input');
		var input = document.getElementById('imagenlugar-up');
		var foto = {x: 0, y: 0, w: 700, h: 390};
		var isUp = null;
		var fotos = input.files;
		image.src = window.URL.createObjectURL(fotos[0]);
		image.onload = function(){
			var ancho = image.width;
			var alto = image.height;
			if(ancho > alto)
				{
					var A = 700;
					var H = 390;
					document.getElementById('lienzo1').width = A;
					document.getElementById('lienzo1').height = H;
				}
			else
				{
					var A = 390;
					var H = 700;
					document.getElementById('lienzo1').width = A;
					document.getElementById('lienzo1').height = H;
				}
			
			drawImage(image, A, H);
			
			var datosimagen = ctx.getImageData(0,0,A,H);
			var datos = datosimagen.data;
			for(var i = 0; i<datos.length; i+=4)
				{
					var auxiliar = 0.34 * datos[i] + 0.5 * datos[i+1] + 0.16 * datos[i+2];
					
					datos[i] = auxiliar;
					datos[i+1] = auxiliar;
					datos[i+2] = auxiliar;
				}
			ctx.putImageData(datosimagen,0,0);
			
			var datosimg = cv.toDataURL();
			//document.getElementById('imgcanvas1').value = datosimg;
			
			var idguia = $("#id-up").val();
			
			cargarimagenserver(idguia,datosimg,"Imagenlugar");
		
		}
		//var respuesta = confirm(fotos +=". ¿Está seguro que desea continuar?.");
		
		function drawImage(image, w, h) {
			ctx.drawImage(image, foto.x, foto.y, w, h);
			ctx.fillStyle = 'black';
			ctx.beginPath();
			ctx.arc(foto.x, foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h / 2 + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w / 2 + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
		}
		window.onmousedown = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			console.log(ax, ay);
			if (ax >= foto.w - 5 + foto.x
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h / 2 + foto.y - 5
				&& ay <= foto.h / 2 + foto.y + 5
			) {
				isUp = 'right';
			}
			else if (ax >= foto.w / 2 + foto.x - 5
				&& ax <= foto.w / 2 + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom';
			}
			else if (ax >= foto.w + foto.x - 5
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom-right';
			}
			else if (ax >= foto.x - 5 && ax <= foto.x + 5
				&& ay >= foto.y - 5 && ay <= foto.y + 5
			) {
				isUp = 'top-left';
			}
		}
		window.onmousemove = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			if (isUp === 'right') {
				foto.w = ax - foto.x;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom') {
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom-right') {
				foto.w = ax - foto.x;
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'top-left') {
				var dx = foto.x - ax;
				var dy = foto.y - ay;
				foto.x = ax;
				foto.y = ay;
				foto.w += dx;
				foto.h += dy;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
		}
		window.onmouseup = function(evt) {
			isUp = null;
		}
		
		
		//var datosimg = cv.toDataURL();
		//var respuesta = confirm(datosimg +="");
		//document.getElementById('imgcanvas').src = datosimg;
		
	}
	function cargarimagen2()
	{
		var cv = document.getElementById('lienzo2');
		var ctx = cv.getContext('2d');
		var image = new Image();
		//var input = document.querySelector('input');
		var input = document.getElementById('imagencataporte-up');
		var foto = {x: 0, y: 0, w: 700, h: 390};
		var isUp = null;
		var fotos = input.files;
		image.src = window.URL.createObjectURL(fotos[0]);
		image.onload = function(){
			var ancho = image.width;
			var alto = image.height;
			if(ancho > alto)
				{
					var A = 700;
					var H = 390;
					document.getElementById('lienzo2').width = A;
					document.getElementById('lienzo2').height = H;
				}
			else
				{
					var A = 390;
					var H = 700;
					document.getElementById('lienzo2').width = A;
					document.getElementById('lienzo2').height = H;
				}
			
			drawImage(image, A, H);
			
			var datosimagen = ctx.getImageData(0,0,A,H);
			var datos = datosimagen.data;
			for(var i = 0; i<datos.length; i+=4)
				{
					var auxiliar = 0.34 * datos[i] + 0.5 * datos[i+1] + 0.16 * datos[i+2];
					
					datos[i] = auxiliar;
					datos[i+1] = auxiliar;
					datos[i+2] = auxiliar;
				}
			ctx.putImageData(datosimagen,0,0);
			
			var datosimg = cv.toDataURL();
			//document.getElementById('imgcanvas2').value = datosimg;
			
			var idguia = $("#id-up").val();
			
			cargarimagenserver(idguia,datosimg,"Imagencataporte");
		
		}
		//var respuesta = confirm(fotos +=". ¿Está seguro que desea continuar?.");
		
		function drawImage(image, w, h) {
			ctx.drawImage(image, foto.x, foto.y, w, h);
			ctx.fillStyle = 'black';
			ctx.beginPath();
			ctx.arc(foto.x, foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h / 2 + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w / 2 + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
		}
		window.onmousedown = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			console.log(ax, ay);
			if (ax >= foto.w - 5 + foto.x
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h / 2 + foto.y - 5
				&& ay <= foto.h / 2 + foto.y + 5
			) {
				isUp = 'right';
			}
			else if (ax >= foto.w / 2 + foto.x - 5
				&& ax <= foto.w / 2 + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom';
			}
			else if (ax >= foto.w + foto.x - 5
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom-right';
			}
			else if (ax >= foto.x - 5 && ax <= foto.x + 5
				&& ay >= foto.y - 5 && ay <= foto.y + 5
			) {
				isUp = 'top-left';
			}
		}
		window.onmousemove = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			if (isUp === 'right') {
				foto.w = ax - foto.x;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom') {
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom-right') {
				foto.w = ax - foto.x;
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'top-left') {
				var dx = foto.x - ax;
				var dy = foto.y - ay;
				foto.x = ax;
				foto.y = ay;
				foto.w += dx;
				foto.h += dy;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
		}
		window.onmouseup = function(evt) {
			isUp = null;
		}
		
		
		//var datosimg = cv.toDataURL();
		//var respuesta = confirm(datosimg +="");
		//document.getElementById('imgcanvas').src = datosimg;
		
	}

// proceso de imagen administrador
function cargarimagenadmin()
	{
		var cv = document.getElementById('lienzoadmin');
		var ctx = cv.getContext('2d');
		var image = new Image();
		//var input = document.querySelector('input');
		var input = document.getElementById('imagenguiaadmin-up');
		var foto = {x: 0, y: 0, w: 700, h: 390};
		var isUp = null;
		var fotos = input.files;
		image.src = window.URL.createObjectURL(fotos[0]);
		image.onload = function(){
			var ancho = image.width;
			var alto = image.height;
			if(ancho > alto)
				{
					var A = 700;
					var H = 390;
					document.getElementById('lienzoadmin').width = A;
					document.getElementById('lienzoadmin').height = H;
				}
			else
				{
					var A = 390;
					var H = 700;
					document.getElementById('lienzoadmin').width = A;
					document.getElementById('lienzoadmin').height = H;
				}
			
			drawImage(image, A, H);
			
			var datosimagen = ctx.getImageData(0,0,A,H);
			var datos = datosimagen.data;
			for(var i = 0; i<datos.length; i+=4)
				{
					//var auxiliar = 0.34 * datos[i] + 0.5 * datos[i+1] + 0.16 * datos[i+2];
					var auxiliar = 0.34 * datos[i] + 0.01 * datos[i+1] + 0.64 * datos[i+2];
					
					datos[i] = auxiliar;
					datos[i+1] = auxiliar;
					datos[i+2] = auxiliar;
				}
			
			ctx.putImageData(datosimagen,0,0);
			
			
			
			var datosimg = cv.toDataURL();
			//document.getElementById('imgcanvasadmin').value = datosimg;
			
			var idguia = $("#idguiaadmin-up").val();
			
			cargarimagenserver(idguia,datosimg,"Imagenguia");
			
			
			
			
			
		}
		//var respuesta = confirm(fotos +=". ¿Está seguro que desea continuar?.");
		
		function drawImage(image, w, h) {
			ctx.drawImage(image, foto.x, foto.y, w, h);
			ctx.fillStyle = 'black';
			ctx.beginPath();
			ctx.arc(foto.x, foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h / 2 + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w / 2 + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
		}
		window.onmousedown = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			console.log(ax, ay);
			if (ax >= foto.w - 5 + foto.x
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h / 2 + foto.y - 5
				&& ay <= foto.h / 2 + foto.y + 5
			) {
				isUp = 'right';
			}
			else if (ax >= foto.w / 2 + foto.x - 5
				&& ax <= foto.w / 2 + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom';
			}
			else if (ax >= foto.w + foto.x - 5
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom-right';
			}
			else if (ax >= foto.x - 5 && ax <= foto.x + 5
				&& ay >= foto.y - 5 && ay <= foto.y + 5
			) {
				isUp = 'top-left';
			}
		}
		window.onmousemove = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			if (isUp === 'right') {
				foto.w = ax - foto.x;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom') {
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom-right') {
				foto.w = ax - foto.x;
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'top-left') {
				var dx = foto.x - ax;
				var dy = foto.y - ay;
				foto.x = ax;
				foto.y = ay;
				foto.w += dx;
				foto.h += dy;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
		}
		window.onmouseup = function(evt) {
			isUp = null;
		}
		
		
		//var datosimg = cv.toDataURL();
		//var respuesta = confirm(datosimg +="");
		//document.getElementById('imgcanvas').src = datosimg;
		
	}
	function cargarimagen1admin()
	{
		var cv = document.getElementById('lienzo1admin');
		var ctx = cv.getContext('2d');
		var image = new Image();
		//var input = document.querySelector('input');
		var input = document.getElementById('imagenlugaradmin-up');
		var foto = {x: 0, y: 0, w: 700, h: 390};
		var isUp = null;
		var fotos = input.files;
		image.src = window.URL.createObjectURL(fotos[0]);
		image.onload = function(){
			var ancho = image.width;
			var alto = image.height;
			if(ancho > alto)
				{
					var A = 700;
					var H = 390;
					document.getElementById('lienzo1admin').width = A;
					document.getElementById('lienzo1admin').height = H;
				}
			else
				{
					var A = 390;
					var H = 700;
					document.getElementById('lienzo1admin').width = A;
					document.getElementById('lienzo1admin').height = H;
				}
			
			drawImage(image, A, H);
			
			var datosimagen = ctx.getImageData(0,0,A,H);
			var datos = datosimagen.data;
			for(var i = 0; i<datos.length; i+=4)
				{
					var auxiliar = 0.34 * datos[i] + 0.5 * datos[i+1] + 0.16 * datos[i+2];
					
					datos[i] = auxiliar;
					datos[i+1] = auxiliar;
					datos[i+2] = auxiliar;
				}
			ctx.putImageData(datosimagen,0,0);
			
			var datosimg = cv.toDataURL();
			//document.getElementById('imgcanvas1admin').value = datosimg;
			
			var idguia = $("#idguiaadmin-up").val();
			
			cargarimagenserver(idguia,datosimg,"Imagenlugar");
		
		}
		//var respuesta = confirm(fotos +=". ¿Está seguro que desea continuar?.");
		
		function drawImage(image, w, h) {
			ctx.drawImage(image, foto.x, foto.y, w, h);
			ctx.fillStyle = 'black';
			ctx.beginPath();
			ctx.arc(foto.x, foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h / 2 + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w / 2 + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
		}
		window.onmousedown = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			console.log(ax, ay);
			if (ax >= foto.w - 5 + foto.x
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h / 2 + foto.y - 5
				&& ay <= foto.h / 2 + foto.y + 5
			) {
				isUp = 'right';
			}
			else if (ax >= foto.w / 2 + foto.x - 5
				&& ax <= foto.w / 2 + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom';
			}
			else if (ax >= foto.w + foto.x - 5
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom-right';
			}
			else if (ax >= foto.x - 5 && ax <= foto.x + 5
				&& ay >= foto.y - 5 && ay <= foto.y + 5
			) {
				isUp = 'top-left';
			}
		}
		window.onmousemove = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			if (isUp === 'right') {
				foto.w = ax - foto.x;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom') {
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom-right') {
				foto.w = ax - foto.x;
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'top-left') {
				var dx = foto.x - ax;
				var dy = foto.y - ay;
				foto.x = ax;
				foto.y = ay;
				foto.w += dx;
				foto.h += dy;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
		}
		window.onmouseup = function(evt) {
			isUp = null;
		}
		
		
		//var datosimg = cv.toDataURL();
		//var respuesta = confirm(datosimg +="");
		//document.getElementById('imgcanvas').src = datosimg;
		
	}
	function cargarimagen2admin()
	{
		var cv = document.getElementById('lienzo2admin');
		var ctx = cv.getContext('2d');
		var image = new Image();
		//var input = document.querySelector('input');
		var input = document.getElementById('imagencataporteadmin-up');
		var foto = {x: 0, y: 0, w: 700, h: 390};
		var isUp = null;
		var fotos = input.files;
		image.src = window.URL.createObjectURL(fotos[0]);
		image.onload = function(){
			var ancho = image.width;
			var alto = image.height;
			if(ancho > alto)
				{
					var A = 700;
					var H = 390;
					document.getElementById('lienzo2admin').width = A;
					document.getElementById('lienzo2admin').height = H;
				}
			else
				{
					var A = 390;
					var H = 700;
					document.getElementById('lienzo2admin').width = A;
					document.getElementById('lienzo2admin').height = H;
				}
			
			drawImage(image, A, H);
			
			var datosimagen = ctx.getImageData(0,0,A,H);
			var datos = datosimagen.data;
			for(var i = 0; i<datos.length; i+=4)
				{
					var auxiliar = 0.34 * datos[i] + 0.5 * datos[i+1] + 0.16 * datos[i+2];
					
					datos[i] = auxiliar;
					datos[i+1] = auxiliar;
					datos[i+2] = auxiliar;
				}
			ctx.putImageData(datosimagen,0,0);
			
			var datosimg = cv.toDataURL();
			//document.getElementById('imgcanvas2admin').value = datosimg;
			
			var idguia = $("#idguiaadmin-up").val();
			
			cargarimagenserver(idguia,datosimg,"Imagencataporte");
			
		}
		//var respuesta = confirm(fotos +=". ¿Está seguro que desea continuar?.");
		
		function drawImage(image, w, h) {
			ctx.drawImage(image, foto.x, foto.y, w, h);
			ctx.fillStyle = 'black';
			ctx.beginPath();
			ctx.arc(foto.x, foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h / 2 + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w / 2 + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
			ctx.beginPath();
			ctx.arc(w + foto.x, h + foto.y, 1, 0, Math.PI * 2, 1);
			ctx.fill();
		}
		window.onmousedown = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			console.log(ax, ay);
			if (ax >= foto.w - 5 + foto.x
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h / 2 + foto.y - 5
				&& ay <= foto.h / 2 + foto.y + 5
			) {
				isUp = 'right';
			}
			else if (ax >= foto.w / 2 + foto.x - 5
				&& ax <= foto.w / 2 + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom';
			}
			else if (ax >= foto.w + foto.x - 5
				&& ax <= foto.w + foto.x + 5
				&& ay >= foto.h + foto.y - 5
				&& ay <= foto.h + foto.y + 5
			) {
				isUp = 'bottom-right';
			}
			else if (ax >= foto.x - 5 && ax <= foto.x + 5
				&& ay >= foto.y - 5 && ay <= foto.y + 5
			) {
				isUp = 'top-left';
			}
		}
		window.onmousemove = function(evt) {
			var ax = evt.clientX - cv.offsetLeft;
			var ay = evt.clientY - cv.offsetTop;
			if (isUp === 'right') {
				foto.w = ax - foto.x;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom') {
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'bottom-right') {
				foto.w = ax - foto.x;
				foto.h = ay - foto.y;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
			else if (isUp === 'top-left') {
				var dx = foto.x - ax;
				var dy = foto.y - ay;
				foto.x = ax;
				foto.y = ay;
				foto.w += dx;
				foto.h += dy;
				ctx.clearRect(0, 0, 900, 600);
				drawImage(image, foto.w, foto.h);
			}
		}
		window.onmouseup = function(evt) {
			isUp = null;
		}
		
		
		//var datosimg = cv.toDataURL();
		//var respuesta = confirm(datosimg +="");
		//document.getElementById('imgcanvas').src = datosimg;
		
	}


//CARGAR IMAGEN
function cargarimagenserver(idguia,img,Timg){
	var action = 'cargarIMG';
	
	//$("#listaguias").html('');

		$.ajax({
			url: '../ajax/guiaAjax.php',
			type: 'POST',
			async: true,
			data: {action:action,idguia:idguia,img:img,Timg:Timg},

			success: function(response)
			{	
				
				if(response !== "error")
				{
					//console.log(response);
					if(Timg == "Imagenguia"){
						$("#imgcanvas").val("OK");
						$("#imagenguia-up").val("");
						$("#imgalert").val("Imagen cargada");
						
						$("#imgcanvasadmin").val("OK");
						$("#imagenguiaadmin-up").val("");
						$("#adminimgalert").val("Imagen cargada");
						
					}
					
					if(Timg == "Imagenlugar"){
					    $("#imgcanvas1").val("OK");
						$("#imagenlugar-up").val("");
						$("#lugarlert").val("Imagen cargada");
						
						$("#imgcanvas1admin").val("OK");
						$("#imagenlugaradmin-up").val("");
						$("#adminlugarlert").val("Imagen cargada");
					}
					
					if(Timg == "Imagencataporte"){
						$("#imgcanvas2").val("OK");
						$("#imagencataporte-up").val("");
						$("#cataportealert").val("Imagen cargada");
						
						
						$("#imgcanvas2admin").val("OK");
						$("#imagencataporteadmin-up").val("");
						$("#admincataportealert").val("Imagen cargada");
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