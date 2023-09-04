<?
include"setting.php";

//get incoming jolo server ip
$joloserverip = $_SERVER['REMOTE_ADDR'];
if($joloserverip!='13.126.208.28'){
echo "Access denied.";
exit;    
}

if(isset($_POST["status"])){
$status=$_POST["status"];
}else{
$status="";
}
if(empty($status)){
echo "$status is empty.";
exit;
}


if(isset($_POST["operatortxnid"])){
$operatortxnid=$_POST["operatortxnid"];
}else{
$operatortxnid="";
}

if(isset($_POST["joloorderid"])){
$joloorderid=$_POST["joloorderid"];
}else{
$joloorderid="";
}
if(empty($joloorderid)){
echo "$joloorderid is empty.";
exit;
}

if(isset($_POST["userorderid"])){
$userorderid=$_POST["userorderid"];
}else{
$userorderid="";
}
if(empty($userorderid)){
echo "$userorderid is empty.";
exit;
}

if($status=='FAILED'){
if(isset($_POST["error"])){
$error=$_POST["error"];
}else{
$error="0";
}
}


//insert in database as logs only here

//update existing transaction status as per call back here by matching orderid (client id - $userorderid)

//IMPORTANT.. 
//we may send multiple hits for same order id, please make sure to check existing status of transaction in your database whether its already failed or success. 
//If status is FAILED in your database already then no action required, do not update anything and skip it. 
//If existing status is SUCCESS in your database then action is required to either update bank imps rrn - $operatortxnid if callback status is SUCCESS. If callback status is FAILED then refund to your customer & change status from SUCCESS -> FAILED or refunded as per your existing system model.

?>