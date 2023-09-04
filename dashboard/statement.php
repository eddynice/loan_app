<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: login.php");
    exit();
}


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $reg_user->runQuery("UPDATE account SET a_bal = a_bal + :new_bal, type = :type_of_account WHERE email = :email");
$stmt->bindParam(':new_bal', $a_bal, PDO::PARAM_STR);
$stmt->bindParam(':type_of_account', $type_of_account, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);

try {
    $updateResult = $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Account updated successfully!";
    } else {
        echo "Email not found or no changes made.";
    }
} catch (PDOException $ex) {
    echo "An error occurred: " . $ex->getMessage();
    // Log the error and handle it as needed
}

// Retrieve statistics
$statsStmt = $reg_user->runQuery("
    SELECT
        SUM(a_bal) AS total_amount,
        COUNT(*) AS total_transactions,
        MIN(timestamps) AS earliest_transaction,
        MAX(timestamps) AS latest_transaction
    FROM
        account
    WHERE
        email = :email
");

$statsStmt->bindParam(':email', $email, PDO::PARAM_STR);

try {
    $statsStmt->execute();
    $statsResult = $statsStmt->fetch(PDO::FETCH_ASSOC);

    if ($statsResult) {
        $totalAmount = $statsResult['a_bal'];
        $totalTransactions = $statsResult['total_transactions'];
        $earliestTransaction = $statsResult['earliest_transaction'];
        $latestTransaction = $statsResult['latest_transaction'];

        echo "Total Amount: $totalAmount<br>";
        echo "Total Transactions: $totalTransactions<br>";
        echo "Earliest Transaction: $earliestTransaction<br>";
        echo "Latest Transaction: $latestTransaction<br>";
    } else {
        echo "No transaction data found for this email.";
    }
} catch (PDOException $ex) {
    echo "An error occurred: " . $ex->getMessage();
    // Log the error and handle it as needed
}


// $email = $row['email'];

// $temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ");
// $temp->execute(array(":acc_no" => $_SESSION['acc_no']));
// $rows = $temp->fetch(PDO::FETCH_ASSOC);


?>
  <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'mobmenu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
   
  
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'mainmenu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->
     
     
     
  <div class="container-fluid mt--7">
    
 
 
 
 
 
 
 
 
 
 
 
 
 
      <div class="row">
          
          
        <div class="col"><br><br>
          <div class="card shadow">
         <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <h3 class="mb-0">Transaction Statement:    <input type='button' id='btn' class="btn btn-warning" value='Print Statement' onclick='printtag("DivIdToPrint");' ></h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                      
                        <th class="no-sort" style="width:1%">#</th> 
						<th scope="col">AMOUNT</th>
						<th scope="col">RECIEVING ACCOUNT AND NAME</th>
						<th scope="col">TYPE</th>
						<th scope="col">BANK</th>
						<th scope="col">DESCRIPTION</th>
						<th scope="col">DATE/TIME</th>
						<th scope="col">STATUS</th>
						
					 
                  </tr>
                </thead>
                <tbody>
             <?php 
				$acc_no = $_SESSION['acc_no'];
				$email = $row['email'];
				$his = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email'");
				$his->execute(array(":acc_no"=>$_SESSION['acc_no']));
				while($rows = $his->fetch(PDO::FETCH_ASSOC)){?>
                  
                 
                  <tr> 
                        <td></td>
						<td scope="row"><?php echo $row['currency']; ?> <?php echo $rows['amount']; ?></td>
						<td><?php echo $rows['acc_no']; ?> - <?php echo $rows['acc_name']; ?></td>
						<td><?php echo $rows['transtype']; ?></td>
						<td><?php echo $rows['bank_name']; ?></td>
						<td><?php echo $rows['remarks']; ?></td>
						<td><?php echo $rows['date']; ?></td>
						<td><?php echo $rows['status']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
 
 
 
 
 
 
 
 
 
 
      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <h3 class="text-white mb-0">Transfer History Associated with your Account</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th class="no-sort" style="width:1%">Ref No.</th>
						
						<th scope="col">TYPE</th>
						<th scope="col">AMOUNT <b>(<?php echo $row['currency']; ?>)</b></th>
						<th scope="col">TO/FROM</th>
						<th scope="col">DESCRIPTION</th>
						<th scope="col">DATE/TIME</th> 
                  </tr>
                </thead>
                <tbody>
                    	<?php 
				$uname = $_SESSION['acc_no'];
				$debcre = $reg_user->runQuery("SELECT * FROM alerts WHERE uname = '$uname'");
				$debcre->execute();
				while($rows = $debcre->fetch(PDO::FETCH_ASSOC)){?>
                  <tr>
                    
                       <td scope="row"><?php echo $rows['id']; ?>
                              </td>
						<td><?php include('ss.php');  ?></td>
						<td><?php echo $rows['amount']; ?></td>
						<td><?php echo $rows['sender_name']; ?></td>
						<td><?php echo $rows['remarks']; ?></td>
						<td><?php echo $rows['date']; ?> &nbsp;<?php echo $rows['time']; ?></td>
                  </tr>
                  
                  <?php } ?>
                 
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
 
 
 
 
 
 
 
 
 
 
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     