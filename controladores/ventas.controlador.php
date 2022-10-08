<?php

class VentasControlador{
    //mostrar ventas



    static public function verVentasControl($nomColumna,$val){
    $tbl ="ventas";
    $resp=  VentasModelos::VentasMostraModelo($tbl,$nomColumna,$val );

    return $resp;






    }




    // CREAR VENTA

    static public function NuevaVentaControlador(){


    if(isset($_POST["VentaNum"])){

        //actualizar comrpas del cliente y reducir stock de productos

        $productosLista = json_decode($_POST["listaProductos"],true);

        echo '<script>console.log('.$_POST["listaProductos"].');</script>';
      
        $totalProductosComprados = array();
        

      

        foreach ($productosLista  as $key => $value) {

            array_push($totalProductosComprados,$value["cantidad"]);//alamacena lac cantidad de cada ciclo

            // trae producto correspondiente al id
            $tblProducto = "productos";
            $id = "id";
            $valorId = $value["id"];
            $ProductoTraer = ProductoModelo::VerProductoModelo($tblProducto,$id,$valorId);

            // var_dump($ProductoTraer["ventas"]);
    
            $nombCol = "ventas";
            $val1= $value["cantidad"] + $ProductoTraer["ventas"];  //suma de lo que venga de productos lista  (json) mas lo traido de la base de datos(cantidad ventas tabla productos)
            $VentasNuevas = ProductoModelo::mdlActualizarProd($tblProducto,$nombCol, $val1, $valorId);

            $nombColB="stock";
            $val2=$value["stock"]; 


            $stockNuevo =  ProductoModelo::mdlActualizarProd($tblProducto,$nombColB,$val2, $valorId);

        }


        $Clientestabla = "clientes";
            $nomColumCliId = "id";
            $valorCLi = $_POST["Cliente"];
            $ClienteRespuesta = ClientesModelo::ClientesVerModelo($Clientestabla,$nomColumCliId,$valorCLi);

            $nomColumnComprasCli1 ="compras";
            $valorComprasCli1 = array_sum($totalProductosComprados) + $ClienteRespuesta["compras"];//se le suam todo el total de es compra más todo las compras ya registradas en la base de datos

            $ClienteCompras = ClientesModelo::mdlActualizarCliente($Clientestabla, $nomColumnComprasCli1,$valorComprasCli1,$valorCLi);
///////////////////////////////////////////reever////////////////////////////////////////
            
            // $nomColumnComprasCli2 ="compras";



            // $valorComprasCli2 = array_sum($totalProductosComprados) + $ClienteRespuesta["compras"];

            ///////////////////////////////////////////reever////////////////////////////////////////
            
            
            
            
            //se le suam todo el total de es compra más todo las compras ya registradas en la base de datos
        
            $NomColultimaCompra ="ultima_compra";

            date_default_timezone_set('America/Argentina/Buenos_Aires');

            $fecha = date('y-m-d');
            $hora = date('H:i:s');

            $valorUltimaCompraCli = $fecha.' '.$hora;

           
            $fechaCliente = ClientesModelo::mdlActualizarCliente($Clientestabla, $NomColultimaCompra,$valorUltimaCompraCli,$valorCLi);

            //guardar ventas

            $tblVentas= "ventas";



            $datos = array("id_vendedor"=>$_POST["VendedorId"],
            "id_cliente"=>$_POST["Cliente"],
            "codigo"=>$_POST["VentaNum"],
            "productos"=>$_POST["listaProductos"],
            "impuesto"=>$_POST["nuevoImpuestoPrecio"],
            "neto"=>$_POST["nuevoPrecioNeto"],
            "total"=>$_POST["totalVenta"],
            "metodo_pago"=>"Eectivo");

                $resp= VentasModelos::IngresarVentaModelo($tblVentas,$datos);

                if($resp){

                    echo '<script>
                    swal({
                        text: "La venta fue guardada exitosamente ",
                            icon: "success",
                           buttons: true,
                           dangerMode: false,
                               
                       }).then((result)=>{
                           if(result){
                            window.location = "ventas"
                              
                                    }
                                     }) ;
               
                        </script>';
                }




    }


    }



    
    // Editar VENTA

