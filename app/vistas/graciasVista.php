<?php include_once("header.php"); ?>
<div class="card" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Iniciar sesión</a></li>
            <li class="breadcrumb-item"><a href="#">Datos de envío</a></li>
            <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
            <li class="breadcrumb-item">Verifica datos</li>
        </ol>
    </nav>
    <h2><?php print $datos["data"]["nombre"];?>:</h2>
    <h3>¡Gracias por su visita y por realizar su compra! Esperamos volver a verle pronto.</h3>
    <br>
    <div class="form-group text-start">
        <label for="enviar"></label>
        <a href="<?php print RUTAAPP; ?>tienda" class="btn btn-success" role="button">Volver a la tienda</a>
    </div>
</div>
<?php include_once("footer.php");?>