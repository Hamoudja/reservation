<?php

include_once '../../config/Database.php';
include_once '../../models/Salles.php';
include_once '../../models/Reservations.php';
include_once '../../models/Personne.php';
$database = new Database();

$bdd = $database->connect();

$salle = new Salles($bdd);

$list = $salle->read();

$personne = new Personne($bdd);

$reservations = new Reservations($bdd);


// je fais une requete pour selectionner toutes les réservation
$reservation = $reservations->read();


// je fais une requete pour selectionner tous les etudiants
$etudiants = $personne->read_student();




?>

<!--  Je fais un tableau pour afficher les réservations   -->
<div class="container">
    <div class="row ">
        <div class="table-responsive">

            <h3 class="text-center m-5 text-dark"><?php echo  strftime('%d/%m/%y') ?></h3>
            <table class="table table-striped table-sm">
                <thead class="thead bg-dark text-white">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Heure arrivée</th>
                        <th scope="col">Heure depart</th>
                        <th scope="col"> Places</th>

                    </tr>
                </thead>

                <?php
                // je parcours la liste des etudiants             
                foreach ($etudiants as $etudiant) {

                    // je parcours la liste des réserrvations     

                    foreach ($reservation as $res_list) {

                        // si l'id de salle dans reservations est égale a l'id de la salle reçus il execute se code

                        if ($_GET['id'] == $res_list['id_salle']) {


                            if (strftime('%d/%m') == date("d/m", strtotime($res_list['jours']))) {


                                if ($etudiant['id'] == $res_list['id_etudiant']) {


                ?>
                                    <tbody>

                                        <td><?php echo $etudiant['nom'] ?></td>
                                        <td><?php echo $etudiant['prenom'] ?></td>
                                        <td><?php echo  date("H:i", strtotime($res_list['heure_arriver'])) ?> </td>
                                        <td><?php echo  date("H:i", strtotime($res_list['heure_depart'])) ?> </td>
                                        <td><?php echo  $res_list['places'] ?></td>

                    <?php
                                }
                            }
                        }
                    }
                }


                    ?>
                                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php
