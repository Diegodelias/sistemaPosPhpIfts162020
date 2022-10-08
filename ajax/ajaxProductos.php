<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";



class ProductosAjax{

    public $CategoriaId;
    public $productosTraer;
    public $ProductoNom;
    public function CrearProductoCodigo(){
        
        $nomColumna = "id_categoria";
        $val = $this->CategoriaId;


        $resp = ProductosControlador::VerProductosControlador($nomColumna,$val);

        echo json_encode($resp); //convierta json la respuesta


        //para editar producto

     


    }
    

    
    public $ProductoId;


    public function EditProdAjax(){

        if($this->productosTraer ){
           //con nomcolumna null y val null va traer todos
            $nomColumna = null;
            $val = null;
    
            $resp = ProductosControlador::VerProductosControlador($nomColumna,$val);
    
    
            echo json_encode($resp);


        }
         else if($this->ProductoNom != ""){
            $nomColumna = "descripcion";
            $val = $this->ProductoNom;
    
            $resp = ProductosControlador::VerProductosControlador($nomColumna,$val);
    
    
            echo json_encode($resp);




            
        }
        
        else{
            //tra un solo prdoducto  se la que se usa al agregar un botonm
            $nomColumna = "id";
            $val = $this->ProductoId;
    
            $resp = ProductosControlador::VerProductosControlador($nomColumna,$val);
    
    
            echo json_encode($resp);







        }
      

    }

}
if(isset($_POST["CategoriaId"])){

    $ProductosCodigo = new ProductosAjax();
    $ProductosCodigo ->CategoriaId = $_POST["CategoriaId"];//parametro que se pasa por post desde productos.js
    $ProductosCodigo->CrearProductoCodigo();


}




if(isset($_POST["productoId"])){

    $ProductosCodigo = new ProductosAjax();
    $ProductosCodigo ->ProductoId = $_POST["productoId"];//parametro que se pasa por post desde productos.js
    $ProductosCodigo->EditProdAjax();


}

//traer productos

if(isset($_POST["productosTraer"])){

    $productosTraer = new ProductosAjax();
    $productosTraer -> productosTraer = $_POST["productosTraer"];// es un ok
    $productosTraer -> EditProdAjax();


}



//

// if(isset($_POST["ProductoNom"])){

//     $productoNom = new ProductosAjax();
//     $productoNom -> ProductoNom = $_POST["ProductoNom"];
//     $productoNom -> EditProdAjax();


// }

?>