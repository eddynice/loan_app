<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}


$user_home = new USER();

// if(isset($_POST['input'])){

//   $input = $_POST['input']
// }

?>


 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  

      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
        
    
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
          <div class="container">
	<br>
		<div class="row">
		<div class="col-md-10">
			<input type="text" style="width:50%" name="search" id="search" placeholder="Search" class="form-control" />
			<br>
			<div id="result"></div>
		</div>
		
		</div>	
		
	</div>
            
           <div class="card-body">
            
                <div class="table-responsive ">
                       
                                <br/>
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                 <script>
//search function
$(document).ready(function() {
    load_data();

    function load_data(query) {
        $.ajax({
            url: "search.php",
            method: "POST",
            data: { query: query },
            success: function(data) {
                $('#result').html(data);
            }
        });
    }
    $('#search').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});
              </script>
          </div>
        </div>
      </div>
     </div>
    </div>
    </div>
   
       <?php include 'foot.php'; ?>