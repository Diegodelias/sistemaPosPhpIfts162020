

<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class ProductosTablaVentas{

        public function verTablaProductosVentas(){

                $nomColumna = null;
                $val = null;


                $prod = ProductosControlador::VerProductosControlador($nomColumna,$val);
                // var_dump($prod);

           
                $JsonData = '{
                        "data": [';
                        
                        for($i = 0; $i < count($prod); $i++){
                                
                                if($prod[$i]["stock"]>0){

                                        $foto = "<img src='".$prod[$i]["imagen"]."'  width='50px'>";
                                

                                        if($prod[$i]["stock"]<=10){
                                                $varStock = "<button class='btn btn-outline-danger'>".$prod[$i]["stock"]."</button>";
                                        } else if ($prod[$i]["stock"]>11 && $prod[$i]["stock"] <= 15){

                                                $varStock = "<button class='btn btn-outline-warning'>".$prod[$i]["stock"]."</button>";


                                        }else{
                                                $varStock = "<button class='btn btn-outline-success'>".$prod[$i]["stock"]."</button>";


                                        }
                                        

                                                        
                                        $botonera ="<div class='btn-group'><button class='btn btn-primary  reactivarBoton ProductoAgregar'  idProducto='".$prod[$i]["id"]."'>Agregar</button></div>";


                                        $JsonData .='
                                        [
                                                "'.($i + 1).'",
                                                "'.$foto.'",
                                                "'.$prod[$i]["codigo"].'",
                                                "'.$prod[$i]["descripcion"].'",
                                        
                                                "'.$varStock .'",
                                        
                                                "'.$botonera.'"
                                        ],';
                                
                                }


                        }

                        $JsonData = substr($JsonData, 0,-1); //elimina la coma al final del ultimo elemento del json

                        $JsonData .=  ']
                
                }';
      
                echo  $JsonData;

              

      




        }

}



        //avitavar tablaproudctos

        $ProductVentasActivar = new ProductosTablaVentas();
        $ProductVentasActivar-> verTablaProductosVentas(); 
        





?>