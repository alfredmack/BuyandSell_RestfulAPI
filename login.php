<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    $user =$_POST['username'];
    $pass =$_POST['password'];
 
  
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    
 
       // select data from db where username=username from mobile and password= password from mobile
    $result = mysql_query("SELECT *FROM login_tb WHERE username = '$user' and password='$pass'");
    
    
    if (mysql_num_rows($result) > 0) {
        
        $result = mysql_fetch_array($result);
        $data= array();
            // success
            $response["success"] = 1;
            $response["message"] = "Success Login";
 
          
 

            // echoing JSON response
           echo json_encode($response);
        }
 
   
        else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }

}
else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! No posted data.";
 
        // echoing JSON response
        echo json_encode($response);
    }

?>