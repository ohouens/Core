<?php
class Raw{
    protected $_id;
    protected $_data;
    protected $_extra;

    const HASHNAME = "raw";

    private static $_cpt = 0;

    public function __construct(array $data = []){
        self::$_cpt++;
        $this->_data = [];
        $this->_extra = "";
        $this->hydrate($data);
        $this->decompressExtra();
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

    public function addData(array $data, $compress=true){
        foreach($data as $key => $value)
            $this->_data[$key] = $value;
        if($compress)
            $this->compressExtra();
    }

    public function removeData($key, $compress=true){
        if(array_key_exists($key, $this->_data))
            unset($this->_data[$key]);
        if($compress)
            $this->compressExtra();
    }

    public function compressExtra(){
        $this->_extra = json_encode($this->_data);
    }

    public function decompressExtra(){
        $this->_data = json_decode($this->_extra, true);
    }

    public function setId($id){
        if(!preg_match("#^[0-9]+$#", $id)){
            trigger_error('ID must be an integer', E_USER_WARNING);
            return;
        }
        $this->_id = (int)$id;
    }

    public function setExtra($extra){
        $this->_extra = $extra;
    }

    public function getId(){
        return $this->_id;
    }

    public function getData(){
        return $this->_data;
    }

    public function getExtra(){
        return $this->_extra;
    }
}
