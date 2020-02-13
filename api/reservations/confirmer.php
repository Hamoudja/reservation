<?php 


session_start();


include_once '../../config/Database.php';
include_once '../../models/Reservations.php';
include_once '../../models/Personne.php';

$database = new Database();

$bdd = $database->connect();

$reservations = new Reservations($bdd);

$personne = new Personne($bdd);

// si l'id de la salle est envoyer il execute se code 

if (isset($_GET['id'])) {
    $getId = $personne->getId($_SESSION['user']['mail']);
// il fait la requete pour inserer en base de données la réservation effectuer 

$reservation = $reservations->create($_SESSION['arriver'],$_SESSION['depart'] ,date("y.m.d", strtotime($_SESSION['date'])),$_GET['id'],$getId,$_SESSION['place']);
}
else{

    echo 'Erreur veuillez faire une autre réservations';
}

// il redirige vers la page de profil 

header('Location: ../../view/visiteur/page_profil.php');