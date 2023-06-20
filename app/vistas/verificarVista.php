<?php include_once("header.php"); ?>
<div class="card" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Iniciar sesión</a></li>
            <li class="breadcrumb-item"><a href="#">Datos de envío</a></li>
            <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
            <li class="breadcrumb-item">Verificar datos</li>
        </ol>
    </nav>
    <h2>Verificar datos</h2>
    <?php
    $verifica = false;
    $subtotal = 0;
    $envio1 = 0;
    $descuento1 = 0;
    
    print "Método de pago: ".$datos["pago"]. "<br>";
    print "Nombre: ".$datos["data"]["nombre"]. " ".$datos["data"]["primerApellido"]." ".$datos["data"]["segundoApellido"]. "<br>";
    print "Direccion: ".$datos["data"]["direccion"]. "<br>";
    print "Ciudad: ".$datos["data"]["ciudad"]. "<br>";
    print "Código postal: ".$datos["data"]["codpos"]. "<br>";
    print "Provincia: ".$datos["data"]["provincia"]. "<br>";
    print "País: ".$datos["data"]["pais"]. "<br>";

    //carrito
    print "<table class='table table-strped' width='100%'>";
    print "<tr>";
    print "<th width='12%'>Producto</th>";
    print "<th width='58%'>Descripción</th>";
    print "<th width='1.8%'>Cant.</th>";
    print "<th width='10.12%'>Precio</th>";
    print "<th width='10.12%'>Subtotal</th>";
    print "<th width='1%'>&nbsp;</th>";
    print "</tr>";
    for ($i=0; $i<count($datos["carrito"]); $i++) {

        $descuento = "<b>".$datos["carrito"][$i]["nombre"]."</b>";
        $descripcion = substr(html_entity_decode($datos["carrito"][$i]["descripcion"]),0,200);
        $nombre = $datos["carrito"][$i]["nombre"];
        $numero = $datos["carrito"][$i]["productos"];
        $cantidad = $datos["carrito"][$i]["cantidad"];
        $precio = $datos["carrito"][$i]["precio"];
        $imagen = $datos["carrito"][$i]["imagen"];
        $descuento = $datos["carrito"][$i]["descuento"];
        $envio = $datos["carrito"][$i]["envio"];
        $total = $cantidad * $precio;

        print "<tr>";
        print "<td><img src='".RUTAAPP."img/".$imagen."' width='105' alt'".$nombre."'></td>";
        print "<td>".$descripcion."...</td>";
        print "<td class='text-end'>";
        print number_format($cantidad,0);
        print "</td>";
        print "<td class='text-end'>€".number_format($precio,2)."</td>";
        print "<td class='text-end'>€".number_format($total,2)."</td>";
        print "<td>&nbsp;</td>";
        print "</tr>";

        $subtotal += $total;
        $descuento1 += $descuento;
        $envio1 += $envio;
    }
    $total = $subtotal + $envio1 - $descuento1;
    print "</table>";
    print "<hr>";

    print "<table width='100%' class='text-end'>";
    print "<tr>";
    print "<td width='79.85%'></td>";
    print "<td width='11.55%'>Subtotal</td>";
    print "<td width='9.20%'>".number_format($subtotal,2)." €</td>";
    print "</tr>";

    print "<tr>";
    print "<td width='79.85%'></td>";
    print "<td width='11.55%'>Descuento</td>";
    print "<td width='9.20%'>".number_format($descuento1,2)." €</td>";
    print "</tr>";

    print "<tr>";
    print "<td width='79.85%'></td>";
    print "<td width='11.55%'>Envio</td>";
    print "<td width='9.20%'>".number_format($envio1,2)." €</td>";
    print "</tr>";

    print "<tr>";
    print "<td width='79.85%'></td>";
    print "<td width='11.55%'>Total</td>";
    print "<td width='9.20%'>".number_format($total,2)." €</td>";
    print "</tr>";

    print "<tr>";
    print "<td></td>";
    print "<td></td>";
    print "<td><a href='".RUTAAPP."carrito/gracias' class='btn btn-success' role='button'>Pagar</td>";
    print "</tr>";
print "</table>";

    ?>
</div>
<?php include_once("footer.php");?>