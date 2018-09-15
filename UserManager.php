<?php
class UserManager extends Manager{
    const TABLE_NAME = "user";

    public function add(User $user, $stop=false){
        $cursor = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE pseudo = ? OR email = ?');
        $cursor->execute(array($user->getPseudo(), $user->getEmail()));
        $result = $cursor->fetch();
        if($result){
            if($result['pseudo'] == $user->getPseudo()){if($stop){echo 291;exit(291);}return 291;}
            if($result['email'] == $user->getEmail()){if($stop){echo 292;exit(292);}return 292;}
            return 299;
        }

        $req = $this->_db->prepare('INSERT INTO '.self::TABLE_NAME.'(pseudo, email, password, token, extra, active, creation) VALUES(
            :pseudo,
            :email,
            :password,
            :token,
            :extra,
            :active,
            :creation
        )');
        $req->execute(array(
            "pseudo" => $user->getPseudo(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword(),
            "token" => $user->getToken(),
            "extra" => $user->getExtra(),
            "active" => $user->getActive(),
            "creation" => $user->getCreation()
        ));
    }

    public function delete(User $user){
		$req = $this->_db->prepare('DELETE FROM '.self::TABLE_NAME.' WHERE id = :id');
		$req->execute(array("id" => $user->getId()));
    }

    public function get($id, $stop=false){
        $req = $this->_db->prepare('SELECT * FROM '.self::TABLE_NAME.' WHERE id = ? OR pseudo = ? OR email = ?');
        $req->execute(array($id, $id, $id));
        $result = $req->fetch();
        if(!$result){if($stop){echo 293;exit(293);}return 293;}
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
        $req = $this->_db->prepare('UPDATE '.self::TABLE_NAME.' SET password = :password, token = :token, extra = :extra, active = :active WHERE id = :id');
        $req->execute(array(
            "password" => $user->getPassword(),
            "token" => $user->getToken(),
            "extra" => $user->getExtra(),
            "active" => $user->getActive(),
        ));
    }
}
