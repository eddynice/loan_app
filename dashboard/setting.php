<?
session_start();

$baseurl ="http://13.127.227.22/freeunlimited/v3"; //LIVE 
//$baseurl ="http://13.127.227.22/freeunlimited/v3/demo"; //DEMO

$apikey="469173484560146"; //JOLOSOFT api key
$callbackurl="http://yourwebsite.com/callback/capture_callback.php";//CALL BACK URL OF your server

if(empty($baseurl)){
 echo "kindly enter base url in setting.php";
 exit;
}

if(empty($apikey)){
 echo "kindly enter api key in setting.php";  
  exit;
}

if(empty($callbackurl)){
 echo "kindly enter callback url in setting.php";  
  exit;
}

?>