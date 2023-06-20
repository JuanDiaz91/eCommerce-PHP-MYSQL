<?php include_once("header.php"); ?>
<div class="card p-3" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Iniciar sesión</a></li>
            <li class="breadcrumb-item">Datos de envío</li>
            <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
            <li class="breadcrumb-item"><a href="#">Verifica datos</a></li>
        </ol>
    </nav>
    <h2>Datos de envío</h2>
    <p>Verifique los siguientes datos para su envío:</p>
    <form action="<?php echo RUTAAPP; ?>carrito/formaPago" method="POST">
        <div class="form-group text-start">
            <label for="nombre">* Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value='<?php isset($datos["data"]["nombre"])? print $datos["data"]["nombre"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="primerApellido">* Primer Apellido:</label>
            <input type="text" name="primerApellido" id="primerApellido" class="form-control" required placeholder="Primer apellido" value='<?php isset($datos["data"]["primerApellido"])? print $datos["data"]["primerApellido"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="segundoApellido">Segundo Apellido:</label>
            <input type="text" name="segundoApellido" id="segundoApellido" class="form-control" placeholder="Segundo apellido" value='<?php isset($datos["data"]["segundoApellido"])? print $datos["data"]["segundoApellido"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="email">* Email:</label>
            <input type="email" name="email" id="email" class="form-control" required placeholder="Escriba su email" value='<?php isset($datos["data"]["email"])? print $datos["data"]["email"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="direccion">* Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Escriba su dirección" value='<?php isset($datos["data"]["direccion"])? print $datos["data"]["direccion"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="ciudad">* Ciudad:</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" required placeholder="Escriba su ciudad" value='<?php isset($datos["data"]["ciudad"])? print $datos["data"]["ciudad"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="provincia">* Provincia:</label>
            <input type="text" name="provincia" id="provincia" class="form-control" required placeholder="Escriba su provincia" value='<?php isset($datos["data"]["provincia"])? print $datos["data"]["provincia"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="codpos">* Código Postal:</label>
            <input type="text" name="codpos" id="codpos" class="form-control" required placeholder="Escriba su código postal" value='<?php isset($datos["data"]["codpos"])? print $datos["data"]["codpos"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="pais">* País:</label>
            <input type="text" name="pais" id="pais" class="form-control" required placeholder="Escriba su país" value='<?php isset($datos["data"]["pais"])? print $datos["data"]["pais"]:""; ?>' >
        </div>
        <div class="form-group text-start">
            <br><label for="enviar"></label>
            <input type="submit" value="Continuar" class="btn btn-success" role="button">
        </div>
    </form>  
</div>
<?php include_once("footer.php"); ?>