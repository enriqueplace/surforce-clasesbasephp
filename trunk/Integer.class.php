<?php

include_once("Number.class.php")

/**
 * Clase Integer
 *
 * La clase Integer es una de las tantas clases que se
 * portaran desde JAVA con un propocito didactico. Esta
 * clase extiende a la clase Number
 *
 * Ejemplo de Uso:
 *
 * $diez = new Integer(10);
 * echo $diez;
 * echo $diez->intValue(); //Equivalente a la linea anterior
 * echo $diez->floatValue(); //Devuelve el numero en formato float
 *
 * @access public
 */
class Integer extends Number{

        /**
         * Parametro privado que contiene el valor
         *
         * @access private
         * @var Integer Valor de la clase
         */
        private $valor;

        /**
         * Constructor de la clase Integer
         *
         * El constructor puede recibir un entero o un string
         * que se intentara convertir en entero, en caso que
         * no se pueda lanzara una Exception
         *
         * @param Integer/String entero
         */
        public function __construct($entero = 0){

                if(gettype($entero) == "String"){
                        if(!settype($entero,"integer")){
                                throw new Exception("Se ha producido un error. El parametro pasado no se pudo convertir en un entero.");
                        }
                }

                $this->valor = $entero;
        }

        /**
         * @access public
         */
        public function floatValue() {
                $valueString = (string) $this->valor;

                $locale = localeconv();

               $valueFiltered = str_replace($locale['decimal_point'], '.', $valueString);
               $valueFiltered = str_replace($locale['thousands_sep'], '', $valueFiltered);

               if (strval(floatval($valueFiltered)) != $valueFiltered){
                   throw new Exception("'$valueString' No es de tipo Float");
               }

        $this->valor = (double)$valueString;
               return $this->valor;
           }

        /**
         * int intval ()
         *
         * Devuelve el valor Integer.
           *
           * @access public
         */
         public function intValue(){
            return intval($this->valor);
         }

        /**
         * String __toString()
         *
         * Función magica que es llamada cada vez que se intente
         * imprimir la instancia de esta clase.
         *
         * @access public
         */
         public function __toString(){
                 return (string)$this->valor;
         }

         public function setValue(Integer $num){
                 $this->valor = $num->intValue();
         }
}
?>
