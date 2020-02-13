<?php
class Reservations
{


    private $conn;
    private $table_name = 'reservations';


    public $id;
    public $id_salle;
    public $id_etudiant;
    public $jours;
    public $places;
    public $heure_arriver;
    public $heure_depart;
    public $nombre_de_place;



    public function __construct($db)
    {
        $this->conn = $db;
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
    public function create($heure_arriver, $heure_depart, $jours, $id_salle, $id_etudiant ,$places)
    {

        $sql = 'INSERT INTO ' . $this->table_name . ' 
        SET
     heure_arriver=:heure_arriver , heure_depart=:heure_depart ,jours=:jours , id_salle=:id_salle, id_etudiant=:id_etudiant ,places=:places; ';

        $stmt = $this->conn->prepare($sql);

        $this->heure_arriver = htmlentities(strip_tags($this->heure_arriver));
        $this->heure_depart = htmlentities(strip_tags($this->heure_depart));
        $this->jours = htmlentities(strip_tags($this->jours));
        $this->id_salle = htmlentities(strip_tags($this->id_salle));
        $this->id_etudiant = htmlentities(strip_tags($this->id_etudiant));
        $this->places = htmlentities(strip_tags($this->places));
        



        $stmt->bindParam(":heure_arriver", $this->heure_arriver);
        $stmt->bindParam(":heure_depart", $this->heure_depart);
        $stmt->bindParam(":jours", $this->jours);
        $stmt->bindParam(":id_salle", $this->id_salle);
        $stmt->bindParam(":id_etudiant", $this->id_etudiant);
        $stmt->bindParam(":places", $this->places);
       


        if ($stmt->execute(array(
            'heure_arriver' => $heure_arriver,
            'heure_depart' => $heure_depart,
            'jours' => $jours,
            'id_salle' => $id_salle,
            'id_etudiant' => $id_etudiant,
            'places' => $places
           
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


    public function exist(){

    $sql=   'SELECT *
        FROM reservations
        WHERE EXISTS (
            SELECT * 
            FROM salles
            WHERE id = id_salle
        )';


    }
}