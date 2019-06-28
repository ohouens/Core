<?php
class PostManager extends Manager{
	const TABLE_NAME = "post";

	public function add(Post $post){
		$req = $this->_db->prepare('INSERT INTO '.self::TABLE_NAME.'(user, type, field, extra, active, creation) VALUES(
			:user,
			:type,
			:field,
			:extra,
			:active,
			:creation
		)');
		$req->execute(array(
			"user" => $post->getUser(),
			"type" => $post->getType(),
			"field" => $post->getField(),
			"extra" => $post->getExtra(),
			"active" => $post->getActive(),
			"creation" => $post->getCreation()
		));
	}

	public function delete(Post $post){
		$req = $this->_db->prepare('DELETE FROM '.self::TABLE_NAME.' WHERE id = :id');
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
		return $this->_list;
	}

	public function update(Post $post){
		$req = $this->_db->prepare('UPDATE '.self::TABLE_NAME.' SET field = :field, type = :type, extra = :extra, WHERE id = :id');
		$req->execute(array(
			"field" => $post->getField(),
			"type" => $post->getType(),
			"extra" => $post->getExtra(),
			"id" => $post->getId()
		));
	}

	public function listFormatFilter(array $list, array $formats){
		//Post list[]
        //int formats[]
        $final = [];
        foreach($list as $inter){
            if(in_array($inter->getFormat(), $formats))
                array_push($final, $inter);
        }
        return $final;
    }
}
