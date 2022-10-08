<?php

    class ProductosControlador{


        //ver productos

        static public function VerProductosControlador($nomColumna,$val){

            $tbl = "productos";

             
            $resp = ProductoModelo::VerProductoModelo($tbl,$nomColumna,$val);
            return $resp;


        }

        static public function VerProductosControladorOrdenados($nomColumna, $orden){

            $tbl = "productos";

             
            $resp = ProductoModelo::VerProductoModeloOrdenados($tbl, $nomColumna, $orden);
            return $resp;


        }


        static public function NuevoProductoControlador(){
                if(isset($_POST["DescripcionNueva"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["DescripcionNueva"])&& preg_match('/^[0-9]+$/', $_POST["StockNuevo"]) && preg_match('/^[0-9.]+$/', $_POST["PrecioCompraNuevo"])&& preg_match('/^[0-9.]+$/', $_POST["VentaPrecioNuevo"])){
                        
                        //validacion imagen
                        $rutaFoto="vistas/imagenes/productos/default.png";
                        if(isset($_FILES["nuevaFotoProducto"]["tmp_name"])){

                            var_dump($_FILES["nuevaFotoProducto"]["tmp_name"]);
                            list($ancho, $alto) = getimagesize($_FILES["nuevaFotoProducto"]["tmp_name"]) ;/**crear nuevo array con indice asignados */
                           
                            $nuevoAncho = 500;
                            $nuevoALto = 500;
                            // crear carpeta para guardar las imagenes
                            $dir = "vistas/imagenes/productos/".$_POST["CodigoNuevo"]; /**crea carpeta con nombre de usuario pasado por variable post */
                            mkdir($dir,0755);
        
                            if($_FILES["nuevaFotoProducto"]["type"] == "image/jpeg"){
        
                                $aleatorio = mt_rand(100,999);
        
                                $rutaFoto ="vistas/imagenes/productos/".$_POST["CodigoNuevo"]."/".$aleatorio.".jpg";
        
                                $origen = imagecreatefromjpeg($_FILES["nuevaFotoProducto"]["tmp_name"]);
        
                                $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */
        
                                imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);
        
                                imagejpeg($destino,$rutaFoto);
        
        
        
        
                            }
        
                            if($_FILES["nuevaFotoProducto"]["type"] == "image/png"){
        
                                $aleatorio = mt_rand(100,999);
        
                                $rutaFoto ="vistas/imagenes/productos/".$_POST["CodigoNuevo"]."/".$aleatorio.".png";
        
                                $origen = imagecreatefrompng($_FILES["nuevaFotoProducto"]["tmp_name"]);
        
                                $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */
        
                                imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);
        
                                imagepng($destino,$rutaFoto);
        
        
        
        
                            }
        
                        }

                        // $fotoRuta= "vistas/imagenes/productos/default.png";
                        $tbl = "productos";
                        $dataProducto = array("id_categoria" => $_POST["CategoriaNueva"],
							   "codigo" => $_POST["CodigoNuevo"],
							   "descripcion" => $_POST["DescripcionNueva"],
							   "stock" => $_POST["StockNuevo"],
							   "precio_compra" => $_POST["PrecioCompraNuevo"],
							   "precio_venta" => $_POST["VentaPrecioNuevo"],
                               "imagen" => $rutaFoto);
                               

                               $resp = ProductoModelo::NuevoProductoModelo($tbl,$dataProducto);
                                if($resp){

                                    echo '<script>
                                    swal({
                                        text: "El nuevo producto fue creado exitosamente ",
                                            icon: "success",
                                           buttons: true,
                                           dangerMode: false,
                                               
                                       }).then((result)=>{
                                           if(result){
                                               window.location = "ventas";
                                                    }
                                                     }) ;
                               
                                        </script>';
                                }


                    }else{


                        echo '<script>
                        swal({
                            text: "No puede dejarse vacío  el campo producto ni tener  caracteres especiales !",
                            icon: "error",
                            buttons: true,
                             dangerMode: true,
                                 }).then((result)=>{
                                  if(result){
                                 window.location = "ProductosVista";
                               }
                            }) ;
                            </script>';
                    }
                }



                
        }




        
