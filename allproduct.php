<?php include'inc/header.php'; ?>
<?php 



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
		
    			
	      			
	      			
    		
	
			<div class="row">
				<?php 
	     

	      	$getAllproduct = $pd->getAllproduct2();
	      			if($getAllproduct){
	      		while ($result = $getAllproduct->fetch_assoc()) {

    			?>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="card" style="width: 19rem;"  >
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
				<?PHP }} ?>


			</div>
		</div>
	</section>
 <?php include'inc/footer.php' ?>