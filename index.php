<?php
session_start();

echo "bonjour " . $_SESSION["email"];
echo "id" .$_SESSION['user_id'];

$dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889", "root", "root");

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
 foreach ($result as $car => $value) {
    echo '<br>';
    echo '<br>';
    echo 'Enchère n°'.$value["id"].' : ';
   $id= $value["id"];
    echo '<ul>';
    echo '<li>' ."Modele : " . $value["model"] .'</li>';
    echo '<li>' ."Marque : " . $value["brand"] .'</li>';
    echo '<li>'."Date : "  . $value["date_time"] .'</li>';
    echo '<li>'."Prénom : "  . $value["firstname"] .'</li>';
    echo '<li>'."Nom : "  . $value["lastname"] .'</li>';
    echo '<br>';
    echo "<button>". "<a href='./pages/car_details.php?id=$id'>" .'Voir détails'."</a>" . "</button>";
    echo "</ul>";
    echo '<br>';
}
?>
 </a>
 </div>
</body>

</html>