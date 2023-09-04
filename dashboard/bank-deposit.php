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

$email = $row['email'];
$fname = $row['fname'];
$lname = $row['lname'];

if(isset($_POST['ticket']))

{

	$tc = rand(00000,99999);

	

	$sender_name = trim($_POST['sender_name']);
	$sender_name = strip_tags($sender_name);
	$sender_name = htmlspecialchars($sender_name);

	

	$sub = trim($_POST['subject']);
	$sub = strip_tags($sub);
	$sub = htmlspecialchars($sub);

	

	$msg = trim($_POST['msg']);
	$msg = strip_tags($msg);
	$msg = htmlspecialchars($msg);

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);
	



  class BankAccount {
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
  //  $reg_user = new USER();
  
  public function getBalance() {
    $sql = "SELECT a_bal FROM account WHERE id={$_GET['a_bal']}";
    $result = $this->conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["a_bal"];
}
// public function deposit($amount) {
//   if ($amount > 0) {
//       $currentBalance = $this->getBalance();
//       $newBalance = $currentBalance + $amount;
      
//       $sql = "UPDATE account SET a_bal = $newBalance WHERE id = 92";
//       if ($this->conn->query($sql) === TRUE) {
//           return "Deposited $" . number_format($amount, 2) . ". New balance: $" . number_format($newBalance, 2);
//       } else {
//           return "Error updating balance: " . $this->conn->error;
//       }
//   } else {
//       return "Invalid deposit amount. Please deposit a positive amount.";
//   }
// }

  //   public function getBalance($accountId) {
  //     $sql = "SELECT a_bal FROM account WHERE id = ?";
  //     $stmt = $this->conn->prepare($sql);
  //     $stmt->bind_param("i", $accountId); // "i" for integer
  //     $stmt->execute();
  //     $stmt->bind_result($balance);
  //     $stmt->fetch();
  //     $stmt->close();
  //     return $balance;
  // }
  

    

  public function deposit($amount, ) {
    if ($amount > 0) {
        $currentBalance = $this->getBalance();
        $newBalance = $currentBalance + $amount;
        $sql = "UPDATE account SET a_bal = ? WHERE id=1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("d", $newBalance);
            
        //     $sql = "UPDATE account SET a_bal = $newBalance WHERE id = 92";
        //     if ($this->conn->query($sql) === TRUE) {
        //         return "Deposited $" . number_format($amount, 2) . ". New balance: $" . number_format($newBalance, 2);
        //     } else {
        //         return "Error updating balance: " . $this->conn->error;
        //     }
        // } else {
        //     return "Invalid deposit amount. Please deposit a positive amount.";
        // }
       // $id = $_GET['balance'];

//         $sql = "UPDATE account SET a_bal = ? WHERE id = 92";
// $stmt = $this->conn->prepare($sql);
// $stmt->bind_param("d", $newBalance); // "d" for double, assuming balance is a decimal/float
if ($stmt->execute()) {
    // ...
    return "Deposited $" . number_format($amount, 2) . ". New balance: $" . number_format($newBalance, 2);
} else {
    // ...
    return "Error updating balance: " . $this->conn->error;
}
    };

  }
}
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $account = new BankAccount();
      $depositAmount = $_POST["balance"];
      $depositResult = $account->deposit($depositAmount);
  }

  
 // $account = new BankAccount();


	
	

	$tick = $reg_user->runQuery("SELECT * FROM ticket");

	

	$tick->execute();



	$show = $tick->fetch(PDO::FETCH_ASSOC);

	$date = $show['date'];

		if($reg_user->ticket($tc,$sender_name,$sub,$msg))

		{			

			$id = $reg_user->lasdID();	

			
			$message = "
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>[SUBJECT]</title>
  <style type='text/css'>
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1{
  color:#382F2E;
  margin:0;
}

div,p,ul,h1{
  margin:0;
}
p{
font-size:13px;
color:#99A1A6;
line-height:19px;
}
h2,h1{
color:#444444;
font-weight:normal;
font-size: 22px;
margin:0;
}
a.link2{
padding:15px;
font-size:13px;
text-decoration:none;
background:#2D94DF;
color:#ffffff;
border-radius:6px;
-moz-border-radius:6px;
-webkit-border-radius:6px;
}
.bgBody{
background: #f6f6f6;
}
.bgItem{
background: #2C94E0;
}

@media only screen and (max-width:480px)
		
{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}	
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}		
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		
	.font{
		font-size:15px !important;
		line-height:19px !important;
		
		}
}

