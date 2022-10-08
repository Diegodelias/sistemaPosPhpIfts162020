

<?php

session_start();


require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class ProductosTabla{

        public function verTablaProductos(){

                $nomColumna = null;
                $val = null;


                $prod = ProductosControlador::VerProductosControlador($nomColumna,$val);
                // var_dump($prod);

           
                $JsonData = '{
                        "data": [';
                        
                        for($i = 0; $i < count($prod); $i++){
                                $foto = "<img src='".$prod[$i]["imagen"]."'  width='50px'>";
                                $nomColumna = "id";
                                $val = $prod[$i]["id_categoria"];
    
                                $catResp = CatControlador::VerCategoriasControlador($nomColumna,$val);

                                if($prod[$i]["stock"]<=4){
                                        $varStock = "<button class='btn btn-outline-danger'>".$prod[$i]["stock"]."</button>";
                                } else if ($prod[$i]["stock"]>=5 && $prod[$i]["stock"] <= 10){

                                        $varStock = "<button class='btn btn-outline-warning'>".$prod[$i]["stock"]."</button>";

                                }else{
                                        $varStock = "<button class='btn btn-outline-success'>".$prod[$i]["stock"]."</button>";

                                }
                        
                                $botonera ="    <div class='btn-group'><button class='btn btn-outline-secondary btnProductoEditar' productoId='".$prod[$i]["id"]."' data-toggle='modal' data-target='#ProductoEditarModal'><i class='fas fa-pencil-alt' ></i></button><button class='btn btn-outline-secondary EliminarBtnProducto'  productoId='".$prod[$i]["id"]."'  codigo='".$prod[$i]["codigo"]."' foto='".$prod[$i]["imagen"]."' ><i class='fas fa-trash'></i></button></div>"; 
                                                
                                
                                $JsonData .='
                                [
                                        "'.($i + 1).'",
                                        "'.$foto.'",
                                        "'.$prod[$i]["codigo"].'",
                                        "'.$prod[$i]["descripcion"].'",
                                        "'. $catResp["categoria"].'",
                                        "'.$varStock .'",
                                        "'.$prod[$i]["precio_compra"].'",
                                        "'.$prod[$i]["precio_venta"].'",
                                        "'.$prod[$i]["fecha"].'",
                                        "'.$botonera.'"
                                ],';
                                
                                


                        }

                        $JsonData = substr($JsonData, 0,-1); //elimina la coma al final del ultimo elemento del json

                        $JsonData .=  ']
                
                }';
      
                echo  $JsonData;

              

      




        }

}



        //avitavar tablaproudctos

        $ProductActivar = new ProductosTabla();
        $ProductActivar-> verTablaProductos(); 
        





?>