 <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©  <?php echo $site_title; ?>  &copy; <script type="text/javascript">
var d = new Date()
document.write(d.getFullYear())
</script></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> @ 2023. Pay Hub. All Rights Reserved. Powered By <a href="https://edrictech.com.ng" target="_blank">EdricTech</a> <!-- from <?php echo $site_title; ?> --></span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assetsdash/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assetsdash/vendors/chart.js/Chart.min.js"></script>
    <script src="../assetsdash/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.stack.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assetsdash/js/off-canvas.js"></script>
    <script src="../assetsdash/js/hoverable-collapse.js"></script>
    <script src="../assetsdash/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assetsdash/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    
    
    
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>


  </body>
  <?php echo $live_chat_id; ?>
</html>