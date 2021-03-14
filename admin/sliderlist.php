<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>

<?php 
$prd = new product();
if(isset($_GET['delsliderid'])){
	$id = $_GET['delsliderid'];
	$delsliderById = $prd->DelSliderById($id);
}





?>

          <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Slider List</h5>
                <div class="block">

</div>
</div>
           

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Description</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			</thead>
                  
                
					<tbody>
						<?php
					if(isset($delsliderById)){
						echo $delsliderById;
						}
						
					

					$getAllsliderImage = $prd->getAllsliderImage();
					$i=0;
					if($getAllsliderImage != null || $getAllsliderImage != 0){
						
						while ($result = $getAllsliderImage->fetch_assoc()) {
							$i++;
					





				?>

				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['title'] ?></td>
					<td><?php echo $result['body'] ?></td>
					<td><img src="<?php echo $result['image']; ?>" height='40px' width='60px' ></td>			
				<td>
					<a href="slideredit.php?sliderID=<?php echo $result['id'] ?>">Edit</a>|| 
					<a onclick="return confirm('Are You Sure To Delete')" href="?delsliderid=<?php echo $result['id'] ?>">Delete</a></td>
					</tr>
					<?php 	} }else{?>
						<td>01</td>
						<td>No Title </td>
						<td>No Description </td>
						<td>No Image </td>
						<td><a href="slideradd.php">ADD New Slider</a>
					<?php	}  ?>	
			</tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Slider List</div>
<?php include 'inc/footer.php';?>


         
