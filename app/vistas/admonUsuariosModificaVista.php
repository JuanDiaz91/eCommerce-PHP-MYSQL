<?php include_once("header.php"); ?>
<br><h1 class="text-center">Modificar usuario administrador</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTAAPP; ?>admonUsuarios/cambio" method="POST">
        <div class="form-group text-left">
            <br><label for="correo">* Usuario:</label>
            <input type="email" name="correo" class="form-control" placeholder="Introduzca su email" required
            value="<?php 
                print isset($datos['data']['correo'])?$datos['data']['correo']:''; 
            ?>">
        </div>
        <div class="form-group text-left">
            <br><label for="contraseña1">Contraseña: (Dejalas en blanco si no deseas modificación en la contraseña)</label>
            <input type="password" name="contraseña1" class="form-control" placeholder="Introduzca su contraseña" 
            value="">
        </div>
        <div class="form-group text-left">
            <br><label for="contraseña2">Verifica la contraseña:</label>
            <input type="password" name="contraseña2" class="form-control" placeholder="Verifique su contraseña" 
            value="">
        </div>
        <div class="form-group text-left">
            <br><label for="nombre">* Nombre:</label>
            <input type="text" name="nombre" class="form-control" placeholder="Introduzca su nombre" required
            value="<?php 
                print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
            ?>">
        </div>
        <div class="form-group">
            <label for="status"><br>Selecciona status:</label>
            <select clase="form-control" name="status" id="status">
                <option value="void"><br>Selecciona el status del usuario</option>
                <?php
                    for($i=0; $i<count($datos["status"]); $i++) {
                        print "<option value='".$datos["status"][$i]["indice"]."'";
                        if ($datos["status"][$i]["indice"]==$datos["data"]["status"]) {
                            print " selected ";
                        }
                        print ">".$datos["status"][$i]["cadena"]."</option>";
                    }
                ?>
            </select>
            
        </div>
        <div class="form-group text-center">
            <input type="hidden" id="id" name="id" value="<?php print $datos['data']['id']; ?>">
            <br><input type="submit" value="Enviar" class="btn btn-success">
            <a href="<?php print RUTAAPP;?>admonUsuarios" class="btn btn-primary">Volver</a>
        </div>
    </form>
</div>
