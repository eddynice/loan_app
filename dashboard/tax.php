<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");
exit(); 
}

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$stat = $row['status'];
if($stat == 'DORMANT/INACTIVE'){
	header('Location: summary.php?dormant');
	exit();
}$stat = $row['status'];
if($stat == 'ON HOLD'){
	header('Location: summary.php?hold');
	exit();
}
if(isset($_POST['code'])){
	$tax = $row['tax'];
	$sub = $_POST['tax'];
	if($sub !== $tax){
		 
	     $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry! </strong>Invalid TAX/VAT Code
			  </div>
			  ";
	    
	
	}
	else {
	    
	    
	   $msg1 = "
					<div class='alert alert-success'>
					
					<script type='text/javascript'>
							<!--
							function Redirect() {
							window.location='wire-preview.php';
							}
							document.write ('');
							setTimeout('Redirect()', 15000);
							//-->
							</script>
							
					<center><img src='loading.gif' width='180px' /></center>
					
					<center>	<strong style='color:black;'>Your Tax Payer ID has been Verified!!!  Wait a moment Please...... 
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
                  <h3 class="mb-0">TAX/VAT Request</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Need Help?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
         <form autocomplete="off" method="POST" action=""  enctype="multipart/form-data" >
                       	  
                       	 
                       	 <p style="text-align:justify;">A tax is a compulsory financial charge or some other type of levy imposed on a taxpayer (an individual or legal entity) by a
                       	 governmental organization in order to fund government spending and various public expenditures. A failure to pay, along with 
                       	 evasion of or resistance to taxation, is punishable by law </p>  
                       	 
                       	 
                <h6 class="heading-small text-muted mb-4">Kindly enter your TAX Code to Complete Your Transfer.</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">TAX Code</label>
                        <input id="input-username" class="form-control form-control-alternative"  placeholder="Eg 23678" name="tax" type="text" required>
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
                         <button class="btn btn-warning" type="submit" name="code"> Verify TAX Code>></button>
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
      
     