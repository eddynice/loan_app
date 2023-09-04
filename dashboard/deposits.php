<?php
class BankAccount {
    // ... (same as before)
    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "payhub";

        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getBalance() {
        $sql = "SELECT a_bal FROM accounts WHERE id = 1";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row["a_bal"];
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $currentBalance = $this->getBalance();
            $newBalance = $currentBalance + $amount;
            
            $sql = "UPDATE account SET a_bal = $newBalance WHERE id = 1";
            if ($this->conn->query($sql) === TRUE) {
                return "Deposited $" . number_format($amount, 2) . ". New balance: $" . number_format($newBalance, 2);
            } else {
                return "Error updating balance: " . $this->conn->error;
            }
        } else {
            return "Invalid deposit amount. Please deposit a positive amount.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $account = new BankAccount();
    $depositAmount = $_POST["balance"];
    $depositResult = $account->deposit($depositAmount);
}
?>