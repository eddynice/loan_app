<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

$reg_user = new USER();
?>


 <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
     
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'reg-menu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->

     
     
     
  
    <div class="container-fluid mt--7" >
     <!-- Table -->
      <div class="row" >
        <div class="col" >
          <div class="card shadow"  >
            <div class="card-header border-0">
                <img style="width: 250px;" src="../assets/img/brand/blue.png" alt="LOGO" data-default="placeholder" data-max-width="100" width="16%"></br><br>
              <h3 class="mb-0"><a href=""   class="btn btn-danger">Payhub Application</a></h3>
            </div>
           
           
           
           <form role="form" style="width:88%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
              
		
		 <div class="banner-text">
              <h1 id="intro" class="h2 text-black">WELCOME TO PAY HUB</h1>
              <!-- <p>Get more with <?php echo $site_title; ?></p> -->
              <fieldset class="radio-wpr">
                <legend><span class="roboto-medium">OPEN AN ACCOUNT TODAY!!!</span></legend> <br>
                <input type="radio" id="small-business-eaccount-1" name="open-account" value="" >
				<label for="small-business-eaccount-1">  <?php echo $site_title; ?> SAVING</label>
<hr>
                <input type="radio" id="small-business-account-1" name="open-account" value="">
				<label for="small-business-account-1">  <?php echo $site_title; ?> LOAN</label> 
              </fieldset>
              <hr>
                <input type="radio" id="small-business-account-1" name="open-account" value="">
				<label for="small-business-account-1">  <?php echo $site_title; ?> POS</label> 
              </fieldset>
		<br> <br>
			<button id="btn1" class="btn btn-success"><a href="applyonline2.php" style="color:white;">Get Started Now</a></button>
			&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	<button id="btn1" class="btn btn-danger"><a href="../login.php" style="color:white;">Back to Login</a></button>
			
			<br><br>
		  </div>
	 
            
            </div>


  
            

            </form>
             
 
        
          </div>
        </div>
      </div>
     
 
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
                        
