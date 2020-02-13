<?php
//Inscription

include_once '../../config/Database.php';
include_once '../../models/Salles.php';

$database = new Database();

$bdd = $database->connect();

$salles = new Salles($bdd) ;


// si tous les champs sont envoyer il execute se code  

if (isset($_POST['nom']) and isset($_POST['adresse']) and isset($_POST['ouverture']) and isset($_POST['fermeture'])   and isset($_POST['places'])) {

// je stocke les données envoyer dans des variable 

  $adresse = $_POST['adresse'];
  $nom = $_POST['nom'];
  $ouverture = $_POST['ouverture'];
  $fermeture = $_POST['fermeture'];
  $places = $_POST['places'];
  $image = $_FILES['image'];
  $ext = strtolower(substr($image['name'], -3));
  $allow_ext =  array('png', 'gif', 'jpg', 'jpeg');

  // je vérifie si l'image a le format qui est dans le tableau si il a le format il execute se code 
  if (in_array($ext, $allow_ext)) {
    move_uploaded_file($image['tmp_name'], "../../img_admin/".$image['name']);


    $ouverture =   date("H:i:s", strtotime($ouverture));
    $fermeture =   date("H:i:s", strtotime($fermeture));

    // je fais la requete pour inserer la salle dans la base de données
    $salle = $salles->create($nom ,$adresse,$ouverture,$fermeture,$places,$image['name']);

    ?>

    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Bravo!</h4>
      Salle ajouter .
    </div>

  <?php
    } else {

      ?>
    <div class="alert alert-danger" role="alert">
      <strong>Errreur!</strong> Vous devez uploader un fichier de type png, gif, jpg ou jpeg... !
    </div>
<?php
  }
}
              