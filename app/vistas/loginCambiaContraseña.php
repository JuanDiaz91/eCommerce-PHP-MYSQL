<?php include_once("header.php"); ?>
<br><h1 class="text-center">Actualizar contraseña</h1>
<div class="card p-4 bg-light">
    <form action="<?php echo RUTAAPP; ?>login/cambiarclave" method="POST">
        <div class="form-group text-left">
            <br><label for="contraseña1">Cambiar contraseña</label>
            <input type="password" name="contraseña1" class="form-control">
        </div>
        <div class="form-group text-left">
            <br><label for="contraseña2">Confirmar Contraseña</label>
            <input type="password" name="contraseña2" class="form-control">
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="id" value="<?php print $datos['data']?>">
            <br><input type="submit" value="Enviar" class="btn btn-success">
            <a href="<?php print RUTAAPP.'/login';?>"class='btn btn-primary'">Volver</a>
        </div>
    </form>
</div>
