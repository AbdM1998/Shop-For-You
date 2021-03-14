<?php

	  include 'inc/header.php';
 	  include 'inc/sidebar.php';
 	  $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/product.php');
	 
    $fm = new format();

?>
<?php 

   
   
    if (!isset($_GET['proId']) || $_GET['proId'] == null) {
    	echo "<script>window.location='minOrder.php'</script>";
    }else{
    	$proId =$_GET['proId'] ;
    }
?>

<?php
    
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      echo "<script>window.location='minOrder.php'</script>";
      /*if i click ok will return me to minOrder page  */
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
               <h5 style="display: inline-block;">Product Detalis</h5>
                <div class="block">
            </div>
        </div>
               <?php 

                $cus = new product();
               	$getSingleProduct=$cus->getSingleProduct($proId);
               	if($getSingleProduct){

               		while ($result =  $getSingleProduct->fetch_assoc()) {
               			



               ?>
                 <form action=" " method="POST">
                 	
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                    <tr>
                            <td style="width: 151px;">Product Name : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['productName']; ?>" class="form-control" />
                            </td>
                        </tr>




                        <tr>
                            <td>Product Details : </td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $fm->TextShoten($result['body'],200); ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Price :</td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="$<?php echo $result['price']; ?>" class="form-control" />
                            </td>
                        </tr>



                        <tr>
                            <td>Category :</td>
                            <td>
                              <!--readonly="readonly" => to just read data -->
                                <input type="text" readonly="readonly" value="<?php echo $result['catName']; ?>" class="form-control" />
                            </td>
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
