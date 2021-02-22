<?php
namespace App\Services\Data;

use App\Models\CustomerModel;
use Carbon\Exceptions\Exception;

use App\Services\Data\Utility\DBConnect;
class CustomerDAO
{

    // Define the connection string
    private $conn;

  //  private $servername = "localhost";

  //  private $username = "root";

 //   private $password = "root";

    private $dbname = "activity2";
    
   // private $port = "3306";

    private $dbQuery;

    private $connection;
    private $dbObj;

    // Constructor that creates a connection with the database
    public function __construct($dbObj)
    {
        $this->dbObj = $dbObj;
    }

    /**
     * Method to add customer to database
     */
    public function addCustomer(CustomerModel $customerData)
    {
        // print_r($credentials->getUsername());
        try {
            // Turn on Autocommit
            //$this->conn->autocommit(TRUE);
            // Define the query to search the database for the credentials
            $this->dbQuery = "INSERT INTO customer
                              (firstName, lastName)
                              VALUES ('{$customerData->getFirstName()}', '{$customerData->getLastName()}')";

            // If the selected query returns a result set
            // $result = mysqli_query($this->conn, $this->dbQuery);
            if ($this->dbObj->query($this->dbQuery)) {
                // mysqli_free_result($result);
               // $this->conn->closeDBConnect();
                //mysqli_close($this->conn);
                return true;
            } else {
                // mysqli_free_result($result);
               // $this->conn->closeDBConnect();
                //mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    // ACID
    // Get the next ID from the PK to put in the FK
    public function getNextID()
    {
        try {
            // Define the query to get the next ID
            $this->dbQuery = "SELECT customerID
                              FROM customer
                              ORDER BY customerID DESC LIMIT 0,1";
            $result = $this->dbObj->query($this->dbQuery);
            while ($row = mysqli_fetch_array($result))
            {
                // Point to the next row that has not been committed yet.
                return $row['customerID'] + 1;
            }
            
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}