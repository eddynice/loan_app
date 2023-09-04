<?
//get bank detail - optional

include"setting.php";


if(isset($_POST["beneficiary_id"])){
$beneficiary_id=$_POST["beneficiary_id"];
}
if(empty($beneficiary_id)){
echo "beneficiary_id is empty.";
exit;
}

//build payload in json
$paramList = array();
$paramList["apikey"] = $apikey;
$paramList["beneficiary_id"] = $beneficiary_id;
$payload = json_encode($paramList, true);

$ch = curl_init("$baseurl/beneficiary_detail.php");
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
if(!empty($fulldata["beneficiary"])){
    $beneficiary_array = $fulldata["beneficiary"][0];
    $beneficiary_name= $beneficiary_array["beneficiary_name"];
    $beneficiary_account_no= $beneficiary_array["beneficiary_account_no"];
    $beneficiary_ifsc= $beneficiary_array["beneficiary_ifsc"];
    $beneficiary_bank= $beneficiary_array["beneficiary_bank"];
    $beneficiary_branch= $beneficiary_array["beneficiary_branch"];
    $beneficiary_status= $beneficiary_array["beneficiary_status"];
    $beneficiary_addedon= $beneficiary_array["beneficiary_addedon"];
    $beneficiary_maxlimit= $beneficiary_array["beneficiary_maxlimit"];
    }
    
echo"beneficiary ID: $beneficiary_id";
echo"<br/>";
echo"beneficiary_name: $beneficiary_name";
echo"<br/>";
echo"beneficiary_account_no: $beneficiary_account_no";
echo"<br/>";
echo"beneficiary_ifsc:  $beneficiary_ifsc";
echo"<br/>";
echo"beneficiary_bank: $beneficiary_bank";
echo"<br/>";
echo"beneficiary_branch: $beneficiary_branch";
echo"<br/>";
echo"beneficiary_status: $beneficiary_status";
echo"<br/>";
echo"beneficiary_maxlimit: $beneficiary_maxlimit";
echo"<br/>";
echo"beneficiary_addedon: $beneficiary_addedon";
}

if($rcstatus=='FAILED'){
//show error 
echo"ERROR MESSAGE: $errormsg";
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