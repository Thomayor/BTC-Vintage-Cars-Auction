

<?php

$dbh= new PDO("mysql:dbname=btc-vintage-car-auction;host=127.0.0.1;port=8889","root","root");

$query= $dbh->prepare("
INSERT INTO cars (model,brand,power,year,description,price,img)
VALUES ($_POST[model],$_POST[brand],$_POST[power],$_POST[year],$_POST[description],$_POST[price],$_POST[img])
")

?>


<!-- formulaire -->
<h1> Déposer une annonce </h1>

<form action="" method="$_POST">

    <input type="text" name="brand"placeholder="Marque" value="<?php echo $_POST["brand"] ?>">
    <input type="text" name="model" placeholder="Modèle de voiture" value="<?php echo $_POST["model"] ?>">
    <input type="text" name="power" placeholder="Puissance (cv)" value="<?php echo $_POST["power"] ?>">
    <input type="text" name="year"placeholder="Années" value="<?php echo $_POST["year"] ?>">
    <textarea name="description" value="<?php echo $_POST["description"] ?>"> Commentez les informations de votre annonce</textarea>
    <input type="text" name="price" placeholder="prix de vente" value="<?php echo $_POST["price"] ?>">
    <input type="file" name="img" value="<?php echo $_POST["img"] ?>">
    <button type="submit"> Envoyer</button>

</form>