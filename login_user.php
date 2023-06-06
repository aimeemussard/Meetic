<?php
session_start();



$password = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = validate_data($_POST['email']);
    $password = validate_data($_POST['password']);
}

function validate_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($password) && !empty($password) && isset($email) && !empty($email)){ 
    require_once('db.php');
    $salt = "chocolat";
    
    $pass = sha1($salt.$password);
    $stmt = $database->prepare("SELECT * FROM user WHERE email= ? AND password= ?");
    $stmt -> execute(array($email, $pass));

    if($stmt->rowCount() > 0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $stmt->fetch()['id'];
        header("Location:account.php");
        exit();
    }else{
        //echo $user['passkey'];
        //echo ($user['password']);
    header("Location:sign_in.html");
    exit();
    }
    
    
}  
/*$stmt -> execute([$email]);
    $user = $stmt -> fetch();
    if($user){
        $pepper = $user['password'];
        if((sha1($salt.$password.$pepper)) == "$pepper"){
            $_SESSION['id'] = $user['id'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['birthdate'] = $user['birthdate'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['city'] = $user['city'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header("Location:account.php");
            exit();
    }*/
?>