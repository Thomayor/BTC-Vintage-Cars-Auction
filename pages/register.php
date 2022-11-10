<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dbh = new PDO("mysql:dbname=BTC;host=127.0.0.1;port=8889","root","root");

  $query = $dbh->prepare(
    "INSERT INTO users (`lastname`,`firstname`,`email`,`password`) 
    VALUES (?, ?, ?, ?)"
  );

  $query->execute([$_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['password']]);

  if (!empty($query)){
    header("Location: http://localhost:8888/BTC/pages/login.php");
    var_dump($query);
}
else{
echo '<p> Veuillez vous connecter</p>';
}
}
?>





<head>

</head>

<body>
  <section>

    <form action="" method="POST">
      <input type="text" name="lastname" placeholder="nom" value="<?php echo $_POST['lastname'] ?? "" ?>" required />
      <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_POST['firstname'] ?? "" ?>" required />
      <input type="email" name="email" placeholder="email" value="<?php echo $_POST['email'] ?? "" ?>" required />
      <input type="password" name="password" placeholder="mot de passe" value="<?php echo $_POST['password'] ?? "" ?>" required />
      <button type="submit">Valider</button>
    </form>
  </section>




</body>