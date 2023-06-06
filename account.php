<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="./style/style-account.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./search.html">Rechercher</a></li>
            </ul>
            <ul>
                <li><a href="#">Mon compte</a>
                    <ul>
                        <li><a href="./user.html">Mes informations</a></li>
                        <li><a href="./sign_in.html">Se déconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        
    </main>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php
}else{
header("Location: index.php");
exit();
}
?>