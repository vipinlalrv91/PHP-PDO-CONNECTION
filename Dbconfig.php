<?Php
/**
 * DbConfig - Manage Database Connection
 * @author Bridge 
 * @copyright Bridge India
*/
class DbConfig{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "comparison";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>