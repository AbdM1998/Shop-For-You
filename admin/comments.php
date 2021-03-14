<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

	$filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/user.php');
    include_once($filepath.'/../classes/product.php');
    $user = new user();
    $pro = new product();
    $fm = new format();
?>
<?php

if (isset($_GET['delcomment'])) {
			$delcomment = $_GET['delcomment'];
			
			$delComment = $user->deleteComment($delcomment); 
			
		}


?>
   

          <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Comments</h5>
                <div class="block">

</div>
</div>
           <?php 

           	
           	$comment = $user->getAllCommentforadmin();
           	
           		?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    	<?php 
                    		if(isset($delComment)){
                    			echo $delComment;
                    		}
                    	?>
                 <thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Customer Id</th>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Comment</th>
							<th>Comment Date</th>
							<th>Action</th>
						</tr>
					</thead>
			</thead>

                
					<tbody>
						 <?php 
                 if($comment){
           		$i =0;
           		while ($result = $comment->fetch_assoc()) {
           			$i++;

                 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name'] ?></td>
							<td><a href="viewDetailsforCom.php?customerid=<?php echo $result['cmrId']; ?>"><?php echo $result['cmrId'] ?></a></td>
							<td><a href="viewDetailsforCom.php?proId=<?php echo $result['productID']; ?>"><?php echo $result['productID'] ?></a></td>
							<td><?php

								$getproName = $pro->getProductBYID($result['productID'])->fetch_assoc();


							 echo $getproName['productName'] ?></td>
							<td><?php echo $fm->TextShoten($result['comment'],10) ?></td>
							<td><?php echo $result['comment_date'] ?></td>
							<td><a href="viewDetailsforCom.php?commentid=<?php echo $result['id']; ?>">Viwe Comment</a> || <a href="?delcomment=<?php echo $result['id'] ?>">Delete</a></td>
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

