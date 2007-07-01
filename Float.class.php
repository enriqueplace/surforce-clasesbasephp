<?
//include_once("classNumber.php");
include_once("Number.class.php");

class Float extends Number{
	private $value;
	static private $instancia = NULL;


	public function __construct($numberFloat) {
        if (is_numeric($numberFloat))
        	$this->value = $numberFloat;
        else
        	throw new exception ('Se ha producico un error, ' .
                                'parámetro del constructor de la clase no es númerico');
	}

	public function isFloat($varNumber){
        if (is_numeric($varNumber))
        	return true;
        else
            return false;
	}

	public function intValue(){
        echo parent:: intValue();
	}
	public function toString(){
        //return settype($value, "string");
        return settype($this->value,"string");

	}

	public function floatValue(){
               return parent::floatValue();
    }
    public function compare($f2){
       return bccomp("$this->value","$f2",'9');
    }

	static public function valueOf($vFloat) {
       if (self::$instancia == NULL) {
          self::$instancia = new float($vFloat);
       }
       return self::$instancia;
    }
}

?>