<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

if (!isset($_SESSION['acc_no'])) {
	
header("Location: login.php");
exit(); 
}
$url != '';

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: wire-transfer.php'); //redirect to some other page
  exit();
}
$reg_user = new USER();
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['code'])){
	$cot = $row['cot'];
	$sub = $_POST['cot'];
	if($sub !== $cot){
		 
	     $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry! </strong>Invalid COT Code
			  </div>
			  ";
	    
	
	}
	else {
	    
	    
	   $msg1 = "
					<div class='alert alert-success'>
					
					<script type='text/javascript'>
							<!--
							function Redirect() {
							window.location='imfcode.php';
							}
							document.write ('');
							setTimeout('Redirect()', 15000);
							//-->
							</script>
							
					<center><img src='loading.gif' width='180px' /></center>
					
					<center>	<strong style='color:black;'>Congratulations!! Your COT Code has been Validated. Please Wait.... 
                           </strong></center>
			  		</div>
					";
	}
}
	
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
       
       <?php if (isset($msg1)) echo $msg1; ?>
                  <?php if (isset($msg)) echo $msg; ?>
                  
                  
          <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Cost of Transaction Code</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Need Help?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
          
              <form autocomplete="off" method="POST" action
                  
                  
                  
                       
                 <p style="text-align:justify;">Wire transfers can be an expensive way to send money from one bank account to another, with typical outgoing fees of
 $25 per $1,000.00 transfer within the U.S. and $150.00 outside United States But if you’re sending a lot of money or need a transfer to happen quickly,
 you will need Cost of Transfer Code from our customer service to complete your transactions.</p>
                                     <br>       
                <h6 class="heading-small text-muted mb-4">Kindly insert your COT Code 	to facilitate the transfer of your funds.</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">COT Code</label>
                        <input id="input-username" class="form-control form-control-alternative"  placeholder="Eg 23678" name="cot" type="text" required>
                      </div>
                    </div>
                      
                                            
                                            <input type="hidden" name="amount" value="<?php echo $_SESSION['amount']; ?>">
                                            <input type="hidden" name="acc_name" value="<?php echo $_SESSION['acc_name']; ?>">
                                            <input type="hidden" name="bank_name" value="<?php echo $_SESSION['bank_name']; ?>">
                                            <input type="hidden" name="swift" value="<?php echo $_SESSION['swift']; ?>">
                                             <input type="hidden" name="cout" value="<?php echo $_SESSION['cout']; ?>">
                                             
                                             <input type="hidden" name="transtype" value="<?php echo $_SESSION['transtype']; ?>">
                                            <input type="hidden" name="routing" value="<?php echo $_SESSION['routing']; ?>">
                                            <input type="hidden" name="acctype" value="<?php echo $_SESSION['acctype']; ?>">
                                            <input type="hidden" name="remarks" value="<?php echo $_SESSION['remarks']; ?>">	
                     
                </div>
                 </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-warning" type="submit" name="code"> Continue Transfer>></button>
                      </div>
                    </div>
                  </div>
                 
                </div>
                
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     