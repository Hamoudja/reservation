<?php

include_once '../../config/Database.php';
include_once '../../models/Salles.php';


$database = new Database();

$bdd = $database->connect();

$salle = new Salles($bdd);

$list = $salle->read();


if (isset($_POST['arriver']) and isset($_POST['date']) and isset($_POST['place'])) {

        $_SESSION['arriver'] = ($_POST['arriver']);
        $_SESSION['date'] = ($_POST['date']);
        $_SESSION['place'] = ($_POST['place']);
        // il parcours la liste de salles 
        foreach ($list as $salles) {
                // il verifie si l'heure d'arriver envoyer est suppérieure ou égale a l'heure d'ouverture de la salle
                if ($_SESSION['arriver'] >=  date("H:i", strtotime($salles['heure_ouverture']))) {
                        // il  verifie si l'heure d'arriver est inférieure a l'heure de fermeture de la salle  
                        if ($_SESSION['arriver'] < date("H:i", strtotime($salles['heure_fermeture']))) {

                                // il fait le requete pour chercher le nombre de place disponible par salle le jours choisie et a l'heure choisie
                               $place = $salle ->place($_SESSION['date'] , $salles['id'] , $_SESSION['arriver'] );

                                $nbr = $salles['nombre_de_place'] -  $place;

                                // si le nombre de place et supérieure a  0 il execute se code 
                                if ($nbr > 0) {

                                        // si la salle a une image il execute se code il affiche dans une boxe l'image et les informations de la salle adresse ,heure ouverture, heure fermeture ,nombre de place dipsonible 

                                        if ($salles['image'] == true) {
                                                ?>

                                                <div class="col-md-4">
                                                        <div class="card mb-4 shadow-sm">
                                                                <img src="../../img_admin/<?php echo $salles["image"] ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" alt=" image" />
                                                                <div class="card-body  ">

                                                                        <p class="card-text text-left "><?php echo   "<br>" . "<strong>" . "Heure d'ouverture: " . "</strong>"  .  date("H:i", strtotime($salles['heure_ouverture'])) . "<br>" . "<strong>" . "Heure fermeture: " . "</strong>" .  date("H:i", strtotime($salles['heure_fermeture'])) . "<br>" . "<strong>" . "Nombre de place disponible: " . "</strong>" . $nbr . "<br>" . "<strong>" . "Adresse: " . "</strong>" . $salles['adresse'] . "<br>"; ?></p>

                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                                <div class="btn-group">
                                                                                        <a href="../visiteur/page_confirmer.php?id=<?php echo $salles['id'] ?>&amp;adresse=<?php echo $salles['adresse'] ?>" style="color:white" class="btn btn-primary btn-round btn-lg "> Choisir</a>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>

                                        <?php
                                                                                } else {
                                                                                        ?>
                                                <div class="col-md-4">
                                                        <div class="card mb-4 shadow-sm">
                                                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                                                        <rect width="100%" height="100%" fill="#55595c" />
                                                                </svg>
                                                                <div class="card-body  ">

                                                                        <p class="card-text text-left "><?php echo   "<br>" . "<strong>" . "Heure d'ouverture: " . "</strong>"  .  date("H:i", strtotime($salles['heure_ouverture'])) . "<br>" . "<strong>" . "Heure fermeture: " . "</strong>" .  date("H:i", strtotime($salles['heure_fermeture'])) . "<br>" . "<strong>" . "Nombre de place disponible: " . "</strong>" . $nbr . "<strong>" . "<br>" . "Adresse: " . "</strong>" . $salles['adresse'] . "<br>"; ?></p>

                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                                <div class="btn-group">
                                                                                        <a href="../visiteur/page_confirmer.php?id=<?php echo $salles['id'] ?>&amp;adresse=<?php echo $salles['adresse'] ?>" style="color:white" class="btn btn-primary btn-round btn-lg "> Choisir</a>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
<?php

                                        }
                                }
                        }
                }
        }
}

else{
        header('Location: page_de_recherche.php');
}
