<?
//transfer status check manually optional

include"setting.php";


if(isset($_POST["orderid"])){
$orderid=$_POST["orderid"];
}
if(empty($orderid)){
echo "Orderid is empty.";
exit;
}

if(isset($_POST["customdate"])){
$customdate=$_POST["customdate"];
}
if(empty($customdate)){
echo "Custom Date is empty.";
exit;
}

//convert date into desired format
$arraydatez = explode("-",$customdate);
$selected_day = $arraydatez[0];
$selected_month = $arraydatez[1];
$selected_year = $arraydatez[2];
//build customdate
$customdate=$selected_year.$selected_month.$selected_day;

//build payload in json
$paramList = array();
$paramList["apikey"] = $apikey;
$paramList["orderid"] = $orderid;
$paramList["customdate"] = $customdate;
$payload = json_encode($paramList, true);

$ch = curl_init("$baseurl/transfer_status.php");
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
$fulldata = $jsondata['fulldata'];//array
if(!empty($fulldata["transaction"])){
    $transaction_array = $fulldata["transaction"][0];
    $transaction_txid= $transaction_array["transaction_txid"];
    $transaction_orderid= $transaction_array["transaction_orderid"];
    $transaction_mobileno= $transaction_array["transaction_mobileno"];
    $transaction_amount= $transaction_array["transaction_amount"];
    $transaction_operatorid= $transaction_array["transaction_operatorid"];
    $transaction_beneficiary_id= $transaction_array["transaction_beneficiary_id"];
    $transaction_status= $transaction_array["transaction_status"];
    $transaction_desc= $transaction_array["transaction_desc"];
    }

echo"jolo order id: $transaction_txid";
echo"<br/>";
echo"client order id: $transaction_orderid";
echo"<br/>";
echo"jolo status: $transaction_status";
echo"<br/>";
echo"customer mobile: $transaction_mobileno";
echo"<br/>";
echo"amount: $transaction_amount";
echo"<br/>";
echo"bank imps rrn/utr: $transaction_operatorid";
echo"<br/>";
echo"beneficiary ID: $transaction_beneficiary_id";
echo"<br/>";
echo"detail: $transaction_desc";
}

if($rcstatus=='FAILED'){
//show error 
//DO NOT CONSIDER TRANSACTION STATUS AS FAILED HERE..
//CONSIDER ONLY "$transaction_status" TO set SUCCESS/FAILED
echo"ERROR MESSAGE: $errormsg";
echo"<br/>";
echo"TRANSACTION status: $transaction_status";
}

if($rcstatus=='PENDING'){
//run this api again
echo"No api response or timeout. Status: $rcstatus";
}

?>

<html>
<h2>--</h2>
<div style="float:left;"><a href="index.php"><i>Go Back</i></a>


</html>