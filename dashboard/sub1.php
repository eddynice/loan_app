<?php 

session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (isset($_POST["post"])) {
    $amount = trim($_POST['amount']);
    $type_of_account = trim($_POST['type_of_account']);
    $purpose = trim($_POST['purpose']);
    $interval = trim($_POST['interval']);
    $comment = trim($_POST['comment']);

    // Initialize $reg_user object
    $reg_user = new USER();

    try {
        $reg_user->sub($amount, $type_of_account, $purpose, $interval, $comment);
        $id = $reg_user->lasdID();
        // Do something with the $id, if needed
    } catch (PDOException $ex) {
        // Log the error, provide user-friendly error message, or take appropriate action
        echo "An error occurred: " . $ex->getMessage();
    }
}
?>


<form id="subscribe-form">
    <input type="number" name="amount" placeholder="Enter your email" required>
    <input type="text" name="type_of_account" placeholder="Enter your email" required>
    <input type="text" name="comment" placeholder="Enter your email" required>
    <button type="submit">Subscribe</button>
</form>
<div id="subscribe-message"></div>