//editar producto

    static public function ProductosEditarContr(){
        if(isset($_POST["EditarDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])&& preg_match('/^[0-9]+$/', $_POST["StockEditar"]) && preg_match('/^[0-9.]+$/', $_POST["PrecioCompraEditar"])&& preg_match('/^[0-9.]+$/', $_POST["VentaPrecioEditar"])){
                
                //RUTA foto POR DEFECTO la que trajo de base datos
                $rutaFoto =$_POST["imagenSinEditar"];
                if(isset($_FILES["FotoProductoEditar"]["tmp_name"]) && !empty($_FILES["FotoProductoEditar"]["tmp_name"]) ){

                    var_dump($_FILES["FotoProductoEditar"]["tmp_name"]);
                    list($ancho, $alto) = getimagesize($_FILES["FotoProductoEditar"]["tmp_name"]) ;/**crear nuevo array con indice asignados */
                   
                    $nuevoAncho = 500;
                    $nuevoALto = 500;
                    // crear carpeta para guardar las imagenes
                    $dir = "vistas/imagenes/productos/".$_POST["CodigoEditar"]; /**crea carpeta con nombre de usuario pasado por variable post */

                    //si hay imagen traidad de la vases de datos y si esa imagen no e la  imagen por defecto eliminar imagen si no crea directorio con carpeta con codigo trido base datos
                    if(!empty($_POST["imagenSinEditar"]) && $_POST["imagenSinEditar"] != "vistas/imagenes/productos/default.png") {

                        unlink($_POST["imagenSinEditar"]);
                    }else{

                        mkdir($dir,0755);

                    }
                   
                    if($_FILES["FotoProductoEditar"]["type"] == "image/jpeg"){

                        $aleatorio = mt_rand(100,999);

                        $rutaFoto ="vistas/imagenes/productos/".$_POST["CodigoEditar"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["FotoProductoEditar"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);

                        imagejpeg($destino,$rutaFoto);




                    }

                    if($_FILES["FotoProductoEditar"]["type"] == "image/png"){

                        $aleatorio = mt_rand(100,999);

                        $rutaFoto ="vistas/imagenes/productos/".$_POST["CodigoEditar"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["FotoProductoEditar"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoALto); /**mantener propiedades del color de la imagen pero con nuevo ancho */

                        imagecopyresized($destino, $origen,0,0,0,0,$nuevoAncho,$nuevoALto,$ancho,$alto);

                        imagepng($destino,$rutaFoto);




                    }

                }

                // $fotoRuta= "vistas/imagenes/productos/default.png";
                $tbl = "productos";
                $dataProducto = array("id_categoria" => $_POST["CategoriaEditar"],
                       "codigo" => $_POST["CodigoEditar"],
                       "descripcion" => $_POST["EditarDescripcion"],
                       "stock" => $_POST["StockEditar"],
                       "precio_compra" => $_POST["PrecioCompraEditar"],
                       "precio_venta" => $_POST["VentaPrecioEditar"],
                       "imagen" => $rutaFoto);
                       

                       $resp = ProductoModelo::EditarProductoModelo($tbl,$dataProducto);
                        if($resp){

                            echo '<script>
                            swal({
                                text: "El nuevo producto fue editado exitosamente ",
                                    icon: "success",
                                   buttons: true,
                                   dangerMode: false,
                                       
                               }).then((result)=>{
                                   if(result){
                                       window.location = "ProductosVista";
                                            }
                                             }) ;
                       
                                </script>';
                        }


            }else{


                echo '<script>
                swal({
                    text: "No puede dejarse vacío  el campo producto ni tener  caracteres especiales !",
                    icon: "error",
                    buttons: true,
                     dangerMode: true,
                         }).then((result)=>{
                          if(result){
                         window.location = "ProductosVista";
                       }
                    }) ;
                    </script>';
            }
        }



        
}

static public function EliminarProductoControlador(){
    if(isset($_GET["ProdId"])){

        $tbl="productos";
        $ProductosData= $_GET["ProdId"];

       
        

        if($_GET["foto"] != "" && $_GET["foto"] != "vistas/imagenes/productos/default.png"){

                unlink($_GET["foto"]);
                rmdir('vistas/imagenes/productos/'.$_GET["codigo"]);

        }

        $resp =  ProductoModelo::BorrarProductoModelo($tbl,$ProductosData);
        
        if($resp){
        
        
            echo '<script>

            swal({
               
                
                text: "El producto ha sido borrado correctamente",
                icon: "success",
                buttons: true,
                dangerMode: true,
            
            }).then((result)=>{
                if(result){

                        window.location = "ProductosVista"; 
                }


                }) ;


            
            

            </script>';
          



            }




        }

    }

    static public function sumarCantidadVentas(){
            
        $tabla = "productos";

        $respuesta = ProductoModelo::sumaTotalCantVentas($tabla);

        return $respuesta;


    }




    }


    





?>