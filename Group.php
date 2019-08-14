<?php
class Group extends Track{
    protected $_name;
    protected $_membre;

    const HASHNAME = "group";

    public function hydrate(array $data){
        parent::hydrate($data);
        $this->decompressMembre();
        $this->decompressExtra();
    }

    public function compressMembre(){
        $extra = "";
        foreach ($this->_var as $key => $val)
            if(preg_match(Constant::REGEX_CREATION, $val))
                $extra = self::compress([$extra, self::assign([$key => $val])]);
        return $extra;
    }

    public function compressExtra(){
        $extra = "";
        foreach ($this->_var as $key => $val)
            if(!preg_match(Constant::REGEX_CREATION, $val))
                $extra = self::compress([$extra, self::assign([$key => $val])]);
        return $extra;
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
