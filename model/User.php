<?php
include_once('Model.php');

class User extends Model{
    #返回用户信息
	public function returnUser($uid){
		$statement = $this->pdo->prepare("select * from users where u_id=?");
		$statement->execute([$uid]);
		$user = $statement->fetch();
		return $user;

	}

	#验证登录身份
	public function verify($uEmail,$uPassword){

    	$statment=$this->pdo->prepare("select * from users where u_email=?");
    	$statment->execute([$uEmail]);    	
    	$user=$statment->fetch();
        
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

    #验证注册是否合法
    public function find($uEmail,$uName){

    	$statment1=$this->pdo->prepare("select * from users where u_email=?");
    	$statment1->execute([$uEmail]);
    	$result1=$statment1->fetch();

    	$statment2=$this->pdo->prepare("select * from users where u_name=?");
    	$statment2->execute([$uName]);
    	$result2=$statment2->fetch();	    	

    	if ($result1) {

    		return 1;
    		 
    	}else if($result2){

    		return 2;

    	}else{

    		return 0;
    	}

    }

    #保存注册用户信息
    public function save($uEmail,$uName,$uPassword){

		$statment=$this->pdo->prepare("insert into users (u_email,u_name,u_password,u_role) values (?,?,?,1)");
        $statment->execute([$uEmail,$uName,$uPassword]);
		
	}

    #修改用户信息
    public function update($uId,$uName,$uPassword,$uPhoto,$uIntroduce){
        $statment = $this->pdo->prepare("update users set u_name=?,u_password=?,u_photo=?,u_introduce=? where u_id=?");
        $statment->execute([$uName,$uPassword,$uPhoto,$uIntroduce,$uId]);
    }

    #获取表格中的记录条数
    public function getCount($uId){
        $statement = $this->pdo->prepare("select * from users where u_id!=?");
        $statement->execute([$uId]);
        $num = $statement->fetchColumn();#返回结果集中的一个字段
        return $num;
    }

    #将表格中的记录分页显示
    public function page($page,$uId){
        $page = $page*5;
        $sql = "select *from users where u_id!=".$uId." order by u_id limit ".$page.",5";
        $statement = $this->pdo->query($sql);
        $result = $statement->fetchAll();
        return $result;
    }

    #删除某个用户
    public function delete($uId){
        $statment = $this->pdo->prepare("delete from users where u_id=?");
        $statment->execute([$uId]);
    }

    #删除所有用户
    public function delAll($uId){
        $statment = $this->pdo->prepare("delete() from users where u_id!=?");
        $statment->execute([$uId]);
    }

}