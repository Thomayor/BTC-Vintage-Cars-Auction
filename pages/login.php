<?php
$dbh = new PDO("mysql:dbname=CAR;host=127.0.0.1;port=8889", "root", "root");

$query = $dbh->prepare(
"INSERT INTO cars (email, password) 
VALUES ($_POST[email], $_POST[password]
")


?>


<!DOCTYPE html>

<html>

<head>

</head>

<body>
    <section>
        <form action="" method="$_POST">
            <input type="email" placeholder="email" required>
            <input type="password" placeholder="mdp : *****" required>
            <button>Valid</button>
        </form>
    </section>




</body>

</html>