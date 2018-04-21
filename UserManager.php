<?php
class UserManager extends Manager{
    const TABLE_NAME = "user";

    public function add(User $user){
        $req = $this->_db->prepare('INSERT INTO '.self::TABLE_NAME.'(pseudo, email, password, key, extra, active, creation) VALUES(
            :pseudo,
            :email,
            :password,
            :key,
            :extra,
            :active,
            :creation
        )');
        $req->execute(array(
            "pseudo" => $user->getPseudo(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword(),
            "key" => $user->getKey(),
            "extra" => $user->getExtra(),
            "active" => $user->getActive(),
            "creation" => $user->getCreation()
        ));
    }

    public function delete(User $user){
		$req = $this->_db->prepare('DELETE FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $user->getId()));
    }

    public function get($id){
        $req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE id = :id');
        $req->execute(array("id" => $id));
        $result = $req->fetch();
        if(!$result)return 44;
        return new User($result);
    }

    public function getList(){
		$req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME);
		$req->execute();
		$result = $req->fetchAll();
		for($i=0; $i<count($result); $i++)
			$this->_list[$i] = new User($result[$i]);
		return $this->_list;
    }

    public function update(User $user){
        $req = $this->_db->prepare('UPDATE '.self::TABLE_NAME.' SET password = :password, key = :key, extra = :extra, active = :active WHERE id = :id');
        $req->execute(array(
            "password" => $user->getPassword(),
            "key" => $user->getKey(),
            "extra" => $user->getExtra(),
            "active" => $user->getActive(),
        ));
    }
}
