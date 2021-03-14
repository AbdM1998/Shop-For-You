<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/user.php'; ?>

<?php 

	$user = new user();

	if(isset($_GET['delcusid'])){

		$ID = $_GET['delcusid'];
		$delCustmerData = $user->delCustmerBYid($ID);


	}
	
	



 ?>





       <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
                <h5 style="display: inline-block;">Category List</h5>
                <div class="block">

                	<?php 

                		if(isset($delCustmerData)){

                			echo $delCustmerData;

                		}


                	?>
                </div>
        </div>



                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							
							<th>ID</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Country</th>
							<th>City</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$getAllCustmerData = $user->getAllCustmerData();
						

						
						if($getAllCustmerData){
							$i = 0;
							while ($result = $getAllCustmerData->fetch_assoc()) {
								
								$i++ ;
						?>
						<tr class="odd gradeX">

							
							<td><?php echo $result['id'] ?></td>
							<td><?php echo $result['name'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $result['phone'] ?></td>
							<td><?php echo $result['country'] ?></td>
							<td><?php echo $result['city'] ?></td>
							<td><?php echo $result['address'] ?></td>

							<td>
							 <a onclick="return confirm('Are You Sure To Delete')" href="?delcusid=<?php echo $result['id'] ?>">Delete</a></td>
							 
						</tr>

						<?php 
							}
						}
						?>
						
					</tbody>
				</table>
			</div>
               
<?php include 'inc/footer.php';?>

