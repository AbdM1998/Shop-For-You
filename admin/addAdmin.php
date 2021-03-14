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
                    
                         if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Add'])){

                             $AddAdminData = $admin->addAdmin($_POST);
                 }


            ?>

<div class="min">
        <div class="container cont">
            <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
			<form  action=" " method="POST" enctype="multipart/form-data" class="form_edit" style="width: 67%; margin: 0 auto;">
			                  <table class="table table-striped tables ">
			                      <?php 

			                if(isset($AddAdminData)) {
			                    
			                   echo "<tr><td colspan='2'>".$AddAdminData."</td></tr>";
			               }
			                ?>
			   
			         <tr>
			                    
			                    <td colspan="2"><h2>Add New Admin</h2></td>
			                    
			                </tr>
			                <tr>
			                    <td width="20%">Admin Name</td>
			                 
			                    <td><input type="text" name="name" placeholder="Enter admin Name"></td>
			                </tr>
			                 <tr>
			                    <td>Admin User</td>
			                    
			                    <td><input type="text" name="user" placeholder="Enter admin User"></td>
			                </tr>
			                 <tr>
			                    <td>Admin Email</td>
			                    
			                    <td><input type="text" name="email" placeholder="Enter admin Email"></td>
			                </tr>
			                <tr>
			                    <td>Admin Pass</td>
			                    
			                    <td><input type="password" name="Password" placeholder="Enter admin pass"></td>
			                </tr>
			                 
			               
			          
			                <tr>
			                   <td></td>
			                  <td ><input style=" float: right; width: 164px;background: #1F3548; " type="submit" name="Add" value="Save" class="btn btn-dark" ></td>
			                </tr>
			             
			            </tbody>
			            
			          </table>
			        </form>
			    </div>
			</div>
		</div>
	</div>


<?php include 'inc/footer.php';?>