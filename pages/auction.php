<head>

<script type="text/javascript">
function horloge(){
 let div = document.getElementById("horloge");
 let heure = new Date();
 div.firstChild.nodeValue = heure.getHours()+":"+heure.getMinutes()+":"+heure.getSeconds();
 window.setTimeout("horloge()",1000);
}

</script>
</head>

<div id="horloge"> 
    
    <script type="text/javascript">
        horloge();
    </script>
        </div>
<?php


$dbh = new PDO("mysql:dbname=cars;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT h.*, u.lastname ,u.firstname FROM `history` as h 
LEFT JOIN users as u 
ON h.user_id=u.id");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $auction => $content) { 
    
    echo '<li>' ."Prix Enchere actuelle : " . $content["auction"] ."($content[firstname] $content[lastname])".'</li>';
    echo '<li>' ."Compte à rebours : " . $content["created_date"] .'</li>';
    echo "<form method=post>";
    if ($content['auction'] < $value['price']){
       $newprice=$value['price']+1;
        echo "<input type=number name=enchere min='$newprice'/>";
        echo "<button>Enchérir</button>";
    }
    else {
        $newprice=$content['auction']+1;
        echo "<input type=number name=enchere min='$newprice'/>";
    echo "<button>Enchérir</button>";


    }
    echo "</ul>";
    echo '<br>';
    echo "</form>";
}
  ?>

<div class="result">

    <?php 
$date = date(DATE_W3C);
var_dump($date,"date actuelle");
var_dump($value["end_date"],"date de fin");

if ($date > $value["end_date"]){
    echo "L'enchère est terminée";
    echo '<p>'."Le vainqueur est : "."$content[firstname] $content[lastname]".'</p>';
}
else{
    echo '<h1>'."L'enchère continue".'</h1>';
    echo '<p>'."$content[firstname] $content[lastname]"." est proche de remporté l'enchère ".'</p>';
}
?>
</div>
</section>
<?php

  $query = $dbh->prepare("UPDATE `history` SET `auction` = '$_POST[enchere]' , `user_id`='$_SESSION[user_id]' ");
  
  $query->execute();    
  
  $result = $query->fetchAll(PDO::FETCH_ASSOC);

  ?>
  
