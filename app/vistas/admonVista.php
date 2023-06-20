<?php include_once("header.php"); ?>
<br><h1 class="text-center">Sección administrativa</h1>
<div class="card p-4 bg-light">
    <form action="<?php echo RUTAAPP; ?>admon/verifica" method="POST">
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
        <div class="form-group text-center">
            <br><input type="submit" value="Enviar" class="btn btn-success">
         </div>

    </form>
</div>
