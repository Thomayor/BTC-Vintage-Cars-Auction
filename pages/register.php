<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dbh = new PDO("mysql:dbname=CAR;host=localhost", "root", "");

  $query = $dbh->prepare(
    "INSERT INTO users (`lastname`,`firstname`,`email`,`password`) 
    VALUES (?, ?, ?, ?)"
  );

  $result = $query->execute([$_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['password']]);

  $query->debugDumpParams();
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