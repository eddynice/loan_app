<?php
// Assuming you have established a PDO database connection
$db = new PDO("mysql:host=localhost;dbname=payhub", "root", "");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM account WHERE id = :id");
    $stmt->bindParam(":id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Display user details
        echo "User ID: " . $user['id'] . "<br>";
        echo "Name: " . $user['fname'] . "<br>";
        // Display other details...
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid user ID.";
}
?>
<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
$user_home = new USER();

$stmt = $user_home->runQuery("SELECT * FROM account WHERE verify ='Y' ORDER BY id DESC LIMIT 200");
$stmt->execute();

?>


 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
     
     
  
   
        <div class="container-fluid mt--7">
      
      
      
      
      
      
      
      <div class="row">
         
         <div class="col-xl-8 order-xl-1">
           <d <div class="col-xl-8 order-xl-1"><br><br>
           <div class="card bg"> 
             <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
               <div class="row align-items-center">
                 <div class="col-8">
                   <h3 class="mb-0">Customer Profile</h3>
                 </div>
                 <div class="col-4 text-right">
                   <a href="ticket.php" class="btn btn-warning">Help</a>
                 </div>
               </div>
             </div>
             <div class="card-body">
               <form>
                 <h6 class="heading-small text-muted mb-4">User information</h6>
                 <div class="pl-lg-4">
                     <center><img class="nav-profile-img mr-2" alt="" src="uploads/<?php echo $user['passport']; ?>" alt="photo"  style="width:100px; height:100px; border-radius:60px;"/></center>
                  <hr>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-username">Username</label>
                         <input type="text" id="input-username" class="form-control form-control-alternative"  value="<?php echo $user['uname']; ?>">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-email">Email address</label>
                         <input type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $user['email']; ?>">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">First name</label>
                         <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="<?php echo$user['fname']; ?> ">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Last name</label>
                         <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $row['lname']; ?>">
                       </div>
                     </div>
                   </div>
                    <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">Work/Employment</label>
                         <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="<?php echo $user['work']; ?> ">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Mobile Number</label>
                         <input type="text" id="input-last-name" class="form-control form-control-alternative" value="<?php echo $user['phone']; ?>">
                       </div>
                     </div>
                   </div>
                   
                      <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">Gender</label>
                         <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="<?php echo $user['sex']; ?> ">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Marital Status</label>
                         <input type="text" id="input-last-name" class="form-control form-control-alternative"  value="<?php echo $user['marry']; ?>">
                       </div>
                     </div>
                   </div>
                 </div>
                 <hr class="my-4" />
                 <!-- Address -->
                 <h6 class="heading-small text-muted mb-4">Contact information</h6>
                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                         <label class="form-control-label" for="input-address">Contact Address</label>
                         <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $user['addr']; ?>" type="text">
                       </div>
                     </div>
                   </div>
                  
                 </div>
                 
               </form>
             </div>
           </div>
         </div>
       </div>
    
       <?php include 'foot.php'; ?>