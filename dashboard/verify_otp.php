<?php
session_start();
include_once ('../include/session.php'); 
require_once '../include/class.user.php'; 


if (!isset($_SESSION['acc_no'])) {
	
header("Location: login");
exit(); 
}
;

 $reg_user = new USER();

                        $acc_no = $_SESSION['acc_no'];
                        $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if (isset($_POST['otp'])) {
                            if ($_POST['otp'] === $row['tmp_otp']) {
                                $queri = " UPDATE account SET verify_otp = '1' WHERE acc_no ='$acc_no'";
                                $resulti = mysqli_query($connection, $queri) or die(mysqli_error($connection));
								
								$msg1 = "
					<div class='alert alert-success'>
					
					<script type='text/javascript'>
							<!--
							function Redirect() {
							window.location='summary.php';
							}
							document.write ('');
							setTimeout('Redirect()', 6000);
							//-->
							</script>
							
					<center><img src='loading.gif' width='180px'  /></center>
					
                    
					<center>	<strong style='color:black;'>Verified, Fetching Your Banking Dashboard..
                           </strong></center>
			  		</div>
					";
                            } else {
                                echo "<p style='text-decoration:bold;'>Oops!! you have entered a wrong otp code.</p>";
                            }
                        }
	
?>
 
<!DOCTYPE html>
<html class="no-js" style="height: 100%;" lang="">
<head><meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <meta charset="utf-8">
  <title> Account Login Authentication | <?php echo $site_title; ?> </title>
  <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link href="../assets/img/brand/favicon.ico" rel="icon" type="image/png">
<link rel="apple-touch-icon-precomposed" href="">
<meta name="msapplication-TileImage" content="">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link href="../assets/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/bootstrap.js"></script>
<script src="../assets/jquery-1.js"></script>
<link href="../assets/css.css" rel="stylesheet"> 
<!------ Include the above in your HEAD tag ---------->
<style>
  body {
    font-family: 'Nunito', sans-serif;
    font-size: 14px;
    line-height: 1.28571429;
    color: 
    #000;
}  
   body { 
  background-image:url('../assets/bannerfront.jpg') ; no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
}

.panel-default {
    opacity: 0.9;
    margin-top: 70px;
}

.btn-sm, .btn-xs {
    padding: 5px 40%;
    font-size: 15px;
    line-height: 1.5;
    border-radius: 3px;
}

.form-group.last { margin-bottom:0px; } 
    
.btn-success {
    color: 
#fff;
background-color:
navy;
border-color:
    navy;
}
 .alert-danger {

    color: #fff;
    background-color: #e30909;
    border-color: #eed3d7;

}
</style> </head>




<body style="position: relative; min-height: 100%; top: 0px;"><div class="container">
    <div class="row">
        
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                
                
                <form>
<input style="background-color: <?php echo $tab; ?>; color:<?php echo $tab_font; ?>;" class="MyButton" type="button" value="Logout" onclick="window.location.href='logout'" />
</form>


               <center><img style="width: 250px;" src="../assets/img/brand/blue.png" alt="LOGO" data-default="placeholder" data-max-width="100" width="16%"></center> <br>
                <div style="background-color: <?php echo $tab; ?>;" class="panel-heading">
                    	</div><br><center> 
                    	
                    	
                    	<!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic" class="gflag nturl" style="background-position:-100px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Arabic" /></a><a href="#" onclick="doGTranslate('en|zh-TW');return false;" title="Chinese (Traditional)" class="gflag nturl" style="background-position:-400px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Chinese (Traditional)" /></a><a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

<br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>

                    	

<strong></strong>
                <div class="panel-body">
                    
                       <?php if (isset($msg1)) echo $msg1; ?> 
                       
                       
					 <?php 
							if(isset($_GET['errorpin']))
								{
									?>
									<div class='alert alert-danger'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<strong>Invalid Verification Code</strong> 
									</div>
									<?php
								}
						?>
							<?php if(isset($errorpin)){ echo $errorpin;}?>
							
							
							
							 <img alt="thumbnail"  style="border-radius:40px;" width="70" src="admin/pic/<?php echo $row['uname']; ?>.jpg">
                            </br><h4 style="color:green;"> Welcome! <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h4>
                       
							
                    <form autocomplete="off" method="POST">
            <div class="form-inputs p-b">
            
                           
                          
                          
                            
               <input type="text" name="otp" id="code" class="form-control" sttle="width:140px" placeholder="Enter Your Login Code" required>
         <br/>
         
         <div class="btn-group-vertical ml-4 mt-4" role="group" aria-label="Basic example">
  
    <div class="btn-group">
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;"  class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '1';">1</button>
        <button type="button"  style="background-color: #4D90FE; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '2';">2</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '3';">3</button>
        <button type="button" style="background-color: #4D90FE; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '7';">7</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;"class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '8';">8</button>
        <button type="button" style="background-color: #4D90FE; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '9';">9</button>
    </div>
    <div class="btn-group">
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '4';">4</button>
        <button type="button" style="background-color: #4D90FE; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '5';">5</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '6';">6</button>
         <button type="button" style="background-color: #4D90FE; color:white; font-weight:700;"  class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value.slice(0, -1);">CLR</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '0';">0</button>
        <button type="submit" style="background-color: #114f95;"  name="login"   class="btn btn-primary py-3" onclick="">Verify Signin</button>
    </div>
    
    
</div>



         
         
            </div>
             
            <div class="divider">
              
            </div>
          
            <p class="text-center"><b></b>
            <!--</p> <p class="text-center">The World in your Finger Tips</p>-->
          </form>
                </div>
                <div style="background-color: black;" class="panel-footer">
                    </div>
            </div>
        </div>
    </div>
</div> 
</body></html>


              
               
               
               
               
               
               
               
               
               