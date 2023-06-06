<?php

$insert_city = "INSERT INTO user (city) VALUES ('$city') WHERE firstname = '".$_SESSION['']."' AND lastname = '".$_SESSION['']."' AND email = '".$_SESSION['']."' AND password";

$insert_hobbies = "INSERT INTO user_hobbies (id_user, id_hobby) VALUES ()";

?>