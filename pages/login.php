<?php

session_start();

echo "bonjour " . $_SESSION["email"];



    
    $dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");
    
    if (isset($_POST["login"])) {
        
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            echo "<p>Veuillez renseigner tous les champs</p>";
        } else {

            $query = $dbh->prepare(
                "SELECT users.email, users.password FROM users WHERE email= ? AND password= ?"
            );
    
            $query->execute([$_POST['email'], $_POST['password']]);

            $count = $query->rowCount();
            if($count > 0){
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["password"] = $_POST["password"];
                header("location: http://localhost:8888/BTC/index.php");
            } else {
                echo "Erreur 404";
            }
        }

    }

    ?>


<!DOCTYPE html>

<html>

<head>

</head>

<body>
    <section>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="email" required value="<?php echo $_POST['email'] ?? "" ?>">
            <input type="password" name="password" placeholder="mdp : *****" required value="<?php echo $_POST['password'] ?? "" ?>">
            <button type="submit" name="login">Connexion</button>
        </form>
    </section>




</body>

</html>