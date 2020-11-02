<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];

include('config.php');
$query= "DELETE  FROM students WHERE id = {$student_id}";


if(mysqli_query($conn,$query)){

    echo json_encode(array('message' =>'Student record deleted','status'=>true));
}
else{
    echo json_encode(array('message' =>'student record not deleted','status'=>false));
}

?>
