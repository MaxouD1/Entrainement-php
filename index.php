<?php
session_start();
require_once 'header.php';
require_once 'bdd.php';

if (isset($_GET['recherche']))
{
    $fiches = getFicheByTitre($_GET['recherche']);
} else {

    $fiches = getAllFiches();
}
?>
    <body>
    <form method="GET" action="">
        <label for="recherche">Rechercher par titre</label>
        <input type="text" name="recherche" id="recherche">
    </form>
    <br>
    <h1>Voici toute les fiches disponibles</h1>
    <ul>
    <?php

        foreach ($fiches as $fiche) {

           echo "<li>".$fiche['titre']." - Compléxité : ".$fiche['complexite']."/5 </li>";
        }

    ?>
    </ul>
    </body>
</html>
<?php

var_dump($_SESSION);
?>
