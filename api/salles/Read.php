<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Salles.php';

$database = new Database();

$db = $database->connect();

$salle = new Salles($db);

$list = $salle->read();

$num = $list->rowCount();

if ($num > 0) {

    $salle_array = array();
    $salle_array['salles'] = array();

    while ($row = $list->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $salle_item = [
            'id'=>$id,
            'nom'=> $nom ,
            'adresse'=>$adresse,
            'heure_ouverture' => $heure_ouverture,
            'heure_fermeture' => $heure_fermeture,
            'nombre_de_place' => $nombre_de_place,
        ];
        array_push($salle_array['salles'], $salle_item);
    };
 
    http_response_code(200);
    echo json_encode($salle_array);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Aucunes salles trouvé']);
}
