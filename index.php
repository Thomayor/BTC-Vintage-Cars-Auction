<?php
$dbh= new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");

$query= $dbh->prepare("SELECT c.model,c.brand,c.power,c.year,c.description,c.price,c.img,c.date_time, u.lastname ,u.firstname 
FROM `cars` as c 
LEFT JOIN users as u 
ON c.user_id=u.id");
$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);



foreach ($result as $car) {
    echo '<br>';
    echo '<br>';
    echo 'Vintage Car: ' . $car[""];
    echo '<ul>';
    foreach ($car as $key => $value) {
      echo "<li>" . $key . ' : ' . $value . "</li>";
    }
    echo "</ul>";
    echo '<br>';
  }

?>