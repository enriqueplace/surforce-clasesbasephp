<?
//include_once("classNumber.php");
include_once("Number.class.php");

class Float extends Number{
	private $value;
	static private $instancia = NULL;


	function __construct($numberFloat) {
		try {
		if (is_numeric($numberFloat))
			$this->value = $numberFloat;
		}catch (Exception $e){
			echo 'Se ha producido la siguiente excepción: ', $e->getMessage(), "\n";
		}
	}
	function isFloat($varNumber){
		try{
		if (!is_numeric($varNumber))
			return true;
     	else
			return false;
		}catch (Exception $e){
			echo 'Se ha producido la siguiente excepción: ', $e->getMessage(), "\n";
    	}
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