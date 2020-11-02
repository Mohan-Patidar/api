<?php
include('config.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

// $data = json_decode(file_get_contents("php://input"),true);
// $search_value = $data['search'];
$search_value = isset($_GET['search'])?$_GET['search']:die();

include('config.php');
$query= "SELECT * FROM students WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query($conn,$query) or die("sql query failed");

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message' =>'No search found','status'=>false));
}
?>
