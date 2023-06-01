<?php
require_once ('User.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

$id = array_shift($request);
if ($id == '')
    $id = NULL;
$result = null;

switch ($requestRessource) {
    case 'user':
        switch ($requestMethod) {
            case 'PUT':
                parse_str(file_get_contents('php://input'), $_PUT);
                if(isset($_PUT) and $id){
                    $result=User::update_info($id,$_PUT["prenom"],$_PUT["nom"],$_PUT["email"],$_PUT["date"]);
                    break;
                }
                break;
            case 'GET':
            $result=User::get_info_client($id);
            break;
        }
    break;
}

if (!empty($result)) {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    header('HTTP/1.1 200 OK');
    echo json_encode($result);
    exit();
}

// Bad request case.
header('HTTP/1.1 400 Bad Request');

