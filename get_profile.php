<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['username'])) {
 
    // receiving the post params
    $username = $_POST['username'];
    
 
    // get the user by username and password
    $response = $db->getProfile($username);
 
    
        echo json_encode($response);
    
} else {
    // required post params is missing
    $response["success"] = 0;
    $response["message"] = "No data posted";
    echo json_encode($response);
}
?>