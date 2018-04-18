<?php
class User extends Raw{
    protected $_pseudo;
    protected $_email;
    protected $_password;
    protected $_cle;
    protected $_extra;
    protected $_active;
    protected $_creation;

    public function getPseudo(){
        return $this->_pseudo;
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
}
