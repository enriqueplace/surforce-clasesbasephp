<?php
include_once("String.class.php");

/**
 * Clase Base Boolean
 *
 * La clase Boolean instancia objetos que tienen valores de tipo bool,
 * los conocidos valores true o false
 *
 * @package clasebasephp
 * @access public
 */
class Boolean {
	/**
	 * @property mixed $valor propiedad privada valor de lectura y esritura
	 */
	private $valor;
	/**
	 * @param boolean,string value
	 * Acepta tanto valores boolean como valores string
	 */
	public function __construct($value = NULL){
	  if (!is_null($value)){
	    if (is_bool($value)){
	    	$this->valor = $value;
	    }elseif (is_string($value)){
	    	if ("true" === strtolower($value)){
	    		$this->valor = true;
	    	}else{
	    		$this->valor = false;
	    	}
	    }else{
	    	$this->valor = false;
	    }
	  }else{
	  	throw new Exception ("El constructor Boolean() no fue definido");
	  }

	}

	/**
	 * Metodo booleanValue
	 *
	 * Retorna el valor del objeto Boolean
	 *
	 * @method bool booleanValue()
	 * @return bool
	 */
	public function booleanValue(){
		return (bool)$this->valor;
	}

	/**
	 * Metodo compareTo: Este metodo compara dos instacias de la clase boolean y retorna un valor tipo (int):
	 *
	 * <b>(1)</b> si el objeto a comparar representa un valor true y el pasado por parametro un valor false.<br />
	 * <b>(-1)</b> si el objeto a comparar representa un valor false y el pasado por parametro un valor true.<br />
	 * <b>(0)</b> si ambas instancias representan el mismo valor booleano. sea true o false.<br />
	 *
	 * @method int compareTo(boolean $boolean)
	 * @param boolean $boolean
	 */
	public function compareTo($boolean = NULL){

  		if(!is_null($boolean) && is_object($boolean) && method_exists($boolean, "booleanValue")){
			if($this->valor===$boolean->booleanValue()){
				return 0;
			}else{
				if($this->valor===true && $boolean->booleanValue()===false){
					return 1;
				}else{
				 	if($this->valor===false && $boolean->booleanValue()===true){
				 		return -1;
				 	}
				 }
			}
  		}else{
  			if(is_bool($boolean)){
	  			if($this->valor==$boolean){
	  				return 0;
	  			}else{
					if($this->valor==true && $boolean==false){
						return 1;
					}else{
					 	if($this->valor==false && $boolean==true){
					 		return -1;
					 	}
					 }
				}
  			}else{
  				echo '<br>>>Error ComapareTo('.$boolean.').<br>';
  			}
  		}
  	}
	/**
	 * @param Boolean boolean
	 * Returna true si y solo si el valor es diferente de NULL
	 * y representa el mismo valor booleano de este objeto
	 */
	public function equals($boolean = NULL){
	  if (NULL != $boolean && is_object($boolean) && "Boolean" == get_class($boolean)){
	  	if ($this->valor === $boolean->getBoolean()){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  }else{
	  	return false;
	  }
	}

	/**
	 * Metodo toString
	 *
	 * Retorna una instancia de la clase String, <br>
	 * si el argumento del constructor de la clase String es false el valor retornado será "" (cadena vacía)<br>
	 * si el argumento del constructor de la clase String es true el valor retornado será "1"<br>
	 *
	 * Argumentos:<br>
	 * 	<b>boolean</b>, retorna una instancia de la Clase Base String con valor
	 * 		especificado por el parametro de tipo bool<br>
	 * 	<b>null</b>, retorna una instancia de la Clase Base String con valor "true" si el valor del objeto que llama al metodo es true, y false  en los demas casos<br>
	 *
	 * <b>Requerimiento Adicional</b>:
	 * Requiere la inclusion del la Clase Base String: String.class.php
	 *
	 *
	 * @method String toString() toString(boolean $boolean)
	 * @param boolean $boolean
	 * @return String Objeto tipo String
	 */

	public function toString($boolean = NULL){
		if(is_null($boolean)){
			return (new String($this->valor));
		}elseif(gettype($boolean) == "boolean"){
			return (new String($boolean));
		}else{
			throw new Exception ("Argumento invalido");
		}
	}

	/**
	 * Método getBoolean
	 *
	 * Retorna true si el argumento, de tipo string, es el nombre de una variable global y
	 * si su valor es la cadena "true", sin hacer distincion entre mayusculas y minusculas.<br>
	 * Devuelve false en todo lo demas.
	 *
	 * @method bool getBoolean() getBoolean(string $nombre)
	 * @param string $nombre
	 * @return bool
	 */
	public function getBoolean($nombre = NULL){
		if(!is_null($nombre) && is_string($nombre) && defined($nombre)){
			$arreglo = get_defined_constants(true);
			foreach($arreglo['user'] as $k => $v){
				if ($k === $nombre){
					if(strtolower($arreglo['user'][$k]) === "true"){
						return true;
					}
					return false;
				}
			}
			return false;
		}else{
			return false;
		}
	}

	/**
	 * Metodo valueOf: Este método puede recibir dos parámetros distintos sea tipo booleano o tipo string.
	 * >>>Si recibe un string , este método debe devolver un boolean que represente el valor
	 * pasado por el string, si este valor es:<br/><br/>
	 * 	[<b>"true"</b>]: el método debe devolver su representación en boolean es decir true.<br/>
	 *  [<b>' ' o "false"</b>]: el método debe devolver un un valor booleana false.<br/>
	 *
	 * >>>Si recibe un boolean, este método debe devolver una instancia de la clase boolean,
	 * la cual represente el valor que recibe como parámetro es decir, si recibe un valor
	 * true debe retornar una instancia de la clase boolean con valor true. Si recibe un valor
	 * false debe retornar una instancia con valor false.
	 *
	 * @method Boolean valueOf(boolean $Str_bool) | valueOf(String $Str_bool)
	 *
	 * @param boolean  String $Str_bool
	 */
	public function valueOf($Str_bool=NULL){
  		if(is_null($Str_bool)){
  			throw new Exception ('Error valueOf('.$Str_bool.').<br>');
  		}
  		if(!is_null($Str_bool) && is_object($Str_bool) && method_exists ($Str_bool, "booleanValue")){
		  if(($Str_bool->booleanValue()===true)){
			if($this->valor===true){
				return new Boolean(true);
			}else{
				return new Boolean(true);
			}
		  }else{
		  	return new Boolean(false);
		  }
  		}else{
			if(is_string($Str_bool) && strtolower($Str_bool)=="true"){
				return true;
			}else{
				if(is_bool($Str_bool)&&$Str_bool===true){
					return true;
				}else{
					return false;
				}
			}
		}
  	}
}

?>