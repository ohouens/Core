<?php
class Post extends Track{
    protected $_user;
    protected $_type;
    protected $_field;

    public function __construct(array $data=[]){
        $this->setType(0);
        parent::__construct($data);
    }

    public function setUser($user){
        if(!preg_match("#^[0-9]+$#", $user)){
            trigger_error("User must be an integer", E_USER_WARNING);
            return;
        }
        $this->_user = (int)$user;
    }

    public function setType($type){
        if(!is_int($type)){
            trigger_error("Type must be an integer", E_USER_WARNING);
            return;
        }
        $this->_type = $type;
    }

    public function setField($field){
        if(!is_string($field)){
            trigger_error('Field must be a string', E_USER_WARNING);
            return;
        }
        $this->_field = $field;
    }

    public function getUser(){
        return $this->_user;
    }

    public function getType(){
        return $this->_type;
    }

    public function getField(){
        return $this->_field;
    }
}
