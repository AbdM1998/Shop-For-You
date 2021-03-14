<?php include 'inc/header.php';?>
<?php 

  $login = Session::get('cuslogin');
  if($login == false){
    header('location:login.php');
  }
 

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  $cmrid = Session::get('cmrId');
  $userMessage = $cmr->InsertMessags($_POST,$cmrid);
}

?>

<main id="main">

<!-- ======= Contact Us Section ======= -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
          <?php 
          if(isset($userMessage)) {
            echo $userMessage;
          }?>
        </div>

        <div class="row">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
              <div class="form-group">
                    
                    <input type="text" name="name"  class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
                  </div>

                  <div class="form-group">
                    
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email">
                  </div>
                  <div class="form-group">
                    
                    <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="Subject">
                  </div>

                  
                  <div class="form-group">
                    
                    <textarea name="message" placeholder="Please write something for us" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="text-center"><input style="width: 164px;background: #1F3548; color: #FFF; border-radius: 5px; height: 50px ; margin-bottom: 10px; " type="submit" name="submit" value="Send Message" ></div>
                </form>
            
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

    <?php include 'inc/footer.php';?>