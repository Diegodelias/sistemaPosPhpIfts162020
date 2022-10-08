<?php

class ClientesControlador{

    static public function nuevoClienteContr(){
        if(isset($_POST["ClienteNuevo"])){
          
                     if(self::ValidarCliente(1)){
                        $ClienteData = array("ClienteNombre"=>$_POST["ClienteNuevo"],
					           "ClienteDni"=>$_POST["DniNuevo"],
					           "ClienteEmail"=>$_POST["EmailNuevo"],
					           "Clientetelefono"=>$_POST["TelNuevo"],
					           "Clientedireccion"=>$_POST["DireNueva"]);
                             $resp =  ClientesModelo::NuevoClienteModelo($ClienteData);

                            if ($resp){

                                echo '<script>
                                swal({
                                    text: "El nuevo cliente fue creado exitosamente ",
                                        icon: "success",
                                       buttons: true,
                                       dangerMode: false,
                                           
                                   }).then((result)=>{
                                       if(result){
                                           window.location = "ClientesVista";
                                                }
                                                 }) ;
                           
                                    </script>';

                            }else {
                                 echo '<script>
                                swal({
                                    text: "Hubo un problema y no se pudo ingresar el cliente ",
                                        icon: "error",
                                       buttons: true,
                                       dangerMode: false,
                                           
                                   }).then((result)=>{
                                       if(result){
                                           window.location = "ClientesVista";
                                                }
                                                 }) ;
                           
                                    </script>';
                            } 
                        }  
    }
}






static public function ClientesVerContr( $nomColumna,$val){

    $tbl = "clientes";
    $resp = ClientesModelo::ClientesVerModelo($tbl,$nomColumna,$val);
    return $resp;



}



static public function ClientesEditarContr( ){

    if(isset($_POST["ClienteEditar"])){
            if( self::ValidarCliente(2)){
            $ClienteData = array( "id"=>$_POST["ClientId"], //viene del input hidden de la vista
                        "ClienteEditado"=>$_POST["ClienteEditar"],
                       "ClienteDni"=>$_POST["DniEditar"],
                       "ClienteEmail"=>$_POST["EmailEditar"],
                       "Clientetelefono"=>$_POST["TelEditar"],
                       "Clientedireccion"=>$_POST["DireEditar"]
                     );
                 $resp =  ClientesModelo::EditarClienteModelo($ClienteData);

                    if ($resp){

                        echo '<script>
                        swal({
                            text: "El nuevo cliente fue editado exitosamente ",
                                icon: "success",
                               buttons: true,
                               dangerMode: false,
                                   
                           }).then((result)=>{
                               if(result){
                                   window.location = "ClientesVista";
                                        }
                                         }) ;
                   
                            </script>';

                    }else {

                        
                        echo '<script>
                        swal({
                            text: "Hubo un problema al editar el cliente ",
                                icon: "error",
                               buttons: true,
                               dangerMode: false,
                                   
                           }).then((result)=>{
                               if(result){
                                   window.location = "ClientesVista";
                                        }
                                         }) ;
                   
                            </script>';
                    }
            }  

}


}




static public function EliminarClienteControlador(){
    if(isset($_GET["ClienteId"])){

        $tbl="clientes";
        $ClienteData= $_GET["ClienteId"];
        $resp =  ClientesModelo::BorrarClienteModelo($tbl,$ClienteData);

        
        if($resp){
        
        
            echo '<script>

            swal({
               
                
                text: "El cliente ha sido borrado correctamente",
                icon: "success",
                buttons: true,
                dangerMode: true,
            
            }).then((result)=>{
                if(result){

                        window.location = "ClientesVista"; 
                }


                }) ;


            
            

            </script>';
          



        }




    }

}


 static function ValidarCliente($opcion){
    
 
    if ($opcion == 1){
            if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ClienteNuevo"]) 
           && preg_match('/^[0-9]+$/', $_POST["DniNuevo"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EmailNuevo"]) && preg_match('/^[()\-0-9 ]+$/', $_POST["TelNuevo"]) &&  preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["DireNueva"])){
            return true;


        } else {
            echo '<script>
            swal({
                text: "No puede dejarse vacío  el campo clientes ni tener  caracteres especiales !",
                icon: "error",
                buttons: true,
                 dangerMode: true,
                     }).then((result)=>{
                      if(result){
                     window.location = "ClientesVista";
                   }
                }) ;
                </script>';
            return false;


        }


    } else if($opcion == 2){

        if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ClienteEditar"]) 
        && preg_match('/^[0-9]+$/', $_POST["DniEditar"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EmailEditar"]) && preg_match('/^[()\-0-9 ]+$/', $_POST["TelEditar"]) &&  preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["DireEditar"])){
            return true;

        }else {

            echo '<script>
            swal({
                text: "No puede dejarse vacío  el campo clientes ni tener  caracteres especiales !",
                icon: "error",
                buttons: true,
                 dangerMode: true,
                     }).then((result)=>{
                      if(result){
                     window.location = "ClientesVista";
                   }
                }) ;
                </script>';
            return false;



        }


    }

}
}
?>