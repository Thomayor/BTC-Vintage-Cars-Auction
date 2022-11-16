<?php

session_start();

echo "Bonjour " . $_SESSION["email"] ;

$dbh= new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");

$query = $dbh->prepare("INSERT INTO cars (`model`,`brand`,`power`,`year`,`description`,`price`,`img`,`start_date`,`end_date`,`user_id`) VALUES (?,?,?,?,?,?,?,?,?,?)");
            
$query->execute([$_POST['model'],$_POST['brand'], $_POST['power'],$_POST['year'],$_POST['description'],$_POST['price'],$_POST['img'],$_POST['start_date'],$_POST['end_date'],$_SESSION['user_id']]);

?>

<?php

$dbh= new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");

$query = $dbh->prepare("INSERT INTO cars (`model`,`brand`,`power`,`year`,`description`,`price`,`img`,`start_date`,`end_date`,`user_id`) VALUES (?,?,?,?,?,?,?,?,?,?)");
            
$query->execute([$_POST['model'],$_POST['brand'], $_POST['power'],$_POST['year'],$_POST['description'],$_POST['price'],$_POST['img'],$_POST['start_date'],$_POST['end_date'],$_SESSION['user_id']]);

?>
   <?php include $_SERVER['DOCUMENT_ROOT'] ."/BTC/components/header.php" ?>
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
</br>
    <label for="start_date"> Date de début de votre enchère</label>
    <input type="datetime-local" name="start_date" value="<?php echo $_POST[`start_date`] ?>">
    <label for="end_date"> Date de fin de votre enchère</label>
    <input type="datetime-local" name="end_date" value="<?php echo $_POST[`end_date`] ?>">
    <button type="submit"> Envoyer</button>

</form>