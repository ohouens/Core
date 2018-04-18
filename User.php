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
        if(!preg_match("#^.{1,20}#$", $pseudo)){
            trigger_error("Pseudo must be length from 1 to 20 characters" E_USER_WARNING);
            return;
        }
        if(!preg_match("#^[a-z0-9_]{1,20}$#"), $pseudo){
            trigger_error("Pseudo can only contain lower case, underscore and numbers" E_USER_WARNING);
            return;
        }
        $this->_pseudo = $pseudo;
    }

    public function setEmail($email){
         $this->_email = $email;
    }

    public function setPassword($password){
         $this->_password = $password;
    }

    public function setKey($key){
         $this->_key = $key;
    }

    public function setExtra($extra){
         $this->_extra = $extra;
    }

    public function setActive($active){
         $this->_active = $active;
    }

    public function setCreation($creation){
         $this->_creation = $creation;
    }
}
