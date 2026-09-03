<?php
// require_once "./util/dbUtil.php";
// require_once "./util/utils.php";
// require_once "./function/user.php";
// require_once "./function/ad.php";
require_once "./config/dbUtil.php";
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Methods: OPTIONS, GET');
    exit();
} 
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // récupérer tout les cours
        
    $Classes = getAllClasses();

    $response = [];
    foreach ($Classes as $Classe) {
        $response[] = [
            "id" => (int)$Classe['id'],
            "code" => ($Classe['nom']),
            "annee_scolaire" => $Classe['annee_scolaire']
        ];
    }
    http_response_code(200);
    echo json_encode($response);
} 
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$code=filter_input(Input_POST,'code',FILTER_SANITIZE_SPECIAL_CHARS);
$annee_scolaire=filter_input(Input_POST,'annee_scolaire',FILTER_SANITIZE_SPECIAL_CHARS);

$sql="INSERT INTO 'cours' ('code', 'nom') VALUES (".$code.",".$annee_scolaire.")";
    $stmt = getDb()->prepare($sql);
    $stmt->execute();
    echo"test";
}
else {
    http_response_code(405);
    echo json_encode(["message" => "method.not.allowed"]);
}
function getAllClasses()
{   
    $sql="Select * from Classes";
    $stmt = getDb()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}