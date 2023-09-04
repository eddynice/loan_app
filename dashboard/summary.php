

<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: ../login.php");
    exit();
}


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 3");
$temp->execute();
$rows = $temp->fetch(PDO::FETCH_ASSOC);

// Fetch subscription details

// $subStmt = $reg_user->runQuery("SELECT * FROM sub WHERE id=:id LIMIT 1");
// $subStmt->execute(array(":id" => $_SESSION['id']));
// $subRow = $subStmt->fetch(PDO::FETCH_ASSOC);

//array(":id" => $_SESSION['id'])


// $sql = "SELECT * FROM sub";
// $result = $this->conn->query($sql);
?>

<?php
$reg_user = new USER();
$subStmt = $reg_user->runQuery("SELECT amount,type_of_account FROM sub");
$subStmt->execute(array());
$subRow = $subStmt->fetch(PDO::FETCH_ASSOC);

while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
  $amount =$row['amount'];
  $type_of_account =$row['type_of_account'];

  echo "Email ::, $email , Firstname $amount <br>";
}

?>
   <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'mobmenu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
  
  
  
  
  
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'mainmenu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->
     
     
     



<!---start here content------>
          <div class="content-wrapper pb-0" >
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <img src="icon/8.png" height="20px" width="20px" />&nbsp;&nbsp; <a href="wire.php" style="color:brown">Cashout</a>  </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <img src="icon/4.png" height="20px" width="20px" />&nbsp;&nbsp; <a href="ticket.php" style="color:">Open Ticket</a>  </button>
                <button type="button" class="btn btn-sm ml-3 btn-warning"> <a href="profile.php" style="color:white">Profile</a> </button>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card" style="border-radius:10px; background-color:#2d4a0a;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Account Balance</p>
                            <h2 class="text-white"> <?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?> <span class="h5"></span>
                            </h2>
                          </div>
                          
                        <img src="money.png" />
                        </div>
                        <h6 class="text-white">18.33% Since <?php echo " " .$today = date("F j, Y"); ; ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card" style="border-radius:10px; background-color:#096166;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Ledger Balance</p>
                            <h2 class="text-white"> <?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?><span class="h5"></span>
                            </h2>
                          </div>
                           <img src="dollar.png" />
                        </div>
                        <h6 class="text-white">13.21% Since <?php echo " " .$today = date("F j, Y"); ; ?></h6>
                      </div>
                    </div>
                  </div>
    
 <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary" style="border-radius:10px;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Saving Status</p>
                            <h2 class="text-white"> <?php   echo "Amount  <br> NGN " . $subRow['amount'] ?> </span></h2>
                            
                          <div>  
                          <!-- <h6 class="text-white">   <?php   echo "subscription Type : " . $subRow['type_of_account'] . "<br>"; ?> </h6> -->

                      </div>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        <p class="text-white"> <span class="h3"> <?php   echo "subscription Type : "  . $subRow['type_of_account'] . "<br>"; ?> </span></p>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Transaction Statistics</h5>
                        <p class="text-muted"> Show Overview <?php echo $row['reg_date']; ?> - <?php echo " " .$today = date("F j, Y"); ; ?> <a class="text-muted font-weight-medium pl-2" href="statement.php"><u>See Details</u></a>
                        </p>
                      </div>
                      <div class="col-sm-5 text-md-right">
                        <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                          <i class="mdi mdi-email btn-icon-prepend"></i>Download Statement </button>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          
                           <div class="cardcc">
  <div class="cardcc__front cardcc__part">
    <img class="cardcc__front-square cardcc__square" src="icon/chip.png">
    <img class="cardcc__front-logo cardcc__logo" src="icon/visa.png">
    <p class="cardcc_numer">XXX<?php echo $row['cardno']; ?>-XXXX </p>
    <div class="cardcc__space-75">
      <span class="cardcc__label">card holder</span>
      <p class="cardcc__info"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></p>
    </div>
    <div class="cardcc__space-25">
      <span class="cardcc__label">Expires</span>
            <p class="cardcc__info"><?php echo $row['expmonth']; ?>/<?php echo $row['expyear']; ?></p>
    </div>
  </div>
  
  <div class="cardcc__back cardcc__part">
    <div class="cardcc__black-line"></div>
    <div class="cardcc__back-content">
      <div class="cardcc__secret">
        <p class="cardcc__secret--last"><?php echo $row['cvv']; ?></p>
      </div>
      <img class="cardcc__back-square cardcc__square" src="icon/chip.png">
      <img class="cardcc__back-logo cardcc__logo" src="icon/visa.png">
      
    </div>
  </div>
  
