<?
include_once("classNumber.php");

class Float extends Number{ 
	private $value;
	static private $instancia = NULL;
	
	// GARCIA
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
	// MSL
	public function intValue(){ 
        echo parent:: intValue(); 
	} 
	public function toString(){ 
        return settype($value, "string"); 
        
	} 
	// ANTONIO
	public function floatValue(){ 
               return parent::floatValue(); 
    } 
    public function compare($f2){ 
       return bccomp("$this->value","$f2",'9'); 
    } 
	// LISANDRO
	static public function valueOf($vFloat) {
       if (self::$instancia == NULL) {
          self::$instancia = new float($vFloat);
       }
       return self::$instancia;
    }
} 
//prueba de métodos

// constructor
$valor = new Float(12.32);

//valueOf
$valor2 = float::valueOf(12.33);
$valor3 = float::valueOf(12365463);

//Compare
echo $valor->compare(12.32)."<br/>";
echo $valor->compare(12.00)."<br/>";
echo $valor->compare(14.15)."<br/>"; 

echo $valor2->compare(12.32)."<br/>";
echo $valor2->compare(12.00)."<br/>";
echo $valor2->compare(14.15)."<br/>"; 
//No va a funcionar porque en realidad porque $valor3 es una copia de $valor2
echo $valor3->compare(12.32)."<br/>";
echo $valor3->compare(12.00)."<br/>";
echo $valor3->compare(14.15)."<br/>"; 


?>