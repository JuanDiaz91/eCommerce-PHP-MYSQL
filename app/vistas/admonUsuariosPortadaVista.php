<?php include_once("header.php");?>
<h1 class="text-center">Usuarios administradores</h1>
<div class="card p-4 bg-light">
    <table class="table table-striped" width="100%">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
        </thead>
        <tbody>
            <?php
                for($i=0; $i<count($datos['data']); $i++) {
                    print "<tr>";
                    print "<td class='text-center'>".$datos["data"][$i]["id"]."</td>";
                    print "<td class='text-left'>".$datos["data"][$i]["nombre"]."</td>";
                    print "<td class='text-left'>".$datos["data"][$i]["correo"]."</td>";
                    print "<td><a href='".RUTAAPP."admonUsuarios/cambio/".$datos["data"][$i]["id"]."' class='btn btn-primary'>Editar</a></td>";
                    print "<td><a href='".RUTAAPP."admonUsuarios/baja/".$datos["data"][$i]["id"]."' class='btn btn-danger'>Borrar</a></td>";
                    print "</tr>";
                }
            ?>
        </tbody>
    </table>
    <a href="<?php print RUTAAPP; ?>admonUsuarios/alta" class="btn btn-success">Dar de alta un usuario</a>
</div>
