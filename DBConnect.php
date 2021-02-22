<?php
namespace App\Services\Data\Utility;
//use App\Models\CustomerModel;
//use Carbon\Exceptions\Exception;
use mysqli;

class DBConnect
{
    // Define the connection string
    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    
    // Constructor that creates a connection with the database
    public function __construct(string $dbname)
    {
        // Create a connection to the database
        $this->dbname = $dbname;
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        // Make sure to test the connection and see if there any errors.
    }
    
    public function getDBConnect()
    {
        // OOP Style
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
       // $this->conn = mysqli::connect($this->servername, $this->username, $this->password, $this->dbname);
       // Error checking
       if ($this->conn->connect_errno)
       {
           echo "Failed to connect to MySQL: " . $this->conn->connect_errno;
           exit();
       }
       return($this->conn);
    }
    /*
     * close the connection
     */
    public function closeDBConnect()
    {
        // OOP Style
        $this->conn->close();
        // Procedure Style 
        //mysqli_close($this->conn);
    }
    
    /*
     * Turn ON Autocommit
     */
    public function setDBAutocommitTrue()
    {
        // Turn autocommit ON
        $this->conn->autocommit(TRUE);
    }
    /*
     * Turn OFF Autocommitt
     */
    public function setDBAutocommitFalse()
    {
        // Turn autocommit OFF
        $this->conn->autocommit(FALSE);
        
    }
    /*
     * Begin a transaction
     */
    public function beginTransaction()
    {
        $this->conn->begin_transaction();
        
    }
    
    /*
     * Commit the transaction 
     */
    public function commitTransaction()
    {
        $this->conn->commit();  
    }
    /*
     * Rollback a transaction
     */
    public function rollbackTransaction()
    {
        $this->conn->rollback();
    }
}
    