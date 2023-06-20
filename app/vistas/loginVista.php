<?php include_once("header.php"); ?>
<br><h1 class="text-center">Cambalache</h1>
<div class="card p-4 bg-light">
    <form action="<?php echo RUTAAPP; ?>login/verifica" method="POST">
        <div class="form-group text-left">
            <br><label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" placeholder="Introduzca su email"
            value="<?php 
                print isset($datos['data']['usuario'])?$datos['data']['usuario']:''; 
            ?>">
        </div>
        <div class="form-group text-left">
            <br><label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" class="form-control" placeholder="Introduzca su contraseña"
            value="<?php 
                print isset($datos['data']['contraseña'])?$datos['data']['contraseña']:''; 
            ?>">
        </div>
        <br><input type="checkbox" name="recordar" 
        <?php
            if(isset($datos['data']['recordar'])) {
                if($datos['data']['recordar']=="on") print "checked";
            }
        ?>>
        <label for="recordar">Recordar contraseña</label>
         <div class="form-group text-center">
            <br><input type="submit" value="Enviar" class="btn btn-success">
         </div>
         <a href="<?php echo RUTAAPP; ?>admon/verifica">Seccion administrador</a>
    </form>
</div>
<div class="text-center">
    <br><a href="<?php echo RUTAAPP; ?>login/registro">Registrarse</a>
    <a href="<?php echo RUTAAPP; ?>login/olvido/">¿Olvidaste tu contraseña?</a>
</div>
