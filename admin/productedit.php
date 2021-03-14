<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';
      include '../classes/admin.php'; 
      include '../classes/product.php'; ?>




      <?php /* if (!isset($_GET['catid']) || $_GET['catid'] == null) {
        echo "<script>window.location='catlist.php'</script>";
    }else{
        $catId =$_GET['catid'] ;
    }*/
        if(!isset($_GET['proid']) || $_GET['proid'] == null){
            echo "<script>window.location='productlist.php'</script>";
        }else{
            $proID=$_GET['proid'];
        }
        $prod = new product();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

            
            $produpdate = $prod->productupdate($_POST , $_FILES ,$proID);
            /*if you have multiple fade/value you can use $_FILES */

        }




      ?>
<div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Update Product</h5>
                <div class="block"> 

      <?php 

                if(isset($produpdate)){

                    echo $produpdate;
                }


        ?>       
        </div>
    </div> 
  



          


        <?php 

            $getproduct = $prod->getProductBYID($proID);
            if($getproduct){
            while ($value = $getproduct->fetch_assoc() ) {
                
          


        ?>
         <form action="" method="post"  enctype="multipart/form-data" style="margin-left: 8px">
            <table class="form">
               
                  <div class="form-group">
                        <label for="exampleFormControlInput1">Name : </label>
                        <input type="text" name="productName" value="<?php echo $value['productName']; ?>"  class="form-control" id="exampleFormControlInput1" />
                  </div>

                 <div class="form-group">
			
                       <label for="exampleFormControlSelect1">Category : </label>
                  
                        <select class="form-control" id="exampleFormControlSelect1" name="catID">
                         <option>Select Category</option>
                     
                     <?php

                                $cat = new category();
                               
                                $getcat = $cat->getAllcat($query); 
                                    if($getcat){
                                      while ($result =$getcat->fetch_assoc()) {
                                   
                            ?>
                            <option

                                <?php 

                                    if($value['catID'] == $result['catID']){?>
                                        selected = "selected"
                                   <?php }   ?>



                             value="<?php echo $result['catID'] ?>"><?php echo $result['catName']; ?></option>
                            <?php 

                                }
                             }

                             ?>

                        </select>
                    </div>
                    
                        
                    
                   
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description : </label>
                    
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"><?php echo $value['body']; ?></textarea>
                    </div>




                    
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Price : </label>
                            <input type="text" name="price" placeholder="Enter Price..." class="form-control" id="exampleFormControlInput1" value="<?php echo $value['price']; ?>" />
                     </div>
                     <div class="form-group">
                            <label for="exampleFormControlInput1">Quntity : </label>
                            <input type="text" name="Quntity" placeholder="Enter Quntity..." class="form-control" id="exampleFormControlInput1" value="<?php echo $value['qunt']; ?>" />
                     </div>
                   
                    <div class="form-group">
                         <label for="exampleFormControlFile1">Upload Image : </label>
                   
                        <img src="<?php echo $value['image']; ?> " height='60px' width='80px' ><br/>
                        <input  class="form-control-file" id="exampleFormControlFile1" type="file" name="image" />
                    </div>
                  
                        <div class="form-group">
                         <label for="exampleFormControlSelect1">Product Type : </label>
                    
                        <select class="form-control" id="exampleFormControlSelect1" name="type">
     
                             <option>Select Type</option>

                            <?php 
                                if($value['type'] == 0 ) {  ?>


                            <option value="0" selected="selected">Featured</option>
                            <option value="1">General</option>

                             <?php }elseif ($value['type'] == 1) {?>

                                  <option value="0">Featured</option>
                                 <option value="1"  selected="selected">General</option>
                            <?php }  ?>
                              
                        </select>
                    </div>
                    
                        <button name="submit" Value="Save"   class="btn btn-primary " style="width: 150px; font-weight: bold;">Update Product</button>
                    
            </table>
            </form>
            <?php   } }else{
                              header("Location:productlist.php");
                             }   ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


