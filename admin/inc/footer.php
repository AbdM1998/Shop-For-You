<?php
    
    $filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop*/
  include_once($filepath.'/../../classes/admin.php');

  ob_end_flush(); ?>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
             <?php
        $admin =new admin();
          $getCopyright= $admin->getCopyright(); 
          if($getCopyright){
           $getCopyright = $getCopyright->fetch_assoc()
      ?>
        <p><?php echo $getCopyright['copyright']; ?> &amp; All rights Reserved </p>
        <?php }else{
          echo "no copyright";
        } ?>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="?action=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="libar/jquery/jquery.min.js"></script>
    <script src="libar/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="libar/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
   
    <script src="libar/datatables/jquery.dataTables.js"></script>
    <script src="libar/datatables/dataTables.bootstrap4.js"></script>
     <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

    
    

  </body>

</html>
