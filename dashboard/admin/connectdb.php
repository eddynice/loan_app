<?php 
class Database
{
     
    private $host = "localhost";
    private $db_name = "payhub";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;
	    $DB_con = null;
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

try {
    $conn = mysqli_connect('localhost', 'root', '', 'payhub');
} catch (mysqli_sql_exception $e) {
    // Display detailed error message
    echo 'Connection error: ' . $e->getMessage();
    // You can log the error or perform other actions as needed
}

//ONLINE BANKING DATA SETTINGS
// $site_title = 'Payhub';
// $site_address = 'NRG Wodland Ave Austine #72222 TX USA';
// $site_initial = 'Payhub';
// $site_email = 'support@gonetonline.com '; 
// $live_chat_id = ''; 



// $DB_host = "localhost";
// $DB_user = "root";
// $DB_pass = "";
// $DB_name = "payhub";


//      $host = "localhost";
//     $database = "payhub";
//     $username = "root";
//     $password = "";

// try
// {
// 	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
// 	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch(PDOException $e)
// {
// 	echo $e->getMessage();

?>