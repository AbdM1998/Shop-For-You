<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';
      
      include '../classes/product.php'; ?>




      <?php 

        $prod = new product();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

            
            $prodInsert = $prod->productInsert($_POST , $_FILES);
            /*if you have multiple fade/value you can use $_POST and for image use $_FILES */

        }




      ?>
<div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
               <h5 style="display: inline-block;">Add New Product</h5>
                <div class="block"> 

        <?php 

                if(isset($prodInsert)){

                    echo $prodInsert;
                }



        ?>   
        </div>
    </div>   
<?php /*
          
          multipart/form-data No characters are encoded. This value is required when you are using forms that have a file upload control
          
            to send more one data and file data we use enctype="multipart/form-data"

         */ ?>
<form action="" method="POST" enctype="multipart/form-data" style="margin-left: 8px">
  <div class="form-group">
    <label for="exampleFormControlInput1">Name : </label>
    <input name="productName" placeholder="Enter Product Name..." class="form-control" id="exampleFormControlInput1" />
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
            <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName']; ?></option>
        <?php } }  ?>
    </select>
  </div>

 

 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description : </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price : </label>
    <input type="text" name="price" placeholder="Enter Price..." class="form-control" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">  Quntity : </label>
    <input type="text" name="Quntity" placeholder="Enter Quntity..." class="form-control" id="exampleFormControlInput1" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Image : </label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1"  name="image" />
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Type : </label>
   <select class="form-control" id="exampleFormControlSelect1" name="type">
     
        <option>Select Type</option>
        <option value="0">Featured</option>
        <option value="1">General</option>
    
    </select>
    </select>
  </div>
  <button name="submit" Value="Save"   class="btn btn-primary " style="width: 150px; font-weight: bold;">Add Product</button>

</form>
</div>      
     
<?php include 'inc/footer.php';?>
