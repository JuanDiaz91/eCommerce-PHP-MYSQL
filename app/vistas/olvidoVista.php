<?php include_once("header.php"); ?>
<br><h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
<div class="card p-4 bg-light">
    <form action="<?php echo RUTAAPP; ?>login/olvido" method="POST">
        <div class="form-group text-center">
            <br><label for="email" class="mb-2">Introduzca su email</label>
            <input type="email" name="email" class="form-control">
        </div>
         <div class="form-group text-center">
            <br><input type="submit" value="Enviar" class="btn btn-success">
            <a href="<?php print RUTAAPP; ?>" class="btn btn-primary">Volver</a>
         </div>
    </form>
    <p class="text-center mt-4">Te mandamos un correo, verifica tu bandeja de spam</p>
</div>
