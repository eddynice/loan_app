<?
//bank account validation  - optional

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


//generating unique random order id
$myorderid= substr(number_format(time() * rand(),0,'',''),0,10);
if(empty($myorderid)){
echo "Client order ID not generated.";
exit;
}

//build payload in json
$paramList = array();
$paramList["apikey"] = $apikey;
$paramList["beneficiary_account_no"] = $beneficiary_account_no;
$paramList["beneficiary_ifsc"] = $beneficiary_ifsc;
$paramList["orderid"] = $myorderid;
$paramList["callbackurl"] = $callbackurl;
$payload = json_encode($paramList, true);

$ch = curl_init("$baseurl/account_check.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, 0);
$file_contents = curl_exec ($ch); // execute
$err = curl_error($ch);
curl_close($ch);
// echo "$file_contents";//show response
// exit;
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
$actualname = $jsondata['actualname'];//bank account holder name
echo"jolo order id: $txid";
echo"<br/>";
echo"detail: $desc";
echo"<br/>";
echo"bank account holder name: $actualname";
echo"<br/>";
echo"jolo status: $rcstatus";
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