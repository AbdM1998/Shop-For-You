<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin.php' ;
    
     $admin =new admin();
?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $copyright = $_POST['copyright'];
        $CopyrightUpdate=$admin->copyrightUpdate($copyright);
    }


?>

          <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Update Copyright Text</h5>
                <div class="block">
                  <?php if(isset($CopyrightUpdate)){
                echo $CopyrightUpdate;
               } ?>

             </div>
          </div>
           <?php 
               /*i creat methid update copyright in admin class*/
                $getCopyright=$admin->getCopyright();
                if($getCopyright){

                    while ($result =  $getCopyright->fetch_assoc()) {
                        



               ?>
                <form  action=" " method="POST" class="form-inline">
                  
                  <div class="form-group mx-sm-3 mb-2">
                   
                    <input class="form-control" id="inputPassword2"  type="text" name="copyright" value="<?php echo $result['copyright']; ?>" class="large"  />
                  </div>
                  <button type="submit" name="submit" Value="Update"  class="btn btn-primary ">Update</button>
                </form>
                <?php  } } ?>
            </div>
<?php include 'inc/footer.php';?>

