<?php
session_start();

echo "bonjour " . $_SESSION["email"];
echo "id" .$_SESSION['user_id'];

$dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889", "root", "root");

$query = $dbh->prepare("SELECT c.id,c.model,c.brand,c.power,c.year,c.description,c.price,c.img,c.date_time, u.lastname ,u.firstname 
FROM `cars` as c 
LEFT JOIN users as u 
ON c.user_id=u.id
");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="list">
<?php
 foreach ($result as $car => $value) {
  echo '<br>';
  echo '<br>';
  echo 'Enchère n°'.$value["id"].' : ';

  echo '<ul>';
  echo '<li>' ."Modele : " . $value["model"] .'</li>';
  echo '<li>' ."Marque : " . $value["brand"] .'</li>';
  echo '<li>'."Puissance : "  . $value["power"] .'</li>';
  echo '<li>' ."Années : " . $value["year"] .'</li>';
  echo '<li>'."Description: "  . $value["description"] .'</li>';
  echo '<li>' ."Prix : " . $value["price"] .'</li>';
  echo '<li>' ."Image : " . $value["img"] .'</li>';
  echo '<li>'."Date : "  . $value["date_time"] .'</li>';
  echo '<li>'."Prénom : "  . $value["firstname"] .'</li>';
  echo '<li>'."Nom : "  . $value["lastname"] .'</li>';
  echo "</ul>";
  echo '<br>';
  echo "<form method=post>";
  echo "<input type=number name=enchere />";
  echo "<button>Enchérir</button>";
  echo "</form>";
}


$query = $dbh->prepare("UPDATE `cars` SET `price` = '$_POST[enchere]'");

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
 </div>