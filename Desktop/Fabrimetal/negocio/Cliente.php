<?php 

require_once '../datos/DataCliente.php';

class Cliente {

	private $IDClientes;
	private $nombre;
	private $dni;
	private $email;
	private $direccion;
	private $tipo;
		
	public function __construct($IDClientes = null, $nombre = null, $dni = null, $email = null, $direccion = null, $tipo = null){

		$this -> IDClientes=$IDClientes;
		$this -> nombre = $nombre;
		$this -> dni = $dni;
		$this -> email = $email;
		$this -> direccion = $direccion;
		$this -> tipo = $tipo;
	}

	public function getIDClientes(){
		return $this -> IDClientes;
	}

	public function getNombre(){
		return $this -> nombre;
	}

	public function getDni(){
		return $this -> dni;
	}

	public function getEmail(){
		return $this -> email;
	}
	public function getDireccion(){
		return $this -> direccion;
	}

	public function getTipo(){
		return $this -> tipo;
	}

	public function setIDClientes($IDClientes){
		$this -> IDClientes;
	}

	public function setNombre($nombre){
		$this -> nombre;
	}

	public function setDni($dni){
		$this -> dni;
	}

	public function setEmail($email){
		$this -> email;
	}

	public function setDireccion($Direccion){
		$this -> direccion;
	}

	public function setTipo($tipo){
		$this -> tipo;
	}
	
	public function Insertar() {
    	$objDataCliente = new DataCliente();
        $resultado = $objDataCliente->Insertar($this -> nombre, $this -> dni, $this -> email, $this -> direccion, $this -> tipo);
        return $resultado;
    }

    public function Modificar() {
        $objDataCliente = new DataCliente();
        $resultado = $objDataCliente->Modificar($this -> IDClientes, $this -> nombre, $this -> dni, $this -> email, $this -> direccion, $this -> tipo);
	    return $resultado;
    }

    public function Eliminar(){
        $objDataCliente = new DataCliente();
        $resultado = $objDataCliente->Eliminar($this -> IDClientes);
	    return $resultado;
    }

    public function buscarPorIDClientes($IDClientes) {

    	$objDataCliente = new DataCliente();
        $registro = $objDataCliente->buscarPorIDClientes($IDClientes);
        if ($registro)
        	return new self($registro['IDClientes'] , $registro['nombre'] ,$registro['dni'] ,$registro['email'], $registro['direccion'], $registro['tipo']);
        else 
        	return false;
    }

    public function Listar() {
        $objDataCliente = new DataCliente();
        $arrayRegistros = $objDataCliente->Listar();
        
        if (!$arrayRegistros)
        	return false;
        else {
        	$arrayClientes = array();
        	foreach ($arrayRegistros as $registro) {
        		$objgCliente = new Cliente ($registro['IDClientes'] , $registro['nombre'] ,$registro['dni'] ,$registro['email'], $registro['direccion'], $registro['tipo']);
        		$arrayClientes[] = $objgCliente;
        	}

        	return $arrayClientes;

        } 
        	
    }

}

?>