    static public function EditarVentaControlador(){
        
        //actualizar cantidad stock(productos),compras del cliente y fecha (tabla compras)


        if(isset($_POST["editarVenta"])){


     
           
            //formatear tabla de productos y la de clientes a valores anteriores a la venta

            //traer venta por codigo de venta una venta n particular
            $tabla = "ventas";
            $item = "codigo"; //codigo de la venta
            $valor = $_POST["editarVenta"];
            $traerVenta = VentasModelos::VentasMostraModelo( $tabla,$item,$valor);

            /// Revisar si vienen prodcutos editados

         

            if($_POST["listaProductos"]==""){ //si se volvió aguradar sin hacer cambios

                $listaProductos = $ $traerVenta["productos"];
                $cambioProducto = false;



            } else {

                $listaProductos = $_POST["listaProductos"];
                $cambioProducto = true;
            }

            if($cambioProducto){
                $productos = json_decode( $traerVenta["productos"],true);//es listado de productos de la venta almacenado en al base de tado

           


                //hasta aca bien
    
              
                $totalProductosComprados = array();
                foreach ( $productos as $key => $value){
    
                    array_push($totalProductosComprados,$value["cantidad"]);
    
                    $tablaProductos = "productos";
                    //traer producto
                    $item = "id";
                    $valor = $value["id"];
                    $traerProducto = ProductoModelo::VerProductoModelo($tablaProductos,$item,$valor);
    
                     ////                               
                     $item1a  = "ventas";
                     $valor1a= $traerProducto["ventas"] - $value["cantidad"] ;  //restuara ventas a valor anterios
                    //  var_dump($valor["cantidad"] );
                    //  var_dump($ProductoTraer["ventas"]);
                    //  var_dump( $val1);
    
                    //actualiza el total de ventas tabla ventas
                    $nuevasVentas = ProductoModelo::mdlActualizarProd(
                        $tablaProductos,$item1a , $valor1a, $valor); //hasta acá funciona
    
                 
    /////////////////
                    $item1b ="stock";
                    $valor1b =$value["cantidad"] + $traerProducto["stock"];
                    // $valor1b =$value["cantidad"] ;
                     //después  la actualizacion en el modelo stock debería venir con cambios
                    // var_dump($ProductoTraer["stock"]);
                    // var_dump($valor["cantidad"] );
                    // // var_dump($_POST["nuevaCantidadProducto"] );
                    // var_dump($val2);
        
                    $nuevoStock =  ProductoModelo::mdlActualizarProd($tablaProductos, $item1b, $valor1b, $valor);
    
    
    
    
                }
    
                    $tablaClientes = "clientes";

				    $itemCliente = "id";
				    $valorCliente = $_POST["Cliente"];
                    $traerCliente  = ClientesModelo::ClientesVerModelo($tablaClientes, $itemCliente, $valorCliente);
                 
    
    
    
                    $item1a = "compras";
                    $valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);
                    // $valor1a = array_sum($totalProductosComprados) +  $traerCliente["compras"];
                   $comprasCliente = ClientesModelo::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);
    
    
        
    //////////////////////////////////////////////////////////////////////////////////////////////////  //actualizar compras del cliente y reducir stock de productos
    
    
        
                $listaProductos_2 = json_decode($listaProductos, true);
                
        
               
				$totalProductosComprados_2 = array();
        
              
        
                foreach ($listaProductos_2 as $key => $value) {
        
                    
					array_push($totalProductosComprados_2, $value["cantidad"]);
                    $tablaProductos_2 = "productos";
                    $item_2 = "id";
					$valor_2 = $value["id"];

                    $traerProducto_2  = ProductoModelo::VerProductoModelo($tablaProductos_2, $item_2, $valor_2);
        
                    
            
                    $item1a_2 = "ventas";
					$valor1a_2 = $value["cantidad"] + $traerProducto_2["ventas"];  //suma de lo que venga de productos lista  (json) mas lo traido de la base de datos(cantidad ventas tabla productos)
                    // var_dump($value["cantidad"] );
                    // var_dump($ProductoTraer_2["ventas"] );
    
                    // var_dump($ProductoTraer_2);
                    $nuevasVentas_2= ProductoModelo::mdlActualizarProd($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);
        
                    $item1b_2 = "stock";
					$valor1b_2 = $traerProducto_2["stock"] - $value["cantidad"];

                   
                 
        
                    
					$nuevoStock_2 =  ProductoModelo::mdlActualizarProd($tablaProductos_2, $item1b_2, $valor1b_2, $valor_2 );
                   
    
        
                }
        
        
                $tablaClientes_2= "clientes";
                    $item_2 = "id";
                    $valor_2 = $_POST["Cliente"];
                    $traerCliente_2 = ClientesModelo::ClientesVerModelo($tablaClientes_2, $item_2, $valor_2);
        
                    $item1a_2 ="compras";
                    $valor1a_2 =  array_sum($totalProductosComprados_2) + $traerCliente_2["compras"];//se le suam todo el total de es compra más todo las compras ya registradas en la base de datos
                    $comprasCliente_2 = ClientesModelo::mdlActualizarCliente($tablaClientes_2, $item1a_2, $valor1a_2, $valor_2);
        
                    $item1b_2  ="ultima_compra";
                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $fecha_2 = date('y-m-d');
                    $hora_2 = date('H:i:s');
        
                    $valor1b_2 = $fecha_2.' '.$hora_2;

                    $fechaCliente_2 =ClientesModelo::mdlActualizarCliente($tablaClientes_2, $item1b_2, $valor1b_2, $valor_2);


                    // $valorComprasCli2_2 = array_sum($totalProductosComprados_2) + $ClienteRespuesta_2["compras"];//se le suam todo el total de es compra más todo las compras ya registradas en la base de datos
                
                    // $NomColultimaCompra_2 ="ultima_compra";
        
                    
        
                    
        
                   
                    // $ClienteCompras_2 = ClientesModelo::mdlActualizarCliente($Clientestabla_2, $NomColultimaCompra_2,$valorUltimaCompraCli_2,$valorId);
    
                  
        
                    // $tblVentas_2= "ventas";



                ///
            }


