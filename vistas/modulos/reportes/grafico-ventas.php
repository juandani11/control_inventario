<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

	#Capturamos sólo el año y el mes
	$fecha = substr($value["fecha"],0,7);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["total"]);

	#Sumamos los pagos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {
		
		$sumaPagosMes[$key] += $value;
	}

}


$noRepetirFechas = array_unique($arrayFechas);


?>

<!--=====================================
GRÁFICO DE VENTAS
======================================-->

<div class="card bg-gradient-info">
    <div class="card-header border-0">
        <h3 class="card-title">
            <i class="fas fa-th mr-1"></i>
            Gráfico de Ventas
        </h3>
    </div>
    <div class="card-body">
        <canvas class="chart" id="line-chart-ventas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>

</div>
<!-- /.card -->
<script>

 // Sales graph chart
 var salesGraphChartCanvas = $('#line-chart-ventas').get(0).getContext('2d')
 // $('#revenue-chart').get(0).getContext('2d');



 var salesGraphChartData = {
     labels: [<?php

         if($noRepetirFechas != null){

             foreach($noRepetirFechas as $key){

                 echo "'".$key."',";


             }

             echo "'".$key."'";

         }else{

             echo "'0'";

         }

         ?>],
     datasets: [
         {
             label: [<?php

                 if($noRepetirFechas != null){

                     foreach($noRepetirFechas as $key){

                         echo "'".$key."',";


                     }

                     echo "'".$key."'";

                 }else{

                     echo "'0'";

                 }

                 ?>],
             fill: false,
             borderWidth: 2,
             lineTension: 0,
             spanGaps: true,
             borderColor: '#efefef',
             pointRadius: 3,
             pointHoverRadius: 7,
             pointColor: '#efefef',
             pointBackgroundColor: '#efefef',
             data: [<?php

                 if($noRepetirFechas != null){

                     foreach($noRepetirFechas as $key){

                         echo "".$sumaPagosMes[$key].",";


                     }

                     echo "".$sumaPagosMes[$key]."";

                 }else{

                     echo "'0'";

                 }

                 ?>]
         }
     ]
 }

 var salesGraphChartOptions = {
     maintainAspectRatio: false,
     responsive: true,
     legend: {
         display: false
     },
     scales: {
         xAxes: [{
             ticks: {
                 fontColor: '#efefef'
             },
             gridLines: {
                 display: false,
                 color: '#efefef',
                 drawBorder: false
             }
         }],
         yAxes: [{
             ticks: {
                 stepSize: 5000,
                 fontColor: '#efefef'
             },
             gridLines: {
                 display: true,
                 color: '#efefef',
                 drawBorder: false
             }
         }]
     }
 }

 // This will get the first returned node in the jQuery collection.
 // eslint-disable-next-line no-unused-vars
 var salesGraphChart = new Chart(salesGraphChartCanvas, {
     type: 'line',
     data: salesGraphChartData,
     options: salesGraphChartOptions
 });

 /* jQueryKnob */
 $('.knob').knob()
</script>