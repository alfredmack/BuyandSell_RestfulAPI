<?php
 
 
class DB_Functions {
 
    private $conn;
 
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
   
    /**
     * Search for username & password
     */
    public function isUserAvailable($username, $password) {
         
        $result = mysqli_query($this->conn,"SELECT *FROM login_tb WHERE username = '$username' and password='$password'");
    
       if (mysqli_num_rows($result) > 0) {
        
            $result = mysqli_fetch_array($result);
       
            // success
            $response["success"] = 1;
            $response["message"] = "Success Login";

            // echoing JSON response
            return $response;
        }
        else{
            
            $response["success"] = 0;
            $response["message"] = "Usename or Password is incorect";

            // echoing JSON response
            return $response;
            
        }
        
      
    }
    
     /**
     * Search by username
     */
    public function getProfile($username) {
         
        
       $result = mysqli_query($this->conn,"SELECT *FROM users_tb WHERE username = '$username'");
    
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_array($result);
          $contact = array();
        $contact["fname"] = $result["fname"];
        $contact["lname"] = $result["lname"];
        $contact["email"] = $result["email"];
        $contact["gender"] = $result["gender"];
        $contact["username"] = $result["username"];
    
            // success
            $response["success"] = 1;
 
            // user node
            $response["profile"] = array();
 
            array_push($response["profile"], $contact);
 
            return $response;
            

            
        }
    }
    
    
     /**
     * Search for username & password
     */
//    public function getListofHouses() {
//         
//        $result = mysqli_query($this->conn,"SELECT *FROM items_db WHERE category = 'houses'");
//    
//       if (mysqli_num_rows($result) > 0) {
//        
//            $result = mysqli_fetch_array($result);
//            
//            $response["houses"] = array();
// 
//    while ($row = mysql_fetch_array($result)) {
//        // temp user array
//        $product = array();
// 
//        $product["landlord_mail"] = $row["tenant_email"];
//        $product["fullname"] = $row["fullname"];
//        
// 
//        // push single product into final response array
//        array_push($response["houses"], $product);
//    }
//    // success
//    $response["success"] = 1;
// 
//    // echoing JSON response
//    echo json_encode($response);
//       
//            // success
//            $response["success"] = 1;
//            $response["message"] = "Success Login";
//
//            // echoing JSON response
//            return $response;
//        }
//        else{
//            
//            $response["success"] = 0;
//            $response["message"] = "Usename or Password is incorect";
//
//            // echoing JSON response
//            return $response;
//            
//        }
//        
//      
//    }
    
    
        
}
 
?>