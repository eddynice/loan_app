<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");

exit(); 
}
$url != '';

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: dom.php'); //redirect to some other page
  exit();
}

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
$temp->execute(array(":acc_no"=>$_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);

include_once ('counter.php');
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
        
        <div class="col-xl-8 order-xl-1"><br><br>
          <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">TRANSACTION CONFIRMATION</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Need Help?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
              
              <form autocomplete="off" method="post" >
                  
                  
          <center>  <img src="icon/check-circle.gif" style="height:80px; width:80px;  "/>
          <br>
          <h4 style="color:green;">    You have successfully Withdraw <?php echo $row['currency']?><?php echo $rows['amount']?> to Account Number <?php echo $rows['acc_no']?> Belonging to <?php echo $rows['acc_name']?>
          of <?php echo $rows['bank_name']?></h4>
                        
            <a href="summary.php" class="btn btn-warning">OKAY</a></center> 
                  
               <hr> 
           <center> <p style="color:red">Check your registered email or mobile number for transaction receipt</p>   </center> 
              </form>
              
                    <br><br><br><br><br><br>
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
          
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#114e11; color:white;">
                <h5 class="modal-title" style="text-align:center;">TRANSACTION CONFIRMATION</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                 <center>  <img src="icon/logo-ok-png-2.png" style="height:80px; width:80px;  "/>
          <br>
          <h5 style="color:#114e11;">    You have successfully Transfered <?php echo $row['currency']?><?php echo $rows['amount']?> to Account Number <?php echo $rows['acc_no']?> with name <?php echo $rows['acc_name']?>
          of <?php echo $rows['bank_name']?></h5>
                <br>
                <p style="text-align:center; color:red;">Transaction initiated successfully, it will take 24 hours to credit funds in receivers account.
A detail of this transaction has been recorded in your estatement and email. We recommend you check your account of the fund to await  48 Hours.</p>
<br>
                <form>
                    <img src="../assets/img/brand/blue.png" alt="logo" height="40px" />
                    <br><br>
                    <a href="summary.php" class="btn btn-warning">OKAY</a>
                </form>
            </div>
        </div>
    </div>
</div>

       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     