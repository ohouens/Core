<?php
class Overlay{
    protected $_raw;
    protected $_manager;
    protected $_dataName;

    public function __construct(Raw $raw, Manager $manager, $dataName){
        $this->_raw = $raw;
        $this->_manager = $manager;
        $this->_dataName = $dataName;
    }

    public function getRaw(){
        return $this->_raw;
    }

    public function getManager(){
        return $this->_manager;
    }

    public function getDataName(){
        return $this->_dataName;
    }
}
