<?php
// require_once "./util/dbUtil.php";
// require_once "./util/utils.php";
// require_once "./function/user.php";
// require_once "./function/ad.php";
require_once __DIR__ ."/../config/dbUtil.php";
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Methods: OPTIONS, GET');
    exit();
} 
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // récupérer tout les cours
        
    $creneaux = getAllcreneaux();

    $response = [];
    foreach ($creneaux as $creneau) {
        $response[] = [
            "id" => (int)$creneau['id'],
            "code" => ($creneau['jour']),
            "heure_debut" => $creneau['heure_debut'],
            "heure_fin" => $creneau['heure_fin'],
            "salle" => $creneau['salle']
        ];
    }
try
    {
        http_response_code(200); 
        echo json_encode($response);
    }
    catch(execption)
    {
        http_response_code(500);
    }
} 
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$classes_id=filter_input(Input_POST,'classes_id',FILTER_VALIDATE_INT);
$cours_id=filter_input(Input_POST,'cours_id',FILTER_VALIDATE_INT);
$jour=filter_input(Input_POST,'jour',FILTER_SANITIZE_SPECIAL_CHARS);
$heure_debut=filter_input(Input_POST,'annee_scolaire',FILTER_VALIDATE_INT);
$heure_fin=filter_input(Input_POST,'code',FILTER_VALIDATE_INT);
$salle=filter_input(Input_POST,'salle',FILTER_SANITIZE_SPECIAL_CHARS);

$sql="INSERT INTO 'creneaux' ('classes_id', 'cours_id','jour','annee_scolaire','code',salle) 
VALUES (".$classes_id.",".$cours_id.",".$jour.",".$heure_debut.",".$heure_fin.",".$salle.")";
try
    {
        $stmt = getDb()->prepare($sql);
        $stmt->execute();
        http_response_code(201); 
    }
    catch(execption)
    {
        http_response_code(502);
    }
    header("Refresh: 0");
}
else if($_SERVER['REQUEST_METHOD'] === 'DELETE')
{
    $id=filter_input(Input_POST,'id',FILTER_VALIDATE_INT);
    $sql="DELETE from creneaux where id ="+$id;
    try
    {
        $stmt = getDb()->prepare($sql);
        $stmt->execute();
        http_response_code(202); 
    }
    catch(execption)
    {
        http_response_code(502);
    }
    header("Refresh: 0");
}
else if($_SERVER['REQUEST_METHOD'] === 'UPDATE')
{
    $id=filter_input(Input_POST,'id',FILTER_VALIDATE_INT);
    $classes_id=filter_input(Input_POST,'classes_id',FILTER_VALIDATE_INT);
    $cours_id=filter_input(Input_POST,'cours_id',FILTER_VALIDATE_INT);
    $jour=filter_input(Input_POST,'jour',FILTER_SANITIZE_SPECIAL_CHARS);
    $heure_debut=filter_input(Input_POST,'annee_scolaire',FILTER_VALIDATE_INT);
    $heure_fin=filter_input(Input_POST,'code',FILTER_VALIDATE_INT);
    $salle=filter_input(Input_POST,'salle',FILTER_SANITIZE_SPECIAL_CHARS);
    $sql="Update creneaux SET classes_id = ".$classes_id.", cours_id=".$cours_id.",
    jour=".$jour.", heure_debut=".$heure_debut.", heure_fin=".$heure_fin.", salle=".$salle." where id =".$id;

    try
    {
        $stmt = getDb()->prepare($sql);
        $stmt->execute();
        http_response_code(202); 
    }
    catch(exception)
    {
        http_response_code(502);
    }
    header("Refresh: 0");
}
else {
    http_response_code(405);
    echo json_encode(["message" => "method.not.allowed"]);
}
function getAllcreneaux()
{   
    $sql="Select * from creneaux";
    $stmt = getDb()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}