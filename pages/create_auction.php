

<?php

$dbh= new PDO("mysql:dbname=CAR;host=127.0.0.1;port=8889","root","root");

$query = $dbh->prepare("INSERT INTO cars (`model`,`brand`,`power`,`year`,`description`,`price`,`img`,`date_time`) VALUES (?,?,?,?,?,?,?,?)");
            
$result = $query->execute([$_POST['model'], $_POST['brand'], $_POST['power'],$_POST['year'],$_POST['description'],$_POST['price'],$_POST['img'],$_POST['date_time']]);

$query->debugDumpParams();
var_dump($params);
?>


<!-- formulaire -->
<h1> Déposer une annonce </h1>

<form action="" method="POST">

    <input type="text" name="brand" placeholder="Marque" value="<?php echo $_POST[`brand`] ?>">
    <input type="text" name="model" placeholder="Modèle de voiture" value="<?php echo $_POST[`model`] ?>">
    <input type="text" name="power" placeholder="Puissance (cv)" value="<?php echo $_POST[`power`] ?>">
    <input type="text" name="year"placeholder="Années" value="<?php echo $_POST[`year`] ?>">
    <textarea name="description" value="<?php echo $_POST[`description`] ?>" placeholder="Commentez votre bolide"></textarea>
    <input type="text" name="price" placeholder="prix de vente" value="<?php echo $_POST[`price`] ?>">
    <input type="file" name="img" value="<?php echo $_POST[`img`] ?>">
    <input type="date" name="date_time" value="<?php echo $_POST[`date_time`] ?>">
    <button type="submit"> Envoyer</button>

</form>