<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin.php';
	
	/*
		I cannot use the class whose name is adminlogin because it will check if the admin is present or not. If it exists, it will return it to the admin’s home page and thus will not be able to modify its properties at all. i create new class admin to edit data for this admin 
	*/


 ?>
<?php
		/*
		first i check if admin login or not 
		*/
    $login = Session::get("adminlogin"); /*if admin not login and i  don't needed to include adminlogin or session class to access these properties*/
        if($login == false){
            header('location:login.php');
        }

        $admin = new admin();

?>
  <?php
                    $adminID = Session::get('adminID');
                         if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){

                             $UpdateAdminData = $admin->UpdateAdminData($_POST,$adminID);
                 }


            ?>

<div class="min">
        <div class="container cont">
            <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
			<form  action=" " method="POST" enctype="multipart/form-data" class="form_edit" style="width: 67%; margin: 0 auto;">
			                  <table class="table table-striped tables ">
			                       <?php 
			                       	
			                        $id = Session::get('adminID');

			                        $getData = $admin->getAdminData($id);
			                        if($getData){

			                            while ($result = $getData->fetch_assoc()) {
			                             ?>
			                 <?php

			                if(isset($UpdateAdminData)) {
			                    
			                   echo "<tr><td colspan='2'>".$UpdateAdminData."</td></tr>";
			               }
			                ?>
			   
			         <tr>
			                    
			                    <td colspan="2"><h2>Update Profile Details</h2></td>
			                    
			                </tr>
			                <tr>
			                    <td width="20%">Admin Name</td>
			                 
			                    <td><input type="text" name="name"  value="<?php echo $result['adminName']; ?>"></td>
			                </tr>
			                 <tr>
			                    <td>Admin User</td>
			                    
			                    <td><input type="text" name="user" value="<?php echo $result['adminUser']; ?>"></td>
			                </tr>
			                 <tr>
			                    <td>Admin Email</td>
			                    
			                    <td><input type="text" name="email" value="<?php echo $result['adminEmail']; ?>"></td>
			                </tr>
			                <tr>
			                    <td>Admin Pass</td>
			                    
			                    <td><input type="password" name="Password"></td>
			                </tr>
			                 
			               
			          
			                <tr>
			                   <td></td>
			                  <td ><input style=" float: right; width: 164px;background: #1F3548; " type="submit" name="update" value="Save Profile" class="btn btn-dark" ></td>
			                </tr>
			             
			            </tbody>
			            <?php  } } ?>
			          </table>
			        </form>
			    </div>
			</div>
		</div>
	</div>


<?php include 'inc/footer.php';?>