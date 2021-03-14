<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        <?php 
               $getFpd = $pd->getLimitFeaturedProduct();
                $i=0; 
              if ($getFpd) {
              while ($result = $getFpd->fetch_assoc()) {
             
                      $i++;
        ?>
          <div class="carousel-item <?php if($i ==1){echo 'active';} ?>" style="background-image: url('admin/<?php echo $result['image']; ?>');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Shop For You</span></h2>
                <p class="animate__animated animate__fadeInUp"><?php echo $result['productName']; ?> The price : $<?php echo $result['price']; ?></p>

                <p class="animate__animated animate__fadeInUp"><a style="background: #D44053; color: #fff; border-radius: 5px; padding: 4px" href="preview.php?proid=<?php echo $result['productID']; ?>">BUY NOW</a></p>
                </div>
            </div>
          </div>
        <?php }}?>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->