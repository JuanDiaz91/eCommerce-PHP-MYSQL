<?php include_once("header.php");
print "<h2 class='text-center'>".$datos["subtitulo"]."</h2>";
print "<div class='alert ".$datos["color"]." mt-3'>";
print "<h4>".$datos["texto"];
print "</div>";
print "<a href='".RUTAAPP.$datos["url"]."' class='btn ".$datos["colorBoton"]."'/>";
print $datos["textoBoton"]."</a>";
include_once("footer.php"); ?>