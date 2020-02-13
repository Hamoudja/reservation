<?php

class Personne
{

    private $conn;
    private $table_name = 'personne';

    public $id;
    public $id_grade;
    public $nom;
    public $prenom;
    public $mail;
    public $mots_de_passe;
    public $question;
    public $reponse;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {

        $sql = 'SELECT 
    *
    FROM
        ' . $this->table_name;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = array();
        while ($data = $stmt->fetch()) {
            $result[] = $data;
        }
        return $result;
    }
    public function read_once($mail)
    {

        $sql = 'SELECT id , nom ,prenom , mail , question , reponse ,id_grade FROM personne WHERE mail =:mail ';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));

        $result = array();
        while ($data = $stmt->fetch()) {
            $result[] = $data;
        }
        return $result;
    }
    public function read_student(){
         $sql = 'SELECT id ,nom, prenom ,mail FROM personne WHERE id_grade = 3 ' ;

         $stmt = $this->conn->prepare($sql);
         $stmt->execute();
 
         $result = array();
         while ($data = $stmt->fetch()) {
             $result[] = $data;
         }
         return $result;
    }
    public function read_admin(){
        $sql = 'SELECT id ,nom, prenom ,mail FROM personne WHERE id_grade = 1 ' ;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = array();
        while ($data = $stmt->fetch()) {
            $result[] = $data;
        }
        return $result;
   }
   public function read_gestionnaire(){
    $sql = 'SELECT id ,nom, prenom ,mail FROM personne WHERE id_grade = 2 ' ;

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    $result = array();
    while ($data = $stmt->fetch()) {
        $result[] = $data;
    }
    return $result;
}
    public function create($nom, $prenom, $mail, $mots_de_passe, $reponse, $question, $id_grade)
    {

        $sql = 'INSERT INTO ' . $this->table_name . ' 
        SET
     id_grade=:id_grade , nom=:nom ,prenom=:prenom , mail=:mail, mots_de_passe=:mots_de_passe, question=:question ,reponse=:reponse ; ';

        $stmt = $this->conn->prepare($sql);

        $this->id_grade = htmlentities(strip_tags($this->id_grade));
        $this->nom = htmlentities(strip_tags($this->nom));
        $this->prenom = htmlentities(strip_tags($this->prenom));
        $this->mail = htmlentities(strip_tags($this->mail));
        $this->mots_de_passe = htmlentities(strip_tags($this->mots_de_passe));
        $this->reponse = htmlentities(strip_tags($this->reponse));
        $this->question = htmlentities(strip_tags($this->question));



        $stmt->bindParam(":id_grade", $this->id_grade);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":mots_de_passe", $this->mots_de_passe);
        $stmt->bindParam(":question", $this->question);
        $stmt->bindParam(":reponse", $this->reponse);


        if ($stmt->execute(array(
            'id_grade' => $id_grade,
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $mail,
            'mots_de_passe' => $mots_de_passe,
            'question' => $question,
            'reponse' => $reponse
        ))) {
            return true;
        } else {

            print_r('Erreur:' . $stmt->error . '.\n');
            return false;
        }
    }

    public function Mailexist($mail)
    {
        $sql =  'SELECT mail FROM personne WHERE mail =:mail';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));

        $result = array();
        while ($data = $stmt->fetch()) {
            $result[] = $data;
        }
        return $result;
    }

    public function Password($mail)
    {
        $sql =  'SELECT * FROM personne WHERE mail =:mail';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));

        $data = $stmt->fetch();


        return $data['mots_de_passe'];
    }

    public function getId($mail)
    {
        $sql =  'SELECT id FROM personne
        WHERE mail =:mail ';
           $stmt = $this->conn->prepare($sql);
           $stmt->execute(array('mail' => $mail));
   
           $data = $stmt->fetch();
   
           return $data['id'];
    }

    public function Update_Password($mail, $mdp)
    {
        $sql = 'UPDATE personne SET mots_de_passe = :mots_de_passe  WHERE mail= :mail';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'mail' => $mail,
            'mots_de_passe' => $mdp
        ));
    }

    public function Grade($mail)
    {
        $sql =  'SELECT id_grade FROM personne
     WHERE mail =:mail ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));

        $data = $stmt->fetch();

        return $data['id_grade'];
    }

    public function GetName($mail)
    {

        $sql = 'SELECT 
nom 
FROM personne
   WHERE mail =:mail ';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));

        $data = $stmt->fetch();
        return $data['nom'];
    }

    public function GetFirstName($mail)
    {

        $sql = 'SELECT 
prenom  
FROM
    personne WHERE mail =:mail';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));

        $data = $stmt->fetch();

        return $data['prenom'];
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
    public function Question($mail)
    {
        $sql =  'SELECT question FROM personne WHERE mail =:mail';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));
        $data = $stmt->fetch();

        return $data['question'];
    }

    public function Reponse($mail)
    {
        $sql =  'SELECT reponse FROM personne WHERE mail =:mail';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('mail' => $mail));
        $data = $stmt->fetch();

        return $data['reponse'];
    }
}
