<?php
class Group extends Track{
    protected $_name;
    protected $_membre;

    public function hydrate(array $data){
        parent::hydrate($data);
        $this->decompressMembre();
        $this->decompressExtra();
    }

    public function compressMembre(){
        $tab = "";
        foreach ($this->_var as $key => $val)
            if(preg_match(Constant::REGEX_CREATION, $val))
                $tab = self::compress([$tab, self::assign([$key => $val])]);
        return $tab;
    }

    public function compressExtra(){
        $tab = "";
        foreach ($this->_var as $key => $val)
            if(!preg_match(Constant::REGEX_CREATION, $val))
                $tab = self::compress([$tab, self::assign([$key => $val])]);
        return $tab;
    }

    public function decompressMembre(){
        $membres = self::decompress($this->_membre);
        foreach($membres as $string)
            $this->addVar($string);
    }

    public function getName(){
        return $this->_name;
    }

    public function getMembre(){
        return $this->_membre;
    }

    public function setName($name){
        if(!preg_match(Constant::REGEX_NAME_GROUP, $name)){
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
}
