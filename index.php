<?php
session_start();

echo "bonjour " . $_SESSION["email"];
echo "id" .$_SESSION['user_id'];

$dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889", "root", "root");

$query = $dbh->prepare("SELECT c.id,c.model,c.brand,c.price,c.img,c.end_date, u.lastname ,u.firstname 
FROM `cars` as c 
LEFT JOIN users as u 
ON c.user_id=u.id");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>




<!DOCTYPE html>
<html lang="en">

<body>
 <?php require "./components/header.php" ?>
 <section>
    
 <div class="list">
<?php
 foreach ($result as $car => $value) {
    echo '<br>';
    echo '<br>';
    echo '<h1>' .'Enchère n°'.$value["id"].' : '.'</h1>';
   $id= $value["id"];
    echo '<ul>';
    echo '<li>' ."Modele : " . $value["model"] .'</li>';
    echo '<li>' ."Marque : " . $value["brand"] .'</li>';
    echo '<li>'."<img src=" . $value["img"] . " />" .'</li>';
    echo '<li>'."Prénom : "  . $value["firstname"] .'</li>';
    echo '<li>'."Nom : "  . $value["lastname"] .'</li>';
    echo '<li>'."Date de fin de l'enchère : "  . $value["end_date"] .'</li>';
    echo '<br>';
    echo "<button>". "<a href='./pages/car_details.php?id=$id'>" .'Voir détails'."</a>" . "</button>";
    echo "</ul>";
    echo '<br>';
}
?>
 </div>
 </section>
</body>

</html>