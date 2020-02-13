<?php

session_start();
include_once '../../config/Database.php';
include_once '../../models/Personne.php';

$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);

if (isset($_GET['mail']) and isset($_POST['mots_de_passe1']) and isset($_POST['mots_de_passe2'])) {


    if ($_POST['mots_de_passe1'] === $_POST['mots_de_passe2']) {

        $mdp = password_hash($_POST['mots_de_passe1'], PASSWORD_DEFAULT);
        $mail = $_GET['mail'];
    // il fait la requete pour update le mot de passe 
      $update = $personne->Update_Password($mail , $mdp);
        header('Location: ../../view/visiteur/page_connexion.php');
    } else { ?>

        <div class="alert alert-danger" role="alert">
            <strong>Errreur!</strong> Les mots de passe ne sont pas identiques.
        </div>

<?php
    }
}

if (!$_GET['mail']) {
    header('Location: ../../view/visiteur/page_connexion.php');
}
