<?php
class Post extends Track{
    protected $_user;
    protected $_type;
    protected $_format;
    protected $_read;
    protected $_write;
    protected $_field;

    public function __construct(array $data=[]){
        $this->setType('0|1|0');
        parent::__construct($data);
        $this->decompressType();
    }

    public function compressType(){
        $this->_type = self::compress([$this->getFormat(), $this->getRead(), $this->getWrite()]);
    }

    public function decompressType(){
        $types = parent::decompress($this->getType());
        $this->setFormat($types[0]);
        $this->setRead($types[1]);
        $this->setWrite($types[2]);
    }

    public function setUser($user){
        if(!preg_match("#^[0-9]+$#", $user)){
            trigger_error("User must be an integer", E_USER_WARNING);
            return;
        }
        $this->_user = (int)$user;
    }

    public function setType($type){
        if(!is_string($type)){
            trigger_error("Type must be an integer", E_USER_WARNING);
            return;
        }
        $this->_type = $type;
    }

    public function setWrite($write, $compress=true){
        if(!preg_match("#^[0-9]+$#", $write)){
            trigger_error("Write must be an integer", E_USER_WARNING);
            return;
        }
        $this->_write = (int)$write;
        if($compress)
            $this->compressType();
    }

    public function setFormat($format, $compress=true){
        if(!preg_match("#^[0-9]+$#", $format)){
            trigger_error("Format must be an integer", E_USER_WARNING);
            return;
        }
        $this->_format = (int)$format;
        if($compress)
            $this->compressType();
    }

    public function setRead($read, $compress=true){
        if(!preg_match("#^[0-9]+$#", $read)){
            trigger_error('Read must be an integer', E_USER_WARNING);
            return;
        }
        $this->_read = (int)$read;
        if($compress)
            $this->compressType();
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

    public function getWrite(){
        return $this->_write;
    }

    public function getFormat(){
        return $this->_format;
    }

    public function getRead(){
        return $this->_read;
    }

    public function getField(){
        return $this->_field;
    }
}
