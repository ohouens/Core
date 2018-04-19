<?php
abstract class Manager{
    protected $_db;

    public function __construct(PDO $db){
    	$this->_db = $db;
    }
    
	public abstract function get($id);

	public abstract function getList();
}
