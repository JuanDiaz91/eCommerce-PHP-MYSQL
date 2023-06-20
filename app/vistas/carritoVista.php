<?php include_once("header.php");
//Variables
$verifica = false;
$subtotal = 0;
$envio1 = 0;
$descuento1 = 0;
$idUsuario = $datos["idUsuario"];
//
print "<h2 class='text-center'>Carrito de compras</h2>";
print "<form action='".RUTAAPP."carrito/actualiza' method='POST'>";
print "<table class='table table-strped' width='100%'>";
print "<tr>";
print "<th width='12%'>Producto</th>";
print "<th width='58%'>Descripción</th>";
print "<th width='1.8%'>Cant.</th>";
print "<th width='10.12%'>Precio</th>";
print "<th width='10.12%'>Subtotal</th>";
print "<th width='1%'>&nbsp;</th>";
print "<th width='6.5%'>Borrar</th>";
print "</tr>";
for ($i=0; $i<count($datos["data"]); $i++) {

    $descuento = "<b>".$datos["data"][$i]["nombre"]."</b>";
    $descripcion = substr(html_entity_decode($datos["data"][$i]["descripcion"]),0,200);
    $nombre = $datos["data"][$i]["nombre"];
    $numero = $datos["data"][$i]["productos"];
    $cantidad = $datos["data"][$i]["cantidad"];
    $precio = $datos["data"][$i]["precio"];
    $imagen = $datos["data"][$i]["imagen"];
    $descuento = $datos["data"][$i]["descuento"];
    $envio = $datos["data"][$i]["envio"];
    $total = $cantidad * $precio;

    
    print "<tr>";
    print "<td><img src='".RUTAAPP."img/".$imagen."' width='105' alt'".$nombre."'></td>";
    print "<td>".$descripcion."...</td>";
    print "<td class='text-end'>";
    print "<input type='number' name='c".$i."' class='text-end' ";
    print "value='".number_format($cantidad,0)."' min='1' max='99'/>";
    print "<input type='hidden' name='i".$i."' value='".$numero."'/>";
    print "</td>";
    print "<td class='text-end'>€".number_format($precio,2)."</td>";
    print "<td class='text-end'>€".number_format($total,2)."</td>";
    print "<td>&nbsp;</td>";
    print "<td class='text-end'><a href='".RUTAAPP."carrito/borrar/";
    print $numero."/".$idUsuario."' class='btn btn-danger'>Borrar</a>";
    print "</tr>";
    
    $subtotal += $total;
    $descuento1 += $descuento;
    $envio1 += $envio;
}
$total = $subtotal + $envio1 - $descuento1;
print "<input type='hidden' name='numero' value='".$i."'/>";
print "<input type='hidden' name='idUsuario' value='".$datos["idUsuario"]."'/>";
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
print "<td><a href='".RUTAAPP."tienda' class='btn btn-primary' role='button'>Seguir comprando</td>";
print "<td><input type='submit' class='btn btn-primary' role='button' value='Calcular'></td>";
if ($verifica) {
    
    print "<td><a href='".RUTAAPP."carrito/gracias' class='btn btn-success' role='button'>Pagar</td>";
    
} else {
    
    print "<td><a href='".RUTAAPP."carrito/checkout' class='btn btn-success' role='button'>Pagar</td>";
}
print "</tr>";
print "</table>";
print "</form>";
include_once("footer.php");?>