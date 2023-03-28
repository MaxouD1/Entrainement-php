<?php
function connectBdd() {
    $dsn = 'mysql:slam2023 tp robot;host=127.0.0.1';
    $user = 'max';
    $password = '1234';

    $dbh = new PDO($dsn, $user, $password);
    return $dbh;
}

function insertFiche($createur, $titre, $description, $tps, $complexite) {
    $bdd = connectBdd();
    $req = $bdd->prepare("INSERT INTO fiche ( createur, titre, description,tps_realisation, complexite) 
                        VALUES ( :createur , :titre, :desc, :tps, :complexite ) ");
    $req->execute(array( ":createur" => $createur , ":titre" => $titre , ":desc" => $description, ":tps" => $tps, ":complexite" => $complexite ) );
}

function addUtilisateur($login, $mdp, $prenom,$nom,$email)
{
    $bdd = connectBdd();
    $req = $bdd->prepare("INSERT INTO utilisateur ( login, mdp, nom,prenom, email) 
                        VALUES ( :login , :mdp, :nom, :prenom, :email ) ");
    $req->execute(array( ":login" => $login , ":mdp" => $mdp , ":nom" => $nom, ":prenom" => $prenom, ":email" => $email ) );
    return $req->errorInfo();
}


function getAllFiches() {
    $bdd = connectBdd();
    $req = $bdd->query("SELECT *  FROM fiche");
    return $req->fetchAll();
}
function getConnexion($login, $mdp) {
    $bdd = connectBdd();
    $req = $bdd->prepare("SELECT *  FROM utilisateur where login = :login and mdp = :mdp");
    $req->execute(array(  ":login" => $login, ":mdp" => $mdp  ));
    return $req->fetch();
}

function getFicheByTitre($titre) {
    $bdd = connectBdd();
    $req = $bdd->prepare("SELECT * FROM fiche WHERE titre LIKE :titre");
    $req->execute(array(  ":titre" => '%'.$titre.'%'  ));
    return $req->fetchAll();
}
