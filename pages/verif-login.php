<?php

session_start();  
if(isset($_SESSION["email"]))  
{  
     echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';  
     echo '<br /><br /><a href="logout.php">Logout</a>';  
}  
else  
{  
     header("location:login.php");  
}


?>
