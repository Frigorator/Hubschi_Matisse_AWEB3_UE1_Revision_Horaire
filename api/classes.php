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
        echo ($_SERVER['REQUEST_METHOD']);
    $Classes = getAllClasses();
    $response = [];
    foreach ($Classes as $Classe) {
        $response[] = [
            "id" => (int)$Classe['id'],
            "code" => ($Classe['nom']),
            "annee_scolaire" => $Classe['annee_scolaire']
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
$nom=filter_var($_POST['nom'],FILTER_SANITIZE_SPECIAL_CHARS);

$annee_scolaire=filter_var($_POST['annee_scolaire'],FILTER_SANITIZE_SPECIAL_CHARS);
$sql="INSERT INTO Classes (nom, annee_scolaire) VALUES (?, ?)";
try
    {
        $stmt = getDb()->prepare($sql);
        $stmt->execute([$nom, $annee_scolaire]);
        http_response_code(201); 
    }
    catch(execption)
    {
        http_response_code(502);
    }
    // echo "test";
    header("Refresh: 0");
}
else if($_SERVER['REQUEST_METHOD'] === 'DELETE')
{
    $id=filter_input(Input_POST,'id',FILTER_VALIDATE_INT);
    $sql="DELETE from Classes where id =".$id;
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
else if($_SERVER['REQUEST_METHOD'] === 'PUT')
{
    $id=filter_input(Input_POST,'id',FILTER_VALIDATE_INT);
    $nom=filter_input(Input_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS);
    $annee_scolaire=filter_input(Input_POST,'annee_scolaire',FILTER_SANITIZE_SPECIAL_CHARS);
    $sql="Update Classes SET nom = ".$nom.", annee_scolaire=".$annee_scolaire." where id =".$id;

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
