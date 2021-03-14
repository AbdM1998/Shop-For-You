<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>



<?php 

        $prod = new product();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

            $title = $_POST['title'];
            $desc = $_POST['desc'];
            
            $sliderInsert = $prod->sliderInsert($title,$desc , $_FILES);
            /*if you have multiple fade/value you can use $_POST and for image use $_FILES */

        }




      ?>
<div class="card mb-3" style="margin-left: 5px!important">
            <div class="card-header" style="margin-bottom: 5px;">
              <i class="fas fa-table"></i>
                    <h5 style="display: inline-block;">Add New Slider</h5>
                <div class="block">  
     <?php 

                if(isset($sliderInsert)){

                    echo $sliderInsert;
                }



        ?>    
        </div>
                </div>           
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mx-sm-3 mb-2">
                
                        
                     <label for="exampleFormControlTextarea1">Title : </label>
                        <input type="text" name="title" placeholder="Enter Slider Title..." class="form-control" id="exampleFormControlInput1" />
                 </div>
                    <div class="form-group  mx-sm-3 mb-2">  
                
                         <label for="exampleFormControlTextarea1">Description : </label>
                    
                        <input type="text" name="desc" placeholder="Enter Slider Description..." class="form-control" id="exampleFormControlInput1" />
                 </div>
               <div class="form-group mx-sm-3 mb-2">
                        
                    <label for="exampleFormControlTextarea1">Image : </label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"/>
                  </div>
               
				
                        <button name="submit" Value="Save"  class="btn btn-primary  mx-sm-3 mb-2">Save</button>
                 
            </div>
            </form>
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