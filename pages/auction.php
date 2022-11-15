<?php


$dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889", "root", "root");

$query = $dbh->prepare("SELECT `auction`, `start_date`, `end_date`, `user_id`, `car_id` FROM `history`");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $auction => $content) { 
    echo '<li>' ."Prix Enchere actuelle : " . $content["auction"] .'</li>';
    echo '<li>' ."Date de début de l'enchère : " . $content["start_date"] .'</li>';
    echo "<form method=post>";
    echo "<input type=number name=enchere min='0'/>";
    echo "<button>Enchérir</button>";
    echo '<br>';
    echo "</form>";
};
  