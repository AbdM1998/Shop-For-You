<?php include'inc/header.php'; ?>

<?php 

	if(!isset($_GET['search']) || $_GET['search'] == null){
		echo "<script>window.location='404.php';</script>";
	}else{
		$search = $_GET['search'];
	}



?>

 <div class="main">
 <section id="contact" class="contact">
      <div class="container">

        <div class="row">
         


	      	<?php 
	      


  			

	      	$productbySearch = $pd->productbySearch($search);
	      	if($productbySearch){
	      		while ($result = $productbySearch->fetch_assoc()) {
	      			
	      		



	      	?>
 <div class="col-lg-3 col-md-6 col-sm-12" style="display: inherit; margin-bottom: 9px">
	      	<div class="card" style="width: 18rem;">
			  <img src="admin/<?php echo $result['image']; ?>" class="card-img-top" width="283px" height=" 180px" alt="...">
				  <div class="card-body">
					    <h5 class="card-title"><?php echo $result['productName']; ?></h5>
					    <p class="card-text"><?php echo $fm->TextShoten($result['body'] ,50); ?></p>
					    <p class="card-text"><span class="price"><?php echo $result['price']; ?></span></p>
					    <a href="preview.php?proid=<?php echo $result['productID']; ?>" class="btn btn-primary">View Product</a>
				  </div>
			</div>
				</div>
				<?PHP }}else{
					header("location:404.php");
				}  ?>

			

	
	
    </div>
 </div>
</section>
</div>

    <?php include'inc/footer.php' ?>