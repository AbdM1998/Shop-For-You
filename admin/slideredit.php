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
        if(!isset($_GET['sliderID']) || $_GET['sliderID'] == null){
            echo "<script>window.location='productlist.php'</script>";
        }else{
            $sliderID=$_GET['sliderID'];
        }
        $prod = new product();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

            $title = $_POST['title'];
            
            $Sliderupdate = $prod->Sliderupdate($title , $_FILES ,$sliderID);
            /*if you have multiple fade/value you can use $_FILES */

        }




      ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Slider</h2>
        <div class="block">   



        <?php 

                if(isset($Sliderupdate)){

                    echo $Sliderupdate;
                }


        ?>       


       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
           
                    
                        <?php 

                           $getsliderById = $prod->getsliderById($sliderID);
                            $i=0;
                             if($getsliderById != null || $getsliderById != 0){
                        
                                while ($result = $getsliderById->fetch_assoc()) {
                           
                                       


                        ?>                        
                            
				<tr>
                    <td>
                        <label>title</label>
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $result['title']; ?>"  class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['image']; ?> " height='60px' width='80px' ><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            
            </table>
            </form>
            <?php   } }  ?>
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


