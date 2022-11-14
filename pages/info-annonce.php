<?php
session_start();

$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");


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
</body>

</html>