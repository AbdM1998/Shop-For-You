<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>

<?php 

    $cat =new Category();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $catName = $_POST['catName'];
        $insertcat = $cat->catInsert($catName);


    }



?>




       <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Add New Category</h5>
                <div class="block">
                   <?php if(isset($insertcat)){
                echo $insertcat;
               } ?>

                    </div>
                </div>
               
                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-inline">
                    
                  <div class="form-group mx-sm-3 mb-2">
                   
                    <input class="form-control" id="inputPassword2"   type="text" name="catName" placeholder="Enter Category Name..."  />
                  </div>
                  <button name="submit" Value="Save"  class="btn btn-primary ">Save</button>

                    </form>
                </div>
           



           <!----------------------------- Category List ------------>

           <div>
             <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Category Name</h5>
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
             
            </tr>
                  </thead>
             
            
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

           </div>







<?php include 'inc/footer.php';?>