<?php
$tbl="productos";
$nomColumna = "id_categoria";
        $val = 2;


        $resp = ProductoModelo::VerProductoModelo($tbl,$nomColumna,$val);


        var_dump($resp);



        ?>