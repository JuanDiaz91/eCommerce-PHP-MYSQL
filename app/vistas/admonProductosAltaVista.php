<?php include_once("header.php"); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
<script src="<?php echo RUTAAPP; ?>js/admonProductosAltaVista.js"></script>
<br><h1 class="text-center">
<?php
    if (isset($datos["subtitulo"])) {
        print $datos["subtitulo"];
    }
?>
</h1>
<div class="card p-4 bg-light">
    <form enctype="multipart/form-data" action="<?php echo RUTAAPP; ?>admonProductos/alta" method="POST">
        <div class="form-group text-start">
            <br><label for="usuario">Tipo de producto:</label>
            <select class="form-control" name="tipo" id="tipo"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
                <option value="void">Selecciona el tipo de producto</option>
                <?php
                    for ($i=0; $i < count($datos["tipoProducto"]); $i++) {
                        print "<option value='".$datos["tipoProducto"][$i]["indice"]."'";
                        if (isset($datos["data"]["tipo"])) {
                            if ($datos["data"]["tipo"]==$datos["tipoProducto"][$i]["indice"]) {
                                print " selected ";
                            }
                        }
                        print ">".$datos["tipoProducto"][$i]["cadena"]."</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group text-left">
            <br><label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required placeholder="Introduzca el nombre del producto"
            value="<?php 
                print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
            ?>"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
        </div>
        <div class="form-group text-left">
            <br><label for="content">Descripción:</label>
            <br><textarea name="content" id="editor" rows="10"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>            
            >
            <?php
                if (isset($datos["data"]["descripcion"])) {
                    print $datos["data"]["descripcion"];
                }
            ?>
            </textarea>
        </div>

        <div id="vestido">
            <div class="form-group text-left">
                <br><label for="talla">Talla:</label>
                <input type="text" name="talla" class="form-control" placeholder="Introduzca la talla del producto"
                value="<?php 
                    print isset($datos['data']['talla'])?$datos['data']['talla']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
            <div class="form-group text-left">
                <br><label for="color">Color:</label>
                <input type="text" name="color" class="form-control" placeholder="Introduzca el color del producto"
                value="<?php 
                    print isset($datos['data']['color'])?$datos['data']['color']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
        </div>
        <div id="blusa">
            <div class="form-group text-left">
                <br><label for="talla">Talla:</label>
                <input type="text" name="talla2" class="form-control" placeholder="Introduzca la talla del producto"
                value="
                <?php 
                    print isset($datos['data']['talla2'])?$datos['data']['talla2']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
            <div class="form-group text-left">
                <br><label for="color">Color:</label>
                <input type="text" name="color2" class="form-control" placeholder="Introduzca el color del producto"
                value="
                <?php 
                    print isset($datos['data']['color2'])?$datos['data']['color2']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
        </div>
        <div id="zapatos">
            <div class="form-group text-left">
                <br><label for="talla">Talla:</label>
                <input type="text" name="talla3" class="form-control" placeholder="Introduzca la talla del producto"
                value="
                <?php 
                    print isset($datos['data']['talla3'])?$datos['data']['talla3']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
            <div class="form-group text-left">
                <br><label for="color">Color:</label>
                <input type="text" name="color3" class="form-control" placeholder="Introduzca el color del producto"
                value="
                <?php 
                    print isset($datos['data']['color3'])?$datos['data']['color3']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
        </div>
        <div id="pantalones">
            <div class="form-group text-left">
                <br><label for="talla">Talla:</label>
                <input type="text" name="talla4" class="form-control" placeholder="Introduzca la talla del producto"
                value="
                <?php 
                    print isset($datos['data']['talla4'])?$datos['data']['talla4']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
            <div class="form-group text-left">
                <br><label for="color">Color:</label>
                <input type="text" name="color4" class="form-control"  placeholder="Introduzca el color del producto"
                value="<?php 
                    print isset($datos['data']['color4'])?$datos['data']['color4']:''; 
                ?>"
                <?php
                    if (isset($datos["baja"])) {
                        print " disabled ";
                    }
                ?>
                >
            </div>
        </div>
        <div class="form-group text-left">
            <br><label for="precio">Precio:</label>
            <input type="text" name="precio" class="form-control" 
            pattern="^(\d|-)?(\d|,)*\.?\d*$" required placeholder="Introduzca precio del producto"
            value="<?php 
                print isset($datos['data']['precio'])?$datos['data']['precio']:''; 
            ?>"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
        </div>
        <div class="form-group text-left">
            <br><label for="descuento">Descuento del producto:</label>
            <input type="text" name="descuento" class="form-control" 
            pattern="^(\d|-)?(\d|,)*\.?\d*$" placeholder="Introduzca descuento del producto"
            value="<?php 
                print isset($datos['data']['descuento'])?$datos['data']['descuento']:''; 
            ?>"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
        </div>
        <div class="form-group text-left">
            <br><label for="envio">Coste del envio:</label>
            <input type="text" name="envio" class="form-control" 
            pattern="^(\d|-)?(\d|,)*\.?\d*$" placeholder="Introduzca coste del envío del producto"
            value="<?php 
                print isset($datos['data']['envio'])?$datos['data']['envio']:''; 
            ?>"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
        </div>
        <div class="form-group text-left">
            <br><label for="imagen">Imagen del producto:</label>
            <input type="file" name="imagen" class="form-control" required accept="image/jpeg"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
            <?php
                if (isset($datos["data"]["imagen"])) {
                    print "<p>".$datos["data"]["imagen"]."</p>";
                }
            ?>
        </div>
        <div class="form-group text-left">
            <br><label for="fecha">Fecha:</label>
            <input type="date" name="fecha" class="form-control" placeholder="Fecha de creación o control del producto (DD/MM/AAAA)."
            value="<?php 
                print isset($datos['data']['fecha'])?$datos['data']['fecha']:''; 
            ?>"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
        </div>
        <div class="form-group text-left">
            <br><label for="relacion1">Producto relacionado:</label>
            <select class="form-control" name="relacion1" id="relacion1"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
                <option value="void">Selecciona el producto relacionado</option>
                <?php
                    for ($i=0; $i < count($datos["catalogo"]); $i++) {
                        print "<option value='".$datos["catalogo"][$i]["id"]."'";
                        if (isset($datos["data"]["relacion1"])) {
                            if ($datos["data"]["relacion1"]==$datos["catalogo"][$i]["id"]) {
                                print " selected ";
                            }
                        }
                        print ">".$datos["catalogo"][$i]["nombre"]."</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group text-left">
            <br><label for="relacion2">Producto relacionado:</label>
            <select class="form-control" name="relacion2" id="relacion2"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>            >
                <option value="void">Selecciona el producto relacionado</option>
                <?php
                    for ($i=0; $i<count($datos["catalogo"]); $i++) {
                        print "<option value='".$datos["catalogo"][$i]["id"]."'";
                        if (isset($datos["data"]["relacion2"])) {
                            if ($datos["data"]["relacion2"]==$datos["catalogo"][$i]["id"]) {
                                print " selected ";
                            }
                        }
                        print ">".$datos["catalogo"][$i]["nombre"]."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group text-left">
            <br><label for="relacion3">Producto relacionado:</label>
            <select class="form-control" name="relacion3" id="relacion3"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
                <option value="void">Selecciona el producto relacionado</option>
                <?php
                    for ($i=0; $i<count($datos["catalogo"]); $i++) {
                        print "<option value='".$datos["catalogo"][$i]["id"]."'";
                        if (isset($datos["data"]["relacion3"])) {
                            if ($datos["data"]["relacion3"]==$datos["catalogo"][$i]["id"]) {
                                print " selected ";
                            }
                        }
                        print ">".$datos["catalogo"][$i]["nombre"]."</option>";
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group text-left">
            <br><label for="status">Estatus del producto:</label>
            <select class="form-control" name="status" id="status"
            <?php
                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
                <option value="void">Selecciona el status del producto</option>
                <?php
                    for ($i=0; $i<count($datos["statusProducto"]); $i++) {
                        print "<option value='".$datos["statusProducto"][$i]["indice"]."'";
                        if (isset($datos["data"]["status"])) {
                            if ($datos["data"]["status"]==$datos["statusProducto"][$i]["indice"]) {
                                print " selected ";
                            }
                        }
                        print ">".$datos["statusProducto"][$i]["cadena"]."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-check text-left">
            <input type="checkbox" name="masvendido" id="masvendido" class="form-check-input" 
            <?php 
                if (isset($datos['data']['masvendido'])) {
                    if ($datos['data']['masvendido']==1) {
                        print " checked ";
                    }
                }

                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
            <label for="masvendido" class="form-check-label">Producto más vendido</label>
        </div>
        
        <div class="form-check text-left">
            <input type="checkbox" name="nuevos" id="nuevos" class="form-check-input"
            <?php 
                if (isset($datos['data']['nuevos'])) {
                    if ($datos['data']['nuevos']==1) {
                        print " checked ";
                    }
                }

                if (isset($datos["baja"])) {
                    print " disabled ";
                }
            ?>
            >
            <label for="nuevos" class="form-check-label">Producto nuevo</label>
        </div>

        <div class="form-group text-center">
            <input type="hidden" name="id" id="id" value="
            <?php
                if (isset($datos['data']['id'])) {
                    print $datos['data']['id'];
                } else {
                    print "";
                }
            ?>"
            >
            <?php
                if (isset($datos["baja"])) { ?>
                <a href="<?php print RUTAAPP; ?>admonProductos/bajaLogica/<?php print $datos['data']['id']; ?>" class="btn btn-danger">borrar</a>
                <a href="<?php print RUTAAPP; ?>admonProductos" class="btn btn-primary">Volver</a>
                <p><b>Advertencia: una vez borrado el registro, no podrá recuperar la información</b></p>
            <?php } else { ?>
                <br><input type="submit" value="Enviar" class="btn btn-success">
                <a href="<?php print RUTAAPP; ?>admonProductos" class="btn btn-primary">Volver</a>
            <?php } ?>
        </div>

    </form>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
