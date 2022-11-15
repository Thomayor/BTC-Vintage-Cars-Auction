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
          <a href="http://localhost/btc-vintage-cars-auction/" style="
    padding-right: 15px">Home</a>
          <a href="http://localhost/btc-vintage-cars-auction/pages/create_auction.php" style="
    padding-right: 15px">New Auction</a>
          <a href="http://localhost/btc-vintage-cars-auction/pages/login.php" style="
    padding-right: 15px">Connexion</a>
          <a href="http://localhost/btc-vintage-cars-auction/pages/register.php" style="
    padding-right: 15px">Inscription</a>
        </nav>
        <input type="text" placeholder="Search" class="navbar-search" />
      </nav>
    </div>
  </header>


  <label id="Compte"></label>
  <div class="list">
    <?php
    foreach ($result as $car => $value) {
      echo '<br>';
      echo '<br>';
      echo 'Enchère n°' . $value["id"] . ' : ';
      $id = $value["id"];
      echo '<ul>';
      echo '<li>' . "Modele : " . $value["model"] . '</li>';
      echo '<li>' . "Marque : " . $value["brand"] . '</li>';
      echo '<li>' . "Date : "  . $value["date_time"] . '</li>';
      echo '<li>' . "Prénom : "  . $value["firstname"] . '</li>';
      echo '<li>' . "Nom : "  . $value["lastname"] . '</li>';
      // echo '<li>' . "Date de fin de l'enchère : "  . $value["end_date"] . '</li>';
      echo '<br>';
      echo "<button>" . "<a href='./pages/car_details.php?id=$id'>" . 'Voir détails' . "</a>" . "</button>";
      echo "</ul>";
      echo '<br>';
    }
    ?>

    <!-- <script type="text/javascript">
      var Affiche = document.getElementById("Compte");

      function Rebour() {
        var date1 = new Date();
        var date2 = new Date("Nov 16, 2022 00:00:00");
        var sec = (date2 - date1) / 1000;
        var n = 24 * 3600;
        if (sec > 0) {
          j = Math.floor(sec / n);
          h = Math.floor((sec - (j * n)) / 3600);
          mn = Math.floor((sec - ((j * n + h * 3600))) / 60);
          sec = Math.floor(sec - ((j * n + h * 3600 + mn * 60)));
          Affiche.innerHTML = " Il reste " + j + " j " + h + " h " + mn + " min " + sec + " s" + " " + "pour enchérir";
          window.status = "Temps restant : " + j + " j " + h + " h " + mn + " min " + sec + " s ";
        }
        tRebour = setTimeout("Rebour();", 1000);
      }
      Rebour();
    </script>
  </div> -->


</body>

</html>