</div>



                    </div>
                      </div>
                      
                      <div class="col">&nbsp;</div>
                      <div class="col">
                        
       
                    
                         
                       
                       
 <div class="cardcc1" >
  <div class="cardcc1__front cardcc1__part" >
    <img class="cardcc1__front-square cardcc1__square" src="icon/chip.png">
<img class="cardcc1__front-logo cardcc1__logo"   src="../assets/img/brand/white.png" alt="logo" height="60px" />
    <p class="cardcc1_numer">A/C #: <?php echo $row['acc_no']; ?> </p>
    <div class="cardcc1__space-75">
      <span class="cardcc1__label">card holder</span>
      <p class="cardcc1__info"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></p>
    </div>
    <div class="cardcc1__space-25">
      <span class="cardcc1__label">Type</span>
            <p class="cardcc1__info" style="font-size:12px;"><?php echo $row['type']; ?></p>
    </div>
  </div>
  
  <div class="cardcc1__back cardcc1__part">
    <div class="cardcc1__black-line"></div>
    <div class="cardcc1__back-content">
      <div class="cardcc1__secret">
        <p class="cardcc1__secret--last"><?php echo $row['pin']; ?></p>
      </div>
      <img class="cardcc1__back-square cardcc1__square" src="icon/chip.png">
      <img class="cardcc1__back-logo cardcc1__logo"   src="../assets/img/brand/white.png" alt="logo" height="40px" />
      
    </div>
  </div>
  
</div>
                       
                   </div>   
                      
                      
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12">
                          <!--SAVING TYPE-->
                          
                          <h1 style="text-align:center"> APPLY FOR SAVING  </h1>
                         
             
   <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="2.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Xmas/New Year Savings</h5>
       <!--  <p class="card-text"> <a href="#">APPLY</a></p> -->
         <!-- Button to trigger the modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
         APPLY
    </button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="1.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">TARGET SAVING</h5>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
         APPLY
    </button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="3.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">REGULAR SAVING</h5>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3">
        APPLY
        </button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="4.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">FIXED SAVING</h5>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">
        APPLY
        </button>
      </div>
    </div>
  </div>
</div>   
             
             
<!--saving end                 -->
                 
<!-- TradingView Widget BEGIN -->
<!--<div class="tradingview-widget-container">-->
<!--  <div id="tradingview_119a8"></div>-->
<!--  <div class="tradingview-widget-copyright"><a href="" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>-->
<!--  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>-->
<!--  <script type="text/javascript">-->
<!--  new TradingView.MediumWidget(-->
<!--  {-->
<!--  "symbols": [-->
<!--    [-->
<!--      "Apple",-->
<!--      "AAPL"-->
<!--    ],-->
<!--    [-->
<!--      "Google",-->
<!--      "GOOGL"-->
<!--    ],-->
<!--    [-->
<!--      "Microsoft",-->
<!--      "MSFT"-->
<!--    ]-->
<!--  ],-->
<!--  "chartOnly": false,-->
<!--  "width": "100%",-->
<!--  "height": "400",-->
<!--  "locale": "en",-->
<!--  "colorTheme": "light",-->
<!--  "gridLineColor": "rgba(151, 0, 0, 1)",-->
<!--  "trendLineColor": "rgba(0, 0, 0, 1)",-->
<!--  "fontColor": "rgba(255, 255, 255, 1)",-->
<!--  "underLineColor": "rgba(180, 95, 6, 1)",-->
<!--  "isTransparent": false,-->
<!--  "autosize": false,-->
<!--  "container_id": "tradingview_119a8"-->
<!--}-->
<!--  );-->
<!--  </script>-->
<!--</div>-->
<!-- TradingView Widget END -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <p class="text-muted mb-0"> <b>Security Tips</b> <P>Change your Internet banking Password Frequently to keep your Account 
				   Safe <a href="editpass.php" class="btn btn-danger">Reset Password</a>
                        </p>
                      </div>
                      <div class="col-sm-4">
                        <p class="mb-0 text-muted">Account Number</p>
                        <h5 class="d-inline-block survey-value mb-0"><?php echo $row['acc_no']; ?> </h5>
                        <p class="d-inline-block text-danger mb-0"> <!-- <?php echo $row['type']; ?>--> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
		  
		  <!---ends here content------>
      <!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Xmas/New Year Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Content Goes Here -->
                <p>This product is targeted at saving for the yuletide season.
