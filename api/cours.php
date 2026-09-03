<?php
// require_once "./util/dbUtil.php";
// require_once "./util/utils.php";
// require_once "./function/user.php";
// require_once "./function/ad.php";
require_once "config/dbUtil.php";
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Methods: OPTIONS, GET');
    exit();
} 
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // récupérer tout les cours
        
    $Classes = getAllCour();

    $response = [];
    foreach ($Classes as $Classe) {
        $response[] = [
            "id" => (int)$Classe['id'],
            "code" => ($Classe['code']),
            "nom" => $Classe['nom']
        ];
    }
    http_response_code(200);
    echo json_encode($response);
} 
else {
    http_response_code(405);
    echo json_encode(["message" => "method.not.allowed"]);
}
function getAllCour()
{   
    $sql="Select * from cours";
    $stmt = getDb()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}