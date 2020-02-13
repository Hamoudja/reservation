<?php

include_once '../../config/Database.php';
include_once '../../models/Personne.php';

$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);

// si la reponse est envoyer il execute se code 
if (isset($_POST['rps'])) {

    $rps = $_POST['rps'];
    $mail = $_GET['mail'];

   $reponse = $personne->Reponse($mail);
// si la reponse est correcte il redirige vers la page pour modifier sont mot de passe 
    if ($reponse == $rps) {

        header("Location: ../../view/visiteur/formulaire_oublier.php?mail=$mail");
    }

// si la reponse n'est pas correcte il affiche un message d'erreur 
        else {
            ?>
            <div class="alert alert-danger col-md-5 px-5 justify-content-center" role="alert">
                <strong cla>Errreur!</strong> La réponse est incorrecte.
            </div>
<?php
        }
    }

    if(!$_GET['mail']){
        header('Location: ../../view/visiteur/page_connexion.php');
    
    }

