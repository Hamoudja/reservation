<?php

include_once '../../config/Database.php';
include_once '../../models/Personne.php';


session_start();
$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);

$etudiant = $personne->read_student();



if (!isset($_SESSION['user']['mail']))  {

    header('Location: ../../view/visiteur/page_connexion.php');
}



if (($_SESSION['user']['mail'])) {


?>


<div class="container">
    <div class="row ">
        <div class="table-responsive">

            <table class="table table-striped table-sm">
                <thead class="thead bg-dark text-white">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">E-Mail</th>
                    </tr>
                </thead>

                <?php

                foreach ($etudiant as $_SESSION['etudiant']) {



                    ?>
                    <tbody>

                        <td><?php echo $_SESSION['etudiant']['nom'] ?></td>
                        <td><?php echo $_SESSION['etudiant']['prenom'] ?></td>
                        <td><?php echo $_SESSION['etudiant']['mail'] ?></td>

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