This product will help customers start saving for the Xmas and new year from a long time to avoid rush. The customers for this savings will get the following which will be supplied to them before the Xmas.
</p>

  <span  class="list-group-item"> 50Kg Bag of rice. </span>
  <span  class="list-group-item">5 litres of groundnut oil.</span>
  <li  class="list-group-item">1 carton of Tin tomatoes.</li>
  <li  class="list-group-item">Carton of chicken or turkey.</li>
  <li  class="list-group-item">Some Cash to buy other needed items.</li>



    <div class="container mt-4">
        <h2>Savings Calculator</h2>
        <form action="calculate.php" method="post">
            <div class="form-group">
                <label for="interval">Savings Interval:</label>
                <select class="form-control" name="interval" id="interval">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="target_amount">Target Amount:</label>
                <input type="number" class="form-control" name="target_amount" id="target_amount" value="100000" required>
            </div>
            <div class="form-group">
                <label for="time_frame">Time Frame (in days, weeks, or months):</label>
                <input type="number" class="form-control" name="time_frame" id="time_frame" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery links -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Additional buttons or actions can be added here -->
            </div>
        </div>
    </div>
</div>
<!-- emd modal -->

<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Target Savings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Content Goes Here -->
                <p>This type of savings is aimed at achieving a set target. For instance say a customer wants to buy a TV set worth 200k and wants to start saving towards it to be able to buy it in 6 months.  Such customer can open a target savings account with us to start saving towards the target. </p>

   
    <div class="container mt-4">
        <h2>Savings Calculator</h2>
        <form action="calculate.php" method="post">
          <div class="row">
          <div class="form-group col-md-6">
                <label for="interval">Savings Interval:</label>
                <select class="form-control" name="interval" id="interval">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="interval">purpose of saving:</label>
                
                <input type="text" name="purpose" class="form-control">
            </div>
          </div>
           
            <div class="form-group">
                <label for="target_amount">Target Amount:</label>
                <input type="number" class="form-control" value="200000" name="target_amount" id="target_amount" value="100000" required>
            </div>
            <div class="form-group">
                <label for="time_frame">Time Frame (in days, weeks, or months):</label>
                <input type="number" class="form-control" name="time_frame" id="time_frame" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery links -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Additional buttons or actions can be added here -->
            </div>
        </div>
    </div>
</div>
<!-- emd modal -->

<!-- Modal3 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Regular Savings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Content Goes Here -->
                <p>This class of account is for customers who just want to save. The customers determines how much she wants to be saving at intervals and for how long he or she wants to run the savings for from our savings duration plan.</p>

   
    <div class="container mt-4">
        <h2>Savings Calculator</h2>
        <form action="calculate.php" method="post">
            <div class="form-group">
                <label for="interval">Savings Interval:</label>
                <select class="form-control" name="interval" id="interval">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="target_amount">Target Amount:</label>
                <input type="number" class="form-control" name="target_amount" id="target_amount" value="100000" required>
            </div>
            <div class="form-group">
                <label for="time_frame">Time Frame (in days, weeks, or months):</label>
                <input type="number" class="form-control" name="time_frame" id="time_frame" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery links -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Additional buttons or actions can be added here -->
            </div>
        </div>
    </div>
</div>
<!-- emd modal -->
<!-- Modal4 -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Fixed savings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Content Goes Here -->
                <p>This savings type will run like the bank's fixed deposit account. The customers fixes his or her money for a particular tenor and to have access to it on maturity. We can have three types of this fixed savings.  The one where the customer gets his or her interest paid upfront (like treasury bills) or the interest gets paid monthly or the interest gets paid on maturity.</p>

   
    <div class="container mt-4">
        <h2>Savings Calculator</h2>
        <form action="calculate.php" method="post">
            <div class="form-group">
                <label for="interval">Savings Interval:</label>
                <select class="form-control" name="interval" id="interval">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="target_amount">Target Amount:</label>
                <input type="number" class="form-control" name="target_amount" id="target_amount" value="100000" required>
            </div>
            <div class="form-group">
                <label for="time_frame">Time Frame (in days, weeks, or months):</label>
                <input type="number" class="form-control" name="time_frame" id="time_frame" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery links -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Additional buttons or actions can be added here -->
            </div>
        </div>
    </div>
</div>
<!-- emd modal4 --!>
		  
		  
		       <?php include 'footercopyright.php'; ?>