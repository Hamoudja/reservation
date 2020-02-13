<?php

class Salles
{


    private $conn;
    private $table_name = 'salles';


    public $id;
    public $nom;
    public $adresse;
    public $heure_ouverture;
    public $heure_fermeture;
    public $nombre_de_place;
    public $image ;



    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($nom , $adresse , $heure_ouverture , $heure_fermeture , $nombre_de_place , $image){

        $sql = 'INSERT INTO ' . $this->table_name . ' 
        SET
      nom=:nom , adresse=:adresse , heure_ouverture=:heure_ouverture , heure_fermeture=:heure_fermeture ,nombre_de_place=:nombre_de_place , image=:image; ';

        $stmt = $this->conn->prepare($sql);

        $this->heure_ouverture = htmlentities(strip_tags($this->heure_ouverture));
        $this->heure_fermeture = htmlentities(strip_tags($this->heure_fermeture));
        $this->nombre_de_place = htmlentities(strip_tags($this->nombre_de_place));
        $this->image = htmlentities(strip_tags($this->image));
        $this->nom= htmlentities(strip_tags($this->nom));
        $this->adresse = htmlentities(strip_tags($this->adresse));
        



        $stmt->bindParam(":heure_ouverture", $this->heure_ouverture);
        $stmt->bindParam(":heure_fermeture", $this->heure_fermeture);
        $stmt->bindParam(":nombre_de_place", $this->nombre_de_place);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":adresse", $this->adresse);
       


        if ($stmt->execute(array(
            'heure_ouverture' => $heure_ouverture,
            'heure_fermeture' => $heure_fermeture,
            'nombre_de_place' => $nombre_de_place,
            'image' => $image,
            'nom' => $nom,
            'adresse' => $adresse
           
        ))) {
            return true;
        } else {

            print_r('Erreur:' . $stmt->error . '.\n');
            return false;
        }
    }

    public function delete($id){

        $sql = 'DELETE FROM 
        ' . $this->table_name . '
        WHERE
           id=:id';
    $stmt = $this->conn->prepare($sql);
    
    $this->id = htmlentities(strip_tags($this->id));
    
    $stmt->bindParam(':id', $this->id);
    
    if ($stmt->execute(array(
    
    'id'=>$id    
    ))) {
        return true;
    } else {
    
        print_r('Erreur:' . $stmt->error . '.\n');
        return false;
    }
    
     }

    public function read()
    {
    
        $sql = 'SELECT 
    *
    FROM
        ' . $this->table_name ;
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        $result = array();
        while($data = $stmt->fetch()) {
            $result[] = $data;
        }
        return $result;
    }
    public function place($jours , $id_salle , $arriver){
       
        $sql = 'SELECT SUM(places) AS nbr  FROM reservations  WHERE jours =:jours  AND id_salle =:id_salle  AND heure_arriver =:heure_arriver ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'jours' => $jours,
            'id_salle' => $id_salle,
            'heure_arriver' => $arriver
        ));

        $data = $stmt->fetch();

        return $data['nbr'];
    }
    public function read_one()
    {    $sql = 'SELECT 
       *
       FROM ' . $this->table_name ;

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id= $row['id'];
            $this->nom = $row['nom'];
            $this->adresse = $row['adresse'];
            $this->heure_ouverture = $row['heure_ouverture'];
            $this->heure_fermeture = $row['heure_fermeture'];
            $this->nombre_de_place = $row['nombre_de_place'];

            return true;
        } else {
            return false;
        }
    }


   
}