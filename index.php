<?php
$dbh = new PDO("mysql:dbname=cars_btc;host=127.0.0.1", "root", "");

// if ($_SERVER["REQUEST_METHOD"] = "POST"){
//     if($_POST["lastname"] != null) {
//         $_POST["firstname"],
//         $_POST["email"],
//         $_POST["password"]
//     }
// }


$query = $dbh->prepare(
    "INSERT INTO users (`lastname`, `firstname`, `email`, `password`) VALUES ($_POST[lastname], $_POST[firstname], $_POST[email], $_POST[password])
    "
)

// $query = $dbh->prepare('SELECT * FROM users WHERE email = ? AND ')




?>


<!DOCTYPE html>

<html>

<head>

</head>

<body>
    <section>

        <form action="" method="POST">
            <input type="text" name="lastname" placeholder="nom" value="<?php echo $_POST['lastname'] ?>" required />
            <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_POST['firstname'] ?>" required />
            <input type="email" name="email" placeholder="email" value="<?php echo $_POST['email'] ?>" required />
            <input type="password" name="password" placeholder="mot de passe" value="<?php echo $_POST['password'] ?>" required />
            <button>Valider</button>
        </form>
    </section>




</body>

</html>