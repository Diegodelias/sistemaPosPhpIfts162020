
<?php
require_once "conexion.php";

class ClientesModelo {
    static public function NuevoClienteModelo($ClienteData){
        try {
        $conexionz = new Conexion();

        $query = $conexionz->conectar()->prepare("INSERT INTO clientes (nombre, documento, email, telefono, direccion ) VALUES (:nombre,:documento, :email, :telefono,:direccion )");

        $query->bindParam(":nombre", $ClienteData["ClienteNombre"], PDO::PARAM_STR);
        $query->bindParam(":documento", $ClienteData["ClienteDni"], PDO::PARAM_INT);
        $query->bindParam(":email", $ClienteData["ClienteEmail"], PDO::PARAM_STR);
        $query->bindParam(":telefono", $ClienteData["Clientetelefono"], PDO::PARAM_STR);
        $query->bindParam(":direccion", $ClienteData["Clientedireccion"], PDO::PARAM_STR);
        // $query->bindParam(":fecha_nacimiento", $ClienteData["ClienteFechaNacimiento"], PDO::PARAM_STR);
        if($query->execute()){
            return true;
        }else {
            return false;
                }
            $query->close();
            $query = null;

}
     catch  (Exception $e){

        echo $e->getMessage();
        die();



    }


}

static public function ClientesVerModelo($tbl,$nomColumna,$val){



        if($nomColumna != null){
            $conexionz = new Conexion();
            $query = $conexionz->conectar()->prepare("SELECT * FROM $tbl WHERE $nomColumna = :$nomColumna");
            $query -> bindParam(":".$nomColumna,$val, PDO::PARAM_STR);
            $query -> execute();
            return $query -> fetch();
    
        }else{
            $conexionz = new Conexion();
            // muestra todo lo de la tabla
            $query = $conexionz->conectar()->prepare("SELECT * FROM $tbl");
            $query -> execute();
            return $query -> fetchAll();
    
        }
    
        $query -> close();
        $query = null;

    }


    // editar cliente

    static public function EditarClienteModelo($ClienteData){
        try {
        $conexionz = new Conexion();

        $query = $conexionz->conectar()->prepare("UPDATE clientes SET nombre = :nombre, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion WHERE id = :id ");

        // $query = $conexionz->conectar()->prepare("INSERT INTO clientes (nombre, documento, email, telefono, direccion) VALUES (:nombre,:documento, :email, :telefono,:direccion  )");

        // $cliente = "Miguelito2";
        // $dni = "2343545";
        // $mail = "miguelito@gmail.com";
        // $telefono = "2323232";
        // $direccion = "avenida de la chota 12323";
       

        $query->bindParam(":id", $ClienteData["id"], PDO::PARAM_INT);
        $query->bindParam(":nombre", $ClienteData["ClienteEditado"], PDO::PARAM_STR);
        $query->bindParam(":documento", $ClienteData["ClienteDni"], PDO::PARAM_INT);
        $query->bindParam(":email", $ClienteData["ClienteEmail"], PDO::PARAM_STR);
        $query->bindParam(":telefono", $ClienteData["Clientetelefono"], PDO::PARAM_STR);
        $query->bindParam(":direccion", $ClienteData["Clientedireccion"], PDO::PARAM_STR);
      
      


        if($query->execute()){
            return true;
    
    
        }else {
    
            return false;
            
          
    
        }
    
        
            $query->close();
            $query = null;
    
      



}
     catch  (Exception $e){

        echo $e->getMessage();
        die();



    }


}


/**eliminar cliente */
static public function BorrarClienteModelo($tbl,$data){

    
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







///catualizar clientes

static public function mdlActualizarCliente($tabla, $item1,$valor1,$id){/**METOD PARA ACTUALIZAR ESTADO DEL USUARIO EN LA BASE DE DATOS */
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











}

?>