<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 


	 $filepath = realpath(dirname(__FILE__));
	 include_once($filepath.'/../classes/cart.php');

	 	$ct = new cart();
		$fm = new format();



	 ?>




<?php 
 if (isset($_GET['shiftId'])) {
 	$id = $_GET['shiftId'];
 	$price = $_GET['price'];
 	$time = $_GET['time'];
 	$shift = $ct->productshifted($id,$price,$time);
 
 }

 if (isset($_GET['delproID'])) {
 	$id = $_GET['delproID'];
 	$price = $_GET['price'];
 	$time = $_GET['time'];
 	$DelOrder = $ct->delOrder($id,$price,$time);
 
 }



?>





         <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">All Customer Order</h5>
                <div class="block">
<?php 

                	if(isset($shift)){
                		echo $shift;
                	}
                	if(isset($DelOrder)){
                		echo $DelOrder;
                	}


                ?>
</div>
</div>
                
                
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				
						<tr>
							<th>ID</th>
							<th>Order Date</th>
							<th>Product</th>
							<th>Product Image</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer ID</th>
							<th>Customer Emial</th>
							<th>Address</th>
						
						</tr>
					</thead>
					<tbody>

						<?php 

							
							$getOrder = $ct->getAllOrder();
							if($getOrder){
								while ($result = $getOrder->fetch_assoc()) { 

						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'] ?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a href="viewDetailsOrder.php?proId=<?php echo $result['productID']; ?>"><?php echo $result['productName'] ?></a></td>
							<td><img style="height: 50px; width: 80px; border:0px solid #FFF;" src="<?php echo $result['image']; ?>"  class="form-control" /></td>
							<td><?php echo $result['Quantity'] ?></td>
							<td><?php echo $result['price'] ?></td>
							<td><?php echo $result['cmrId'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><a href="viewDetailsOrder.php?customerid=<?php echo $result['cmrId']; ?>">View Customer Details</a></td>
							

						
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>

<?php include 'inc/footer.php';?>
