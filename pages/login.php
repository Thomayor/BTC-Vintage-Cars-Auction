<?php

session_start();

// echo "bonjour " . $_SESSION["email"];




$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

if (isset($_POST["login"])) {

    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "<p>Veuillez renseigner tous les champs</p>";
    } else {

        $query = $dbh->prepare(
            "SELECT users.email, users.password FROM users WHERE email= ? AND password= ?"
        );

        $query->execute([$_POST['email'], $_POST['password']]);

        $count = $query->rowCount();
        if ($count > 0) {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            header("location: http://localhost/cars/index.php");
        } else {
            echo "Erreur 404";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="index.css" rel="stylesheet" />
</head>

<body>
    <div class="background">
        <nav class="navbar">
            <img class="navbar-logo" src="" />
            <nav class="menu">
                <a href="#" style="
    padding-right: 15px">Home</a>
                <a href="#" style="
    padding-right: 15px">New Auction</a>
                <a href="#" style="
    padding-right: 15px">Connexion</a>
                <a href="#" style="
    padding-right: 15px">Inscription</a>
            </nav>
            <input type="text" placeholder="Search" class="navbar-search" />
        </nav>
    </div>

    <section>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="email" required value="<?php echo $_POST['email'] ?? "" ?>">
            <input type="password" name="password" placeholder="mdp : *****" required value="<?php echo $_POST['password'] ?? "" ?>">
            <button type="submit" name="login">Connexion</button>
        </form>
    </section>
</body>

</html>