<?php
$gender = $firstname = $lastname = $day = $month = $year = $password = $email = $city = $hobbies = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = validate_data($_POST['gender']);
    $firstname = validate_data($_POST['firstname']);
    $lastname = validate_data($_POST['lastname']);
    $day = validate_data($_POST['day']);
    $month = validate_data($_POST['month']);
    $year = validate_data($_POST['year']);
    $password = validate_data($_POST['password']);
    $email = validate_data($_POST['email']);
    $city = validate_data($_POST['city']);
    $hobbies = validate_data($_POST['hobbies']);
}

function validate_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

    //SQL query

$bytes = random_bytes(5);
$pepper = bin2hex($bytes);
$salt = "chocolat";
$hashed_pswd = sha1($password);

$birthdate = $year."-".$month."-".$day;
$age = "";

$add_user = "INSERT INTO user (gender,lastname,firstname,birthdate,age,city,email,password) VALUES ('$gender', '$lastname', '$firstname', '$birthdate', (DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),'".$birthdate."')), '%Y') + 0), '$city', '$email', '$hashed_pswd');";

    //add user to database

if(isset($password) && !empty($password) && isset($email) && !empty($email) && isset($firstname) && !empty($firstname) && isset($lastname) && !empty($lastname) && isset($gender) && !empty($gender) && isset($day) && !empty($day) && isset($month) && !empty($month) && isset($year) && !empty($year) && isset($city) && !empty($city)){ 
    require_once('db.php');
    $stmt = $database->prepare("SELECT * FROM user WHERE email= ?");
    $stmt -> execute([$email]);
    $user = $stmt -> fetch();
    if($user){
        header("Location:sign_up.html");
    }else{
        $query = $database->prepare($add_user);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        header("Location:sign_in.html");
    }
    
}
/*$query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $hashed_pswd, PDO::PARAM_STR);*/
?>