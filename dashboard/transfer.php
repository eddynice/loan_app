<?
	header("Location: transferactivationcode.php");
//Send money

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

?>

<html>
<h2>--</h2>
<div style="float:left;"><a href="index.php"><i>Go Back</i></a>


</html>