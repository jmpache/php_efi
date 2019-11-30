<?php

class MySqlFunctions {

    private $server = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'php_efi';

    public function Connect(){
        $con = mysqli_connect($this->server, $this->username, $this->pass, $this->dbname) or die ("Database connection failed"); 
        return $con;
    }
    
    public function signUp($firstName, $lastName, $passw, $email){
        $sql = "INSERT INTO users VALUES (null, '$firstName', '$lastName', '$passw', '$email', null, null)";
        $con = $this->Connect();
        mysqli_query($con, $sql) or die ('Sign up failed' . mysqli_error($con));
    }

    public function logIn($user, $passw){
        $sql = 'SELECT email, password FROM users WHERE email = ? AND password = ?';
        $con = $this->Connect();
        $pre = $con->prepare($sql);
        $pre->bind_param('ss', $user, $passw);
        $pre->execute();
        $pre->bind_result($usuario, $password);
        $result = $pre->fetch();
        return $result;
    }

    public function insertPost($title, $description, $username){
        $sql = "INSERT INTO post VALUES (null, '$title', '$description', '$username', null)";
        $con = $this->Connect();
        $res = mysqli_query($con, $sql) or die ('Could not insert into post table' . mysqli_error($con));
    }

    public function getPosts(){
        $sql = "SELECT * FROM publicaciones INNER JOIN users WHERE publicaciones.user_id = users.id";
        $con = $this->Connect();
        $res = mysqli_query($con, $sql) or die ('Could not reach the posts' . mysqli_error($con));
        return $res;
    }

    public function deletePost($id){
        $sql = "DELETE FROM post WHERE id = '$id'";
        $con = $this->Connect();
        $res = mysqli_query($con, $sql) or die ('Could not delete this post' . mysqli_error($con));
    }

    public function updatePost($title, $description, $username, $id){
        $sql = "UPDATE post SET title='$title', description = '$description', username = '$username' WHERE id = $id";
        $con = $this->Connect();
        $res = mysqli_query($con, $sql) or die ('Could not update this post' . mysqli_error($con));
    }
}

?>