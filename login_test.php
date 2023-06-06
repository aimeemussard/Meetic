<?php
session_start();
/*
function validate_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
*/
if(isset($_POST['login'])) {
    $email = ($_POST['get_email']);
    //$salt="chocolat";
    $password = sha1($_POST['get_password']);

    require_once    ('db.php');
    $stmt = $database->prepare('SELECT * FROM user WHERE email = :email');
    $stmt->execute(array(
        ':email' => $email
    ));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    if($user) {
        if($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            header('Location:account.html');
            exit;
        } else {
            echo 'Incorrect password';
        }
    } else {
        echo 'Incorrect username';
    }
    /*
    if($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: account.html');
    } else {
        echo 'Incorrect username or password';
    }*/
 
}
?>