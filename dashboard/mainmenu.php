
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row" >
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between" style="background-color:<?php echo $rfatechnology_color_header; ?>; color:<?php echo $rfatechnology_color_header_font; ?>;">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="summary.php"><img src="../assets/img/brand/white.png" alt="logo" height="40px" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav" >
              
              
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
              
            <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group"><strong style="color:white">
                    Logged IP:   <?PHP

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

echo $user_ip; // Output IP address [Ex: 177.87.193.134]


?></strong>
                  </div>
                </form>
              </li>
              
              
              
            
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
             
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="ooo" src="uploads/<?php echo $row['passport']; ?>" alt="profile" />
                  <span class="profile-name"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  
                  
                   <a class="dropdown-item" href="editpass.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i>Change Password </a>
                    
                    
                  <a class="dropdown-item" href="logout.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
		
		
		
		
		
        <div class="main-panel">
            
            
            
            
             <?php
                                if (isset($_GET['dormant'])) {
                                    ?>
                                    <div class='alert alert-warning'>
                                        <button class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Sorry, your account is currently DORMANT/INACTIVE, please contact customer care </a></strong> 
                                    </div>
                                    <?php
                                }
                                ?>
                                
                                <?php
                                if (isset($_GET['hold'])) {
                                    ?>
                                    <div class='alert alert-warning'>
                                        <button class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Sorry, your account Status is ON HOLD Please Contact Customer care</a></strong> 
                                    </div>
                                    <?php
                                }
                                ?>