<div class="container-scroller" >
      <nav class="sidebar sidebar-offcanvas" id="sidebar"  >
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center" style="background-color:<?php echo $rfatechnology_color_menu; ?>; color:<?php echo $rfatechnology_color_menu_font; ?>;">
          <a class="sidebar-brand brand-logo" href="summary.php"><img src="../assets/img/brand/blue.png"></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="summary.php"><img src="../assets/img/brand/white.png" height="30px"></a>
        </div>
        <ul class="nav" style="background-color:<?php echo $rfatechnology_color_menu; ?>; color:<?php echo $rfatechnology_color_menu_font; ?>;">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="admin/pic/<?php echo $row['uname']; ?>.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></span>
                <span class="font-weight-normal"> <?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?></span> 
              </div>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="summary.php">
              <img src="icon/1.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img src="icon/8.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Funds Transfer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="inter_bank.php">Local Bank Transfer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="dom.php">Same Bank</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="wire.php">Wire/Intl Transfer</a>
                </li>
              </ul>
            </div>
          </li>
		  
		     <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
              <img src="icon/10.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">User Information</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">My Profile</a>
                </li>
               
              </ul>
            </div>
          </li>
		     <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
             <img src="icon/3.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Bank Statement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="statement.php">E-Statement</a>
                </li>
               
              </ul>
            </div>
          </li>
		  
		     <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <img src="icon/4.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Get Help</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item">
                  <a class="nav-link" href="ticket.php">Open Tickets</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="inbox.php">Read Messages</a>
                </li>
              </ul>
            </div>
          </li>
		     <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
             <img src="icon/5.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Loan/Mortages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic4">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="loan.php">Apply for Loan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Approved Loans</a>
                </li>
                
              </ul>
            </div>
          </li>
		    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic7">
             <img src="icon/7.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Make Deposit</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic7">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="bank-deposit.php">Bank Transfer</a>
                </li>
                 
                <li class="nav-item">
                  <a class="nav-link" href="btc-deposit.php">Bitcoin/Blockchain</a>
                </li>
              </ul>
            </div>
          </li>
          
          
		     <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
             <img src="icon/9.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Bank Cards</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic5">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="cardapply.php">Request for Card</a>
                </li>
                 
                <li class="nav-item">
                  <a class="nav-link" href="card.php">View Approved Cards</a>
                </li>
              </ul>
            </div>
          </li>
		  
		  
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
              <img src="icon/logout.png" height="20px" width="20px" />&nbsp;&nbsp;
              <span class="menu-title">Logout</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic6">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout Now</a>
                </li> 
              </ul>
            </div>
          </li>
        </ul>
      </nav>