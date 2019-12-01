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
        $sql = "SELECT email, password FROM users WHERE email = ? AND password = ?";
        $con = $this->Connect();
        $pre = $con->prepare($sql);
        $pre->bind_param('ss', $user, $passw);
        $pre->execute();
        $pre->bind_result($usuario, $password);
        $result = $pre->fetch();
        if ($result) {
            $sql = "SELECT * FROM users WHERE email = '$user'";
            $con = $this->Connect();
            $res = mysqli_query($con, $sql) or die ('Could not get user data' . mysqli_error($con));
            return $res;
        }else{
            return $result;
        }
    }

    public function insertPost($title, $description, $userId, $categoryId){
        $sql = "INSERT INTO publicaciones VALUES (null, '$title', '$description', null, null, null, '$userId', '$categoryId')";
        $con = $this->Connect();
        $res = mysqli_query($con, $sql) or die ('Could not insert into posts table' . mysqli_error($con));
    }

    public function getPosts($category){
        if ($category){
            $sql = "SELECT * FROM
            ((publicaciones INNER JOIN users 
            ON publicaciones.user_id = users.id)
            INNER JOIN categorias ON publicaciones.categoria_id = categorias.id)
            WHERE categorias.nombre = '$category'
            ";
        } else {
            $sql = "SELECT * FROM
            ((publicaciones INNER JOIN users 
            ON publicaciones.user_id = users.id)
            INNER JOIN categorias ON publicaciones.categoria_id = categorias.id)";                
        }
        
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

    public function getCategories(){
        $sql = "SELECT * FROM categorias";
        $con = $this->Connect();
        $res = mysqli_query($con, $sql) or die ('Could not get categories');
        return $res;
    }
}

?>