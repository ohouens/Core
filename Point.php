<?php
class Point extends Track{
    protected $name;

    public function compressName(){

    }

    public function decompressName(){
        
    }

    public function getName(){
        return $this->_name;
    }

    public function setName($name){
        if(!preg_match("#^$#", $name)){
            trigger_error("Incorrect format of name" E_USER_WARNING);
            return;
        }
        $this->_name = $name;
    }
}
