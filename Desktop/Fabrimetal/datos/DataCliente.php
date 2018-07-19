<?php  

require_once 'conexion.php';

class DataCliente {
	const TABLA = 'clientes';

	public function insertar($nombre, $dni, $email, $direccion, $tipo){

		$conexion = new conexion ();

		$consulta = $conexion->prepare ('INSERT INTO ' . self::TABLA . ' (IDClientes, nombre, dni, email, direccion, tipo) values (null,:nombre, :dni, :email, :direccion, :tipo)');

		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':dni', $dni);
		$consulta->bindParam(':email', $email);
		$consulta->bindParam(':direccion', $direccion);
		$consulta->bindParam(':tipo', $tipo);
		
		$resultado = $consulta->execute();
		//echo $consulta->queryString;
		echo $consulta->ErrorInfo()[2]; 
		$conexion = null;

	    return $resultado;
	}

	public function Modificar($IDClientes, $nombre, $dni, $email, $direccion, $tipo){

		$conexion = new conexion ();

		$consulta = $conexion->prepare ('UPDATE ' . self::TABLA . ' SET IDClientes = :IDClientes, nombre = :nombre, dni = :dni, email = :email, direccion = :direccion, tipo = :tipo WHERE IDClientes = :IDClientes');

		$consulta->bindParam(':IDClientes', $IDClientes);
		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':dni', $dni);
		$consulta->bindParam(':email', $email);
		$consulta->bindParam(':direccion', $direccion);
		$consulta->bindParam(':tipo', $tipo);

		$consulta->execute();
		//echo $consulta->queryString ."</br>"; sirven para ver donde estan los errores
		//echo $consulta->ErrorInfo()[2]; 
		$conexion = null;

		return $consulta;
	}

	public function Eliminar($IDClientes){

		$conexion = new conexion ();

		$consulta = $conexion->prepare ('DELETE FROM ' . self::TABLA . ' WHERE IDClientes = :IDClientes');

		$consulta->bindParam(':IDClientes', $IDClientes);

		$consulta->execute();
		//echo $consulta->queryString ."</br>";
		//echo $consulta->ErrorInfo()[2];
		$conexion = null; 

		return $consulta;
	}

	public function buscarPorIDClientes($IDClientes){

		$conexion = new conexion();

		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA .' WHERE IDClientes = :IDClientes');
		$consulta->bindParam(':IDClientes', $IDClientes);
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