<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page login</title>
        <style>
        </style>
    </head>
    <body>
    <form method="POST" action="">
        <label for="login">login</label>
        <input type="text" name="login" required id="login"><br>
        <label for="mdp">mdp</label>
        <input type="password" name="mdp" required id="mdp">
        <input type="submit">
    </form>
    </body>
</html>

<?php
    if (!empty($_POST['login']) && empty($_POST['mdp']) == false) {
        $mdp = hash("sha256", $_POST['mdp']);
        require_once "bdd.php";
        $user = getConnexion($_POST['login'], $mdp);

        if (isset($user['login'])) {
            echo "Vous êtes connecté";
            $_SESSION['login'] = $user['login'];
        } else {
            echo "Erreur, le login et mot de passe ne correspondent pas";
        }
    }
?>
