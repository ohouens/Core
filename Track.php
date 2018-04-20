<?php
class Track extends Raw{
    protected $_key;
    protected $_active;
    protected $_creation;

    public function getKey(){
        return $this->_key;
    }

    public function getActive(){
        return $this->_active;
    }

    public function getCreation(){
        return $this->_creation;
    }

    public function setKey($key){
        if(!preg_match("#^[a-zA-Z0-9]{32}$#", $key)){
            trigger_error("Key must contain 32 characters", E_USER_WARNING);
            return;
        }
        $this->_key = $key;
    }

    public function setActive($active){
        if(!preg_match("#^[0-9]{1}$#", $active)){
            trigger_error("Activation code must be 1 number", E_USER_WARNING);
            return;
        }
        $this->_active = (int)$active;
    }

    public function setCreation($creation){
        if(!preg_match("#^[0-9]{1,}$#", $creation)){
            trigger_error("Date of creation must be an integer", E_USER_WARNING);
            return;
        }
        $this->_creation = (int)$creation;
    }
}
