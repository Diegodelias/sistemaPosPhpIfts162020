<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
    class AjaxUsuarios{
        // Editar usuario

        public $idUsuario;

        public function ajaxEditarUsuario(){

            $item= "id"; /**columna id de la base datos */
            $valor = $this->idUsuario;
            $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
            echo json_encode($respuesta);

        }

        /**activar usuario */

        public $activarUsuario;
        public $activarId;

         public function ajaxActivarUsuario(){
            $tabla ="usuarios";

            $item1 ="estado";/**valor columna estado en base de datos */
            $valor1 = $this->activarUsuario;

            $item2="id";

            $valor2=$this->activarId;

           
            $respuesta =  ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
            
        }

        /**validar no reptir usuario
         * 
         */

         public $validarUsuario;
         public function ajaxValidarUsuario(){
             /**muestra usuario que coincidad con nombre de usaurio almacenado en $validadUsuario*/
             $item = "usuario";/**nombre columna tablausuarios bd */
             $valor = $this->validarUsuario;
             $respuesta = ControLadorUsuarios::ctrMostrarUsuarios($item,$valor);

             echo json_encode($respuesta);


         }




    }

    if (isset($_POST["idUsuario"])){

        $editar = new AjaxUsuarios();
        $editar -> idUsuario = $_POST["idUsuario"]; /**setea atributo idUsuaario con $_POST["idUsuario"] que viene de usuarios.js */
        $editar -> ajaxEditarUsuario();
    


    }

    if (isset($_POST["activarUsuario"])){

        $activarUsuario = new AjaxUsuarios();
        $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
        $activarUsuario -> activarId = $_POST["activarId"];
        $activarUsuario -> ajaxActivarUsuario();


    }
 
/**para que no puedan crearse usuarios con mismo nombre usuario */
    if(isset($_POST["validarUsuario"])){

        $valUsuario = new AjaxUsuarios(); /**se crea una instancia de la clase */
        
        $valUsuario ->validarUsuario = $_POST["validarUsuario"]; //asigna valor al atributo validar usuario  de objeto $valUsuario
        $valUsuario -> ajaxValidarUsuario(); /**ejcuta metodo ajax validar Uusauario */
    }

?>