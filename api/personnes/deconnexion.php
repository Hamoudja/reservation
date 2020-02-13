<?php
     //Deconnexion
       session_start();
       // il detruit la session pour la deconnexion
       session_destroy();
// il redirige vers la page de connexion 
       header('Location:../../view/visiteur/page_connexion.php');
?>