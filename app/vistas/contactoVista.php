<?php include_once("header.php");
print "<h2 class='text-center'>Contactanos</h2>";
?>
<div class="card p-4 bg-light">
    <form action="<?php print RUTAAPP.'contacto/enviar/';?>"  method="post">
        <div class="form-group text-start">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="name" class="form-control" required placeholder="Escriba su nombre">
        </div>

        <div class="form-group text-start">
            <label for="correo">Email:</label>
            <input type="email" name="correo" id="correo" class="form-control" required placeholder="Escriba su email">
        </div>
        
        <div class="form-group text-start">
            <label for="observacion">Observación:</label>
            <textarea class="form-control" name="observacion" id="observacion"></textarea>
        </div>

        <?php
        print "<div class='form-group text-center'>";
            print "<br><input type='submit' value='Enviar' class='btn btn-success me-2'/>";
            print "<a href='".RUTAAPP."tienda'; class='btn btn-primary'>Volver</a>";
        print "</div>";
        ?>
    </form>
</div>
<?php
include_once("footer.php"); ?>
