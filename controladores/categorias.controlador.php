<?php


class CatControlador{
        /***metodo crear categorias */

        static public function NuevaCatControlador(){

            if(isset($_POST["CategoriaNueva"])){
                
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["CategoriaNueva"])){/** permite de a a z minuscula y mayuscula numero del 0 al nueve y caracteres latinos en minuscula y mayuscula y espacio en blanco */
                
                $data = $_POST["CategoriaNueva"];
                $tbl = "categorias";
                
                $resp = CategoriaModelo::NuevaCategoriaModelo($tbl,$data);

                if($resp){

                    echo '<script>

                    swal({
                       
                        
                        text: "El categoria ha sido guardada correctamente ",
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    
                    }).then((result)=>{
                        if(result){
    
                                window.location = "categorias";
                        }
    
    
                        }) ;
    
        
                    
                    
    
                    </script>';
    




                }else {

                    
                }



            }else{

                
                echo '<script>

                swal({
                   
                    
                    text: "La categoría  no puede ir vacía o llevar caracteres especiales!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                
                }).then((result)=>{
                    if(result){

                            window.location = "categorias";
                    }


                    }) ;

                </script>';

            }
        }

        }

        static public function VerCategoriasControlador($nomColumna,$val){
            $tbl = "categorias";
            
            $resp = CategoriaModelo::VerCategoriasModelo($tbl,$nomColumna,$val);
            return $resp;

        }


/**Editar categoria */
        
        static public function EditarCategoriaControlador(){

            if(isset($_POST["CategEditar"])){
                
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["CategEditar"])){/** permite de a a z minuscula y mayuscula numero del 0 al nueve y caracteres latinos en minuscula y mayuscula y espacio en blanco */
                

               
                $data = array("categoria" => $_POST["CategEditar"],
                 "id"=>$_POST["CatId"] );
                 $tbl = "categorias";
                $resp = CategoriaModelo::EditarCategoriaModelo($tbl,$data);

                if($resp){

                    echo '<script>

                    swal({
                       
                        
                        text: "El categoria ha sido cambiada correctamente ",
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    
                    }).then((result)=>{
                        if(result){
    
                                window.location = "categorias";
                        }
    
    
                        }) ;
    
        
                    
                    
    
                    </script>';
    




                }



            }else{

                
                echo '<script>

                swal({
                   
                    
                    text: "La categoría  no puede ir vacía o llevar caracteres especiales!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                
                }).then((result)=>{
                    if(result){

                            window.location = "categorias";
                    }


                    }) ;

                </script>';

            }
        }

        }




        static function EliminarCategoriaControlador(){

            if(isset($_GET["CatId"])){
                
                $data=$_GET["CatId"];
                $tbl="categorias";
           
                $resp = CategoriaModelo::BorrarCategoriaModelo($tbl,$data);
        
                if($resp){
        
        
                    echo '<script>
        
                    swal({
                       
                        
                        text: "La categoria ha sido borrado correctamente",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    
                    }).then((result)=>{
                        if(result){
        
                                window.location = "categorias"; 
                        }
        
        
                        }) ;
        
        
                    
                    
        
                    </script>';
                  
        
        
        
                }
        
        
        
            }
        }
        


}





?>