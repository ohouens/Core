<?php
class PointManager extends Manager{
    const TABLE_NAME = "point";

    public function add(Point $point){
		$req = $this->_db->prepare('INSERT INTO '.self::TABLE_NAME.'(name, token, extra, tab, active, creation) VALUES(
			:name,
            :token,
            :extra,
            :tab,
            :active,
            :creation
		)');
		$req->execute(array(
			"name" => $point->getName(),
            "token" => $point->getToken(),
            "extra" => $point->getExtra(),
            "tab" => $point->getTab(),
            "active" => $point->getActive(),
            "creation" => $point->getCreation()
		));
	}

	public function delete(Point $point){
		$req = $this->_db->prepare('DELETE FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $point->getId()));
	}

	public function get($id){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $id));
		$result = $req->fetch();
		if(!$result)return 44;
		return new Point($result);
	}

	public function getList(){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME);
		$req->execute();
		$result = $req->fetchAll();
		for($i=0; $i<count($result); $i++)
			$this->_list[$i] = new Point($result[$i]);
		return $this->_list;
	}

	public function update(Point $point){
		$req = $this->_db->prepare('UPDATE '.self::TABLE_NAME.' SET active = :active WHERE id = :id');
		$req->execute(array(
			"active" => $point->getActive(),
			"id" => $point->getId()
		));
	}
}
