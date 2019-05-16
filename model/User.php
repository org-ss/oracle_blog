<?php
include_once('Model.php');

class User extends Model{

	public function returnAdmin($uid){#返回博客主人
		$statement = $this->pdo->prepare("select * from users where u_id=?");
		$statement->execute([$uid]);
		$user = $statement->fetch();
		return $user;

	}

	//验证身份
	public function verify($uEmail,$uPassword){

    	$statment=$this->pdo->prepare("select * from users where u_email=?");
    	$statment->execute([$uEmail]);
    	$user=$statment->fetch();
        print_r($user);

    	if ($user['u_email']==$uEmail && $user['u_password']==$uPassword) {
    		return $user;
    	}else{
    		return false;
    	}
    }

    public function save($uEmail,$uName,$uPassword){

		$statment=$this->pdo->prepare("insert into users (u_email,u_name,u_password) values (?,?,?)");
        $statment->execute([$uEmail,$uName,$uPassword]);
		
	}
}