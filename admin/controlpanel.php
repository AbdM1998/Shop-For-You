<?php 

include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

	
?>
<style >
  .mr-5{
        font-size: 43px;
    color: white;
    font-weight: 700;
    font-style: oblique;
  }
  .float-left{
    font-size: 16px;
    font-family: cursive;
  }

</style>
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-6 col-sm-6 mb-3" style=" height: 188px;">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-layer-group"></i>
                  </div>
                  <div class="mr-5">Category</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="catlist.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
           
            <div class="col-xl-6 col-sm-6 mb-3" style=" height: 188px;">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fab fa-product-hunt"></i>
                  </div>
                  <div class="mr-5">Product</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="productlist.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-3" style=" height: 188px;">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="mr-5">User List</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="customer.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-6 col-sm-12 mb-12" style=" height: 188px; ">
              <div class="card text-white bg-info o-hidden h-100" >
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-comment-dots"></i>
                  </div>
                  <div class="mr-5">Messages</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="inbox.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        

<?php include 'inc/footer.php';?>