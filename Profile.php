<?php include'inc/header.php'; ?>
 
<?php

    $login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }

?>


<style type="text/css">
  
.table{
  width: 100%;
  border: 1px solid #ddd;
}
.table td{
  border: 1px solid #ddd; 
}
th{
  text-align: justify;
}


</style>



 <div class="main">
    <div class="content">
       <div class="section group">
        <div class="container">
 <?php 

        $id = Session::get('cmrId');
        $getData = $cmr->getCustmerData($id);
        if($getData){

            while ($result = $getData->fetch_assoc()) {
             ?>
<table class="table table-striped">
                <thead>
                 <tr>
                    
                    <td colspan="3"><h2>Your Profile Details</h2></td>
                    
                </tr>
                </thead>
                <tr>
                    <td width="20%">Name</td>
                    
                    <td><?php echo $result['name']; ?></td>
                </tr>
                 <tr>
                    <td>Phone</td>
                   
                    <td><?php echo $result['phone']; ?></td>
                </tr>
                 <tr>
                    <td>Email</td>
                    
                    <td><?php echo $result['email']; ?></td>
                </tr>
                 <tr>
                    <td>Address</td>
                    
                    <td><?php echo $result['address']; ?></td>
                </tr>
                 <tr>
                    <td>City</td>
                    
                    <td><?php echo $result['city']; ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                   
                    <td><?php echo $result['country']; ?></td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    
                    <td><?php echo $result['zip']; ?></td>
                </tr>
                
           
      <tr>
        <td colspan="3"><a href="editprofile.php"><button style=" float: right; width: 164px;background: #1F3548; "type="button" class="btn btn-dark">Update Details</button></a></td>

      </tr>
    </tr>

  </tbody>
</table>
<?php  } } ?>



             
    

       </div>
      </div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php'; ?>
