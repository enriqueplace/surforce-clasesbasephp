<?php
/**
 * Fichero de definicion de la clase String
 * 
 * En este archivo definimos toda la estructura base de la
 * clase String.
 * 
 * @package clasesbasephp
 */

include_once("Integer.class.php");
include_once("Boolean.class.php");
/**
 * Clase base para el tipo de datos String
 *
 * Esta clase define la clase String con sus
 * atributos y funciones
 *
 * @access public
 * @package clasesbasephp
 * 
 */
class String {
	/**
	 * Atributo privado donde se guardara el valor de la cadena
	 */	
    private $value;

    
    /**
     * Constructor de los objetos string
     * 
     * @param string $cadena Valor con el que se iniciara el objeto
     */
	 public function __construct($cadena=""){
       try {
		   if (is_string($cadena)){
				$this->value = $cadena;
	       }elseif(!is_array($cadena) && !is_object($cadena)){
				throw new Exception("El parámetro pasado no es una cadena.");
	       }
       } 
       catch(Exception $e) {
           die("Exception: ".  $e->getMessage() . "\n");    
       }
	 }
 
	
	/**
	 * Devuelve el valor del objeto String
	 * 
	 * @return string cadena del objeto
	 */
	public function getValue(){
		return new String($this->value);
	}

	/**
	 * Devuelve el valor del objeto String
	 * 
	 * @return string cadena del objeto
	 */
	public function __get($val){
		return new String($this->$val);
	}
	
	
	/**
	 * Devuelve el valor del objeto como String
	 * 
	 * @return string cadena del objeto
	 */
    public function __toString() {
		return $this->value;
	}
	
	
	/**
	 * Modifica el valor del objeto String
	 * 
	 * @param string $cadena nuevo valor para el objeto
	 */
	public function setvalue($cadena) {
	   try {
		   if (is_string($cadena)){
				$this->value = $cadena;
	       }elseif(!is_array($cadena) && !is_object($cadena)){
				throw new Exception("El parámetro pasado no es una cadena.");
	       }
       } 
       catch(Exception $e) {
           die("Exception: ".  $e->getMessage() . "\n");    
       }
	}
	
	/**
	 * Modifica el valor del objeto String
	 * 
	 * @param string $val nombre del atributo a modificar
	 * @param string $cadena nuevo valor para el objeto
	 */
	public function __set($val, $cadena) {
		try {
		   if (is_string($cadena)){
				$this->$val = $cadena;
	       }elseif(!is_array($cadena) && !is_object($cadena)){
				throw new Exception("El parámetro pasado no es una cadena.");
	       }
       } 
       catch(Exception $e) {
           die("Exception: ".  $e->getMessage() . "\n");    
       }
	}
	
	
	/**
	 * Devuelve el caracter en la posicion pasada por parametro
	 * 
	 * @return char Caracter de la posicion
	 * @param integer posicion del caracter
	 */
	public function charAt ($index){
	    try{
	       if ($index>=0 && $index<= (strlen($this->value)-1)){
				$charMatriz = str_split($this->value);
				return $charMatriz[$index];
	       } else {
				throw new Exception("El parámetro pasado está fuera de rango.");
		   }
	    }
	    catch(Exception $e) {
           die("Exception: ".  $e->getMessage() . "\n");    
       }
	}
	
	
	/**
	 * Devuelve la cadena pasada a mayusculas
	 * 
	 * @return string cadena en mayusculas
	 */
	public function toUpperCase() {
		return new String(strtoupper( $this->value ));
	}

    
    /**
     * Devuelve la cadena con todos los caracteres en minusculas
     *
     * @return string cadena convertida a minusculas
     */
    public function toLowerCase() {
        return new String(strtolower( $this->value ));
    }
    
    	
    /**
     * Devuelve la longitud de la cadena guardada en $value o 0 si esta vacia
     *
     * @return integer longitud de la cadena
     */
    public function length(){
        return new Integer(strlen( $this->value ));
    }
    
    
	/**
	 * Concatena el valor del objeto con la cadena pasada por parametro
	 * 
	 * @return string cadena concatenada
	 * @param string cadena que se añadira al final
	 */
	public function concat ($cadena){
	    try {
	        if (!is_string($cadena)){
	            throw new Exception("El parámetro pasado no es una cadena.");
	        } else {
	            return new String( $this->value . $cadena );
	        }
	    }
	    catch(Exception $e) {
           die("Exception: ".  $e->getMessage() . "\n");    
        }		
	}
	
	
	/**
	 * Elimina los espacios en blanco del principio y al final
	 * 
	 * Devuelve la cadena sin los espacios en blanco, tabuladores, NUL del principio
	 * y del final de la cadena de texto
	 * 
	 * @return string cadena sin espacios en blanco
	 */
	public function trim() {
		return new String(trim( $this->value ));
	}
	

