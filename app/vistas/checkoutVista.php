<?php include_once("header.php"); ?>
<div class="card" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Iniciar sesión</li>
            <li class="breadcrumb-item"><a href="#">Datos de envío</a></li>
            <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
            <li class="breadcrumb-item"><a href="#">Verifica datos</a></li>
        </ol>
    </nav>
    <h2>Iniciar sesión</h2>
    <form action="" class="text-start">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" class="form-control" required>
        </div>
        <div class="form-group">
            <a href="<?php print RUTAAPP; ?>carrito/direccion" class="btn btn-success">Iniciar sesión</a>
        </div>
    </form>
</div>
<?php include_once("footer.php");?>