<?php


include_once '../../config/Database.php';
include_once '../../models/Personne.php';

$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);
session_start();


if (isset($_POST['oublier'])) {

    $mail = $_POST['oublier'];
    

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

       $mailexist = $personne->Mailexist($mail);

 // si le mail est correcte il redirige vers la page de la question sercrete ou il devras saisir la réponse 
        if ($mailexist) {
         $question = $personne->Question($mail);

            header("Location: ../../view/visiteur/question.php?mail=$mail &question=$question");
          
        } else {
            ?>
            <div class="alert alert-danger col-md-5 px-5 justify-content-center" role="alert">
                <strong cla>Errreur!</strong> Cette adresse e-mail est incorrecte.
            </div>
<?php
        }
    }
}



