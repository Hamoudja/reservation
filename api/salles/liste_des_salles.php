<?php

include_once '../../config/Database.php';
include_once '../../models/Salles.php';

$database = new Database();

$bdd = $database->connect();

$salle = new Salles($bdd);

$list = $salle->read();




if (!isset($_SESSION['user']['mail'])) {

    header('Location: ../../view/visiteur/page_de_connexion.php');
}



if (isset( $_SESSION['user']['mail'])) {


    ?>


    <div class="container">
        <div class="row ">
            <div class="table-responsive">


                <table class="table table-striped table-sm">
                    <thead class="thead bg-dark text-white">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Heure ouverture</th>
                            <th scope="col">Heure fermeture</th>
                            <th scope="col"> Réservations</th>

                        </tr>
                    </thead>

                    <?php
                        foreach ($list as $salles) {



                            ?>
                        <tbody>

                            <td><?php echo $salles['nom'] ?></td>
                            <td><?php echo $salles['adresse'] ?></td>
                            <td><?php echo  date("H:i", strtotime($salles['heure_ouverture'])) ?> </td>
                            <td><?php echo  date("H:i", strtotime($salles['heure_fermeture'])) ?> </td>
                            <td><a href="../../view/admin/page_reservation.php?id=<?php echo $salles['id'] ?>" data-toggle="snackbar" data-style="toast" data-content="Fried chicken out of stock.">Afficher</a></td>
                        <?php
                            }







                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
}
