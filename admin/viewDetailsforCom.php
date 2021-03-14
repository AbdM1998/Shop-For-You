<?php

	  include 'inc/header.php';
 	  include 'inc/sidebar.php';
 	  $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/product.php');
    include_once($filepath.'/../classes/user.php');
	 
    $fm = new format();

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
<?php 

   
   
    if (isset($_GET['proId'])){
      $proId =$_GET['proId'] ;
      $pro = new product();
   
?>

<?php
    
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      echo "<script>window.location='comments.php'</script>";
      /*if i click ok will return me to minOrder page  */
}
  



?>




        <div class="card mb-3">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Product Detalis</h5>
                <div class="block">
            </div>
        </div>
               <?php 

                
               	$getSingleProduct=$pro->getSingleProduct($proId);
               	if($getSingleProduct){

               		while ($result =  $getSingleProduct->fetch_assoc()) {
               			



               ?>
                 <form action=" " method="POST">
                 	
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                    <tr>

                            <td style="width: 151px;">Product Name : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $fm->TextShoten($result['productName'],15); ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Category : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['catName']; ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Description : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $fm->TextShoten($result['body'],50); ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Price : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['price']; ?>" class="form-control" />
                            </td>
                        </tr>

                        

                        <tr>
                            <td>Image : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <img style="height: 80px; width: 80px" src="<?php echo $result['image']; ?>" height='40px' width='60px' class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Type : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php if($result['type'] == 0){ echo "Featured";}else{echo "General";}?>" class="form-control" />
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
              <?php }elseif (isset($_GET['customerid']) ){
                    $custId =$_GET['customerid'] ;
                      $cus = new user();
                       if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    echo "<script>window.location='comments.php'</script>";
                    /*if i click ok will return me to minOrder page  */
              }

                    ?>
                     <div class="card mb-3">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Customer Detalis</h5>
                <div class="block">
            </div>
        </div>
               <?php 

                
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
                
             <?php }elseif (isset($_GET['commentid']) ){
                    $commentid =$_GET['commentid'] ;
                      $cus = new user();
                       if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    echo "<script>window.location='comments.php'</script>";
                    /*if i click ok will return me to minOrder page  */
              }

                    ?>
                     <div class="card mb-3">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Comment Detalis</h5>
                <div class="block">
            </div>
        </div>
               <?php 

                
                $getCustomerCom=$cus->getCommentByid($commentid);
                if($getCustomerCom){

                  while ($result =  $getCustomerCom->fetch_assoc()) {
                    



               ?>
                 <form action=" " method="POST">
                
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                    <tr>
                            <td style="width: 151px;">Name : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['name'] ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Customer Id : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['cmrId'] ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Product Id : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['productID'] ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Product Name : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['productName'] ?>" class="form-control" />
                            </td>
                        </tr>

                        

                        <tr>
                            <td>Comment : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['comment'] ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Comment Date : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['comment_date'] ?>" class="form-control" />
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
              <?php } ?>
            
<?php

               include 'inc/footer.php';?>
