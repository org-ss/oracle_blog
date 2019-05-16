<?php
class Model{
	protected $pdo;

	public function __construct(){
		$this->pdo = new PDO("mysql:host=127.0.0.1;dbname=blog",'root','root');
	}

	public function __destruct(){
        $this->pdo = NULL;
    }
}