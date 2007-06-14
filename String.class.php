<?php
/**
 * Clase base para el tipo de datos String
 *
 * Esta clase define la clase String con sus
 * atributos y funciones
 *
 * @access public
 */
class String {
    //Atributo privado donde se guardará el valor de la cadena
    private $value;
    
	public function __construct($cadena){
       if (is_string($cadena)){
			$this->value = $cadena;
       }elseif(!is_array($cadena) && !is_object($cadena)){
			$this->value = strval($cadena);
       }
	}
    
	
	public function getValue(){
		return $this->value;
	}
    
	
	public function setvalue($cadena) {
		$this->value = $cadena;
	}

	
	public function charAt ($index){
	       if ($index>=0 && $index<= (strlen($this->value)-1)){
				$charMatriz = str_split($this->value);
				return $charMatriz[$index];
	       } else {
				return "";
		   }
	}
	
	
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
    
	
	public function concat ($cadena){
		return ( $this->value . $cadena );
	}
}
?>