<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Max-Age, 3600");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");


    if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
        http_response_code(405);
        echo json_encode([
            'success' => 0,
            'message' => 'Invalid Request Method. HTTP method should be DELETE',
        ]);
        exit;
    }

    include_once '../config/database.php';
    include_once '../class/dept.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Dept($db);

    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->dept_no) or !isset($data->dept_name)){

        echo json_encode([
            'success' => 0,
            'message' => 'Please fill all the fields | dept_no, dept_name',
        ]);
        exit;
    }
    elseif (empty(trim($data->dept_no))  or empty(trim($data->dept_name))) {
    
        echo json_encode([
            'success' => 0,
            'message' => 'Oops! empty field detected. Please fill all the fields.',
        ]);
        exit;
    
    }
    
    $item->deptNo = $data->dept_no;
    $item->deptName = $data->dept_name;
    
    if($item->deleteDept()){
        http_response_code(201);
        echo json_encode([
            'success' => 1,
            'message' => 'Data delete Successfully.'
        ]);
        exit;
    } else{
        echo json_encode([
            'success' => 0,
            'message' => 'Data not delete.'
        ]);
        exit;
    }
?>