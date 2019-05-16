<?php
include_once('Model.php');

class Photo extends Model{

	public function showAll($uid){
        $statment=$this->pdo->prepare("select * from photos where p_uid=?");
        $statment->execute([$uid]);
        $photos=$statment->fetchAll();
        return $photos;
    }
}