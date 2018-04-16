<?php
class PostManager extends Manager{
	const POST_TABLE = "onisowo_demande";

	public function add(Raw $post){
		$req = $this->$_db->prepare('INSERT INTO '.self::POST_TABLE.'(user, type, field, active, creation) VALUES(
			:user,
			:type,
			:field,
			:active,
			:creation
		)');
		$req->execute(array(
			"user" => $post->getUser(),
			"type" => Post::compressType(),
			"field" => $post->getText(),
			"visible" => $post->getActive(),
			"creation" => $post->getDate()
		));
	}

	public function delete(Raw $post){
		$req = $this->$_db->prepare('DELETE FROM '.self::POST_TABLE.' WHERE id = :id');
		$req->execute(array("id" => $post->getId()));
	}

	public function get($id){
		$req = $this->_db->prepare('SELECT * FROM '.self::POST_TABLE.' WHERE id = :id');
		$req->execute(array("id" => $id));
		$result = $req->fetch();
		if(!$result)return 44;
		return new Post($result);
	}

	public function getList(){
		$req = $this->_db->prepare('SELECT * FROM '.self::POST_TABLE);
		$req->execute();
		$result = $req->fetchAll();
		for($i=0; $i<count($result); $i++)
			$this->_list[$i] = new Post($result[$i]);
		return $this->$_list;
	}

	public function update(Raw $post){
		$req = $this->_db->prepare('UPDATE '.self::POST_TABLE.' SET field = :field, type = :type WHERE id = :id');
		$req->execute(array(
			"field" => $post->getText(),
			"type" => $post->getType(),
			"id" => $post->getId()
		));
	}
}
