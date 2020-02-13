<?php
include_once '../../config/Database.php';
include_once '../../models/Personne.php';

session_start();
$database = new Database();

$bdd = $database->connect();

$personne = new Personne($bdd);

if (!isset($_SESSION['user']['mail'])) {

    header('Location: ../admin/page_de_connexion.php');
}



if (isset($_SESSION['user']['mail'])) {


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
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>

                <?php
                $gestionnaire = $personne->read_gestionnaire();
                foreach ($gestionnaire as $_SESSION['gestionnaire']) {



                    ?>
                    <tbody>

                        <td><?php echo $_SESSION['gestionnaire']['nom'] ?></td>
                        <td><?php echo $_SESSION['gestionnaire']['prenom'] ?></td>
                        <td><?php echo $_SESSION['gestionnaire']['mail'] ?></td>
                        <td><a href="">Supprimer</a></td>

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