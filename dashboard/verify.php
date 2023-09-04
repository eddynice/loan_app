
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
        
        
        <img src="icon/imf.jpg" width="300"  />




        
        </div>
        
        
        
       <div class="col-xl-8 order-xl-1"><br><br>
          <div class="card bg"> 
           <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Verfy Your Account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Need Help?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
       <h4 style="padding-top: 30px; color:green;">ERROR! You need an IMF CODE to proceed<br> with this transaction, contact customer care or your<br> account manager for support.</h4>

</div>
</div>
  </div>
  
</div>

              
              
              
              
              
              
              
              
              
              
              
              
              
           
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     



