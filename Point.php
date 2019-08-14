<?php
class Point extends Track{
    protected $_name;
    protected $_origin;
    protected $_country;
    protected $_creator;

    const HASHNAME = "point";


    public function compressName(){
        $this->_name =  $this->_country.$this->_origin.$this->_creator;
    }

    public function decompressName(){
        if($this->_name == "")
            return;
        $this->setCountry(substr($this->_name, 0, 2));
        $this->setOrigin(substr($this->_name, 2, -3));
        $this->setCreator(substr($this->_name, -3));
    }

    public function hydrate(array $data){
        parent::hydrate($data);
        $this->decompressName();
    }

    public function getName(){
        return $this->_name;
    }

    public function getOrigin(){
        return $this->_origin;
    }

    public function getCountry(){
        return $this->_country;
    }

    public function getCreator(){
        return $this->_creator;
    }

    public function setName($name){
        if(!preg_match("#^[A-Z]{2}[0-9]{1}[0-9A-F]{2}[0-9]{9}[A-Z]{2}$#", $name)){
            trigger_error("Incorrect name format", E_USER_WARNING);
            return;
        }
        $this->_name = $name;
    }

    public function setOrigin($origin){
        if(!preg_match("#^[0-9A-F]{3}[0-9]{8}$#", $origin)){
            trigger_error("Incorrect format of origin", E_USER_WARNING);
            return;
        }
        $this->_origin = $origin;
    }

    public function setCountry($country){
        if(!preg_match("#^[A-Z]{2}$#", $country)){
            trigger_error("Incorrect country code format", E_USER_WARNING);
            return;
        }
        $this->_country = $country;
    }

    public function setCreator($creator){
        if(!preg_match("#^[0-9]{1}[A-Z]{2}$#", $creator)){
            trigger_error("Incorrect creator format", E_USER_WARNING);
            return;
        }
        $this->_creator = $creator;
    }
}
