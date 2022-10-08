
<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class CategoriasAjax{

    /**editar categorias */
public $CatId;

public function CatAjaxEditar(){

        $nomColumna = "id";
        $val = $this->CatId;

        $respuesta = CatControlador::VerCategoriasControlador($nomColumna,$val);

        echo json_encode($respuesta);
    }

}


if(isset($_POST["CatId"])){

    $categoria = new CategoriasAjax();
    $categoria ->CatId = $_POST["CatId"]; 
    $categoria ->CatAjaxEditar();

}







?>