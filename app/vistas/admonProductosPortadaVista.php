<?php include_once("header.php");?>
<h1 class="text-center">Lista de productos</h1>
<div class="card p-4 bg-light">
    <table class="table table-striped" width="100%">
        <thead>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </thead>
        <tbody>
            <?php
                for($i=0; $i<count($datos['data']); $i++) {
                    $tipo = $datos["data"][$i]["tipo"]-1;
                    print "<tr>";
                    print "<td>".$datos["data"][$i]["id"]."</td>";
                    print "<td class='text-start'>".$datos["tipoProducto"][$tipo]["cadena"]."</td>";
                    print "<td class='text-start'>".$datos["data"][$i]["nombre"]."</td>";
                    print "<td class='text-start'>".substr(html_entity_decode($datos["data"][$i]["descripcion"]),0,60);
                    if (strlen($datos["data"][$i]["descripcion"])>60) {
                        print "...";
                    }
                    print "</td>";
                    //
                    print "<td><a href='".RUTAAPP."admonProductos/cambio/".$datos["data"][$i]["id"]."' class='btn btn-primary'>Editar</a></td>";
                    //
                    print "<td><a href='".RUTAAPP."admonProductos/baja/".$datos["data"][$i]["id"]."' class='btn btn-danger'>Borrar</a></td>";
                    print "</tr>";
                }
            ?>
        </tbody>
    </table>
    <a href="<?php print RUTAAPP; ?>admonProductos/alta" class="btn btn-success">Dar de alta un producto</a>
</div>
