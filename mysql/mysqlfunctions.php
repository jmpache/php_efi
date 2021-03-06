<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


class MySqlFunctions {

    private $server = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'php_efi';

    public function Connect(){
        $con = mysqli_connect($this->server, $this->username, $this->pass, $this->dbname) or die ("Database connection failed"); 
        return $con;
    }
    
    public function signUp($firstName, $lastName, $passw, $email, $avatar){
        $sql = "INSERT INTO users VALUES (null, '$firstName', '$lastName', '$passw', '$email', null, '$avatar')";
        $con = $this->Connect();
        mysqli_query($con, $sql) or die ('Sign up failed' . mysqli_error($con));
    }

    public function sendEmail($subj, $text, $email){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Bloggie');
            $mail->addAddress($email, 'Joe User');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subj;
            $mail->Body    = $text;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
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