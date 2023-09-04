<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: login.php");
    exit();
}


$reg_user = new USER();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 // $id = $_POST["id"];
 $amount = $_POST["amount"];
 $type_of_account = $_POST["type_of_account"];
 $purpose = $_POST["purpose"];
 $interval = $_POST["interval"];
 $comment = $_POST["comment"];
    
    // Validate email (add more validation as needed)

    // Insert into database
    $stmt = $reg_user->runQuery("INSERT INTO sub (amount,type_of_account,purpose,interval,comment) VALUES (:amount, :type_of_account, :purpose, :interval :comment)");
   // $sql = "INSERT INTO subscriptions (email) VALUES (?)";
   //(email, amount, type_of_account, comment) VALUES (:email, :amount, :type_of_account, :comment)
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':type_of_account', $type_of_account);
    $stmt->bindParam(':purpose', $purpose);
    $stmt->bindParam(':interval', $interval);
    $stmt->bindParam(':comment', $comment);
    if ($stmt->execute()) {
        echo "Subscription successful!";
    } else {
        echo "Error: ";
    }
    
    $stmt->$conn->close();
}
?>
