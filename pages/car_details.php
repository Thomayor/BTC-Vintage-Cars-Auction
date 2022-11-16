<?php
session_start();

// echo "bonjour " . $_SESSION["email"];

$id = htmlspecialchars($_GET["id"]);

var_dump($id);


$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

$dbh->beginTransaction();

$onecar = $dbh->query("SELECT *
FROM cars 
WHERE id=$id
");

$result = $onecar->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT u.lastname ,u.firstname,c.id
FROM `cars` as c 
LEFT JOIN users as u 
ON c.user_id=u.id
WHERE c.id=$id");
$query->execute();
$names = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<body>
 

    <?php include $_SERVER['DOCUMENT_ROOT'] ."/BTC/components/header.php" ?>

  
<section id="listresult">
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
  echo '<li>'."<img src=" . $value["img"] . " />" .'</li>';
  echo '<li>'."Date de début d'enchère: "  . $value["start_date"] .'</li>';
  echo '<li>'."Date de fin d'enchère : "  . $value["end_date"] .'</li>';
  echo '<br>';
 }
  foreach ($names as $name) {
  echo '<li>'."Propriétaire : " .$name["firstname"] . PHP_EOL . $name["lastname"].'</li>';
  include_once "./auction.php";
  echo "</ul>";
}
 ?>
  </div>
  </body>
</html>


