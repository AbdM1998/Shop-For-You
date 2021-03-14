<?php include 'inc/header.php';
?>

<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>

<?php 

	$cat = new Category();

	if(isset($_GET['delcatid'])){

		$ID = $_GET['delcatid'];
		$delcat = $cat->delCatBYid($ID);


	}
	



 ?>





          <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Category List</h5>
                <div class="block"> 

                	<?php 

                		if(isset($delcat)){

                			echo $delcat;

                		}


                	?>
</div>
</div>
           

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
                  </thead>
                  <tfoot>
                   <tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
                  </tfoot>
                  <tbody>
						<?php 

						$getcat = $cat->getAllcat();
						

						
						if($getcat){
							$i = 0;
							while ($result = $getcat->fetch_assoc()) {
								
								$i++ ;
						?>
						<tr class="odd gradeX">

							<td><?php echo $i ?></td>
							<td><?php echo $result['catName'] ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catID'] ?>">Edit</a>
							 || <a onclick="return confirm('Are You Sure To Delete')" href="?delcatid=<?php echo $result['catID'] ?>">Delete</a></td>
							 <!--
							 	JS function to alert window 
							 	onclick="return confirm('Are You Sure To Delete')"
							 -->
						</tr>

						<?php 
							}
						}
						?>
						
					</tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Category List</div>
          </div>

        

<?php include 'inc/footer.php';?>


    
          
               