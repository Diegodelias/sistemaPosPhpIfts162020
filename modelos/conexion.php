<?php

class Conexion {

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=sistemaventas",
        "root",
        "");

        // $link = new PDO("mysql:host=213.190.6.169;dbname=u653194006_pos",
        // "u653194006_sergio",
        // "clavePos1");


        $link->exec("set names utf8");
        return $link;

    }


}



?>
