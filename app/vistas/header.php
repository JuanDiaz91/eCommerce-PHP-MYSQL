<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dc44275a6e.js" crossorigin="anonymous"></script>
    <title><?php echo $datos["titulo"];?></title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="<?php echo RUTAAPP."tienda"; ?>" class="navbar-brand">AFAJE</a>
        <div class="collapse navbar-collapse" id="menu">
            <?php 
                if($datos["menu"]) {
                    # menu
                    print "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."bisuteria' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="bisuteria") print "active";
                    print "'>Bisutería</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."laminas' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="laminas") print "active";
                    print "'>Láminas</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."postales' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="postales") print "active";
                    print "'>Postales</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."sombreros' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="sombreros") print "active";
                    print "'>Sombreros</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."ropa' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="ropa") print "active";
                    print "'>Ropa</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."sobremi' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="sobremi") print "active";
                    print "'>Sobre AFAJE</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."contacto' class='nav-link ";
                    if (isset($datos['activo']) && $datos['activo']=="contacto") print "active";
                    print "'>Contacto</a>";
                    print "</li>";
                    print "</ul>";
                    //Formulario
                    print "<ul class='navbar-nav ms-auto'>";
                    //
                    if (isset($_SESSION["carrito"]) && $_SESSION["carrito"]>0) {

                        print "<li class='nav-item'>";
                        print "<a href='".RUTAAPP."carrito/portada' class='nav-link'><i class='fas fa-shopping-cart'></i>";
                        print " : ".number_format($_SESSION["carrito"],2)." €";
                        print "</a>";
                        print "</li>";

                    }

                    print "<li class='nav-item'>";
                    print "<a href='".RUTAAPP."tienda/logout' class='nav-link'><i class='fas fa-sign-out-alt'></i> Salir</a>";
                    print "</li>";
                    print "</ul>";
                    ?>
                    <form action="<?php print RUTAAPP; ?>buscar/producto" class="d-flex" method="POST">
                        <input type="text" name="buscar" id="buscar" class="form-control me-2" size="20" placeholder="buscar productos">
                        <button type="submit" class="btn btn-outline-light"><i  class="fas fa-search"></i></button>
                    </form>
                    <?php

                }
                if (isset($datos["admon"])) {
                    if($datos["admon"]) {
                        print "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
                        print "<li class='nav-item'>";
                        print "<a href='".RUTAAPP."admonUsuarios' class='nav-link'>Usuarios</a>";
                        print "</li>";
                        print "<li class='nav-item'>";
                        print "<a href='".RUTAAPP."admonProductos' class='nav-link'>Productos</a>";
                        print "</li>";
                        print "</li>";
                        print "<li class='nav-item'>";
                        print "<a href='".RUTAAPP."carrito/ventas' class='nav-link'>Ventas</a>";
                        print "</li>";
                        print "</ul>";
                        print "<ul class='navbar-nav ms-auto'>";
                        print "<li class='nav-item'>";
                        print "<a href='".RUTAAPP."tienda/logout' class='nav-link'><i class='fas fa-sign-out-alt'></i> Salir</a>";
                        print "</li>";
                        print "</ul>";
                    }
                }
            ?>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2"></div>
                <div class="col-sm-8">
            <?php
                if(isset($datos["errores"])) {
                    if (count($datos["errores"])>0) {
                        echo "<div class = 'alert alert-danger mt-3'>";
                        foreach ($datos["errores"] as $key => $valor) {
                            echo "<strong>* " . $valor . "</strong><br>";
                        }
                        echo "</div>";
                    }
                }
            ?>
               