	/**
	 * Método toCharArray
	 *
	 * Devuelve una matriz escalar donde los valores de la misma son los
	 * caracteres de la cadena pasada como parametro.
	 *
	 * @ return array Matriz con los caracteres de la cadena
	 */
	  public function toCharArray(){
	      return str_split($this->value);
	  }

	  
	/**
	 * Método endsWith
	 *
	 * Compara si el atributo ($value)
	 * termina con la cadena que se pasa como parametro,
	 * devolviendo TRUE en caso afirmativo o FALSE en caso contrario
	 *
	 * @ param string $suffix cadena a comparar
	 * @ return boolean TRUE si el final de la cadena coincide $suffix
	 */
      public function endsWith($suffix){
               try{
	               if (!(is_string($suffix)) || (strlen($suffix) < 1)){
	               		throw new Exception("El parámetro no es una cadena");
	               } else {
	                    if (substr($this->value,-(strlen($suffix)),strlen($suffix)) == $suffix){
	                    	return new Boolean(true) ;
	                    }else{
	                        return new Boolean(false);
	                    }
	               }
		       }catch (Exception $e) {
		             die("Exception: " .  $e->getMessage() . "\n");
		       }
       }
       
	       
	/**
	 * Compara dos cadenas
	 *
	 * Devuelve TRUE si la cadena pasada como argumento del metodo
	 * es igual a la cadena pasada como argumento de la clase,
	 * FALSE en caso contrario
	 *
	 * @ param string $cadena cadena a comparar
	 * @ return boolean TRUE si ambas cadenas son iguales
	 */
      public function toCompare ($cadena){
	      try{
		      if (!(is_string($cadena)) || (strlen($cadena)<1)){
			      throw new Exception("El parámetro no es una cadena");
			  }else{
			  	if(strcmp($this->value,$cadena)==0){
			      	return new Boolean(true);
			  	}else{
			      	return new Boolean(false);
			  	}
		      }
	      }catch (Exception $e) {
	      	die("Exception: " .  $e->getMessage() . "\n");
	      }
       }
       
       
	/**
	  * Devuelve la primera posición en que se encuentra el carácter
	  *
	  * Busca la posición en la que se encuentra el carácter que nos han pasado
	  * por parámetro.
	  *
	  * @param char $ch carácter a buscar en la cadena
	  * @return integer posición en la que se encuentra o -1 si no se encuentra
	  */
	 public function indexOf($ch) {
	     try {
	         if (!(is_string($ch)) || (strlen($ch) > 1 ) || (strlen($ch) <= 0)){
	             throw new Exception("El parámetro no es un carácter");
	         } else {
	             $pos = strpos($this->value, $ch);
	             if (!($pos)) {
	                 return -1;
	             } else {
	                 return new Integer($pos);
	             }
	         }
	     } catch (Exception $e) {
	         die("Exception: ".  $e->getMessage() . "\n");
	     }
	 }
	 
	 
    /**
     * Devuelve cierto o falso si se encuentra la cadena que nos pasan por parámetro
     *
     * Busca la cadena que nos pasan por parámetro dentro del Value, si la encuentra,
     * devuelve cierto, en caso contrario devuelve falso
     *
     * @param string $str Cadena a buscar
     * @param boolean $mays Indica si se deben tener en cuenta las mayusculas y minusculas
     * @return boolean cierto si se encuentra, falso en caso contrario
     */
    public function contains($str,$mays=false) {
        try {
            if (!( is_string($str) )) {
                throw new Exception("El parámetro no es de tipo string");
            } else {
                if ($mays)
                {
                    $strMays = strtoupper($str);
                    $val = $this->toUpperCase();
                } else {
                    $strMays = $str;
                    $val = $this->value;   
                }
                if (strstr($val,$strMays))
                    return new Boolean(true);
                else
                    return new Boolean(false);
            }
        }
        catch (Exception $e){
            die("Exception: ".  $e->getMessage() . "\n");
        }
    }
    
    
	/**
	 * Método substring
	 *
	 * Devuelve el atributo interno $value a partir del �ndice
	 * que se le pasa como parámetro.
	 *
	 * @ return string
	 */
	  public function substring ($beginIndex){
	        if($beginIndex < strlen($this->value)) {
	           return new String(substr($this->value, $beginIndex));
	        }
	  }
	  
	  
	/**
	 * Método startsWith
	 *
	 * Compara si el atributo provado ($value)
	 * empieza con la cadena que se pasa como parámetro,
	 * devolviendo TRUE en caso afirmativo o FALSE en caso contrario
	 *
	 * @ return boolean TRUE o FALSE
	 */
       public function startsWith ($prefix){
               $empiezaCon = true;
               for($i=0;$i<strlen($prefix);$i++){
                       if($this->value[$i]!=$prefix[$i]){
                               $empiezaCon = false;
                               break;
                       }
               }
               return new Boolean($empiezaCon);
       }
       
       
	/**
	 * Método split
	 *
	 * Devuelve el atributo en un array, dividiéndolo
	 * en base al parámetro pasado.
	 *
	 * @ return array o FALSE en caso de parámetro vacío
	 */
       public function split ($regex) {
               return explode($regex, $this->value);
       }
}
?>
