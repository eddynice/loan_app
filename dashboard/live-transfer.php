<?php
session_start();
include_once ('session.php');
include"setting.php";
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
}

$stat = $row['status'];
if($stat == 'ON HOLD'){
	header('Location: summary.php?hold');
	exit();
}


		  
 // Must include this
 
  $conn = mysqli_connect($hostname_dbconnect, $username_dbconnect, $password_dbconnect, $database_dbconnect);
                                                    
            // Check connection
            
            if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
            }

if(isset($_POST['save'])){
		
$beneficiary_account_no = $_POST['beneficiary_account_no'];
$beneficiary_ifsc = $_POST['beneficiary_ifsc'];
$amount = $_POST['amount'];


 
$check = mysql_query("SELECT * FROM live_transfer WHERE beneficiary_account_no='$beneficiary_account_no' ") or die(mysql_error());//looking through existing usernames
   
    $num = mysql_num_rows($check);

    if ($num == 0){ //If there is already such username...

$sql = mysql_query("INSERT into live_transfer (beneficiary_account_no,beneficiary_ifsc,amount) VALUES('$beneficiary_account_no','$beneficiary_ifsc','$amount')") or die(mysql_error());


	
	
header("Location: cot.php");	
include"setting.php";

if(isset($_POST["beneficiary_account_no"])){
$beneficiary_account_no=$_POST["beneficiary_account_no"];
}
if(empty($beneficiary_account_no)){
echo "beneficiary_account_no is empty.";
exit;
}
if(isset($_POST["beneficiary_ifsc"])){
$beneficiary_ifsc=$_POST["beneficiary_ifsc"];
}
if(empty($beneficiary_ifsc)){
echo "beneficiary_ifsc is empty.";
exit;
}
if(isset($_POST["amount"])){
$amount=$_POST["amount"];
}
if(empty($amount)){
echo "Amount is empty.";
exit;
}
if(isset($_POST["purpose"])){
$purpose=$_POST["purpose"];
}
if(empty($purpose)){
echo "purpose is empty.";
exit;
}
if(isset($_POST["remarks"])){
$remarks=$_POST["remarks"];
}
if(isset($_POST["mobileno"])){
$mobileno=$_POST["mobileno"];
}

//generating unique random order id
$myorderid= substr(number_format(time() * rand(),0,'',''),0,10);
if(empty($myorderid)){
echo "Client order ID not generated.";
exit;
}


//build payload in json
$paramList = array();
$paramList["apikey"] = $apikey;
$paramList["mobileno"] = $mobileno;
$paramList["beneficiary_account_no"] = $beneficiary_account_no;
$paramList["beneficiary_ifsc"] = $beneficiary_ifsc;
$paramList["amount"] = $amount;
$paramList["orderid"] = $myorderid;
$paramList["purpose"] = $purpose;
$paramList["remarks"] = $remarks;
$paramList["callbackurl"] = $callbackurl;
$payload = json_encode($paramList, true);

$ch = curl_init("$baseurl/transfer.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, 0);
$file_contents = curl_exec ($ch); // execute
$err = curl_error($ch);
curl_close($ch);

exit;
if(!empty($file_contents)){
$jsondata = json_decode($file_contents, true);
$rcstatus = $jsondata['status'];
$errormsg = $jsondata['error'];
}else{
 //handle empty or timeout
 //set status as PENDING at your end
 $rcstatus="PENDING";
}

if($rcstatus=='ACCEPTED' || $rcstatus=='SUCCESS'){
//COLLECT MORE PARAMETERS HERE
$txid = $jsondata['txid'];//jolo order id
$desc = $jsondata['desc'];
$beneficiaryid = $jsondata['beneficiaryid'];
echo"jolo order id: $txid";
echo"<br/>";
echo"detail: $desc";
echo"<br/>";
echo"jolo status: $rcstatus";
echo"<br/>";
echo"beneficiaryid: $beneficiaryid";
}

if($rcstatus=='FAILED'){
//show error    
echo"$errormsg";
echo"<br/>";
echo"jolo status: $rcstatus";
}

if($rcstatus=='PENDING'){
//check status using "Transfer money status API" after 24hrs only
echo"No api response or timeout. Status: $rcstatus";
}
	
	

	}

else {
	$msg = "
		      <div class='alert alert-danger'>
		      
		      <script type='text/javascript'>
							<!--
							function Redirect() {
							window.location='cot.php';
							}
							document.write ('');
							setTimeout('Redirect()', 9000);
							//-->
							</script>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!  You have a Pending Transaction on A/C: $beneficiary_account_no</strong> 
			  </div>
			  ";


}
    
}

          
          
   
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
          <div class="card bg"> 
            <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">International Transfer</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Help</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
                 
                          
            <form autocomplete="off" method="post" name="mobileform" action="live-transfer.php">
          
          
          
          
          
          
           <?php if (isset($msg1)) echo $msg1; ?> 
    <?php if (isset($msg)) echo $msg; ?> 
  
                <h6 class="heading-small text-muted mb-4">Compulsory Transfer Form</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Amount (<?php echo $row['currency']; ?>)</label>
                        <input id="input-username" class="form-control form-control-alternative"  placeholder="Eg 23678" name="" type="number"  required>
                         <input id="input-username" class="form-control form-control-alternative"  type="hidden" name="amount" value="2" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Beneficiary Account Number</label>
                        <input id="beneficiary_account_no"  class="form-control form-control-alternative" placeholder="Beneficiary Name" name="beneficiary_account_no"  type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Bank IFSC CODE:</label>
                        <input type="text" id="beneficiary_ifsc" class="form-control form-control-alternative"   placeholder="Bank IFSC CODE" name="beneficiary_ifsc" type="test" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Bank Name</label>
                        <input id="input-last-name" class="form-control form-control-alternative" placeholder="Bank Name"  name="mobileno" type="text" required>
                        
                      </div>
                    </div> 
                  </div>
    
                      
               
                  
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Naration/Purpose</label>
                        
               
                        <select name="purpose" class="form-control" id="purpose" required>
<option value="">Choose Purpose</option>
<option value='SALARY_DISBURSEMENT'>DISBURSEMENT</option> 
<option value='OTHERS'>OTHERS</option>
</select>
                        
                        
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Select Account Type</label>
                        <select class="form-control form-control-alternative" name="remarks" required >
                                        <option value="">Select Account Type</option>
                                        <option value="Savings">Savings Account</option>
                                        <option value="Current">Current Account</option> 
                        </select>    
                      </div>
                    </div>
                  </div>
                  
                    
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Account Owner Authorization</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-warning" type="submit" name="save"> Make Transfer>></button>
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
      
     