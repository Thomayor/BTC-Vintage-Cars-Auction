<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");
    
    $query = $dbh->prepare(
        "SELECT users.email, users.password FROM users WHERE email= ? AND password= ?"
    );
    $query->execute([$_POST['email'], $_POST['password']]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($result)){
        header("Location: http://localhost:8888/BTC/index.php");
        var_dump($result);
    }
    else{
    echo '<p> Veuillez vous connecter</p>';
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
            <button type="submit">Connexion</button>
        </form>
    </section>




</body>

</html>