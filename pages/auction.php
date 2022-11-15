<?php


$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT * FROM `history`");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $auction => $content) {

    echo '<li>' . "Prix Enchere actuelle : " . $content["auction"] . '</li>';
    echo '<li>' . "Compte à rebours : " . $content["created_date"] . '</li>';
    echo "<form method=post>";
    echo "<input type=number name=enchere min='0'/>";
    echo "<button>Enchérir</button>";
    echo "</ul>";
    echo '<br>';
    echo "</form>";
}