                //guardar cambios de la compra
                echo '<script>console.log("el neto es: '.$_POST["nuevoPrecioNeto"].'");</script>';
                echo '<script>console.log("el iva es: '.$_POST["nuevoImpuestoPrecio"].'");</script>';
                echo '<script>console.log("total: '.$_POST["totalVenta"].'");</script>';
             

    
                $datos = array("id_vendedor"=>$_POST["VendedorId"],
                "id_cliente"=>$_POST["Cliente"],
                "codigo"=>$_POST["editarVenta"],
                "productos"=>$listaProductos,
                "impuesto"=>$_POST["nuevoImpuestoPrecio"],
                "neto"=>$_POST["nuevoPrecioNeto"],
                "total"=>$_POST["totalVenta"],
                "metodo_pago"=>"Efectivo");
    
                $respuesta = VentasModelos::VentasModeloEditar($tabla, $datos
                );
    
                    if($respuesta){
    
                        echo '<script>
                        swal({
                            text: "La venta fue editada exitosamente ",
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
    
    
    
    
        }
    
    
        }





        
static public function EliminarVentaControlador(){

    if(isset($_GET["idVenta"])){

        $tabla = "ventas";
        $item = "id";
        $valor = $_GET["idVenta"];
            //correspondiente a la fecha que se va a borrar
        $traerVenta =  VentasModelos::VentasMostraModelo($tabla, $item, $valor);

        $tablaClientes = "clientes";
        ///actulizar fecha ultima compra

        //taer todas las ventas

        $itemVentas = null;
		$valorVentas = null;

        $traerVentas = VentasModelos::VentasMostraModelo($tabla, $itemVentas, $valorVentas);
        
        
		$guardarFechas = array();
        foreach ($traerVentas as $key => $value) {
				
            if($value["id_cliente"] == $traerVenta["id_cliente"]){ 

                array_push($guardarFechas, $value["fecha"]);//guardar fechas que coinciden (mismo id_cliente) en un array

            }
            
            //actualizar valor de la ultima compra después de borra ultima compra
            if(count($guardarFechas) > 1){ //si hay más de de una coincidencia de fechas o sea  varias fechas guardadas en el array o por lo menos una

                if($traerVenta["fecha"] > $guardarFechas[count($guardarFechas)-2]){ //si la fecha de la venta que esta borrando es mayor a la fecha de la penultima compra  o mas vieja aun 

					$item = "ultima_compra";
					$valor = $guardarFechas[count($guardarFechas)-2]; //guardar como de la ultima compra la de la penultima compra
					$valorIdCliente = $traerVenta["id_cliente"];

					$comprasCliente = ClientesModelo::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);

				} else{
                        //si la ultima compra es menor dejar como fecha de la ultima compra el ultimo elemento del array
					$item = "ultima_compra";
					$valor = $guardarFechas[count($guardarFechas)-1];//ultima cormpra
					$valorIdCliente = $traerVenta["id_cliente"];

					$comprasCliente = ClientesModelo::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);

				}















            } else {

                //si solo ten+ia una compra añ borrar volvemos poner todo en cero


                $item = "ultima_compra";
				$valor = "0000-00-00 00:00:00";
				$valorIdCliente = $traerVenta["id_cliente"];

				$comprasCliente = ClientesModelo::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);






            } 


        ///formatear tabla productos reaturar a valor  anteiro a que exista la venta

        
			$productos =  json_decode($traerVenta["productos"], true);

			$totalProductosComprados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);
				
