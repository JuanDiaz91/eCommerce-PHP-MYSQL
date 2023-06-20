<?php include_once("header.php");?>
<h1 class="text-center">Ventas por día</h1>
<div class="card p-4 bg-light">
    <table class="table table-striped" width="100%">
        <thead>
            <th>ID</th>
            <th>Fecha</th>
            <th>Coste</th>
            <th>Descuento</th>
            <th>Envío</th>
            <th>Total</th>
        </thead>
        <tbody>
            <?php
                $tot=0;
                $des=0;
                $env=0;
                $cost = 0;
                for($i=0; $i<count($datos['data']); $i++) {
                    $total = $datos["data"][$i]["costo"] - $datos["data"][$i]["descuento"] + $datos["data"][$i]["envio"];
                    print "<tr>";
                    print "<td>".$datos["data"][$i]["idUsuario"]."</td>";
                    print "<td>".$datos["data"][$i]["fecha"]."</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["costo"],2)." €</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["descuento"],2)." €</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["envio"],2)." €</td>";
                    print "<td class='text-start'>".number_format($total,2)." €</td>";
                    print "<td><a href='".RUTAAPP."carrito/detalles/".substr($datos["data"][$i]["fecha"],0,10)."/".$datos["data"][$i]["idUsuario"]."' class='btn btn-primary'>Detalles</a></td>";
                    print "</tr>";

                    $tot += $total;
                    $des += $datos["data"][$i]["descuento"];
                    $env += $datos["data"][$i]["envio"];
                    $cost += $datos["data"][$i]["costo"];
    
                }

                print "<tr>";
                print "<td></td>";
                print "<td>Total de ventas:</td>";
                print "<td class='text-start'>".number_format($cost,2)." €</td>";
                print "<td class='text-start'>".number_format($des,2)." €</td>";
                print "<td class='text-start'>".number_format($env,2)." €</td>";
                print "<td class='text-start'>".number_format($tot,2)." €</td>";
                print "<td></td>";
                print "</tr>";

            ?>
        </tbody>
    </table>
    <a href="<?php print RUTAAPP; ?>carrito/grafica" class="btn btn-success">Gráfica de ventas</a>
</div>
