<?php
/**
 * Fichero de definición de la clase String
 * 
 * En este archivo definimos toda la estructura base de la
 * clase String.
 * 
 * @package clasesbasephp
 */

/**
 * Clase base para el tipo de datos String
 *
 * Esta clase define la clase String con sus
 * atributos y funciones
 *
 * @access public
 * @package clasesbasephp
 */
class String {
    //Atributo privado donde se guardará el valor de la cadena
    private $value;
    
    /**
     * Constructor de los objetos string
     * 
     * @param string $cadena Valor con el que se iniciará el objeto
     */
	public function __construct($cadena){
       if (is_string($cadena)){
			$this->value = $cadena;
       }elseif(!is_array($cadena) && !is_object($cadena)){
			$this->value = strval($cadena);
       }
	}
    
	/**
	 * Devuelve el valor del objeto String
	 * 
	 * @return string cadena del objeto
	 */
	public function getValue(){
		return $this->value;
	}
    
	/**
	 * Modifica el valor del objeto String
	 * 
	 * @param string $cadena nuevo valor para el objeto
	 */
	public function setvalue($cadena) {
		$this->value = $cadena;
	}

	/**
	 * Devuelve el carácter en la posición pasada por parámetro
	 * 
	 * @return char Carácter de la posición
	 * @param integer posición del carácter
	 */
	public function charAt ($index){
	       if ($index>=0 && $index<= (strlen($this->value)-1)){
				$charMatriz = str_split($this->value);
				return $charMatriz[$index];
	       } else {
				return "";
		   }
	}
	
	/**
	 * Devuelve la cadena pasada a mayúsculas
	 * 
	 * @return string cadena en mayúsculas
	 */
	public function toUpperCase() {
		return strtoupper( $this->value );
	}

    
    /**
     * Devuelve la cadena con todos los carácteres en minúsculas
     *
     * @return string cadena convertida a minúsculas
     */
    public function toLowerCase() {
        return strtolower( $this->value );
    }
    
    	
    /**
     * Devuelve la longitud de la cadena guardada en $value o 0 si está vacía
     *
     * @return integer longitud de la cadena
     */
    public function length(){
        return strlen( $this->value );
    }
    
	/**
	 * Concatena el valor del objeto con la cadena pasada por parámetro
	 * 
	 * @return string cadena concatenada
	 * @param string cadena que se añadirá al final
	 */
	public function concat ($cadena){
		return ( $this->value . $cadena );
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
		return ( trim( $this->value ));
	}
	

	/**
	 * Metodo toCharArray
	 *
	 * Devuelve una matriz escalar donde los valores de la misma son los
	 * caracteres de la cadena pasada como parametro.
	 *
	 * @ return array Matriz con los caracteres de la cadena
	 */
	  public function toCharArray(){
	               return str_split($this->value);
	  }

	
}
?>