<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<!--------------------------- Startc Category Section ----------------------->
<section class="category">
  <div class="containertitle">
    <div class="titlelastproduct">
      <h5><i class="fas fa-square fa-sm"></i><a href="FeatPro.php"><span>Featured Product</span></a></h5>
    </div>
  </div>
  <div class="container">
    <div class="row">

    <?php 

    $getFpd = $pd->getFeaturedProduct(); 
    if ($getFpd) {
    while ($result = $getFpd->fetch_assoc()) {

    ?>


      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="cate" data-aos="fade-up" data-aos-duration="1000">
          <div class="catimg">
           <a href="preview.php?proid=<?php echo $result['productID']; ?>"> <img src="admin/<?php echo $result['image']; ?>"></a>
          </div>
          <div class="catcontant">
            <div class="catdata">
              <span><?php echo $result['productName']; ?></span>
              <h5>$<?php echo $result['price']; ?></h5>
              <a href="preview.php?proid=<?php echo $result['productID']; ?>">BUY NOW</a>
            </div>
          </div>
        </div>
      </div>

    <?php   }  }  ?>

    </div>
  </div>
</section>
<!------------------------------- Start Section Best Product ------------------------>
<section class="bestbroduct ">
  <div class="containertitle">
    <div class="titlelastproduct">
      <h5><i class="fas fa-square fa-sm active"></i><span> Best selling products</span></h5>
    </div>
  </div>
  <div class="container text-center">
    <div class="swiper-container1">
      <div class="swiper-wrapper">

      <?php 

     $getBestpd = $ct->BestSell(); 
          if ($getBestpd) {
          while ($result = $getBestpd->fetch_assoc()) {


      ?>
        <div class="swiper-slide">
          <div class="product" data-aos="fade-up" data-aos-duration="1000">
            <div class="product_header">
              <a href="preview.php?proid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>"></a>
            </div>
          <div class="product_footer">
            <h3><?php echo $result['productName']; ?></h3>
            <div class="product_price">
              <span><?php echo $fm->TextShoten($result['body'],50)."</br> Price:".$result['price']; ?></span>
            </div>
            <a href="preview.php?proid=<?php echo $result['productid']; ?>"><button> Add To Cart </button></a>
          </div>
          </div>
        </div>

        <?php } } ?>

      </div>
    </div>
  </div>
</section>

<!---------------------------------- Start Section Latest Product --------------------------->
<section class="latestproduct ">
  <div class="containertitle">
    <div class="titlelastproduct">
      <h5><i class="fas fa-square fa-sm active"></i><span> Latest Product</span></h5>
    </div>
  </div>
  <div class="container text-center">
    <div class="swiper-container2">
      <div class="swiper-wrapper">

      <?php 

      $getLpd = $pd->getLatestProduct(); 
      if ($getLpd) {
      while ($result = $getLpd->fetch_assoc()) {

      ?>
        <div class="swiper-slide">
          <div class="product" data-aos="fade-up" data-aos-duration="1000">
            <div class="product_header">
              <a href="preview.php?proid=<?php echo $result['productID']; ?>"><img src="admin/<?php echo $result['image']; ?>"></a>
            </div>
            <div class="product_footer">
              <h3><?php echo $result['productName']; ?></h3>
              <div class="product_price">
                <span><?php echo $fm->TextShoten($result['body'],50)."</br> Price:".$result['price']; ?></span>
              </div>
              <a href="preview.php?proid=<?php echo $result['productID'];?>"><button> Add To Cart </button></a>
            </div>
          </div>
        </div>

        <?php } } ?>

      </div>
    </div>
  </div>
</section>

<!------------------------------ Start Section All Product ----------------------->
<section class="allproduct ">
  <div class="containertitle">
    <div class="titlelastproduct">
     <a href="allproduct.php"><i class="fas fa-square fa-sm active"></i><span> All Product</span></a>
    </div>
  </div>
  <div class="container text-center">
    <div class="row">

          <?php 

          $getLpd = $pd->getLatestProduct(); 
          if ($getLpd) {
          while ($result = $getLpd->fetch_assoc()) {

          ?>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="product" data-aos="fade-up" data-aos-duration="1000">
              <div class="product_header">
                <a href="preview.php?proid=<?php echo $result['productID']; ?>"><img src="admin/<?php echo $result['image']; ?>"></a>
              </div>
              <div class="product_footer">
                <h3><?php echo $result['productName']; ?></h3>
                <div class="product_price">
                  <span><?php echo $fm->TextShoten($result['body'],50)."</br> Price:".$result['price']; ?></span>
                </div>
                <a href="preview.php?proid=<?php echo $result['productID']; ?>"><button> Add To Cart </button></a>
              </div>
              <!-- <div class="icon_product">
                <ul>
                  <li><i class="fas fa-eye"></i></li>
                  <li><i class="far fa-heart"></i></li>
                  <li><i class="fas fa-sync-alt"></i></li>
                </ul>
              </div> -->
            </div>
      </div>
   

   <?php } } ?>
    </div>
  </div>
</section>

<!-------------------------- Start Section News ------------------------->

<section class="secnews">
  <div class="containertitle" >
    <div class="titlelastproduct">
      <h5><i class="fas fa-square fa-sm"></i><a href="genproduct.php"><span> General Product </span></a></h5>
    </div>
  </div>
  <div class="container">
    <div class="swiper-container">
      <div class="swiper-wrapper">

        <?php 

            $getLpd = $pd->getGenProduct(); 
            if ($getLpd) {
            while ($result = $getLpd->fetch_assoc()) {

            ?>

        <div class="swiper-slide">
          <div class="news" data-aos="fade-up" data-aos-duration="1000">
              <div class="card" >
                <a href="preview.php?proid=<?php echo $result['productID']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $result['productName']; ?></h5>
                  <div>
                    <p class="card-text"><?php echo $fm->TextShoten($result['body'],50)."</br> Price:".$result['price']; ?></p>
                  </div>
                  <button><a href="preview.php?proid=<?php echo $result['productID']; ?>">Read More</a></button>
                </div>
              </div>
            </div>
        </div>

        <?php   }  } ?>

      </div>
    </div>
  </div>
</section>



<script src="Design/js/backend.js"></script>
<script src="Design/js/jquery.min.js"></script>
<script src="Design/js/bootstrap.bundle.min.js"></script>
<script src="Design/js/swiper.min.js"></script>
<script src="Design/js/bootstrap.min.js"></script>
<script src="Design/js/jquery-3.5.0.min.js"></script>
<script src="Design/js/aos.js"></script>
<script src="Design/js/all.min.js"></script>
<script src="Design/js/wow.min.js"></script>

<script>

    /* ----- Animation AOS Slide  ----*/
    AOS.init();

  /* ----- Swiper Latest and Best Selling Product  ----*/
    var swiper1 = new Swiper('.swiper-container1', {
      slidesPerView: 4,
      autoplay:true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    /* ----- Swiper Latest and Best Selling Product  ----*/
    var swiper1 = new Swiper('.swiper-container2', {
      slidesPerView: 4,
      autoplay:true,
      loop:true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    /* ----- Swiper  News Product  ----*/
 
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 4,
      spaceBetween: 30,
      // autoplay:true,
      // loop:true,
      autoplayTimeout:100,
      autoplayHoverPause:true,

    });
</script>

    <?php include 'inc/footer.php'; ?>