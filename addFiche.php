<?php 
require_once 'header.php'




if (empty($_SESSION(['login']))){
 http_response_code(403);
 die('Access interdit - Au revoir !');
}
?>


<body>
    <h1>Ajout d'une fiche </h1>
    <form method="POST" action=""enctype="multipart/form-data">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre"> <br>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea> <br>
        <label for="tps_realisation">Temps réalisation (min)</label>
        <input type="number" name="tps_realisation" id="tps_realisation"> <br>
        <label for="complexite">Compléxité</label>
        <label for="image">Image</label>
        <input type="file" name="image" id="image"> <br>
        <input type="range" min="0" max="5" name="complexite" id="complexite"><br>
        <input type="submit" value="Ajouter une fiche">
    </form>
</body>


<?php

  if (isset($_POST['titre'])) {

      require_once 'bdd.php';
      var_dump($_FILES)
      if(!empty($_FILES)&& $_FILES('image')['size']>50000){
        echo "Erreur, le fichier est trop lourd"
      }
      else{
        $infofichier = pathinfo($_FILES['image']['name']);
        $extension_upload = pathinfo['extension'];
        $extension
      }

      insertFiche(1, $_POST['titre'], $_POST['description'], $_POST['tps_realisation'], $_POST['complexite']);
      header("Location: index.php");
  }

?>
