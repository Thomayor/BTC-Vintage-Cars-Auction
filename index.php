<?php
$dbh= new PDO("mysql:dbname=CAR;host=127.0.0.1;port=8889","root","root");

$query= $dbh->prepare("SELECT model,brand,power,year,description,price,img from cars");
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