<?php
namespace App\Services\Data;
use App\Models\OrderModel;
use Carbon\Exceptions\Exception;
use App\Services\Data\Utility\DBConnect;
class OrderDAO
{
    // Define the connection string
    private $conn;
    private $dbname = "activity2";
    private $dbQuery;
    private $connection; 
    private $dbObj;
    
    // Constructor that creates a connection with the database
    public function __construct($dbObj)
    {
       $this->dbObj = $dbObj;
    }
    /** Method to verify user credentials
     *
     */
    public function addOrder(string $product, int $customerID)
    {
        //print_r($credentials->getUsername());
        try
        {
            // Define the query to search the database for the credentials
            $this->dbQuery = "INSERT INTO `order`
                              (product, customerID)
                              VALUES ('".$product . "', " .$customerID. ")"; 
                             
            // If the selected query returns a result set
           // $result = mysqli_query($this->conn, $this->dbQuery);
            if ($this->dbObj->query($this->dbQuery))
            {
                //mysqli_free_result($result);
               // $this->conn->closeDBConnect();
                return true;
            }
            else
            {
               // mysqli_free_result($result);
               // $this->conn->closeDBConnect();
                return false;
            }
        
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    
}
    
