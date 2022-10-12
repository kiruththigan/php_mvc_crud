<?php
class User extends DB{
    private $table = "user";
    private $conn;

    public function __construct()
    {
        $this->conn=$this->connect();
    }

    public function getAllUsers(){
        // return $this->conn->get($this->table);
        return $this->getAll($this->table);
    }

    public function insertUser($data){
        // return $this->conn->insert($this->table,$data);
        return $this->insert($this->table,$data);
    }

    public function deleteUser($id)
    {
        // $db=$this->conn->where('id',$id);
        // return $db->delete($this->table);
        return $this->delete($this->table,$id);
    }

    public function getRow($id)
    {
        // $db=$this->conn->where("id",$id);
        // return $db->getOne($this->table);
        return $this->getOne($this->table,$id);
    }

    public function updatetUser($data)
    {
        // $db=$this->conn->where("id",$data['id']);
        // return $db->update($this->table,$data);
        return $this->update($this->table,$data);
    }
}