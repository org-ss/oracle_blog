<?php
include_once('Model.php');

class User extends Model{

	public function returnUser($uid){#返回博客主人
		$statement = $this->pdo->prepare("select * from users where u_id=?");
		$statement->execute([$uid]);
		$user = $statement->fetch();
		return $user;

	}

	//验证登录身份
	public function verify($uEmail,$uPassword){

    	$statment=$this->pdo->prepare("select * from users where u_email=?");
    	$statment->execute([$uEmail]);    	
    	$user=$statment->fetch();
        
        //print_r($user);
        if ($user) {
            if ($user['u_email']==$uEmail && $user['u_password']==$uPassword) {
                return $user;
            }else{
                return 1;
            }
        }else{
            return 0;
        }
    	
    }

    //验证注册是否合法
    public function find($uEmail,$uName){

    	//echo "这是收到的邮箱".$uEmail."<br/>";

    	$statment1=$this->pdo->prepare("select * from users where u_email=?");
    	$statment1->execute([$uEmail]);
    	$result1=$statment1->fetch();

    	//echo "这是收到的用户名".$uName."<br/>";

    	$statment2=$this->pdo->prepare("select * from users where u_name=?");
    	$statment2->execute([$uName]);
    	$result2=$statment2->fetch();

    	//var_export($result2);    	    	    	

    	if ($result1) {

    		return 1;
    		 
    	}else if($result2){

    		return 2;

    	}else{

    		return 0;
    	}

    }

    public function save($uEmail,$uName,$uPassword){

		$statment=$this->pdo->prepare("insert into users (u_email,u_name,u_password,u_role) values (?,?,?,1)");
        $statment->execute([$uEmail,$uName,$uPassword]);
		
	}

    public function update($uId,$uName,$uPassword,$uPhoto,$uIntroduce){
        $statment = $this->pdo->prepare("update users set u_name=?,u_password=?,u_photo=?,u_introduce=? where u_id=?");
        $statment->execute([$uName,$uPassword,$uPhoto,$uIntroduce,$uId]);
    }

}