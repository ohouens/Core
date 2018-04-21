<?php
class GroupManager extends Manager{
    const TABLE_NAME = "group";

    public function add(Group $group){
		$req = $this->_db->prepare('INSERT INTO '.self::TABLE_NAME.'(name, cle, active, creation) VALUES(
			:name,
            :cle,
            :active,
            :creation
		)');
		$req->execute(array(
			"name" => $group->getName(),
            "cle" => $group->getCle(),
            "active" => $group->getActive(),
            "creation" => $group->getCreation()
		));
	}

	public function delete(Group $group){
		$req = $this->_db->prepare('DELETE FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $group->getId()));
	}

	public function get($id){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $id));
		$result = $req->fetch();
		if(!$result)return 44;
		return new Group($result);
	}

	public function getList(){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME);
		$req->execute();
		$result = $req->fetchAll();
		for($i=0; $i<count($result); $i++)
			$this->_list[$i] = new Group($result[$i]);
		return $this->_list;
	}

	public function update(Group $group){
		$req = $this->_db->prepare('UPDATE '.self::TABLE_NAME.' SET active = :active WHERE id = :id');
		$req->execute(array(
			"active" => $group->getActive(),
			"id" => $group->getId()
		));
	}
}
