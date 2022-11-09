<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbh = new PDO("mysql:dbname=cars_btc;host=localhost", "root", "");

    $query = $dbh->prepare(
        "SELECT users.email, users.password FROM users"
    );
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>

<html>

<head>

</head>

<body>
    <section>
        <form action="" method="$_POST">
            <input type="email" placeholder="email" required>
            <input type="password" placeholder="passoword" required>
            <button type="submit">Valide</button>
        </form>
    </section>




</body>

</html>