<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

	$filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/user.php');
?>

<?php
	$user = new user();
	
	if(isset($_GET['deletemsg'])){
		$deletemsg = $_GET['deletemsg'];
		$deleteMsgbyid=$user->deleteMeassage($deletemsg);

	}
	if (isset($_GET['StatusMsg'])) {
 	$id = $_GET['StatusMsg'];
 	$status = $user->UpdateStatusMeassage($id);
 
 }


?>

          <div class="card mb-3" style="margin-left: 5px!important; ">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Inbox</h5>
                <div class="block">

		    </div>
		  </div>
           <?php 

           	
           	$mseg = $user->getUnreadMeassage();
           	
           		?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow: auto;">
                    	<?php 
                    			if(isset($deleteMsgbyid)){
                    				echo $deleteMsgbyid;
                    			}
                    			if(isset($status)){
                    				echo $status;
                    			}

                    	?>
                 <thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Customer Id</th>
							<th>Subject</th>
							<th>Message</th>
							<th>View</th>
							<th>Status</th>
							
						</tr>
					</thead>
			</thead>

                
					<tbody>
						 <?php 
                 if($mseg){
           		$i =0;
           		while ($result = $mseg->fetch_assoc()) {
           			$i++;

                 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $result['cmrId'] ?></td>
							<td><?php echo $result['subject'] ?></td>
							<td><?php echo $result['message'] ?></td>
							<td><a href="customerdetils.php?customerid=<?php echo $result['cmrId']; ?>">Viwe Customer</a></td>

							<?php if($result['status'] == 0){ ?>
							<td> <a style="color: red" href="?StatusMsg=<?php echo $result['id']; ?>"><i class="far fa-check-circle fa-lg"></i></a> </td>
							<?php }else{ ?>

								<td><a   style="color: green;" href="?deletemsg=<?php echo $result['id']; ?>"><i class="fas fa-times fa-lg"></i></a></td>
							<?php }?>
							
						</tr>
						
           		<?php }
           	}

           ?>
					</tbody>
                </table>


              </div>
            </div>
            <div class="card-footer small text-muted">Slider List</div>
<?php include 'inc/footer.php';?>