</style>

<script type='colorScheme' class='swatch active'>
  {
    'name':'Default',
    'bgBody':'f6f6f6',
    'link':'ffffff',
    'color':'99A1A6',
    'bgItem':'2C94E0',
    'title':'444444'
  }
</script>

</head>
<body paddingwidth='0' paddingheight='0' bgcolor='#d1d3d4'  style=' margin-left:5px; margin-right:5px; margin-bottom:0px; margin-top:0px;padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent bgBody' align='center'  style='font-family:Helvetica, Arial,serif;'>
  
    <!-- =============================== Header ====================================== -->

  <tr>
    <td class='movableContentContainer' >
    	<div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                   <tr><td height='25'  colspan='3'></td></tr>

                     <tr>
                      <td valign='top'  colspan='3'>
                        <table width='600' border='0' bgcolor='white' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                          <tr>
                            <td align='left' valign='middle' width='200'>
                              <div class='contentEditableContainer contentImageEditable'>
                                <div class='contentEditable' >
                                 <center> <img src='https://digitalforestservers.com.ng/bankforce/assets/img/brand/blue.png' alt='' data-default='placeholder' data-max-width='120' width='118' height='50' > </center>
								  <b style='font-size:1.5em; color:#fff;'></b>
                                </div>
                              </div>
                            </td>

                            
                          </tr>
                        </table>
                      </td>
                    </tr>
                </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr><td height='25'  ></td></tr>

                        <tr>
                          <td height='290'  bgcolor='#AA2E33'>
                            <table align='center' width='600' border='0' cellspacing='0' cellpadding='0' class='MainContainer'>
  <tr>
    <td height='50'></td>
  </tr>
  <tr>
    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
								<td width='400' valign='top' class='specbundle2'>
                                  <div class='contentEditableContainer contentImageEditable'>
                                    <div class='contentEditable' >
                                      <img class='banner' src='https://digitalforestservers.com.ng/bankforce/dashboard/dollar.png' alt='featured image' data-default='placeholder' data-max-width='300' width='326' height='269' >
                                    </div>
                                  </div>
                                </td>
    <td class='specbundle3'>&nbsp;</td>
    <td width='250' valign='top' class='specbundle4'>
                                  <table width='250' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                                    <tr><td colspan='3' height='10'></td></tr>

                                    <tr>
                                      <td width='10'></td>
                                      <td width='230' valign='top'>
                                        <table width='230' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                                          <tr>
                                            <td valign='top'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  <h1 style='font-size:20px;font-weight:normal;color:#ffffff;line-height:19px;'>Dear $fname $lname,</h1>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr><td height='18'></td></tr>
                                          <tr>
                                            <td valign='top'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  <p style='font-size:13px;color:#cfeafa;line-height:19px;'>Your ticket was successfully opened! We will respond to your request within 24 hours. Below is the transaction summary.</p>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr><td height='33'></td></tr>
                                          <tr>
                                            <td>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr><td height='15'></td></tr>
                                        </table>
                                      </td>
                                      <td width='10'></td>
                                    </tr>
                                  </table>
                                </td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                          </td>
                        </tr>

                        <tr><td height='25' ></td></tr>
                </table>
        </div>
        
        
        
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td>
                      <table width='600' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                        <tr>
                          <td>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>

                              <tr>
                                <td>
                                  <table width='600' border='0' cellspacing='0' cellpadding='0' align='center' class='MainContainer'>
                                    <tr><td style='border-bottom:1px solid #DDDDDD'></td></tr>
                                  </table>
                                </td>
                              </tr>

                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
									<h3>Ticket</h3>
                                     <table style='border:1px solid black;padding:2px;' width='400'>
										<tr>
											<th style='text-align:left;'>Ticket Number</th>
											<td>$tc</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Subject</th>
											<td>$sub</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Date Opened</th>
											<td>$date</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Message</th>
											<td>$msg</td>
										</tr>
										
                                     </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                              
                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>NFCU</p>
                                    </div>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='color:#A8B0B6; font-size:13px;line-height: 15px;'>&nbsp;</p>
                                    </div>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' ></div>
                                    </div>
									<div class='contentEditableContainer contentTextEditable'>
									<div class='contentEditable' ></div>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
        </div>
    </td>
  </tr>
