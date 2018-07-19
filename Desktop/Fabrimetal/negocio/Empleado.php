<?php 

require_once '../datos/DataEmpleado.php';

class Empleado {

	private $IDEmpleado;
	private $nombre;
	private $dni;
	private $direccion;
	private $telefono;
	private $cargo;
		
	public function __construct($IDEmpleado=null, $nombre = null, $dni = null, $direccion = null, $telefono = null, $cargo = null){
		$this -> IDEmpleado = $IDEmpleado;
		$this -> nombre = $nombre;
		$this -> dni = $dni;
		$this -> direccion = $direccion;
		$this -> telefono = $telefono;
		$this -> cargo = $cargo;
	}

	public function getIDEmpleado(){
		return $this -> IDEmpleado;
	}

	public function getNombre(){
		return $this -> nombre;
	}

	public function getDni(){
		return $this -> dni;
	}

	public function getDireccion(){
		return $this -> direccion;
	}
	public function getTelefono(){
		return $this -> telefono;
	}

	public function getCargo(){
		return $this -> cargo;
	}

	public function setIDEmpleado($IDEmpleado){
		$this -> IDEmpleados;
	}

	public function setNombre($nombre){
		$this -> nombre;
	}

	public function setDni($dni){
		$this -> dni;
	}

	public function setDireccion($direccion){
		$this -> direccion;
	}

	public function setTelefono($telefono){
		$this -> telefono;
	}

	public function setCargo($cargo){
		$this -> cargo;
	}
	
	public function Insertar() {
    	$objDataEmpleado = new DataEmpleado();
        $resultado = $objDataEmpleado->Insertar($this -> nombre, $this -> dni, $this -> direccion, $this -> telefono, $this -> cargo);
        return $resultado;
    }

    public function Modificar() {
        $objDataEmpleado = new DataEmpleado();
        $resultado = $objDataEmpleado->Modificar($this -> IDEmpleado, $this -> nombre, $this -> dni, $this -> direccion, $this -> telefono, $this -> cargo);
	    return $resultado;
    }

    public function Eliminar(){
        $objDataEmpleado = new DataEmpleado();
        $resultado = $objDataEmpleado->Eliminar($this -> IDEmpleado);
	    return $resultado;
    }

    public function buscarPorIDEmpleado($IDEmpleado) {

    	$objDataEmpleado = new DataEmpleado();
        $registro = $objDataEmpleado->buscarPorIDEmpleado($IDEmpleado);
        if ($registro)
        	return new self($registro['IDEmpleado'] , $registro['nombre'] ,$registro['dni'] ,$registro['direccion'], $registro['telefono'], $registro['cargo']);
        else 
        	return false;
    }

    public function Listar() {
        $objDataEmpleado = new DataEmpleado();
        $arrayRegistros = $objDataEmpleado->Listar();
        
        if (!$arrayRegistros)
        	return false;
        else {
        	$arrayEmpleados = array();
        	foreach ($arrayRegistros as $registro) {
        		$objgEmpleados = new Empleado ($registro['IDEmpleado'] , $registro['nombre'] ,$registro['dni'] ,$registro['direccion'], $registro['telefono'], $registro['cargo']);
        		$arrayEmpleados[] = $objgEmpleados;
        	}

        	return $arrayEmpleados;

        } 
        	
    }

}

?>