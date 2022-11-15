<?php
session_start();

echo "bonjour " . $_SESSION["email"];
echo "id" .$_SESSION['user_id'];

$id=htmlspecialchars($_GET["id"]);

var_dump($id);


$dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889", "root", "root");

$dbh->beginTransaction();

$onecar = $dbh->query("SELECT *
FROM cars 
WHERE id=$id
");

$result = $onecar->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
$dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889", "root", "root");

$query = $dbh->prepare("SELECT u.lastname ,u.firstname,c.id
FROM `cars` as c 
LEFT JOIN users as u 
ON c.user_id=u.id
WHERE c.id=$id");
$query->execute();
$names = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="list">

<?php 


 foreach ($result as $car => $value) {
  echo '<br>';
  echo '<br>';
  echo 'Enchère n°'.$value["id"].' : ';
  $id= $value["id"];

  echo '<ul>';
  echo '<li>' ."Modele : " . $value["model"] .'</li>';
  echo '<li>' ."Marque : " . $value["brand"] .'</li>';
  echo '<li>'."Puissance : "  . $value["power"] .'</li>';
  echo '<li>' ."Années : " . $value["year"] .'</li>';
  echo '<li>'."Description: "  . $value["description"] .'</li>';
  echo '<li>' ."Prix : " . $value["price"] .'</li>';
  echo '<li>' ."Image : " . $value["img"] .'</li>';
  echo '<li>'."Date : "  . $value["date_time"] .'</li>';
 }
  foreach ($names as $name) {
  echo '<li>'."Prénom : "  . $name["firstname"] .'</li>';
  echo '<li>'."Nom : "  . $name["lastname"] .'</li>';
  echo "</ul>";
  echo '<br>';
include_once "./auction.php";
}
 ?>
  </div>



<?php
  $query = $dbh->prepare("UPDATE `history` SET `auction` = '$_POST[enchere]' ");
  
  $query->execute();    
  
  $result = $query->fetchAll(PDO::FETCH_ASSOC);


  ?>