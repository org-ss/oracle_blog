<?php
include_once('Model.php');

class User extends Model{
    
    #返回用户信息
	public function returnUser($uid){

        // $conn = $this->conn();
        // $query = "select * from users where id=1";
        // $statement = oci_parse($conn, $query);
        // //oci_bind_by_name($statement, ":uId", $uid);
        // oci_execute($statement);
        // $result = oci_fetch_assoc($statement);
        // return $result;


		$statement = $this->pdo->prepare("select * from users where id=?");
		$statement->execute([$uid]);
		$user = $statement->fetch();
		return $user;

	}

	#验证登录身份
	public function verify($email,$password){

        $statement = $this->pdo->prepare("select * from users where email=?");
        $statement->execute([$email]);
        $user = $statement->fetch();
        

        // $conn = $this->conn();
        // $statement = oci_parse($conn, "select * from users where email=:email");
        // oci_bind_by_name($statement, ":email", $email);
        // oci_execute($statement);
        // $nrows=oci_fetch_all($statement, $user);
        
        if ($user) {
            if ($user['EMAIL']==$email && $user['PASSWORD']==$password) {
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

    	$statment1=$this->pdo->prepare("select * from users where email=?");
    	$statment1->execute([$uEmail]);
    	$result1=$statment1->fetch();

    	$statment2=$this->pdo->prepare("select * from users where name=?");
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

		$statment=$this->pdo->prepare("insert into users (email,name,password,role) values (?,?,?,1)");
        $statment->execute([$uEmail,$uName,$uPassword]);
		
	}

    #修改用户信息
    public function update($uId,$uName,$uPassword,$uPhoto,$uIntroduce){
        $statment = $this->pdo->prepare("update users set name=?,password=?,image=?,introduce=? where id=?");
        $statment->execute([$uName,$uPassword,$uPhoto,$uIntroduce,$uId]);
    }

    // public function showAll($uId){
    //     $statement = $this->pdo->prepare("select *from users where id!=?");
    //     $statement->execute([$uId]);
    //     $users = $statement->fetchAll();
    //     reutrn $users;
    // }

    #获取表格中的记录条数
    public function getCount($uId){
        $statement = $this->pdo->prepare("select count(*) from users where id!=?");
        $statement->execute([$uId]);
        $rows = $statement->fetch();
        return $rows[0];
    }

    #将表格中的记录分页显示
    public function page($page,$uId){
        $page = $page*5+1;
        $nextPage =$page+5;
        $statement = $this->pdo->prepare("select * from 
        (select rownum rn,u.* from users u where u.id!=?) e 
        where e.rn>=? and e.rn<?");
        $statement->execute([$uId,$page,$nextPage]);
        $result = $statement->fetchAll();
        return $result;
    }

    #删除某个用户
    public function delete($uId){
        $statment = $this->pdo->prepare("select *from users where id=?");
        $statment->execute([$uId]);
        $result = $statment->fetch();

        $statment = $this->pdo->prepare("delete from messages where name=?");
        $statment->execute([$result['NAME']]);
        $statment = $this->pdo->prepare("delete from users where id=?");
        $statment->execute($uId);
        // $statment = $this->pdo->prepare("select *from users where id=?");
        // $statment->execute([$uId]);
        // $result = $statment->fetch();

        // $statment = $this->pdo->prepare("delete from users where id=?");
        // $statment->execute([$uId]);
        // $statment = $this->pdo->prepare("delete from messages where name=?");
        // $statment->execute([$result['u_name']]);
    }

    #删除所有用户
    public function delAll($uId){
        $statment = $this->pdo->query("delete from messages");
        
        $statment = $this->pdo->prepare("delete from users where id!=?");
        $statment->execute([$uId]);  
    }

    #更新最近登录时间
    public function updateLasttime($email){
        $statement = $this->pdo->prepare("update users set lasttime=null where email=?");
        $statement->execute([$email]);
    }

}