<?php

require_once "conexion.php";

class ProductoModelo{


    static public function VerProductoModelo($tbl,$nomColumna,$val){

            if($nomColumna != null){
                
                $conexionz = new Conexion();
                $query = $conexionz->conectar()->prepare("SELECT * FROM $tbl WHERE $nomColumna = :$nomColumna ORDER BY id DESC");
                $query -> bindParam(":".$nomColumna,$val, PDO::PARAM_STR);
                $query -> execute();
                return $query -> fetch();


            }else{

                $conexionz = new Conexion();

                $query = $conexionz->conectar()->prepare("SELECT * FROM $tbl");
                $query -> execute();
                return $query -> fetchAll();
        


            }

            $query -> close();
            $query = null;

    }

    static public function VerProductoModeloOrdenados($tbl,$nomColumna, $orden){
            
        $conexionz = new Conexion();
        $query = $conexionz->conectar()->prepare("SELECT * FROM $tbl ORDER BY $nomColumna $orden");
        $query -> execute();
        return $query -> fetchAll();

        $query -> close();
        $query = null;

}


    static public function NuevoProductoModelo($tbl, $dataProducto){
        $conexionz = new Conexion();
        $query = $conexionz->conectar()->prepare("INSERT INTO $tbl (id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta ) VALUES (:id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta )");

        $query->bindParam(":id_categoria", $dataProducto["id_categoria"], PDO::PARAM_INT);
        $query->bindParam(":codigo", $dataProducto["codigo"], PDO::PARAM_STR);
        $query->bindParam(":descripcion", $dataProducto["descripcion"], PDO::PARAM_STR);
        $query->bindParam(":imagen", $dataProducto["imagen"], PDO::PARAM_STR);
        $query->bindParam(":stock", $dataProducto["stock"], PDO::PARAM_INT);
        $query->bindParam(":precio_compra", $dataProducto["precio_compra"], PDO::PARAM_STR);
        $query->bindParam(":precio_venta", $dataProducto["precio_venta"], PDO::PARAM_STR);

                if($query->execute()){
                    return true;
                }else {
                    return false;
                        }
                    $query->close();
                    $query = null;

    }



//editar producto

    static public function EditarProductoModelo($tbl, $dataProducto){
        $conexionz = new Conexion();
        $query = $conexionz->conectar()->prepare("UPDATE $tbl SET id_categoria = :id_categoria, codigo = :codigo, descripcion = :descripcion, imagen =  :imagen, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta  WHERE codigo = :codigo ");

        $query->bindParam(":id_categoria", $dataProducto["id_categoria"], PDO::PARAM_INT);
        $query->bindParam(":codigo", $dataProducto["codigo"], PDO::PARAM_STR);
        $query->bindParam(":descripcion", $dataProducto["descripcion"], PDO::PARAM_STR);
        $query->bindParam(":imagen", $dataProducto["imagen"], PDO::PARAM_STR);
        $query->bindParam(":stock", $dataProducto["stock"], PDO::PARAM_INT);
        $query->bindParam(":precio_compra", $dataProducto["precio_compra"], PDO::PARAM_STR);
        $query->bindParam(":precio_venta", $dataProducto["precio_venta"], PDO::PARAM_STR);

                if($query->execute()){
                    return true;
                }else {
                    return false;
                        }
                    $query->close();
                    $query = null;

    }



    static public function BorrarProductoModelo($tbl, $dataProducto){
        $conexionz = new Conexion();

        $query = $conexionz->conectar()->prepare("DELETE FROM $tbl WHERE id = :id");
        $query -> bindParam(":id",$dataProducto, PDO::PARAM_INT); /**BINDEA parmetro  datos con
        "id" en la consulta */
        
    
        if($query->execute()){
            return true;
    
    
        }else {
    
            return false;
    
        }
    
        
            $query->close();
            $query = null;
    

    }






    static public function mdlActualizarProd($tabla, $item1,$valor1,$id){
        $conexionz = new Conexion();
        // item1 estado, item2 id  se actualizar id de la tabla
        $stmt = $conexionz->conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id"); /**va actualizar el estado correspondiente al id que se le pas por parametro */
        
        $stmt -> bindParam(":".$item1,$valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":id",$id, PDO::PARAM_STR);
        if($stmt -> execute()){
            return "ok";
        } else{
            return "error";
    
        }
    
        $stmt -> close();
        $stmt = null;
    
    }

    static public function sumaTotalCantVentas($tabla){
        $conexionz = new Conexion();

        $stmt = $conexionz->conectar() -> prepare("SELECT SUM(ventas) as total FROM $tabla");
        $stmt -> execute();
        return $stmt -> fetch();
    
        $stmt -> close();
        $stmt = null;
    
    }
    
    

















}


//Actualizar producto
















?>