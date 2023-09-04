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
if ($stat == 'Dormant/Inactive') {
    header('Location: summary.php?dormant');
    exit();
}
if (isset($_POST['reset-pass'])) {
    $pass = $_POST['upass1'];
    $cpass = $_POST['upass'];

    if ($cpass !== $pass) {
        $msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Passwords Doesn't match. 
						</div>";
    } else {

        //notify the user via email and sms - your password has been changed

        if (($_POST['oldpass']) == $row['upass']) {
            $timezone = date_default_timezone_get();
            date_default_timezone_set($timezone);
            $date = date('m/d/Y h:i:s a', time());
            $subject = "Password successfully changed!";
            $message = "Dear " . $row['fname'] . " your Internet banking password has been changed " . $date . " if you did't do it ,Contact customercare Immediately";
            $reg_user->send_mail($row['email'], $message, $subject);
            $phone = preg_replace('/[^0-9]/', '', $row['phone']);
            $mobile_msg = "Dear " . $row['fname'] . " your Internet banking password has been changed " . $date . " if you did't do it ,Contact customercare Immediately";
            //$reg_user->otp($phone,$mobile_msg);


            $password = ($cpass);
            $stmt = $reg_user->runQuery("UPDATE account SET upass=:upass WHERE acc_no=:acc_no");
            $stmt->execute(array(":upass" => $password, ":acc_no" => $_SESSION['acc_no']));

            $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed!
						</div>";
        } elseif (empty($pass) || empty($cpass)) {
            $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Fill out the new and confirm password!
						</div>";
        } else {
            $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Old Password doesn't match!
						</div>";
        }
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
                  <h3 class="mb-0">Change Account Password</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Help</a>
                </div>
              </div>
            </div>
            <div class="card-body">
             
              <form method="POST">
                                <div class="panel-body">
                                    <?php
                                    if (isset($msg)) {
                                        echo $msg;
                                    }
                                    ?>
                                    
                                    <div class="form-group">
                                        <label class="control-label" style="color:black;">Old Password</label>
                                        <div class="input-group date" >
                                            <input type="password" class="form-control" name="oldpass" placeholder="********" />
                                             
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="color:black;">New Password </label>
                                        <div class="input-group date" >
                                            <input type="password" class="form-control" name="upass1" placeholder="********" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="color:black;">Retype New Password </label>
                                        <div class="input-group date" >
                                            <input type="password" class="form-control" name="upass" placeholder="********" />
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" name="reset-pass" value="Update Password">
                                    </div>
                                </div>
                            </form>      
             
             <br><br><br>
             
            </div>
          </div>
        </div>
        
      </div>
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     