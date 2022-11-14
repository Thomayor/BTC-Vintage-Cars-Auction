<?php
session_start();

echo "bonjour " . $_SESSION["email"];
// echo "id" . $_SESSION['user_id'];

$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT c.id,c.model,c.brand,c.price,c.img,c.date_time, u.lastname ,u.firstname 
FROM `cars` as c 
LEFT JOIN users as u 
ON c.user_id=u.id");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="index.css" rel="stylesheet" />
</head>

<body>
  <header>

    <div class="background">
      <nav class="navbar">
        <img class="navbar-logo" src="./images/cars-auction-logo.png" />
        <nav class="menu">
          <a href="#" style="
    padding-right: 15px">Home</a>
          <a href="#" style="
    padding-right: 15px">New Auction</a>
          <a href="#" style="
    padding-right: 15px">Connexion</a>
          <a href="#" style="
    padding-right: 15px">Inscription</a>
        </nav>
        <input type="text" placeholder="Search" class="navbar-search" />
      </nav>
    </div>
  </header>


 <div class="list">
<?php
 foreach ($result as $car) {
  echo '<br>';
  echo '<br>';
  echo 'Vintage Car: ';
  echo '<ul>';
  foreach ($car as $key => $value) {
    echo "<li>" . $key . ' : ' . $value . "</li>";
  }
  echo "</ul>";
  echo '<br>';
}
?>
 </div>
</body>

</html>