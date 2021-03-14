<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin.php' ;
    
     $admin =new admin();
?>
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fb = $_POST['fb'];
        $tw = $_POST['tw'];
        $li = $_POST['li'];
        $gm = $_POST['gm'];
        $SocialUpdate=$admin->SocialUpdate($fb,$tw,$li,$gm);
        /*OR
            $SocialUpdate=$admin->SocialUpdate($_POST);
            */
    }


?>




          <div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Update Social Media</h5>
                <div class="block">
<?php if(isset($SocialUpdate)){
                echo $SocialUpdate;
               } ?>

</div>
</div>
               <?php 
               /*i creat methid update copyright in admin class*/
                $getSocial=$admin->getSocial();
                if($getSocial){

                    while ($result =  $getSocial->fetch_assoc()) {
                        



               ?> 

           
               <form action=" " method="POST">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input style="width: 361px;" type="text" name="fb" value="<?php echo $result['fb']; ?>" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input style="width: 361px;" type="text" name="tw" value="<?php echo $result['tw']; ?>" class="medium" />
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input style="width: 361px;" type="text" name="li" value="<?php echo $result['li']; ?>" class="medium" />
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input style="width: 361px;" type="text" name="gm" value="<?php echo $result['gm']; ?>" class="medium" />
                    </td>
                </tr>
                
                
                 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" class="btn btn-primary" />
                    </td>
                </tr>
                </table>
            </form>
             <?php  } } ?>
              </div>
            </div>
            <div class="card-footer small text-muted">Update Social Media</div>
<?php include 'inc/footer.php';?>

