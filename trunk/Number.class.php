<?php

/**
 * Clase base para todo tipo de numero (enteros, de coma flotante, etc).
 *
 * Esta clase solo define unos métodos bases que deberan ser implementados
 * en todas las clases hijas.
 *
 * @abstract
 * @access public
 */
abstract class Number {

        /**
         * Devuelve el valor en el tipo float
         *
         * @return float Es el valor en float
         */
        abstract public function floatValue();

        /**
         * Devuelve el valor en el tipo integer
         *
         * @return integer Es el valor en integer
         */
        abstract public function intValue();
}

?>