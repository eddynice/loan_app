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
           
           
           
           <form role="form" style="width:98%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
              
		 <textarea name="terms" rows="12" readonly="readonly" cols="55" style="width: 98%;" autocomplete="off" >
				     
				     
				     <?php echo $site_title; ?> TERMS AND CONDITIONS 

VIEW ONLINE CONDITIONS.

Before you can start using our online service you must agree to be bound by the conditions below.  You must read the conditions before you 
decide whether to accept them.  If you agree to be bound by these conditions, please click the I accept button below.  If you click on the
Decline button, you will not be able to continue your registration for our online services. We strongly recommend that you print a copy of 
these conditions for your reference.

1. DEFINITIONS.
In these conditions the following words have the following meanings.

- ACCOUNT  any account which you hold and access via our online service.

- ADDITIONAL SECURITY DETAILS  the additional information you give us to
 help us identify you including the additional security question you 
provide yourself.

- IDENTITY DETAILS  the access code we may provide you with.

- <?php echo $site_title; ?> ACCOUNT NUMBER, PASSWORD and ACCOUNT PIN   you choose to identify 
yourself when you use our online service.

- WE, US and OUR  mean <?php echo $site_title; ?>, registered address <?php echo $site_address; ?>

- YOU, YOUR and YOURSELF  refer to the person who has entered into this 
agreement with us.

2. USING THE ONLINE SERVICE.

a. These conditions apply to your use of our online service and in relation to any accounts.  They explain the relationship between you and
 us in relation to our online service.  You should read these conditions carefully to understand how these services work and your and our rights
 and duties under them.  If there is a conflict between these conditions and your account conditions, these conditions will apply.  This means 
that, when you use our online service both sets of conditions will apply unless they contradict each other in which case, the relevant condition
 in these conditions apply.

b. If any of your accounts is a joint account, these conditions apply to all of you together and any of you separately.  If more than one of you
 uses our online service you must each choose your own username, password and additional security details.

c. By registering to use our online service, you accept these conditions and agree that we may communicate with you by e-mail or through our website.

d. When you use our online service you must follow the instructions we give you from time to time.  You are responsible for ensuring that your 
computer, software and other equipment are capable of being used with our online service.

e. Our online sites are secure.  Disconnection from the Internet or leaving these sites will not automatically log you off.  You must always
 use the log off facility when you are finished and never leave your machine unattended while you are logged in.  As a security measure, if 
you have not used the sites for more than a specified period of time we will ask you to log in again. 

3. WHAT RULES APPLY TO SECURITY?

a. As part of the registration for our online service you must provide us with identity details before we will allow you to use the services 
for the first time.  You must enter your identity details immediately after signing in, so we can identify you.

b. Every time you use our online service you must give us your username, your password and the answer to an additional security question.

c. You can change your username or password online by following the instructions on the screen.  

d. For administration or security reasons, we can require you to choose a new username or change your password before you use (or carry on using)
 our online service.

e. You must not write down, store (whether encrypted or otherwise) on your computer or let anyone else know your password, identity details or
 additional security details, and the fact that they are for use with your accounts.

f. If you think that someone else knows your password or any of your additional security details or has used any of them to use our online 
service, you must do the following:

- For your password, change it online as soon as possible.  If you have difficulty changing your password, you must phone us on +41 22 539 11 13
 immediately.  You can give us your username if you phone to change your password.

- For your additional security details, you will need to phone us immediately to change your additional security details.

g. We may give the police or any prosecuting authority any information they need if we think it will help them find out if someone else is 
using your username, password or any of your additional security details.

h. We may also keep any e-mails sent to or from us.  We do this to check what was written and also to help train our staff.

i. If we think that:

- someone else is trying to use our service for your accounts;

- the wrong username, password or any of your additional security 
details have has been used for your account;

- you or someone else is using our online service illegally;

- you are not keeping to these conditions or the conditions of any of 
your accounts; or 

- your username, password  or any of your additional security details 
might be known or used by someone else,

we can stop you (or someone else) using our online service.  We will tell you as soon as possible if we do this.

j. We may require you to provide one or more of the additional security details and/or enter your password again before we accept instructions 
about your account.

k. You must not tell anyone your password or additional security details.  You can give the Helpdesk your username if you need help to 
change your password or need to report that someone else knows your password, username or additional security details.

l. For your protection, we occasionally check requests to move or transfer money. Therefore, some transactions may be subject to a delay 
of up to 24 hours whilst these checks are carried out.

4. WHAT IS THE EXTENT OF YOUR LIABILITY?

a. If you are a victim of online fraud, we guarantee that you wont lose any money on your accounts and will always be reimbursed in full.

b. Unless you are a victim of fraud you are responsible for all instructions and other information sent using your username, password or
 additional security details.

c. You will not be held responsible for any instructions or information sent after you have told us that someone knows your password or 
additional security details and has used any of them to access our online service.

d. <?php echo $site_title; ?> do not accept responsibility for any loss you or anybody else may suffer because any instructions or information you sent us are sent in 
error, fail to reach us or are distorted unless you have been the victim of fraud.

e. <?php echo $site_title; ?> do not accept responsibility for any loss you or anybody else may suffer because any instructions or information we send you fail to reach
 you or are distorted unless you have been the victim of fraud.

5. HOW WE CAN CHANGE THESE CONDITIONS

a. <?php echo $site_title; ?> change these conditions for any reason by giving you written notice or publishing the change on our website.

b. We may send all written notices to you at the last e-mail address you gave us.  You must let us know immediately if you change your e-mail 
address (you can do so online), to make sure that we have your current e-mail address at all times.

6. GENERAL

<?php echo $site_title; ?> service is available to you if you are 18 years of age or over.
</textarea>
<br><br>

<a href="applyonline.php" style="color:yellow;" class="btn btn-success" >Decline </a>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
<a href="applicationform.php"  style="color:white;" class="btn btn-danger"  >I Accept </a>
	 <br><br>
		  </div>
	 
            
            </div>


  
            

            </form>
             
 
        
          </div>
        </div>
      </div>
     
 
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
                        
