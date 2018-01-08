<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && 
        isset($_POST['gender']) && isset($_POST['username']) && isset($_POST['password'])) {
 
    // receiving the post params
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // call reguser method
    $response = $db->regUsers($fname, $lname, $email, $gender, $username, $password);
 
    
        echo json_encode($response);
    
} else {
    // required post params is missing
    $response["success"] = 0;
    $response["message"] = "No data posted";
    echo json_encode($response);
}
?>