<?php session_start();
include_once ('../include/session.php');
require_once ('../include/class.user.php');
if(!isset($_SESSION['acc_no'])){
header("Location: login.php");
exit();
}
$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

include_once ('counter.php');?>
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
        
        
        
        
        
        
        
        
        
       <div class="col-xl-8 order-xl-1"><br><br>
          <div class="card bg"> 
            <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">MyBank Card</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="cardapply.php" class="btn btn-warning">No Card Yet? Apply</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
              
              
              
              
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: ;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}


a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
















<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="">
      
        

          <div class="col-50">
            
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" value="<?php echo $row['fname']; ?>&nbsp;&nbsp;<?php echo $row['lname']; ?> " readonly>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" value="XXX<?php echo $row['cardno']; ?>-XXXX " readonly>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" value="<?php echo $row['expmonth']; ?> " readonly>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" value="<?php echo $row['expyear']; ?> " readonly>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" value="<?php echo $row['cvv']; ?> " readonly>
              </div>
            </div>
             <div class="row">
              <div class="col-50">
                <label for="expyear">Card PIN</label>
                <input type="password" id="expyear" name="expyear" value="<?php echo $row['cardpin']; ?> " readonly>
              </div>
              <div class="col-50">
                <label for="cvv">Card Balance</label>
                <input type="text" id="cvv" name="cvv" value="<?php echo $row['cardba']; ?> " readonly>
              </div>
            </div>
          </div>
          
        </div>
     

      </form>
    </div>
  </div>
  
</div>

              
              
              
              
              
              
              
              
              
              
              
              
              
           
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     