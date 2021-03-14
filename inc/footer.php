<?php  ob_end_flush(); ?>

</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-5 footer-info">
            <h3>For You</h3>
            <p>
              
              Jordan<br><br>
              <strong>Phone:</strong> +962788456446<br>
              <strong>Email:</strong> For_You@gmail.com<br>
            </p>
            <div class="social-links mt-3">
            <?php
                  $admin =new admin();
                      $getSocial= $admin->getSocial();  
                      if($getSocial){
                        $getSocial=$getSocial->fetch_assoc();
                ?>
        <a style="padding: 8px 0 0 0;" href="<?php echo $getSocial['tw']; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
        <a style="padding: 8px 0 0 0;" href="<?php echo $getSocial['fb']; ?>" class="facebook"><i class="fab fa-facebook"></i></a>
        <a style="padding: 8px 0 0 0;" href="<?php echo $getSocial['gm']; ?>" class="instagram"><i class="fab fa-instagram"></i></a>
        <a style="padding: 8px 0 0 0;" href="<?php echo $getSocial['li']; ?>" class="linkedin"><i class="fab fa-linkedin"></i></a>
        <?php }else{
          echo "Empty";
        } ?>
            </div>
          </div>

          <div class="col-lg-5 col-md-5 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fas fa-home"></i> <a href="index.php"> Home</a></li>
              <li><i class="far fa-address-card"></i> <a href="#"> About us</a></li>
              <li><i class="fas fa-hands-helping"></i> <a href="#"> Services</a></li>
              <li><i class="fas fa-user-secret"></i>  <a href="#"> Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-2 footer-links">
            <h3><a href="contact.php" style="color: #FFF; "> Contact <span style="color: #D44053 ; font-family: bold;">Us </span></a></h3>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container" style="margin: 0;">
      <div class="copyright">
      <?php
        $admin =new admin();
          $getCopyright= $admin->getCopyright();  
          if($getCopyright){
           $getCopyright = $getCopyright->fetch_assoc()
      ?>
        <p><?php echo $getCopyright['copyright']; ?> &amp; All rights Reserved </p>
        <?php }else{
          echo "no copyright";
        }?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="Design/jquery/jquery.min.js"></script><!---->
  <script src="Design/bootstrap/js/bootstrap.bundle.min.js"></script><!---->
  <script src="Design/jquery.easing/jquery.easing.min.js"></script><!---->
  <script src="Design/php-email-form/validate.js"></script><!---->
  <script src="Design/jquery-sticky/jquery.sticky.js"></script><!---->
  <script src="Design/venobox/venobox.min.js"></script><!---->
  <script src="Design/waypoints/jquery.waypoints.min.js"></script><!---->
  <script src="Design/counterup/counterup.min.js"></script><!---->
  <script src="Design/owl.carousel/owl.carousel.min.js"></script><!---->
  <script src="Design/isotope-layout/isotope.pkgd.min.js"></script><!---->
  <script src="Design/aos/aos.js"></script><!---->
  
<!-- add for fonts -->
<script src="Design/js/all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="style/js/main.js"></script><!---->
  




  <!-- for index  -->

  <script src="index/js/backend.js"></script>
  <script src="index/js/swiper.min.js"></script>
  <script src="index/js/bootstrap.min.js"></script>
  <script src="index/js/jquery-3.5.0.min.js"></script>
  <script src="index/js/wow.min.js"></script>

</body>

</html>