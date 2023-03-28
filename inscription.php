

    <body>
        <form method="POST" action="" >
            <label for="login">Login</label>
            <input type="text" required name="login" id="login"><br>
            <label for="mdp">Mot de passe</label>
            <input type="password" required name="mdp" id="mdp"><br>
            <label for="email">E mail</label>
            <input type="email" required name="email" id="email"><br>
            <label for="nom">Nom</label>
            <input type="text" required name="nom" id="nom"><br>
            <label for="prenom">Prénom</label>
            <input type="text"  required name="prenom" id="prenom"><br>
            <input type="submit" value="S'inscrire">
        </form>
    </body>


<?php
    if (isset($_POST['login'])) {
        require_once "bdd.php";
        $mdp = hash("sha256", $_POST['mdp']);
        $err =  addUtilisateur($_POST['login'], $mdp, $_POST['prenom'],$_POST['nom'],$_POST['email']);
        if ($err[0] != "00000") {
            echo "Une erreur s'est produite , nous n'avons pas pu créer votre compte ";
        } else {
            echo "Votre compte a été créé avec succès , vous allez etre redirigé vers la page de connexion";

            header("Refresh:5; url=login.php");
        }
    }

?>
