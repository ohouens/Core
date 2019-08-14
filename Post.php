<?php
class Post extends Track{
    protected $_user;
    protected $_type;
    protected $_field;

    const HASHNAME = "post";

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
        if(!preg_match("#^[0-9]{1,5}$#", $type)){
            trigger_error("Type must be an integer", E_USER_WARNING);
            return;
        }
        $this->_type = (int) $type;
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
