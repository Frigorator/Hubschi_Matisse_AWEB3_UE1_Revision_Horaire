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
        
    $Classes = getAllCour();

    $response = [];
    foreach ($Classes as $Classe) {
        $response[] = [
            "id" => (int)$Classe['id'],
            "code" => ($Classe['code']),
            "nom" => $Classe['nom']
        ];
    }
try
    {
        http_response_code(200); 
        echo json_encode($response);
    }
    catch(execption)
    {
        http_response_code(500   );
    }
} 
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$code=filter_input(Input_POST,'code',FILTER_SANITIZE_SPECIAL_CHARS);
$annee_scolaire=filter_input(Input_POST,'annee_scolaire',FILTER_SANITIZE_SPECIAL_CHARS);

$sql="INSERT INTO 'cours' ('code', 'nom') VALUES (".$code.",".$annee_scolaire.")";
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
}
else if($_SERVER['REQUEST_METHOD'] === 'DELETE')
{
    $id=filter_input(Input_POST,'id',FILTER_VALIDATE_INT);
    $sql="DELETE from cours where id ="+$id;
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
}
else if($_SERVER['REQUEST_METHOD'] === 'UPDATE')
{
    $id=filter_input(Input_POST,'id',FILTER_VALIDATE_INT);
    $code=filter_input(Input_POST,'code',FILTER_SANITIZE_SPECIAL_CHARS);
    $annee_scolaire=filter_input(Input_POST,'annee_scolaire',FILTER_SANITIZE_SPECIAL_CHARS);
    $sql="Update cours SET code = ".$code.", nom=".$annee_scolaire." where id =".$id;

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