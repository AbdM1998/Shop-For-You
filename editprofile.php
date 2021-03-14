<?php include'inc/header.php'; ?>
 
<?php

    $login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }

?>

            
           
            <?php
                    $cmrid = Session::get('cmrId');
                         if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){

                             $Updatecustomerdata = $cmr->UpdateCustomerData($_POST,$cmrid);
                 }


            ?>






<div class="min">
        <div class="container cont">
            <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          
          <form  action=" " method="POST" enctype="multipart/form-data" style="width: 67%; margin: 0 auto;">
                  <table class="table table-striped tables ">
                       <?php 

                        $id = Session::get('cmrId');
                        $getData = $cmr->getCustmerData($id);
                        if($getData){

                            while ($result = $getData->fetch_assoc()) {
                             ?>
                 <?php

                if(isset($Updatecustomerdata)) {
                    /*if i write $Updatecustomerdata just withot isset will show error Undefined variable $Updatecustomerdata*/
                   echo "<tr><td colspan='2'>".$Updatecustomerdata."</td></tr>";
               }
                ?>
   
                <tr>
                    
                    <td colspan="2"><h2>Update Profile Details</h2></td>
                    
                </tr>
                <tr>
                    <td width="20%">Name</td>
                 
                    <td><input type="text" name="name"  value="<?php echo $result['name']; ?>"></td>
                </tr>
                 <tr>
                    <td>Phone</td>
                    
                    <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                </tr>
                 <tr>
                    <td>Email</td>
                    
                    <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    
                    <td><input type="password" name="Password"></td>
                </tr>
                 <tr>
                    <td>Address</td>
                    
                    <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                </tr>
                 <tr>
                    <td>City</td>
                    
                    <td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    
                    <td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    
                    <td><input type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
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

   <?php include 'inc/footer.php'; ?>
