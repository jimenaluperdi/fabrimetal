<?php  

require_once 'conexion.php';

class DataEmpleado {
	const TABLA = 'empleados';

	public function insertar($nombre, $dni, $direccion, $telefono, $cargo){

		$conexion = new conexion ();

		$consulta = $conexion->prepare ('INSERT INTO ' . self::TABLA . ' (nombre, dni, direccion, telefono, cargo) values (:nombre, :dni, :direccion, :telefono, :cargo)');

		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':dni', $dni);
		$consulta->bindParam(':direccion', $direccion);
		$consulta->bindParam(':telefono', $telefono);
		$consulta->bindParam(':cargo', $cargo);
		
		$resultado = $consulta->execute();
		//echo $consulta->queryString;
		//echo $consulta->ErrorInfo()[2];
		$conexion = null;

	    return $resultado;
	}


	public function Modificar($IDEmpleado, $nombre, $dni, $direccion, $telefono, $cargo){

		$conexion = new conexion ();

		$consulta = $conexion->prepare ('UPDATE ' . self::TABLA . ' SET IDEmpleado = :IDEmpleado, nombre = :nombre, dni = :dni, direccion = :direccion, telefono = :telefono, cargo = :cargo WHERE IDEmpleado = :IDEmpleado');

		$consulta->bindParam(':IDEmpleado', $IDEmpleado);
		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':dni', $dni);
		$consulta->bindParam(':region', $region);
		$consulta->bindParam(':direccion', $direccion);
		$consulta->bindParam(':telefono', $telefono);
		$consulta->bindParam(':cargo', $cargo);

		$consulta->execute();
		//echo $consulta->queryString ."</br>"; sirven para ver donde estan los errores
		//echo $consulta->ErrorInfo()[2]; sirve para ver cual es el error
		$conexion = null;

		return $consulta;
	}

	public function Eliminar($IDEmpleado){

		$conexion = new conexion ();

		$consulta = $conexion->prepare ('DELETE FROM ' . self::TABLA . ' WHERE IDEmpleado = :IDEmpleado');

		$consulta->bindParam(':IDEmpleado', $IDEmpleado);

		$consulta->execute();
		//echo $consulta->queryString ."</br>";
		//echo $consulta->ErrorInfo()[2];
		$conexion = null; 

		return $consulta;
	}

	public function buscarPorIDEmpleado($IDEmpleado){

		$conexion = new conexion();

		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA .' WHERE IDEmpleado = :IDEmpleado');
		$consulta->bindParam(':IDEmpleado', $IDEmpleado);
		$consulta->execute();
		$registro = $consulta->fetch();
		$conexion = null;

		return $registro;
		
	}

	public function Listar(){
		$conexion = new conexion();

		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA );

		$consulta->execute();
		$arrayRegistros = $consulta->fetchAll();
		$conexion = null;

		return $arrayRegistros;
	}
	
}

?>