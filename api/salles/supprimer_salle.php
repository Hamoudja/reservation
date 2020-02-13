<?php


include_once '../../config/Database.php';
include_once '../../models/Salles.php';

$database = new Database();

$bdd = $database->connect();

$salle = new Salles($bdd);

session_start();

if (!isset($_SESSION['user']['mail'])) {

    header('Location: ../../view/visiteur/page_connexion.php');
}



if (isset($_SESSION['user']['mail'])) {

if (isset($_GET['id'])){ 

    $id = $_GET['id'];

   $delete = $salle ->delete($id);

    header('Location: ../../view/admin/page_supprimer_salle.php');
}

}