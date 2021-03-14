<?php include'inc/header.php'; ?>
<?php 


  			$checkID = $pd->checkID($_GET['catID']);

  			
	      	if(isset($checkID->num_rows)){
	      	if(isset($_GET['catID']) && $_GET['catID'] !=null ){

	      		$id = $_GET['catID'];
	      	}else{
	      		echo "<script>window.location='404.php';</script>";
	      		
	      	}
	      	if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$min 	= $_POST['min'];
			$max 	= $_POST['max'];
			

			}

?>
 <style>
   
   .titlesection{
	   border:1px solid #ddd;
	   padding:15px 0 15px 15px;
	   border-right-style:none;
   }

   .sectionprduct .card{
    margin:15px 0;
	cursor:pointer;

  }
  .sectionprduct  .card-body{
	   background-color:#dddddd6b;
   }
   .sectionprduct .card-title{
    text-align:center;
	margin-bottom: .5rem;
    color: #d44053;
    font-family: cursive;
    font-weight: 700;
    font-size: 23px;
   }
   .sectionprduct  .price{
	   text-align:center;
	   padding:10px;
   }
   .sectionprduct  .price span{
	
	font-weight: 500;
    font-family: sans-serif;

   }
   .sectionprduct  .card-img-top{
	max-height: 350px;
   }
   .sectionprduct  .card-body div{
      text-align:center;
   }
   .sectionprduct .btn {
	padding: 6px 20px;
	transition:0,2s;
	text-align:center;
	width:60%;
   } 
   
   .sectionprduct .btn:hover{
	   background-color:#d44053;
	   border-radius:30px;
	   border:1px solid #d44053;
	   transform:scale(0.9);
   }


 </style>
	<section class="sectionprduct ">
		<div class="container">
			<?php 
    			/* method 1
    				$nameCat = $cat->getCatById($_GET['catID']);
	      	if($nameCat){
	      		while ($result = $nameCat->fetch_assoc()) {
	      			---------------------------------------
 					method 2
 					*/
	      			
	      			$nameCat = $pd->ProductByOnlyCat($id);
	      			if($nameCat){
	      		while ($result = $nameCat->fetch_assoc()) {

    			?>
    		
			<div class=" clearfix titlesection">
				<h2 class="float-left"><?php echo  $result['catName']; ?> Product</h2>

				<form action=" " method="POST" class="float-right">
				  <div class="form-row">
				    <div class="col">
				      <input type="number" class="form-control" name="min" placeholder="$ Min" >
				    </div>
				    <div class="col">
				      <input type="number" class="form-control" name="max" placeholder="$ Max" >
				    </div>
				    <div class="col">
				      <input type="submit" class="form-control" value="Go">
				    </div>
				  </div>
				</form>
			</div>
			<div class="row">
				<?php 
	      }
	  }
			if(empty($min) && empty($max) || $min>=$max){

	      		$productbycat = $pd->productbycat($id);
	      			
	      		} else {

	      			$productbycat = $pd->MinMaxproduct($id,$min,$max);
	      			if($productbycat == NULL){
	      				echo "<span class='alert alert-danger' style='text-align:center; font-family:cursive;font-size:25px;'>No Data to show</span>";
	      			}
	      		}
	      		
	      		if($productbycat){
			      		while ($result = $productbycat->fetch_assoc()) {

	      	?>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="card" style="width: 16rem;"  >
						<a href="preview.php?proid=<?php echo $result['productID']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="card-img-top" alt="..." ></a>
					<div class="card-body">
						<h5 class="card-title" ><?php echo $result['productName']; ?></h5>
						<div class="price">
						  <span><?php echo $fm->TextShoten($result['body'] ,50); ?></span>
						   <span><?php echo $result['price']; ?></span>
						</div>
						<div>
						<a href="preview.php?proid=<?php echo $result['productID']; ?>" class="btn btn-dark">Details</a>
					    </div>
					</div>
					</div>
				</div>	
				<?PHP }}
	      	}else{
	      		echo "<div style='height:50vh ;width:100%' >";
	      		echo "<h1 style='color:red; text-align:center  '>No Data To Show</h1>";
				echo "</div>";	      
					      	} ?>


			</div>
		</div>
	</section>
 <?php include'inc/footer.php' ?>