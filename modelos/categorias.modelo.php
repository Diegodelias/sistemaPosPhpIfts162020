<?php
require_once "conexion.php";


/**crear categoria */

class CategoriaModelo{

static public function NuevaCategoriaModelo($tbl,$data){

    $conexionz = new Conexion();

    $query = $conexionz->conectar()->prepare("INSERT INTO $tbl(categoria) VALUES(:categoria)");

    $query -> bindParam(":categoria",$data, PDO::PARAM_STR);

    if($query->execute()){
        return true;


    }else {

        return false;

    }

    
		$query->close();
		$query = null;


}


static public function VerCategoriasModelo($tbl,$nomColumna,$val){
    if($nomColumna != null){
        $conexionz = new Conexion();
        $query = $conexionz->conectar()->prepare("SELECT * FROM $tbl WHERE $nomColumna = :$nomColumna");
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

static public function EditarCategoriaModelo($tbl,$data){

    $conexionz = new Conexion();

    $query = $conexionz->conectar()->prepare("UPDATE $tbl SET categoria = :categoria WHERE id =:id");

    $query -> bindParam(":categoria",$data["categoria"], PDO::PARAM_STR);
    $query -> bindParam(":id",$data["id"], PDO::PARAM_INT);

    if($query->execute()){
        return true;


    }else {

        return false;

    }

    
		$query->close();
		$query = null;


}

    
// borrar categoria
static public function BorrarCategoriaModelo($tbl,$data){

    $conexionz = new Conexion();

	$query = $conexionz->conectar()->prepare("DELETE FROM $tbl WHERE id = :id");
	$query -> bindParam(":id",$data, PDO::PARAM_INT); /**BINDEA parmetro  datos con
    "id" en la consulta */
    

    if($query->execute()){
        return true;


    }else {

        return false;

    }

    
		$query->close();
		$query = null;

}

}

?>