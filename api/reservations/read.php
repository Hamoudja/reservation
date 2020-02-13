<?php

// include database et la function salles

include_once '../../config/Database.php';
include_once '../../models/Salles.php';
include_once '../../models/Reservations.php';
include_once '../../models/Personne.php';


$database = new Database();

$bdd = $database->connect();

$salle = new Salles($bdd);

$list = $salle->read();

$reservations = new Reservations($bdd);

$reservation = $reservations->read();

$personnes = new Personne($bdd);

$personne = $personnes->read();



// requette pour recuperer les reservations dans la table reservations 


// je stock le resultat dans une session


// je parcours le resultat de la requette de reservation
?>
<div class="container">
    <div class="row ">
        <div class="table-responsive">

            <table class="table table-bordered table-hover table-sm">
                <thead class="thead bg-primary text-white">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Arriver</th>
                        <th scope="col">Depart</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Place</th>
                        <th scope="col">Annuler</th>
                    </tr>
                </thead>
                <?php
               


                    foreach ($reservation as $etudiant) {
                            foreach ($personne as $user_id) {
                          
                        // je regarde si l'id de l'etudiant dans reservations  et égale a l'id de l'utilisateur
                        if ($etudiant['id_etudiant'] == $user_id['id']) {

                          
                            // je parcours la liste des salles
                            foreach ($list as $salles) {
                                // je regarde si l'id de la salle dans reservations  et égale a l'id d'une salle

                                if ($etudiant['id_salle'] == $salles['id']) {

                                    // je lui dit que si les dates des reservation sont égale au mois actuelle il affiche les reservations dans le tableau
                                    if (strftime('%m') <= date("m", strtotime($etudiant['jours']))) {

                ?> <tbody>
                                            <!--   je fais un echo des champs que je veux afficher  -->
                                            <tr>

                                                <td><?php echo date("d.m.y", strtotime($etudiant['jours'])) ?></td>
                                                <td><?php echo date("H:i", strtotime($etudiant['heure_arriver'])) ?></td>
                                                <td><?php echo  date("H:i", strtotime($etudiant['heure_depart'])) ?> </td>
                                                <td><?php echo $salles['adresse'] ?></td>
                                                <td><?php echo  $etudiant['places'] ?></td>
                                                <td><a data-toggle="modal" data-target="#exampleModal">Annuler</a>
                                                </td>

                                            </tr>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Annuler?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer cette réservation ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                            <a href="../../api/reservations/annuler.php?id=<?php echo $etudiant['id'] ?>" class="btn btn-primary" data-toggle="oui" data-target="#exampleModal">Oui</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tbody>
                <?php
                                    }
                                }
                            }
                        }
                    }
                
                }

                ?>