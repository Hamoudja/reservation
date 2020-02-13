<?php


include_once '../../config/Database.php';
include_once '../../models/Personne.php';

$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);


// si la personne n'est pas connecter sa le redirige vers la page de connexion il ne peut pas acceder a cette page 

if (!isset($_SESSION['user']['mail'])) {

       header('Location: ../view/page_connexion.php');
}

// je fait toutes les conditions possible pour l'heure de depart 

switch ($_SESSION['arriver']) {
       case '08:00':
              $_SESSION['depart'] = date("H:i", strtotime('10:00'));
              break;

       case '10:00':
              $_SESSION['depart'] = date("H:i", strtotime('12:00'));
              break;
       case '12:00':
              $_SESSION['depart'] = date("H:i", strtotime('14:00'));
              break;

       case '14:00':
              $_SESSION['depart'] = date("H:i", strtotime('16:00'));
              break;


       case '16:00':
              $_SESSION['depart'] = date("H:i", strtotime('18:00'));
              break;



       case '18:00':
              $_SESSION['depart'] = date("H:i", strtotime('20:00'));
              break;


       case '20:00':
              $_SESSION['depart'] = date("H:i", strtotime('22:00'));
              break;


       case '22:00':
              $_SESSION['depart'] = date("H:i", strtotime('00:00'));
              break;

       default:
       $_SESSION['depart'] = null ;
              break;
}

// si la personne est connecter sa excute se code 

if (isset($_SESSION['user']['mail'])) {
       if($_SESSION['user']['grade'] == 3){
       if (isset($_GET['id'])) {
              $nom = $personne->GetName($_SESSION['user']['mail']);
              $prenom = $personne->GetFirstName($_SESSION['user']['mail']);
             

              // j'affiche les données nécessaire pour la confirmaton de réservation 
              ?>

                     <h3 class="text-center "> <?php echo "<Br> " . " " . $nom  . " " . $prenom . " <br />"; ?></h3>
                     <p class="card-text text-left m-4"> <?php echo "<br>" . "<strong>" . "Réservation pour le : " . "</strong>" . date("d.m.y", strtotime($_SESSION['date'])) . "<br>" . "<strong>" . "Lieux : " . "</strong>" . $_GET['adresse'] . "<br>" . "<strong>" . "Heure d'arriver: " . "</strong>" . $_SESSION['arriver'] . "<br>" . "<strong>" . "Heure depart: " . "</strong>" . $_SESSION['depart'] . "<br>" . "<strong>" . "Nombre de place réservée(s): " . "</strong>" . $_SESSION['place'] . "<br>"; ?></p>
                     <a href="../../api/reservations/confirmer.php?id=<?php echo $_GET['id'] ?>&amp;adresse=<?php echo $_GET['adresse'] ?>" class="btn btn-primary btn-round btn-lg ">Reserver</a>
                     <a href="../visiteur/page_de_recherche.php" class="btn btn-primary btn-round btn-lg ">Annuler</a>




       <?php

              }
       }
} 