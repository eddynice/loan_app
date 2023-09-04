<?php
// Assuming $reg_user is an instance of a class that handles user operations
// and $conn is a PDO database connection


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payhub";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
};

if (isset($_POST["post"])) {
    $interval = $_POST["interval"];
      $purpose = $_POST["purpose"];
      $amount= $_POST["amount"];
      $time = $_POST["time"];

    
    // Validate email (add more validation as needed)

    // Insert into database
    try {
        $sql = "INSERT INTO sub (interval, purpose, amount, time) VALUES (:interval, :purpose, :amount, :time)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':interval', $interval);
        $stmt->bindParam(':purpose', $purpose);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':time', $time);
        $stmt->execute();
        echo "Subscription successful!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

