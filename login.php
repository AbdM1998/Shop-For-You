<?php include'inc/header.php'; ?>
<?php

	$login = Session::get("cuslogin"); /*if custmer login*/
		if($login == true){
			header('location:index.php');
		}

?>


<?php 
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {
          $customLogin = $cmr->customerLogin($_POST);
    }
?>
<style>

.form-con,select {
    display: block;
    width: 100%;
    min-height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;

}
.login{
	border: 2px solid #ddd;
	padding:25px 0 15px 15px;
	margin-bottom: 20px;
}

.login h3{
    font-size: 22px;
    color: #6C6C6C;
    font-family: 'Monda', sans-serif;
    padding-bottom: .4em;
}

.signup h3{
    font-size: 22px;
    color: #6C6C6C;
    font-family: 'Monda', sans-serif;
    padding-bottom: .4em;
}

small{
	padding: 10px 0;
}

.form-group{
	width: 73%;
}

.signup{
	border: 2px solid #ddd;
	padding:25px 0 15px 15px;
	width: 100%;
	margin-bottom: 20px;
}

	

.signup input {
    margin-top: 10px;
}

.signup button{
 	margin-top: 8px;
 }

.signup  .form-con{
       width: 97%;
 }
.signup select{
	margin-top: 10px;
}   



</style>
	<section class="seclogin">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="login">	
						<?php
      
      		  if(isset($customLogin)){

					
					 echo $customLogin;
    			} ?>
						<h3>Exsting Customer</h3>
						<small id="emailHelp" class="form-text text-muted">Sign in With Form Below</small>	
						<form action=" " method="post">
							<div class="form-group">
								<input type="email" name="email" class="form-con"  placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-con"  placeholder="Password" >
							</div>

							<button type="submit" name="login" class="btn btn-dark">SignIn</button>
						</form>
					</div>

				</div>

				<?php 

       
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){

            
            $CustomerReg = $cmr->CustomerRegistration($_POST);
            

        }


        ?>


				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class="signup">
					<?php 

    			if(isset($CustomerReg)){

    				echo $CustomerReg ;
    			}
    				?>	
						<h3>Register New Account</h3>
						
						<form action=" " method="POST">

							<div class="row">
								<div class="col">
									<input type="text" name="name" class="form-con"  placeholder="First name">
								</div>
								<div class="col">
									<select style="width: 90%" class="form-control" id="exampleFormControlSelect1" name="address">
     
							        <option>adderss</option>
							        <option value="25 Abdulmajeed Al-Adwan Street">25 Abdulmajeed Al-Adwan Street</option>
							        <option value="319 Wasfi Al-Tal">319 Wasfi Al-Tal</option>
							       
							    </select>	
								</div>

							</div>

							<div class="row">
								<div class="col">
							<select style="width: 90%" class="form-control" id="exampleFormControlSelect1" name="city">
     
							        <option>city</option>
							        <option value="amman">Amman</option>
							        <option value="Az-zarqa">Zarqa</option>
							        <option value="Az-zarqa">Aqaba</option>
							        <option value="Az-zarqa">Irbid</option>

							       
							    </select>								</div>
								<div class="col">
									<select style="width: 90%" class="form-control"
									id="exampleFormControlSelect1" name="country">
     
							        <option>Country</option>
							        <option value="Jordan">Jordan</option>
							       
							    </select>
								</div>
								
							</div>


							<div class="row">
								<div class="col">
									<input type="text" name="zip"  class="form-con" placeholder="Zip">
								</div>
								<div class="col">
									<input type="number" name="phone" class="form-con"  placeholder="Phone">
								</div>
								
							</div>



								<div class="row">
								<div class="col">
									<input type="email" name="email"  class="form-con"  placeholder="Eamil">
								</div>
								<div class="col">
									<input type="password" name="password"  class="form-con" placeholder="Password">
								</div>
								
							</div>

							<button type="submit" name="register" class="btn btn-dark">Create Acount</button>
						</form>
					</div>

				</div>


			</div>	

		</div>
	</section>

 <?php include'inc/footer.php' ?>