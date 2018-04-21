<?php
class Group extends Track{
    protected $_name;
    protected $_membre;
    protected $_extra;

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
        $this->_membre = $membre;
    }

    public function setExtra($extra){
        $this->_extra = $extra;
    }
}
