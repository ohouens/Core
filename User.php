<?php
class User extends Raw{
    protected $_pseudo;
    protected $_email;
    protected $_password;
    protected $_key;
    protected $_extra;
    protected $_active;
    protected $_creation;

    public function getPseudo(){
        return $this->_pseudo;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function getKey(){
        return $this->_key;
    }

    public function getExtra(){
        return $this->_extra;
    }

    public function getActive(){
        return $this->_active;
    }

    public function getCreation(){
        return $this->_creation;
    }

    public function setPseudo($pseudo){
        if(!preg_match("#^.{1,20}$#", $pseudo)){
            trigger_error("Pseudo must be length from 1 to 20 characters", E_USER_WARNING);
            return;
        }
        if(!preg_match("#^[a-z0-9_]{1,20}$#", $pseudo)){
            trigger_error("Pseudo can only contain lower case, underscore and numbers", E_USER_WARNING);
            return;
        }
        $this->_pseudo = $pseudo;
    }

    public function setEmail($email){
        if(!preg_match("#^[a-z0-9-_.]{2,}@[a-z]+\.[a-z]{2,}$#", $email)){
            trigger_error("Incorect format of email", E_USER_WARNING);
            return;
        }
        $this->_email = $email;
    }

    public function setPassword($password){
        if(!preg_match("#.{8,}#", $password)){
            trigger_error("Password must be at least 8 characters", E_USER_WARNING);
            return;
        }
        if(!preg_match("#[a-z]#", $password)){
            trigger_error("Password must at least contain 1 lower case", E_USER_WARNING);
            return;
        }
        if(!preg_match("#[A-Z]#", $password)){
            trigger_error("Password must at least contain 1 upper case", E_USER_WARNING);
            return;
        }
        if(!preg_match("#[0-9]#", $password)){
            trigger_error("Password must at least contain 1 number", E_USER_WARNING);
            return;
        }
        $this->_password = $password;
    }

    public function setKey($key){
        if(!preg_match("#^[a-zA-Z0-9]{32}$#", $key)){
            trigger_error("Key must contain 32 characters", E_USER_WARNING);
            return;
        }
        $this->_key = $key;
    }

    public function setExtra($extra){
        $this->_extra = $extra;
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
