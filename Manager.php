<?php
abstract class Manager{
    protected $_db;

    public function __construct(PDO $db){
    	$this->_db = $db;
    }

    public abstract function add(Raw $data);

	public abstract function delete(Raw $data);

	public abstract function get($id);

	public abstract function getList();

	public abstract function update(Raw $data);
}
