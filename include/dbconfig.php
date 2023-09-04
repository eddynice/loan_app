

<?php


/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)
INPUT UR SQL DETAILS HERE  */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'payhub');


//ONLINE BANKING DATA SETTINGS
$site_title = 'Payhub';
$site_address = 'NRG Wodland Ave Austine #72222 TX USA';
$site_initial = 'Payhub';
$site_email = 'support@gonetonline.com'; 
$live_chat_id = ''; 


//WEBSITE COLOR SETTINGS
$rfatechnology_script_menu = '#639af4';
$rfatechnology_script_menu_font = 'black';

$rfatechnology_script_header = '#140a01';
$rfatechnology_script_header_font = 'white';

$tab = '#092980';
$tab_font = 'white';


$page_loader = '#85cfd6';


//PAYMENT SETTINGS
$btc_wallet = 'YHSGJ9929jJSWKK3992JKKKSKS822992';

$bank_name = 'Bank of America';
$bank_address = 'NRG Wodland Ave Austine #72222 TX USA';
$bank_account = '0292938929292'; 
$account_name = 'rfatechnology_bank Limited'; 
$swift_code = 'WHSY82992H'; 
$routing_no = '10109292992929-9292'; 


class Database
{
   /* Do not set or touch any thing here */  
    private $host = "DB_SERVER";
    private $db_name = "DB_NAME";
    private $username = "DB_USERNAME";
    private $password = "DB_PASSWORD";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
/* Attempt to connect to MySQL database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// class Database {
//     private $pdo;

//     public function __construct($dsn, $username, $password) {
//         try {
//             $this->pdo = new PDO($dsn, $username, $password);
//             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             echo "Connection failed: " . $e->getMessage();
//         }
//     }

//     public function query($query) {
//         try {
//             $stmt = $this->pdo->query($query);
//             return $stmt->fetchAll(PDO::FETCH_ASSOC);
//         } catch (PDOException $e) {
//             echo "Query failed: " . $e->getMessage();
//             return [];
//         }
//     }

//     public function close() {
//         $this->pdo = null;
//     }
// }

// // Usage
// $dsn = "mysql:host=localhost;dbname=payhub";
// $username = "root";
// $password = "";

// $database = new Database($dsn, $username, $password);

// // Example query
// $query = "SELECT * FROM users";
// $results = $database->query($query);

// foreach ($results as $row) {
//     // Process each row of data
//     // $row contains an associative array of the current row's data
// }

// // Close the connection when done
//$database->close();




?>