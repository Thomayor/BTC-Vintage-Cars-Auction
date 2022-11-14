<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");

  $query = $dbh->prepare(
    "INSERT INTO users (`lastname`,`firstname`,`email`,`password`) 
    VALUES (?, ?, ?, ?)"
  );

  $query->execute([$_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['password']]);

  if (!empty($query)) {
    header("Location: http://localhost/cars/pages/login.php");
    // var_dump($query);
  } else {
    echo '<p> Veuillez vous connecter</p>';
  }
}
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
  <div class="background">
    <nav class="navbar">
      <img class="navbar-logo" src="" />
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

  <form action="" method="POST">
    <input type="text" name="lastname" placeholder="nom" value="<?php echo $_POST['lastname'] ?? "" ?>" required />
    <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_POST['firstname'] ?? "" ?>" required />
    <input type="email" name="email" placeholder="email" value="<?php echo $_POST['email'] ?? "" ?>" required />
    <input type="password" name="password" placeholder="mot de passe" value="<?php echo $_POST['password'] ?? "" ?>" required />
    <button type="submit">Valider</button>
  </form>
</body>

</html>