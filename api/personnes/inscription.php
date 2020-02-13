  <?php
  //Inscription

  include_once '../../config/Database.php';
  include_once '../../models/Personne.php';

  $database = new Database();

  $bdd = $database->connect();

  $personne = new Personne($bdd);

  // il verifie si tous les champs ont étaient envoyer 

  if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['mots_de_passe']) and isset($_POST['question']) and isset($_POST['reponse'])) {


    // si le mot de passe et égale au mot de passe de confirmation 
    if ($_POST['mots_de_passe'] === $_POST['mots_de_passe2']) {

      $mail = $_POST['mail'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $question = $_POST['question'];
      $reponse = $_POST['reponse'];

      // il vérifie que l'adresse mail saisie à bien le format d'une adresse mail
      if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        // il fait la requete pour chercher si l'adresse mail saisie existe deja
        $mailexist = $personne->Mailexist($mail);
        // si l'adresse mail n'existe pas il excecute se code 
        if (!$mailexist) {
          // il hash le mot de passe saisie
          $pwd =  password_hash($_POST['mots_de_passe'], PASSWORD_DEFAULT);
          // il fait la requete pour inserer en base de données l'inscription effectuer 

          $inscription = $personne->create($nom, $prenom, $mail, $pwd, $reponse, $question, 3);
          // il affiche un message de felicitation
  ?>
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bravo!</h4>
            Vous etes inscrit vous pouvez des à présent accéder à votre compte.
          </div>
        <?php

        } else {
          // il affiche un message si l'adresse mail existe 
        ?>
          <div class="alert alert-danger" role="alert">
            <strong>Erreur!</strong> Cette adresse e-mail est déjà utilisée.
          </div>
      <?php
        }
      }
    }
    // il affiche un message si les mot de passe ne sont pas identique 
    else { ?>

      <div class="alert alert-danger" role="alert">
        <strong>Errreur!</strong> Les mots de passe ne sont pas identiques.
      </div>

  <?php
    }
  }
