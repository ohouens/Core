<?php
class Group extends Track{
    protected $_name;
    protected $_membre;
    protected $_extra;

    public function hydrate(array $data){
        parent::hydrate($data);
        $this->decompressMembre();
        $this->decompressExtra();
    }

    public function compressMembre(){

    }

    public function compressExtra(){

    }

    public function decompressMembre(){
        $membres = self::decompress($this->_membre);
        foreach($membres as $string)
            $this->addVar($string);
    }

    public function decompressExtra(){
        $extras = self::decompress($this->_extra);
        foreach($extras as $string)
            $this->addVar($string);
    }

    public function getName(){
        return $this->_name;
    }

    public function getMembre(){
        return $this->_membre;
    }

    public function getExtra(){
        return $this->_extra;
    }

    public function setName($name){
        if(!preg_match("#^[A-Z]{1}[a-z]{0,}$#", $name)){
            trigger_error("Incorrect name format", E_USER_WARNING);
            return;
        }
        $this->_name = $name;
    }

    public function setMembre($membre){
        if(!preg_match("#^([0-9]+".self::ASSIGNMENT."[0-9]".self::DELIMITER.")*([0-9]+".self::ASSIGNMENT."[0-9])?$#", $membre)){
            trigger_error("Incorrect membre format", E_USER_WARNING);
            return;
        }
        $this->_membre = $membre;
    }

    public function setExtra($extra){
        if(!preg_match("#^([\w]+".self::ASSIGNMENT.".*".self::DELIMITER.")*([\w]+".self::ASSIGNMENT.".*)?$#", $extra)){
            trigger_error("Incorrect extra format", E_USER_WARNING);
            return;
        }
        $this->_extra = $extra;
    }
}
