<?php
class UserController
{
    public function index()
    {
        $db = new User();
        $data['users']=$db->getAllUsers();
        View::load('user/index',$data);
    }

    public function add()
    {
        View::load('user/add');
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $username=$_POST['username'];
            $password=$_POST['password'];

            $data=array(
                "username"=>$username,
                "password"=>$password
            );

            $db = new User();
            
            if ($db->insertUser($data)) {
                View::load("user/index",["success"=>"Successfully Added.",'users'=>$db->getAllUsers()]);
            } else {
                View::load("user/index",["error"=>"Something Wrong.",'users'=>$db->getAllUsers()]);
            }
            
        }else{
            $db = new User();
            View::load("user/index",["error"=>"Something Wrong.",'users'=>$db->getAllUsers()]);
        }
    }

    public function edit($id)
    {
        $db=new User();
    
        if ($db->getRow($id)) {
            $data['row']=$db->getRow($id);
            $data['row']=$data['row']->fetch_assoc();
            View::load('user/edit',$data);
        } else {
            echo "Error";
        }
        
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $id=$_POST['id'];
            $username=$_POST['username'];
            $password=$_POST['password'];

            $data=array(
                "id"=>$id,
                "username"=>$username,
                "password"=>$password
            );

            $db = new User();
            
            if ($db->updatetUser($data)) {
                View::load("user/index",["success"=>"Successfully Updated.",'users'=>$db->getAllUsers()]);
            } else {
                View::load("user/index",["error"=>"Something Wrong.",'users'=>$db->getAllUsers()]);
            }
            
        }else{
            $db = new User();
            View::load("user/index",["error"=>"Something Wrong.",'users'=>$db->getAllUsers()]);
        }
    }

    public function delete($id)
    {
        $db=new User();
        
        if ($db->deleteUser($id)) {
            View::load("user/index",["success"=>"Successfully Deleted.",'users'=>$db->getAllUsers()]);
        } else {
            View::load("user/index",["error"=>"Something Wrong.",'users'=>$db->getAllUsers()]);
        }
        
    }
}
