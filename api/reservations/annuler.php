<?php


include_once '../../config/Database.php';
include_once '../../models/Reservations.php';

$database = new Database();

$bdd = $database->connect();

$reservation = new Reservations($bdd);

// si l'id de la réservation a étaient envoyer il execute se code 

if (isset($_GET['id'])){ 

    $id = $_GET['id'];
// il fait la requete pour supprimer la réservation quand l'id est égale a l'id réçu
   $delete = $reservation->delete($id);
    
}
// il redirige vers la page de profil 
header('Location: ../../view/visiteur/page_profil.php');
