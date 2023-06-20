<?php include_once("header.php");
print "<h2 class='text-center'>".$datos["subtitulo"]."</h2>";
print "<img src='".RUTAAPP."img/".$datos["data"]["imagen"]."' class='rounded float-end'/>";
//bisuteria
if ($datos["data"]["tipo"]==1) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //láminas
} else if ($datos["data"]["tipo"]==2) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //postales
} else if ($datos["data"]["tipo"]==3) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //sombreros
} else if ($datos["data"]["tipo"]==4) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //pantalones
} else if ($datos["data"]["tipo"]==5) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Talla:</h4>";
    print "<p>".$datos["data"]["talla"]."</p>";
    print "<h4>Color:</h4>";
    print "<p>".$datos["data"]["color"]."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //vestidos
} else if ($datos["data"]["tipo"]==6) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Talla:</h4>";
    print "<p>".$datos["data"]["talla"]."</p>";
    print "<h4>Color:</h4>";
    print "<p>".$datos["data"]["color"]."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //zapatos
} else if ($datos["data"]["tipo"]==7) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Talla:</h4>";
    print "<p>".$datos["data"]["talla"]."</p>";
    print "<h4>Color:</h4>";
    print "<p>".$datos["data"]["color"]."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
    //blusas
} else if ($datos["data"]["tipo"]==8) {
    print "<h4>Descripción:</h4>";
    print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
    print "<h4>Talla:</h4>";
    print "<p>".$datos["data"]["talla"]."</p>";
    print "<h4>Color:</h4>";
    print "<p>".$datos["data"]["color"]."</p>";
    print "<h4>Precio:</h4>";
    print "<p>".$datos["data"]["precio"]." €</p>";
} 
$volver = ($datos["volver"]=="")? "tienda" : $datos["volver"];
print "<a href='".RUTAAPP.$volver."' class='btn btn-success'/>Volver</a>";
print "&nbsp";
print "<a href='".RUTAAPP."carrito/agregaProducto/";
print $datos["data"]["id"]."/"; //identificador del producto
print $datos["idUsuario"]."' "; //identificador del usuario
print "<a href='".RUTAAPP.$volver."' class='btn btn-primary'/>Añadir al carrito</a>";
include_once("footer.php"); ?>