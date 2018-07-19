<?php 

require_once '../datos/DataContacto.php';

class Contacto {

	private $IDContacto;	
	private $nombre;
	private $email;
	private $telefono;
	private $texto;
	private $respondido;
	private $respuesta;
		
	public function __construct($IDContacto = null, $nombre = null, $email = null, $telefono = null, $texto = null, $respondido = null, $respuesta = null){

		$this -> IDContacto = $IDContacto;		
		$this -> nombre = $nombre;
		$this -> email = $email;
		$this -> telefono = $telefono;
		$this -> texto = $texto;
		$this -> respondido = $respondido;
		$this -> respuesta = $respuesta;
	}

	public function getIDContacto(){
		return $this -> IDContacto;
	}
	
	public function getNombre(){
		return $this -> nombre;
	}

	public function getEmail(){
		return $this -> email;
	}
	public function getTelefono(){
		return $this -> telefono;
	}

	public function getTexto(){
		return $this -> texto;
	}

	public function getRespondido(){
		return $this -> respondido;
	}

	public function getRespuesta(){
		return $this -> respuesta;
	}

	public function setIDContacto($IDContacto){
		$this -> IDContacto;
	}

	public function setNombre($nombre){
		$this -> nombre;
	}

	public function setEmail($email){
		$this -> email;
	}

	public function setTelefono($telefono){
		$this -> telefono;
	}

	public function setTexto($texto){
		$this -> texto;
	}

	public function setRespondido($respondido){
		$this -> respondido;
	}

	public function setRespuesta($respuesta){
		$this -> respuesta;
	}
	
	public function Insertar() {
    	$objDataContacto = new DataContacto();
        $resultado = $objDataContacto->Insertar(null, $this -> nombre, $this -> email, $this -> telefono, $this -> texto, $this -> respondido, $this -> respuesta);
        return $resultado;
    }

    public function Modificar() {
        $objDataContacto = new DataContacto();
        $resultado = $objDataContacto->Modificar($this -> IDContacto , $this -> nombre, $this -> email, $this -> telefono, $this -> texto, $this -> respondido, $this -> respuesta);
	    return $resultado;
    }

    public function Eliminar(){
        $objDataContacto = new DataContacto();
        $resultado = $objDataContacto->Eliminar($this -> IDContacto);
	    return $resultado;
    }

    public function buscarPorIDContacto($IDContacto) {

    	$objDataContacto = new DataContacto();
        $registro = $objDataContacto->buscarPorIDContacto($IDContacto);
        if ($registro)
        	return new self($registro['IDContacto'] , $registro['nombre'] ,$registro['email'], $registro['telefono'], $registro['texto'], $registro['respondido'], $registro['respuesta']);
        else 
        	return false;
    }

    public function Listar() {
        $objDataContacto = new DataContacto();
        $arrayRegistros = $objDataContacto->Listar();
        
        if (!$arrayRegistros)
        	return false;
        else {
        	$arrayContactos = array();
        	foreach ($arrayRegistros as $registro) {
        		$objgContacto = new Contacto ($registro['IDContacto'] , $registro['nombre'] ,$registro['email'], $registro['telefono'], $registro['texto'], $registro['respondido'], $registro['respuesta']);
        		$arrayContactos[] = $objgContacto;
        	}

        	return $arrayContactos;

        } 
        	
    }

}

?>