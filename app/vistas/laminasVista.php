<?php include_once("header.php"); ?>
<br><h1 class="text-center">Láminas</h1>
<div class="card p-4 bg-light">
    <?php
        $ren = 0;
        for ($i=0; $i < count($datos["data"]); $i++) {
            if ($ren == 0) {
                print "<div class='row'>";
            }
            print "<div class='card pt-2 col-sm-3'>";
            print "<img src='img/".$datos['data'][$i]["imagen"]."' ";
            print "class='img-responsive' style='width:100%; height:140px;' ";
            print "alt='".$datos['data'][$i]["nombre"]."'/>";
            print "<p><a href='".RUTAAPP."admonProductos/producto/";
            print $datos['data'][$i]["id"]."/laminas'>";
            print $datos['data'][$i]["nombre"]."</a></p>";
            print "</div>";
            $ren++;
            if ($ren == 4) {
                $ren = 0;
                print "</div>";
            }
        }
        ?>
<?php include_once("footer.php");?>