<?php include_once("header.php");?>
<h1 class="text-center">Detalles de ventas</h1>
<div class="card p-4 bg-light">
    <table class="table table-striped" width="100%">
        <thead>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Descuento</th>
            <th>Envío</th>
            <th>Total</th>
        </thead>
        <tbody>
            <?php
                $tot=0;
                $des=0;
                $env=0;
                $cant = 0;
                for($i=0; $i<count($datos['data']); $i++) {
                    $total = $datos["data"][$i]["precio"] * $datos["data"][$i]["cantidad"] + $datos["data"][$i]["descuento"] - $datos["data"][$i]["envio"];
                    print "<tr>";
                    print "<td>".$datos["data"][$i]["nombre"]."</td>";
                    print "<td>".$datos["data"][$i]["fecha"]."</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["precio"],2)." €</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["cantidad"],2)." €</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["descuento"],2)." €</td>";
                    print "<td class='text-start'>".number_format($datos["data"][$i]["envio"],2)." €</td>";
                    print "<td class='text-start'>".number_format($total,2)." €</td>";
                    print "</tr>";

                    $tot += $total;
                    $des += $datos["data"][$i]["descuento"];
                    $env += $datos["data"][$i]["envio"];
                    $cant += $datos["data"][$i]["cantidad"];
    
                }

                print "<tr>";
                print "<td></td>";
                print "<td>Total de ventas:</td>";
                print "<td></td>";
                print "<td class='text-start'>".number_format($cant,2)." €</td>";
                print "<td class='text-start'>".number_format($des,2)." €</td>";
                print "<td class='text-start'>".number_format($env,2)." €</td>";
                print "<td class='text-start'>".number_format($tot,2)." €</td>";
                print "</tr>";

            ?>
        </tbody>
    </table>
    <a href="<?php print RUTAAPP; ?>carrito/ventas" class="btn btn-success">Volver</a>
</div>
