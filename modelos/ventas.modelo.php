<?php
require_once "conexion.php";

class VentasModelos{

    static public function VentasMostraModelo($tbl, $nomColumna, $valor){
        $conexionz = new Conexion();

		if($nomColumna != null){
                //muestra una venta en particular
            
            

			$query =  $conexionz->conectar()->prepare("SELECT * FROM $tbl WHERE $nomColumna = :$nomColumna ORDER BY id ASC");

			$query -> bindParam(":".$nomColumna, $valor, PDO::PARAM_STR);

			$query -> execute();

			return $query -> fetch();

		}else{
                //muestra todos
			$query = $conexionz->conectar()->prepare("SELECT * FROM $tbl ORDER BY id ASC");

			$query -> execute();

			return $query -> fetchAll();

		}
		
		$query -> close();

		$query = null;

	}

	//registrar venta

	static public function IngresarVentaModelo($tbl,$data ){

		$conexionz = new Conexion();
		$query = $conexionz->conectar()->prepare("INSERT INTO $tbl (codigo, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

		$query->bindParam(":codigo", $data["codigo"], PDO::PARAM_INT);
		$query->bindParam(":id_cliente", $data["id_cliente"], PDO::PARAM_INT);
		$query->bindParam(":id_vendedor", $data["id_vendedor"], PDO::PARAM_INT);
		$query->bindParam(":productos", $data["productos"], PDO::PARAM_STR);
		$query->bindParam(":impuesto", $data["impuesto"], PDO::PARAM_STR);
		$query->bindParam(":neto", $data["neto"], PDO::PARAM_STR);
		$query->bindParam(":total", $data["total"], PDO::PARAM_STR);
		$query->bindParam(":metodo_pago", $data["metodo_pago"], PDO::PARAM_STR);


				if($query->execute()){

					return "ok";

				}else{

					return "error";
				
				}

				$query->close();
				$query = null;

	}
//editarr ventas

static public function VentasModeloEditar($tabla,$datos ){

	$conexionz = new Conexion();
	$query = $conexionz->conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");


	$query->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
	$query->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
	$query->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
	$query->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
	$query->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
	$query->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
	$query->bindParam(":total", $datos["total"], PDO::PARAM_STR);
	$query->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

	if($query->execute()){

		return "ok";

	}else{

		return "error";
	
	}

	$query->close();
	$query = null;


}



static public function BorraVentaModelo($tabla, $datos){
	
	$conexionz = new Conexion();
	
	
	$query = $conexionz->conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

	$query -> bindParam(":id", $datos, PDO::PARAM_INT);

	if($query -> execute()){

		return "ok";
	
	}else{

		return "error";	

	}

	$query -> close();

	$query = null;

}

static public function sumaTotalVentas($tabla){
	$conexionz = new Conexion();
	


	$stmt = $conexionz->conectar() -> prepare("SELECT SUM(neto) as total FROM $tabla");
	$stmt -> execute();
	return $stmt -> fetch();

	$stmt -> close();
	$stmt = null;

}




}






?>