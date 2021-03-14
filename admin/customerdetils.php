<?php

	  include 'inc/header.php';
 	  include 'inc/sidebar.php';
 	  $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/user.php');
	 


?>
<?php 

   
   
    if (!isset($_GET['customerid']) || $_GET['customerid'] == null) {
    	echo "<script>window.location='minOrder.php'</script>";
    }else{
    	$custId =$_GET['customerid'] ;
    }
    
?>

<?php
    
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      echo "<script>window.location='minOrder.php'</script>";
      /*why?*/
}
  



?>

<style >
    
    .table tr td{
      text-align: justify;

}
.mb-3, .my-3{
  width: 59%;
    margin: 0 auto;

}
  .btn {
    text-align: center;
    width: 110px;
    font-size: 20px;
    font-family: cursive;
    position: relative;
    left: 50%;
  }

</style>


        <div class="card mb-3">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Customer Detalis</h5>
                <div class="block">
            </div>
        </div>
               <?php 

                $cus = new user();
               	$getCustomer=$cus->getCustmerData($custId);
               	if($getCustomer){

               		while ($result =  $getCustomer->fetch_assoc()) {
               			



               ?>
                 <form action=" " method="POST">
                 	<!--action="catedit.php?catid=<?php echo $result['catID'] ?>" 
                 	     OR 
                 	 	action =" "
                 	 -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                    <tr>
                            <td style="width: 151px;">Customer Name : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['name'] ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Customer Address : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['address'] ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Customer Country : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['country'] ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Customer City : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['city'] ?>" class="form-control" />
                            </td>
                        </tr>

                        

                        <tr>
                            <td>Customer Zip-Code : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['zip'] ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Customer Phone : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'] ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Customer Email : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input  type="text" readonly="readonly" value="<?php echo $result['email'] ?>" class="form-control" />
                            </td>
                        </tr>

						            <tr> 
                            
                        </tr>

                    </table>
                    <td>
                                <input class="btn btn-primary" type="submit" name="submit" Value="Ok" />
                            </td>
                 </form>
                    <?php 


               		}
               	}
                    ?>
                </div>
            
<?php

               include 'inc/footer.php';?>
