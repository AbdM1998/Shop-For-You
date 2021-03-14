<?php

	  include 'inc/header.php';
 	  include 'inc/sidebar.php';
 	  include '../classes/category.php' ;
	 


?>
<?php 

   
   
    if (!isset($_GET['catid']) || $_GET['catid'] == null) {
    	echo "<script>window.location='catlist.php'</script>";
    }else{
    	$catId =$_GET['catid'] ;
    }
     $cat =new Category();
    
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $catName = $_POST['catName'];
        $updatecat = $cat->catUpdate($catName , $catId);

}
  



?>



 <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Update Category</h5>
                <div class="block">
                   <?php if(isset($updatecat)){
                echo $updatecat;
               } ?>
             </div>
           </div>

               <?php 

                $getcat=$cat->getCatById($catId);
                if($getcat){

                  while ($result =  $getcat->fetch_assoc()) {
                    



               ?>

        <form action=" " method="POST" class="form-inline">
                 	<!--action="catedit.php?catid=<?php echo $result['catID'] ?>" 
                 	     OR 
                 	 	action =" "
                 	 --><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">          
                      <div class="form-group mx-sm-3 mb-2">
                         
                          <input class="form-control" id="inputPassword2"  type="text" name="catName" value="<?php echo $result['catName'] ?>" />
                          </div>
                          <button name="submit" Value="Update"  class="btn btn-primary ">Update</button>
                      </table>

                    </form>
                    <?php 


               		}
               	}else{
                  header("Location:catlist.php");
                }
                    ?>
                </div>
       
<?php

               include 'inc/footer.php';?>
