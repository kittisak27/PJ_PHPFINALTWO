<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age, 3600");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");
    
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405);
        echo json_encode([
            'success' => 0,
            'message' => 'Invalid Request Method. HTTP method should be GET',
        ]);
        exit;
    }

    include_once '../config/database.php';
    include_once '../class/dept.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Dept($db);

    $stmt = $items->getDepts();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $deptArr = array();
        $deptArr["data"] = array();
        $deptArr["success"] = 1;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $data = array(
                "dept_no" => $row["dept_no"],
                "dept_name" => $row["dept_name"],
            );

            array_push($deptArr["data"], $data);
        }
        echo json_encode($deptArr);
    }

    else{
        http_response_code(200);
        echo json_encode([
            'success' => 0,
            'message' => 'No Result Found!',
        ]);
        //echo json_encode(array("message" => "No record found."));
    }
?>