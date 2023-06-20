<?php include_once("header.php"); ?>
<h2 class="text-center">Registro</h2>
<form action="<?php echo RUTAAPP; ?>login/registro" method="POST">
    <div class="form-group text-left">
        <label for="nombre">* Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value='<?php isset($datos["data"]["nombre"])? print $datos["data"]["nombre"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="primerApellido">* Primer Apellido:</label>
        <input type="text" name="primerApellido" id="primerApellido" class="form-control" required placeholder="Primer apellido" value='<?php isset($datos["data"]["primerApellido"])? print $datos["data"]["primerApellido"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="segundoApellido">Segundo Apellido:</label>
        <input type="text" name="segundoApellido" id="segundoApellido" class="form-control" placeholder="Segundo apellido" value='<?php isset($datos["data"]["segundoApellido"])? print $datos["data"]["segundoApellido"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="email">* Email:</label>
        <input type="email" name="email" id="email" class="form-control" required placeholder="Escriba su email" value='<?php isset($datos["data"]["email"])? print $datos["data"]["email"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="contraseña1">* Contraseña:</label>
        <input type="password" name="contraseña1" id="contraseña1" class="form-control" required placeholder="Escriba su contraseña" value='<?php isset($datos["data"]["contraseña1"])? print $datos["data"]["contraseña1"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="contraseña2">* Repetir Contraseña:</label>
        <input type="password" name="contraseña2" id="contraseña2" class="form-control" required placeholder="Verifique su contraseña" value='<?php isset($datos["data"]["contraseña2"])? print $datos["data"]["contraseña2"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="direccion">* Dirección:</label>
        <input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Escriba su dirección" value='<?php isset($datos["data"]["direccion"])? print $datos["data"]["direccion"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="ciudad">* Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control" required placeholder="Escriba su ciudad" value='<?php isset($datos["data"]["ciudad"])? print $datos["data"]["ciudad"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="provincia">* Provincia:</label>
        <input type="text" name="provincia" id="provincia" class="form-control" required placeholder="Escriba su provincia" value='<?php isset($datos["data"]["provincia"])? print $datos["data"]["provincia"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="codpos">* Código Postal:</label>
        <input type="text" name="codpos" id="codpos" class="form-control" required placeholder="Escriba su código postal" value='<?php isset($datos["data"]["codpos"])? print $datos["data"]["codpos"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="pais">* País:</label>
        <input type="text" name="pais" id="pais" class="form-control" required placeholder="Escriba su país" value='<?php isset($datos["data"]["pais"])? print $datos["data"]["pais"]:""; ?>' >
    </div>
    <div class="form-group text-left">
        <br><label for="enviar"></label>
        <input type="submit" value="Enviar datos" class="btn btn-success" role="button">
        <a href="<?php echo RUTAAPP; ?>login" class="btn btn-primary p-left4">Volver</a>
    </div>
</form>  
