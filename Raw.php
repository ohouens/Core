<?php
class Raw{
    protected $_id;
    protected $_var;

    private static $_cpt = 0;

    const DELIMITER = "|";
    const ASSIGNMENT = ":";

    public function __construct(array $data){
        self::$_cpt++;
        $this->_var = [];
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public static function compress(array $data){
        $result = "";
        for($i=0; $i<count($data)-1; $i++)
            $result .= $data[$i].self::DELIMITER;
        $result .= $data[count($data)-1];
        return $result;
    }

    public static function decompress($result){
        return explode(self::DELIMITER, $result);
    }

    public static function assign(array $val){
        return key($val).self::ASSIGNMENT.$val[key($val)];
    }

    public function addVar($string){
        if($string == "")
            return;
        if(!preg_match("#^[\w]+".self::ASSIGNMENT.".*$#", $string)){
            trigger_error("Incorrect format", E_USER_WARNING);
            return;
        }
        $inter = explode(self::ASSIGNMENT, $string);
        $this->_var[$inter[0]] = $inter[1];
    }

    public function setId($id){
        if(!preg_match("#^[0-9]+$#", $id)){
            trigger_error('ID must be an integer', E_USER_WARNING);
            return;
        }
        $this->_id = (int)$id;
    }

    public function getId(){
        return $this->_id;
    }
}
