<?php
class ControladorUsuarios{

   static  public function ctrIngresoUsuario()  {

        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])&&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){ 

                $encriptar= crypt($_POST["ingPassword"], '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi'); /**encriptar password */
               

                $tabla = "usuarios";

                $item = "usuario"; /** hace referencia nombre de la columna usuario en la tabla usuarios de la base de datos */

                $valor = $_POST["ingUsuario"];
               
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

              
                // var_dump($respuesta["usuario"]);

                if($respuesta["usuario"]== $_POST["ingUsuario"] &&  $respuesta["password"] == $encriptar ){

                    if($respuesta["estado"] == 1){ /**si el usuario está activo */

                        echo '<div class="alert alert-success">Bienvenido al sistema</div>';

                        $_SESSION["iniciarSesion"] = "ok"; /**inicia variable de sesión convalor ok */
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];


                /**registro fecha último login */
                        date_default_timezone_set('America/Argentina/Buenos_Aires');

                        $fecha = date('y-m-d');
                        $hora = date('H:i:s');
                        $fechaActual = $fecha.' '.$hora;
                        $item1 = "ultimo_login"; //parametro que se le pasa mdlActualizarUsuario reutilizando es función usada representa nombre de columna en tabla usaurios de la base de datos
                        $item2 = "id";/**similar item2 */
                        $valor2 = $respuesta["id"];
                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor, $item2, $valor);

                        if($ultimoLogin == "ok") {
                            echo '<script>
                            window.location ="analisis";
                            </script>';

                        }
    
    
                     
                    } else {
                        
                    echo '<div class="alert alert-danger">El usuario aun no está activado</div>';


                    }

                    }


                 else{

                    echo '<div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            
            }

        }
     } 



    //  registro de usaurio

    static public function ctrCrearUsuario(){
        
        if(isset($_POST["nuevoUsuario"])){
            // if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ] +$/', $_POST["nuevoNombre"])&&
            // preg_match('/^[a-zA-Z0-9] +$/', $_POST["nuevoUsuario"])&&
            // preg_match('/^[a-zA-Z0-9] +$/', $_POST["nuevoPassword"])){

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){
                    //validacion de imagen
                $ruta="";
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                    var_dump($_FILES["nuevaFoto"]["tmp_name"]);
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]) ;/**crear nuevo array con indice asignados */
                   
                    $nuevoAncho = 500;
                    $nuevoALto = 500;
                    // crear carpeta para guardar las imagenes
                    $directorio = "vistas/imagenes/usuarios/".$_POST["nuevoUsuario"]; /**crea carpeta con nombre de usuario pasado por variable post */
                    mkdir($directorio,0755);

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        $aleatorio = mt_rand(100,999);

                        $ruta ="vistas/imagenes/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);

                        imagejpeg($destino,$ruta);




                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){

                        $aleatorio = mt_rand(100,999);

                        $ruta ="vistas/imagenes/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);

                        imagepng($destino,$ruta);




                    }

                }
                $tabla = "usuarios";
                
                $encriptar= crypt($_POST["nuevoPassword"] , '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi'); /**encriptar password */

                $datos = array("nombre" => $_POST["nuevoNombre"], "usuario" => $_POST["nuevoUsuario"], "password" => $encriptar,  "perfil" => $_POST["nuevoPerfil"], "foto" => $ruta);
            
                
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);

                    if($respuesta == "ok"){
                       
                        echo '<script>

                            swal({
                            
                                
                                text: "La información fue entregada de forma correcta",
                                icon: "success",
                                buttons: true,
                                dangerMode: true,
                            
                            }).then((result)=>{
                                if(result){

                                        window.location = "usuarios";
                                }


                                }) ;

                
                            
                            

                            </script>';


                    }

            } else {
                echo '<script>

                swal({
                   
                    
                    text: "puto el que leee!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                
                }).then((result)=>{
                    if(result.value){

                            window.location = "usuarios";
                    }


                    }) ;

    
                
                

                </script>';

            }
            
            
            
            

        }

    }


    // Metodo mostrar usuario

    static public function ctrMostrarUsuarios($item,$valor){
        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);    

        return $respuesta;
    }





    //metodo para editar usuaurio

   static public function ctrEditarUsuario(){
        if(isset($_POST["editarUsuario"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                $ruta = $_POST["fotoActual"]; /**se actualiza la ruta de la foto */

                if(isset($_FILES["editarFoto"]["tmp_name"])&& !empty($_FILES["editarFoto"]["tmp_name"])){

                    
                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]) ;/**crear nuevo array con indice asignados */
                   
                    $nuevoAncho = 500;
                    $nuevoALto = 500;
                    // crear carpeta para guardar las imagenes
                    $directorio = "vistas/imagenes/usuarios/".$_POST["editarUsuario"]; /**crea carpeta con nombre de usuario pasado por variable post */

                    // chequear que no existar una imagen en la base de datos

                    if(!empty($_POST["fotoActual"])){
                        unlink($_POST["fotoActual"]);//*borra contenido $_post["FOTOaCTUAL] ruta existente al  archivo de la fot

                    }else{ //si no había sido subida fot al crear usuario
                        
                        mkdir($directorio,0755);

                    }



                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){

                        $aleatorio = mt_rand(100,999);

                        $ruta ="vistas/imagenes/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);

                        imagejpeg($destino,$ruta);// crea archivo jpg




                    }

                    if($_FILES["editarFoto"]["type"] == "image/png"){

                        $aleatorio = mt_rand(100,999);

                        $ruta ="vistas/imagenes/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);

                        imagepng($destino,$ruta);




                    }

                }

                $tabla = "usuarios";

                if($_POST["editarPassword"] != ""){ /**si hay se creea un pasword nuevo */
                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){
                        $encriptar= crypt($_POST["editarPassword"] , '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi'); /**encriptar password */


                    } else {

                        echo '<script>

                        swal({
                           
                            
                            text: "La contraseña no puede ir vacía o llevar caracteres especiales!",
                            icon: "error",
                            buttons: true,
                            dangerMode: true,
                        
                        }).then((result)=>{
                            if(result){
        
                                    window.location = "usuarios";
                            }
        
        
                            }) ;
        
                        </script>';
        


                    }

                   
                } else{

                    $encriptar = $_POST["passwordActual"];

                    
                    echo '<script>

                    swal({
                       
                        
                        text: "mal ahi",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    
                    }).then((result)=>{
                        if(result){
    
                                window.location = "usuarios";
                        }
    
    
                        }) ;
    
        
                    
                    
    
                    </script>';

                }

                $datos = array("nombre" => $_POST["editarNombre"], "usuario" => $_POST["editarUsuario"], "password" => $encriptar,  "perfil" => $_POST["editarPerfil"], "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla,$datos);

                if($respuesta == "ok") {

                    echo '<script>

                    swal({
                       
                        
                        text: "El usuario ha sido editado correctamente",
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    
                    }).then((result)=>{
                        if(result){
    
                                window.location = "usuarios";
                        }
    
    
                        }) ;
    
        
                    
                    
    
                    </script>';
    


                }

        } else {

            echo '<script>

            swal({
               
                
                text: "El nombre no puede ir vacío o llevar caracteres especiales2!",
                icon: "error",
                buttons: true,
                dangerMode: true,
            
            }).then((result)=>{
                if(result){

                        window.location = "usuarios";
                }


                }) ;


            
            

            </script>';
          



        }

    }

}


// Borrar usuario


static function ctrBorrarUsuario(){

    if(isset($_GET["idUsuario"])){
        $tabla="usuarios";
        $datos=$_GET["idUsuario"];
        if($_GET["fotoUsuario"] != ""){ /**si no viene vacía quiere decir que hay una foto para eliminar */
            
            unlink($_GET["fotoUsuario"]);/**elimina foto */
            rmdir('vistas/imagenes/usuarios/'.$_GET["usuario"]);/**elinar carpeta del usuario */

        }
        $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);

        if($respuesta =="ok"){


            echo '<script>

            swal({
               
                
                text: "El usuario ha sido borrado correctamente",
                icon: "success",
                buttons: true,
                dangerMode: true,
            
            }).then((result)=>{
                if(result){

                        window.location = "usuarios"; 
                }


                }) ;


            
            

            </script>';
          



        }



    }
}


}
