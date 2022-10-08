<?php
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class ClientesAjax{

    // edición cliente

    public $clienteId;
 
    public function ClienteEditar(){

            $nomColumna = "id";
            $val = $this->clienteId;
            $res = ClientesControlador::ClientesVerContr($nomColumna,$val);

            echo json_encode($res);

    }


}





 $cliObj = new ClientesAjax();
 $cliObj->clienteId = (isset($_POST["ClienteId"] )) ? $_POST["ClienteId"] : '' ;
 $cliObj->ClienteEditar();




?>