<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style >
	.controls{
		height: 51px;
	    width: 128px;
	    position: relative;
	    left: -119px;
	    
	}
	
	.carts{
		height: 51px;
	    width: 128px;
	    position: relative;
	    right: -119px;
	}
	.controls a , .carts a{
	color: #ffffff;
    text-decoration: none;
    background-color: transparent;
}

</style>
        <div class="alert alert-secondary" role="alert">
				  <h2> Dashbord</h2>
				  <p> Welcome admin panel </p>

				  <button type="button" class="btn btn-info controls"><a href="controlpanel.php"> Go To Control </a></button>
				  <button type="button" class="btn btn-danger carts"><a href="minOrder.php">  Go To Order</a></button>
		</div>
                
                
  
<?php include 'inc/footer.php';?>