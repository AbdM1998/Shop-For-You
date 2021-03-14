<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';
	  include_once '../helper/format.php';/*if it alredy include to another page i can include it by include_once here*/
		
		?>


	
	<?php

		$prd = new product();
		$fm  = new format();
		

		if (isset($_GET['delproid'])) {
			$productID = $_GET['delproid'];
			$delPRD = $prd->deleteProduct($productID); 
			
		}

	?>



          <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Product List</h5>
                <div class="block">

</div>
</div>
           

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				<tr>
					
					<th>Product Name</th>
					<th>Category</th>
					<th>Category Id</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Quntity</th>
					<th>Action</th>
				</tr>
			</thead>
                 
                
					<tbody>
				<?php
					if(isset($delPRD)){
						echo $delPRD;
						}

					$getPrd = $prd->getAllproduct();
					$i=0;
					if($getPrd != null || $getPrd != 0){
						
						while ($result = $getPrd->fetch_assoc()) {
							$i++;
					





				?>
				<tr class="odd gradeX">
					
					<td><?php echo $fm->TextShoten($result['productName'],15); ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['catID']; ?></td>
					<td><?php echo $fm->TextShoten($result['body'],50); ?></td>
					<td><?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?> " height='40px' width='60px' ></td>
					<td><?php 

								if($result['type'] == 0){

										echo "Featured";
									}else{
										echo "General";
								}

 ?></td>
 					<td><?php echo $result['qunt']; ?></td>
					<td><a href="productedit.php?proid=<?php echo $result['productID'] ?>">Edit</a>
							 || <a onclick="return confirm('Are You Sure To Delete')" href="?delproid=<?php echo $result['productID'] ?>">Delete</a></td>
				</tr>
			<?php 	} }else{?>
							<td><?php echo $i ?></td>
							<td>No Product TO Show</td>
							<td>No Category TO Show</td>
							
							<td>No Description TO Show</td>
							<td>No Price TO Show</td>
							<td>No Image TO Show</td>
							<td>No Type TO Show</td>
							<td><a href="productadd.php">ADD New Product</a>


		<?php	}  ?>
				
			</tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Product List</div>
         

        
<?php include 'inc/footer.php';?>
