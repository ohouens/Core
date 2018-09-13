<?php
class Track extends Raw{
    protected $_token;
    protected $_active;
    protected $_creation;

    public function __construct(array $data=[]){
        $this->setToken(achage(32));
        $this->setActive(0);
        $this->setCreation(time());
        parent::__construct($data);
    }

    public function getToken(){
        return $this->_token;
    }

    public function getActive(){
        return $this->_active;
    }

    public function getCreation(){
        return $this->_creation;
    }

    public function setToken($token){
        if(!preg_match("#^[a-zA-Z0-9]{32}$#", $token)){
            trigger_error("Token must contain 32 characters", E_USER_WARNING);
            return;
        }
        $this->_token = $token;
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
