<?php
class Mascota
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $_nombre;
 	private $_edad;
 	private $_tipo;
 	private $_sexo;
 	private $_fecha;
  	private $_pathFoto;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetNombre()
	{
		return $this->_nombre;
	}
	public function GetEdad()
	{
		return $this->_edad;
	}
	public function GetPathFoto()
	{
		return $this->_pathFoto;
	}

	public function GetFecha()
	{
		return $this->_fecha;
	}

	public function GetTipo()
	{
		return $this->_tipo;
	}

	public function GetSexo()
	{
		return $this->_sexo;
	}

	

	public function SetNombre($nombre)
	{
		$this->_nombre = $nombre; 
	}
	public function SetEdad($edad)
	{
		$this->_edad = $edad; 
	}
	public function SetTipo($tipo)
	{
		$this->_tipo = $tipo; 
	}
	public function SetSexo($sexo)
	{
		$this->_sexo = $sexo; 
	}
	public function SetFecha($fecha)
	{
		$this->_fecha = $fecha; 
	}
	public function SetPathFoto($path)
	{
		$this->_pathFoto = $path; 
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($nombre=NULL, $sexo=NULL, $fecha=NULL, $tipo=NULL, $edad=NULL, $path=NULL)
	{
		if($nombre !== NULL && $path !== NULL){
			$this->_nombre= $nombre;
			$this->_edad = $edad;
			$this->_pathFoto = $path;
			$this->_sexo = $sexo;
			$this->tipo = $tipo;
			$this->_fecha = $fecha;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->_nombre."-".$this->edad."-".$this->pathFoto."-".$this->_sexo."-".$this->_tipo."-".$this->_fecha."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/mascotas.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, $obj->ToString());
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerMascotas()//TodosLosProductos()
	{

		$ListaDeMascotasLeidas = array();

		//leo todos los productos del archivo
		$archivo=fopen("archivos/mascotas.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$mascotas = explode("-", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$mascotas[0] = trim($mascotas[0]);
			if($pmascotas[0] != ""){
				$ListaDeMascotasLeidas[] = new Mascota($mascotas[0], $mascotas[1],$mascotas[2], $mascotas[3], 
				$mascotas[4], $mascotas[5]);
			}
		}
		fclose($archivo);
		
		return $ListaDeMascotasLeidas;
		
	}
	public static function Modificar($obj)
	{
		$resultado = TRUE;
		
		$ListaDeMascotasLeidas = Mascota::TraerMascotas();
		$ListaDeMascotas = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeMascotasLeidas); $i++){
			if($ListaDeMascotasLeidas[$i]->GetNombre == $obj->GetNombre){//encontre el modificado, lo excluyo
				$imagenParaBorrar = trim($ListaDeMascotasLeidas[$i]->GetPathFoto);
				continue;
			}
			$ListaDeMascotas[$i] = $ListaDeMascotasLeidas[$i];
		}

		array_push($ListaDeProductos, $obj);//agrego el producto modificado
		
		//BORRO LA IMAGEN ANTERIOR
		unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/mascotas.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeMascotas AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function Eliminar($nombre)
	{
		if($nombre === NULL)
			return FALSE;
			
		$resultado = TRUE;
		
		$ListaDeMascotasLeidas = Mascota::TraerMascotas();
		$ListaDeMascotas = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeMascotasLeidas); $i++){
			if($ListaDeMascotasLeidas[$i]->_nombre == $nombre){//encontre el borrado, lo excluyo
				$imagenParaBorrar = trim($ListaDeMascotasLeidas[$i]->GetPathFoto);
				continue;
			}
			$ListaDeMascotas[$i] = $ListaDeMascotasLeidas[$i];
		}

		//BORRO LA IMAGEN ANTERIOR
		unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/mascotas.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeMascotas AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
//--------------------------------------------------------------------------------//
}