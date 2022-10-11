<?php
class User extends DB{
    private $table = "user";
    private $conn;

    public function __construct()
    {
        $this->conn=$this->connect();
    }

    public function getAllUsers(){
        return $this->conn->get($this->table);
    }

    public function insertUser($data){
        return $this->conn->insert($this->table,$data);
    }

    public function deleteUser($id)
    {
        $db=$this->conn->where('id',$id);
        return $db->delete($this->table);
    }

    public function getRow($id)
    {
        $db=$this->conn->where("id",$id);
        return $db->getOne($this->table);

    }

    public function updatetUser($data)
    {
        $db=$this->conn->where("id",$data['id']);
        return $db->update($this->table,$data);
    }
}