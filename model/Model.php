<?php
class Model{
	protected $pdo;
	public function __construct(){
		$this->pdo = new PDO("oci:dbname=orcl;charset=utf8",'blogdata','123456');
	}
	public function __destruct(){
		
        $this->pdo = NULL;
    }
}