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
    
    
  public function regUsers($fname,$lname,$email,$gender,$username, $password) {
          
         
        $result = mysqli_query($this->conn,"INSERT INTO login_tb(username,password) VALUES('$username', '$password')");
         
     if (!mysql_error()) {
         
         mysqli_query($this->conn,"INSERT INTO users_tb(fname,lname,email,gender,username) VALUES('$fname', '$lname','$email','$gender','$username')");
         $response["success"] = 1;
         $response["message"] = "User successfully created.";
         return $response;
     }
     else{
         $response["success"] = 0;
         $response["message"] = "User failed to be created.";
         return $response;
     }
             
         }
         
    
        
}
 
?>