</table>



  </body>
  </html>";
  
			
			$subject = "Your Ticket[$tc] Has Been Opened";
						
		//	$reg_user->send_mail($email,$message,$subject);	

			
			$msg = "

					<div class='alert alert-success'>

						<button class='close' data-dismiss='alert'>&times;</button>

						<strong>Ticket Successfully Opened!</strong> ~$subject~

                     

			  		</div>

					";

		}

		else

		{

			echo "Sorry, ticket was not opened";

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
    
     <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
           
            <br><br>
             
               
<!-- MORTGAGE LOAN CALCULATOR BEGIN -->
<script type="text/javascript">
mlcalc_default_calculator = 'loan';
mlcalc_currency_code      = '';
mlcalc_amortization       = 'year_nc';
mlcalc_purchase_price     = '300,000';
mlcalc_down_payment       = '20';
mlcalc_mortgage_term      = '30';
mlcalc_interest_rate      = '4.5';
mlcalc_property_tax       = '3,000';
mlcalc_property_insurance = '1,500';
mlcalc_pmi                = '0.52'; 
mlcalc_loan_amount        = '250,000';
mlcalc_loan_term          = '15';
</script>
<script type="text/javascript">if(typeof jQuery == "undefined"){document.write(unescape("%3Cscript src='" + (document.location.protocol == 'https:' ? 'https:' : 'http:') + "//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));mlcalc_jquery_noconflict=1;};</script><div style="font-weight:normal;font-size:9px;font-family:Tahoma;padding:0;margin:0;border:0;text-align:center;background:transparent;color:#EEEEEE;width:300px;text-align:right;padding-right:10px;" id="mlcalcWidgetHolder"><script type="text/javascript">document.write(unescape("%3Cscript src='https://www.mlcalc.com/widget-wide.js' type='text/javascript'%3E%3C/script%3E"));</script><a href="" style="font-weight:normal;font-size:9px;font-family:Tahoma;color:#EEEEEE;text-decoration:none;"></a></div>
<!-- MORTGAGE LOAN CALCULATOR END -->

        
        </div>
        
        
        
       <div class="col-xl-8 order-xl-1"><br><br>
          <div class="card bg"> 
            <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Cash Deposit</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Help</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
            <form autocomplete="off" method="post" >
                        
              
              
              
               <h5 style="color:red;">Use the below Account Information to make deposit. kindly inform the customer billing department by opening a Support 
               ticket after payment stating clearing your deposit details for approval</h5>
       <hr>
       
        <h4 style="color:black;">
            
            <p> Bank Name:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bank_name; ?>
             <p> Bank Address:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bank_address; ?> 
              <p> Bank Account No:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bank_account; ?> 
               <p> Account Name:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $account_name; ?> 
                <p> Swift Code:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $swift_code; ?> 
                 <p> IBAN/Routing:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $routing_no; ?> 
        
        
        
        
        </h4>
        
        
        <?php if (isset($depositResult)) { echo $depositResult; } ?>
                 <input type="submit" name="ticket" class="btn btn-warning" value="OPEN DESPOSIT TICKET"><br>
           
                
                 <?php if(isset($msg)) echo $msg;  ?><br>
                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                         
                        <label class="form-control-label" for="input-username">Receiver (Customer Cash Desposit)</label>
                         <input id="input-username" class="form-control form-control-alternative"  placeholder="Customer Care" name="amount" type="text" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Cash Deposit Amount</label>
                        <input id="input-email" class="form-control form-control-alternative"  name="subject" placeholder="Cash Deposit amount"  type="text" required>
                        <input type="hidden" class="form-control"  name="sender_name" value="<?php echo $row['fname']; ?> " />
                      
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                         
                        <label class="form-control-label" for="input-username">Amount</label>
                         <input id="input-username" class="form-control form-control-alternative"  placeholder="Amount" name="balance" type="number" required>
                      </div>
                    </div>
                  


                    <div class="col-md-6 form-group">
                    <label class="form-control-label" for="input-email">Type of Account</label>
                            <select  name="type" class="form-control input-sm validate[required]" required>
                                <option value="Xmas">. Xmas/New Year Savings</option>
                                <option value="Target">Target saving</option>
                                <option value="Regular"> Regular Savings</option>
                                <option value="Fixed"> Fixed savings</option>
                            </select>
                        </div>
                  </div>
                  
                  
                  
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Comments</label>
                        <textarea class="form-control" name="msg" placeholder="Description " type="text" required></textarea>
                      </div>
             
                    
                </div>
                 
               
                
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     