				$tablaProductos = "productos";

				$item = "id";
				$valor = $value["id"];

				$traerProducto = ProductoModelo::VerProductoModelo($tablaProductos, $item, $valor);

                //restaura el numero de ventas restando la cantidad de la venta eliminada  al total de ventas

                $item1a = "ventas";
                //al  total de ventas de  tabla productos le restamos la  cantidad del producto que le estamos eliminando
                $valor1a = $traerProducto["ventas"] - $value["cantidad"];
                

				$nuevasVentas = ProductoModelo::mdlActualizarProd($tablaProductos, $item1a, $valor1a, $valor);

                 //restaura el stock sumando la cantidad de la venta eliminada  al total deñ stock

                $item1b = "stock";
                
                $valor1b = $value["cantidad"] + $traerProducto["stock"]; //volver a agregar la cantidad del producto eliminado al stock
                
                //echo '<script>console.log("stock :"'.$traerProducto["stock"].');</script>';
                //echo '<script>console.log("cantidad :"'.$value["cantidad"].');</script>';

				$nuevoStock = ProductoModelo::mdlActualizarProd($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaClientes = "clientes";

			$itemCliente = "id";
			$valorCliente = $traerVenta["id_cliente"];

			$traerCliente = ClientesModelo::ClientesVerModelo($tablaClientes, $itemCliente, $valorCliente);

			$item1c = "compras";
			$valor1c = $traerCliente["compras"] - array_sum($totalProductosComprados);

            $comprasCliente = ClientesModelo::mdlActualizarCliente($tablaClientes, $item1c, $valor1c, $valorCliente);
            


            //borrar venta

            $respuesta = VentasModelos::BorraVentaModelo($tabla, $_GET["idVenta"]);

			if($respuesta == "ok"){




                echo '<script>

                swal({
                   
                    
                    text: "La venta  ha sido borrado correctamente",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                
                }).then((result)=>{
                    if(result){
    
                            window.location = "ventas"; 
                    }
    
    
                    }) ;
    
    
                
                
    
                </script>';















            }



    }




}

}

   ///formatear tabla productos reaturar a valor  anteiro a que exista la venta
   static public function sumarTotalVentas(){
        
    $tabla = "ventas";

        $respuesta = VentasModelos::sumaTotalVentas($tabla);

        return $respuesta;


    }

    


}



?>