$(document).ready(function(){ 
	
	grafica_entrega();
	grafica_ingcost();
	grafica_entregaagente();
	
}); // final de ready



function grafica_entrega(){
	
	
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("chartentegas", am4charts.XYChart);

	var action = "grafica";

	var mesdesde = "202001";
	var meshasta = "202012";

	$.ajax({
		url: '../ajax/guiaAjax.php',
		type: 'POST',
		async: true,
		data: {action:action,mesdesde:mesdesde,meshasta:meshasta},

		success: function(response)
		{	
			if(response != "error")
			{

				var info = JSON.parse(response);

				chart.data = info;

			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});	


	// Create category axis
	var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "mes";
	categoryAxis.renderer.opposite = true;

	// Create value axis
	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.renderer.inversed = false;
	valueAxis.title.text = "Cantidad";
	valueAxis.renderer.minLabelPosition = 0.01;

	// Create series
	var series1 = chart.series.push(new am4charts.LineSeries());
	series1.dataFields.valueY = "recogida";
	series1.dataFields.categoryX = "mes";
	series1.name = "Recogidas";
	series1.bullets.push(new am4charts.CircleBullet());
	series1.tooltipText = "{name} en {categoryX}: {valueY}";
	series1.legendSettings.valueText = "{valueY}";
	series1.visible  = false;

	var series2 = chart.series.push(new am4charts.LineSeries());
	series2.dataFields.valueY = "entrega";
	series2.dataFields.categoryX = "mes";
	series2.name = 'Entregas';
	series2.bullets.push(new am4charts.CircleBullet());
	series2.tooltipText = "{name} en {categoryX}: {valueY}";
	series2.legendSettings.valueText = "{valueY}";

	var series3 = chart.series.push(new am4charts.LineSeries());
	series3.dataFields.valueY = "diferencia";
	series3.dataFields.categoryX = "mes";
	series3.name = 'Diferencia';
	series3.bullets.push(new am4charts.CircleBullet());
	series3.tooltipText = "{name} en {categoryX}: {valueY}";
	series3.legendSettings.valueText = "{valueY}";


	// Add chart cursor
	chart.cursor = new am4charts.XYCursor();
	chart.cursor.behavior = "zoomY";

	let hs1 = series1.segments.template.states.create("hover")
	hs1.properties.strokeWidth = 5;
	series1.segments.template.strokeWidth = 1;

	let hs2 = series2.segments.template.states.create("hover")
	hs2.properties.strokeWidth = 5;
	series2.segments.template.strokeWidth = 1;

	let hs3 = series3.segments.template.states.create("hover")
	hs3.properties.strokeWidth = 5;
	series3.segments.template.strokeWidth = 1;



	// Add legend
	chart.legend = new am4charts.Legend();
	chart.legend.itemContainers.template.events.on("over", function(event){
	  var segments = event.target.dataItem.dataContext.segments;
	  segments.each(function(segment){
		segment.isHover = true;
	  })
	})

	chart.legend.itemContainers.template.events.on("out", function(event){
	  var segments = event.target.dataItem.dataContext.segments;
	  segments.each(function(segment){
		segment.isHover = false;
	  })
	})
}


function grafica_ingcost(){
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("charingrecost", am4charts.XYChart);

	var action = "ingrecost";

	var mesdesde = "202001";
	var meshasta = "202012";

	$.ajax({
		url: '../ajax/guiaAjax.php',
		type: 'POST',
		async: true,
		data: {action:action,mesdesde:mesdesde,meshasta:meshasta},

		success: function(response)
		{	
			if(response != "error")
			{

				var info = JSON.parse(response);

				chart.data = info;

			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});	
	
	
	// Create category axis
	var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "mes";
	categoryAxis.renderer.opposite = true;

	// Create value axis
	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.renderer.inversed = false;
	valueAxis.title.text = "valor en pesos";
	valueAxis.renderer.minLabelPosition = 0.01;

	// Create series
	var series1 = chart.series.push(new am4charts.LineSeries());
	series1.dataFields.valueY = "ingreso";
	series1.dataFields.categoryX = "mes";
	series1.name = "Ingresos";
	series1.bullets.push(new am4charts.CircleBullet());
	series1.tooltipText = "{name} en {categoryX}: {valueY}";
	series1.legendSettings.valueText = "{valueY}";
	series1.visible  = false;

	var series2 = chart.series.push(new am4charts.LineSeries());
	series2.dataFields.valueY = "costo";
	series2.dataFields.categoryX = "mes";
	series2.name = 'Costos';
	series2.bullets.push(new am4charts.CircleBullet());
	series2.tooltipText = "{name} en {categoryX}: {valueY}";
	series2.legendSettings.valueText = "{valueY}";

	var series3 = chart.series.push(new am4charts.LineSeries());
	series3.dataFields.valueY = "utilidad";
	series3.dataFields.categoryX = "mes";
	series3.name = 'Utilidad';
	series3.bullets.push(new am4charts.CircleBullet());
	series3.tooltipText = "{name} en {categoryX}: {valueY}";
	series3.legendSettings.valueText = "{valueY}";


	// Add chart cursor
	chart.cursor = new am4charts.XYCursor();
	chart.cursor.behavior = "zoomY";

	let hs1 = series1.segments.template.states.create("hover")
	hs1.properties.strokeWidth = 5;
	series1.segments.template.strokeWidth = 1;

	let hs2 = series2.segments.template.states.create("hover")
	hs2.properties.strokeWidth = 5;
	series2.segments.template.strokeWidth = 1;

	let hs3 = series3.segments.template.states.create("hover")
	hs3.properties.strokeWidth = 5;
	series3.segments.template.strokeWidth = 1;



	// Add legend
	chart.legend = new am4charts.Legend();
	chart.legend.itemContainers.template.events.on("over", function(event){
	  var segments = event.target.dataItem.dataContext.segments;
	  segments.each(function(segment){
		segment.isHover = true;
	  })
	})

	chart.legend.itemContainers.template.events.on("out", function(event){
	  var segments = event.target.dataItem.dataContext.segments;
	  segments.each(function(segment){
		segment.isHover = false;
	  })
	})
}

function grafica_entregaagente(){
	
	
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("chartentegasagente", am4charts.XYChart);

	var action = "entregasagente";

	var fechadesde = "2020/07/01";
	var fechahasta = "2020/07/31";

	$.ajax({
		url: '../ajax/guiaAjax.php',
		type: 'POST',
		async: true,
		data: {action:action,fechadesde:fechadesde,fechahasta:fechahasta},

		success: function(response)
		{	
			if(response != "error")
			{

				var info = JSON.parse(response);

				chart.data = info;

			}else
			{
				console.log('no data');
			}
		},

		error: function(error){

		}
	});	


	// Create category axis
	var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "dia";
	categoryAxis.renderer.opposite = true;

	// Create value axis
	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.renderer.inversed = false;
	valueAxis.title.text = "Cantidad";
	valueAxis.renderer.minLabelPosition = 0.01;

	// Create series
	var series1 = chart.series.push(new am4charts.LineSeries());
	series1.dataFields.valueY = "entregas";
	series1.dataFields.categoryX = "dia";
	series1.name = "Entregas";
	series1.bullets.push(new am4charts.CircleBullet());
	series1.tooltipText = "{name} en {categoryX}: {valueY}";
	series1.legendSettings.valueText = "{valueY}";
	series1.visible  = false;

	var series2 = chart.series.push(new am4charts.LineSeries());
	series2.dataFields.valueY = "min";
	series2.dataFields.categoryX = "dia";
	series2.name = 'Minimo';
	series2.bullets.push(new am4charts.CircleBullet());
	series2.tooltipText = "{name} en {categoryX}: {valueY}";
	series2.legendSettings.valueText = "{valueY}";

	var series3 = chart.series.push(new am4charts.LineSeries());
	series3.dataFields.valueY = "promedio";
	series3.dataFields.categoryX = "dia";
	series3.name = 'Promedio';
	series3.bullets.push(new am4charts.CircleBullet());
	series3.tooltipText = "{name} en {categoryX}: {valueY}";
	series3.legendSettings.valueText = "{valueY}";
	
	var series4 = chart.series.push(new am4charts.LineSeries());
	series4.dataFields.valueY = "max";
	series4.dataFields.categoryX = "dia";
	series4.name = 'Superior';
	series4.bullets.push(new am4charts.CircleBullet());
	series4.tooltipText = "{name} en {categoryX}: {valueY}";
	series4.legendSettings.valueText = "{valueY}";

	// Add chart cursor
	chart.cursor = new am4charts.XYCursor();
	chart.cursor.behavior = "zoomY";

	let hs1 = series1.segments.template.states.create("hover")
	hs1.properties.strokeWidth = 5;
	series1.segments.template.strokeWidth = 1;

	let hs2 = series2.segments.template.states.create("hover")
	hs2.properties.strokeWidth = 5;
	series2.segments.template.strokeWidth = 1;

	let hs3 = series3.segments.template.states.create("hover")
	hs3.properties.strokeWidth = 5;
	series3.segments.template.strokeWidth = 1;

	let hs4 = series4.segments.template.states.create("hover")
	hs4.properties.strokeWidth = 5;
	series4.segments.template.strokeWidth = 1;


	// Add legend
	chart.legend = new am4charts.Legend();
	chart.legend.itemContainers.template.events.on("over", function(event){
	  var segments = event.target.dataItem.dataContext.segments;
	  segments.each(function(segment){
		segment.isHover = true;
	  })
	})

	chart.legend.itemContainers.template.events.on("out", function(event){
	  var segments = event.target.dataItem.dataContext.segments;
	  segments.each(function(segment){
		segment.isHover = false;
	  })
	})
}



