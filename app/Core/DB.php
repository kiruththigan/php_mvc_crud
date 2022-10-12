<?php

class DB
{
    protected $db;
    
    public function connect()
    {
        // $database = new MysqliDb(HOST, USER, PASS, DBNAME);
        // if (!$database->connect()) {
        //     $this->db = $database;
        //     return $this->db;
        // } else {
        //     echo "error";
        // }


        $this->db=mysqli_connect(HOST, USER, PASS, DBNAME);
        if ($this->db) {
            return $this->db;
        } else {
            echo "error";
        }
    }

    public function getAll($table)
    {
       $sql="SELECT * FROM `".$table."`";
       return mysqli_query($this->db,$sql);
    }

    public function insert($table,$data)
    {     
       $array_keys=array_keys($data);
       $array_values=array_values($data);
        
       $column='';
       $tdata='';

       foreach ($array_keys as $key => $value) {
        if ($key==0) {
            $column=$column."`".$value."`";
        }else {
            $column=$column.", `".$value."`";
        }
       }

       foreach ($array_values as $key => $value) {
        if ($key==0) {
            $tdata=$tdata."'".$value."'";
        }else {
            $tdata=$tdata.", '".$value."'";
        }
       }

       $sql="INSERT INTO `".$table."` (".$column.") VALUES (".$tdata.")";
       return mysqli_query($this->db,$sql);
    }

    public function getOne($table,$id)
    {
        $sql="SELECT * FROM `".$table."` WHERE id=".$id;
        return mysqli_query($this->db,$sql);
    }

    public function update($table,$data)
    {
        $set='';
        $count=0;
        foreach ($data as $key => $value) {
            if ($count>0) {
                if ($count==1) {
                    $set=$set.$key."='".$value."'";
                } else {
                    $set=$set.",".$key."='".$value."'";
                }
            }
            $count++;
        }
        $sql="UPDATE `".$table."` SET ".$set." WHERE id=".$data['id'];
        return mysqli_query($this->db,$sql);
    }

    public function delete($table,$id)
    {
        $sql="DELETE FROM `".$table."` WHERE id=".$id;
        return mysqli_query($this->db,$sql);
    }
}
