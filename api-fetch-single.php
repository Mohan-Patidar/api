<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];
// $student_id = isset($_GET['sid'])?$_GET['sid']:die();

include('config.php');

$query= "SELECT * FROM students WHERE id = {$student_id}";
$result = mysqli_query($conn,$query) or die("sql query failed");

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message' =>'no record found','status'=>false));
}


?>
