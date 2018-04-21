<?php
class Point extends Track{
    protected $_name;
    protected $_origin;
    protected $_country;
    protected $_creator;


    public function compressName(){
        self::compress([$this->_country, $this->_origin, $this->_creator]);
    }

    public function decompressName(){
        $name = self::decompress($this->_name);
        $this->setContry($name[0]);
        $this->setOrigin($name[1]);
        $this->setCreator($name0[2]);
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
        if(!preg_match("#^[A-Z]{2}[0-9]{12}[A-Z]{2}$#", $name)){
            trigger_error("Incorrect name format" E_USER_WARNING);
            return;
        }
        $this->_name = $name;
    }

    public function setOrigin($origin){
        if(!preg_match("#^[0-9]{11}$#", $origin)){
            trigger_error("Incorrect format of origin" E_USER_WARNING);
            return;
        }
        $this->_origin = $origin;
    }

    public function setCountry($country){
        if(!preg_match("#^[A-Z]{2}$#", $country)){
            trigger_error("Incorrect country code format" E_USER_WARNING);
            return;
        }
        $this->_country = $country;
    }

    public function setCreator($creator){
        if(!preg_match("#^[0-9]{1}[A-Z]{2}$#", $creator)){
            trigger_error("Incorrect creator format" E_USER_WARNING);
            return;
        }
        $this->_creator = $creator;
    }
}
