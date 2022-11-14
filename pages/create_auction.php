<?php

session_start();

echo "bonjour " . $_SESSION["email"];
// echo "test " . $_SESSION['user_id'];

$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

$query = $dbh->prepare("INSERT INTO cars (`model`,`brand`,`power`,`year`,`description`,`price`,`img`,`date_time`,`user_id`) VALUES (?,?,?,?,?,?,?,?,?)");

$result = $query->execute([
    $_POST['model'],
    $_POST['brand'],
    $_POST['power'],
    $_POST['year'],
    $_POST['description'],
    $_POST['price'],
    $_POST['img'],
    $_POST['date_time'],
    $_SESSION['user_id']
]);

// $query->debugDumpParams();
// var_dump($params);
?>


<!-- formulaire -->
<h1> Déposer une annonce </h1>

<form action="" method="POST">

    <input type="text" name="model" placeholder="Modèle de voiture">
    <input type="text" name="brand" placeholder="Marque">
    <input type="text" name="power" placeholder="Puissance (cv)">
    <input type="text" name="year" placeholder="Années">
    <textarea name="description" placeholder="Commentez votre bolide"></textarea>
    <input type="text" name="price" placeholder="prix de vente">
    <input type="file" name="img">
    <input type="datetime-local" name="date_time">
    <button type="submit"> Envoyer</button>

</form>