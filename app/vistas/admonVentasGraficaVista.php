<?php include_once("header.php");?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><!--llamada a api para acceder a las graficas de google charts -->

<script>
    google.charts.load('current', {'packages':['bar']});

    //llamamos al objeto
    google.charts.setOnLoadCallback(grafica);

    function grafica() {
        //llenamos la grafica
        var data = google.visualization.arrayToDataTable([
            ["Fecha", "Ventas"],
            <?php
                $n = count($datos["data"]);
                for ($i=0; $i<$n; $i++) {
                    print "['".substr($datos["data"][$i]["fecha"],0,10)."', ";
                    print $datos["data"][$i]["venta"]."]";
                    if ($i<$n) {
                        print ",";
                    }
                }
            ?>
        ]);
        let opciones = {
            chart: {
                title: "Ventas por día",
            },
            colors: ["blue"],
            fontSize: 25,
            fontName: "Times",
            bars: "horizontal",
            height: 600,
            hAxis: {
                title: "Ventas Euros",
                titleTexStyle: { color: 'black', fontSize: 30},
                textPosition: "out",
                textStyle: {color: "black", fontSize:20, bold: true, italic:true}
            },
            vAxis: {
                title: "Fecha",
                titleTexStyle: { color: 'black', fontSize: 30},
                textPosition: "out",
                textStyle: {color: "black", fontSize:20, bold: true, italic:true},
                gridlines: {color: "black"}
            },
            legend: {position: "none"},
            titleTextStyle: {color: "gray", fontSize: 40, italic: true}

        }
        
        var chart = new google.charts.Bar(document.getElementById("grafica"));
        chart.draw(data, google.charts.Bar.convertOptions(opciones));
    }
</script>
<div id="grafica"></div>
