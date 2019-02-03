<?php
class Overlay{
    protected $_raw;
    protected $_dataName;

    public function __construct(Raw $raw, $dataName){
        $this->_raw = $raw;
        $this->_dataName = $dataName;
    }

    public function getRaw(){
        return $this->_raw;
    }

    public function getDataName(){
        return $this->_dataName;
    }
}
