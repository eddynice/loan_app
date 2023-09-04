<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>  <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>  Customer Dashboard <?php echo $site_title; ?>   - Credit Cards, Banking, Loans and Mobile Payments</title>
      <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="stylesheet" href="../assetsdash/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../assetsdash/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="../assetsdash/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assetsdash/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="../assetsdash/css/style.css" />
     <link href="../assets/img/brand/favicon.ico" rel="icon" type="image/png">
     
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 80px;
  height: 80px;
  margin: -76px 0 0 -76px;
  border: 10px solid <?php echo $page_loader; ?>;
  border-radius: 50%;
  border-top: 10px solid black;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>



<style>


.cardcc{
width: 300px;
height: 190px;
  -webkit-perspective: 28%;
  -moz-perspective: 250px;
  perspective:300px;
  
}

.cardcc__part{
  box-shadow: 1px 1px #aaa3a3;
    top: 0;
  position: absolute;
z-index: 1000;
  left: 0;
  display: inline-block;
    width: 300px;
    height: 190px;c background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-color: #0c8a80;
    border-radius: 8px;
   
    -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
}

.cardcc__front{
  padding: 18px;
-webkit-transform: rotateY(0);
-moz-transform: rotateY(0);
}

.cardcc__back {
  padding: 18px 0;
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
}

.cardcc__black-line {
    margin-top: 5px;
    height: 38px;
    background-color: #303030;
}

.cardcc__logo {
    height: 16px;
}

.cardcc__front-logo{
      position: absolute;
    top: 18px;
    right: 18px;
}
.cardcc__square {
    border-radius: 5px;
    height: 30px;
}

.cardcc_numer {
    display: block;
    width: 100%;
    word-spacing: 4px;
    font-size: 20px;
    letter-spacing: 2px;
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 20px;
}

.cardcc__space-75 {
    width: 75%;
    float: left;
}

.cardcc__space-25 {
    width: 25%;
    float: left;
}

.cardcc__label {
    font-size: 10px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.8);
    letter-spacing: 1px;
}

.cardcc__info {
    margin-bottom: 0;
    margin-top: 5px;
    font-size: 16px;
    line-height: 18px;
    color: #fff;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.cardcc__back-content {
    padding: 15px 15px 0;
}
.cardcc__secret--last {
    color: #303030;
    text-align: right;
    margin: 0;
    font-size: 14px;
}

.cardcc__secret {
    padding: 5px 12px;
    background-color: #fff;
    position:relative;
}

.cardcc__secret:before{
  content:'';
  position: absolute;
top: -3px;
left: -3px;
height: calc(100% + 6px);
width: calc(100% - 42px);
border-radius: 4px;
  background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
}

.cardcc__back-logo {
    position: absolute;
    bottom: 15px;
    right: 15px;
}

.cardcc__back-square {
    position: absolute;
    bottom: 15px;
    left: 15px;
}

.cardcc:hover .cardcc__front {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);

}

.cardcc:hover .cardcc__back {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
}
</style>
 






<style>
 

.cardcc1{
width: 320px;
height: 190px;
  -webkit-perspective: 98%;
  -moz-perspective: 600px;
  perspective:600px;
  
}

.cardcc1__part{
  box-shadow: 1px 1px #aaa3a3;
    top: 0;
  position: absolute;
z-index: 1000;
  left: 0;
  display: inline-block;
    width: 320px;
    height: 190px;c background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-color: #044717;
    border-radius: 8px;
   
    -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
}

.cardcc1__front{
  padding: 18px;
-webkit-transform: rotateY(0);
-moz-transform: rotateY(0);
}

.cardcc1__back {
  padding: 18px 0;
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
}

.cardcc1__black-line {
    margin-top: 5px;
    height: 38px;
    background-color: #303030;
}

.cardcc1__logo {
    height: 16px;
}

.cardcc1__front-logo{
      position: absolute;
    top: 18px;
    right: 18px;
}
.cardcc1__square {
    border-radius: 5px;
    height: 30px;
}

.cardcc1_numer {
    display: block;
    width: 100%;
    word-spacing: 4px;
    font-size: 20px;
    letter-spacing: 2px;
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 20px;
}

.cardcc1__space-75 {
    width: 75%;
    float: left;
}

.cardcc1__space-25 {
    width: 25%;
    float: left;
}

.cardcc1__label {
    font-size: 10px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.8);
    letter-spacing: 1px;
}

.cardcc1__info {
    margin-bottom: 0;
    margin-top: 5px;
    font-size: 16px;
    line-height: 18px;
    color: #fff;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.cardcc1__back-content {
    padding: 15px 15px 0;
}
.cardcc1__secret--last {
    color: #303030;
    text-align: right;
    margin: 0;
    font-size: 14px;
}

.cardcc1__secret {
    padding: 5px 12px;
    background-color: #fff;
    position:relative;
}

.cardcc1__secret:before{
  content:'';
  position: absolute;
top: -3px;
left: -3px;
height: calc(100% + 6px);
width: calc(100% - 42px);
border-radius: 4px;
  background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
}

.cardcc1__back-logo {
    position: absolute;
    bottom: 15px;
    right: 15px;
}

.cardcc1__back-square {
    position: absolute;
    bottom: 15px;
    left: 15px;
}

.cardcc1:hover .cardcc1__front {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);

}

.cardcc1:hover .cardcc1__back {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
}
</style>
 



  </head>
  <body onload="myFunction()" style="margin:0;"  >
      
      <div id="loader"></div>