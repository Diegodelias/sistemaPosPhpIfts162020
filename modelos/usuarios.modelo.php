<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){ /**en hosting poner static */

		$conexionz = new Conexion();

		if($item !=null){ 
			
			/**condición para cuando se muestra la fila con los daots de un solo usuario */
			$stmt = $conexionz->conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			// $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
	
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
	
			$stmt -> execute();
	
			return $stmt -> fetch(); /**retorna y un sola fila de la base de datos */



		} else {

			$stmt = $conexionz->conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();
	
			return $stmt -> fetchAll(); /**retorna todas la filas todos los usuarios */


	

		}

		

		$stmt->close();
		$stmt = null;


	}

	

	// registro de usuario

	
	static public function mdlIngresarUsuario($tabla, $datos){
		try {
		$conexionz = new Conexion();
		$stmt = $conexionz->conectar()->prepare("INSERT INTO $tabla(nombre,usuario,password,perfil, foto) VALUES(:nombre,:usuario,:password,:perfil,:foto)");

		$stmt -> bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario",$datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos['password'], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos['foto'], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";


		}else {

			return "error";
	
		}

		
		}catch (Exception $e) {
			echo $e->getMessage();
			die();
		}

	}


	//metodo editar usuario

	static public function mdlEditarUsuario($tabla, $datos){

		$conexionz = new Conexion();
		
		$stmt = $conexionz->conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");
		// $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";


		}else {

			return "error";
	
		}

		$stmt->close();
		$stmt = null;


	}




	static public function mdlActualizarUsuario($tabla, $item1,$valor1,$item2,$valor2){/**METOD PARA ACTUALIZAR ESTADO DEL USUARIO EN LA BASE DE DATOS */
		$conexionz = new Conexion();
		// item1 estado, item2 id  se actualizar id de la tabla
		$stmt = $conexionz->conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2"); /**va actualizar el estado correspondiente al id que se le pas por parametro */
		
		$stmt -> bindParam(":".$item1,$valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2,$valor2, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		} else{
			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}


// Borrar Usuario


static public function mdlBorrarUsuario($tabla, $datos){

	$conexionz = new Conexion();

	$stmt = $conexionz->conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
	$stmt -> bindParam(":id",$datos, PDO::PARAM_INT); /**BINDEA parmetro  datos con
	"id" en la consulta */


	if($stmt -> execute()){
		return "ok";
	} else{
		return "error";

	}

	$stmt -> close();
	$stmt = null;

}

	

}