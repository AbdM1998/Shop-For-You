<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 


	 $filepath = realpath(dirname(__FILE__));
	 include_once($filepath.'/../classes/cart.php');

	 	$ct = new cart();
		$fm = new format();



	 ?>




<?php 
 

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
               <h5 style="display: inline-block;">Shifted Order</h5>
                <div class="block">
<?php 

                	
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
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 

							
							$getOrder = $ct->getShiftedOrder();
							if($getOrder){
								while ($result = $getOrder->fetch_assoc()) { 

						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'] ?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a href="viewDetails.php?proId=<?php echo $result['productID']; ?>"><?php echo $result['productName'] ?></a></td>
							<td><?php echo $result['Quantity'] ?></td>
							<td><?php echo $result['price'] ?></td>
							<td><?php echo $result['cmrId'] ?></td>
							<td><a href="customerdetils.php?customerid=<?php echo $result['cmrId']; ?>">View Customer Details</a></td>
							

							<?php if($result['status'] == '1'){?>
								<td><a href="?delproID=<?php echo $result['cmrId']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date']; ?>">Remove</a></td>	

							<?php } ?>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>


<?php include 'inc/footer.php';?>
