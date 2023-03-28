<?php
session_start();
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Page ajout fiche</title>
        <style>
        </style>
    </head>
    <body>
   <nav>
    <ul> 
        <li><a href= "index.php">Acceuil</a></li>
        <?php if(empty($_SESSION(['login']))){ ?>
        <li><a href = "addFiche.php">Add Fiche</a></li>
        <li><a href = "login.php">Login</a></li>
        <?php }else{ ?>
        <li><a href = "inscription.php"></a></li>
        <li><a href = "logout.php">Logout</a></li>
        <?php } ?>
        </ul>
        </nav>




        
        </body>


