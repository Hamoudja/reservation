<?php
     
       session_start();
       include_once '../../config/Database.php';
       include_once '../../models/Personne.php';
       
       $database = new Database();
       
       $bdd = $database->connect();
       
       $personne = new Personne($bdd);
       // si la personne n'est pas connecter il le redirige automatiquement vers la page de connexion 
       
       if(!isset($_SESSION['user']['mail'])){

        header('Location: page_connexion.php');
       }
      
       
       if(isset($_SESSION['user']['mail']) ){
       
            if($_SESSION['user']['grade'] == 3){

            $nom = $personne->GetName($_SESSION['user']['mail']);
            $prenom = $personne->GetFirstName($_SESSION['user']['mail']);
            $getId = $personne->getId($_SESSION['user']['mail']);
      echo "<Br> "." ".$nom ." ".$prenom ."".$getId." <br />";
       
 
              
            }

            else{
                  header('Location: page_connexion.php');

            }
           
      }