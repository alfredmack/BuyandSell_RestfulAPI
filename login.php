<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // receiving the post params
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // get the user by username and password
    $response = $db->isUserAvailable($username, $password);
 
    
        echo json_encode($response);
    
} else {
    // required post params is missing
    $response["success"] = 0;
    $response["message"] = "No data posted";
    echo json_encode($response);
}
?>