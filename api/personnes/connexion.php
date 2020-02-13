<?php

// Connexion

session_start();
include_once '../../config/Database.php';
include_once '../../models/Personne.php';

$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);


// si le champs mail et mot de passe on étaient envoyer
if (isset($_POST['mail']) and isset($_POST['mots_de_passe'])) {

  $mail = $_POST['mail'];
  $mailExist = $personne->Mailexist($mail);
  $id_grade = $personne->Grade($mail);

  if ($mailExist) {

    $isPasswordCorrect1 = password_verify($_POST['mots_de_passe'], $personne->Password($mail));

    if ($isPasswordCorrect1) {
      $_SESSION['user']['mail'] = $mail;

      switch ($id_grade) {
        case 1:
          $_SESSION['user']['grade'] = 1;
          header('Location: ../admin/page_administrateur.php');
          break;

        case 2:
          $_SESSION['user']['grade'] = 2;
          header('Location: ../gestionnaire/page_salles.php');
          break;

        case 3:
          $_SESSION['user']['grade'] = 3;
          header('Location: ../visiteur/page_profil.php');
          break;
      }
    } else { ?>

        <div class="alert alert-danger" role="alert">
          <strong>Errreur!</strong> Mauvais identifiant ou mot de passe !
        </div>
      <?php
          }
        } else {
          ?>

      <div class="alert alert-danger" role="alert">
        <strong>Errreur!</strong> Le compte n'existe pas !
      </div>

  <?php
    }
  }
