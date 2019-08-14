<?php
class HashTable extends Manager{
    private $_type;

    const TABLE_NAME = "hashage";

    public function __construct(PDO $db, $type){
        parent::__construct($db);
        $this->_type = $type;
    }

    public function get($id){
        $req = $this->_db->prepare('SELECT token FROM '.self::TABLE_NAME.' WHERE type = :type AND id = :id');
		$req->execute(array(
            "type" => $this->_type,
            "id" => $id
        ));
		$result = $req->fetch();
		if(!$result)return 44;
		return $result["token"];
    }

    public function traduct($token){
        $req = $this->_db->prepare('SELECT id FROM '.self::TABLE_NAME.' WHERE type = :type AND token = :token');
		$req->execute(array(
            "type" => $this->_type,
            "token" => $token
        ));
		$result = $req->fetch();
		if(!$result)return 44;
		return $result["id"];
    }

    public function getList(){
        $req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE type = :type');
		$req->execute(array("type"=>$this->_type));
        return $req->fetchAll();
    }

    public function add($id){
        if($this->get($id) != 44)
            return 45;
        $req = $this->_db->prepare('INSERT INTO '.self::TABLE_NAME.'(token, type, id) VALUES(
			:token,
            :type,
            :id
		)');
		$req->execute(array(
			"token" => achage(40),
            "type" => $this->_type,
            "id" => $id
		));
        return Constant::ERROR_CODE_OK;
    }
}
