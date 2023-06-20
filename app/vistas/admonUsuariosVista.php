<?php include_once("header.php"); ?>
<br><h1 class="text-center">Alta de usuario administrador</h1>
<div class="card p-4 bg-light">
    <form action="<?php echo RUTAAPP; ?>admonUsuarios/alta" method="POST">
        <div class="form-group text-left">
            <br><label for="usuario">* Usuario:</label>
            <input type="email" name="usuario" class="form-control" placeholder="Introduzca su email" required
            value="<?php 
                print isset($datos['data']['usuario'])?$datos['data']['usuario']:''; 
            ?>">
        </div>
        <div class="form-group text-left">
            <br><label for="contraseña1">* Contraseña:</label>
            <input type="password" name="contraseña1" class="form-control" placeholder="Introduzca su contraseña" required
            value="<?php 
                print isset($datos['data']['contraseña1'])?$datos['data']['contraseña1']:''; 
            ?>">
        </div>
        <div class="form-group text-left">
            <br><label for="contraseña2">* Verifica la contraseña:</label>
            <input type="password" name="contraseña2" class="form-control" placeholder="Verifique su contraseña" required
            value="<?php 
                print isset($datos['data']['contraseña2'])?$datos['data']['contraseña2']:''; 
            ?>">
        </div>
        <div class="form-group text-left">
            <br><label for="nombre">* Nombre:</label>
            <input type="text" name="nombre" class="form-control" placeholder="Introduzca su nombre" required
            value="<?php 
                print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
            ?>">
        </div>
        <div class="form-group text-center">
            <br><input type="submit" value="Enviar" class="btn btn-success">
            <a href="<?php print RUTAAPP;?>admonUsuarios" class="btn btn-primary">Volver</a>
         </div>

    </form>
</div>
