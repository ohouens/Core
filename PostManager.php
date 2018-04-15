<?php
class PostManager extends Manager{
	const POST_TABLE = "onisowo_demande";

	public function add(Raw $post){
		$req = $this->$_db->prepare('INSERT INTO :post(user, type, field, active, creation) VALUES(
			:user,
			:type,
			:field,
			:active,
			:creation
		)');
		$req->execute(array(
			"post" => self::POST_TABLE,
			"user" => $post->getUser(),
			"type" => Post::compressType(),
			"field" => $post->getText(),
			"visible" => $post->getActive(),
			"creation" => $post->getDate()
		));
	}

	public function delete(Raw $post){
		$req = $this->$_db->prepare('DELETE FROM :post WHERE id = :id');
		$req->execute(array(
			"post" => self::POST_TABLE,
			"id" => $post->getId()
		));
	}

	public function get($id){
		$req = $this->_db->prepare('SELECT * FROM onisowo_demande WHERE id = :id');
		$req->execute(array(
			// "post" => self::POST_TABLE,
			"id" => $id
		));
		$result = $req->fetch();
		if(!$result)return 44;
		return new Post($result);
	}

	public function getList(){
		$req = $this->_db->prepare('SELECT * FROM :post');
		$req->execute(array("post" => self::POST_TABLE));
		$result = $req->fetchAll();
		for($i=0; $i<count($result); $i++)
			$this->_list[$i] = new Post($result[$i]);
		return $this->$_list;
	}

	public function update(Raw $post){
		$req = $this->_db->prepare('UPDATE :post SET field = :field, type = :type WHERE id = :id');
		$req->execute(array(
			"post" => self::POST_TABLE,
			"field" => $post->getText(),
			"type" => $post->getType(),
			"id" => $post->getId()
		));
	}
}
