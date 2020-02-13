<?php
  //Inscription
  include_once '../../config/Database.php';
  include_once '../../models/Personne.php';

  $database = new Database();

  $bdd = $database->connect();

$personne = new Personne($bdd);


  if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['mots_de_passe'])) {

    $_SESSION['nom'] = ($_POST['nom']);
    $_SESSION['prenom'] = ($_POST['prenom']);
    $_SESSION['mail'] = ($_POST['mail']);



    if ($_POST['mots_de_passe'] === $_POST['mots_de_passe2']) {

      $mail = $_POST['mail'];   
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
     


      if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

       $mailexist = $personne->Mailexist($mail);

        if (!$mailexist) {
          $pwd =  password_hash($_POST['mots_de_passe'], PASSWORD_DEFAULT);

          $create = $personne->create($nom ,$prenom ,$mail,$_POST['mots_de_passe'],null ,null ,2)

          ?>

          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bravo!</h4>
            Inscription validé.
          </div>

        <?php
              } else {
                ?>
          <div class="alert alert-danger" role="alert">
            <strong>Errreur!</strong> Cette adresse e-mail est déjà utilisée.
          </div>
      <?php
            }
          }
        } else { ?>

      <div class="alert alert-danger" role="alert">
        <strong>Errreur!</strong> Les mots de passe ne sont pas identiques.
      </div>

  <?php
    }
  }
