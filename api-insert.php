<?php
include('config.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"),true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include('config.php');

$query= "INSERT INTO `students`(`name`, `age`, `city`) VALUES ('{$name}',{$age},'{$city}')";

if(mysqli_query($conn,$query)){
    echo json_encode(array('message' =>'Student record inserted','status'=>true));
}else{
    echo json_encode(array('message' =>'Student record not  inserted','status'=>false));
}
?>
