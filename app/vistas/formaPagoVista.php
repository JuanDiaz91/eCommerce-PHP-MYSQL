<?php include_once("header.php"); ?>
<div class="card" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Iniciar sesión</li>
            <li class="breadcrumb-item"><a href="#">Datos de envío</a></li>
            <li class="breadcrumb-item">Forma de pago</li>
            <li class="breadcrumb-item"><a href="#">Verifica datos</a></li>
        </ol>
    </nav>
    <h2>Forma de pago</h2>
    <br><form action="<?php print RUTAAPP; ?>carrito/verificar" method="POST">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pago" id="tc" value="tc">
        <label class="form-check-label" for="tc"><i class="far fa-credit-card"></i> Tarjeta de crédito</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pago" id="td" value="td">
        <label class="form-check-label" for="td"><i class="fab fa-cc-mastercard"></i> Tarjeta de débito</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pago" id="visa" value="visa">
        <label class="form-check-label" for="visa"><i class="fab fa-cc-visa"></i> Visa</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pago" id="bizum" value="bizum">
        <label class="form-check-label" for="bizum"><i class="fas fa-mobile-alt"></i> Bizum</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="pago" id="paypal" value="paypal">
        <label class="form-check-label" for="paypal"><i class="fab fa-paypal"></i> Paypal</label>
    </div>
    <div class="form-group text-start">
        <br><input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button">
    </div>
</form>
</div>
<?php include_once("footer.php");?>