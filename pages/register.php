<!-- <?php
$dbh = new PDO("mysql:dbname=btc-vintage-car-auction;host=127.0.0.1;port=8889", "root", "root");

$query = $dbh->prepare("
INSERT TO CAR (lastname, firstname, email, password, confirm) VALUES ($_POST[lastname], $_POST[firstname], $_POST[email], $_POST[password], $_POST[confirm]
")



?>


<!DOCTYPE html>

<html>

<head>

</head>

<body>
  <section>

    <form action="" method="$_POST">
      <input type="text" name="lastname" placeholder="nom" value=<?php echo $_POST['lastname'] ?> required />
      <input type="text" name="firstname" placeholder="prenom" value=<?php echo $_POST['firstname'] ?> required />
      <input type="email" name="email" placeholder="email" value=<?php echo $_POST['email'] ?> required />
      <input type="password" name="password" placeholder="mot de passe" value=<?php echo $_POST['password'] ?> required />
      <input type="password" name="confirm" placeholder="confirmer votre mot de passe" value=<?php echo $_POST['confirm'] ?> required />
      <button>Valider</button>
    </form>
  </section>




</body>

</html> -->