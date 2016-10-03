<?php

class Mascota
{
	private $nombre;
	private $edad;
	private $fecha;
	private $tipo;
	private $sexo;
	
	function __construct()
	{
		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$fecha = $_POST['fecha'];
		$tipo = $_POST['tipo'];
		$sexo = $POST['sexo'];
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getEdad()
	{
		return $this->edad;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function getSexo()
	{
		return $this->sexo;
	}




}
















?>