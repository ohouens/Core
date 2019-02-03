<?php
class Raw{
    protected $_id;
    protected $_data;
    protected $_tab;
    protected $_var;
    protected $_extra;

    private static $_cpt = 0;

    const DELIMITER = "|";
    const ASSIGNMENT = ":";

    public function __construct(array $data = []){
        self::$_cpt++;
        $this->_data = [];
        $this->_tab = "";
        $this->_var = [];
        $this->_extra = "";
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $state = $this->$method($value);
                if(is_int($state)){
                    echo $state;
                    exit($state);
                }
            }
        }
    }

    public static function compress(array $data){
        $result = "";
        for($i=0; $i<count($data)-1; $i++)
            if($data[$i] != "")
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

    public function addData(array $data){
        foreach($data as $key => $value)
            $this->_data[$key] = $value;
    }

    public function removeData($key){
        if(array_key_exists($key, $this->_data))
            unset($this->_data[$key]);
    }

    public function compressTab(){
        $this->_tab = json_encode($this->_data);
    }

    public function decompressTab(){
        $this->_data = json_decode($this->_tab);
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

    public function removeVar($key){
        if(array_key_exists($key, $this->_var))
            unset($this->_var[$key]);
    }

    public function compressExtra(){
        $tab = "";
        foreach ($this->_var as $key => $val)
            $tab = self::compress([$tab, self::assign([$key => $val])]);
        $this->_extra = $tab;
    }

    public function decompressExtra(){
        $extras = self::decompress($this->_extra);
        foreach($extras as $string)
            $this->addVar($string);
    }

    public function setId($id){
        if(!preg_match("#^[0-9]+$#", $id)){
            trigger_error('ID must be an integer', E_USER_WARNING);
            return;
        }
        $this->_id = (int)$id;
    }

    public function setExtra($extra){
        if(!preg_match("#^([\w]+".self::ASSIGNMENT.".*".self::DELIMITER.")*([\w]+".self::ASSIGNMENT.".*)?$#", $extra)){
            trigger_error("Incorrect extra format", E_USER_WARNING);
            return;
        }
        $this->_extra = $extra;
    }

    public function getId(){
        return $this->_id;
    }

    public function getData(){
        return $this->_data;
    }

    public function getTab(){
        return $this->_tab;
    }

    public function getVar(){
        return $this->_var;
    }

    public function getExtra(){
        return $this->_extra;
    }
}
