<?php
class Post extends Raw{
    protected $_user;
    protected $_type;
    protected $_group;
    protected $_format;
    protected $_range;
    protected $_text;
    protected $_active;
    protected $_date;

    public static function compressType(){
        parent::compress([$this->getGroup(), $this->getFormat(), $this->getRange()]);
    }

    public static function decompressType(){
        $types = parent::decompress($this->getType());
        $this->setGroup($types[0]);
        $this->setFormat($types[1]);
        $this->setRange($types[2]);
    }

    public function setUser($user){
        if(!is_int($user)){
            trigger_error("User must be an integer", E_USER_WARNING);
            return;
        }
        $this->_user = $user;
    }

    public function setType($type){
        if(!is_string($type)){
            trigger_error("Type must be an integer", E_USER_WARNING);
            return;
        }
        $this->_type = $type;
    }

    public function setGroup($group){
        if(!is_int($group)){
            trigger_error("Group must be an integer", E_USER_WARNING);
            return;
        }
        $this->_group = $group;
    }

    public function setFormat($format){
        if(!is_int($format)){
            trigger_error("Format must be an integer", E_USER_WARNING);
            return;
        }
        $this->_format = $format;
    }

    public function setRange($range){
        if(!is_int($range)){
            trigger_error('Range must be an integer', E_USER_WARNING);
            return;
        }
        $this->_range = $range;
    }

    public function setText($text){
        if(!is_string($text)){
            trigger_error('Text must be a string', E_USER_WARNING);
            return;
        }
        $this->_text = $text;
    }

    public function setActive($active){
        if(!is_int($active)){
            trigger_error('Active must be an integer', E_USER_WARNING);
            return;
        }
        $this->_active = $active;
    }

    public function setDate($date){
        if(!is_numeric($date)){
            trigger_error("Date format must be numeric", E_USER_WARNING);
            return;
        }
        $this->_date = $date;
    }

    public function getUser(){
        return $this->_user;
    }

    public function getType(){
        return $this->_type;
    }

    public function getGroup(){
        return $this->_group;
    }

    public function getFormat(){
        return $this->_format;
    }

    public function getRange(){
        return $this->_range;
    }

    public function getText(){
        return $this->_text;
    }

    public function getActive(){
        return $this->_active;
    }

    public function getDate(){
        return $this->_date;
    }
}
