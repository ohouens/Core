<?php
class User extends Track{
    protected $_pseudo;
    protected $_email;
    protected $_password;

    public function __construct(array $data = []){
        $this->_pseudo = "";
        $this->_email = "";
        $this->_password = "";
        parent::__construct($data);
    }

    public function getPseudo(){
        return $this->_pseudo;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function setPseudo($pseudo){
        if(!preg_match("#^.{1,20}$#", $pseudo)){
            trigger_error("Pseudo must be length from 1 to 20 characters", E_USER_WARNING);
            return 20;
        }
        if(!preg_match("#^[a-z0-9_]{1,20}$#", $pseudo)){
            trigger_error("Pseudo can only contain lower case, underscore and numbers", E_USER_WARNING);
            return 21;
        }
        $this->_pseudo = $pseudo;
    }

    public function setEmail($email){
        if(!preg_match("#^[a-z0-9-_.]{2,}@[a-z]+\.[a-z]{2,}$#", $email)){
            trigger_error("Incorect format of email", E_USER_WARNING);
            return 22;
        }
        $this->_email = $email;
    }

    public function setPassword($password){
        if(!preg_match("#.{8,}#", $password)){
            trigger_error("Password must be at least 8 characters", E_USER_WARNING);
            return 23;
        }
        if(!preg_match("#[a-z]#", $password)){
            trigger_error("Password must at least contain 1 lower case", E_USER_WARNING);
            return 24;
        }
        if(!preg_match("#[A-Z]#", $password)){
            trigger_error("Password must at least contain 1 upper case", E_USER_WARNING);
            return 25;
        }
        if(!preg_match("#[0-9]#", $password)){
            trigger_error("Password must at least contain 1 number", E_USER_WARNING);
            return 26;
        }
        $this->_password = $password;
    }
}
