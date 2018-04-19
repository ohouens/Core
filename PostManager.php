<?php
class PostManager extends Manager{
	const TABLE_NAME = "post";

	public function add(Post $post){
		$req = $this->$_db->prepare('INSERT INTO '.self::TABLE_NAME.'(user, type, field, active, creation) VALUES(
			:user,
			:type,
			:field,
			:active,
			:creation
		)');
		$req->execute(array(
			"user" => $post->getUser(),
			"type" => $post->compressType(),
			"field" => $post->getText(),
			"visible" => $post->getActive(),
			"creation" => $post->getDate()
		));
	}

	public function delete(Post $post){
		$req = $this->$_db->prepare('DELETE FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $post->getId()));
	}

	public function get($id){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $id));
		$result = $req->fetch();
		if(!$result)return 44;
		return new Post($result);
	}

	public function getList(){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME);
		$req->execute();
		$result = $req->fetchAll();
		for($i=0; $i<count($result); $i++)
			$this->_list[$i] = new Post($result[$i]);
		return $this->$_list;
	}

	public function update(Post $post){
		$req = $this->_db->prepare('UPDATE '.self::TABLE_NAME.' SET field = :field, type = :type WHERE id = :id');
		$req->execute(array(
			"field" => $post->getText(),
			"type" => $post->getType(),
			"id" => $post->getId()
		));
	}
}
