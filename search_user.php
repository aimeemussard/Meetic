<?php

$gender = $age = $city = $hobbies = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = validate_data($_POST['get_gender']);
    $age = validate_data($_POST['get_age']);
    $city = validate_data($_POST['get_city']);
    $hobbies = validate_data($_POST['get_hobbies']);
}

function validate_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    //search queries

    //age + gender + city + hobbies
if(isset($age) && !empty($age) && isset($gender) && !empty($gender) && isset($city) && !empty($city) && isset($hobbies) && !empty($hobbies)){
        
    if(strlen($age) == 2){
    $tab = explode("-", $age);
    $min = tab[0];
    $max = tab[1];

    $search_user1 = "SELECT * FROM user WHERE (age BETWEEN '$min' AND '$max') AND gender = '$gender' AND city = '$city'";

    require_once('db.php');
    $query = $database->prepare($search_user1);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $result){
        ?>
            <?= $result['gender'];?>
            <?= $result['firstname'];?>
            <?= $result['lastname'];?>
            <?= $result['age'];?>
            <?= $result['city'];?>
            <?= $result['hobbies'];?>
        
    <?php
    }

}else{
    $min = $age;
    $search_user2 = "SELECT * FROM user WHERE (age >= '$min') AND gender = '$gender' AND city = '$city'";

    require_once('db.php');
    $query = $database->prepare($search_user2);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $result){
        ?><div>
            <?= $result['gender'];?>
            <?= $result['firstname'];?>
            <?= $result['lastname'];?>
            <?= $result['age'];?>
            <?= $result['city'];?>
            <?= $result['hobbies'];?>
        </div>
    <?php
    }
}
}


?>